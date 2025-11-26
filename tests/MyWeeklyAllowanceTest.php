<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use Abbesamine\MyWeeklyAllowance\TeenAccount;
use InvalidArgumentException;

final class MyWeeklyAllowanceTest extends TestCase
{
    public function testNewAccountStartsWithZeroBalance(): void
    {
        $account = new TeenAccount('Léo');

        $this->assertSame(0.0, $account->getBalance());
    }

    public function testDepositIncreasesBalance(): void
    {
        $account = new TeenAccount('Léo');

        $account->deposit(10.0);

        $this->assertSame(10.0, $account->getBalance());
    }

    public function testDepositWithNegativeAmountThrowsException(): void
    {
        $account = new TeenAccount('Léo');

        $this->expectException(InvalidArgumentException::class);

        $account->deposit(-5.0);
    }

    public function testSpendDecreasesBalance(): void
    {
        $account = new TeenAccount('Léo');
        $account->deposit(20.0);

        $account->spend(7.5);

        $this->assertSame(12.5, $account->getBalance());
    }

    public function testCannotSpendMoreThanBalance(): void
    {
        $account = new TeenAccount('Léo');
        $account->deposit(10.0);

        $this->expectException(InvalidArgumentException::class);

        $account->spend(15.0);
    }

    public function testSpendWithNegativeAmountThrowsException(): void
    {
        $account = new TeenAccount('Léo');
        $account->deposit(10.0);

        $this->expectException(InvalidArgumentException::class);

        $account->spend(-3.0);
    }

}
