<?php

declare(strict_types=1);

namespace ExampleModule\Domain\Entity\User;

use SharedKernel\Model\AbstractInteger;

final class Id extends AbstractInteger
{
    public function __construct(int $value)
    {
        //check id and throw UserIdInvalidValueException if necessary
        parent::__construct($value);
    }
}