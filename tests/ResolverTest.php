<?php

declare(strict_types=1);

namespace BVP\ScraperCore\Tests;

use BVP\ScraperCore\Resolver;
use Carbon\CarbonImmutable as Carbon;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

/**
 * @author shimomo
 */
final class ResolverTest extends TestCase
{
    /**
     * @psalm-param non-empty-list<\Carbon\CarbonInterface|non-empty-string|null> $arguments
     * @psalm-param \Carbon\CarbonImmutable $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param \Carbon\CarbonImmutable $expected
     * @return void
     */
    #[DataProviderExternal(ResolverDataProvider::class, 'resolveDateProvider')]
    public function testResolveDate(array $arguments, Carbon $expected): void
    {
        /** @psalm-var \Carbon\CarbonInterface|non-empty-string|null */
        $date = array_shift($arguments);

        $this->assertTrue(Resolver::resolveDate($date)->isSameDay($expected));
    }

    /**
     * @psalm-param non-empty-list<int|string|null> $arguments
     * @psalm-param ?int<1, 24> $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param ?int $expected
     * @return void
     */
    #[DataProviderExternal(ResolverDataProvider::class, 'resolveStadiumNumberProvider')]
    public function testResolveStadiumNumber(array $arguments, ?int $expected): void
    {
        /** @psalm-var int|string|null */
        $stadiumNumber = array_shift($arguments);

        $this->assertSame($expected, Resolver::resolveStadiumNumber($stadiumNumber));
    }

    /**
     * @psalm-param non-empty-list<int|string|array|null> $arguments
     * @psalm-param non-empty-list<int<1, 24>> $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param array $expected
     * @return void
     */
    #[DataProviderExternal(ResolverDataProvider::class, 'resolveStadiumNumbersProvider')]
    public function testResolveStadiumNumbers(array $arguments, array $expected): void
    {
        /** @psalm-var int|string|array|null */
        $stadiumNumber = array_shift($arguments);

        $this->assertSame($expected, Resolver::resolveStadiumNumbers($stadiumNumber));
    }

    /**
     * @psalm-param non-empty-list<int|string|null> $arguments
     * @psalm-param ?int<1, 12> $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param ?int $expected
     * @return void
     */
    #[DataProviderExternal(ResolverDataProvider::class, 'resolveNumberProvider')]
    public function testResolveNumber(array $arguments, ?int $expected): void
    {
        /** @psalm-var int|string|null */
        $number = array_shift($arguments);

        $this->assertSame($expected, Resolver::resolveNumber($number));
    }

    /**
     * @psalm-param non-empty-list<int|string|array|null> $arguments
     * @psalm-param non-empty-list<int<1, 12>> $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param array $expected
     * @return void
     */
    #[DataProviderExternal(ResolverDataProvider::class, 'resolveNumbersProvider')]
    public function testResolveNumbers(array $arguments, array $expected): void
    {
        /** @psalm-var int|string|array|null */
        $number = array_shift($arguments);

        $this->assertSame($expected, Resolver::resolveNumbers($number));
    }
}
