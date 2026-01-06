<?php

declare(strict_types=1);

namespace BVP\ScraperCore\Tests;

use Carbon\CarbonImmutable as Carbon;

/**
 * @author shimomo
 */
final class ResolverDataProvider
{
    /**
     * @psalm-return non-empty-list<array{
     *     arguments: non-empty-list<\Carbon\CarbonInterface|non-empty-string|null>,
     *     expected: \Carbon\CarbonImmutable
     * }>
     *
     * @return array
     */
    public static function resolveDateProvider(): array
    {
        return [
            [
                'arguments' => [Carbon::today()],
                'expected' => Carbon::today(),
            ],
            [
                'arguments' => ['2026-01-01'],
                'expected' => Carbon::parse('2026-01-01'),
            ],
            [
                'arguments' => [null],
                'expected' => Carbon::today(),
            ],
        ];
    }

    /**
     * @psalm-return non-empty-list<array{
     *     arguments: non-empty-list<int|string|null>,
     *     expected: ?int<1, 24>
     * }>
     *
     * @return array
     */
    public static function resolveStadiumNumberProvider(): array
    {
        return [
            [
                'arguments' => [0],
                'expected' => null,
            ],
            [
                'arguments' => [1],
                'expected' => 1,
            ],
            [
                'arguments' => [24],
                'expected' => 24,
            ],
            [
                'arguments' => [25],
                'expected' => null,
            ],
            [
                'arguments' => ['0'],
                'expected' => null,
            ],
            [
                'arguments' => ['1'],
                'expected' => 1,
            ],
            [
                'arguments' => ['24'],
                'expected' => 24,
            ],
            [
                'arguments' => ['25'],
                'expected' => null,
            ],
            [
                'arguments' => [null],
                'expected' => null,
            ],
        ];
    }

    /**
     * @psalm-return non-empty-list<array{
     *     arguments: non-empty-list<int|string|array|null>,
     *     expected: non-empty-list<int<1, 24>>
     * }>
     *
     * @return array
     */
    public static function resolveStadiumNumbersProvider(): array
    {
        /** @psalm-var non-empty-list<int<1, 24>> */
        $allStadiumNumbers = range(1, 24);

        return [
            [
                'arguments' => [0],
                'expected' => $allStadiumNumbers,
            ],
            [
                'arguments' => [1],
                'expected' => [1],
            ],
            [
                'arguments' => [24],
                'expected' => [24],
            ],
            [
                'arguments' => [25],
                'expected' => $allStadiumNumbers,
            ],
            [
                'arguments' => ['0'],
                'expected' => $allStadiumNumbers,
            ],
            [
                'arguments' => ['1'],
                'expected' => [1],
            ],
            [
                'arguments' => ['24'],
                'expected' => [24],
            ],
            [
                'arguments' => ['25'],
                'expected' => $allStadiumNumbers,
            ],
            [
                'arguments' => [[0]],
                'expected' => $allStadiumNumbers,
            ],
            [
                'arguments' => [[1]],
                'expected' => [1],
            ],
            [
                'arguments' => [[24]],
                'expected' => [24],
            ],
            [
                'arguments' => [[25]],
                'expected' => $allStadiumNumbers,
            ],
            [
                'arguments' => [null],
                'expected' => $allStadiumNumbers,
            ],
        ];
    }

    /**
     * @psalm-return non-empty-list<array{
     *     arguments: non-empty-list<int|string|null>,
     *     expected: ?int<1, 12>
     * }>
     *
     * @return array
     */
    public static function resolveNumberProvider(): array
    {
        return [
            [
                'arguments' => [0],
                'expected' => null,
            ],
            [
                'arguments' => [1],
                'expected' => 1,
            ],
            [
                'arguments' => [12],
                'expected' => 12,
            ],
            [
                'arguments' => [13],
                'expected' => null,
            ],
            [
                'arguments' => ['0'],
                'expected' => null,
            ],
            [
                'arguments' => ['1'],
                'expected' => 1,
            ],
            [
                'arguments' => ['12'],
                'expected' => 12,
            ],
            [
                'arguments' => ['13'],
                'expected' => null,
            ],
            [
                'arguments' => [null],
                'expected' => null,
            ],
        ];
    }

    /**
     * @psalm-return non-empty-list<array{
     *     arguments: non-empty-list<int|string|array|null>,
     *     expected: non-empty-list<int<1, 12>>
     * }>
     *
     * @return array
     */
    public static function resolveNumbersProvider(): array
    {
        /** @psalm-var non-empty-list<int<1, 12>> */
        $allStadiumNumbers = range(1, 12);

        return [
            [
                'arguments' => [0],
                'expected' => $allStadiumNumbers,
            ],
            [
                'arguments' => [1],
                'expected' => [1],
            ],
            [
                'arguments' => [12],
                'expected' => [12],
            ],
            [
                'arguments' => [13],
                'expected' => $allStadiumNumbers,
            ],
            [
                'arguments' => ['0'],
                'expected' => $allStadiumNumbers,
            ],
            [
                'arguments' => ['1'],
                'expected' => [1],
            ],
            [
                'arguments' => ['12'],
                'expected' => [12],
            ],
            [
                'arguments' => ['13'],
                'expected' => $allStadiumNumbers,
            ],
            [
                'arguments' => [[0]],
                'expected' => $allStadiumNumbers,
            ],
            [
                'arguments' => [[1]],
                'expected' => [1],
            ],
            [
                'arguments' => [[12]],
                'expected' => [12],
            ],
            [
                'arguments' => [[13]],
                'expected' => $allStadiumNumbers,
            ],
            [
                'arguments' => [null],
                'expected' => $allStadiumNumbers,
            ],
        ];
    }
}
