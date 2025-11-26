<?php

declare(strict_types=1);

namespace Abbesamine\MyWeeklyAllowance;

final class TeenAccount
{
    private string $name;
    private float $balance;
    private float $weeklyAllowance = 0.0;

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

    public function setWeeklyAllowance(float $amount): void
    {
        if ($amount <= 0) {
            throw new \InvalidArgumentException('Weekly allowance must be positive.');
        }

        $this->weeklyAllowance = $amount;
    }

    public function getWeeklyAllowance(): float
    {
        return $this->weeklyAllowance;
    }

    public function applyWeeklyAllowance(): void
    {
        if ($this->weeklyAllowance <= 0) {
            throw new \LogicException('Weekly allowance not configured.');
        }

        $this->balance += $this->weeklyAllowance;
    }
}
