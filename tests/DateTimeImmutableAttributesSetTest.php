<?php
declare(strict_types=1);

namespace Tests;

use
    Fyre\DateTime,
    Fyre\DateTimeImmutable;

trait DateTimeImmutableAttributesSetTest
{

    /**
     * #setDate
     */

    public function testDateTimeImmutableSetDate(): void
    {
        $date1 = DateTimeImmutable::fromArray([2019, 1, 1]);
        $date2 = $date1->setDate(15);
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2019-01-15T00:00:00.000+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableSetDateWrap(): void
    {
        $date1 = DateTimeImmutable::fromArray([2019, 6, 1]);
        $date2 = $date1->setDate(31);
        $this->assertEquals(
            '2019-06-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2019-07-01T00:00:00.000+00:00',
            $date2->toISOString()
        );
    }

    /**
     * #setDay
     */

    public function testDateTimeImmutableSetDay(): void
    {
        $date1 = DateTimeImmutable::fromArray([2019, 1, 1]);
        $date2 = $date1->setDay(5);
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2019-01-04T00:00:00.000+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableSetDayMonday(): void
    {
        $date1 = DateTimeImmutable::fromArray([2019, 1, 1]);
        $date2 = $date1->setDay(1);
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2018-12-31T00:00:00.000+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableSetDaySunday(): void
    {
        $date1 = DateTimeImmutable::fromArray([2019, 1, 1]);
        $date2 = $date1->setDay(0);
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2018-12-30T00:00:00.000+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableSetDayWrap(): void
    {
        $date1 = DateTimeImmutable::fromArray([2019, 1, 1]);
        $date2 = $date1->setDay(12);
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2019-01-11T00:00:00.000+00:00',
            $date2->toISOString()
        );
    }

    /**
     * #setDayOfYear
     */

    public function testDateTimeImmutableSetDayOfYear(): void
    {
        $date1 = DateTimeImmutable::fromArray([2019, 1, 1]);
        $date2 = $date1->setDayOfYear(235);
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2019-08-23T00:00:00.000+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableSetDayOfYearWrap(): void
    {
        $date1 = DateTimeImmutable::fromArray([2019, 1, 1]);
        $date2 = $date1->setDayOfYear(500);
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2020-05-14T00:00:00.000+00:00',
            $date2->toISOString()
        );
    }

    /**
     * #setHours
     */

    public function testDateTimeImmutableSetHours(): void
    {
        $date1 = DateTimeImmutable::fromArray([2019, 1, 1]);
        $date2 = $date1->setHours(9);
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2019-01-01T09:00:00.000+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableSetHours24hr(): void
    {
        $date1 = DateTimeImmutable::fromArray([2019, 1, 1]);
        $date2 = $date1->setHours(13);
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2019-01-01T13:00:00.000+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableSetHoursWithMinutes(): void
    {
        $date1 = DateTimeImmutable::fromArray([2019, 1, 1]);
        $date2 = $date1->setHours(0, 33);
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2019-01-01T00:33:00.000+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableSetHoursWithSeconds(): void
    {
        $date1 = DateTimeImmutable::fromArray([2019, 1, 1]);
        $date2 = $date1->setHours(0, 0, 23);
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2019-01-01T00:00:23.000+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableSetHoursWithMilliseconds(): void
    {
        $date1 = DateTimeImmutable::fromArray([2019, 1, 1]);
        $date2 = $date1->setHours(0, 0, 0, 303);
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2019-01-01T00:00:00.303+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableSetHoursWrap(): void
    {
        $date1 = DateTimeImmutable::fromArray([2019, 1, 1]);
        $date2 = $date1->setHours(33);
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2019-01-02T09:00:00.000+00:00',
            $date2->toISOString()
        );
    }

    /**
     * #setMilliseconds
     */

    public function testDateTimeImmutableSetMilliseconds(): void
    {
        $date1 = DateTimeImmutable::fromArray([2019, 1, 1]);
        $date2 = $date1->setMilliseconds(220);
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2019-01-01T00:00:00.220+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableSetMillisecondsWrap(): void
    {
        $date1 = DateTimeImmutable::fromArray([2019, 1, 1]);
        $date2 = $date1->setMilliseconds(1220);
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2019-01-01T00:00:01.220+00:00',
            $date2->toISOString()
        );
    }

    /**
     * #setMinutes
     */

    public function testDateTimeImmutableSetMinutes(): void
    {
        $date1 = DateTimeImmutable::fromArray([2019, 1, 1]);
        $date2 = $date1->setMinutes(15);
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2019-01-01T00:15:00.000+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableSetMinutesWithSeconds(): void
    {
        $date1 = DateTimeImmutable::fromArray([2019, 1, 1]);
        $date2 = $date1->setMinutes(0, 32);
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2019-01-01T00:00:32.000+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableSetMinutesWithMilliseconds(): void
    {
        $date1 = DateTimeImmutable::fromArray([2019, 1, 1]);
        $date2 = $date1->setMinutes(0, 0, 320);
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2019-01-01T00:00:00.320+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableSetMinutesWrap(): void
    {
        $date1 = DateTimeImmutable::fromArray([2019, 1, 1]);
        $date2 = $date1->setMinutes(75);
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2019-01-01T01:15:00.000+00:00',
            $date2->toISOString()
        );
    }

    /**
     * #setMonth
     */

    public function testDateTimeImmutableSetMonth(): void
    {
        $date1 = DateTimeImmutable::fromArray([2019, 1, 1]);
        $date2 = $date1->setMonth(9);
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2019-09-01T00:00:00.000+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableSetMonthClamp(): void
    {
        $date1 = DateTimeImmutable::fromArray([2019, 1, 31]);
        $date2 = $date1->setMonth(2);
        $this->assertEquals(
            '2019-01-31T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2019-02-28T00:00:00.000+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableSetMonthWithDate(): void
    {
        $date1 = DateTimeImmutable::fromArray([2019, 1, 1]);
        $date2 = $date1->setMonth(1, 23);
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2019-01-23T00:00:00.000+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableSetMonthWrap(): void
    {
        $date1 = DateTimeImmutable::fromArray([2019, 1, 1]);
        $date2 = $date1->setMonth(15);
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2020-03-01T00:00:00.000+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableSetMonthNoClamp(): void
    {
        DateTime::setDateClamping(false);
        $date1 = DateTimeImmutable::fromArray([2019, 1, 31]);
        $date2 = $date1->setMonth(2);
        $this->assertEquals(
            '2019-01-31T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2019-03-03T00:00:00.000+00:00',
            $date2->toISOString()
        );
        DateTime::setDateClamping(true);
    }

    /**
     * #setQuarter
     */

    public function testDateTimeImmutableSetQuarter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2019, 1, 1]);
        $date2 = $date1->setQuarter(2);
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2019-04-01T00:00:00.000+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableSetQuarterWrap(): void
    {
        $date1 = DateTimeImmutable::fromArray([2019, 1, 1]);
        $date2 = $date1->setQuarter(6);
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2020-04-01T00:00:00.000+00:00',
            $date2->toISOString()
        );
    }

    /**
     * #setSeconds
     */

    public function testDateTimeImmutableSetSeconds(): void
    {
        $date1 = DateTimeImmutable::fromArray([2019, 1, 1]);
        $date2 = $date1->setSeconds(42);
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2019-01-01T00:00:42.000+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableSetSecondsWithMilliseconds(): void
    {
        $date1 = DateTimeImmutable::fromArray([2019, 1, 1]);
        $date2 = $date1->setSeconds(0, 550);
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2019-01-01T00:00:00.550+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableSetSecondsWrap(): void
    {
        $date1 = DateTimeImmutable::fromArray([2019, 1, 1]);
        $date2 = $date1->setSeconds(105);
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2019-01-01T00:01:45.000+00:00',
            $date2->toISOString()
        );
    }

    /**
     * #setTime
     */

    public function testDateTimeImmutableSetTime(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1]);
        $date2 = $date1->setTime(1546300800000);
        $this->assertEquals(
            '2018-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableSetTimestamp(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1]);
        $date2 = $date1->setTimestamp(1546300800);
        $this->assertEquals(
            '2018-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            $date2->toISOString()
        );
    }

    /**
     * #setTimeZone
     */

    public function testDateTimeImmutableSetTimeZone(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1]);
        $date2 = $date1->setTimeZone('Australia/Brisbane');
        $this->assertEquals(
            'UTC',
            $date1->getTimeZone()
        );
        $this->assertEquals(
            'Australia/Brisbane',
            $date2->getTimeZone()
        );
    }

    public function testDateTimeImmutableSetTimeZoneFromOffset(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1]);
        $date2 = $date1->setTimeZone('+10:00');
        $this->assertEquals(
            0,
            $date1->getTimeZoneOffset()
        );
        $this->assertEquals(
            -600,
            $date2->getTimeZoneOffset()
        );
    }

    public function testDateTimeImmutableSetTimeZoneFromOffsetWithoutColon(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1]);
        $date2 = $date1->setTimeZone('+1000');
        $this->assertEquals(
            0,
            $date1->getTimeZoneOffset()
        );
        $this->assertEquals(
            -600,
            $date2->getTimeZoneOffset()
        );
    }

    /**
     * #setTimeZoneOffset
     */

    public function testDateTimeImmutableSetTimeZoneOffset(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1]);
        $date2 = $date1->setTimeZoneOffset(600);
        $this->assertEquals(
            0,
            $date1->getTimeZoneOffset()
        );
        $this->assertEquals(
            600,
            $date2->getTimeZoneOffset()
        );
    }

    /**
     * #setWeek
     */

    public function testDateTimeImmutableSetWeek(): void
    {
        $date1 = DateTimeImmutable::fromArray([2019, 1, 1]);
        $date2 = $date1->setWeek(23);
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2019-06-04T00:00:00.000+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableSetWeekUsesWeekYear(): void
    {
        $date1 = DateTimeImmutable::fromArray([2019, 12, 30]);
        $date2 = $date1->setWeek(23);
        $this->assertEquals(
            '2019-12-30T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2020-06-01T00:00:00.000+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableSetWeekWithDays(): void
    {
        $date1 = DateTimeImmutable::fromArray([2019, 1, 1]);
        $date2 = $date1->setWeek(1, 6);
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2019-01-04T00:00:00.000+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableSetWeekWrap(): void
    {
        $date1 = DateTimeImmutable::fromArray([2019, 1, 1]);
        $date2 = $date1->setWeek(77);
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2020-06-16T00:00:00.000+00:00',
            $date2->toISOString()
        );
    }

    /**
     * #setWeekDay
     */

    public function testDateTimeImmutableSetWeekDay(): void
    {
        $date1 = DateTimeImmutable::fromArray([2019, 1, 1]);
        $date2 = $date1->setWeekDay(6);
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2019-01-04T00:00:00.000+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableSetWeekDayMonday(): void
    {
        $date1 = DateTimeImmutable::fromArray([2019, 1, 1]);
        $date2 = $date1->setWeekDay(2);
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2018-12-31T00:00:00.000+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableSetWeekDaySunday(): void
    {
        $date1 = DateTimeImmutable::fromArray([2019, 1, 1]);
        $date2 = $date1->setWeekDay(1);
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2018-12-30T00:00:00.000+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableSetWeekDayWrap(): void
    {
        $date1 = DateTimeImmutable::fromArray([2019, 1, 1]);
        $date2 = $date1->setWeekDay(14);
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2019-01-12T00:00:00.000+00:00',
            $date2->toISOString()
        );
    }

    /**
     * #setWeekDayInMonth
     */

    public function testDateTimeImmutableSetWeekDayInMonth(): void
    {
        $date1 = DateTimeImmutable::fromArray([2019, 6, 1]);
        $date2 = $date1->setWeekDayInMonth(4);
        $this->assertEquals(
            '2019-06-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2019-06-22T00:00:00.000+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableSetWeekDayInMonthLocal(): void
    {
        $date1 = DateTimeImmutable::fromArray([2019, 6, 28]);
        $date2 = $date1->setWeekDayInMonth(1);
        $this->assertEquals(
            '2019-06-28T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2019-06-07T00:00:00.000+00:00',
            $date2->toISOString()
        );
    }

    /**
     * #setWeekOfMonth
     */

    public function testDateTimeImmutableSetWeekOfMonth(): void
    {
        $date1 = DateTimeImmutable::fromArray([2019, 6, 1]);
        $date2 = $date1->setWeekOfMonth(4);
        $this->assertEquals(
            '2019-06-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2019-06-22T00:00:00.000+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableSetWeekOfMonthLocal(): void
    {
        $date1 = DateTimeImmutable::fromArray([2019, 6, 28]);
        $date2 = $date1->setWeekOfMonth(1);
        $this->assertEquals(
            '2019-06-28T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2019-05-31T00:00:00.000+00:00',
            $date2->toISOString()
        );
    }

    /**
     * #setWeekYear
     */

    public function testDateTimeImmutableSetWeekYear(): void
    {
        $date1 = DateTimeImmutable::fromArray([2019, 1, 1]);
        $date2 = $date1->setWeekYear(2018);
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2018-01-02T00:00:00.000+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableSetWeekYearKeepsWeek(): void
    {
        $date1 = DateTimeImmutable::fromArray([2019, 6, 1]);
        $date2 = $date1->setWeekYear(2018);
        $this->assertEquals(
            '2019-06-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2018-06-02T00:00:00.000+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableSetWeekYearWithWeek(): void
    {
        $date1 = DateTimeImmutable::fromArray([2019, 1, 1]);
        $date2 = $date1->setWeekYear(2018, 14);
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2018-04-03T00:00:00.000+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableSetWeekYearWithDays(): void
    {
        $date1 = DateTimeImmutable::fromArray([2019, 1, 1]);
        $date2 = $date1->setWeekYear(2018, 1, 6);
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2018-01-05T00:00:00.000+00:00',
            $date2->toISOString()
        );
    }

    /**
     * #setYear
     */

    public function testDateTimeImmutableSetYear(): void
    {
        $date1 = DateTimeImmutable::fromArray([2019, 1, 1]);
        $date2 = $date1->setYear(2018);
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2018-01-01T00:00:00.000+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableSetYearWithMonths(): void
    {
        $date1 = DateTimeImmutable::fromArray([2019, 1, 1]);
        $date2 = $date1->setYear(2018, 6);
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2018-06-01T00:00:00.000+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableSetYearWithDays(): void
    {
        $date1 = DateTimeImmutable::fromArray([2019, 1, 1]);
        $date2 = $date1->setYear(2018, 1, 16);
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2018-01-16T00:00:00.000+00:00',
            $date2->toISOString()
        );
    }

}
