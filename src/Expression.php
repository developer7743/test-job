<?php

declare(strict_types=1);

namespace App;

use InvalidArgumentException;

class Expression
{
    public const EXPR_OR  = 'OR';
    public const EXPR_AND = 'AND';

    /**
     * @var string
     */
    private $expr;

    /**
     * @var \App\Expression[]|string[]
     */
    private $values;

    /**
     * @param string                     $expr
     * @param \App\Expression[]|string[] $values
     */
    private function __construct(string $expr, array $values)
    {
        $this->validateValues($values);
        $this->expr   = $expr;
        $this->values = $values;
    }

    /**
     * @param \App\Expression[]|string[] $values
     *
     * @return \App\Expression
     */
    public static function orX(array $values): Expression
    {
        return new static(static::EXPR_OR, $values);
    }

    /**
     * @param \App\Expression[]|string[] $values
     *
     * @return \App\Expression
     */
    public static function andX(array $values): Expression
    {
        return new static(static::EXPR_AND, $values);
    }

    /**
     * @return string
     */
    public function getExpr(): string
    {
        return $this->expr;
    }

    /**
     * @return \App\Expression[]|string[]
     */
    public function getValues(): array
    {
        return $this->values;
    }

    /**
     * @param array $values
     */
    private function validateValues(array $values): void
    {
        foreach ($values as $value) {
            if ($value instanceof Expression) {
                continue;
            }

            if (!is_string($value)) {
                throw new InvalidArgumentException();
            }
        }
    }
}
