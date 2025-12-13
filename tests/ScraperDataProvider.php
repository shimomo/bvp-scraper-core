<?php

declare(strict_types=1);

namespace BVP\ScraperCore\Tests;

/**
 * @author shimomo
 */
final class ScraperDataProvider
{
    /**
     * @psalm-return non-empty-list<array{
     *     arguments: non-empty-list<non-empty-string>,
     *     expected: non-empty-list<non-empty-string>
     * }>
     *
     * @return array
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
     * @psalm-return non-empty-array<array{
     *     arguments: non-empty-list<non-empty-list<non-empty-string>>,
     *     expected: non-empty-array<non-empty-string, non-empty-list<non-empty-string>>
     * }>
     *
     * @return array
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
     * @psalm-return non-empty-list<array{
     *     arguments: non-empty-list<non-empty-string>,
     *     expected: non-empty-list<non-empty-string>
     * }>
     *
     * @return array
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
     * @psalm-return non-empty-list<array{
     *     arguments: non-empty-list<non-empty-list<non-empty-string>>,
     *     expected: non-empty-array<non-empty-string, non-empty-list<non-empty-string>>
     * }>
     *
     * @return array
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
     * @psalm-return non-empty-list<array{
     *     arguments: non-empty-list<non-empty-string>,
     *     expected: non-empty-list<non-empty-string>
     * }>
     *
     * @return array
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
     * @psalm-return non-empty-list<array{
     *     arguments: non-empty-list<non-empty-list<non-empty-string>>,
     *     expected: non-empty-array<non-empty-string, non-empty-list<non-empty-string>>
     * }>
     *
     * @return array
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

    /**
     * @psalm-return non-empty-list<array{
     *     argument: non-empty-string,
     *     expected: non-empty-string
     * }>
     *
     * @return array
     */
    public static function filterXPath(): array
    {
        return [
            [
                'argument' => 'descendant-or-self::body/div',
                'expected' => 'PHP',
            ],
        ];
    }
}
