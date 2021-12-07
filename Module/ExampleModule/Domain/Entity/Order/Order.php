<?php

declare(strict_types=1);

namespace ExampleModule\Domain\Entity\Order;

use ExampleModule\Domain\Entity\User\Id as UserId;

final class Order
{
    /**
     * @var Id
     */
    private $id;
    /**
     * @var State
     */
    private $state;
    /**
     * @var Sum
     */
    private $sum;
    /**
     * @var UserId
     */
    private $userId;
    /**
     * @var Waybill|null
     */
    private $waybill;

    public function __construct(
        Id $id,
        UserId $userId,
        Sum $sum,
        State $state,
        ?Waybill $waybill = null
    ) {
        $this->id = $id;
        $this->sum = $sum;
        $this->state = $state;
        $this->userId = $userId;
        $this->waybill = $waybill;
    }

    public function getId(): Id
    {
        return $this->id;
    }

    public function getState(): State
    {
        return $this->state;
    }

    public function getSum(): Sum
    {
        return $this->sum;
    }

    public function getUserId(): UserId
    {
        return $this->userId;
    }

    public function getWaybill(): ?Waybill
    {
        return $this->waybill;
    }

    public function setState(State $state): self
    {
        $clone = clone $this;
        $clone->state = $state;

        return $clone;
    }

    public function setWaybill(Waybill $waybill): self
    {
        $clone = clone $this;
        $clone->waybill = $waybill;

        return $clone;
    }
}