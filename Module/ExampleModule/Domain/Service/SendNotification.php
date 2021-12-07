<?php

declare(strict_types=1);

namespace ExampleModule\Domain\Service;

use ExampleModule\Domain\Entity\Order\Order;
use ExampleModule\Domain\Interfaces\NotificationServiceInterface;
use Throwable;

final class SendNotification
{
    /**
     * @var NotificationServiceInterface[]
     */
    private $notificationServices;

    public function __construct(
        array $notificationServices
    ) {
        $this->notificationServices = $notificationServices;
    }

    public function execute(Order $order): void
    {
        /** @var NotificationServiceInterface $notificationService */
        foreach ($this->notificationServices as $notificationService) {
            try {
                $notificationService->execute($order);

                return;
            } catch (Throwable $exception) {
                // add logger
            }
        }

        throw new FailedToSendNotificationException();
    }
}