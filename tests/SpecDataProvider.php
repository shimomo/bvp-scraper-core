<?php

declare(strict_types=1);

namespace BVP\ScraperCore\Tests;

/**
 * @author shimomo
 */
final class SpecDataProvider
{
    /**
     * @psalm-return non-empty-list<array{
     *     expected: non-empty-list<int<1, 24>>
     * }>
     *
     * @return array
     */
    public static function stadiumNumbersProvider(): array
    {
        /** @psalm-var non-empty-list<int<1, 24>> */
        $allStadiumNumbers = range(1, 24);

        return [
            [
                'expected' => $allStadiumNumbers,
            ],
        ];
    }

    /**
     * @psalm-return non-empty-list<array{
     *     expected: non-empty-list<int<1, 12>>
     * }>
     *
     * @return array
     */
    public static function numbersProvider(): array
    {
        /** @psalm-var non-empty-list<int<1, 12>> */
        $allNumbers = range(1, 12);

        return [
            [
                'expected' => $allNumbers,
            ],
        ];
    }
}
