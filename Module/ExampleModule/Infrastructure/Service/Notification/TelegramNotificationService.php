<?php

declare(strict_types=1);

namespace ExampleModule\Infrastructure\Service\Notification;

use ExampleModule\Domain\Entity\Order\Order;
use ExampleModule\Domain\Interfaces\NotificationServiceInterface;

final class TelegramNotificationService implements NotificationServiceInterface
{
    public function execute(Order $order): void
    {
    }
}