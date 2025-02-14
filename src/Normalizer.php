<?php

declare(strict_types=1);

namespace BVP\ScraperCore;

use BVP\Converter\Converter;
use BVP\Trimmer\Trimmer;

/**
 * @author shimomo
 */
final class Normalizer
{
    /**
     * @var array
     */
    private static array $defaultOptions = [
        'shouldRemoveAllSpaces' => false,
        'shouldRemoveAllNumbers' => false,
        'shouldRemoveAllNotNumbers' => false,
    ];

    /**
     * @param  array|string|float|int|null  $data
     * @param  array                        $options
     * @return array|string|float|int|null
     */
    public static function normalize(array|string|float|int|null $data, array $options = []): array|string|float|int|null
    {
        if (is_float($data) || is_int($data) || is_null($data)) {
            return $data;
        }

        if (is_numeric($data) && str_contains($data, '.')) {
            return Converter::float($data);
        }

        if (is_numeric($data) && !str_contains($data, '.')) {
            return Converter::int($data);
        }

        if (is_array($data)) {
            return array_map(fn($value) => self::normalize($value, $options), $data);
        }

        $options = array_merge(
            self::$defaultOptions,
            self::convertArrayKeysToCamelCase($options)
        );

        $data = Converter::string($data);

        $data = self::normalizeSpaces($data, $options);
        $data = self::normalizeNumbers($data, $options);
        $data = self::normalizeNotNumbers($data, $options);

        return Trimmer::trim($data);
    }

    /**
     * @param  string  $value
     * @param  array   $options
     * @return string
     */
    private static function normalizeSpaces(string $value, array $options): string
    {
        if ($options['shouldRemoveAllSpaces']) {
            return preg_replace('/\s+/u', '', $value);
        } else {
            return preg_replace('/\s+/u', ' ', $value);
        }
    }

    /**
     * @param  string  $value
     * @param  array   $options
     * @return string
     */
    private static function normalizeNumbers(string $value, array $options): string
    {
        if ($options['shouldRemoveAllNumbers']) {
            return preg_replace('/\d/u', '', $value);
        } else {
            return $value;
        }
    }

    /**
     * @param  string  $value
     * @param  array   $options
     * @return string
     */
    private static function normalizeNotNumbers(string $value, array $options): string
    {
        if ($options['shouldRemoveAllNotNumbers']) {
            return preg_replace('/\D/u', '', $value);
        } else {
            return $value;
        }
    }

    /**
     * @param  string  $value
     * @return string
     */
    private static function convertToCamelCase(string $value): string
    {
        return lcfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $value))));
    }

    /**
     * @param  array  $array
     * @return array
     */
    private static function convertArrayKeysToCamelCase(array $array): array
    {
        $response = [];
        foreach ($array as $key => $value) {
            $response[self::convertToCamelCase($key)] = $value;
        }

        return $response;
    }
}
