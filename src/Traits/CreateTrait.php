<?php
declare(strict_types=1);

namespace Fyre\DateTime\Traits;

use DateTimeInterface;
use IntlDateFormatter;

use function array_combine;
use function array_pad;

/**
 * CreateTrait
 */
trait CreateTrait
{
    /**
     * Create a new DateTime from an array.
     *
     * @param array $dateArray The date to parse.
     * @param string|null $timeZone The timeZone to use.
     * @param string|null $locale The locale to use.
     * @return DateTime A new DateTime.
     */
    public static function fromArray(array $dateArray, string|null $timeZone = null, string|null $locale = null): static
    {
        $dateTime = new static(null, $timeZone, $locale);

        $dateArray = array_pad($dateArray, 3, 1);
        $dateArray = array_pad($dateArray, 7, 0);

        $keys = ['year', 'month', 'date', 'hour', 'minute', 'second', 'millisecond'];
        $dateArray[1]--;

        $values = array_combine($keys, $dateArray);

        return $dateTime->setCalendarFields($values);
    }

    /**
     * Create a new DateTime from a native DateTime.
     *
     * @param DateTimeInterface $dateTime The native DateTime.
     * @param string|null $timeZone The timeZone to use.
     * @param string|null $locale The locale to use.
     * @return DateTime A new DateTime.
     */
    public static function fromDateTime(DateTimeInterface $dateTime, string|null $timeZone = null, string|null $locale = null): static
    {
        return static::fromTimestamp($dateTime->getTimestamp(), $timeZone ?? $dateTime->format('e'), $locale);
    }

    /**
     * Create a new DateTime from a format string.
     *
     * @param string $formatString The format string.
     * @param string $dateString The date string.
     * @param string|null $timeZone The timeZone to use.
     * @param string|null $locale The locale to use.
     * @return DateTime A new DateTime.
     */
    public static function fromFormat(string $formatString, string $dateString, string|null $timeZone = null, string|null $locale = null): static
    {
        $timestamp = (new IntlDateFormatter(
            static::parseLocale($locale),
            IntlDateFormatter::FULL,
            IntlDateFormatter::FULL,
            static::parseTimeZone($timeZone),
            null,
            $formatString
        ))->parse($dateString);

        return static::fromTimestamp((int) $timestamp, $timeZone, $locale);
    }

    /**
     * Create a new DateTime from an ISO format string.
     *
     * @param string $dateString The date string.
     * @param string|null $timeZone The timeZone to use.
     * @param string|null $locale The locale to use.
     * @return DateTime A new DateTime.
     */
    public static function fromISOString(string $dateString, string|null $timeZone = null, string|null $locale = null): static
    {
        $timestamp = (new IntlDateFormatter(
            'en',
            IntlDateFormatter::FULL,
            IntlDateFormatter::FULL,
            null,
            null,
            static::FORMATS['rfc3339_extended']
        ))->parse($dateString);

        return static::fromTimestamp($timestamp, $timeZone, $locale);
    }

    /**
     * Create a new DateTime from a timestamp.
     *
     * @param int $timestamp The timestamp.
     * @param string|null $timeZone The timeZone to use.
     * @param string|null $locale The locale to use.
     * @return DateTime A new DateTime.
     */
    public static function fromTimestamp(int $timestamp, string|null $timeZone = null, string|null $locale = null): static
    {
        return new static('@'.$timestamp, $timeZone, $locale);
    }

    /**
     * Create a new DateTime for the current time.
     *
     * @param string|null $timeZone The timeZone to use.
     * @param string|null $locale The locale to use.
     * @return DateTime A new DateTime.
     */
    public static function now(string|null $timeZone = null, string|null $locale = null): static
    {
        return new static('now', $timeZone, $locale);
    }
}
