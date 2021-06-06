<?php
declare(strict_types=1);

namespace Fyre;

/**
 * DateTimeInterface
 */
interface DateTimeInterface
{

    /**
     * Add a duration to the date.
     * @param int $amount The amount to modify the date by.
     * @param string $timeUnit The unit of time.
     * @return DateTime The DateTime object.
     */
    public function add(int $amount, string $timeUnit): static;

    /**
     * Create a new DateTime using the current date and timeZone.
     * @return DateTime A new DateTime object.
     */
    public function clone(): static;

    /**
     * Get the name of the day of the week in current timeZone.
     * @param string $type The type of day name to return.
     * @return string|null The name of the day of the week.
     */
    public function dayName($type = 'long'): string|null;

    /**
     * Get the day period in current timeZone.
     * @param string $type The type of day period to return.
     * @return string|null The day period.
     */
    public function dayPeriod($type = 'long'): string|null;

    /**
     * Get the number of days in the current month.
     * @return int The number of days in the current month.
     */
    public function daysInMonth(): int;

    /**
     * Get the number of days in the current year.
     * @return int The number of days in the current year.
     */
    public function daysInYear(): int;

    /**
     * Get the difference between this and another Date.
     * @param DateTimeInterface $other The date to compare to.
     * @param string|null $timeUnit The unit of time.
     * @param bool $relative Whether to use the relative difference.
     * @return int The difference.
     */
    public function diff(DateTimeInterface $other, string|null $timeUnit = null, bool $relative = true): int;

    /**
     * Modify the DateTime by setting it to the end of a unit of time.
     * @param string $timeUnit The unit of time.
     * @return DateTime The DateTime object.
     */
    public function endOf(string $timeUnit): static;

    /**
     * Get the era in current timeZone.
     * @param string $type The type of era to return.
     * @return string|null The era.
     */
    public function era($type = 'long'): string|null;

    /**
     * Format the current date using a format string.
     * @param string $formatString The format string.
     * @return string The formatted date string.
     */
    public function format(string $formatString, string|null $locale = null): string;

    /**
     * Get the date of the month in current timeZone.
     * @return int The date of the month.
     */
    public function getDate(): int;

    /**
     * Get the day of the week in current timeZone.
     * @return int The day of the week. (0 - Sunday, 6 - Saturday)
     */
    public function getDay(): int;

    /**
     * Get the day of the year in current timeZone.
     * @return int The day of the year. (1, 366)
     */
    public function getDayOfYear(): int;

    /**
     * Get the hours of the day in current timeZone.
     * @return int The hours of the day. (0, 23)
     */
    public function getHours(): int;

    /**
     * Get the name of the current locale.
     * @return string The name of the current locale.
     */
    public function getLocale(): string;

    /**
     * Get the milliseconds in current timeZone.
     * @return int The milliseconds.
     */
    public function getMilliseconds(): int;

    /**
     * Get the minutes in current timeZone.
     * @return int The minutes. (0, 59)
     */
    public function getMinutes(): int;

    /**
     * Get the month in current timeZone.
     * @return int The month. (1, 12)
     */
    public function getMonth(): int;

    /**
     * Get the quarter of the year in current timeZone.
     * @return int The quarter of the year. (1, 4)
     */
    public function getQuarter(): int;

    /**
     * Get the seconds in current timeZone.
     * @return int The seconds. (0, 59)
     */
    public function getSeconds(): int;

    /**
     * Get the number of milliseconds since the UNIX epoch.
     * @return int The number of milliseconds since the UNIX epoch.
     */
    public function getTime(): int;

    /**
     * Get the number of seconds since the UNIX epoch.
     * @return int The number of seconds since the UNIX epoch.
     */
    public function getTimestamp(): int;

    /**
     * Get the name of the current timeZone.
     * @return string The name of the current timeZone.
     */
    public function getTimeZone(): string;

    /**
     * Get the UTC offset (in minutes) of the current timeZone.
     * @return int The UTC offset (in minutes) of the current timeZone.
     */
    public function getTimeZoneOffset(): int;

    /**
     * Get the local week in current timeZone.
     * @return int The local week. (1, 53)
     */
    public function getWeek(): int;

    /**
     * Get the local day of the week in current timeZone.
     * @return int The local day of the week. (1 - 7)
     */
    public function getWeekDay(): int;

    /**
     * Get the week day in month in current timeZone.
     * @return int The week day in month.
     */
    public function getWeekDayInMonth(): int;

    /**
     * Get the week of month in current timeZone.
     * @return int The week of month.
     */
    public function getWeekOfMonth(): int;

    /**
     * Get the week year in current timeZone.
     * @return int The week year.
     */
    public function getWeekYear(): int;

    /**
     * Get the year in current timeZone.
     * @return int The year.
     */
    public function getYear(): int;

    /**
     * Determine whether this DateTime is after another date (optionally to a granularity).
     * @param DateTimeInterface $other The date to compare to.
     * @param string|null $granularity The level of granularity to use for comparison.
     * @return bool TRUE if this DateTime is after the other date, otherwise FALSE.
     */
    public function isAfter(DateTimeInterface $other, string|null $granularity = null): bool;

    /**
     * Determine whether this DateTime is before another date (optionally to a granularity).
     * @param DateTimeInterface $other The date to compare to.
     * @param string|null $granularity The level of granularity to use for comparison.
     * @return bool TRUE if this DateTime is before the other date, otherwise FALSE.
     */
    public function isBefore(DateTimeInterface $other, string|null $granularity = null): bool;

    /**
     * Determine whether this DateTime is between two other dates (optionally to a granularity).
     * @param DateTimeInterface $start The first date to compare to.
     * @param DateTimeInterface $end The second date to compare to.
     * @param string|null $granularity The level of granularity to use for comparison.
     * @return bool TRUE if this DateTime is between the other dates, otherwise FALSE.
     */
    public function isBetween(DateTimeInterface $start, DateTimeInterface $end, string|null $granularity = null): bool;

    /**
     * Return true if the DateTime is in daylight savings.
     * @return bool TRUE if the current time is in daylight savings, otherwise FALSE.
     */
    public function isDST(): bool;

    /**
     * Return true if the year is a leap year.
     * @return bool TRUE if the current year is a leap year, otherwise FALSE.
     */
    public function isLeapYear(): bool;

    /**
     * Determine whether this DateTime is the same as another date (optionally to a granularity).
     * @param DateTimeInterface $other The date to compare to.
     * @param string|null $granularity The level of granularity to use for comparison.
     * @return bool TRUE if this DateTime is the same as the other date, otherwise FALSE.
     */
    public function isSame(DateTimeInterface $other, string|null $granularity = null): bool;

    /**
     * Determine whether this DateTime is the same or after another date (optionally to a granularity).
     * @param DateTimeInterface $other The date to compare to.
     * @param string|null $granularity The level of granularity to use for comparison.
     * @return bool TRUE if this DateTime is the same or after the other date, otherwise FALSE.
     */
    public function isSameOrAfter(DateTimeInterface $other, string|null $granularity = null): bool;

    /**
     * Determine whether this DateTime is the same or before another date.
     * @param DateTimeInterface $other The date to compare to.
     * @param string|null $granularity The level of granularity to use for comparison.
     * @return bool TRUE if this DateTime is the same or before the other date, otherwise FALSE.
     */
    public function isSameOrBefore(DateTimeInterface $other, string|null $granularity = null): bool;

    /**
     * Get the name of the month in current timeZone.
     * @param string $type The type of month name to return.
     * @return string|null The name of the month.
     */
    public function monthName($type = 'full'): string|null;

    /**
     * Set the date of the month in current timeZone.
     * @param int $date The date of the month.
     * @return DateTime The DateTime object.
     */
    public function setDate(int $date): static;

    /**
     * Set the day of the week in current timeZone.
     * @param int $day The day of the week. (0 - Sunday, 6 - Saturday)
     * @return DateTime The DateTime object.
     */
    public function setDay(int $day): static;

    /**
     * Set the day of the year in current timeZone.
     * @param int $day The day of the year. (1, 366)
     * @return DateTime The DateTime object.
     */
    public function setDayOfYear(int $day): static;

    /**
     * Set the hours in current timeZone (and optionally, minutes, seconds and milliseconds).
     * @param int $hours The hours. (0, 23)
     * @param int|null $minutes The minutes. (0, 59)
     * @param int|null $seconds The seconds. (0, 59)
     * @param int|null $milliseconds The milliseconds.
     * @return DateTime The DateTime object.
     */
    public function setHours(int $hours, int|null $minutes = null, int|null $seconds = null, int|null $milliseconds = null): static;

    /**
     * Set the current locale.
     * @param string $locale The name of the timeZone.
     * @return DateTime The DateTime object.
     */
    public function setLocale(string $locale): static;

    /**
     * Set the milliseconds in current timeZone.
     * @param int $milliseconds The milliseconds.
     * @return DateTime The DateTime object.
     */
    public function setMilliseconds(int $milliseconds): static;

    /**
     * Set the minutes in current timeZone (and optionally, seconds and milliseconds).
     * @param int $minutes The minutes. (0, 59)
     * @param int|null $seconds The seconds. (0, 59)
     * @param int|null $milliseconds The milliseconds.
     * @return DateTime The DateTime object.
     */
    public function setMinutes(int $minutes, int|null $seconds = null, int|null $milliseconds = null): static;

    /**
     * Set the month in current timeZone (and optionally, date).
     * @param int $month The month. (1, 12)
     * @param int|null $date The date of the month.
     * @return DateTime The DateTime object.
     */
    public function setMonth(int $month, int|null $date = null): static;

    /**
     * Set the quarter of the year in current timeZone.
     * @param int $quarter The quarter of the year. (1, 4)
     * @return DateTime The DateTime object.
     */
    public function setQuarter(int $quarter): static;

    /**
     * Set the seconds in current timeZone (and optionally, milliseconds).
     * @param int $seconds The seconds. (0, 59)
     * @param int|null $milliseconds The milliseconds.
     * @return DateTime The DateTime object.
     */
    public function setSeconds(int $seconds, int|null $milliseconds = null): static;

    /**
     * Set the number of milliseconds since the UNIX epoch.
     * @param int $time The number of milliseconds since the UNIX epoch.
     * @return DateTime The DateTime object.
     */
    public function setTime(int $time): static;

    /**
     * Set the number of seconds since the UNIX epoch.
     * @param int $timestamp The number of seconds since the UNIX epoch.
     * @return DateTime The DateTime object.
     */
    public function setTimestamp(int $timestamp): static;

    /**
     * Set the current timeZone.
     * @param string $timeZone The name of the timeZone.
     * @return DateTime The DateTime object.
     */
    public function setTimeZone(string $timeZone): static;

    /**
     * Set the current UTC offset.
     * @param int $offset The UTC offset (in minutes).
     * @return DateTime The DateTime object.
     */
    public function setTimeZoneOffset(int $offset): static;

    /**
     * Set the local day of the week in current timeZone (and optionally, day of the week).
     * @param int $week The local week.
     * @param int|null $day The local day of the week. (1 - 7)
     * @return DateTime The DateTime object.
     */
    public function setWeek(int $week, int|null $day = null): static;

    /**
     * Set the local day of the week in current timeZone.
     * @param int $day The local day of the week. (1 - 7)
     * @return DateTime The DateTime object.
     */
    public function setWeekDay(int $day): static;

    /**
     * Set the week day in month in current timeZone.
     * @param int $week The week day in month.
     * @return DateTime The DateTime object.
     */
    public function setWeekDayInMonth(int $week): static;

    /**
     * Set the week of month in current timeZone.
     * @param int $week The week of month.
     * @return DateTime The DateTime object.
     */
    public function setWeekOfMonth(int $week): static;

    /**
     * Set the local day of the week in current timeZone (and optionally, week and day of the week).
     * @param int $year The local year.
     * @param int|null $week The local week.
     * @param int|null $day The local day of the week. (1 - 7)
     * @return DateTime The DateTime object.
     */
    public function setWeekYear(int $year, int|null $week = null, int|null $day = null): static;

    /**
     * Set the year in current timeZone (and optionally, month and date).
     * @param int $year The year.
     * @param int|null $month The month. (1, 12)
     * @param int|null $date The date of the month.
     * @return DateTime The DateTime object.
     */
    public function setYear(int $year, int|null $month = null, int|null $date = null): static;

    /**
     * Modify the DateTime by setting it to the start of a unit of time.
     * @param string $timeUnit The unit of time.
     * @return DateTime The DateTime object.
     */
    public function startOf(string $timeUnit): static;

    /**
     * Subtract a duration from the date.
     * @param int $amount The amount to modify the date by.
     * @param string $timeUnit The unit of time.
     * @return DateTime The DateTime object.
     */
    public function sub(int $amount, string $timeUnit): static;

    /**
     * Get the name of the current timeZone.
     * @param string $type The formatting type.
     * @return string|null The name of the time zone.
     */
    public function timeZoneName($type = 'full'): string|null;

    /**
     * Format the current date using "eee MMM dd yyyy".
     * @return string The formatted date string.
     */
    public function toDateString(): string;

    /**
     * Format the current date using "yyyy-MM-dd'THH:mm:ss.SSSSSSxxx".
     * @return string The formatted date string.
     */
    public function toISOString(): string;

    /**
     * Format the current date using "eee MMM dd yyyy HH:mm:ss xx (VV)".
     * @return string The formatted date string.
     */
    public function toString(): string;

    /**
     * Format the current date using "HH:mm:ss xx (VV)".
     * @return string The formatted date string.
     */
    public function toTimeString(): string;

    /**
     * Format the current date in UTC timeZone using "eee MMM dd yyyy HH:mm:ss xx (VV)".
     * @return string The formatted date string.
     */
    public function toUTCString(): string;

    /**
     * Get the number of weeks in the current year.
     * @return int The number of weeks in the current year.
     */
    public function weeksInYear(): int;

    /**
     * Create a new DateTime from an array.
     * @param array $dateArray The date to parse.
     * @param string|null $timeZone The timeZone to use.
     * @param string|null $locale The locale to use.
     * @return DateTime A new DateTime object.
     */
    public static function fromArray(array $dateArray, string|null $timeZone = null, string|null $locale = null): static;

    /**
     * Create a new DateTime from a native DateTime.
     * @param \DateTimeInterface $dateTime The native DateTime.
     * @param string|null $timeZone The timeZone to use.
     * @param string|null $locale The locale to use.
     * @return DateTime A new DateTime object.
     */
    public static function fromDateTime(\DateTimeInterface $dateTime, string|null $timeZone = null, string|null $locale = null): static;

    /**
     * Create a new DateTime from a format string.
     * @param string $formatString The format string.
     * @param string $dateString The date string.
     * @param string|null $timeZone The timeZone to use.
     * @param string|null $locale The locale to use.
     * @return DateTime A new DateTime object.
     */
    public static function fromFormat(string $formatString, string $dateString, string|null $timeZone = null, string|null $locale = null): static;

    /**
     * Create a new DateTime from an ISO format string.
     * @param string $dateString The date string.
     * @param string|null $timeZone The timeZone to use.
     * @param string|null $locale The locale to use.
     * @return DateTime A new DateTime object.
     */
    public static function fromISOString(string $dateString, string|null $timeZone = null, string|null $locale = null): static;

    /**
     * Create a new DateTime from a timestamp.
     * @param int $timestamp The timestamp.
     * @param string|null $timeZone The timeZone to use.
     * @param string|null $locale The locale to use.
     * @return DateTime A new DateTime object.
     */
    public static function fromTimestamp(int $timestamp, string|null $timeZone = null, string|null $locale = null): static;

    /**
     * Create a new DateTime for the current time.
     * @param string|null $timeZone The timeZone to use.
     * @param string|null $locale The locale to use.
     * @return DateTime A new DateTime object.
     */
    public static function now(string|null $timeZone = null, string|null $locale = null): static;

    /**
     * Set whether dates will be clamped when changing months.
     * @param bool $clampDates Whether to clamp dates.
     */
    public static function setDateClamping(bool $clampDates): void;

    /**
     * Set the default locale.
     * @param string $locale The locale.
     */
    public static function setDefaultLocale(string|null $locale): void;

    /**
     * Set the default timeZone.
     * @param string $timeZone The name of the timeZone.
     */
    public static function setDefaultTimeZone(string|null $timeZone): void;

}
