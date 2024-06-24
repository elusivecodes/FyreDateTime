<?php
declare(strict_types=1);

namespace Fyre\DateTime\Traits;

use DateTimeZone;
use IntlCalendar;

use function date_default_timezone_get;
use function locale_get_default;

/**
 * StaticTrait
 */
trait StaticTrait
{
    /**
     * Get the default locale.
     * @return string The default locale.
     */
    public static function getDefaultLocale(): string
    {
        return static::$defaultLocale ?? locale_get_default();
    }

    /**
     * Get the default timeZone.
     * @return string The default timeZone.
     */
    public static function getDefaultTimeZone(): string
    {
        return static::$defaultTimeZone ?? date_default_timezone_get();
    }

    /**
     * Set whether dates will be clamped when changing months.
     * @param bool $clampDates Whether to clamp dates.
     */
    public static function setDateClamping(bool $clampDates): void
    {
        static::$clampDates = $clampDates;
    }

    /**
     * Set the default locale.
     * @param string $locale The locale.
     */
    public static function setDefaultLocale(string|null $locale): void
    {
        static::$defaultLocale = $locale;
    }

    /**
     * Set the default timeZone.
     * @param string $timeZone The name of the timeZone.
     */
    public static function setDefaultTimeZone(string|null $timeZone): void
    {
        static::$defaultTimeZone = $timeZone;
    }

    /**
     * Create a new IntlCalendar.
     * @param int $time The number of milliseconds since the UNIX epoch.
     * @param DateTimeZone $timeZone The timeZone.
     * @param string $locale The locale.
     * @return IntlCalendar The new IntlCalendar.
     */
    protected static function createCalendar(int $time, DateTimeZone $timeZone, string $locale): IntlCalendar
    {
        $calendar = IntlCalendar::createInstance($timeZone, $locale);

        $calendar->setTime($time);

        return $calendar;
    }

    /**
     * Get the IntlCalendar constant for an adjustment field.
     * @param string $timeUnit The unit of time.
     * @return int The IntlCalendar constant.
     */
    protected static function getAdjustmentField(string $timeUnit): int
    {
        return match ($timeUnit) {
            'day' => IntlCalendar::FIELD_DATE,
            'hour' => IntlCalendar::FIELD_HOUR_OF_DAY,
            'millisecond' => IntlCalendar::FIELD_MILLISECOND,
            'minute' => IntlCalendar::FIELD_MINUTE,
            'month' => IntlCalendar::FIELD_MONTH,
            'second' => IntlCalendar::FIELD_SECOND,
            'week' => IntlCalendar::FIELD_WEEK_OF_YEAR,
            'year' => IntlCalendar::FIELD_YEAR
        };
    }

    /**
     * Get the IntlCalendar constant for a  field.
     * @param string $timeUnit The unit of time.
     * @return int The IntlCalendar constant.
     */
    protected static function getField(string $timeUnit): int
    {
        return match ($timeUnit) {
            'date' => IntlCalendar::FIELD_DATE,
            'day' => IntlCalendar::FIELD_DAY_OF_WEEK,
            'dayOfYear' => IntlCalendar::FIELD_DAY_OF_YEAR,
            'era' => IntlCalendar::FIELD_ERA,
            'hour' => IntlCalendar::FIELD_HOUR_OF_DAY,
            'millisecond' => IntlCalendar::FIELD_MILLISECOND,
            'minute' => IntlCalendar::FIELD_MINUTE,
            'month' => IntlCalendar::FIELD_MONTH,
            'second' => IntlCalendar::FIELD_SECOND,
            'week' => IntlCalendar::FIELD_WEEK_OF_YEAR,
            'weekDay' => IntlCalendar::FIELD_DOW_LOCAL,
            'weekDayInMonth' => IntlCalendar::FIELD_DAY_OF_WEEK_IN_MONTH,
            'weekOfMonth' => IntlCalendar::FIELD_WEEK_OF_MONTH,
            'weekYear' => IntlCalendar::FIELD_YEAR_WOY,
            'year' => IntlCalendar::FIELD_YEAR
        };
    }

    /**
     * Parse a locale value.
     * @param string|null $locale The locale.
     * @return string The parsed locale.
     */
    protected static function parseLocale(string|null $locale = null): string
    {
        return $locale ?? static::getDefaultLocale();
    }

    /**
     * Parse a timeZone value.
     * @param string|null $timeZone The timeZone.
     * @return DateTimeZone The parsed timeZone.
     */
    protected static function parseTimeZone(string|null $timeZone = null): DateTimeZone
    {
        return new DateTimeZone($timeZone ?? static::getDefaultTimeZone());
    }
}
