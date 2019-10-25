<?php

declare(strict_types=1);

namespace App;

use InvalidArgumentException;

class Candidate
{
    /**
     * @var string[]
     */
    private $parameters;

    /**
     * @param string[] $parameters
     */
    public function __construct(array $parameters)
    {
        $this->validate($parameters);
        $this->parameters = $parameters;
    }

    /**
     * @return string[]
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }

    /**
     * @param string[] $parameters
     */
    private function validate(array $parameters): void
    {
        foreach ($parameters as $parameter) {
            if (!is_string($parameter)) {
                throw new InvalidArgumentException('Parameters should be array of strings.');
            }
        }
    }
}
