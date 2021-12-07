<?php

declare(strict_types=1);

namespace ExampleModule\Domain\Interfaces;

use ExampleModule\Domain\Entity\User\User;
use ExampleModule\Domain\Entity\User\Id;

interface GetUserServiceInterface
{
    public function execute(Id $userId): User;
}