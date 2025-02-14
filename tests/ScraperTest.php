<?php

declare(strict_types=1);

namespace BVP\ScraperCore\Tests;

use BVP\ScraperCore\Scraper;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;
use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\DomCrawler\Crawler;

/**
 * @author shimomo
 */
final class ScraperTest extends TestCase
{
    /**
     * @return void
     */
    protected function tearDown(): void
    {
        Scraper::resetInstance();
    }

    /**
     * @return void
     */
    public function testGetInstance(): void
    {
        $this->assertInstanceOf(HttpBrowser::class, Scraper::getInstance());
    }

    /**
     * @return void
     */
    public function testCreateInstance(): void
    {
        $this->assertInstanceOf(HttpBrowser::class, Scraper::createInstance());
    }

    /**
     * @return void
     */
    public function testResetInstance(): void
    {
        $instance1 = Scraper::getInstance();
        Scraper::resetInstance();
        $instance2 = Scraper::getInstance();
        $this->assertNotSame($instance1, $instance2);
    }

    /**
     * @param  \Symfony\Component\DomCrawler\Crawler  $crawler
     * @param  array                                  $arguments
     * @param  array                                  $expected
     * @return void
     */
    #[DataProviderExternal(ScraperDataProvider::class, 'filterByKeyProvider')]
    public function testFilterByKey(Crawler $crawler, array $arguments, array $expected): void
    {
        $this->assertSame($expected, Scraper::filterByKey($crawler, ...$arguments));
    }

    /**
     * @param  \Symfony\Component\DomCrawler\Crawler  $crawler
     * @param  array                                  $arguments
     * @param  array                                  $expected
     * @return void
     */
    #[DataProviderExternal(ScraperDataProvider::class, 'filterByKeysProvider')]
    public function testFilterByKeys(Crawler $crawler, array $arguments, array $expected): void
    {
        $this->assertSame($expected, Scraper::filterByKeys($crawler, ...$arguments));
    }

    /**
     * @param  \Symfony\Component\DomCrawler\Crawler  $crawler
     * @param  array                                  $arguments
     * @param  array                                  $expected
     * @return void
     */
    #[DataProviderExternal(ScraperDataProvider::class, 'filterByIdPrefixProvider')]
    public function testFilterByIdPrefix(Crawler $crawler, array $arguments, array $expected): void
    {
        $this->assertSame($expected, Scraper::filterByIdPrefix($crawler, ...$arguments));
    }

    /**
     * @param  \Symfony\Component\DomCrawler\Crawler  $crawler
     * @param  array                                  $arguments
     * @param  array                                  $expected
     * @return void
     */
    #[DataProviderExternal(ScraperDataProvider::class, 'filterByIdPrefixesProvider')]
    public function testFilterByIdPrefixes(Crawler $crawler, array $arguments, array $expected): void
    {
        $this->assertSame($expected, Scraper::filterByIdPrefixes($crawler, ...$arguments));
    }

    /**
     * @param  \Symfony\Component\DomCrawler\Crawler  $crawler
     * @param  array                                  $arguments
     * @param  array                                  $expected
     * @return void
     */
    #[DataProviderExternal(ScraperDataProvider::class, 'filterByClassPrefixProvider')]
    public function testFilterByClassPrefix(Crawler $crawler, array $arguments, array $expected): void
    {
        $this->assertSame($expected, Scraper::filterByClassPrefix($crawler, ...$arguments));
    }

    /**
     * @param  \Symfony\Component\DomCrawler\Crawler  $crawler
     * @param  array                                  $arguments
     * @param  array                                  $expected
     * @return void
     */
    #[DataProviderExternal(ScraperDataProvider::class, 'filterByClassPrefixesProvider')]
    public function testFilterByClassPrefixes(Crawler $crawler, array $arguments, array $expected): void
    {
        $this->assertSame($expected, Scraper::filterByClassPrefixes($crawler, ...$arguments));
    }
}
