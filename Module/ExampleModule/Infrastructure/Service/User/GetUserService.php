<?php

declare(strict_types=1);

namespace ExampleModule\Infrastructure\Service\User;

namespace User\Mysql;

use ExampleModule\Domain\Entity\User\Id;
use ExampleModule\Domain\Entity\User\User;
use ExampleModule\Domain\Interfaces\GetUserServiceInterface;

final class GetUserService implements GetUserServiceInterface
{
    public function execute(Id $userId): User
    {
        // TODO: Implement execute() method.
    }
}