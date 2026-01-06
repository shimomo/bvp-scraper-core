<?php

declare(strict_types=1);

namespace BVP\ScraperCore;

use BVP\Converter\Converter;
use Carbon\CarbonImmutable as Carbon;
use Carbon\CarbonInterface;

/**
 * @author shimomo
 */
final class Resolver
{
    /**
     * @psalm-param \Carbon\CarbonInterface|non-empty-string|null $date
     * @psalm-return \Carbon\CarbonImmutable
     *
     * @param \Carbon\CarbonInterface|string|null $date
     * @return \Carbon\CarbonImmutable
     */
    public static function resolveDate(CarbonInterface|string|null $date): Carbon
    {
        if ($date === null) {
            return Carbon::today();
        }

        return Carbon::parse($date);
    }

    /**
     * @psalm-param int|string|null $number
     * @psalm-return ?int<1, 24>
     *
     * @param int|string|null $number
     * @return ?int
     */
    public static function resolveStadiumNumber(int|string|null $number): ?int
    {
        if ($number === null) {
            return null;
        }

        $number = Converter::convertToInt($number);
        if ($number >= 1 && $number <= 24) {
            return $number;
        }

        return null;
    }

    /**
     * @psalm-param int|string|array|null $number
     * @psalm-return non-empty-list<int<1, 24>>
     *
     * @param int|string|array|null $number
     * @return array
     */
    public static function resolveStadiumNumbers(int|string|array|null $number): array
    {
        if ($number === null) {
            return Spec::stadiumNumbers();
        }

        $numbers = array_map(function (int|string $number): int {
            return Converter::convertToInt($number);
        }, is_array($number) ? $number : [$number]);

        $filteredNumbers = array_values(array_filter($numbers, function (int $number): bool {
            return $number >= 1 && $number <= 24;
        }));

        if ($filteredNumbers === []) {
            return Spec::stadiumNumbers();
        }

        return $filteredNumbers;
    }

    /**
     * @psalm-param int|string|null $number
     * @psalm-return ?int<1, 12>
     *
     * @param int|string|null $number
     * @return ?int
     */
    public static function resolveNumber(int|string|null $number): ?int
    {
        if ($number === null) {
            return null;
        }

        $number = Converter::convertToInt($number);
        if ($number >= 1 && $number <= 12) {
            return $number;
        }

        return null;
    }

    /**
     * @psalm-param int|string|array|null $number
     * @psalm-return non-empty-list<int<1, 12>>
     *
     * @param int|string|array|null $number
     * @return array
     */
    public static function resolveNumbers(int|string|array|null $number): array
    {
        if ($number === null) {
            return Spec::numbers();
        }

        $numbers = array_map(function (int|string $number): int {
            return Converter::convertToInt($number);
        }, is_array($number) ? $number : [$number]);

        $filteredNumbers = array_values(array_filter($numbers, function (int $number): bool {
            return $number >= 1 && $number <= 12;
        }));

        if ($filteredNumbers === []) {
            return Spec::numbers();
        }

        return $filteredNumbers;
    }
}
