<?php

declare(strict_types=1);

namespace ExampleModule\Domain\Interfaces;

use ExampleModule\Domain\Entity\Order\Order;
use ExampleModule\Domain\Entity\Order\Waybill;

interface CreateWaybillServiceInterface
{
    public function execute(Order $oder): Waybill;
}