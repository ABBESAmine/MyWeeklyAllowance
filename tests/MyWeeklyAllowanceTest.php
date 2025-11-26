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
}
