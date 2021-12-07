<?php

declare(strict_types=1);

namespace ExampleModule\Application\Service\Order;

use ExampleModule\Domain\Entity\Order\Id;
use ExampleModule\Domain\Service\Order\Send;

final class SendOrderService
{
    /**
     * @var Send
     */
    private $sendService;

    public function __construct(
        Send $sendService
    ) {
        $this->sendService = $sendService;
    }

    public function execute(int $orderId): void
    {
        try {
            $this->sendService->execute(new Id($orderId));
        } catch (\Throwable $exception) {
            // add logger
        }
    }
}