<?php
declare(strict_types=1);

namespace Fyre\DateTime\Traits;

use function ceil;
use function floor;

/**
 * AttributesGetTrait
 */
trait AttributesGetTrait
{ 

    /**
     * Get the date of the month in current timeZone.
     * @return int The date of the month.
     */
    public function getDate(): int
    {
        return $this->getCalendarField('date');
    }

    /**
     * Get the day of the week in current timeZone.
     * @return int The day of the week. (0 - Sunday, 6 - Saturday)
     */
    public function getDay(): int
    {
        return $this->getCalendarField('day') - 1;
    }

    /**
     * Get the day of the year in current timeZone.
     * @return int The day of the year. (1, 366)
     */
    public function getDayOfYear(): int
    {
        return $this->getCalendarField('dayOfYear');
    }

    /**
     * Get the hours of the day in current timeZone.
     * @return int The hours of the day. (0, 23)
     */
    public function getHours(): int
    {
        return $this->getCalendarField('hour');
    }

    /**
     * Get the name of the current locale.
     * @return string The name of the current locale.
     */
    public function getLocale(): string
    {
        return $this->locale;
    }

    /**
     * Get the milliseconds in current timeZone.
     * @return int The milliseconds.
     */
    public function getMilliseconds(): int
    {
        return $this->getCalendarField('millisecond');
    }

    /**
     * Get the minutes in current timeZone.
     * @return int The minutes. (0, 59)
     */
    public function getMinutes(): int
    {
        return $this->getCalendarField('minute');
    }

    /**
     * Get the month in current timeZone.
     * @return int The month. (1, 12)
     */
    public function getMonth(): int
    {
        return $this->getCalendarField('month') + 1;
    }

    /**
     * Get the quarter of the year in current timeZone.
     * @return int The quarter of the year. (1, 4)
     */
    public function getQuarter(): int
    {
        return (int) ceil($this->getMonth() / 3);
    }

    /**
     * Get the seconds in current timeZone.
     * @return int The seconds. (0, 59)
     */
    public function getSeconds(): int
    {
        return $this->getCalendarField('second');
    }

    /**
     * Get the number of milliseconds since the UNIX epoch.
     * @return int The number of milliseconds since the UNIX epoch.
     */
    public function getTime(): int
    {
        return (int) $this->calendar->getTime();
    }

    /**
     * Get the number of seconds since the UNIX epoch.
     * @return int The number of seconds since the UNIX epoch.
     */
    public function getTimestamp(): int
    {
        return (int) floor($this->getTime() / 1000);
    }

    /**
     * Get the name of the current timeZone.
     * @return string The name of the current timeZone.
     */
    public function getTimeZone(): string
    {
        return $this->toDateTime()->format('e');
    }

    /**
     * Get the UTC offset (in minutes) of the current timeZone.
     * @return int The UTC offset (in minutes) of the current timeZone.
     */
    public function getTimeZoneOffset(): int
    {
        return $this->toDateTime()->getOffset() / 60 * -1;
    }

    /**
     * Get the local week in current timeZone.
     * @return int The local week. (1, 53)
     */
    public function getWeek(): int
    {
        return $this->getCalendarField('week');
    }

    /**
     * Get the local day of the week in current timeZone.
     * @return int The local day of the week. (1 - 7)
     */
    public function getWeekDay(): int
    {
        return $this->getCalendarField('weekDay');
    }

    /**
     * Get the week day in month in current timeZone.
     * @return int The week day in month.
     */
    public function getWeekDayInMonth(): int
    {
        return $this->getCalendarField('weekDayInMonth');
    }

    /**
     * Get the week of month in current timeZone.
     * @return int The week of month.
     */
    public function getWeekOfMonth(): int
    {
        return $this->getCalendarField('weekOfMonth');
    }

    /**
     * Get the week year in current timeZone.
     * @return int The week year.
     */
    public function getWeekYear(): int
    {
        return $this->getCalendarField('weekYear');
    }

    /**
     * Get the year in current timeZone.
     * @return int The year.
     */
    public function getYear(): int
    {
        $eraAdjust = $this->getCalendarField('era') ? 1 : -1;
        return $this->getCalendarField('year') * $eraAdjust;
    }

}
