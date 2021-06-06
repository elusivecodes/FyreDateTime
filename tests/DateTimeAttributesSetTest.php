<?php
declare(strict_types=1);

namespace Tests;

use
    Fyre\DateTime;

trait DateTimeAttributesSetTest
{

    /**
     * #setDate
     */

    public function testDateTimeSetDate(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setDate(15);
        $this->assertEquals(
            '2019-01-15T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeSetDateWrap(): void
    {
        $date1 = DateTime::fromArray([2019, 6, 1]);
        $date2 = $date1->setDate(31);
        $this->assertEquals(
            '2019-07-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    /**
     * #setDay
     */

    public function testDateTimeSetDay(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setDay(5);
        $this->assertEquals(
            '2019-01-04T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeSetDayMonday(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setDay(1);
        $this->assertEquals(
            '2018-12-31T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeSetDaySunday(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setDay(0);
        $this->assertEquals(
            '2018-12-30T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeSetDayWrap(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setDay(12);
        $this->assertEquals(
            '2019-01-11T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    /**
     * #setDayOfYear
     */

    public function testDateTimeSetDayOfYear(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setDayOfYear(235);
        $this->assertEquals(
            '2019-08-23T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeSetDayOfYearWrap(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setDayOfYear(500);
        $this->assertEquals(
            '2020-05-14T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    /**
     * #setHours
     */

    public function testDateTimeSetHours(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setHours(9);
        $this->assertEquals(
            '2019-01-01T09:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeSetHours24hr(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setHours(13);
        $this->assertEquals(
            '2019-01-01T13:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeSetHoursWithMinutes(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setHours(0, 33);
        $this->assertEquals(
            '2019-01-01T00:33:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeSetHoursWithSeconds(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setHours(0, 0, 23);
        $this->assertEquals(
            '2019-01-01T00:00:23.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeSetHoursWithMilliseconds(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setHours(0, 0, 0, 303);
        $this->assertEquals(
            '2019-01-01T00:00:00.303+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeSetHoursWrap(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setHours(33);
        $this->assertEquals(
            '2019-01-02T09:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    /**
     * #setMilliseconds
     */

    public function testDateTimeSetMilliseconds(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setMilliseconds(220);
        $this->assertEquals(
            '2019-01-01T00:00:00.220+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeSetMillisecondsWrap(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setMilliseconds(1220);
        $this->assertEquals(
            '2019-01-01T00:00:01.220+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    /**
     * #setMinutes
     */

    public function testDateTimeSetMinutes(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setMinutes(15);
        $this->assertEquals(
            '2019-01-01T00:15:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeSetMinutesWithSeconds(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setMinutes(0, 32);
        $this->assertEquals(
            '2019-01-01T00:00:32.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeSetMinutesWithMilliseconds(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setMinutes(0, 0, 320);
        $this->assertEquals(
            '2019-01-01T00:00:00.320+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeSetMinutesWrap(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setMinutes(75);
        $this->assertEquals(
            '2019-01-01T01:15:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    /**
     * #setMonth
     */

    public function testDateTimeSetMonth(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setMonth(9);
        $this->assertEquals(
            '2019-09-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeSetMonthClamp(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 31]);
        $date2 = $date1->setMonth(2);
        $this->assertEquals(
            '2019-02-28T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeSetMonthWithDate(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setMonth(1, 23);
        $this->assertEquals(
            '2019-01-23T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeSetMonthWrap(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setMonth(15);
        $this->assertEquals(
            '2020-03-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeSetMonthNoClamp(): void
    {
        DateTime::setDateClamping(false);
        $date1 = DateTime::fromArray([2019, 1, 31]);
        $date2 = $date1->setMonth(2);
        $this->assertEquals(
            '2019-03-03T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
        DateTime::setDateClamping(true);
    }

    /**
     * #setQuarter
     */

    public function testDateTimeSetQuarter(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setQuarter(2);
        $this->assertEquals(
            '2019-04-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeSetQuarterWrap(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setQuarter(6);
        $this->assertEquals(
            '2020-04-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    /**
     * #setSeconds
     */

    public function testDateTimeSetSeconds(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setSeconds(42);
        $this->assertEquals(
            '2019-01-01T00:00:42.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeSetSecondsWithMilliseconds(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setSeconds(0, 550);
        $this->assertEquals(
            '2019-01-01T00:00:00.550+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeSetSecondsWrap(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setSeconds(105);
        $this->assertEquals(
            '2019-01-01T00:01:45.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    /**
     * #setTime
     */

    public function testDateTimeSetTime(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1]);
        $date2 = $date1->setTime(1546300800000);
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeSetTimestamp(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1]);
        $date2 = $date1->setTimestamp(1546300800);
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    /**
     * #setTimeZone
     */

    public function testDateTimeSetTimeZone(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1]);
        $date2 = $date1->setTimeZone('Australia/Brisbane');
        $this->assertEquals(
            'Australia/Brisbane',
            $date1->getTimeZone()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeSetTimeZoneFromOffset(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1]);
        $date2 = $date1->setTimeZone('+10:00');
        $this->assertEquals(
            -600,
            $date1->getTimeZoneOffset()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeSetTimeZoneFromOffsetWithoutColon(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1]);
        $date2 = $date1->setTimeZone('+1000');
        $this->assertEquals(
            -600,
            $date1->getTimeZoneOffset()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    /**
     * #setTimeZoneOffset
     */

    public function testDateTimeSetTimeZoneOffset(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1]);
        $date2 = $date1->setTimeZoneOffset(600);
        $this->assertEquals(
            600,
            $date1->getTimeZoneOffset()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    /**
     * #setWeek
     */

    public function testDateTimeSetWeek(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setWeek(23);
        $this->assertEquals(
            '2019-06-04T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeSetWeekUsesWeekYear(): void
    {
        $date1 = DateTime::fromArray([2019, 12, 30]);
        $date2 = $date1->setWeek(23);
        $this->assertEquals(
            '2020-06-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeSetWeekWithDays(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setWeek(1, 6);
        $this->assertEquals(
            '2019-01-04T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeSetWeekWrap(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setWeek(77);
        $this->assertEquals(
            '2020-06-16T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    /**
     * #setWeekDay
     */

    public function testDateTimeSetWeekDay(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setWeekDay(6);
        $this->assertEquals(
            '2019-01-04T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeSetWeekDayMonday(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setWeekDay(2);
        $this->assertEquals(
            '2018-12-31T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeSetWeekDaySunday(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setWeekDay(1);
        $this->assertEquals(
            '2018-12-30T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeSetWeekDayWrap(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setWeekDay(14);
        $this->assertEquals(
            '2019-01-12T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    /**
     * #setWeekDayInMonth
     */

    public function testDateTimeSetWeekDayInMonth(): void
    {
        $date1 = DateTime::fromArray([2019, 6, 1]);
        $date2 = $date1->setWeekDayInMonth(4);
        $this->assertEquals(
            '2019-06-22T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeSetWeekDayInMonthLocal(): void
    {
        $date1 = DateTime::fromArray([2019, 6, 28]);
        $date2 = $date1->setWeekDayInMonth(1);
        $this->assertEquals(
            '2019-06-07T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    /**
     * #setWeekOfMonth
     */

    public function testDateTimeSetWeekOfMonth(): void
    {
        $date1 = DateTime::fromArray([2019, 6, 1]);
        $date2 = $date1->setWeekOfMonth(4);
        $this->assertEquals(
            '2019-06-22T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeSetWeekOfMonthLocal(): void
    {
        $date1 = DateTime::fromArray([2019, 6, 28]);
        $date2 = $date1->setWeekOfMonth(1);
        $this->assertEquals(
            '2019-05-31T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    /**
     * #setWeekYear
     */

    public function testDateTimeSetWeekYear(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setWeekYear(2018);
        $this->assertEquals(
            '2018-01-02T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeSetWeekYearKeepsWeek(): void
    {
        $date1 = DateTime::fromArray([2019, 6, 1]);
        $date2 = $date1->setWeekYear(2018);
        $this->assertEquals(
            '2018-06-02T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeSetWeekYearWithWeek(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setWeekYear(2018, 14);
        $this->assertEquals(
            '2018-04-03T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeSetWeekYearWithDays(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setWeekYear(2018, 1, 6);
        $this->assertEquals(
            '2018-01-05T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    /**
     * #setYear
     */

    public function testDateTimeSetYear(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setYear(2018);
        $this->assertEquals(
            '2018-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeSetYearWithMonths(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setYear(2018, 6);
        $this->assertEquals(
            '2018-06-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeSetYearWithDays(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setYear(2018, 1, 16);
        $this->assertEquals(
            '2018-01-16T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

}
