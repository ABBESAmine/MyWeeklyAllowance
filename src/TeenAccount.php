<?php

declare(strict_types=1);

namespace Abbesamine\MyWeeklyAllowance;

final class TeenAccount
{
    private string $name;
    private float $balance;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->balance = 0.0;
    }

    public function getBalance(): float
    {
        return $this->balance;
    }

    public function deposit(float $amount): void
    {
        if ($amount <= 0) {
            throw new \InvalidArgumentException('Deposit amount must be positive.');
        }

        $this->balance += $amount;
    }
    public function spend(float $amount): void
    {
        if ($amount <= 0) {
            throw new \InvalidArgumentException('Spend amount must be positive.');
        }

        if ($amount > $this->balance) {
            throw new \InvalidArgumentException('Insufficient funds.');
        }

        $this->balance -= $amount;
    }
}
