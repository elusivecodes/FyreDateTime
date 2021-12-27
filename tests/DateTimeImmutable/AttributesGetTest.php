<?php
declare(strict_types=1);

namespace Tests\DateTimeImmutable;

use
    Fyre\DateTime\DateTimeImmutable;

trait AttributesGetTest
{

    /**
     * #getDate
     */

    public function testGetDate(): void
    {
        $this->assertEquals(
            31,
            DateTimeImmutable::fromArray([2019, 1, 31])->getDate()
        );
    }

    /**
     * #getDay
     */

    public function testGetDay(): void
    {
        $this->assertEquals(
            2,
            DateTimeImmutable::fromArray([2019, 1, 1])->getDay()
        );
    }

    public function testGetDayMonday(): void
    {
        $this->assertEquals(
            1,
            DateTimeImmutable::fromArray([2018, 12, 31])->getDay()
        );
    }

    public function testGetDaySunday(): void
    {
        $this->assertEquals(
            0,
            DateTimeImmutable::fromArray([2018, 12, 30])->getDay()
        );
    }

    /**
     * #getDayOfYear
     */

    public function testGetDayOfYear(): void
    {
        $this->assertEquals(
            152,
            DateTimeImmutable::fromArray([2019, 6, 1])->getDayOfYear()
        );
    }

    /**
     * #getHours
     */

    public function testGetHours(): void
    {
        $this->assertEquals(
            6,
            DateTimeImmutable::fromArray([2019, 1, 1, 6])->getHours()
        );
    }

    public function testGetHours24hr(): void
    {
        $this->assertEquals(
            23,
            DateTimeImmutable::fromArray([2019, 1, 1, 23])->getHours()
        );
    }

    /**
     * #getLocale
     */

    public function testGetLocale(): void
    {
        $this->assertEquals(
            'en',
            DateTimeImmutable::fromArray([2019])->getLocale()
        );
    }

    /**
     * #getMilliseconds
     */

    public function testGetMilliseconds(): void
    {
        $this->assertEquals(
            550,
            DateTimeImmutable::fromArray([2019, 1, 1, 0, 0, 0, 550])->getMilliseconds()
        );
    }

    /**
     * #getMinutes
     */

    public function testGetMinutes(): void
    {
        $this->assertEquals(
            32,
            DateTimeImmutable::fromArray([2019, 1, 1, 0, 32])->getMinutes()
        );
    }

    /**
     * #getMonth
     */

    public function testGetMonth(): void
    {
        $this->assertEquals(
            6,
            DateTimeImmutable::fromArray([2019, 6, 1])->getMonth()
        );
    }

    /**
     * #getQuarter
     */

    public function testGetQuarter(): void
    {
        $this->assertEquals(
            3,
            DateTimeImmutable::fromArray([2019, 8, 1])->getQuarter()
        );
    }

    /**
     * #getSeconds
     */

    public function testGetSeconds(): void
    {
        $this->assertEquals(
            25,
            DateTimeImmutable::fromArray([2019, 1, 1, 0, 0, 25])->getSeconds()
        );
    }

    /**
     * #getTime
     */

    public function testGetTime(): void
    {
        $this->assertEquals(
            1546300800000,
            DateTimeImmutable::fromTimestamp(1546300800)->getTime()
        );
    }

    /**
     * #getTimestamp
     */

    public function testGetTimestamp(): void
    {
        $this->assertEquals(
            1546300800,
            DateTimeImmutable::fromTimestamp(1546300800)->getTimestamp()
        );
    }

    /**
     * #getTimeZone
     */

    public function testGetTimeZone(): void
    {
        $this->assertEquals(
            'Australia/Brisbane',
            DateTimeImmutable::now('Australia/Brisbane')->getTimeZone()
        );
    }

    public function testGetTimeZoneFromOffset(): void
    {
        $this->assertEquals(
            '+10:00',
            DateTimeImmutable::now('+10:00')->getTimeZone()
        );
    }

    public function testGetTimeZoneFromOffsetWithoutColon(): void
    {
        $this->assertEquals(
            '+10:00',
            DateTimeImmutable::now('+1000')->getTimeZone()
        );
    }

    /**
     * #getTimeZoneOffset
     */

    public function testGetTimeZoneOffset(): void
    {
        $this->assertEquals(
            -600,
            DateTimeImmutable::now('Australia/Brisbane')->getTimeZoneOffset()
        );
    }

    /**
     * #getWeek
     */

    public function testGetWeek(): void
    {
        $this->assertEquals(
            22,
            DateTimeImmutable::fromArray([2019, 6, 1])->getWeek()
        );
    }

    public function testGetWeekUsesWeekYear(): void
    {
        $this->assertEquals(
            1,
            DateTimeImmutable::fromArray([2019, 12, 30])->getWeek()
        );
    }

    /**
     * #getWeekDay
     */

    public function testGetWeekDay(): void
    {
        $this->assertEquals(
            3,
            DateTimeImmutable::fromArray([2019, 1, 1])->getWeekDay()
        );
    }

    public function testGetWeekDayMonday(): void
    {
        $this->assertEquals(
            2,
            DateTimeImmutable::fromArray([2018, 12, 31])->getWeekDay()
        );
    }

    public function testGetWeekDaySunday(): void
    {
        $this->assertEquals(
            1,
            DateTimeImmutable::fromArray([2018, 12, 30])->getWeekDay()
        );
    }

    /**
     * #getWeekDayInMonth
     */

    public function testGetWeekDayInMonth(): void
    {
        $this->assertEquals(
            1,
            DateTimeImmutable::fromArray([2019, 6, 1])->getWeekDayInMonth()
        );
    }

    public function testGetWeekDayInMonthLocal(): void
    {
        $this->assertEquals(
            1,
            DateTimeImmutable::fromArray([2019, 6, 7])->getWeekDayInMonth()
        );
    }

    /**
     * #getWeekOfMonth
     */

    public function testGetWeekOfMonth(): void
    {
        $this->assertEquals(
            1,
            DateTimeImmutable::fromArray([2019, 6, 1])->getWeekOfMonth()
        );
    }

    public function testGetWeekOfMonthLocal(): void
    {
        $this->assertEquals(
            2,
            DateTimeImmutable::fromArray([2019, 6, 3])->getWeekOfMonth()
        );
    }

    /**
     * #getWeekYear
     */

    public function testGetWeekYear(): void
    {
        $this->assertEquals(
            2019,
            DateTimeImmutable::fromArray([2019, 1, 1])->getWeekYear()
        );
    }

    public function testGetWeekYearThursday(): void
    {
        $this->assertEquals(
            2020,
            DateTimeImmutable::fromArray([2019, 12, 30])->getWeekYear()
        );
    }

    /**
     * #getYear
     */

    public function testGetYear(): void
    {
        $this->assertEquals(
            2018,
            DateTimeImmutable::fromArray([2018])->getYear()
        );
    }

}