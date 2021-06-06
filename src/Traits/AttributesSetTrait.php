<?php
declare(strict_types=1);

namespace Fyre\DateTime\Traits;

use
    DateTimeZone;

use const
    STR_PAD_LEFT;

use function
    abs,
    floor,
    min,
    str_pad;

/**
 * AttributesSetTrait
 */
trait AttributesSetTrait
{

    /**
     * Set the date of the month in current timeZone.
     * @param int $date The date of the month.
     * @return DateTime The DateTime object.
     */
    public function setDate(int $date): static
    {
        return $this->setCalendarFields([
            'date' => $date
        ]);
    }

    /**
     * Set the day of the week in current timeZone.
     * @param int $day The day of the week. (0 - Sunday, 6 - Saturday)
     * @return DateTime The DateTime object.
     */
    public function setDay(int $day): static
    {
        return $this->setCalendarFields([
            'date' => $this->getDate() - $this->getDay() + $day
        ]);
    }

    /**
     * Set the day of the year in current timeZone.
     * @param int $day The day of the year. (1, 366)
     * @return DateTime The DateTime object.
     */
    public function setDayOfYear(int $day): static
    {
        return $this->setCalendarFields([
            'dayOfYear' => $day
        ]);
    }

    /**
     * Set the hours in current timeZone (and optionally, minutes, seconds and milliseconds).
     * @param int $hours The hours. (0, 23)
     * @param int|null $minutes The minutes. (0, 59)
     * @param int|null $seconds The seconds. (0, 59)
     * @param int|null $milliseconds The milliseconds.
     * @return DateTime The DateTime object.
     */
    public function setHours(int $hours, int|null $minutes = null, int|null $seconds = null, int|null $milliseconds = null): static
    {
        return $this->setCalendarFields([
            'hour' => $hours,
            'minute' => $minutes,
            'second' => $seconds,
            'millisecond' => $milliseconds
        ]);
    }

    /**
     * Set the current locale.
     * @param string $locale The name of the timeZone.
     * @return DateTime The DateTime object.
     */
    public function setLocale(string $locale): static
    {
        $this->locale = $locale;

        $timeZone = $this->toDateTime()->getTimeZone();
        $time = $this->getTime();

        $this->calendar = static::createCalendar($time, $timeZone, $this->locale);

        return $this;
    }

    /**
     * Set the milliseconds in current timeZone.
     * @param int $milliseconds The milliseconds.
     * @return DateTime The DateTime object.
     */
    public function setMilliseconds(int $milliseconds): static
    {
        return $this->setCalendarFields([
            'millisecond' => $milliseconds
        ]);
    }

    /**
     * Set the minutes in current timeZone (and optionally, seconds and milliseconds).
     * @param int $minutes The minutes. (0, 59)
     * @param int|null $seconds The seconds. (0, 59)
     * @param int|null $milliseconds The milliseconds.
     * @return DateTime The DateTime object.
     */
    public function setMinutes(int $minutes, int|null $seconds = null, int|null $milliseconds = null): static
    {
        return $this->setCalendarFields([
            'minute' => $minutes,
            'second' => $seconds,
            'millisecond' => $milliseconds
        ]);
    }

    /**
     * Set the month in current timeZone (and optionally, date).
     * @param int $month The month. (1, 12)
     * @param int|null $date The date of the month.
     * @return DateTime The DateTime object.
     */
    public function setMonth(int $month, int|null $date = null): static
    {
        if ($date === null && static::$clampDates) {
            $date = $this->getDate();
            $daysInMonth = static::fromArray([$this->getYear(), $month])->daysInMonth();
            $date = min($date, $daysInMonth);
        }

        return $this->setCalendarFields([
            'month' => $month - 1,
            'date' => $date
        ]);
    }

    /**
     * Set the quarter of the year in current timeZone.
     * @param int $quarter The quarter of the year. (1, 4)
     * @return DateTime The DateTime object.
     */
    public function setQuarter(int $quarter): static
    {   return $this->setYear(
            $this->getYear(),
            ($quarter * 3 - 3) + 1
        );
    }

    /**
     * Set the seconds in current timeZone (and optionally, milliseconds).
     * @param int $seconds The seconds. (0, 59)
     * @param int|null $milliseconds The milliseconds.
     * @return DateTime The DateTime object.
     */
    public function setSeconds(int $seconds, int|null $milliseconds = null): static
    {
        return $this->setCalendarFields([
            'second' => $seconds,
            'millisecond' => $milliseconds
        ]);
    }

    /**
     * Set the number of milliseconds since the UNIX epoch.
     * @param int $time The number of milliseconds since the UNIX epoch.
     * @return DateTime The DateTime object.
     */
    public function setTime(int $time): static
    {
        $this->calendar->setTime($time);

        return $this;
    }

    /**
     * Set the number of seconds since the UNIX epoch.
     * @param int $timestamp The number of seconds since the UNIX epoch.
     * @return DateTime The DateTime object.
     */
    public function setTimestamp(int $timestamp): static
    {
        return $this->setTime($timestamp * 1000);
    }

    /**
     * Set the current timeZone.
     * @param string $timeZone The name of the timeZone.
     * @return DateTime The DateTime object.
     */
    public function setTimeZone(string $timeZone): static
    {
        $timeZone = new DateTimeZone($timeZone);

        $this->calendar = static::createCalendar($this->getTime(), $timeZone, $this->locale);

        return $this;
    }

    /**
     * Set the current UTC offset.
     * @param int $offset The UTC offset (in minutes).
     * @return DateTime The DateTime object.
     */
    public function setTimeZoneOffset(int $offset): static
    {
        $offset *= -1;
        $prefix = $offset >= 0 ? '+' : '-';
        $offset = abs($offset);

        $timeZone = $prefix.
            str_pad((string) floor($offset / 60), 2, '0', STR_PAD_LEFT).
            ':'.
            str_pad((string) ($offset % 60), 2, '0', STR_PAD_LEFT);

        return $this->setTimeZone($timeZone);
    }

    /**
     * Set the local day of the week in current timeZone (and optionally, day of the week).
     * @param int $week The local week.
     * @param int|null $day The local day of the week. (1 - 7)
     * @return DateTime The DateTime object.
     */
    public function setWeek(int $week, int|null $day = null): static
    {
        $day ??= $this->getWeekDay();

        return $this->setCalendarFields([
            'week' => $week
        ])->setWeekDay($day);
    }

    /**
     * Set the local day of the week in current timeZone.
     * @param int $day The local day of the week. (1 - 7)
     * @return DateTime The DateTime object.
     */
    public function setWeekDay(int $day): static
    {
        return $this->setCalendarFields([
            'date' => $this->getDate() - $this->getWeekDay() + $day
        ]);
    }

    /**
     * Set the week day in month in current timeZone.
     * @param int $week The week day in month.
     * @return DateTime The DateTime object.
     */
    public function setWeekDayInMonth(int $week): static
    {
        $day = $this->getWeekDay();
        return $this->setCalendarFields([
            'weekDayInMonth' => $week
        ])->setWeekDay($day);
    }

    /**
     * Set the week of month in current timeZone.
     * @param int $week The week of month.
     * @return DateTime The DateTime object.
     */
    public function setWeekOfMonth(int $week): static
    {
        $day = $this->getWeekDay();
        return $this->setCalendarFields([
            'weekOfMonth' => $week
        ])->setWeekDay($day);
    }

    /**
     * Set the local day of the week in current timeZone (and optionally, week and day of the week).
     * @param int $year The local year.
     * @param int|null $week The local week.
     * @param int|null $day The local day of the week. (1 - 7)
     * @return DateTime The DateTime object.
     */
    public function setWeekYear(int $year, int|null $week = null, int|null $day = null): static
    {
        if ($week === null) {
            $week = min(
                $this->getWeek(),
                static::fromArray([$year, 1, 4])->weeksInYear()
            );
        }

        $day ??= $this->getWeekDay();

        return $this->setCalendarFields([
            'weekYear' => $year,
            'week' => $week
        ])->setWeekDay($day);
    }

    /**
     * Set the year in current timeZone (and optionally, month and date).
     * @param int $year The year.
     * @param int|null $month The month. (1, 12)
     * @param int|null $date The date of the month.
     * @return DateTime The DateTime object.
     */
    public function setYear(int $year, int|null $month = null, int|null $date = null): static
    {
        $month ??= $this->getMonth();

        if ($date === null && static::$clampDates) {
            $date = $this->getDate();
            $daysInMonth = static::fromArray([$year, $month])->daysInMonth();
            $date = min($date, $daysInMonth);
        }

        return $this->setCalendarFields([
            'year' => $year,
            'month' => $month - 1,
            'date' => $date
        ]);
    }

}