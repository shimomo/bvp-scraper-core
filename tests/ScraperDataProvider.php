<?php

declare(strict_types=1);

namespace BVP\ScraperCore\Tests;

/**
 * @author shimomo
 */
final class ScraperDataProvider
{
    /**
     * @return array
     */
    public static function filterByKeyProvider(): array
    {
        return [
            ['arguments' => ['title'], 'expected' => ['PHP - Wikipedia']],
        ];
    }

    /**
     * @return array
     */
    public static function filterByKeysProvider(): array
    {
        return [
            ['arguments' => [['title']], 'expected' => ['title' => ['PHP - Wikipedia']]],
        ];
    }

    /**
     * @return array
     */
    public static function filterByIdPrefixProvider(): array
    {
        return [
            ['arguments' => ['first'], 'expected' => ['PHP']],
        ];
    }

    /**
     * @return array
     */
    public static function filterByIdPrefixesProvider(): array
    {
        return [
            ['arguments' => [['first']], 'expected' => ['first' => ['PHP']]],
        ];
    }

    /**
     * @return array
     */
    public static function filterByClassPrefixProvider(): array
    {
        return [
            ['arguments' => ['first'], 'expected' => ['PHP']],
        ];
    }

    /**
     * @return array
     */
    public static function filterByClassPrefixesProvider(): array
    {
        return [
            ['arguments' => [['first']], 'expected' => ['first' => ['PHP']]],
        ];
    }
}
