<?php
declare(strict_types=1);

namespace Tests;

use
    Fyre\DateTimeImmutable;

trait DateTimeImmutableManipulateTest
{

    /**
     * #add
     */

    public function testDateTimeImmutableAddYear(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018]);
        $date2 = $date1->add(1, 'year');
        $this->assertEquals(
            '2018-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableAddYears(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018]);
        $date2 = $date1->add(2, 'years');
        $this->assertEquals(
            '2018-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2020-01-01T00:00:00.000+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableAddMonth(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018]);
        $date2 = $date1->add(1, 'month');
        $this->assertEquals(
            '2018-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2018-02-01T00:00:00.000+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableAddMonths(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018]);
        $date2 = $date1->add(2, 'months');
        $this->assertEquals(
            '2018-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2018-03-01T00:00:00.000+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableAddWeek(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018]);
        $date2 = $date1->add(1, 'week');
        $this->assertEquals(
            '2018-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2018-01-08T00:00:00.000+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableAddWeeks(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018]);
        $date2 = $date1->add(2, 'weeks');
        $this->assertEquals(
            '2018-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2018-01-15T00:00:00.000+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableAddDay(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018]);
        $date2 = $date1->add(1, 'day');
        $this->assertEquals(
            '2018-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2018-01-02T00:00:00.000+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableAddDays(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018]);
        $date2 = $date1->add(2, 'days');
        $this->assertEquals(
            '2018-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2018-01-03T00:00:00.000+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableAddHour(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018]);
        $date2 = $date1->add(1, 'hour');
        $this->assertEquals(
            '2018-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2018-01-01T01:00:00.000+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableAddHours(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018]);
        $date2 = $date1->add(2, 'hours');
        $this->assertEquals(
            '2018-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2018-01-01T02:00:00.000+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableAddMinute(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018]);
        $date2 = $date1->add(1, 'minute');
        $this->assertEquals(
            '2018-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2018-01-01T00:01:00.000+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableAddMinutes(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018]);
        $date2 = $date1->add(2, 'minutes');
        $this->assertEquals(
            '2018-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2018-01-01T00:02:00.000+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableAddSecond(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018]);
        $date2 = $date1->add(1, 'second');
        $this->assertEquals(
            '2018-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2018-01-01T00:00:01.000+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableAddSeconds(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018]);
        $date2 = $date1->add(2, 'seconds');
        $this->assertEquals(
            '2018-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2018-01-01T00:00:02.000+00:00',
            $date2->toISOString()
        );
    }

    /**
     * #sub
     */

    public function testDateTimeImmutableSubYear(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018]);
        $date2 = $date1->sub(1, 'year');
        $this->assertEquals(
            '2018-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2017-01-01T00:00:00.000+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableSubYears(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018]);
        $date2 = $date1->sub(2, 'years');
        $this->assertEquals(
            '2018-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2016-01-01T00:00:00.000+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableSubMonth(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018]);
        $date2 = $date1->sub(1, 'month');
        $this->assertEquals(
            '2018-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2017-12-01T00:00:00.000+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableSubMonths(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018]);
        $date2 = $date1->sub(2, 'months');
        $this->assertEquals(
            '2018-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2017-11-01T00:00:00.000+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableSubWeek(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018]);
        $date2 = $date1->sub(1, 'week');
        $this->assertEquals(
            '2018-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2017-12-25T00:00:00.000+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableSubWeeks(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018]);
        $date2 = $date1->sub(2, 'weeks');
        $this->assertEquals(
            '2018-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2017-12-18T00:00:00.000+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableSubDay(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018]);
        $date2 = $date1->sub(1, 'day');
        $this->assertEquals(
            '2018-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2017-12-31T00:00:00.000+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableSubDays(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018]);
        $date2 = $date1->sub(2, 'days');
        $this->assertEquals(
            '2018-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2017-12-30T00:00:00.000+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableSubHour(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018]);
        $date2 = $date1->sub(1, 'hour');
        $this->assertEquals(
            '2018-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2017-12-31T23:00:00.000+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableSubHours(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018]);
        $date2 = $date1->sub(2, 'hours');
        $this->assertEquals(
            '2018-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2017-12-31T22:00:00.000+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableSubMinute(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018]);
        $date2 = $date1->sub(1, 'minute');
        $this->assertEquals(
            '2018-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2017-12-31T23:59:00.000+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableSubMinutes(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018]);
        $date2 = $date1->sub(2, 'minutes');
        $this->assertEquals(
            '2018-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2017-12-31T23:58:00.000+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableSubSecond(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018]);
        $date2 = $date1->sub(1, 'second');
        $this->assertEquals(
            '2018-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2017-12-31T23:59:59.000+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableSubSeconds(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018]);
        $date2 = $date1->sub(2, 'seconds');
        $this->assertEquals(
            '2018-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2017-12-31T23:59:58.000+00:00',
            $date2->toISOString()
        );
    }

    /**
     * #startOf
     */

    public function testDateTimeImmutableStartOfYear(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 6, 15, 11, 30, 30, 500]);
        $date2 = $date1->startOf('year');
        $this->assertEquals(
            '2018-06-15T11:30:30.500+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2018-01-01T00:00:00.000+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableStartOfQuarter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 8, 15, 11, 30, 30, 500]);
        $date2 = $date1->startOf('quarter');
        $this->assertEquals(
            '2018-08-15T11:30:30.500+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2018-07-01T00:00:00.000+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableStartOfMonth(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 6, 15, 11, 30, 30, 500]);
        $date2 = $date1->startOf('month');
        $this->assertEquals(
            '2018-06-15T11:30:30.500+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2018-06-01T00:00:00.000+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableStartOfWeek(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 6, 15, 11, 30, 30, 500]);
        $date2 = $date1->startOf('week');
        $this->assertEquals(
            '2018-06-15T11:30:30.500+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2018-06-10T00:00:00.000+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableStartOfDay(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 6, 15, 11, 30, 30, 500]);
        $date2 = $date1->startOf('day');
        $this->assertEquals(
            '2018-06-15T11:30:30.500+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2018-06-15T00:00:00.000+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableStartOfHour(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 6, 15, 11, 30, 30, 500]);
        $date2 = $date1->startOf('hour');
        $this->assertEquals(
            '2018-06-15T11:30:30.500+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2018-06-15T11:00:00.000+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableStartOfMinute(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 6, 15, 11, 30, 30, 500]);
        $date2 = $date1->startOf('minute');
        $this->assertEquals(
            '2018-06-15T11:30:30.500+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2018-06-15T11:30:00.000+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableStartOfSecond(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 6, 15, 11, 30, 30, 500]);
        $date2 = $date1->startOf('second');
        $this->assertEquals(
            '2018-06-15T11:30:30.500+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2018-06-15T11:30:30.000+00:00',
            $date2->toISOString()
        );
    }

    /**
     * #endOf
     */

    public function testDateTimeImmutableEndOfYear(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 6, 15, 11, 30, 30, 500]);
        $date2 = $date1->EndOf('year');
        $this->assertEquals(
            '2018-06-15T11:30:30.500+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2018-12-31T23:59:59.999+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableEndOfQuarter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 8, 15, 11, 30, 30, 500]);
        $date2 = $date1->EndOf('quarter');
        $this->assertEquals(
            '2018-08-15T11:30:30.500+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2018-09-30T23:59:59.999+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableEndOfMonth(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 6, 15, 11, 30, 30, 500]);
        $date2 = $date1->EndOf('month');
        $this->assertEquals(
            '2018-06-15T11:30:30.500+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2018-06-30T23:59:59.999+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableEndOfWeek(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 6, 15, 11, 30, 30, 500]);
        $date2 = $date1->EndOf('week');
        $this->assertEquals(
            '2018-06-15T11:30:30.500+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2018-06-16T23:59:59.999+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableEndOfDay(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 6, 15, 11, 30, 30, 500]);
        $date2 = $date1->EndOf('day');
        $this->assertEquals(
            '2018-06-15T11:30:30.500+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2018-06-15T23:59:59.999+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableEndOfHour(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 6, 15, 11, 30, 30, 500]);
        $date2 = $date1->EndOf('hour');
        $this->assertEquals(
            '2018-06-15T11:30:30.500+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2018-06-15T11:59:59.999+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableEndOfMinute(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 6, 15, 11, 30, 30, 500]);
        $date2 = $date1->EndOf('minute');
        $this->assertEquals(
            '2018-06-15T11:30:30.500+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2018-06-15T11:30:59.999+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableEndOfSecond(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 6, 15, 11, 30, 30, 500]);
        $date2 = $date1->EndOf('second');
        $this->assertEquals(
            '2018-06-15T11:30:30.500+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2018-06-15T11:30:30.999+00:00',
            $date2->toISOString()
        );
    }

}
