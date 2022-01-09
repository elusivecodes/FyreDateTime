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

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2019-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
    }

    public function testAddYears(): void
    {
        $date1 = DateTime::fromArray([2018]);
        $date2 = $date1->add(2, 'years');

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2020-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
    }

    public function testAddMonth(): void
    {
        $date1 = DateTime::fromArray([2018]);
        $date2 = $date1->add(1, 'month');

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2018-02-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
    }

    public function testAddMonths(): void
    {
        $date1 = DateTime::fromArray([2018]);
        $date2 = $date1->add(2, 'months');

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2018-03-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
    }

    public function testAddWeek(): void
    {
        $date1 = DateTime::fromArray([2018]);
        $date2 = $date1->add(1, 'week');

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2018-01-08T00:00:00.000+00:00',
            $date1->toISOString()
        );
    }

    public function testAddWeeks(): void
    {
        $date1 = DateTime::fromArray([2018]);
        $date2 = $date1->add(2, 'weeks');

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2018-01-15T00:00:00.000+00:00',
            $date1->toISOString()
        );
    }

    public function testAddDay(): void
    {
        $date1 = DateTime::fromArray([2018]);
        $date2 = $date1->add(1, 'day');

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2018-01-02T00:00:00.000+00:00',
            $date1->toISOString()
        );
    }

    public function testAddDays(): void
    {
        $date1 = DateTime::fromArray([2018]);
        $date2 = $date1->add(2, 'days');

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2018-01-03T00:00:00.000+00:00',
            $date1->toISOString()
        );
    }

    public function testAddHour(): void
    {
        $date1 = DateTime::fromArray([2018]);
        $date2 = $date1->add(1, 'hour');

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2018-01-01T01:00:00.000+00:00',
            $date1->toISOString()
        );
    }

    public function testAddHours(): void
    {
        $date1 = DateTime::fromArray([2018]);
        $date2 = $date1->add(2, 'hours');

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2018-01-01T02:00:00.000+00:00',
            $date1->toISOString()
        );
    }

    public function testAddMinute(): void
    {
        $date1 = DateTime::fromArray([2018]);
        $date2 = $date1->add(1, 'minute');

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2018-01-01T00:01:00.000+00:00',
            $date1->toISOString()
        );
    }

    public function testAddMinutes(): void
    {
        $date1 = DateTime::fromArray([2018]);
        $date2 = $date1->add(2, 'minutes');

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2018-01-01T00:02:00.000+00:00',
            $date1->toISOString()
        );
    }

    public function testAddSecond(): void
    {
        $date1 = DateTime::fromArray([2018]);
        $date2 = $date1->add(1, 'second');

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2018-01-01T00:00:01.000+00:00',
            $date1->toISOString()
        );
    }

    public function testAddSeconds(): void
    {
        $date1 = DateTime::fromArray([2018]);
        $date2 = $date1->add(2, 'seconds');

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2018-01-01T00:00:02.000+00:00',
            $date1->toISOString()
        );
    }

    /**
     * #sub
     */

    public function testSubYear(): void
    {
        $date1 = DateTime::fromArray([2018]);
        $date2 = $date1->sub(1, 'year');

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2017-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
    }

    public function testSubYears(): void
    {
        $date1 = DateTime::fromArray([2018]);
        $date2 = $date1->sub(2, 'years');

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2016-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
    }

    public function testSubMonth(): void
    {
        $date1 = DateTime::fromArray([2018]);
        $date2 = $date1->sub(1, 'month');

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2017-12-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
    }

    public function testSubMonths(): void
    {
        $date1 = DateTime::fromArray([2018]);
        $date2 = $date1->sub(2, 'months');

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2017-11-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
    }

    public function testSubWeek(): void
    {
        $date1 = DateTime::fromArray([2018]);
        $date2 = $date1->sub(1, 'week');

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2017-12-25T00:00:00.000+00:00',
            $date1->toISOString()
        );
    }

    public function testSubWeeks(): void
    {
        $date1 = DateTime::fromArray([2018]);
        $date2 = $date1->sub(2, 'weeks');

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2017-12-18T00:00:00.000+00:00',
            $date1->toISOString()
        );
    }

    public function testSubDay(): void
    {
        $date1 = DateTime::fromArray([2018]);
        $date2 = $date1->sub(1, 'day');

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2017-12-31T00:00:00.000+00:00',
            $date1->toISOString()
        );
    }

    public function testSubDays(): void
    {
        $date1 = DateTime::fromArray([2018]);
        $date2 = $date1->sub(2, 'days');

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2017-12-30T00:00:00.000+00:00',
            $date1->toISOString()
        );
    }

    public function testSubHour(): void
    {
        $date1 = DateTime::fromArray([2018]);
        $date2 = $date1->sub(1, 'hour');

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2017-12-31T23:00:00.000+00:00',
            $date1->toISOString()
        );
    }

    public function testSubHours(): void
    {
        $date1 = DateTime::fromArray([2018]);
        $date2 = $date1->sub(2, 'hours');

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2017-12-31T22:00:00.000+00:00',
            $date1->toISOString()
        );
    }

    public function testSubMinute(): void
    {
        $date1 = DateTime::fromArray([2018]);
        $date2 = $date1->sub(1, 'minute');

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2017-12-31T23:59:00.000+00:00',
            $date1->toISOString()
        );
    }

    public function testSubMinutes(): void
    {
        $date1 = DateTime::fromArray([2018]);
        $date2 = $date1->sub(2, 'minutes');

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2017-12-31T23:58:00.000+00:00',
            $date1->toISOString()
        );
    }

    public function testSubSecond(): void
    {
        $date1 = DateTime::fromArray([2018]);
        $date2 = $date1->sub(1, 'second');

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2017-12-31T23:59:59.000+00:00',
            $date1->toISOString()
        );
    }

    public function testSubSeconds(): void
    {
        $date1 = DateTime::fromArray([2018]);
        $date2 = $date1->sub(2, 'seconds');

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2017-12-31T23:59:58.000+00:00',
            $date1->toISOString()
        );
    }

    /**
     * #startOf
     */

    public function testStartOfYear(): void
    {
        $date1 = DateTime::fromArray([2018, 6, 15, 11, 30, 30, 500]);
        $date2 = $date1->startOf('year');

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2018-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
    }

    public function testStartOfQuarter(): void
    {
        $date1 = DateTime::fromArray([2018, 8, 15, 11, 30, 30, 500]);
        $date2 = $date1->startOf('quarter');

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2018-07-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
    }

    public function testStartOfMonth(): void
    {
        $date1 = DateTime::fromArray([2018, 6, 15, 11, 30, 30, 500]);
        $date2 = $date1->startOf('month');

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2018-06-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
    }

    public function testStartOfWeek(): void
    {
        $date1 = DateTime::fromArray([2018, 6, 15, 11, 30, 30, 500]);
        $date2 = $date1->startOf('week');

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2018-06-10T00:00:00.000+00:00',
            $date1->toISOString()
        );
    }

    public function testStartOfDay(): void
    {
        $date1 = DateTime::fromArray([2018, 6, 15, 11, 30, 30, 500]);
        $date2 = $date1->startOf('day');

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2018-06-15T00:00:00.000+00:00',
            $date1->toISOString()
        );
    }

    public function testStartOfHour(): void
    {
        $date1 = DateTime::fromArray([2018, 6, 15, 11, 30, 30, 500]);
        $date2 = $date1->startOf('hour');

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2018-06-15T11:00:00.000+00:00',
            $date1->toISOString()
        );
    }

    public function testStartOfMinute(): void
    {
        $date1 = DateTime::fromArray([2018, 6, 15, 11, 30, 30, 500]);
        $date2 = $date1->startOf('minute');

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2018-06-15T11:30:00.000+00:00',
            $date1->toISOString()
        );
    }

    public function testStartOfSecond(): void
    {
        $date1 = DateTime::fromArray([2018, 6, 15, 11, 30, 30, 500]);
        $date2 = $date1->startOf('second');

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2018-06-15T11:30:30.000+00:00',
            $date1->toISOString()
        );
    }

    /**
     * #endOf
     */

    public function testEndOfYear(): void
    {
        $date1 = DateTime::fromArray([2018, 6, 15, 11, 30, 30, 500]);
        $date2 = $date1->EndOf('year');

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2018-12-31T23:59:59.999+00:00',
            $date1->toISOString()
        );
    }

    public function testEndOfQuarter(): void
    {
        $date1 = DateTime::fromArray([2018, 8, 15, 11, 30, 30, 500]);
        $date2 = $date1->EndOf('quarter');

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2018-09-30T23:59:59.999+00:00',
            $date1->toISOString()
        );
    }

    public function testEndOfMonth(): void
    {
        $date1 = DateTime::fromArray([2018, 6, 15, 11, 30, 30, 500]);
        $date2 = $date1->EndOf('month');

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2018-06-30T23:59:59.999+00:00',
            $date1->toISOString()
        );
    }

    public function testEndOfWeek(): void
    {
        $date1 = DateTime::fromArray([2018, 6, 15, 11, 30, 30, 500]);
        $date2 = $date1->EndOf('week');

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2018-06-16T23:59:59.999+00:00',
            $date1->toISOString()
        );
    }

    public function testEndOfDay(): void
    {
        $date1 = DateTime::fromArray([2018, 6, 15, 11, 30, 30, 500]);
        $date2 = $date1->EndOf('day');

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2018-06-15T23:59:59.999+00:00',
            $date1->toISOString()
        );
    }

    public function testEndOfHour(): void
    {
        $date1 = DateTime::fromArray([2018, 6, 15, 11, 30, 30, 500]);
        $date2 = $date1->EndOf('hour');

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2018-06-15T11:59:59.999+00:00',
            $date1->toISOString()
        );
    }

    public function testEndOfMinute(): void
    {
        $date1 = DateTime::fromArray([2018, 6, 15, 11, 30, 30, 500]);
        $date2 = $date1->EndOf('minute');

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2018-06-15T11:30:59.999+00:00',
            $date1->toISOString()
        );
    }

    public function testEndOfSecond(): void
    {
        $date1 = DateTime::fromArray([2018, 6, 15, 11, 30, 30, 500]);
        $date2 = $date1->EndOf('second');

        $this->assertSame(
            $date1,
            $date2
        );

        $this->assertSame(
            '2018-06-15T11:30:30.999+00:00',
            $date1->toISOString()
        );
    }

}
