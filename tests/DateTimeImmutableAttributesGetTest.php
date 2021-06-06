<?php
declare(strict_types=1);

namespace Tests;

use
    Fyre\DateTimeImmutable;

trait DateTimeImmutableAttributesGetTest
{

    /**
     * #getDate
     */

    public function testDateTimeImmutableGetDate(): void
    {
        $this->assertEquals(
            31,
            DateTimeImmutable::fromArray([2019, 1, 31])->getDate()
        );
    }

    /**
     * #getDay
     */

    public function testDateTimeImmutableGetDay(): void
    {
        $this->assertEquals(
            2,
            DateTimeImmutable::fromArray([2019, 1, 1])->getDay()
        );
    }

    public function testDateTimeImmutableGetDayMonday(): void
    {
        $this->assertEquals(
            1,
            DateTimeImmutable::fromArray([2018, 12, 31])->getDay()
        );
    }

    public function testDateTimeImmutableGetDaySunday(): void
    {
        $this->assertEquals(
            0,
            DateTimeImmutable::fromArray([2018, 12, 30])->getDay()
        );
    }

    /**
     * #getDayOfYear
     */

    public function testDateTimeImmutableGetDayOfYear(): void
    {
        $this->assertEquals(
            152,
            DateTimeImmutable::fromArray([2019, 6, 1])->getDayOfYear()
        );
    }

    /**
     * #getHours
     */

    public function testDateTimeImmutableGetHours(): void
    {
        $this->assertEquals(
            6,
            DateTimeImmutable::fromArray([2019, 1, 1, 6])->getHours()
        );
    }

    public function testDateTimeImmutableGetHours24hr(): void
    {
        $this->assertEquals(
            23,
            DateTimeImmutable::fromArray([2019, 1, 1, 23])->getHours()
        );
    }

    /**
     * #getLocale
     */

    public function testDateTimeImmutableGetLocale(): void
    {
        $this->assertEquals(
            'en',
            DateTimeImmutable::fromArray([2019])->getLocale()
        );
    }

    /**
     * #getMilliseconds
     */

    public function testDateTimeImmutableGetMilliseconds(): void
    {
        $this->assertEquals(
            550,
            DateTimeImmutable::fromArray([2019, 1, 1, 0, 0, 0, 550])->getMilliseconds()
        );
    }

    /**
     * #getMinutes
     */

    public function testDateTimeImmutableGetMinutes(): void
    {
        $this->assertEquals(
            32,
            DateTimeImmutable::fromArray([2019, 1, 1, 0, 32])->getMinutes()
        );
    }

    /**
     * #getMonth
     */

    public function testDateTimeImmutableGetMonth(): void
    {
        $this->assertEquals(
            6,
            DateTimeImmutable::fromArray([2019, 6, 1])->getMonth()
        );
    }

    /**
     * #getQuarter
     */

    public function testDateTimeImmutableGetQuarter(): void
    {
        $this->assertEquals(
            3,
            DateTimeImmutable::fromArray([2019, 8, 1])->getQuarter()
        );
    }

    /**
     * #getSeconds
     */

    public function testDateTimeImmutableGetSeconds(): void
    {
        $this->assertEquals(
            25,
            DateTimeImmutable::fromArray([2019, 1, 1, 0, 0, 25])->getSeconds()
        );
    }

    /**
     * #getTime
     */

    public function testDateTimeImmutableGetTime(): void
    {
        $this->assertEquals(
            1546300800000,
            DateTimeImmutable::fromTimestamp(1546300800)->getTime()
        );
    }

    /**
     * #getTimestamp
     */

    public function testDateTimeImmutableGetTimestamp(): void
    {
        $this->assertEquals(
            1546300800,
            DateTimeImmutable::fromTimestamp(1546300800)->getTimestamp()
        );
    }

    /**
     * #getTimeZone
     */

    public function testDateTimeImmutableGetTimeZone(): void
    {
        $this->assertEquals(
            'Australia/Brisbane',
            DateTimeImmutable::now('Australia/Brisbane')->getTimeZone()
        );
    }

    public function testDateTimeImmutableGetTimeZoneFromOffset(): void
    {
        $this->assertEquals(
            '+10:00',
            DateTimeImmutable::now('+10:00')->getTimeZone()
        );
    }

    public function testDateTimeImmutableGetTimeZoneFromOffsetWithoutColon(): void
    {
        $this->assertEquals(
            '+10:00',
            DateTimeImmutable::now('+1000')->getTimeZone()
        );
    }

    /**
     * #getTimeZoneOffset
     */

    public function testDateTimeImmutableGetTimeZoneOffset(): void
    {
        $this->assertEquals(
            -600,
            DateTimeImmutable::now('Australia/Brisbane')->getTimeZoneOffset()
        );
    }

    /**
     * #getWeek
     */

    public function testDateTimeImmutableGetWeek(): void
    {
        $this->assertEquals(
            22,
            DateTimeImmutable::fromArray([2019, 6, 1])->getWeek()
        );
    }

    public function testDateTimeImmutableGetWeekUsesWeekYear(): void
    {
        $this->assertEquals(
            1,
            DateTimeImmutable::fromArray([2019, 12, 30])->getWeek()
        );
    }

    /**
     * #getWeekDay
     */

    public function testDateTimeImmutableGetWeekDay(): void
    {
        $this->assertEquals(
            3,
            DateTimeImmutable::fromArray([2019, 1, 1])->getWeekDay()
        );
    }

    public function testDateTimeImmutableGetWeekDayMonday(): void
    {
        $this->assertEquals(
            2,
            DateTimeImmutable::fromArray([2018, 12, 31])->getWeekDay()
        );
    }

    public function testDateTimeImmutableGetWeekDaySunday(): void
    {
        $this->assertEquals(
            1,
            DateTimeImmutable::fromArray([2018, 12, 30])->getWeekDay()
        );
    }

    /**
     * #getWeekDayInMonth
     */

    public function testDateTimeImmutableGetWeekDayInMonth(): void
    {
        $this->assertEquals(
            1,
            DateTimeImmutable::fromArray([2019, 6, 1])->getWeekDayInMonth()
        );
    }

    public function testDateTimeImmutableGetWeekDayInMonthLocal(): void
    {
        $this->assertEquals(
            1,
            DateTimeImmutable::fromArray([2019, 6, 7])->getWeekDayInMonth()
        );
    }

    /**
     * #getWeekOfMonth
     */

    public function testDateTimeImmutableGetWeekOfMonth(): void
    {
        $this->assertEquals(
            1,
            DateTimeImmutable::fromArray([2019, 6, 1])->getWeekOfMonth()
        );
    }

    public function testDateTimeImmutableGetWeekOfMonthLocal(): void
    {
        $this->assertEquals(
            2,
            DateTimeImmutable::fromArray([2019, 6, 3])->getWeekOfMonth()
        );
    }

    /**
     * #getWeekYear
     */

    public function testDateTimeImmutableGetWeekYear(): void
    {
        $this->assertEquals(
            2019,
            DateTimeImmutable::fromArray([2019, 1, 1])->getWeekYear()
        );
    }

    public function testDateTimeImmutableGetWeekYearThursday(): void
    {
        $this->assertEquals(
            2020,
            DateTimeImmutable::fromArray([2019, 12, 30])->getWeekYear()
        );
    }

    /**
     * #getYear
     */

    public function testDateTimeImmutableGetYear(): void
    {
        $this->assertEquals(
            2018,
            DateTimeImmutable::fromArray([2018])->getYear()
        );
    }

}
