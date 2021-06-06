<?php
declare(strict_types=1);

namespace Tests;

use
    Fyre\DateTime;

trait DateTimeDiffTest
{

    public function testDateTimeDiff(): void
    {
        $this->assertEquals(
            54391815150,
            DateTime::fromArray([2018, 6, 15, 12, 30, 30, 500])
                ->diff(
                    DateTime::fromArray([2016, 9, 23, 23, 40, 15, 350])
                )
        );
    }

    public function testDateTimeDiffYear(): void
    {
        $this->assertEquals(
            1,
            DateTime::fromArray([2018])
                ->diff(
                    DateTime::fromArray([2017]),
                    'year'
                )
        );
    }

    public function testDateTimeDiffYears(): void
    {
        $this->assertEquals(
            2,
            DateTime::fromArray([2018])
                ->diff(
                    DateTime::fromArray([2016]),
                    'years'
                )
        );
    }

    public function testDateTimeDiffYearsNegative(): void
    {
        $this->assertEquals(
            -2,
            DateTime::fromArray([2016])
                ->diff(
                    DateTime::fromArray([2018]),
                    'years'
                )
        );
    }

    public function testDateTimeDiffYearsRelative(): void
    {
        $this->assertEquals(
            1,
            DateTime::fromArray([2018, 1])
                ->diff(
                    DateTime::fromArray([2017, 2]),
                    'years'
                )
        );
    }

    public function testDateTimeDiffYearsExact(): void
    {
        $this->assertEquals(
            0,
            DateTime::fromArray([2018, 1])
                ->diff(
                    DateTime::fromArray([2017, 2]),
                    'years',
                    false
                )
        );
    }

    public function testDateTimeDiffMonth(): void
    {
        $this->assertEquals(
            1,
            DateTime::fromArray([2018, 9])
                ->diff(
                    DateTime::fromArray([2018, 8]),
                    'month'
                )
        );
    }

    public function testDateTimeDiffMonths(): void
    {
        $this->assertEquals(
            3,
            DateTime::fromArray([2018, 9])
                ->diff(
                    DateTime::fromArray([2018, 6]),
                    'months'
                )
        );
    }

    public function testDateTimeDiffMonthsNegative(): void
    {
        $this->assertEquals(
            -3,
            DateTime::fromArray([2018, 6])
                ->diff(
                    DateTime::fromArray([2018, 9]),
                    'months'
                )
        );
    }

    public function testDateTimeDiffMonthsRelative(): void
    {
        $this->assertEquals(
            1,
            DateTime::fromArray([2018, 2, 1])
                ->diff(
                    DateTime::fromArray([2018, 1, 2]),
                    'months'
                )
        );
    }

    public function testDateTimeDiffMonthsExact(): void
    {
        $this->assertEquals(
            0,
            DateTime::fromArray([2018, 2, 1])
                ->diff(
                    DateTime::fromArray([2018, 1, 2]),
                    'months',
                    false
                )
        );
    }

    public function testDateTimeDiffMonthsYears(): void
    {
        $this->assertEquals(
            27,
            DateTime::fromArray([2018, 9])
                ->diff(
                    DateTime::fromArray([2016, 6]),
                    'months'
                )
        );
    }

    public function testDateTimeDiffDay(): void
    {
        $this->assertEquals(
            1,
            DateTime::fromArray([2018, 6, 23])
                ->diff(
                    DateTime::fromArray([2018, 6, 22]),
                    'day'
                )
        );
    }

    public function testDateTimeDiffDays(): void
    {
        $this->assertEquals(
            8,
            DateTime::fromArray([2018, 6, 23])
                ->diff(
                    DateTime::fromArray([2018, 6, 15]),
                    'days'
                )
        );
    }

    public function testDateTimeDiffDaysNegative(): void
    {
        $this->assertEquals(
            -8,
            DateTime::fromArray([2018, 6, 15])
                ->diff(
                    DateTime::fromArray([2018, 6, 23]),
                    'days'
                )
        );
    }

    public function testDateTimeDiffDaysRelative(): void
    {
        $this->assertEquals(
            1,
            DateTime::fromArray([2018, 1, 2, 0])
                ->diff(
                    DateTime::fromArray([2018, 1, 1, 1]),
                    'days'
                )
        );
    }

    public function testDateTimeDiffDaysExact(): void
    {
        $this->assertEquals(
            0,
            DateTime::fromArray([2018, 1, 2, 0])
                ->diff(
                    DateTime::fromArray([2018, 1, 1, 1]),
                    'days',
                    false
                )
        );
    }

    public function testDateTimeDiffDaysMonths(): void
    {
        $this->assertEquals(
            69,
            DateTime::fromArray([2018, 8, 23])
                ->diff(
                    DateTime::fromArray([2018, 6, 15]),
                    'days'
                )
        );
    }

    public function testDateTimeDiffHour(): void
    {
        $this->assertEquals(
            1,
            DateTime::fromArray([2018, 6, 15, 23])
                ->diff(
                    DateTime::fromArray([2018, 6, 15, 22]),
                    'hour'
                )
        );
    }

    public function testDateTimeDiffHours(): void
    {
        $this->assertEquals(
            11,
            DateTime::fromArray([2018, 6, 15, 23])
                ->diff(
                    DateTime::fromArray([2018, 6, 15, 12]),
                    'hours'
                )
        );
    }

    public function testDateTimeDiffHoursNegative(): void
    {
        $this->assertEquals(
            -11,
            DateTime::fromArray([2018, 6, 15, 12])
                ->diff(
                    DateTime::fromArray([2018, 6, 15, 23]),
                    'hours'
                )
        );
    }

    public function testDateTimeDiffHoursRelative(): void
    {
        $this->assertEquals(
            1,
            DateTime::fromArray([2018, 1, 1, 1, 0])
                ->diff(
                    DateTime::fromArray([2018, 1, 1, 0, 1]),
                    'hours'
                )
        );
    }

    public function testDateTimeDiffHoursExact(): void
    {
        $this->assertEquals(
            0,
            DateTime::fromArray([2018, 1, 1, 1, 0])
                ->diff(
                    DateTime::fromArray([2018, 1, 1, 0, 1]),
                    'hours',
                    false
                )
        );
    }

    public function testDateTimeDiffHoursDays(): void
    {
        $this->assertEquals(
            83,
            DateTime::fromArray([2018, 6, 18, 23])
                ->diff(
                    DateTime::fromArray([2018, 6, 15, 12]),
                    'hours'
                )
        );
    }

    public function testDateTimeDiffMinute(): void
    {
        $this->assertEquals(
            1,
            DateTime::fromArray([2018, 6, 15, 12, 30])
                ->diff(
                    DateTime::fromArray([2018, 6, 15, 12, 29]),
                    'minute'
                )
        );
    }

    public function testDateTimeDiffMinutes(): void
    {
        $this->assertEquals(
            15,
            DateTime::fromArray([2018, 6, 15, 12, 30])
                ->diff(
                    DateTime::fromArray([2018, 6, 15, 12, 15]),
                    'minutes'
                )
        );
    }

    public function testDateTimeDiffMinutesNegative(): void
    {
        $this->assertEquals(
            -15,
            DateTime::fromArray([2018, 6, 15, 12, 15])
                ->diff(
                    DateTime::fromArray([2018, 6, 15, 12, 30]),
                    'minutes'
                )
        );
    }

    public function testDateTimeDiffMinutesRelative(): void
    {
        $this->assertEquals(
            1,
            DateTime::fromArray([2018, 1, 1, 0, 1, 0])
                ->diff(
                    DateTime::fromArray([2018, 1, 1, 0, 0, 1]),
                    'minutes'
                )
        );
    }

    public function testDateTimeDiffMinutesExact(): void
    {
        $this->assertEquals(
            0,
            DateTime::fromArray([2018, 1, 1, 0, 1, 0])
                ->diff(
                    DateTime::fromArray([2018, 1, 1, 0, 0, 1]),
                    'minutes',
                    false
                )
        );
    }

    public function testDateTimeDiffMinutesHours(): void
    {
        $this->assertEquals(
            255,
            DateTime::fromArray([2018, 6, 15, 16, 30])
                ->diff(
                    DateTime::fromArray([2018, 6, 15, 12, 15]),
                    'minutes'
                )
        );
    }

    public function testDateTimeDiffSecond(): void
    {
        $this->assertEquals(
            1,
            DateTime::fromArray([2018, 6, 15, 12, 30, 30])
                ->diff(
                    DateTime::fromArray([2018, 6, 15, 12, 30, 29]),
                    'second'
                )
        );
    }

    public function testDateTimeDiffSeconds(): void
    {
        $this->assertEquals(
            15,
            DateTime::fromArray([2018, 6, 15, 12, 30, 30])
                ->diff(
                    DateTime::fromArray([2018, 6, 15, 12, 30, 15]),
                    'seconds'
                )
        );
    }

    public function testDateTimeDiffSecondsNegative(): void
    {
        $this->assertEquals(
            -15,
            DateTime::fromArray([2018, 6, 15, 12, 30, 15])
                ->diff(
                    DateTime::fromArray([2018, 6, 15, 12, 30, 30]),
                    'seconds'
                )
        );
    }

    public function testDateTimeDiffSecondsRelative(): void
    {
        $this->assertEquals(
            1,
            DateTime::fromArray([2018, 1, 1, 0, 0, 1, 0])
                ->diff(
                    DateTime::fromArray([2018, 1, 1, 0, 0, 0, 1]),
                    'seconds'
                )
        );
    }

    public function testDateTimeDiffSecondsExact(): void
    {
        $this->assertEquals(
            0,
            DateTime::fromArray([2018, 1, 1, 0, 0, 1, 0])
                ->diff(
                    DateTime::fromArray([2018, 1, 1, 0, 0, 0, 1]),
                    'seconds',
                    false
                )
        );
    }

    public function testDateTimeDiffSecondsMinutes(): void
    {
        $this->assertEquals(
            1215,
            DateTime::fromArray([2018, 6, 15, 12, 50, 30])
                ->diff(
                    DateTime::fromArray([2018, 6, 15, 12, 30, 15]),
                    'seconds'
                )
        );
    }

}
