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
     * @return void
     */
    #[DataProviderExternal(NormalizerDataProvider::class, 'normalizeProvider')]
    public function testNormalize(array $arguments, array|string|float|int $expected): void
    {
        $this->assertSame($expected, Normalizer::normalize(...$arguments));
    }
}
