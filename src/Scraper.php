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
     * @var \Symfony\Component\BrowserKit\HttpBrowser|null
     */
    private static ?HttpBrowser $instance;

    /**
     * @return \Symfony\Component\BrowserKit\HttpBrowser
     */
    public static function getInstance(): HttpBrowser
    {
        return self::$instance ??= new HttpBrowser();
    }

    /**
     * @return \Symfony\Component\BrowserKit\HttpBrowser
     */
    public static function createInstance(): HttpBrowser
    {
        return self::$instance = new HttpBrowser();
    }

    /**
     * @return void
     */
    public static function resetInstance(): void
    {
        self::$instance = null;
    }

    /**
     * @param  \Symfony\Component\DomCrawler\Crawler  $crawler
     * @param  string                                 $key
     * @return array
     */
    public static function filterByKey(Crawler $crawler, string $key): array
    {
        return $crawler->filter($key)->each(fn($node) => $node->text());
    }

    /**
     * @param  \Symfony\Component\DomCrawler\Crawler  $crawler
     * @param  array                                  $keys
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
     * @param  \Symfony\Component\DomCrawler\Crawler  $crawler
     * @param  string                                 $prefix
     * @return array
     */
    public static function filterByIdPrefix(Crawler $crawler, string $prefix): array
    {
        return $crawler->filterXPath('//*[starts-with(@id, "' . ltrim($prefix, '#') . '")]')
            ->each(fn($node) => $node->text());
    }

    /**
     * @param  \Symfony\Component\DomCrawler\Crawler  $crawler
     * @param  array                                  $prefixes
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
     * @param  \Symfony\Component\DomCrawler\Crawler  $crawler
     * @param  string                                 $prefix
     * @return array
     */
    public static function filterByClassPrefix(Crawler $crawler, string $prefix): array
    {
        return $crawler->filterXPath('//*[starts-with(@class, "' . ltrim($prefix, '.') . '")]')
            ->each(fn($node) => $node->text());
    }

    /**
     * @param  \Symfony\Component\DomCrawler\Crawler  $crawler
     * @param  array                                  $prefixes
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
