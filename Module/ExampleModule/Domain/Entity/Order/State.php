<?php

declare(strict_types=1);

namespace ExampleModule\Domain\Entity\Order;

use SharedKernel\Model\AbstractString;

final class State extends AbstractString
{
    private const ALLOWED_VALUES = [
        self::CREATED => self::CREATED,
        self::PROCESSED => self::PROCESSED,
        self::SENT => self::SENT,
    ];
    private const CREATED = 'created';
    private const PROCESSED = 'processed';
    private const SENT = 'sent';

    public function __construct(string $value)
    {
        if (!isset(self::ALLOWED_VALUES[$value])) {
            // throw new StateInvalidValueException
        }
        parent::__construct($value);
    }

    public static function buildSent(): self
    {
        return new self(self::SENT);
    }
}