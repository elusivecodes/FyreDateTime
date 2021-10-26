<?php
declare(strict_types=1);

namespace Tests;

use
    Fyre\DateTime\DateTime;

trait DateTimeAttributesGetTest
{

    /**
     * #getDate
     */

    public function testDateTimeGetDate(): void
    {
        $this->assertEquals(
            31,
            DateTime::fromArray([2019, 1, 31])->getDate()
        );
    }

    /**
     * #getDay
     */

    public function testDateTimeGetDay(): void
    {
        $this->assertEquals(
            2,
            DateTime::fromArray([2019, 1, 1])->getDay()
        );
    }

    public function testDateTimeGetDayMonday(): void
    {
        $this->assertEquals(
            1,
            DateTime::fromArray([2018, 12, 31])->getDay()
        );
    }

    public function testDateTimeGetDaySunday(): void
    {
        $this->assertEquals(
            0,
            DateTime::fromArray([2018, 12, 30])->getDay()
        );
    }

    /**
     * #getDayOfYear
     */

    public function testDateTimeGetDayOfYear(): void
    {
        $this->assertEquals(
            152,
            DateTime::fromArray([2019, 6, 1])->getDayOfYear()
        );
    }

    /**
     * #getHours
     */

    public function testDateTimeGetHours(): void
    {
        $this->assertEquals(
            6,
            DateTime::fromArray([2019, 1, 1, 6])->getHours()
        );
    }

    public function testDateTimeGetHours24hr(): void
    {
        $this->assertEquals(
            23,
            DateTime::fromArray([2019, 1, 1, 23])->getHours()
        );
    }

    /**
     * #getLocale
     */

    public function testDateTimeGetLocale(): void
    {
        $this->assertEquals(
            'en',
            DateTime::fromArray([2019])->getLocale()
        );
    }

    /**
     * #getMilliseconds
     */

    public function testDateTimeGetMilliseconds(): void
    {
        $this->assertEquals(
            550,
            DateTime::fromArray([2019, 1, 1, 0, 0, 0, 550])->getMilliseconds()
        );
    }

    /**
     * #getMinutes
     */

    public function testDateTimeGetMinutes(): void
    {
        $this->assertEquals(
            32,
            DateTime::fromArray([2019, 1, 1, 0, 32])->getMinutes()
        );
    }

    /**
     * #getMonth
     */

    public function testDateTimeGetMonth(): void
    {
        $this->assertEquals(
            6,
            DateTime::fromArray([2019, 6, 1])->getMonth()
        );
    }

    /**
     * #getQuarter
     */

    public function testDateTimeGetQuarter(): void
    {
        $this->assertEquals(
            3,
            DateTime::fromArray([2019, 8, 1])->getQuarter()
        );
    }

    /**
     * #getSeconds
     */

    public function testDateTimeGetSeconds(): void
    {
        $this->assertEquals(
            25,
            DateTime::fromArray([2019, 1, 1, 0, 0, 25])->getSeconds()
        );
    }

    /**
     * #getTime
     */

    public function testDateTimeGetTime(): void
    {
        $this->assertEquals(
            1546300800000,
            DateTime::fromTimestamp(1546300800)->getTime()
        );
    }

    /**
     * #getTimestamp
     */

    public function testDateTimeGetTimestamp(): void
    {
        $this->assertEquals(
            1546300800,
            DateTime::fromTimestamp(1546300800)->getTimestamp()
        );
    }

    /**
     * #getTimeZone
     */

    public function testDateTimeGetTimeZone(): void
    {
        $this->assertEquals(
            'Australia/Brisbane',
            DateTime::now('Australia/Brisbane')->getTimeZone()
        );
    }

    public function testDateTimeGetTimeZoneFromOffset(): void
    {
        $this->assertEquals(
            '+10:00',
            DateTime::now('+10:00')->getTimeZone()
        );
    }

    public function testDateTimeGetTimeZoneFromOffsetWithoutColon(): void
    {
        $this->assertEquals(
            '+10:00',
            DateTime::now('+1000')->getTimeZone()
        );
    }

    /**
     * #getTimeZoneOffset
     */

    public function testDateTimeGetTimeZoneOffset(): void
    {
        $this->assertEquals(
            -600,
            DateTime::now('Australia/Brisbane')->getTimeZoneOffset()
        );
    }

    /**
     * #getWeek
     */

    public function testDateTimeGetWeek(): void
    {
        $this->assertEquals(
            22,
            DateTime::fromArray([2019, 6, 1])->getWeek()
        );
    }

    public function testDateTimeGetWeekUsesWeekYear(): void
    {
        $this->assertEquals(
            1,
            DateTime::fromArray([2019, 12, 30])->getWeek()
        );
    }

    /**
     * #getWeekDay
     */

    public function testDateTimeGetWeekDay(): void
    {
        $this->assertEquals(
            3,
            DateTime::fromArray([2019, 1, 1])->getWeekDay()
        );
    }

    public function testDateTimeGetWeekDayMonday(): void
    {
        $this->assertEquals(
            2,
            DateTime::fromArray([2018, 12, 31])->getWeekDay()
        );
    }

    public function testDateTimeGetWeekDaySunday(): void
    {
        $this->assertEquals(
            1,
            DateTime::fromArray([2018, 12, 30])->getWeekDay()
        );
    }

    /**
     * #getWeekDayInMonth
     */

    public function testDateTimeGetWeekDayInMonth(): void
    {
        $this->assertEquals(
            1,
            DateTime::fromArray([2019, 6, 1])->getWeekDayInMonth()
        );
    }

    public function testDateTimeGetWeekDayInMonthLocal(): void
    {
        $this->assertEquals(
            1,
            DateTime::fromArray([2019, 6, 7])->getWeekDayInMonth()
        );
    }

    /**
     * #getWeekOfMonth
     */

    public function testDateTimeGetWeekOfMonth(): void
    {
        $this->assertEquals(
            1,
            DateTime::fromArray([2019, 6, 1])->getWeekOfMonth()
        );
    }

    public function testDateTimeGetWeekOfMonthLocal(): void
    {
        $this->assertEquals(
            2,
            DateTime::fromArray([2019, 6, 3])->getWeekOfMonth()
        );
    }

    /**
     * #getWeekYear
     */

    public function testDateTimeGetWeekYear(): void
    {
        $this->assertEquals(
            2019,
            DateTime::fromArray([2019, 1, 1])->getWeekYear()
        );
    }

    public function testDateTimeGetWeekYearThursday(): void
    {
        $this->assertEquals(
            2020,
            DateTime::fromArray([2019, 12, 30])->getWeekYear()
        );
    }

    /**
     * #getYear
     */

    public function testDateTimeGetYear(): void
    {
        $this->assertEquals(
            2018,
            DateTime::fromArray([2018])->getYear()
        );
    }

}
