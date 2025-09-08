<?php

declare(strict_types=1);

namespace BVP\ScraperCore;

use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\DomCrawler\Crawler;

/**
 * @author shimomo
 */
final class Scraper
{
    /**
     * @psalm-var \Symfony\Component\BrowserKit\HttpBrowser|null
     *
     * @var \Symfony\Component\BrowserKit\HttpBrowser|null
     */
    private static ?HttpBrowser $instance;

    /**
     * @psalm-return \Symfony\Component\BrowserKit\HttpBrowser
     *
     * @return \Symfony\Component\BrowserKit\HttpBrowser
     */
    public static function getInstance(): HttpBrowser
    {
        return self::$instance ??= new HttpBrowser();
    }

    /**
     * @psalm-return \Symfony\Component\BrowserKit\HttpBrowser
     *
     * @return \Symfony\Component\BrowserKit\HttpBrowser
     */
    public static function createInstance(): HttpBrowser
    {
        return self::$instance = new HttpBrowser();
    }

    /**
     * @psalm-return void
     *
     * @return void
     */
    public static function resetInstance(): void
    {
        self::$instance = null;
    }

    /**
     * @psalm-param \Symfony\Component\DomCrawler\Crawler $crawler
     * @psalm-param string $key
     * @psalm-return array<array-key, mixed>
     *
     * @param \Symfony\Component\DomCrawler\Crawler $crawler
     * @param string $key
     * @return array
     */
    public static function filterByKey(Crawler $crawler, string $key): array
    {
        return $crawler->filter($key)->each(fn(Crawler $node): string => $node->text());
    }

    /**
     * @psalm-param \Symfony\Component\DomCrawler\Crawler $crawler
     * @psalm-param array<int, string> $keys
     * @psalm-return array<string, array<array-key, mixed>>
     *
     * @param \Symfony\Component\DomCrawler\Crawler $crawler
     * @param array $keys
     * @return array
     */
    public static function filterByKeys(Crawler $crawler, array $keys): array
    {
        $response = [];

        foreach ($keys as $key) {
            $response[$key] = self::filterByKey($crawler, $key);
        }

        return $response;
    }

    /**
     * @psalm-param \Symfony\Component\DomCrawler\Crawler $crawler
     * @psalm-param string $prefix
     * @psalm-return array<array-key, mixed>
     *
     * @param \Symfony\Component\DomCrawler\Crawler $crawler
     * @param string $prefix
     * @return array
     */
    public static function filterByIdPrefix(Crawler $crawler, string $prefix): array
    {
        return $crawler->filterXPath('//*[starts-with(@id, "' . ltrim($prefix, '#') . '")]')
            ->each(fn(Crawler $node): string => $node->text());
    }

    /**
     * @psalm-param \Symfony\Component\DomCrawler\Crawler $crawler
     * @psalm-param array<array-key, string> $prefixes
     * @psalm-return array<string, array<array-key, mixed>>
     *
     * @param \Symfony\Component\DomCrawler\Crawler $crawler
     * @param array $prefixes
     * @return array
     */
    public static function filterByIdPrefixes(Crawler $crawler, array $prefixes): array
    {
        $response = [];

        foreach ($prefixes as $prefix) {
            $response[$prefix] = self::filterByIdPrefix($crawler, $prefix);
        }

        return $response;
    }

    /**
     * @psalm-param \Symfony\Component\DomCrawler\Crawler $crawler
     * @psalm-param string $prefix
     * @psalm-return array<array-key, mixed>
     *
     * @param \Symfony\Component\DomCrawler\Crawler $crawler
     * @param string $prefix
     * @return array
     */
    public static function filterByClassPrefix(Crawler $crawler, string $prefix): array
    {
        return $crawler->filterXPath('//*[starts-with(@class, "' . ltrim($prefix, '.') . '")]')
            ->each(fn(Crawler $node): string => $node->text());
    }

    /**
     * @psalm-param \Symfony\Component\DomCrawler\Crawler $crawler
     * @psalm-param array<array-key, string> $prefixes
     * @psalm-return array<string, array<array-key, mixed>>
     *
     * @param \Symfony\Component\DomCrawler\Crawler $crawler
     * @param array $prefixes
     * @return array
     */
    public static function filterByClassPrefixes(Crawler $crawler, array $prefixes): array
    {
        $response = [];

        foreach ($prefixes as $prefix) {
            $response[$prefix] = self::filterByClassPrefix($crawler, $prefix);
        }

        return $response;
    }
}
