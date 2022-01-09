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
        $this->assertSame(
            31,
            DateTimeImmutable::fromArray([2019, 1, 31])->getDate()
        );
    }

    /**
     * #getDay
     */

    public function testGetDay(): void
    {
        $this->assertSame(
            2,
            DateTimeImmutable::fromArray([2019, 1, 1])->getDay()
        );
    }

    public function testGetDayMonday(): void
    {
        $this->assertSame(
            1,
            DateTimeImmutable::fromArray([2018, 12, 31])->getDay()
        );
    }

    public function testGetDaySunday(): void
    {
        $this->assertSame(
            0,
            DateTimeImmutable::fromArray([2018, 12, 30])->getDay()
        );
    }

    /**
     * #getDayOfYear
     */

    public function testGetDayOfYear(): void
    {
        $this->assertSame(
            152,
            DateTimeImmutable::fromArray([2019, 6, 1])->getDayOfYear()
        );
    }

    /**
     * #getHours
     */

    public function testGetHours(): void
    {
        $this->assertSame(
            6,
            DateTimeImmutable::fromArray([2019, 1, 1, 6])->getHours()
        );
    }

    public function testGetHours24hr(): void
    {
        $this->assertSame(
            23,
            DateTimeImmutable::fromArray([2019, 1, 1, 23])->getHours()
        );
    }

    /**
     * #getLocale
     */

    public function testGetLocale(): void
    {
        $this->assertSame(
            'en',
            DateTimeImmutable::fromArray([2019])->getLocale()
        );
    }

    /**
     * #getMilliseconds
     */

    public function testGetMilliseconds(): void
    {
        $this->assertSame(
            550,
            DateTimeImmutable::fromArray([2019, 1, 1, 0, 0, 0, 550])->getMilliseconds()
        );
    }

    /**
     * #getMinutes
     */

    public function testGetMinutes(): void
    {
        $this->assertSame(
            32,
            DateTimeImmutable::fromArray([2019, 1, 1, 0, 32])->getMinutes()
        );
    }

    /**
     * #getMonth
     */

    public function testGetMonth(): void
    {
        $this->assertSame(
            6,
            DateTimeImmutable::fromArray([2019, 6, 1])->getMonth()
        );
    }

    /**
     * #getQuarter
     */

    public function testGetQuarter(): void
    {
        $this->assertSame(
            3,
            DateTimeImmutable::fromArray([2019, 8, 1])->getQuarter()
        );
    }

    /**
     * #getSeconds
     */

    public function testGetSeconds(): void
    {
        $this->assertSame(
            25,
            DateTimeImmutable::fromArray([2019, 1, 1, 0, 0, 25])->getSeconds()
        );
    }

    /**
     * #getTime
     */

    public function testGetTime(): void
    {
        $this->assertSame(
            1546300800000,
            DateTimeImmutable::fromTimestamp(1546300800)->getTime()
        );
    }

    /**
     * #getTimestamp
     */

    public function testGetTimestamp(): void
    {
        $this->assertSame(
            1546300800,
            DateTimeImmutable::fromTimestamp(1546300800)->getTimestamp()
        );
    }

    /**
     * #getTimeZone
     */

    public function testGetTimeZone(): void
    {
        $this->assertSame(
            'Australia/Brisbane',
            DateTimeImmutable::now('Australia/Brisbane')->getTimeZone()
        );
    }

    public function testGetTimeZoneFromOffset(): void
    {
        $this->assertSame(
            '+10:00',
            DateTimeImmutable::now('+10:00')->getTimeZone()
        );
    }

    public function testGetTimeZoneFromOffsetWithoutColon(): void
    {
        $this->assertSame(
            '+10:00',
            DateTimeImmutable::now('+1000')->getTimeZone()
        );
    }

    /**
     * #getTimeZoneOffset
     */

    public function testGetTimeZoneOffset(): void
    {
        $this->assertSame(
            -600,
            DateTimeImmutable::now('Australia/Brisbane')->getTimeZoneOffset()
        );
    }

    /**
     * #getWeek
     */

    public function testGetWeek(): void
    {
        $this->assertSame(
            22,
            DateTimeImmutable::fromArray([2019, 6, 1])->getWeek()
        );
    }

    public function testGetWeekUsesWeekYear(): void
    {
        $this->assertSame(
            1,
            DateTimeImmutable::fromArray([2019, 12, 30])->getWeek()
        );
    }

    /**
     * #getWeekDay
     */

    public function testGetWeekDay(): void
    {
        $this->assertSame(
            3,
            DateTimeImmutable::fromArray([2019, 1, 1])->getWeekDay()
        );
    }

    public function testGetWeekDayMonday(): void
    {
        $this->assertSame(
            2,
            DateTimeImmutable::fromArray([2018, 12, 31])->getWeekDay()
        );
    }

    public function testGetWeekDaySunday(): void
    {
        $this->assertSame(
            1,
            DateTimeImmutable::fromArray([2018, 12, 30])->getWeekDay()
        );
    }

    /**
     * #getWeekDayInMonth
     */

    public function testGetWeekDayInMonth(): void
    {
        $this->assertSame(
            1,
            DateTimeImmutable::fromArray([2019, 6, 1])->getWeekDayInMonth()
        );
    }

    public function testGetWeekDayInMonthLocal(): void
    {
        $this->assertSame(
            1,
            DateTimeImmutable::fromArray([2019, 6, 7])->getWeekDayInMonth()
        );
    }

    /**
     * #getWeekOfMonth
     */

    public function testGetWeekOfMonth(): void
    {
        $this->assertSame(
            1,
            DateTimeImmutable::fromArray([2019, 6, 1])->getWeekOfMonth()
        );
    }

    public function testGetWeekOfMonthLocal(): void
    {
        $this->assertSame(
            2,
            DateTimeImmutable::fromArray([2019, 6, 3])->getWeekOfMonth()
        );
    }

    /**
     * #getWeekYear
     */

    public function testGetWeekYear(): void
    {
        $this->assertSame(
            2019,
            DateTimeImmutable::fromArray([2019, 1, 1])->getWeekYear()
        );
    }

    public function testGetWeekYearThursday(): void
    {
        $this->assertSame(
            2020,
            DateTimeImmutable::fromArray([2019, 12, 30])->getWeekYear()
        );
    }

    /**
     * #getYear
     */

    public function testGetYear(): void
    {
        $this->assertSame(
            2018,
            DateTimeImmutable::fromArray([2018])->getYear()
        );
    }

}
