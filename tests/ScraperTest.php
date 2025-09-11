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
     * @psalm-var \Symfony\Component\BrowserKit\HttpBrowser
     *
     * @var \Symfony\Component\BrowserKit\HttpBrowser
     */
    private HttpBrowser $scraperMock;

    /**
     * @psalm-return void
     *
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
     * @psalm-return void
     *
     * @return void
     */
    public function testGetInstance(): void
    {
        $this->assertInstanceOf(HttpBrowser::class, Scraper::getInstance());
    }

    /**
     * @psalm-return void
     *
     * @return void
     */
    public function testCreateInstance(): void
    {
        $this->assertInstanceOf(HttpBrowser::class, Scraper::createInstance());
    }

    /**
     * @psalm-return void
     *
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
     * @psalm-param array<int, string> $arguments
     * @psalm-param array<int, string> $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param array $expected
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
     * @psalm-param array<int, array<int, string>> $arguments
     * @psalm-param array<string, array<int, string>> $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param array $expected
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
     * @psalm-param array<int, string> $arguments
     * @psalm-param array<int, string> $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param array $expected
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
     * @psalm-param array<int, array<int, string>> $arguments
     * @psalm-param array<string, array<int, string>> $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param array $expected
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
     * @psalm-param array<int, string> $arguments
     * @psalm-param array<int, string> $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param array $expected
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
     * @psalm-param array<int, array<int, string>> $arguments
     * @psalm-param array<string, array<int, string>> $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param array $expected
     * @return void
     */
    #[DataProviderExternal(ScraperDataProvider::class, 'filterByClassPrefixesProvider')]
    public function testFilterByClassPrefixes(array $arguments, array $expected): void
    {
        $crawler = $this->scraperMock->request('GET', 'https://en.wikipedia.org/wiki/PHP');
        $actual = Scraper::filterByClassPrefixes($crawler, ...$arguments);
        $this->assertSame($expected, $actual);
    }

    /**
     * @psalm-param non-empty-string $argument
     * @psalm-param non-empty-string $expected
     * @psalm-return void
     *
     * @param string $argument
     * @param string $expected
     * @return void
     */
    #[DataProviderExternal(ScraperDataProvider::class, 'filterXPath')]
    public function testFilterXPath(string $argument, string $expected): void
    {
        $crawler = $this->scraperMock->request('GET', 'https://en.wikipedia.org/wiki/PHP');
        $actual = Scraper::filterXPath($crawler, $argument);
        $this->assertSame($expected, $actual);
    }
}
