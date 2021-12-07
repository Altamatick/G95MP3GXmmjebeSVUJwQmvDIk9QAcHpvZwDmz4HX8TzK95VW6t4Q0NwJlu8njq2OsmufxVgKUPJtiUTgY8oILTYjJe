<?php

declare(strict_types=1);

namespace ExampleModule\Domain\Service\Order;

use ExampleModule\Domain\Entity\Order\Id;
use ExampleModule\Domain\Entity\Order\State;
use ExampleModule\Domain\Interfaces\CreateWaybillServiceInterface;
use ExampleModule\Domain\Interfaces\OrderRepositoryInterface;
use ExampleModule\Domain\Interfaces\GetUserServiceInterface;
use ExampleModule\Domain\Interfaces\PaymentServiceInterface;
use ExampleModule\Domain\Service\SendNotification;

final class Send
{
    /**
     * @var CreateWaybillServiceInterface
     */
    private $createWaybillService;
    /**
     * @var OrderRepositoryInterface
     */
    private $orderRepository;
    /**
     * @var GetUserServiceInterface
     */
    private $getUserService;
    /**
     * @var SendNotification
     */
    private $sendNotificationService;
    /**
     * @var PaymentServiceInterface
     */
    private $paymentService;

    public function __construct(
        CreateWaybillServiceInterface $createWaybillService,
        OrderRepositoryInterface $orderRepository,
        GetUserServiceInterface $getUserService,
        SendNotification $sendNotificationService,
        PaymentServiceInterface $paymentService
    ) {
        $this->createWaybillService = $createWaybillService;
        $this->orderRepository = $orderRepository;
        $this->getUserService = $getUserService;
        $this->sendNotificationService = $sendNotificationService;
        $this->paymentService = $paymentService;
    }

    public function execute(Id $orderId): void
    {
        $order = $this->orderRepository->findById($orderId);
        $user = $this->getUserService->execute($order->getUserId());

        if ($user->getBalance()->lessThen($order->getSum())) {
//            throw new UserHasLowBalanceException();
        }
        $this->paymentService->execute($order);
        $waybill = $this->createWaybillService->execute($order);
        $order = $order
            ->setState(State::buildSent())
            ->setWaybill($waybill);

        $this->orderRepository->persist($order);
        $this->sendNotificationService->execute($order);
    }
}