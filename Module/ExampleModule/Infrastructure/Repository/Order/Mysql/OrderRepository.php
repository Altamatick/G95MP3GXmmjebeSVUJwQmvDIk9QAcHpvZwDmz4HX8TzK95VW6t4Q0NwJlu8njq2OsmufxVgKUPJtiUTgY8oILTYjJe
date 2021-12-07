<?php

declare(strict_types=1);

use ExampleModule\Domain\Entity\Order\Id;
use ExampleModule\Domain\Entity\Order\Order;
use ExampleModule\Domain\Interfaces\OrderRepositoryInterface;

final class OrderRepository implements OrderRepositoryInterface
{
    public function findById(Id $orderId): Order
    {
        // TODO: Implement findById() method.
    }

    public function persist(Order $order): void
    {
        // TODO: Implement persist() method.
    }
}