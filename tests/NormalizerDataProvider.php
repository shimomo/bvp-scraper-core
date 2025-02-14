<?php

declare(strict_types=1);

namespace BVP\ScraperCore\Tests;

/**
 * @author shimomo
 */
final class NormalizerDataProvider
{
    /**
     * @return array
     */
    public static function normalizeProvider(): array
    {
        return [
            ['arguments' => [1.0], 'expected' => 1.0],
            ['arguments' => [1], 'expected' => 1],
            ['arguments' => ['1.0'], 'expected' => 1.0],
            ['arguments' => ['1'], 'expected' => 1],
            ['arguments' => [' ScraperCore1.0 '], 'expected' => 'ScraperCore1.0'],
            ['arguments' => [' ScraperCore1 '], 'expected' => 'ScraperCore1'],
            ['arguments' => [' Scraper Core1.0 '], 'expected' => 'Scraper Core1.0'],
            ['arguments' => [' Scraper Core1 '], 'expected' => 'Scraper Core1'],
            ['arguments' => [' Scraper  Core1.0 '], 'expected' => 'Scraper Core1.0'],
            ['arguments' => [' Scraper  Core1 '], 'expected' => 'Scraper Core1'],
            ['arguments' => [' Scraper  Core1.0 ', ['shouldRemoveAllSpaces' => true]], 'expected' => 'ScraperCore1.0'],
            ['arguments' => [' Scraper  Core1 ', ['shouldRemoveAllSpaces' => true]], 'expected' => 'ScraperCore1'],
            ['arguments' => [' Scraper  Core1.0 ', ['shouldRemoveAllNumbers' => true]], 'expected' => 'Scraper Core.'],
            ['arguments' => [' Scraper  Core1 ', ['shouldRemoveAllNumbers' => true]], 'expected' => 'Scraper Core'],
            ['arguments' => [' Scraper  Core1.0 ', ['shouldRemoveAllNotNumbers' => true]], 'expected' => '10'],
            ['arguments' => [' Scraper  Core1 ', ['shouldRemoveAllNotNumbers' => true]], 'expected' => '1'],
            ['arguments' => [[1.0, 1]], 'expected' => [1.0, 1]],
            ['arguments' => [['1.0', '1']], 'expected' => [1.0, 1]],
            ['arguments' => [[' ScraperCore1.0 ', ' ScraperCore1 ']], 'expected' => ['ScraperCore1.0', 'ScraperCore1']],
            ['arguments' => [[' Scraper Core1.0 ', ' Scraper Core1 ']], 'expected' => ['Scraper Core1.0', 'Scraper Core1']],
            ['arguments' => [[' Scraper  Core1.0 ', ' Scraper  Core1 ']], 'expected' => ['Scraper Core1.0', 'Scraper Core1']],
            ['arguments' => [[' Scraper  Core1.0 ', ' Scraper  Core1 '], ['shouldRemoveAllSpaces' => true]], 'expected' => ['ScraperCore1.0', 'ScraperCore1']],
            ['arguments' => [[' Scraper  Core1.0 ', ' Scraper  Core1 '], ['shouldRemoveAllNumbers' => true]], 'expected' => ['Scraper Core.', 'Scraper Core']],
            ['arguments' => [[' Scraper  Core1.0 ', ' Scraper  Core1 '], ['shouldRemoveAllNotNumbers' => true]], 'expected' => ['10', '1']],
        ];
    }
}
