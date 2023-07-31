<?php
declare(strict_types=1);

namespace Fyre\DateTime\Traits;

use DateTimeZone;
use IntlCalendar;
use InvalidArgumentException;

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
     * @throws InvalidArgumentException if the time unit is not valid.
     */
    protected static function getAdjustmentField(string $timeUnit): int
    {
        switch ($timeUnit) {
            case 'millisecond':
            case 'milliseconds':
                return IntlCalendar::FIELD_MILLISECOND;
            case 'second':
            case 'seconds':
                return IntlCalendar::FIELD_SECOND;
            case 'minute':
            case 'minutes':
                return IntlCalendar::FIELD_MINUTE;
            case 'hour':
            case 'hours':
                return IntlCalendar::FIELD_HOUR_OF_DAY;
            case 'week':
            case 'weeks':
                return IntlCalendar::FIELD_WEEK_OF_YEAR;
            case 'day':
            case 'days':
                return IntlCalendar::FIELD_DATE;
            case 'month':
            case 'months':
                return IntlCalendar::FIELD_MONTH;
            case 'year':
            case 'years':
                return IntlCalendar::FIELD_YEAR;
            default:
                throw new InvalidArgumentException('Invalid time unit supplied');
        }
    }

    /**
     * Get the IntlCalendar constant for a  field.
     * @param string $timeUnit The unit of time.
     * @return int The IntlCalendar constant.
     * @throws InvalidArgumentException if the time unit is not valid.
     */
    protected static function getField(string $timeUnit): int
    {
        switch ($timeUnit) {
            case 'date':
                return IntlCalendar::FIELD_DATE;
            case 'day':
                return IntlCalendar::FIELD_DAY_OF_WEEK;
            case 'dayOfYear':
                return IntlCalendar::FIELD_DAY_OF_YEAR;
            case 'era':
                return IntlCalendar::FIELD_ERA;
            case 'hour':
                return IntlCalendar::FIELD_HOUR_OF_DAY;
            case 'millisecond':
                return IntlCalendar::FIELD_MILLISECOND;
            case 'minute':
                return IntlCalendar::FIELD_MINUTE;
            case 'month':
                return IntlCalendar::FIELD_MONTH;
            case 'second':
                return IntlCalendar::FIELD_SECOND;
            case 'week':
                return IntlCalendar::FIELD_WEEK_OF_YEAR;
            case 'weekDay':
                return IntlCalendar::FIELD_DOW_LOCAL;
            case 'weekDayInMonth':
                return IntlCalendar::FIELD_DAY_OF_WEEK_IN_MONTH;
            case 'weekOfMonth':
                return IntlCalendar::FIELD_WEEK_OF_MONTH;
            case 'weekYear':
                return IntlCalendar::FIELD_YEAR_WOY;
            case 'year':
                return IntlCalendar::FIELD_YEAR;
            default:
                throw new InvalidArgumentException('Invalid time unit supplied');
        }
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
