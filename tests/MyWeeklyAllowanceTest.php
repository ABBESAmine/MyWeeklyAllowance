<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use Abbesamine\MyWeeklyAllowance\TeenAccount;
use InvalidArgumentException;

// Auteur : ABBES Amine 20%, LAHLOU Mikaël 20%, DA ROCHA Hugo 20%, BENCHRIF Mehdi 20%, CHELH Ayoub 20%

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

    public function testCanSetWeeklyAllowance(): void
    {
        $account = new TeenAccount('Léo');

        $account->setWeeklyAllowance(15.0);

        $this->assertSame(15.0, $account->getWeeklyAllowance());
    }

    public function testWeeklyAllowanceMustBePositive(): void
    {
        $account = new TeenAccount('Léo');

        $this->expectException(\InvalidArgumentException::class);

        $account->setWeeklyAllowance(0);
    }

    public function testApplyingWeeklyAllowanceIncreasesBalance(): void
    {
        $account = new TeenAccount('Léo');
        $account->setWeeklyAllowance(10.0);

        $account->applyWeeklyAllowance(); // une semaine passe
        $this->assertSame(10.0, $account->getBalance());

        $account->applyWeeklyAllowance(); // encore une semaine
        $this->assertSame(20.0, $account->getBalance());
    }
    public function testApplyWeeklyAllowanceWithoutConfigurationThrowsException(): void
    {
        $account = new TeenAccount('Léo');

        $this->expectException(\LogicException::class);
        $this->expectExceptionMessage('Weekly allowance not configured.');

        $account->applyWeeklyAllowance();
    }
}
