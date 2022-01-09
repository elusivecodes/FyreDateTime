<?php
declare(strict_types=1);

namespace Tests\DateTime;

use
    Fyre\DateTime\DateTime;

trait AttributesSetTest
{

    /**
     * #setDate
     */

    public function testSetDate(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setDate(15);

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2019-01-15T00:00:00.000+00:00',
            $date1->toISOString()
        );
    }

    public function testSetDateWrap(): void
    {
        $date1 = DateTime::fromArray([2019, 6, 1]);
        $date2 = $date1->setDate(31);

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2019-07-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
    }

    /**
     * #setDay
     */

    public function testSetDay(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setDay(5);

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2019-01-04T00:00:00.000+00:00',
            $date1->toISOString()
        );
    }

    public function testSetDayMonday(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setDay(1);

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2018-12-31T00:00:00.000+00:00',
            $date1->toISOString()
        );
    }

    public function testSetDaySunday(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setDay(0);

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2018-12-30T00:00:00.000+00:00',
            $date1->toISOString()
        );
    }

    public function testSetDayWrap(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setDay(12);

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2019-01-11T00:00:00.000+00:00',
            $date1->toISOString()
        );
    }

    /**
     * #setDayOfYear
     */

    public function testSetDayOfYear(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setDayOfYear(235);

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2019-08-23T00:00:00.000+00:00',
            $date1->toISOString()
        );
    }

    public function testSetDayOfYearWrap(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setDayOfYear(500);

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2020-05-14T00:00:00.000+00:00',
            $date1->toISOString()
        );
    }

    /**
     * #setHours
     */

    public function testSetHours(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setHours(9);

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2019-01-01T09:00:00.000+00:00',
            $date1->toISOString()
        );
    }

    public function testSetHours24hr(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setHours(13);

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2019-01-01T13:00:00.000+00:00',
            $date1->toISOString()
        );
    }

    public function testSetHoursWithMinutes(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setHours(0, 33);

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2019-01-01T00:33:00.000+00:00',
            $date1->toISOString()
        );
    }

    public function testSetHoursWithSeconds(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setHours(0, 0, 23);

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2019-01-01T00:00:23.000+00:00',
            $date1->toISOString()
        );
    }

    public function testSetHoursWithMilliseconds(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setHours(0, 0, 0, 303);

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2019-01-01T00:00:00.303+00:00',
            $date1->toISOString()
        );
    }

    public function testSetHoursWrap(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setHours(33);

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2019-01-02T09:00:00.000+00:00',
            $date1->toISOString()
        );
    }

    /**
     * #setMilliseconds
     */

    public function testSetMilliseconds(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setMilliseconds(220);

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2019-01-01T00:00:00.220+00:00',
            $date1->toISOString()
        );
    }

    public function testSetMillisecondsWrap(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setMilliseconds(1220);

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2019-01-01T00:00:01.220+00:00',
            $date1->toISOString()
        );
    }

    /**
     * #setMinutes
     */

    public function testSetMinutes(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setMinutes(15);

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2019-01-01T00:15:00.000+00:00',
            $date1->toISOString()
        );
    }

    public function testSetMinutesWithSeconds(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setMinutes(0, 32);

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2019-01-01T00:00:32.000+00:00',
            $date1->toISOString()
        );
    }

    public function testSetMinutesWithMilliseconds(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setMinutes(0, 0, 320);

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2019-01-01T00:00:00.320+00:00',
            $date1->toISOString()
        );
    }

    public function testSetMinutesWrap(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setMinutes(75);

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2019-01-01T01:15:00.000+00:00',
            $date1->toISOString()
        );
    }

    /**
     * #setMonth
     */

    public function testSetMonth(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setMonth(9);

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2019-09-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
    }

    public function testSetMonthClamp(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 31]);
        $date2 = $date1->setMonth(2);

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2019-02-28T00:00:00.000+00:00',
            $date1->toISOString()
        );
    }

    public function testSetMonthWithDate(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setMonth(1, 23);

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2019-01-23T00:00:00.000+00:00',
            $date1->toISOString()
        );
    }

    public function testSetMonthWrap(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setMonth(15);

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2020-03-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
    }

    public function testSetMonthNoClamp(): void
    {
        DateTime::setDateClamping(false);
        $date1 = DateTime::fromArray([2019, 1, 31]);
        $date2 = $date1->setMonth(2);

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2019-03-03T00:00:00.000+00:00',
            $date1->toISOString()
        );
        DateTime::setDateClamping(true);
    }

    /**
     * #setQuarter
     */

    public function testSetQuarter(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setQuarter(2);

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2019-04-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
    }

    public function testSetQuarterWrap(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setQuarter(6);

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2020-04-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
    }

    /**
     * #setSeconds
     */

    public function testSetSeconds(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setSeconds(42);

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2019-01-01T00:00:42.000+00:00',
            $date1->toISOString()
        );
    }

    public function testSetSecondsWithMilliseconds(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setSeconds(0, 550);

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2019-01-01T00:00:00.550+00:00',
            $date1->toISOString()
        );
    }

    public function testSetSecondsWrap(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setSeconds(105);

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2019-01-01T00:01:45.000+00:00',
            $date1->toISOString()
        );
    }

    /**
     * #setTime
     */

    public function testSetTime(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1]);
        $date2 = $date1->setTime(1546300800000);

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2019-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
    }

    public function testSetTimestamp(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1]);
        $date2 = $date1->setTimestamp(1546300800);

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2019-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
    }

    /**
     * #setTimeZone
     */

    public function testSetTimeZone(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1]);
        $date2 = $date1->setTimeZone('Australia/Brisbane');

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            'Australia/Brisbane',
            $date1->getTimeZone()
        );
    }

    public function testSetTimeZoneFromOffset(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1]);
        $date2 = $date1->setTimeZone('+10:00');

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            -600,
            $date1->getTimeZoneOffset()
        );
    }

    public function testSetTimeZoneFromOffsetWithoutColon(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1]);
        $date2 = $date1->setTimeZone('+1000');

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            -600,
            $date1->getTimeZoneOffset()
        );
    }

    /**
     * #setTimeZoneOffset
     */

    public function testSetTimeZoneOffset(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1]);
        $date2 = $date1->setTimeZoneOffset(600);

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            600,
            $date1->getTimeZoneOffset()
        );
    }

    /**
     * #setWeek
     */

    public function testSetWeek(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setWeek(23);

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2019-06-04T00:00:00.000+00:00',
            $date1->toISOString()
        );
    }

    public function testSetWeekUsesWeekYear(): void
    {
        $date1 = DateTime::fromArray([2019, 12, 30]);
        $date2 = $date1->setWeek(23);

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2020-06-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
    }

    public function testSetWeekWithDays(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setWeek(1, 6);

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2019-01-04T00:00:00.000+00:00',
            $date1->toISOString()
        );
    }

    public function testSetWeekWrap(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setWeek(77);

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2020-06-16T00:00:00.000+00:00',
            $date1->toISOString()
        );
    }

    /**
     * #setWeekDay
     */

    public function testSetWeekDay(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setWeekDay(6);

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2019-01-04T00:00:00.000+00:00',
            $date1->toISOString()
        );
    }

    public function testSetWeekDayMonday(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setWeekDay(2);

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2018-12-31T00:00:00.000+00:00',
            $date1->toISOString()
        );
    }

    public function testSetWeekDaySunday(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setWeekDay(1);

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2018-12-30T00:00:00.000+00:00',
            $date1->toISOString()
        );
    }

    public function testSetWeekDayWrap(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setWeekDay(14);

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2019-01-12T00:00:00.000+00:00',
            $date1->toISOString()
        );
    }

    /**
     * #setWeekDayInMonth
     */

    public function testSetWeekDayInMonth(): void
    {
        $date1 = DateTime::fromArray([2019, 6, 1]);
        $date2 = $date1->setWeekDayInMonth(4);

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2019-06-22T00:00:00.000+00:00',
            $date1->toISOString()
        );
    }

    public function testSetWeekDayInMonthLocal(): void
    {
        $date1 = DateTime::fromArray([2019, 6, 28]);
        $date2 = $date1->setWeekDayInMonth(1);

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2019-06-07T00:00:00.000+00:00',
            $date1->toISOString()
        );
    }

    /**
     * #setWeekOfMonth
     */

    public function testSetWeekOfMonth(): void
    {
        $date1 = DateTime::fromArray([2019, 6, 1]);
        $date2 = $date1->setWeekOfMonth(4);

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2019-06-22T00:00:00.000+00:00',
            $date1->toISOString()
        );
    }

    public function testSetWeekOfMonthLocal(): void
    {
        $date1 = DateTime::fromArray([2019, 6, 28]);
        $date2 = $date1->setWeekOfMonth(1);

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2019-05-31T00:00:00.000+00:00',
            $date1->toISOString()
        );
    }

    /**
     * #setWeekYear
     */

    public function testSetWeekYear(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setWeekYear(2018);

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2018-01-02T00:00:00.000+00:00',
            $date1->toISOString()
        );
    }

    public function testSetWeekYearKeepsWeek(): void
    {
        $date1 = DateTime::fromArray([2019, 6, 1]);
        $date2 = $date1->setWeekYear(2018);

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2018-06-02T00:00:00.000+00:00',
            $date1->toISOString()
        );
    }

    public function testSetWeekYearWithWeek(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setWeekYear(2018, 14);

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2018-04-03T00:00:00.000+00:00',
            $date1->toISOString()
        );
    }

    public function testSetWeekYearWithDays(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setWeekYear(2018, 1, 6);

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2018-01-05T00:00:00.000+00:00',
            $date1->toISOString()
        );
    }

    /**
     * #setYear
     */

    public function testSetYear(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setYear(2018);

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2018-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
    }

    public function testSetYearWithMonths(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setYear(2018, 6);

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2018-06-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
    }

    public function testSetYearWithDays(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->setYear(2018, 1, 16);

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2018-01-16T00:00:00.000+00:00',
            $date1->toISOString()
        );
    }

}
