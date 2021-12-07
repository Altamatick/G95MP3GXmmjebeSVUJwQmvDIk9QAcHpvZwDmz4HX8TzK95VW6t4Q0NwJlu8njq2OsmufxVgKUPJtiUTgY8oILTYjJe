<?php

declare(strict_types=1);

namespace SharedKernel\Model;

abstract class AbstractFloat
{
    /**
     * @var float
     */
    private $value;

    public function __construct(float $value)
    {
        $this->value = $value;
    }

    public function getValue(): float
    {
        return $this->value;
    }

    public function lessThen(self $object): bool
    {
        return $this->getValue() < $object->getValue();
    }
}