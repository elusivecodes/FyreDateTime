<?php
declare(strict_types=1);

namespace Tests;

use
    Fyre\DateTime;

trait DateTimeManipulateTest
{

    /**
     * #add
     */

    public function testDateTimeAddYear(): void
    {
        $date1 = DateTime::fromArray([2018]);
        $date2 = $date1->add(1, 'year');
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeAddYears(): void
    {
        $date1 = DateTime::fromArray([2018]);
        $date2 = $date1->add(2, 'years');
        $this->assertEquals(
            '2020-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeAddMonth(): void
    {
        $date1 = DateTime::fromArray([2018]);
        $date2 = $date1->add(1, 'month');
        $this->assertEquals(
            '2018-02-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeAddMonths(): void
    {
        $date1 = DateTime::fromArray([2018]);
        $date2 = $date1->add(2, 'months');
        $this->assertEquals(
            '2018-03-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeAddWeek(): void
    {
        $date1 = DateTime::fromArray([2018]);
        $date2 = $date1->add(1, 'week');
        $this->assertEquals(
            '2018-01-08T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeAddWeeks(): void
    {
        $date1 = DateTime::fromArray([2018]);
        $date2 = $date1->add(2, 'weeks');
        $this->assertEquals(
            '2018-01-15T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeAddDay(): void
    {
        $date1 = DateTime::fromArray([2018]);
        $date2 = $date1->add(1, 'day');
        $this->assertEquals(
            '2018-01-02T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeAddDays(): void
    {
        $date1 = DateTime::fromArray([2018]);
        $date2 = $date1->add(2, 'days');
        $this->assertEquals(
            '2018-01-03T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeAddHour(): void
    {
        $date1 = DateTime::fromArray([2018]);
        $date2 = $date1->add(1, 'hour');
        $this->assertEquals(
            '2018-01-01T01:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeAddHours(): void
    {
        $date1 = DateTime::fromArray([2018]);
        $date2 = $date1->add(2, 'hours');
        $this->assertEquals(
            '2018-01-01T02:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeAddMinute(): void
    {
        $date1 = DateTime::fromArray([2018]);
        $date2 = $date1->add(1, 'minute');
        $this->assertEquals(
            '2018-01-01T00:01:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeAddMinutes(): void
    {
        $date1 = DateTime::fromArray([2018]);
        $date2 = $date1->add(2, 'minutes');
        $this->assertEquals(
            '2018-01-01T00:02:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeAddSecond(): void
    {
        $date1 = DateTime::fromArray([2018]);
        $date2 = $date1->add(1, 'second');
        $this->assertEquals(
            '2018-01-01T00:00:01.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeAddSeconds(): void
    {
        $date1 = DateTime::fromArray([2018]);
        $date2 = $date1->add(2, 'seconds');
        $this->assertEquals(
            '2018-01-01T00:00:02.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    /**
     * #sub
     */

    public function testDateTimeSubYear(): void
    {
        $date1 = DateTime::fromArray([2018]);
        $date2 = $date1->sub(1, 'year');
        $this->assertEquals(
            '2017-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeSubYears(): void
    {
        $date1 = DateTime::fromArray([2018]);
        $date2 = $date1->sub(2, 'years');
        $this->assertEquals(
            '2016-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeSubMonth(): void
    {
        $date1 = DateTime::fromArray([2018]);
        $date2 = $date1->sub(1, 'month');
        $this->assertEquals(
            '2017-12-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeSubMonths(): void
    {
        $date1 = DateTime::fromArray([2018]);
        $date2 = $date1->sub(2, 'months');
        $this->assertEquals(
            '2017-11-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeSubWeek(): void
    {
        $date1 = DateTime::fromArray([2018]);
        $date2 = $date1->sub(1, 'week');
        $this->assertEquals(
            '2017-12-25T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeSubWeeks(): void
    {
        $date1 = DateTime::fromArray([2018]);
        $date2 = $date1->sub(2, 'weeks');
        $this->assertEquals(
            '2017-12-18T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeSubDay(): void
    {
        $date1 = DateTime::fromArray([2018]);
        $date2 = $date1->sub(1, 'day');
        $this->assertEquals(
            '2017-12-31T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeSubDays(): void
    {
        $date1 = DateTime::fromArray([2018]);
        $date2 = $date1->sub(2, 'days');
        $this->assertEquals(
            '2017-12-30T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeSubHour(): void
    {
        $date1 = DateTime::fromArray([2018]);
        $date2 = $date1->sub(1, 'hour');
        $this->assertEquals(
            '2017-12-31T23:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeSubHours(): void
    {
        $date1 = DateTime::fromArray([2018]);
        $date2 = $date1->sub(2, 'hours');
        $this->assertEquals(
            '2017-12-31T22:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeSubMinute(): void
    {
        $date1 = DateTime::fromArray([2018]);
        $date2 = $date1->sub(1, 'minute');
        $this->assertEquals(
            '2017-12-31T23:59:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeSubMinutes(): void
    {
        $date1 = DateTime::fromArray([2018]);
        $date2 = $date1->sub(2, 'minutes');
        $this->assertEquals(
            '2017-12-31T23:58:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeSubSecond(): void
    {
        $date1 = DateTime::fromArray([2018]);
        $date2 = $date1->sub(1, 'second');
        $this->assertEquals(
            '2017-12-31T23:59:59.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeSubSeconds(): void
    {
        $date1 = DateTime::fromArray([2018]);
        $date2 = $date1->sub(2, 'seconds');
        $this->assertEquals(
            '2017-12-31T23:59:58.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    /**
     * #startOf
     */

    public function testDateTimeStartOfYear(): void
    {
        $date1 = DateTime::fromArray([2018, 6, 15, 11, 30, 30, 500]);
        $date2 = $date1->startOf('year');
        $this->assertEquals(
            '2018-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeStartOfQuarter(): void
    {
        $date1 = DateTime::fromArray([2018, 8, 15, 11, 30, 30, 500]);
        $date2 = $date1->startOf('quarter');
        $this->assertEquals(
            '2018-07-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeStartOfMonth(): void
    {
        $date1 = DateTime::fromArray([2018, 6, 15, 11, 30, 30, 500]);
        $date2 = $date1->startOf('month');
        $this->assertEquals(
            '2018-06-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeStartOfWeek(): void
    {
        $date1 = DateTime::fromArray([2018, 6, 15, 11, 30, 30, 500]);
        $date2 = $date1->startOf('week');
        $this->assertEquals(
            '2018-06-10T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeStartOfDay(): void
    {
        $date1 = DateTime::fromArray([2018, 6, 15, 11, 30, 30, 500]);
        $date2 = $date1->startOf('day');
        $this->assertEquals(
            '2018-06-15T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeStartOfHour(): void
    {
        $date1 = DateTime::fromArray([2018, 6, 15, 11, 30, 30, 500]);
        $date2 = $date1->startOf('hour');
        $this->assertEquals(
            '2018-06-15T11:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeStartOfMinute(): void
    {
        $date1 = DateTime::fromArray([2018, 6, 15, 11, 30, 30, 500]);
        $date2 = $date1->startOf('minute');
        $this->assertEquals(
            '2018-06-15T11:30:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeStartOfSecond(): void
    {
        $date1 = DateTime::fromArray([2018, 6, 15, 11, 30, 30, 500]);
        $date2 = $date1->startOf('second');
        $this->assertEquals(
            '2018-06-15T11:30:30.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    /**
     * #endOf
     */

    public function testDateTimeEndOfYear(): void
    {
        $date1 = DateTime::fromArray([2018, 6, 15, 11, 30, 30, 500]);
        $date2 = $date1->EndOf('year');
        $this->assertEquals(
            '2018-12-31T23:59:59.999+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeEndOfQuarter(): void
    {
        $date1 = DateTime::fromArray([2018, 8, 15, 11, 30, 30, 500]);
        $date2 = $date1->EndOf('quarter');
        $this->assertEquals(
            '2018-09-30T23:59:59.999+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeEndOfMonth(): void
    {
        $date1 = DateTime::fromArray([2018, 6, 15, 11, 30, 30, 500]);
        $date2 = $date1->EndOf('month');
        $this->assertEquals(
            '2018-06-30T23:59:59.999+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeEndOfWeek(): void
    {
        $date1 = DateTime::fromArray([2018, 6, 15, 11, 30, 30, 500]);
        $date2 = $date1->EndOf('week');
        $this->assertEquals(
            '2018-06-16T23:59:59.999+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeEndOfDay(): void
    {
        $date1 = DateTime::fromArray([2018, 6, 15, 11, 30, 30, 500]);
        $date2 = $date1->EndOf('day');
        $this->assertEquals(
            '2018-06-15T23:59:59.999+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeEndOfHour(): void
    {
        $date1 = DateTime::fromArray([2018, 6, 15, 11, 30, 30, 500]);
        $date2 = $date1->EndOf('hour');
        $this->assertEquals(
            '2018-06-15T11:59:59.999+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeEndOfMinute(): void
    {
        $date1 = DateTime::fromArray([2018, 6, 15, 11, 30, 30, 500]);
        $date2 = $date1->EndOf('minute');
        $this->assertEquals(
            '2018-06-15T11:30:59.999+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

    public function testDateTimeEndOfSecond(): void
    {
        $date1 = DateTime::fromArray([2018, 6, 15, 11, 30, 30, 500]);
        $date2 = $date1->EndOf('second');
        $this->assertEquals(
            '2018-06-15T11:30:30.999+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            $date1,
            $date2
        );
    }

}
