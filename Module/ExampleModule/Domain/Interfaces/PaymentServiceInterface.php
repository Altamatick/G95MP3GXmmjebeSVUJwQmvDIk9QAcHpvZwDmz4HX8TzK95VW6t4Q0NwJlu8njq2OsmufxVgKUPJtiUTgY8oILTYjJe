<?php

declare(strict_types=1);

namespace ExampleModule\Domain\Interfaces;

use ExampleModule\Domain\Entity\Order\Order;

interface PaymentServiceInterface
{
    public function execute(Order $order): void;
}