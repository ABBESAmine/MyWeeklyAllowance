<?php

declare(strict_types=1);

namespace Abbesamine\MyWeeklyAllowance;

// Auteur : ABBES Amine, LAHLOU Mikaël, DA ROCHA Hugo, BENCHRIF Mehdi, CHELH Ayoub

final class TeenAccount
{
    // ABBES Amine et LAHLOU Mikaël
    private string $name;
    private float $balance;
    private float $weeklyAllowance = 0.0;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->balance = 0.0;
    }

    // DA ROCHA Hugo et BENCHRIF Mehdi
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

    // CHELH Ayoub
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

    // ABBES Amine
    public function setWeeklyAllowance(float $amount): void
    {
        if ($amount <= 0) {
            throw new \InvalidArgumentException('Weekly allowance must be positive.');
        }

        $this->weeklyAllowance = $amount;
    }

    // LAHLOU Mikaël et DA ROCHA Hugo
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
