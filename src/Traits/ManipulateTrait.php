<?php
declare(strict_types=1);

namespace Fyre\DateTime\Traits;

/**
 * ManipulateTrait
 */
trait ManipulateTrait
{

    /**
     * Add a day to the current DateTime.
     * @return \Fyre\DateTime\DateTime A new DateTime.
     */
    public function addDay(): static
    {
        return $this->addDays(1);
    }

    /**
     * Add days to the current DateTime.
     * @param int $amount The number of days to add.
     * @return \Fyre\DateTime\DateTime A new DateTime.
     */
    public function addDays(int $amount): static
    {
        return $this->setCalendarFields([
            'day' => $amount
        ], true);
    }

    /**
     * Add an hour to the current DateTime.
     * @return \Fyre\DateTime\DateTime A new DateTime.
     */
    public function addHour(): static
    {
        return $this->addHours(1);
    }

    /**
     * Add hours to the current DateTime.
     * @param int $amount The number of hours to add.
     * @return \Fyre\DateTime\DateTime A new DateTime.
     */
    public function addHours(int $amount): static
    {
        return $this->setCalendarFields([
            'hour' => $amount
        ], true);
    }

    /**
     * Add a minute to the current DateTime.
     * @return \Fyre\DateTime\DateTime A new DateTime.
     */
    public function addMinute(): static
    {
        return $this->addMinutes(1);
    }

    /**
     * Add minutes to the current DateTime.
     * @param int $amount The number of minutes to add.
     * @return \Fyre\DateTime\DateTime A new DateTime.
     */
    public function addMinutes(int $amount): static
    {
        return $this->setCalendarFields([
            'minute' => $amount
        ], true);
    }

    /**
     * Add a month to the current DateTime.
     * @return \Fyre\DateTime\DateTime A new DateTime.
     */
    public function addMonth(): static
    {
        return $this->addMonths(1);
    }

    /**
     * Add months to the current DateTime.
     * @param int $amount The number of months to add.
     * @return \Fyre\DateTime\DateTime A new DateTime.
     */
    public function addMonths(int $amount): static
    {
        return $this->setCalendarFields([
            'month' => $amount
        ], true);
    }

    /**
     * Add a second to the current DateTime.
     * @return \Fyre\DateTime\DateTime A new DateTime.
     */
    public function addSecond(): static
    {
        return $this->addSeconds(1);
    }

    /**
     * Add seconds to the current DateTime.
     * @param int $amount The number of seconds to add.
     * @return \Fyre\DateTime\DateTime A new DateTime.
     */
    public function addSeconds(int $amount): static
    {
        return $this->setCalendarFields([
            'second' => $amount
        ], true);
    }

    /**
     * Add a week to the current DateTime.
     * @return \Fyre\DateTime\DateTime A new DateTime.
     */
    public function addWeek(): static
    {
        return $this->addWeeks(1);
    }

    /**
     * Add weeks to the current DateTime.
     * @param int $amount The number of weeks to add.
     * @return \Fyre\DateTime\DateTime A new DateTime.
     */
    public function addWeeks(int $amount): static
    {
        return $this->setCalendarFields([
            'week' => $amount
        ], true);
    }

    /**
     * Add a year to the current DateTime.
     * @return \Fyre\DateTime\DateTime A new DateTime.
     */
    public function addYear(): static
    {
        return $this->addYears(1);
    }

    /**
     * Add years to the current DateTime.
     * @param int $amount The number of years to add.
     * @return \Fyre\DateTime\DateTime A new DateTime.
     */
    public function addYears(int $amount): static
    {
        return $this->setCalendarFields([
            'year' => $amount
        ], true);
    }

    /**
     * Set the DateTime to the end of the day.
     * @return \Fyre\DateTime\DateTime A new DateTime.
     */
    public function endOfDay(): static
    {
        return $this->setHours(23, 59, 59, 999);
    }

    /**
     * Set the DateTime to the end of the hour.
     * @return \Fyre\DateTime\DateTime A new DateTime.
     */
    public function endOfHour(): static
    {
        return $this->setMinutes(59, 59, 999);
    }

    /**
     * Set the DateTime to the end of the minute.
     * @return \Fyre\DateTime\DateTime A new DateTime.
     */
    public function endOfMinute(): static
    {
        return $this->setSeconds(59, 999);
    }

    /**
     * Set the DateTime to the end of the month.
     * @return \Fyre\DateTime\DateTime A new DateTime.
     */
    public function endOfMonth(): static
    {
        return $this->setDate($this->daysInMonth())
            ->endOfDay();
    }

    /**
     * Set the DateTime to the end of the quarter.
     * @return \Fyre\DateTime\DateTime A new DateTime.
     */
    public function endOfQuarter(): static
    {
        $month = $this->getQuarter() * 3;
        return $this->setMonth(
            $month,
            static::fromArray([$this->getYear(), $month])->daysInMonth()
        )->endOfDay();
    }

    /**
     * Set the DateTime to the end of the second.
     * @return \Fyre\DateTime\DateTime A new DateTime.
     */
    public function endOfSecond(): static
    {
        return $this->setMilliseconds(999);
    }

    /**
     * Set the DateTime to the end of the week.
     * @return \Fyre\DateTime\DateTime A new DateTime.
     */
    public function endOfWeek(): static
    {
        return $this->setWeekDay(7)
            ->endOfDay();
    }

    /**
     * Set the DateTime to the end of the year.
     * @return \Fyre\DateTime\DateTime A new DateTime.
     */
    public function endOfYear(): static
    {
        return $this->setMonth(12, 31)
            ->endOfDay();
    }

    /**
     * Set the DateTime to the start of the day.
     * @return \Fyre\DateTime\DateTime A new DateTime.
     */
    public function startOfDay(): static
    {
        return $this->setHours(0, 0, 0, 0);
    }

    /**
     * Set the DateTime to the start of the hour.
     * @return \Fyre\DateTime\DateTime A new DateTime.
     */
    public function startOfHour(): static
    {
        return $this->setMinutes(0, 0, 0);
    }

    /**
     * Set the DateTime to the start of the minute.
     * @return \Fyre\DateTime\DateTime A new DateTime.
     */
    public function startOfMinute(): static
    {
        return $this->setSeconds(0, 0);
    }

    /**
     * Set the DateTime to the start of the month.
     * @return \Fyre\DateTime\DateTime A new DateTime.
     */
    public function startOfMonth(): static
    {
        return $this->setDate(1)
            ->startOfDay();
    }

    /**
     * Set the DateTime to the start of the quarter.
     * @return \Fyre\DateTime\DateTime A new DateTime.
     */
    public function startOfQuarter(): static
    {
        $month = $this->getQuarter() * 3 - 2;
        return $this->setMonth($month, 1)
            ->startOfDay();
    }

    /**
     * Set the DateTime to the start of the second.
     * @return \Fyre\DateTime\DateTime A new DateTime.
     */
    public function startOfSecond(): static
    {
        return $this->setMilliseconds(0);
    }

    /**
     * Set the DateTime to the start of the week.
     * @return \Fyre\DateTime\DateTime A new DateTime.
     */
    public function startOfWeek(): static
    {
        return $this->setWeekDay(1)
            ->startOfDay();
    }

    /**
     * Set the DateTime to the start of the year.
     * @return \Fyre\DateTime\DateTime A new DateTime.
     */
    public function startOfYear(): static
    {
        return $this->setMonth(1, 1)
            ->startOfDay();
    }

    /**
     * Subtract a day from the current DateTime.
     * @return \Fyre\DateTime\DateTime A new DateTime.
     */
    public function subDay(): static
    {
        return $this->addDays(-1);
    }

    /**
     * Subtract days from the current DateTime.
     * @param int $amount The number of days to substract.
     * @return \Fyre\DateTime\DateTime A new DateTime.
     */
    public function subDays(int $amount): static
    {
        return $this->addDays(-$amount);
    }

    /**
     * Subtract an hour from the current DateTime.
     * @return \Fyre\DateTime\DateTime A new DateTime.
     */
    public function subHour(): static
    {
        return $this->addHours(-1);
    }

    /**
     * Subtract hours from the current DateTime.
     * @param int $amount The number of hours to subtract.
     * @return \Fyre\DateTime\DateTime A new DateTime.
     */
    public function subHours(int $amount): static
    {
        return $this->addHours(-$amount);
    }

    /**
     * Subtract a minute from the current DateTime.
     * @return \Fyre\DateTime\DateTime A new DateTime.
     */
    public function subMinute(): static
    {
        return $this->addMinutes(-1);
    }

    /**
     * Subtract minutes from the current DateTime.
     * @param int $amount The number of minutes to subtract.
     * @return \Fyre\DateTime\DateTime A new DateTime.
     */
    public function subMinutes(int $amount): static
    {
        return $this->addMinutes(-$amount);
    }

    /**
     * Subtract a month from the current DateTime.
     * @return \Fyre\DateTime\DateTime A new DateTime.
     */
    public function subMonth(): static
    {
        return $this->addMonths(-1);
    }

    /**
     * Subtract months from the current DateTime.
     * @param int $amount The number of months to subtract.
     * @return \Fyre\DateTime\DateTime A new DateTime.
     */
    public function subMonths(int $amount): static
    {
        return $this->addMonths(-$amount);
    }

    /**
     * Subtract a second from the current DateTime.
     * @return \Fyre\DateTime\DateTime A new DateTime.
     */
    public function subSecond(): static
    {
        return $this->addSeconds(-1);
    }

    /**
     * Subtract seconds from the current DateTime.
     * @param int $amount The number of seconds to subtract.
     * @return \Fyre\DateTime\DateTime A new DateTime.
     */
    public function subSeconds(int $amount): static
    {
        return $this->addSeconds(-$amount);
    }

    /**
     * Subtract a week from the current DateTime.
     * @return \Fyre\DateTime\DateTime A new DateTime.
     */
    public function subWeek(): static
    {
        return $this->addWeeks(-1);
    }

    /**
     * Subtract weeks from the current DateTime.
     * @param int $amount The number of weeks to subtract.
     * @return \Fyre\DateTime\DateTime A new DateTime.
     */
    public function subWeeks(int $amount): static
    {
        return $this->addWeeks(-$amount);
    }

    /**
     * Subtract a year from the current DateTime.
     * @return \Fyre\DateTime\DateTime A new DateTime.
     */
    public function subYear(): static
    {
        return $this->addYears(-1);
    }

    /**
     * Subtract years from the current DateTime.
     * @param int $amount The number of years to subtract.
     * @return \Fyre\DateTime\DateTime A new DateTime.
     */
    public function subYears(int $amount): static
    {
        return $this->addYears(-$amount);
    }

}
