<?php
declare(strict_types=1);

namespace Fyre\DateTime\Traits;

use function strtolower;

/**
 * ManipulateTrait
 */
trait ManipulateTrait
{

    /**
     * Add a duration to the date.
     * @param int $amount The amount to modify the date by.
     * @param string $timeUnit The unit of time.
     * @return DateTime A new DateTime.
     */
    public function add(int $amount, string $timeUnit): static
    {
        return $this->modify($amount, $timeUnit);
    }

    /**
     * Modify the DateTime by setting it to the end of a unit of time.
     * @param string $timeUnit The unit of time.
     * @return DateTime A new DateTime.
     */
    public function endOf(string $timeUnit): static
    {
        $timeUnit = strtolower($timeUnit);

        switch ($timeUnit) {
            case 'second':
                return $this->setMilliseconds(999);
            case 'minute':
                return $this->setSeconds(59, 999);
            case 'hour':
                return $this->setMinutes(59, 59, 999);
            case 'day':
                return $this->setHours(23, 59, 59, 999);
            case 'week':
                return $this->setWeekDay(7)
                    ->setHours(23, 59, 59, 999);
            case 'month':
                return $this->setDate($this->daysInMonth())
                    ->setHours(23, 59, 59, 999);
            case 'quarter':
                $month = $this->getQuarter() * 3;
                return $this->setMonth(
                    $month,
                    static::fromArray([$this->getYear(), $month])->daysInMonth()
                )->setHours(23, 59, 59, 999);
            case 'year':
                return $this->setMonth(12, 31)
                    ->setHours(23, 59, 59, 999);
            default:
                return $this;
        }
    }

    /**
     * Modify the DateTime by setting it to the start of a unit of time.
     * @param string $timeUnit The unit of time.
     * @return DateTime A new DateTime.
     */
    public function startOf(string $timeUnit): static
    {
        $timeUnit = strtolower($timeUnit);

        switch ($timeUnit) {
            case 'second':
                return $this->setMilliseconds(0);
            case 'minute':
                return $this->setSeconds(0, 0);
            case 'hour':
                return $this->setMinutes(0, 0, 0);
            case 'day':
                return $this->setHours(0, 0, 0, 0);
            case 'week':
                return $this->setWeekDay(1)
                    ->setHours(0, 0, 0, 0);
            case 'month':
                return $this->setDate(1)
                    ->setHours(0, 0, 0, 0);
            case 'quarter':
                $month = $this->getQuarter() * 3 - 2;
                return $this->setMonth($month, 1)
                    ->setHours(0, 0, 0, 0);
            case 'year':
                return $this->setMonth(1, 1)
                    ->setHours(0, 0, 0, 0);
            default:
                return $this;
        }
    }

    /**
     * Subtract a duration from the date.
     * @param int $amount The amount to modify the date by.
     * @param string $timeUnit The unit of time.
     * @return DateTime A new DateTime.
     */
    public function sub(int $amount, string $timeUnit): static
    {
        return $this->modify(-$amount, $timeUnit);
    }

    /**
     * Modify the date by a duration.
     * @param int $amount The amount to modify the date by.
     * @param string $timeUnit The unit of time.
     * @return DateTime A new DateTime.
     */
    protected function modify(int $amount, string $timeUnit): static
    {
        $timeUnit = strtolower($timeUnit);

        switch ($timeUnit) {
            case 'second':
            case 'seconds':
                return $this->setCalendarFields([
                    'second' => $amount
                ], true);
            case 'minute':
            case 'minutes':
                return $this->setCalendarFields([
                    'minute' => $amount
                ], true);
            case 'hour':
            case 'hours':
                return $this->setCalendarFields([
                    'hour' => $amount
                ], true);
            case 'day':
            case 'days':
                return $this->setCalendarFields([
                    'day' => $amount
                ], true);
            case 'week':
            case 'weeks':
                return $this->setCalendarFields([
                    'week' => $amount
                ], true);
            case 'month':
            case 'months':
                return $this->setCalendarFields([
                    'month' => $amount
                ], true);
            case 'year':
            case 'years':
                return $this->setCalendarFields([
                    'year' => $amount
                ], true);
            default:
                return $this;
        }
    }

}
