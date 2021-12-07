<?php

declare(strict_types=1);

namespace ExampleModule\Domain\Entity\User;

final class User
{
    /**
     * @var Balance
     */
    private $balance;
    /**
     * @var Id
     */
    private $id;

    public function __construct(
        Id $id,
        Balance $balance
    ) {
        $this->id = $id;
        $this->balance = $balance;
    }

    public function getBalance(): Balance
    {
        return $this->balance;
    }

    public function getId(): Id
    {
        return $this->id;
    }
}