<?php

namespace HW7\Value;

use PHPUnit\Util\Exception;

class Money
{
    private int|float $amount;

    private Currency $currency;


    public function __construct(float|int $amount, Currency $currency)
    {
        $this->setAmount($amount);
        $this->setCurrency($currency);
    }


    public function getAmount(): float|int
    {
        return $this->amount;
    }

    public function setAmount(float|int $amount): void
    {
        if ($amount <= 0) {
            throw new Exception('Invalid amount');
        }
        $this->amount = $amount;
    }

    public function getCurrency(): Currency
    {
        return $this->currency;
    }

    public function setCurrency(Currency $currency): void
    {
        $this->currency = $currency;
    }

    public function equals(Money $money): bool
    {
        return $this == $money;
    }

    public function add(Money $money): Money
    {
        if ($this->currency != $money->currency) {
            throw new Exception('Different currencies');
        }

        return new Money($this->getAmount() + $money->getAmount(), $this->getCurrency());
    }
}