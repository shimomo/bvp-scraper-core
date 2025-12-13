<?php

declare(strict_types=1);

namespace BVP\ScraperCore\Tests;

use BVP\ScraperCore\Normalizer;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

/**
 * @author shimomo
 */
final class NormalizerTest extends TestCase
{
    /**
     * @psalm-param non-empty-list<int|float|string|array|null> $arguments
     * @psalm-param int|float|non-empty-string|non-empty-list<int|float|non-empty-string> $expected
     * @psalm-return void
     *
     * @param array $arguments
     * @param int|float|string|array $expected
     * @return void
     */
    #[DataProviderExternal(NormalizerDataProvider::class, 'normalizeProvider')]
    public function testNormalize(array $arguments, int|float|string|array $expected): void
    {
        $data = array_shift($arguments);

        /** @psalm-var array<string, bool> */
        $options = array_shift($arguments) ?? [];

        $this->assertSame($expected, Normalizer::normalize($data, $options));
    }
}
