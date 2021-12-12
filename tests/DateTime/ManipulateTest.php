<?php
declare(strict_types=1);

namespace Tests\DateTime;

use
    Fyre\DateTime\DateTime;

trait ManipulateTest
{

    /**
     * #add
     */

    public function testAddYear(): void
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

    public function testAddYears(): void
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

    public function testAddMonth(): void
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

    public function testAddMonths(): void
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

    public function testAddWeek(): void
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

    public function testAddWeeks(): void
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

    public function testAddDay(): void
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

    public function testAddDays(): void
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

    public function testAddHour(): void
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

    public function testAddHours(): void
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

    public function testAddMinute(): void
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

    public function testAddMinutes(): void
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

    public function testAddSecond(): void
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

    public function testAddSeconds(): void
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

    public function testSubYear(): void
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

    public function testSubYears(): void
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

    public function testSubMonth(): void
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

    public function testSubMonths(): void
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

    public function testSubWeek(): void
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

    public function testSubWeeks(): void
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

    public function testSubDay(): void
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

    public function testSubDays(): void
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

    public function testSubHour(): void
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

    public function testSubHours(): void
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

    public function testSubMinute(): void
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

    public function testSubMinutes(): void
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

    public function testSubSecond(): void
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

    public function testSubSeconds(): void
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

    public function testStartOfYear(): void
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

    public function testStartOfQuarter(): void
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

    public function testStartOfMonth(): void
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

    public function testStartOfWeek(): void
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

    public function testStartOfDay(): void
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

    public function testStartOfHour(): void
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

    public function testStartOfMinute(): void
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

    public function testStartOfSecond(): void
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

    public function testEndOfYear(): void
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

    public function testEndOfQuarter(): void
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

    public function testEndOfMonth(): void
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

    public function testEndOfWeek(): void
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

    public function testEndOfDay(): void
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

    public function testEndOfHour(): void
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

    public function testEndOfMinute(): void
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

    public function testEndOfSecond(): void
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
