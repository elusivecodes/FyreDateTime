<?php
declare(strict_types=1);

namespace Fyre\DateTime;

use DateMalformedStringException;
use DateTimeImmutable;
use DateTimeInterface;
use DateTimeZone;
use Fyre\Utility\Traits\MacroTrait;
use Fyre\Utility\Traits\StaticMacroTrait;
use IntlCalendar;
use IntlDateFormatter;
use JsonSerializable;
use Stringable;

use function abs;
use function array_combine;
use function array_pad;
use function ceil;
use function date_default_timezone_get;
use function floor;
use function intl_get_error_code;
use function intl_get_error_message;
use function locale_get_default;
use function min;
use function str_pad;
use function strtolower;

use const STR_PAD_LEFT;

/**
 * DateTime
 */
class DateTime implements JsonSerializable, Stringable
{
    use MacroTrait;
    use StaticMacroTrait;

    public const FORMATS = [
        'atom' => 'yyyy-MM-dd\'T\'HH:mm:ssxxx',
        'cookie' => 'eeee, dd-MMM-yyyy HH:mm:ss ZZZZ',
        'date' => 'eee MMM dd yyyy',
        'iso8601' => 'yyyy-MM-dd\'T\'HH:mm:ssxx',
        'rfc822' => 'eee, dd MMM yy HH:mm:ss xx',
        'rfc850' => 'eeee dd-MMM-yy HH:mm:ss ZZZZ',
        'rfc1036' => 'eee, dd MMM yy HH:mm:ss xx',
        'rfc1123' => 'eee, dd MMM yyyy HH:mm:ss xx',
        'rfc2822' => 'eee, dd MMM yyyy HH:mm:ss xx',
        'rfc3339' => 'yyyy-MM-dd\'T\'HH:mm:ssxxx',
        'rfc3339_extended' => 'yyyy-MM-dd\'T\'HH:mm:ss.SSSxxx',
        'rss' => 'eee, dd MMM yyyy HH:mm:ss xx',
        'string' => 'eee MMM dd yyyy HH:mm:ss xx (VV)',
        'time' => 'HH:mm:ss xx (VV)',
        'w3c' => 'yyyy-MM-dd\'T\'HH:mm:ssxxx',
    ];

    protected static bool $clampDates = true;

    protected static string|null $defaultLocale = null;

    protected static string|null $defaultTimeZone = null;

    protected static array $formatters;

    protected readonly IntlCalendar $calendar;

    protected readonly string $locale;

    /**
     * Create a new DateTime from an array.
     *
     * @param array $dateArray The date to parse.
     * @param string|null $timeZone The time zone to use.
     * @param string|null $locale The locale to use.
     * @return DateTime A new DateTime.
     */
    public static function createFromArray(array $dateArray, string|null $timeZone = null, string|null $locale = null): static
    {
        $dateTime = new static(null, $timeZone, $locale);

        $dateArray = array_pad($dateArray, 3, 1);
        $dateArray = array_pad($dateArray, 7, 0);

        $keys = ['year', 'month', 'date', 'hour', 'minute', 'second', 'millisecond'];
        $dateArray[1]--;

        $values = array_combine($keys, $dateArray);

        return $dateTime->withCalendarFields($values);
    }

    /**
     * Create a new DateTime from a format string.
     *
     * @param string $formatString The format string.
     * @param string $dateString The date string.
     * @param string|null $timeZone The time zone to use.
     * @param string|null $locale The locale to use.
     * @return DateTime A new DateTime.
     *
     * @throws DateMalformedStringException if the date string is not in the correct format.
     */
    public static function createFromFormat(string $formatString, string $dateString, string|null $timeZone = null, string|null $locale = null): static
    {
        $locale = static::parseLocale($locale);
        $timeZone = static::parseTimeZone($timeZone);
        $timeZoneName = $timeZone->getName();

        $key = $locale.$timeZoneName.$formatString;

        static::$formatters[$key] ??= new IntlDateFormatter(
            $locale,
            IntlDateFormatter::FULL,
            IntlDateFormatter::FULL,
            $timeZone,
            null,
            $formatString
        );

        $timestamp = static::$formatters[$key]->parse($dateString);

        $code = intl_get_error_code();

        if ($code !== 0) {
            $message = intl_get_error_message();

            throw new DateMalformedStringException($message, $code);
        }

        return static::createFromTimestamp((int) $timestamp, $timeZoneName, $locale);
    }

    /**
     * Create a new DateTime from an ISO format string.
     *
     * @param string $dateString The date string.
     * @param string|null $timeZone The time zone to use.
     * @param string|null $locale The locale to use.
     * @return DateTime A new DateTime.
     */
    public static function createFromIsoString(string $dateString, string|null $timeZone = null, string|null $locale = null): static
    {
        return static::createFromFormat(static::FORMATS['rfc3339_extended'], $dateString, $timeZone, 'en')
            ->withLocale($locale ?? static::getDefaultLocale());
    }

    /**
     * Create a new DateTime from a native DateTime.
     *
     * @param DateTimeInterface $dateTime The native DateTime.
     * @param string|null $timeZone The time zone to use.
     * @param string|null $locale The locale to use.
     * @return DateTime A new DateTime.
     */
    public static function createFromNativeDateTime(DateTimeInterface $dateTime, string|null $timeZone = null, string|null $locale = null): static
    {
        return static::createFromTimestamp($dateTime->getTimestamp(), $timeZone ?? $dateTime->format('e'), $locale)
            ->withMilliseconds((int) $dateTime->format('v'));
    }

    /**
     * Create a new DateTime from a timestamp.
     *
     * @param int $timestamp The timestamp.
     * @param string|null $timeZone The time zone to use.
     * @param string|null $locale The locale to use.
     * @return DateTime A new DateTime.
     */
    public static function createFromTimestamp(int $timestamp, string|null $timeZone = null, string|null $locale = null): static
    {
        return new static('@'.$timestamp, $timeZone, $locale);
    }

    /**
     * Get the default locale.
     *
     * @return string The default locale.
     */
    public static function getDefaultLocale(): string
    {
        return static::$defaultLocale ??= locale_get_default();
    }

    /**
     * Get the default time zone.
     *
     * @return string The default time zone.
     */
    public static function getDefaultTimeZone(): string
    {
        return static::$defaultTimeZone ??= date_default_timezone_get();
    }

    /**
     * Create a new DateTime for the current time.
     *
     * @param string|null $timeZone The time zone to use.
     * @param string|null $locale The locale to use.
     * @return DateTime A new DateTime.
     */
    public static function now(string|null $timeZone = null, string|null $locale = null): static
    {
        return new static('now', $timeZone, $locale);
    }

    /**
     * Set the default locale.
     *
     * @param string|null $locale The locale.
     */
    public static function setDefaultLocale(string|null $locale): void
    {
        static::$defaultLocale = $locale;
    }

    /**
     * Set the default time zone.
     *
     * @param string|null $timeZone The time zone.
     */
    public static function setDefaultTimeZone(string|null $timeZone): void
    {
        static::$defaultTimeZone = $timeZone;
    }

    /**
     * Set whether dates will be clamped when changing months.
     *
     * @param bool $clampDates Whether to clamp dates.
     */
    public static function withDateClamping(bool $clampDates): void
    {
        static::$clampDates = $clampDates;
    }

    /**
     * New DateTime constructor.
     *
     * @param string|null $timeZone The time zone to use.
     * @param string|null $locale The locale to use.
     * @param string|null $dateString The date to parse.
     */
    public function __construct(string|null $time = null, string|null $timeZone = null, string|null $locale = null)
    {
        $this->locale = static::parseLocale($locale);

        $timeZone = static::parseTimeZone($timeZone);
        $dateTime = new DateTimeImmutable($time ?? 'now', $timeZone);
        $timestampMs = ($dateTime->getTimestamp() * 1000) + $dateTime->format('v');

        $this->calendar = static::createCalendar($timestampMs, $timeZone, $this->locale);
    }

    /**
     * Get the debug info of the object.
     *
     * @return array The debug info.
     */
    public function __debugInfo(): array
    {
        return [
            'time' => $this->toIsoString(),
            'timeZone' => $this->getTimeZone(),
            'locale' => $this->getLocale(),
        ];
    }

    /**
     * Serialize the object.
     *
     * @return array The serialized data.
     */
    public function __serialize(): array
    {
        return [
            'time' => $this->getTime(),
            'timeZone' => $this->getTimeZone(),
            'locale' => $this->getLocale(),
        ];
    }

    /**
     * Format the current date using "eee MMM dd yyyy HH:mm:ss xx (VV)".
     *
     * @return string The formatted date string.
     */
    public function __toString(): string
    {
        return $this->toString();
    }

    /**
     * Unserialize the object.
     *
     * @param array $data The serialized data.
     */
    public function __unserialize(array $data): void
    {
        $this->__construct(null, $data['timeZone'] ?? null, $data['locale'] ?? null);
        $this->calendar->setTime($data['time'] ?? 0);
    }

    /**
     * Add a day to the current DateTime.
     *
     * @return DateTime A new DateTime.
     */
    public function addDay(): static
    {
        return $this->addDays(1);
    }

    /**
     * Add days to the current DateTime.
     *
     * @param int $amount The number of days to add.
     * @return DateTime A new DateTime.
     */
    public function addDays(int $amount): static
    {
        return $this->withCalendarFields([
            'day' => $amount,
        ], true);
    }

    /**
     * Add an hour to the current DateTime.
     *
     * @return DateTime A new DateTime.
     */
    public function addHour(): static
    {
        return $this->addHours(1);
    }

    /**
     * Add hours to the current DateTime.
     *
     * @param int $amount The number of hours to add.
     * @return DateTime A new DateTime.
     */
    public function addHours(int $amount): static
    {
        return $this->withCalendarFields([
            'hour' => $amount,
        ], true);
    }

    /**
     * Add a minute to the current DateTime.
     *
     * @return DateTime A new DateTime.
     */
    public function addMinute(): static
    {
        return $this->addMinutes(1);
    }

    /**
     * Add minutes to the current DateTime.
     *
     * @param int $amount The number of minutes to add.
     * @return DateTime A new DateTime.
     */
    public function addMinutes(int $amount): static
    {
        return $this->withCalendarFields([
            'minute' => $amount,
        ], true);
    }

    /**
     * Add a month to the current DateTime.
     *
     * @return DateTime A new DateTime.
     */
    public function addMonth(): static
    {
        return $this->addMonths(1);
    }

    /**
     * Add months to the current DateTime.
     *
     * @param int $amount The number of months to add.
     * @return DateTime A new DateTime.
     */
    public function addMonths(int $amount): static
    {
        return $this->withCalendarFields([
            'month' => $amount,
        ], true);
    }

    /**
     * Add a second to the current DateTime.
     *
     * @return DateTime A new DateTime.
     */
    public function addSecond(): static
    {
        return $this->addSeconds(1);
    }

    /**
     * Add seconds to the current DateTime.
     *
     * @param int $amount The number of seconds to add.
     * @return DateTime A new DateTime.
     */
    public function addSeconds(int $amount): static
    {
        return $this->withCalendarFields([
            'second' => $amount,
        ], true);
    }

    /**
     * Add a week to the current DateTime.
     *
     * @return DateTime A new DateTime.
     */
    public function addWeek(): static
    {
        return $this->addWeeks(1);
    }

    /**
     * Add weeks to the current DateTime.
     *
     * @param int $amount The number of weeks to add.
     * @return DateTime A new DateTime.
     */
    public function addWeeks(int $amount): static
    {
        return $this->withCalendarFields([
            'week' => $amount,
        ], true);
    }

    /**
     * Add a year to the current DateTime.
     *
     * @return DateTime A new DateTime.
     */
    public function addYear(): static
    {
        return $this->addYears(1);
    }

    /**
     * Add years to the current DateTime.
     *
     * @param int $amount The number of years to add.
     * @return DateTime A new DateTime.
     */
    public function addYears(int $amount): static
    {
        return $this->withCalendarFields([
            'year' => $amount,
        ], true);
    }

    /**
     * Get the name of the day of the week in current time zone.
     *
     * @param string $type The type of day name to return.
     * @return string|null The name of the day of the week.
     */
    public function dayName($type = 'long'): string|null
    {
        $type = strtolower($type);

        return match ($type) {
            'short' => $this->format('ccc'),
            'long' => $this->format('cccc'),
            'narrow' => $this->format('ccccc'),
            default => null
        };
    }

    /**
     * Get the day period in current time zone.
     *
     * @param string $type The type of day period to return.
     * @return string|null The day period.
     */
    public function dayPeriod($type = 'long'): string|null
    {
        $type = strtolower($type);

        return match ($type) {
            'short' => $this->format('aaa'),
            'long' => $this->format('aaaa'),
            default => null
        };
    }

    /**
     * Get the number of days in the current month.
     *
     * @return int The number of days in the current month.
     */
    public function daysInMonth(): int
    {
        return (int) $this->toNativeDateTime()->format('t');
    }

    /**
     * Get the number of days in the current year.
     *
     * @return int The number of days in the current year.
     */
    public function daysInYear(): int
    {
        return $this->isLeapYear() ? 366 : 365;
    }

    /**
     * Get the difference between this and another Date in milliseconds.
     *
     * @param DateTime $other The date to compare to.
     * @return int The difference in milliseconds.
     */
    public function diff(DateTime $other): int
    {
        return $this->getTime() - $other->getTime();
    }

    /**
     * Get the difference between this and another Date in days.
     *
     * @param DateTime $other The date to compare to.
     * @param bool $relative Whether to use the relative difference.
     * @return int The difference in days.
     */
    public function diffInDays(DateTime $other, bool $relative = true): int
    {
        return $this->calculateDiff($other, 'day', $relative);
    }

    /**
     * Get the difference between this and another Date in hours.
     *
     * @param DateTime $other The date to compare to.
     * @param bool $relative Whether to use the relative difference.
     * @return int The difference in hours.
     */
    public function diffInHours(DateTime $other, bool $relative = true): int
    {
        return $this->calculateDiff($other, 'hour', $relative);
    }

    /**
     * Get the difference between this and another Date in minutes.
     *
     * @param DateTime $other The date to compare to.
     * @param bool $relative Whether to use the relative difference.
     * @return int The difference in minutes.
     */
    public function diffInMinutes(DateTime $other, bool $relative = true): int
    {
        return $this->calculateDiff($other, 'minute', $relative);
    }

    /**
     * Get the difference between this and another Date in months.
     *
     * @param DateTime $other The date to compare to.
     * @param bool $relative Whether to use the relative difference.
     * @return int The difference in months.
     */
    public function diffInMonths(DateTime $other, bool $relative = true): int
    {
        return $this->calculateDiff($other, 'month', $relative);
    }

    /**
     * Get the difference between this and another Date in seconds.
     *
     * @param DateTime $other The date to compare to.
     * @param bool $relative Whether to use the relative difference.
     * @return int The difference in seconds.
     */
    public function diffInSeconds(DateTime $other, bool $relative = true): int
    {
        return $this->calculateDiff($other, 'second', $relative);
    }

    /**
     * Get the difference between this and another Date in weeks.
     *
     * @param DateTime $other The date to compare to.
     * @param bool $relative Whether to use the relative difference.
     * @return int The difference in weeks.
     */
    public function diffInWeeks(DateTime $other, bool $relative = true): int
    {
        return $this->calculateDiff($other, 'week', $relative);
    }

    /**
     * Get the difference between this and another Date in years.
     *
     * @param DateTime $other The date to compare to.
     * @param bool $relative Whether to use the relative difference.
     * @return int The difference in years.
     */
    public function diffInYears(DateTime $other, bool $relative = true): int
    {
        return $this->calculateDiff($other, 'year', $relative);
    }

    /**
     * Set the DateTime to the end of the day.
     *
     * @return DateTime A new DateTime.
     */
    public function endOfDay(): static
    {
        return $this->withHours(23, 59, 59, 999);
    }

    /**
     * Set the DateTime to the end of the hour.
     *
     * @return DateTime A new DateTime.
     */
    public function endOfHour(): static
    {
        return $this->withMinutes(59, 59, 999);
    }

    /**
     * Set the DateTime to the end of the minute.
     *
     * @return DateTime A new DateTime.
     */
    public function endOfMinute(): static
    {
        return $this->withSeconds(59, 999);
    }

    /**
     * Set the DateTime to the end of the month.
     *
     * @return DateTime A new DateTime.
     */
    public function endOfMonth(): static
    {
        return $this->withDate($this->daysInMonth())
            ->endOfDay();
    }

    /**
     * Set the DateTime to the end of the quarter.
     *
     * @return DateTime A new DateTime.
     */
    public function endOfQuarter(): static
    {
        $month = $this->getQuarter() * 3;

        return $this->withMonth(
            $month,
            static::createFromArray([$this->getYear(), $month])->daysInMonth()
        )->endOfDay();
    }

    /**
     * Set the DateTime to the end of the second.
     *
     * @return DateTime A new DateTime.
     */
    public function endOfSecond(): static
    {
        return $this->withMilliseconds(999);
    }

    /**
     * Set the DateTime to the end of the week.
     *
     * @return DateTime A new DateTime.
     */
    public function endOfWeek(): static
    {
        return $this->withWeekDay(7)
            ->endOfDay();
    }

    /**
     * Set the DateTime to the end of the year.
     *
     * @return DateTime A new DateTime.
     */
    public function endOfYear(): static
    {
        return $this->withMonth(12, 31)
            ->endOfDay();
    }

    /**
     * Get the era in current time zone.
     *
     * @param string $type The type of era to return.
     * @return string|null The era.
     */
    public function era($type = 'long'): string|null
    {
        $type = strtolower($type);

        return match ($type) {
            'short' => $this->format('GGG'),
            'long' => $this->format('GGGG'),
            'narrow' => $this->format('GGGGG'),
            default => null
        };
    }

    /**
     * Format the current date using a format string.
     *
     * @param string $formatString The format string.
     * @return string The formatted date string.
     */
    public function format(string $formatString, string|null $locale = null): string
    {
        return IntlDateFormatter::formatObject($this->calendar, $formatString, $locale ?? $this->locale);
    }

    /**
     * Get the date of the month in current time zone.
     *
     * @return int The date of the month.
     */
    public function getDate(): int
    {
        return $this->getCalendarField('date');
    }

    /**
     * Get the day of the week in current time zone.
     *
     * @return int The day of the week. (0 - Sunday, 6 - Saturday)
     */
    public function getDay(): int
    {
        return $this->getCalendarField('day') - 1;
    }

    /**
     * Get the day of the year in current time zone.
     *
     * @return int The day of the year. (1, 366)
     */
    public function getDayOfYear(): int
    {
        return $this->getCalendarField('dayOfYear');
    }

    /**
     * Get the hours of the day in current time zone.
     *
     * @return int The hours of the day. (0, 23)
     */
    public function getHours(): int
    {
        return $this->getCalendarField('hour');
    }

    /**
     * Get the name of the current locale.
     *
     * @return string The name of the current locale.
     */
    public function getLocale(): string
    {
        return $this->locale;
    }

    /**
     * Get the milliseconds in current time zone.
     *
     * @return int The milliseconds.
     */
    public function getMilliseconds(): int
    {
        return $this->getCalendarField('millisecond');
    }

    /**
     * Get the minutes in current time zone.
     *
     * @return int The minutes. (0, 59)
     */
    public function getMinutes(): int
    {
        return $this->getCalendarField('minute');
    }

    /**
     * Get the month in current time zone.
     *
     * @return int The month. (1, 12)
     */
    public function getMonth(): int
    {
        return $this->getCalendarField('month') + 1;
    }

    /**
     * Get the quarter of the year in current time zone.
     *
     * @return int The quarter of the year. (1, 4)
     */
    public function getQuarter(): int
    {
        return (int) ceil($this->getMonth() / 3);
    }

    /**
     * Get the seconds in current time zone.
     *
     * @return int The seconds. (0, 59)
     */
    public function getSeconds(): int
    {
        return $this->getCalendarField('second');
    }

    /**
     * Get the number of milliseconds since the UNIX epoch.
     *
     * @return int The number of milliseconds since the UNIX epoch.
     */
    public function getTime(): int
    {
        return (int) $this->calendar->getTime();
    }

    /**
     * Get the number of seconds since the UNIX epoch.
     *
     * @return int The number of seconds since the UNIX epoch.
     */
    public function getTimestamp(): int
    {
        return (int) floor($this->getTime() / 1000);
    }

    /**
     * Get the name of the current time zone.
     *
     * @return string The name of the current time zone.
     */
    public function getTimeZone(): string
    {
        return $this->toNativeDateTime()->format('e');
    }

    /**
     * Get the UTC offset (in minutes) of the current time zone.
     *
     * @return int The UTC offset (in minutes) of the current time zone.
     */
    public function getTimeZoneOffset(): int
    {
        return $this->toNativeDateTime()->getOffset() / 60 * -1;
    }

    /**
     * Get the local week in current time zone.
     *
     * @return int The local week. (1, 53)
     */
    public function getWeek(): int
    {
        return $this->getCalendarField('week');
    }

    /**
     * Get the local day of the week in current time zone.
     *
     * @return int The local day of the week. (1 - 7)
     */
    public function getWeekDay(): int
    {
        return $this->getCalendarField('weekDay');
    }

    /**
     * Get the week day in month in current time zone.
     *
     * @return int The week day in month.
     */
    public function getWeekDayInMonth(): int
    {
        return $this->getCalendarField('weekDayInMonth');
    }

    /**
     * Get the week of month in current time zone.
     *
     * @return int The week of month.
     */
    public function getWeekOfMonth(): int
    {
        return $this->getCalendarField('weekOfMonth');
    }

    /**
     * Get the week year in current time zone.
     *
     * @return int The week year.
     */
    public function getWeekYear(): int
    {
        return $this->getCalendarField('weekYear');
    }

    /**
     * Get the year in current time zone.
     *
     * @return int The year.
     */
    public function getYear(): int
    {
        $eraAdjust = $this->getCalendarField('era') ? 1 : -1;

        return $this->getCalendarField('year') * $eraAdjust;
    }

    /**
     * Determine whether this DateTime is after another date.
     *
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is after the other date, otherwise FALSE.
     */
    public function isAfter(DateTime $other): bool
    {
        return $this->diff($other) > 0;
    }

    /**
     * Determine whether this DateTime is after another date (comparing by day).
     *
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is after the other date (comparing by day), otherwise FALSE.
     */
    public function isAfterDay(DateTime $other): bool
    {
        return $this->diffInDays($other) > 0;
    }

    /**
     * Determine whether this DateTime is after another date (comparing by hour).
     *
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is after the other date (comparing by hour), otherwise FALSE.
     */
    public function isAfterHour(DateTime $other): bool
    {
        return $this->diffInHours($other) > 0;
    }

    /**
     * Determine whether this DateTime is after another date (comparing by minute).
     *
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is after the other date (comparing by minute), otherwise FALSE.
     */
    public function isAfterMinute(DateTime $other): bool
    {
        return $this->diffInMinutes($other) > 0;
    }

    /**
     * Determine whether this DateTime is after another date (comparing by month).
     *
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is after the other date (comparing by month), otherwise FALSE.
     */
    public function isAfterMonth(DateTime $other): bool
    {
        return $this->diffInMonths($other) > 0;
    }

    /**
     * Determine whether this DateTime is after another date (comparing by second).
     *
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is after the other date (comparing by second), otherwise FALSE.
     */
    public function isAfterSecond(DateTime $other): bool
    {
        return $this->diffInSeconds($other) > 0;
    }

    /**
     * Determine whether this DateTime is after another date (comparing by week).
     *
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is after the other date (comparing by week), otherwise FALSE.
     */
    public function isAfterWeek(DateTime $other): bool
    {
        return $this->diffInWeeks($other) > 0;
    }

    /**
     * Determine whether this DateTime is after another date (comparing by year).
     *
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is after the other date (comparing by year), otherwise FALSE.
     */
    public function isAfterYear(DateTime $other): bool
    {
        return $this->diffInYears($other) > 0;
    }

    /**
     * Determine whether this DateTime is before another date.
     *
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is before the other date, otherwise FALSE.
     */
    public function isBefore(DateTime $other): bool
    {
        return $this->diff($other) < 0;
    }

    /**
     * Determine whether this DateTime is before another date (comparing by day).
     *
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is before the other date (comparing by day), otherwise FALSE.
     */
    public function isBeforeDay(DateTime $other): bool
    {
        return $this->diffInDays($other) < 0;
    }

    /**
     * Determine whether this DateTime is before another date (comparing by hour).
     *
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is before the other date (comparing by hour), otherwise FALSE.
     */
    public function isBeforeHour(DateTime $other): bool
    {
        return $this->diffInHours($other) < 0;
    }

    /**
     * Determine whether this DateTime is before another date (comparing by minute).
     *
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is before the other date (comparing by minute), otherwise FALSE.
     */
    public function isBeforeMinute(DateTime $other): bool
    {
        return $this->diffInMinutes($other) < 0;
    }

    /**
     * Determine whether this DateTime is before another date (comparing by month).
     *
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is before the other date (comparing by month), otherwise FALSE.
     */
    public function isBeforeMonth(DateTime $other): bool
    {
        return $this->diffInMonths($other) < 0;
    }

    /**
     * Determine whether this DateTime is before another date (comparing by second).
     *
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is before the other date (comparing by second), otherwise FALSE.
     */
    public function isBeforeSecond(DateTime $other): bool
    {
        return $this->diffInSeconds($other) < 0;
    }

    /**
     * Determine whether this DateTime is before another date (comparing by week).
     *
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is before the other date (comparing by week), otherwise FALSE.
     */
    public function isBeforeWeek(DateTime $other): bool
    {
        return $this->diffInWeeks($other) < 0;
    }

    /**
     * Determine whether this DateTime is before another date (comparing by year).
     *
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is before the other date (comparing by year), otherwise FALSE.
     */
    public function isBeforeYear(DateTime $other): bool
    {
        return $this->diffInYears($other) < 0;
    }

    /**
     * Determine whether this DateTime is between two other dates.
     *
     * @param DateTime $start The first date to compare to.
     * @param DateTime $end The second date to compare to.
     * @return bool TRUE if this DateTime is between the other dates, otherwise FALSE.
     */
    public function isBetween(DateTime $start, DateTime $end): bool
    {
        return $this->isAfter($start) && $this->isBefore($end);
    }

    /**
     * Determine whether this DateTime is between two other dates (comparing by day).
     *
     * @param DateTime $start The first date to compare to.
     * @param DateTime $end The second date to compare to.
     * @return bool TRUE if this DateTime is between the other dates (comparing by day), otherwise FALSE.
     */
    public function isBetweenDay(DateTime $start, DateTime $end): bool
    {
        return $this->isAfterDay($start) && $this->isBeforeDay($end);
    }

    /**
     * Determine whether this DateTime is between two other dates (comparing by hour).
     *
     * @param DateTime $start The first date to compare to.
     * @param DateTime $end The second date to compare to.
     * @return bool TRUE if this DateTime is between the other dates (comparing by hour), otherwise FALSE.
     */
    public function isBetweenHour(DateTime $start, DateTime $end): bool
    {
        return $this->isAfterHour($start) && $this->isBeforeHour($end);
    }

    /**
     * Determine whether this DateTime is between two other dates (comparing by minute).
     *
     * @param DateTime $start The first date to compare to.
     * @param DateTime $end The second date to compare to.
     * @return bool TRUE if this DateTime is between the other dates (comparing by minute), otherwise FALSE.
     */
    public function isBetweenMinute(DateTime $start, DateTime $end): bool
    {
        return $this->isAfterMinute($start) && $this->isBeforeMinute($end);
    }

    /**
     * Determine whether this DateTime is between two other dates (comparing by month).
     *
     * @param DateTime $start The first date to compare to.
     * @param DateTime $end The second date to compare to.
     * @return bool TRUE if this DateTime is between the other dates (comparing by month), otherwise FALSE.
     */
    public function isBetweenMonth(DateTime $start, DateTime $end): bool
    {
        return $this->isAfterMonth($start) && $this->isBeforeMonth($end);
    }

    /**
     * Determine whether this DateTime is between two other dates (comparing by second).
     *
     * @param DateTime $start The first date to compare to.
     * @param DateTime $end The second date to compare to.
     * @return bool TRUE if this DateTime is between the other dates (comparing by second), otherwise FALSE.
     */
    public function isBetweenSecond(DateTime $start, DateTime $end): bool
    {
        return $this->isAfterSecond($start) && $this->isBeforeSecond($end);
    }

    /**
     * Determine whether this DateTime is between two other dates (comparing by week).
     *
     * @param DateTime $start The first date to compare to.
     * @param DateTime $end The second date to compare to.
     * @return bool TRUE if this DateTime is between the other dates (comparing by week), otherwise FALSE.
     */
    public function isBetweenWeek(DateTime $start, DateTime $end): bool
    {
        return $this->isAfterWeek($start) && $this->isBeforeWeek($end);
    }

    /**
     * Determine whether this DateTime is between two other dates (comparing by year).
     *
     * @param DateTime $start The first date to compare to.
     * @param DateTime $end The second date to compare to.
     * @return bool TRUE if this DateTime is between the other dates (comparing by year), otherwise FALSE.
     */
    public function isBetweenYear(DateTime $start, DateTime $end): bool
    {
        return $this->isAfterYear($start) && $this->isBeforeYear($end);
    }

    /**
     * Determine whether the DateTime is in daylight savings.
     *
     * @return bool TRUE if the current time is in daylight savings, otherwise FALSE.
     */
    public function isDst(): bool
    {
        return (bool) $this->toNativeDateTime()->format('I');
    }

    /**
     * Determine whether the year is a leap year.
     *
     * @return bool TRUE if the current year is a leap year, otherwise FALSE.
     */
    public function isLeapYear(): bool
    {
        return (bool) $this->toNativeDateTime()->format('L');
    }

    /**
     * Determine whether this DateTime is the same as another date.
     *
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is the same as the other date, otherwise FALSE.
     */
    public function isSame(DateTime $other): bool
    {
        return $this->diff($other) === 0;
    }

    /**
     * Determine whether this DateTime is the same as another date (comparing by day).
     *
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is the same as the other date (comparing by day), otherwise FALSE.
     */
    public function isSameDay(DateTime $other): bool
    {
        return $this->diffInDays($other) === 0;
    }

    /**
     * Determine whether this DateTime is the same as another date (comparing by hour).
     *
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is the same as the other date (comparing by hour), otherwise FALSE.
     */
    public function isSameHour(DateTime $other): bool
    {
        return $this->diffInHours($other) === 0;
    }

    /**
     * Determine whether this DateTime is the same as another date (comparing by minute).
     *
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is the same as the other date (comparing by minute), otherwise FALSE.
     */
    public function isSameMinute(DateTime $other): bool
    {
        return $this->diffInMinutes($other) === 0;
    }

    /**
     * Determine whether this DateTime is the same as another date (comparing by month).
     *
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is the same as the other date (comparing by month), otherwise FALSE.
     */
    public function isSameMonth(DateTime $other): bool
    {
        return $this->diffInMonths($other) === 0;
    }

    /**
     * Determine whether this DateTime is the same as or after another date.
     *
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is the same as or after the other date, otherwise FALSE.
     */
    public function isSameOrAfter(DateTime $other): bool
    {
        return $this->diff($other) >= 0;
    }

    /**
     * Determine whether this DateTime is the same as or after another date (comparing by day).
     *
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is the same as or after the other date (comparing by day), otherwise FALSE.
     */
    public function isSameOrAfterDay(DateTime $other): bool
    {
        return $this->diffInDays($other) >= 0;
    }

    /**
     * Determine whether this DateTime is the same as or after another date (comparing by hour).
     *
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is the same as or after the other date (comparing by hour), otherwise FALSE.
     */
    public function isSameOrAfterHour(DateTime $other): bool
    {
        return $this->diffInHours($other) >= 0;
    }

    /**
     * Determine whether this DateTime is the same as or after another date (comparing by minute).
     *
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is the same as or after the other date (comparing by minute), otherwise FALSE.
     */
    public function isSameOrAfterMinute(DateTime $other): bool
    {
        return $this->diffInMinutes($other) >= 0;
    }

    /**
     * Determine whether this DateTime is the same as or after another date (comparing by month).
     *
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is the same as or after the other date (comparing by month), otherwise FALSE.
     */
    public function isSameOrAfterMonth(DateTime $other): bool
    {
        return $this->diffInMonths($other) >= 0;
    }

    /**
     * Determine whether this DateTime is the same as or after another date (comparing by second).
     *
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is the same as or after the other date (comparing by second), otherwise FALSE.
     */
    public function isSameOrAfterSecond(DateTime $other): bool
    {
        return $this->diffInSeconds($other) >= 0;
    }

    /**
     * Determine whether this DateTime is the same as or after another date (comparing by week).
     *
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is the same as or after the other date (comparing by week), otherwise FALSE.
     */
    public function isSameOrAfterWeek(DateTime $other): bool
    {
        return $this->diffInWeeks($other) >= 0;
    }

    /**
     * Determine whether this DateTime is the same as or after another date (comparing by year).
     *
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is the same as or after the other date (comparing by year), otherwise FALSE.
     */
    public function isSameOrAfterYear(DateTime $other): bool
    {
        return $this->diffInYears($other) >= 0;
    }

    /**
     * Determine whether this DateTime is the same as or before another date.
     *
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is the same as or before the other date, otherwise FALSE.
     */
    public function isSameOrBefore(DateTime $other): bool
    {
        return $this->diff($other) <= 0;
    }

    /**
     * Determine whether this DateTime is the same as or before another date (comparing by day).
     *
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is the same as or before the other date (comparing by day), otherwise FALSE.
     */
    public function isSameOrBeforeDay(DateTime $other): bool
    {
        return $this->diffInDays($other) <= 0;
    }

    /**
     * Determine whether this DateTime is the same as or before another date (comparing by hour).
     *
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is the same as or before the other date (comparing by hour), otherwise FALSE.
     */
    public function isSameOrBeforeHour(DateTime $other): bool
    {
        return $this->diffInHours($other) <= 0;
    }

    /**
     * Determine whether this DateTime is the same as or before another date (comparing by minute).
     *
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is the same as or before the other date (comparing by minute), otherwise FALSE.
     */
    public function isSameOrBeforeMinute(DateTime $other): bool
    {
        return $this->diffInMinutes($other) <= 0;
    }

    /**
     * Determine whether this DateTime is the same as or before another date (comparing by month).
     *
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is the same as or before the other date (comparing by month), otherwise FALSE.
     */
    public function isSameOrBeforeMonth(DateTime $other): bool
    {
        return $this->diffInMonths($other) <= 0;
    }

    /**
     * Determine whether this DateTime is the same as or before another date (comparing by second).
     *
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is the same as or before the other date (comparing by second), otherwise FALSE.
     */
    public function isSameOrBeforeSecond(DateTime $other): bool
    {
        return $this->diffInSeconds($other) <= 0;
    }

    /**
     * Determine whether this DateTime is the same as or before another date (comparing by week).
     *
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is the same as or before the other date (comparing by week), otherwise FALSE.
     */
    public function isSameOrBeforeWeek(DateTime $other): bool
    {
        return $this->diffInWeeks($other) <= 0;
    }

    /**
     * Determine whether this DateTime is the same as or before another date (comparing by year).
     *
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is the same as or before the other date (comparing by year), otherwise FALSE.
     */
    public function isSameOrBeforeYear(DateTime $other): bool
    {
        return $this->diffInYears($other) <= 0;
    }

    /**
     * Determine whether this DateTime is the same as another date (comparing by second).
     *
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is the same as the other date (comparing by second), otherwise FALSE.
     */
    public function isSameSecond(DateTime $other): bool
    {
        return $this->diffInSeconds($other) === 0;
    }

    /**
     * Determine whether this DateTime is the same as another date (comparing by week).
     *
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is the same as the other date (comparing by week), otherwise FALSE.
     */
    public function isSameWeek(DateTime $other): bool
    {
        return $this->diffInWeeks($other) === 0;
    }

    /**
     * Determine whether this DateTime is the same as another date (comparing by year).
     *
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is the same as the other date (comparing by year), otherwise FALSE.
     */
    public function isSameYear(DateTime $other): bool
    {
        return $this->diffInYears($other) === 0;
    }

    /**
     * Convert the DateTime to a string for JSON serializing.
     *
     * @return string The string for serializing.
     */
    public function jsonSerialize(): string
    {
        return $this->toIsoString();
    }

    /**
     * Get the name of the month in current time zone.
     *
     * @param string $type The type of month name to return.
     * @return string|null The name of the month.
     */
    public function monthName($type = 'long'): string|null
    {
        $type = strtolower($type);

        return match ($type) {
            'short' => $this->format('LLL'),
            'long' => $this->format('LLLL'),
            'narrow' => $this->format('LLLLL'),
            default => null
        };
    }

    /**
     * Set the DateTime to the start of the day.
     *
     * @return DateTime A new DateTime.
     */
    public function startOfDay(): static
    {
        return $this->withHours(0, 0, 0, 0);
    }

    /**
     * Set the DateTime to the start of the hour.
     *
     * @return DateTime A new DateTime.
     */
    public function startOfHour(): static
    {
        return $this->withMinutes(0, 0, 0);
    }

    /**
     * Set the DateTime to the start of the minute.
     *
     * @return DateTime A new DateTime.
     */
    public function startOfMinute(): static
    {
        return $this->withSeconds(0, 0);
    }

    /**
     * Set the DateTime to the start of the month.
     *
     * @return DateTime A new DateTime.
     */
    public function startOfMonth(): static
    {
        return $this->withDate(1)
            ->startOfDay();
    }

    /**
     * Set the DateTime to the start of the quarter.
     *
     * @return DateTime A new DateTime.
     */
    public function startOfQuarter(): static
    {
        $month = $this->getQuarter() * 3 - 2;

        return $this->withMonth($month, 1)
            ->startOfDay();
    }

    /**
     * Set the DateTime to the start of the second.
     *
     * @return DateTime A new DateTime.
     */
    public function startOfSecond(): static
    {
        return $this->withMilliseconds(0);
    }

    /**
     * Set the DateTime to the start of the week.
     *
     * @return DateTime A new DateTime.
     */
    public function startOfWeek(): static
    {
        return $this->withWeekDay(1)
            ->startOfDay();
    }

    /**
     * Set the DateTime to the start of the year.
     *
     * @return DateTime A new DateTime.
     */
    public function startOfYear(): static
    {
        return $this->withMonth(1, 1)
            ->startOfDay();
    }

    /**
     * Subtract a day from the current DateTime.
     *
     * @return DateTime A new DateTime.
     */
    public function subDay(): static
    {
        return $this->addDays(-1);
    }

    /**
     * Subtract days from the current DateTime.
     *
     * @param int $amount The number of days to substract.
     * @return DateTime A new DateTime.
     */
    public function subDays(int $amount): static
    {
        return $this->addDays(-$amount);
    }

    /**
     * Subtract an hour from the current DateTime.
     *
     * @return DateTime A new DateTime.
     */
    public function subHour(): static
    {
        return $this->addHours(-1);
    }

    /**
     * Subtract hours from the current DateTime.
     *
     * @param int $amount The number of hours to subtract.
     * @return DateTime A new DateTime.
     */
    public function subHours(int $amount): static
    {
        return $this->addHours(-$amount);
    }

    /**
     * Subtract a minute from the current DateTime.
     *
     * @return DateTime A new DateTime.
     */
    public function subMinute(): static
    {
        return $this->addMinutes(-1);
    }

    /**
     * Subtract minutes from the current DateTime.
     *
     * @param int $amount The number of minutes to subtract.
     * @return DateTime A new DateTime.
     */
    public function subMinutes(int $amount): static
    {
        return $this->addMinutes(-$amount);
    }

    /**
     * Subtract a month from the current DateTime.
     *
     * @return DateTime A new DateTime.
     */
    public function subMonth(): static
    {
        return $this->addMonths(-1);
    }

    /**
     * Subtract months from the current DateTime.
     *
     * @param int $amount The number of months to subtract.
     * @return DateTime A new DateTime.
     */
    public function subMonths(int $amount): static
    {
        return $this->addMonths(-$amount);
    }

    /**
     * Subtract a second from the current DateTime.
     *
     * @return DateTime A new DateTime.
     */
    public function subSecond(): static
    {
        return $this->addSeconds(-1);
    }

    /**
     * Subtract seconds from the current DateTime.
     *
     * @param int $amount The number of seconds to subtract.
     * @return DateTime A new DateTime.
     */
    public function subSeconds(int $amount): static
    {
        return $this->addSeconds(-$amount);
    }

    /**
     * Subtract a week from the current DateTime.
     *
     * @return DateTime A new DateTime.
     */
    public function subWeek(): static
    {
        return $this->addWeeks(-1);
    }

    /**
     * Subtract weeks from the current DateTime.
     *
     * @param int $amount The number of weeks to subtract.
     * @return DateTime A new DateTime.
     */
    public function subWeeks(int $amount): static
    {
        return $this->addWeeks(-$amount);
    }

    /**
     * Subtract a year from the current DateTime.
     *
     * @return DateTime A new DateTime.
     */
    public function subYear(): static
    {
        return $this->addYears(-1);
    }

    /**
     * Subtract years from the current DateTime.
     *
     * @param int $amount The number of years to subtract.
     * @return DateTime A new DateTime.
     */
    public function subYears(int $amount): static
    {
        return $this->addYears(-$amount);
    }

    /**
     * Get the name of the current time zone.
     *
     * @param string $type The formatting type.
     * @return string|null The name of the time zone.
     */
    public function timeZoneName($type = 'full'): string|null
    {
        $type = strtolower($type);

        return match ($type) {
            'short' => $this->format('zzz'),
            'full' => $this->format('zzzz'),
            default => null
        };
    }

    /**
     * Format the current date using "eee MMM dd yyyy".
     *
     * @return string The formatted date string.
     */
    public function toDateString(): string
    {
        return $this->format(static::FORMATS['date']);
    }

    /**
     * Format the current date using "yyyy-MM-dd'THH:mm:ss.SSSSSSxxx".
     *
     * @return string The formatted date string.
     */
    public function toIsoString(): string
    {
        return $this
            ->withLocale('en')
            ->withTimeZone('UTC')
            ->format(static::FORMATS['rfc3339_extended']);
    }

    /**
     * Convert the object to a native DateTime.
     *
     * @return \DateTime A native DateTime.
     */
    public function toNativeDateTime(): \DateTime
    {
        return $this->calendar->toDateTime();
    }

    /**
     * Format the current date using "eee MMM dd yyyy HH:mm:ss xx (VV)".
     *
     * @return string The formatted date string.
     */
    public function toString(): string
    {
        return $this->format(static::FORMATS['string']);
    }

    /**
     * Format the current date using "HH:mm:ss xx (VV)".
     *
     * @return string The formatted date string.
     */
    public function toTimeString(): string
    {
        return $this->format(static::FORMATS['time']);
    }

    /**
     * Format the current date in UTC timeZone using "eee MMM dd yyyy HH:mm:ss xx (VV)".
     *
     * @return string The formatted date string.
     */
    public function toUTCString(): string
    {
        return $this
            ->withTimeZone('UTC')
            ->toString();
    }

    /**
     * Get the number of weeks in the current year.
     *
     * @return int The number of weeks in the current year.
     */
    public function weeksInYear(): int
    {
        $minimumDays = $this->calendar->getMinimalDaysInFirstWeek();

        return (new static())
            ->withYear($this->getWeekYear(), 12, 24 + $minimumDays)
            ->getWeek();
    }

    /**
     * Clone the DateTime with a new date of the month in current time zone.
     *
     * @param int $date The date of the month.
     * @return DateTime A new DateTime.
     */
    public function withDate(int $date): static
    {
        return $this->withCalendarFields([
            'date' => $date,
        ]);
    }

    /**
     * Clone the DateTime with a new day of the week in current time zone.
     *
     * @param int $day The day of the week. (0 - Sunday, 6 - Saturday)
     * @return DateTime A new DateTime.
     */
    public function withDay(int $day): static
    {
        return $this->withCalendarFields([
            'date' => $this->getDate() - $this->getDay() + $day,
        ]);
    }

    /**
     * Clone the DateTime with a new day of the year in current time zone.
     *
     * @param int $day The day of the year. (1, 366)
     * @return DateTime A new DateTime.
     */
    public function withDayOfYear(int $day): static
    {
        return $this->withCalendarFields([
            'dayOfYear' => $day,
        ]);
    }

    /**
     * Clone the DateTime with a new hours in current time zone (and optionally, minutes, seconds and milliseconds).
     *
     * @param int $hours The hours. (0, 23)
     * @param int|null $minutes The minutes. (0, 59)
     * @param int|null $seconds The seconds. (0, 59)
     * @param int|null $milliseconds The milliseconds.
     * @return DateTime A new DateTime.
     */
    public function withHours(int $hours, int|null $minutes = null, int|null $seconds = null, int|null $milliseconds = null): static
    {
        return $this->withCalendarFields([
            'hour' => $hours,
            'minute' => $minutes,
            'second' => $seconds,
            'millisecond' => $milliseconds,
        ]);
    }

    /**
     * Clone the DateTime with a new current locale.
     *
     * @param string $locale The name of the time zone.
     * @return DateTime A new DateTime.
     */
    public function withLocale(string $locale): static
    {
        $temp = new static(null, $this->getTimeZone(), $locale);

        $time = $this->getTime();
        $temp->calendar->setTime($time);

        return $temp;
    }

    /**
     * Clone the DateTime with a new milliseconds in current time zone.
     *
     * @param int $milliseconds The milliseconds.
     * @return DateTime A new DateTime.
     */
    public function withMilliseconds(int $milliseconds): static
    {
        return $this->withCalendarFields([
            'millisecond' => $milliseconds,
        ]);
    }

    /**
     * Clone the DateTime with a new minutes in current time zone (and optionally, seconds and milliseconds).
     *
     * @param int $minutes The minutes. (0, 59)
     * @param int|null $seconds The seconds. (0, 59)
     * @param int|null $milliseconds The milliseconds.
     * @return DateTime A new DateTime.
     */
    public function withMinutes(int $minutes, int|null $seconds = null, int|null $milliseconds = null): static
    {
        return $this->withCalendarFields([
            'minute' => $minutes,
            'second' => $seconds,
            'millisecond' => $milliseconds,
        ]);
    }

    /**
     * Clone the DateTime with a new month in current time zone (and optionally, date).
     *
     * @param int $month The month. (1, 12)
     * @param int|null $date The date of the month.
     * @return DateTime A new DateTime.
     */
    public function withMonth(int $month, int|null $date = null): static
    {
        if ($date === null && static::$clampDates) {
            $date = $this->getDate();
            $daysInMonth = static::createFromArray([$this->getYear(), $month])->daysInMonth();
            $date = min($date, $daysInMonth);
        }

        return $this->withCalendarFields([
            'month' => $month - 1,
            'date' => $date,
        ]);
    }

    /**
     * Clone the DateTime with a new quarter of the year in current time zone.
     *
     * @param int $quarter The quarter of the year. (1, 4)
     * @return DateTime A new DateTime.
     */
    public function withQuarter(int $quarter): static
    {
        return $this->withYear(
            $this->getYear(),
            ($quarter * 3 - 3) + 1
        );
    }

    /**
     * Clone the DateTime with a new seconds in current time zone (and optionally, milliseconds).
     *
     * @param int $seconds The seconds. (0, 59)
     * @param int|null $milliseconds The milliseconds.
     * @return DateTime A new DateTime.
     */
    public function withSeconds(int $seconds, int|null $milliseconds = null): static
    {
        return $this->withCalendarFields([
            'second' => $seconds,
            'millisecond' => $milliseconds,
        ]);
    }

    /**
     * Clone the DateTime with a new number of milliseconds since the UNIX epoch.
     *
     * @param int $time The number of milliseconds since the UNIX epoch.
     * @return DateTime A new DateTime.
     */
    public function withTime(int $time): static
    {
        $temp = new static(null, $this->getTimeZone(), $this->locale);

        $temp->calendar->setTime($time);

        return $temp;
    }

    /**
     * Clone the DateTime with a new number of seconds since the UNIX epoch.
     *
     * @param int $timestamp The number of seconds since the UNIX epoch.
     * @return DateTime A new DateTime.
     */
    public function withTimestamp(int $timestamp): static
    {
        return $this->withTime($timestamp * 1000);
    }

    /**
     * Clone the DateTime with a new current time zone.
     *
     * @param string $timeZone The name of the time zone.
     * @return DateTime A new DateTime.
     */
    public function withTimeZone(string $timeZone): static
    {
        $temp = new static(null, $timeZone, $this->locale);

        $time = $this->getTime();
        $temp->calendar->setTime($time);

        return $temp;
    }

    /**
     * Clone the DateTime with a new current UTC offset.
     *
     * @param int $offset The UTC offset (in minutes).
     * @return DateTime A new DateTime.
     */
    public function withTimeZoneOffset(int $offset): static
    {
        $offset *= -1;
        $prefix = $offset >= 0 ? '+' : '-';
        $offset = abs($offset);

        $timeZone = $prefix.
            str_pad((string) floor($offset / 60), 2, '0', STR_PAD_LEFT).
            ':'.
            str_pad((string) ($offset % 60), 2, '0', STR_PAD_LEFT);

        return $this->withTimeZone($timeZone);
    }

    /**
     * Clone the DateTime with a new local day of the week in current time zone (and optionally, day of the week).
     *
     * @param int $week The local week.
     * @param int|null $day The local day of the week. (1 - 7)
     * @return DateTime A new DateTime.
     */
    public function withWeek(int $week, int|null $day = null): static
    {
        $day ??= $this->getWeekDay();

        return $this->withCalendarFields([
            'week' => $week,
        ])->withWeekDay($day);
    }

    /**
     * Clone the DateTime with a new local day of the week in current time zone.
     *
     * @param int $day The local day of the week. (1 - 7)
     * @return DateTime A new DateTime.
     */
    public function withWeekDay(int $day): static
    {
        return $this->withCalendarFields([
            'date' => $this->getDate() - $this->getWeekDay() + $day,
        ]);
    }

    /**
     * Clone the DateTime with a new week day in month in current time zone.
     *
     * @param int $week The week day in month.
     * @return DateTime A new DateTime.
     */
    public function withWeekDayInMonth(int $week): static
    {
        $day = $this->getWeekDay();

        return $this->withCalendarFields([
            'weekDayInMonth' => $week,
        ])->withWeekDay($day);
    }

    /**
     * Clone the DateTime with a new week of month in current time zone.
     *
     * @param int $week The week of month.
     * @return DateTime A new DateTime.
     */
    public function withWeekOfMonth(int $week): static
    {
        $day = $this->getWeekDay();

        return $this->withCalendarFields([
            'weekOfMonth' => $week,
        ])->withWeekDay($day);
    }

    /**
     * Clone the DateTime with a new local day of the week in current time zone (and optionally, week and day of the week).
     *
     * @param int $year The local year.
     * @param int|null $week The local week.
     * @param int|null $day The local day of the week. (1 - 7)
     * @return DateTime A new DateTime.
     */
    public function withWeekYear(int $year, int|null $week = null, int|null $day = null): static
    {
        if ($week === null) {
            $week = min(
                $this->getWeek(),
                static::createFromArray([$year, 1, 4])->weeksInYear()
            );
        }

        $day ??= $this->getWeekDay();

        return $this->withCalendarFields([
            'weekYear' => $year,
            'week' => $week,
        ])->withWeekDay($day);
    }

    /**
     * Clone the DateTime with a new year in current time zone (and optionally, month and date).
     *
     * @param int $year The year.
     * @param int|null $month The month. (1, 12)
     * @param int|null $date The date of the month.
     * @return DateTime A new DateTime.
     */
    public function withYear(int $year, int|null $month = null, int|null $date = null): static
    {
        $month ??= $this->getMonth();

        if ($date === null && static::$clampDates) {
            $date = $this->getDate();
            $daysInMonth = static::createFromArray([$year, $month])->daysInMonth();
            $date = min($date, $daysInMonth);
        }

        return $this->withCalendarFields([
            'year' => $year,
            'month' => $month - 1,
            'date' => $date,
        ]);
    }

    /**
     * Calculate the difference between this and another Date.
     *
     * @param DateTime $other The date to compare to.
     * @param string|null $timeUnit The unit of time.
     * @param bool $relative Whether to use the relative difference.
     * @return int The difference.
     */
    protected function calculateDiff(DateTime $other, string $timeUnit, bool $relative = true): int
    {
        $field = static::getAdjustmentField($timeUnit);

        if ($relative) {
            $other = $other->withTimeZone($this->getTimeZone());
            $adjust = false;

            foreach (['year', 'month', 'week', 'day', 'hour', 'minute', 'second', 'millisecond'] as $timeUnit) {
                $tempField = static::getAdjustmentField($timeUnit);

                if ($field === IntlCalendar::FIELD_WEEK_OF_YEAR && $tempField === IntlCalendar::FIELD_DATE) {
                    $tempField = IntlCalendar::FIELD_DAY_OF_WEEK;
                }

                if ($adjust) {
                    $value = $this->calendar->get($tempField);
                    $other->calendar->set($tempField, $value);
                }

                if ($tempField === $field) {
                    $adjust = true;
                }
            }
        }

        $calendar = clone $this->calendar;

        return $calendar->fieldDifference($other->getTime(), $field) * -1;
    }

    /**
     * Get the value for a calendar field.
     *
     * @param string $field The field to get.
     * @return int The field value.
     */
    protected function getCalendarField(string $field): int
    {
        $key = static::getField($field);

        return $this->calendar->get($key);
    }

    /**
     * Set calendar field values.
     *
     * @param bool $adjust Whether to adjust the current time fields.
     * @param array $array The values to set.
     * @return DateTime a new DateTime.
     */
    protected function withCalendarFields(array $values, bool $adjust = false): static
    {
        $oldTime = $this->getTime();

        $temp = new static(null, $this->getTimeZone(), $this->locale);
        $temp->calendar->setTime($oldTime);

        foreach ($values as $field => $value) {
            if ($value === null) {
                continue;
            }

            $key = static::getField($field);

            if ($adjust) {
                $temp->calendar->add($key, $value);
            } else {
                $temp->calendar->set($key, $value);
            }
        }

        return $temp;
    }

    /**
     * Create a new IntlCalendar.
     *
     * @param int $time The number of milliseconds since the UNIX epoch.
     * @param DateTimeZone $timeZone The time zone.
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
     *
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
     *
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
     *
     * @param string|null $locale The locale.
     * @return string The parsed locale.
     */
    protected static function parseLocale(string|null $locale = null): string
    {
        return $locale ?? static::getDefaultLocale();
    }

    /**
     * Parse a time zone value.
     *
     * @param string|null $time zone The time zone.
     * @return DateTimeZone The parsed time zone.
     */
    protected static function parseTimeZone(string|null $timeZone = null): DateTimeZone
    {
        return new DateTimeZone($timeZone ?? static::getDefaultTimeZone());
    }
}
