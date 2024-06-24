<?php
declare(strict_types=1);

namespace Fyre\DateTime\Traits;

use Fyre\DateTime\DateTime;
use IntlCalendar;

/**
 * ComparisonsTrait
 */
trait ComparisonsTrait
{
    /**
     * Get the difference between this and another Date in milliseconds.
     * @param DateTime $other The date to compare to.
     * @return int The difference in milliseconds.
     */
    public function diff(DateTime $other): int
    {
        return $this->getTime() - $other->getTime();
    }

    /**
     * Get the difference between this and another Date in days.
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
     * @param DateTime $other The date to compare to.
     * @param bool $relative Whether to use the relative difference.
     * @return int The difference in years.
     */
    public function diffInYears(DateTime $other, bool $relative = true): int
    {
        return $this->calculateDiff($other, 'year', $relative);
    }

    /**
     * Determine whether this DateTime is after another date.
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is after the other date, otherwise FALSE.
     */
    public function isAfter(DateTime $other): bool
    {
        return $this->diff($other) > 0;
    }

    /**
     * Determine whether this DateTime is after another date (comparing by day).
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is after the other date (comparing by day), otherwise FALSE.
     */
    public function isAfterDay(DateTime $other): bool
    {
        return $this->diffInDays($other) > 0;
    }

    /**
     * Determine whether this DateTime is after another date (comparing by hour).
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is after the other date (comparing by hour), otherwise FALSE.
     */
    public function isAfterHour(DateTime $other): bool
    {
        return $this->diffInHours($other) > 0;
    }

    /**
     * Determine whether this DateTime is after another date (comparing by minute).
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is after the other date (comparing by minute), otherwise FALSE.
     */
    public function isAfterMinute(DateTime $other): bool
    {
        return $this->diffInMinutes($other) > 0;
    }

    /**
     * Determine whether this DateTime is after another date (comparing by month).
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is after the other date (comparing by month), otherwise FALSE.
     */
    public function isAfterMonth(DateTime $other): bool
    {
        return $this->diffInMonths($other) > 0;
    }

    /**
     * Determine whether this DateTime is after another date (comparing by second).
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is after the other date (comparing by second), otherwise FALSE.
     */
    public function isAfterSecond(DateTime $other): bool
    {
        return $this->diffInSeconds($other) > 0;
    }

    /**
     * Determine whether this DateTime is after another date (comparing by week).
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is after the other date (comparing by week), otherwise FALSE.
     */
    public function isAfterWeek(DateTime $other): bool
    {
        return $this->diffInWeeks($other) > 0;
    }

    /**
     * Determine whether this DateTime is after another date (comparing by year).
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is after the other date (comparing by year), otherwise FALSE.
     */
    public function isAfterYear(DateTime $other): bool
    {
        return $this->diffInYears($other) > 0;
    }

    /**
     * Determine whether this DateTime is before another date.
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is before the other date, otherwise FALSE.
     */
    public function isBefore(DateTime $other): bool
    {
        return $this->diff($other) < 0;
    }

    /**
     * Determine whether this DateTime is before another date (comparing by day).
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is before the other date (comparing by day), otherwise FALSE.
     */
    public function isBeforeDay(DateTime $other): bool
    {
        return $this->diffInDays($other) < 0;
    }

    /**
     * Determine whether this DateTime is before another date (comparing by hour).
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is before the other date (comparing by hour), otherwise FALSE.
     */
    public function isBeforeHour(DateTime $other): bool
    {
        return $this->diffInHours($other) < 0;
    }

    /**
     * Determine whether this DateTime is before another date (comparing by minute).
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is before the other date (comparing by minute), otherwise FALSE.
     */
    public function isBeforeMinute(DateTime $other): bool
    {
        return $this->diffInMinutes($other) < 0;
    }

    /**
     * Determine whether this DateTime is before another date (comparing by month).
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is before the other date (comparing by month), otherwise FALSE.
     */
    public function isBeforeMonth(DateTime $other): bool
    {
        return $this->diffInMonths($other) < 0;
    }

    /**
     * Determine whether this DateTime is before another date (comparing by second).
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is before the other date (comparing by second), otherwise FALSE.
     */
    public function isBeforeSecond(DateTime $other): bool
    {
        return $this->diffInSeconds($other) < 0;
    }

    /**
     * Determine whether this DateTime is before another date (comparing by week).
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is before the other date (comparing by week), otherwise FALSE.
     */
    public function isBeforeWeek(DateTime $other): bool
    {
        return $this->diffInWeeks($other) < 0;
    }

    /**
     * Determine whether this DateTime is before another date (comparing by year).
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is before the other date (comparing by year), otherwise FALSE.
     */
    public function isBeforeYear(DateTime $other): bool
    {
        return $this->diffInYears($other) < 0;
    }

    /**
     * Determine whether this DateTime is between two other dates.
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
     * @param DateTime $start The first date to compare to.
     * @param DateTime $end The second date to compare to.
     * @return bool TRUE if this DateTime is between the other dates (comparing by year), otherwise FALSE.
     */
    public function isBetweenYear(DateTime $start, DateTime $end): bool
    {
        return $this->isAfterYear($start) && $this->isBeforeYear($end);
    }

    /**
     * Determine whether this DateTime is the same as another date.
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is the same as the other date, otherwise FALSE.
     */
    public function isSame(DateTime $other): bool
    {
        return $this->diff($other) === 0;
    }

    /**
     * Determine whether this DateTime is the same as another date (comparing by day).
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is the same as the other date (comparing by day), otherwise FALSE.
     */
    public function isSameDay(DateTime $other): bool
    {
        return $this->diffInDays($other) === 0;
    }

    /**
     * Determine whether this DateTime is the same as another date (comparing by hour).
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is the same as the other date (comparing by hour), otherwise FALSE.
     */
    public function isSameHour(DateTime $other): bool
    {
        return $this->diffInHours($other) === 0;
    }

    /**
     * Determine whether this DateTime is the same as another date (comparing by minute).
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is the same as the other date (comparing by minute), otherwise FALSE.
     */
    public function isSameMinute(DateTime $other): bool
    {
        return $this->diffInMinutes($other) === 0;
    }

    /**
     * Determine whether this DateTime is the same as another date (comparing by month).
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is the same as the other date (comparing by month), otherwise FALSE.
     */
    public function isSameMonth(DateTime $other): bool
    {
        return $this->diffInMonths($other) === 0;
    }

    /**
     * Determine whether this DateTime is the same as or after another date.
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is the same as or after the other date, otherwise FALSE.
     */
    public function isSameOrAfter(DateTime $other): bool
    {
        return $this->diff($other) >= 0;
    }

    /**
     * Determine whether this DateTime is the same as or after another date (comparing by day).
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is the same as or after the other date (comparing by day), otherwise FALSE.
     */
    public function isSameOrAfterDay(DateTime $other): bool
    {
        return $this->diffInDays($other) >= 0;
    }

    /**
     * Determine whether this DateTime is the same as or after another date (comparing by hour).
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is the same as or after the other date (comparing by hour), otherwise FALSE.
     */
    public function isSameOrAfterHour(DateTime $other): bool
    {
        return $this->diffInHours($other) >= 0;
    }

    /**
     * Determine whether this DateTime is the same as or after another date (comparing by minute).
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is the same as or after the other date (comparing by minute), otherwise FALSE.
     */
    public function isSameOrAfterMinute(DateTime $other): bool
    {
        return $this->diffInMinutes($other) >= 0;
    }

    /**
     * Determine whether this DateTime is the same as or after another date (comparing by month).
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is the same as or after the other date (comparing by month), otherwise FALSE.
     */
    public function isSameOrAfterMonth(DateTime $other): bool
    {
        return $this->diffInMonths($other) >= 0;
    }

    /**
     * Determine whether this DateTime is the same as or after another date (comparing by second).
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is the same as or after the other date (comparing by second), otherwise FALSE.
     */
    public function isSameOrAfterSecond(DateTime $other): bool
    {
        return $this->diffInSeconds($other) >= 0;
    }

    /**
     * Determine whether this DateTime is the same as or after another date (comparing by week).
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is the same as or after the other date (comparing by week), otherwise FALSE.
     */
    public function isSameOrAfterWeek(DateTime $other): bool
    {
        return $this->diffInWeeks($other) >= 0;
    }

    /**
     * Determine whether this DateTime is the same as or after another date (comparing by year).
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is the same as or after the other date (comparing by year), otherwise FALSE.
     */
    public function isSameOrAfterYear(DateTime $other): bool
    {
        return $this->diffInYears($other) >= 0;
    }

    /**
     * Determine whether this DateTime is the same as or before another date.
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is the same as or before the other date, otherwise FALSE.
     */
    public function isSameOrBefore(DateTime $other): bool
    {
        return $this->diff($other) <= 0;
    }

    /**
     * Determine whether this DateTime is the same as or before another date (comparing by day).
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is the same as or before the other date (comparing by day), otherwise FALSE.
     */
    public function isSameOrBeforeDay(DateTime $other): bool
    {
        return $this->diffInDays($other) <= 0;
    }

    /**
     * Determine whether this DateTime is the same as or before another date (comparing by hour).
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is the same as or before the other date (comparing by hour), otherwise FALSE.
     */
    public function isSameOrBeforeHour(DateTime $other): bool
    {
        return $this->diffInHours($other) <= 0;
    }

    /**
     * Determine whether this DateTime is the same as or before another date (comparing by minute).
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is the same as or before the other date (comparing by minute), otherwise FALSE.
     */
    public function isSameOrBeforeMinute(DateTime $other): bool
    {
        return $this->diffInMinutes($other) <= 0;
    }

    /**
     * Determine whether this DateTime is the same as or before another date (comparing by month).
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is the same as or before the other date (comparing by month), otherwise FALSE.
     */
    public function isSameOrBeforeMonth(DateTime $other): bool
    {
        return $this->diffInMonths($other) <= 0;
    }

    /**
     * Determine whether this DateTime is the same as or before another date (comparing by second).
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is the same as or before the other date (comparing by second), otherwise FALSE.
     */
    public function isSameOrBeforeSecond(DateTime $other): bool
    {
        return $this->diffInSeconds($other) <= 0;
    }

    /**
     * Determine whether this DateTime is the same as or before another date (comparing by week).
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is the same as or before the other date (comparing by week), otherwise FALSE.
     */
    public function isSameOrBeforeWeek(DateTime $other): bool
    {
        return $this->diffInWeeks($other) <= 0;
    }

    /**
     * Determine whether this DateTime is the same as or before another date (comparing by year).
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is the same as or before the other date (comparing by year), otherwise FALSE.
     */
    public function isSameOrBeforeYear(DateTime $other): bool
    {
        return $this->diffInYears($other) <= 0;
    }

    /**
     * Determine whether this DateTime is the same as another date (comparing by second).
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is the same as the other date (comparing by second), otherwise FALSE.
     */
    public function isSameSecond(DateTime $other): bool
    {
        return $this->diffInSeconds($other) === 0;
    }

    /**
     * Determine whether this DateTime is the same as another date (comparing by week).
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is the same as the other date (comparing by week), otherwise FALSE.
     */
    public function isSameWeek(DateTime $other): bool
    {
        return $this->diffInWeeks($other) === 0;
    }

    /**
     * Determine whether this DateTime is the same as another date (comparing by year).
     * @param DateTime $other The date to compare to.
     * @return bool TRUE if this DateTime is the same as the other date (comparing by year), otherwise FALSE.
     */
    public function isSameYear(DateTime $other): bool
    {
        return $this->diffInYears($other) === 0;
    }

    /**
     * Calculate the difference between this and another Date.
     * @param DateTime $other The date to compare to.
     * @param string|null $timeUnit The unit of time.
     * @param bool $relative Whether to use the relative difference.
     * @return int The difference.
     */
    protected function calculateDiff(DateTime $other, string $timeUnit, bool $relative = true): int
    {
        $field = static::getAdjustmentField($timeUnit);

        $calendar = clone $this->calendar;

        if ($relative) {
            $other = $other->setTimeZone($this->getTimeZone());
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

        return $calendar->fieldDifference($other->getTime(), $field) * -1;
    }
}
