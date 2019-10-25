<?php

declare(strict_types=1);

namespace App;

class Job
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var \App\Expression|null
     */
    private $expression;

    /**
     * @param string               $name
     * @param \App\Expression|null $expression
     */
    public function __construct(string $name, Expression $expression = null)
    {
        $this->name       = $name;
        $this->expression = $expression;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return \App\Expression|null
     */
    public function getExpression(): ?Expression
    {
        return $this->expression;
    }
}
