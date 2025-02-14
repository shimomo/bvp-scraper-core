<?php

declare(strict_types=1);

namespace BVP\ScraperCore\Tests;

use BVP\ScraperCore\Scraper;
use Symfony\Component\DomCrawler\Crawler;

/**
 * @author shimomo
 */
final class ScraperDataProvider
{
    /**
     * @var \Symfony\Component\DomCrawler\Crawler
     */
    private static Crawler $crawler;

    /**
     * @return \Symfony\Component\DomCrawler\Crawler
     */
    private static function getCrawler(): Crawler
    {
        return self::$crawler ??= Scraper::getInstance()->request('GET', 'https://en.wikipedia.org/wiki/PHP');
    }

    /**
     * @return array
     */
    public static function filterByKeyProvider(): array
    {
        return [
            ['crawler' => self::getCrawler(), 'arguments' => ['title'], 'expected' => ['PHP - Wikipedia']],
        ];
    }

    /**
     * @return array
     */
    public static function filterByKeysProvider(): array
    {
        return [
            ['crawler' => self::getCrawler(), 'arguments' => [['title']], 'expected' => ['title' => ['PHP - Wikipedia']]],
        ];
    }

    /**
     * @return array
     */
    public static function filterByIdPrefixProvider(): array
    {
        return [
            ['crawler' => self::getCrawler(), 'arguments' => ['first'], 'expected' => ['PHP']],
        ];
    }

    /**
     * @return array
     */
    public static function filterByIdPrefixesProvider(): array
    {
        return [
            ['crawler' => self::getCrawler(), 'arguments' => [['first']], 'expected' => ['first' => ['PHP']]],
        ];
    }

    /**
     * @return array
     */
    public static function filterByClassPrefixProvider(): array
    {
        return [
            ['crawler' => self::getCrawler(), 'arguments' => ['first'], 'expected' => ['PHP']],
        ];
    }

    /**
     * @return array
     */
    public static function filterByClassPrefixesProvider(): array
    {
        return [
            ['crawler' => self::getCrawler(), 'arguments' => [['first']], 'expected' => ['first' => ['PHP']]],
        ];
    }
}
