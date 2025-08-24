<?php

declare(strict_types=1);

namespace BVP\ScraperCore\Tests;

/**
 * @author shimomo
 */
final class ScraperDataProvider
{
    /**
     * @return array<int, array{
     *     arguments: array<int, string>,
     *     expected: array<int, string>
     * }>
     */
    public static function filterByKeyProvider(): array
    {
        return [
            [
                'arguments' => ['title'],
                'expected' => ['PHP - Wikipedia'],
            ],
        ];
    }

    /**
     * @return array<int, array{
     *     arguments: array<int, array<int, string>>,
     *     expected: array<string, array<int, string>>
     * }>
     */
    public static function filterByKeysProvider(): array
    {
        return [
            [
                'arguments' => [['title']],
                'expected' => ['title' => ['PHP - Wikipedia']],
            ],
        ];
    }

    /**
     * @return array<int, array{
     *     arguments: array<int, string>,
     *     expected: array<int, string>
     * }>
     */
    public static function filterByIdPrefixProvider(): array
    {
        return [
            [
                'arguments' => ['first'],
                'expected' => ['PHP'],
            ],
        ];
    }

    /**
     * @return array<int, array{
     *     arguments: array<int, array<int, string>>,
     *     expected: array<string, array<int, string>>
     * }>
     */
    public static function filterByIdPrefixesProvider(): array
    {
        return [
            [
                'arguments' => [['first']],
                'expected' => ['first' => ['PHP']],
            ],
        ];
    }

    /**
     * @return array<int, array{
     *     arguments: array<int, string>,
     *     expected: array<int, string>
     * }>
     */
    public static function filterByClassPrefixProvider(): array
    {
        return [
            [
                'arguments' => ['first'],
                'expected' => ['PHP'],
            ],
        ];
    }

    /**
     * @return array<int, array{
     *     arguments: array<int, array<int, string>>,
     *     expected: array<string, array<int, string>>
     * }>
     */
    public static function filterByClassPrefixesProvider(): array
    {
        return [
            [
                'arguments' => [['first']],
                'expected' => ['first' => ['PHP']],
            ],
        ];
    }
}
