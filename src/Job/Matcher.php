<?php

declare(strict_types=1);

namespace App\Job;

use App\Candidate;
use App\Expression;
use App\Job;

class Matcher
{
    /**
     * @var array
     */
    private $candidateParameters;

    /**
     * @param \App\Candidate $candidate
     */
    public function __construct(Candidate $candidate)
    {
        // flip candidate parameters because isset is much faster then in_array
        $this->candidateParameters = array_flip($candidate->getParameters());
    }

    /**
     * @param \App\Job $job
     *
     * @return bool
     */
    public function matching(Job $job): bool
    {
        $expression = $job->getExpression();

        if ($expression === null) {
            return true;
        }

        return $this->check($expression);
    }

    /**
     * @param \App\Job[] $jobs
     *
     * @return \App\Job[]
     */
    public function filter(array $jobs): array
    {
        return array_filter($jobs, [$this, 'matching']);
    }

    /**
     * @param \App\Expression $expression
     *
     * @return bool
     */
    private function check(Expression $expression): bool
    {
        $result = true;
        $expr   = $expression->getExpr();
        $values = $expression->getValues();

        foreach ($values as $key => $value) {
            if ($expr === Expression::EXPR_OR) {
                if ($value instanceof Expression) {
                    if ($this->check($value)) {
                        return true;
                    }
                    continue;
                }

                if (isset($this->candidateParameters[$value])) {
                    return true;
                }
            }

            if ($expr === Expression::EXPR_AND) {
                if ($value instanceof Expression) {
                    if (!$this->check($value)) {
                        $result = false;
                    }
                    continue;
                }


                if (!isset($this->candidateParameters[$value])) {
                    $result = false;
                    continue;
                }
            }
        }

        // only acceptable for EXPR_AND because OR should return before cycle ends
        return $expr === Expression::EXPR_AND && $result;
    }
}
