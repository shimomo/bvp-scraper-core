<?php

declare(strict_types=1);

namespace BVP\ScraperCore\Tests;

use BVP\ScraperCore\Spec;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

/**
 * @author shimomo
 */
final class SpecTest extends TestCase
{
    /**
     * @psalm-param non-empty-list<int<1, 24>> $expected
     * @psalm-return void
     *
     * @param array $expected
     * @return void
     */
    #[DataProviderExternal(SpecDataProvider::class, 'stadiumNumbersProvider')]
    public function testStadiumNumbers(array $expected): void
    {
        $this->assertSame($expected, Spec::stadiumNumbers());
    }

    /**
     * @psalm-param non-empty-list<int<1, 12>> $expected
     * @psalm-return void
     *
     * @param array $expected
     * @return void
     */
    #[DataProviderExternal(SpecDataProvider::class, 'numbersProvider')]
    public function testNumbers(array $expected): void
    {
        $this->assertSame($expected, Spec::numbers());
    }
}
