<?php

declare(strict_types=1);

namespace ExampleModule\Domain\Interfaces;

use ExampleModule\Domain\Entity\Order\Id;
use ExampleModule\Domain\Entity\Order\Order;

interface OrderRepositoryInterface
{
    public function findById(Id $orderId): Order;

    public function persist(Order $order): void;
}