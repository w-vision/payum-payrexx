<?php

declare(strict_types=1);

namespace Wvision\Payum\Payrexx\Request;

use Payum\Core\Request\GetHumanStatus as BaseGetHumanStatus;

class GetHumanStatus extends BaseGetHumanStatus
{
    public $transaction;
    public const STATUS_CONFIRMED = 'confirmed';
    public const STATUS_WAITING = 'waiting';

    public function __construct($model, $transaction)
    {
        parent::__construct($model);
        $this->transaction = $transaction;
    }

    /**
     * @return mixed
     */
    public function getTransaction()
    {
        return $this->transaction;
    }

    /**
     * @param mixed $transaction
     */
    public function setTransaction($transaction): void
    {
        $this->transaction = $transaction;
    }

    public function markConfirmed(): void
    {
        $this->status = static::STATUS_CONFIRMED;
    }

    public function markWaiting(): void
    {
        $this->status = static::STATUS_WAITING;
    }

    public function isWaiting(): bool
    {
        return $this->isCurrentStatusEqualTo(static::STATUS_WAITING);
    }
}
