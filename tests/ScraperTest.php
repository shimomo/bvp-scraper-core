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
     * @var \Symfony\Component\BrowserKit\HttpBrowser
     */
    private HttpBrowser $scraperMock;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        $html = <<<'HTML'
        <html>
            <head>
                <title>PHP - Wikipedia</title>
            </head>
            <body>
                <div id="firstId" class="firstClass">PHP</div>
            </body>
        </html>
        HTML;

        $scraperMock = $this->getMockBuilder(HttpBrowser::class)
            ->onlyMethods(['request'])
            ->getMock();

        $scraperMock->method('request')
            ->willReturnCallback(fn($method, $url) => new Crawler($html));

        $this->scraperMock = $scraperMock;
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
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(ScraperDataProvider::class, 'filterByKeyProvider')]
    public function testFilterByKey(array $arguments, array $expected): void
    {
        $crawler = $this->scraperMock->request('GET', 'https://en.wikipedia.org/wiki/PHP');
        $actual = Scraper::filterByKey($crawler, ...$arguments);
        $this->assertSame($expected, $actual);
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(ScraperDataProvider::class, 'filterByKeysProvider')]
    public function testFilterByKeys(array $arguments, array $expected): void
    {
        $crawler = $this->scraperMock->request('GET', 'https://en.wikipedia.org/wiki/PHP');
        $actual = Scraper::filterByKeys($crawler, ...$arguments);
        $this->assertSame($expected, $actual);
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(ScraperDataProvider::class, 'filterByIdPrefixProvider')]
    public function testFilterByIdPrefix(array $arguments, array $expected): void
    {
        $crawler = $this->scraperMock->request('GET', 'https://en.wikipedia.org/wiki/PHP');
        $actual = Scraper::filterByIdPrefix($crawler, ...$arguments);
        $this->assertSame($expected, $actual);
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(ScraperDataProvider::class, 'filterByIdPrefixesProvider')]
    public function testFilterByIdPrefixes(array $arguments, array $expected): void
    {
        $crawler = $this->scraperMock->request('GET', 'https://en.wikipedia.org/wiki/PHP');
        $actual = Scraper::filterByIdPrefixes($crawler, ...$arguments);
        $this->assertSame($expected, $actual);
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(ScraperDataProvider::class, 'filterByClassPrefixProvider')]
    public function testFilterByClassPrefix(array $arguments, array $expected): void
    {
        $crawler = $this->scraperMock->request('GET', 'https://en.wikipedia.org/wiki/PHP');
        $actual = Scraper::filterByClassPrefix($crawler, ...$arguments);
        $this->assertSame($expected, $actual);
    }

    /**
     * @param  array  $arguments
     * @param  array  $expected
     * @return void
     */
    #[DataProviderExternal(ScraperDataProvider::class, 'filterByClassPrefixesProvider')]
    public function testFilterByClassPrefixes(array $arguments, array $expected): void
    {
        $crawler = $this->scraperMock->request('GET', 'https://en.wikipedia.org/wiki/PHP');
        $actual = Scraper::filterByClassPrefixes($crawler, ...$arguments);
        $this->assertSame($expected, $actual);
    }
}
