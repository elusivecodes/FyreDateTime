<?php
declare(strict_types=1);

namespace Fyre\DateTime\Traits;

use DateInterval;
use Fyre\DateTime\DateTime;
use IntlCalendar;

use function strtolower;

/**
 * UtilityTrait
 */
trait UtilityTrait
{

    /**
     * Get the name of the day of the week in current timeZone.
     * @param string $type The type of day name to return.
     * @return string|null The name of the day of the week.
     */
    public function dayName($type = 'long'): string|null
    {
        $type = strtolower($type);

        switch ($type) {
            case 'short':
                return $this->format('ccc');
            case 'long':
                return $this->format('cccc');
            case 'narrow':
                return $this->format('ccccc');
        }

        return null;
    }

    /**
     * Get the day period in current timeZone.
     * @param string $type The type of day period to return.
     * @return string|null The day period.
     */
    public function dayPeriod($type = 'long'): string|null
    {
        $type = strtolower($type);

        switch ($type) {
            case 'short':
                return $this->format('aaa');
            case 'long':
                return $this->format('aaaa');
        }

        return null;
    }

    /**
     * Get the number of days in the current month.
     * @return int The number of days in the current month.
     */
    public function daysInMonth(): int
    {
        return (int) $this->toDateTime()->format('t');
    }

    /**
     * Get the number of days in the current year.
     * @return int The number of days in the current year.
     */
    public function daysInYear(): int
    {
        return $this->isLeapYear() ? 366 : 365;
    }

    /**
     * Get the difference between this and another Date.
     * @param DateTime $other The date to compare to.
     * @param string|null $timeUnit The unit of time.
     * @param bool $relative Whether to use the relative difference.
     * @return int The difference.
     */
    public function diff(DateTime $other, string|null $timeUnit = null, bool $relative = true): int
    {
        if ($timeUnit === null) {
            return $this->getTime() - $other->getTime();
        }

        $timeUnit = strtolower($timeUnit);
        $field = static::getAdjustmentField($timeUnit);

        $calendar = clone $this->calendar;

        if ($relative) {
            $other = $other->setTimeZone($this->getTimeZone());
            $adjust = false;

            foreach (['year', 'month', 'week', 'day', 'hour', 'minute', 'second', 'millisecond'] AS $timeUnit) {
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

        return $calendar->fieldDifference($other->getTime(), $field) * -1;
    }

    /**
     * Get the era in current timeZone.
     * @param string $type The type of era to return.
     * @return string|null The era.
     */
    public function era($type = 'long'): string|null
    {
        $type = strtolower($type);

        switch ($type) {
            case 'short':
                return $this->format('GGG');
            case 'long':
                return $this->format('GGGG');
            case 'narrow':
                return $this->format('GGGGG');
        }

        return null;
    }

    /**
     * Determine whether this DateTime is after another date (optionally to a granularity).
     * @param DateTime $other The date to compare to.
     * @param string|null $granularity The level of granularity to use for comparison.
     * @return bool TRUE if this DateTime is after the other date, otherwise FALSE.
     */
    public function isAfter(DateTime $other, string|null $granularity = null): bool
    {
        return $this->diff($other, $granularity) > 0;
    }

    /**
     * Determine whether this DateTime is before another date (optionally to a granularity).
     * @param DateTime $other The date to compare to.
     * @param string|null $granularity The level of granularity to use for comparison.
     * @return bool TRUE if this DateTime is before the other date, otherwise FALSE.
     */
    public function isBefore(DateTime $other, string|null $granularity = null): bool
    {
        return $this->diff($other, $granularity) < 0;
    }

    /**
     * Determine whether this DateTime is between two other dates (optionally to a granularity).
     * @param DateTime $start The first date to compare to.
     * @param DateTime $end The second date to compare to.
     * @param string|null $granularity The level of granularity to use for comparison.
     * @return bool TRUE if this DateTime is between the other dates, otherwise FALSE.
     */
    public function isBetween(DateTime $start, DateTime $end, string|null $granularity = null): bool
    {
        return $this->diff($start, $granularity) > 0 && $this->diff($end, $granularity) < 0;
    }

    /**
     * Return true if the DateTime is in daylight savings.
     * @return bool TRUE if the current time is in daylight savings, otherwise FALSE.
     */
    public function isDST(): bool
    {
        return (bool) $this->toDateTime()->format('I');
    }

    /**
     * Return true if the year is a leap year.
     * @return bool TRUE if the current year is a leap year, otherwise FALSE.
     */
    public function isLeapYear(): bool
    {
        return (bool) $this->toDateTime()->format('L');
    }

    /**
     * Determine whether this DateTime is the same as another date (optionally to a granularity).
     * @param DateTime $other The date to compare to.
     * @param string|null $granularity The level of granularity to use for comparison.
     * @return bool TRUE if this DateTime is the same as the other date, otherwise FALSE.
     */
    public function isSame(DateTime $other, string|null $granularity = null): bool
    {
        return $this->diff($other, $granularity) === 0;
    }

    /**
     * Determine whether this DateTime is the same or after another date (optionally to a granularity).
     * @param DateTime $other The date to compare to.
     * @param string|null $granularity The level of granularity to use for comparison.
     * @return bool TRUE if this DateTime is the same or after the other date, otherwise FALSE.
     */
    public function isSameOrAfter(DateTime $other, string|null $granularity = null): bool
    {
        return $this->diff($other, $granularity) >= 0;
    }

    /**
     * Determine whether this DateTime is the same or before another date.
     * @param DateTime $other The date to compare to.
     * @param string|null $granularity The level of granularity to use for comparison.
     * @return bool TRUE if this DateTime is the same or before the other date, otherwise FALSE.
     */
    public function isSameOrBefore(DateTime $other, string|null $granularity = null): bool
    {
        return $this->diff($other, $granularity) <= 0;
    }

    /**
     * Get the name of the month in current timeZone.
     * @param string $type The type of month name to return.
     * @return string|null The name of the month.
     */
    public function monthName($type = 'full'): string|null
    {
        $type = strtolower($type);

        switch ($type) {
            case 'short':
                return $this->format('LLL');
            case 'full':
                return $this->format('LLLL');
            case 'narrow':
                return $this->format('LLLLL');
        }

        return null;
    }

    /**
     * Get the name of the current timeZone.
     * @param string $type The formatting type.
     * @return string|null The name of the time zone.
     */
    public function timeZoneName($type = 'full'): string|null
    {
        $type = strtolower($type);

        switch ($type) {
            case 'short':
                return $this->format('zzz');
            case 'full':
                return $this->format('zzzz');
        }

        return null;
    }

    /**
     * Convert the object to a native DateTime.
     * @return \DateTime A native DateTime object.
     */
    public function toDateTime(): \DateTime
    {
        return $this->calendar->toDateTime();
    }

    /**
     * Get the number of weeks in the current year.
     * @return int The number of weeks in the current year.
     */
    public function weeksInYear(): int
    {
        $minimumDays = $this->calendar->getMinimalDaysInFirstWeek();
        return (new static)
            ->setYear($this->getWeekYear(), 12, 24 + $minimumDays)
            ->getWeek();
    }

    /**
     * Get the value for a calendar field.
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
     * @param array $array The values to set.
     * @return DateTime The DateTime object.
     */
    protected function setCalendarFields(array $values): static
    {
        $temp = new static(null, $this->getTimeZone(), $this->locale);

        $oldTime = $this->getTime();
        $temp->calendar->setTime($oldTime);

        foreach ($values AS $field => $value) {
            if ($value === null) {
                continue;
            }

            $key = static::getField($field);
            $temp->calendar->set($key, $value);
        }

        $oldOffset = $this->getTimeZoneOffset();
        $newOffset = $temp->getTimeZoneOffset();

        if ($oldOffset !== $newOffset) {
            $newTime = $temp->calendar->getTime();
            $diff = ($oldOffset - $newOffset) * 60000;

            $temp->calendar->setTime($newTime + $diff);
        }

        return $temp;
    }

}
