<?php

declare(strict_types=1);

namespace BVP\ScraperCore;

/**
 * @author shimomo
 */
final class Spec
{
    /**
     * @psalm-return non-empty-list<int<1, 24>>
     *
     * @return array
     */
    public static function stadiumNumbers(): array
    {
        /** @psalm-var non-empty-list<int<1, 24>> */
        return range(1, 24);
    }

    /**
     * @psalm-return non-empty-list<int<1, 12>>
     *
     * @return array
     */
    public static function numbers(): array
    {
        /** @psalm-var non-empty-list<int<1, 12>> */
        return range(1, 12);
    }
}
