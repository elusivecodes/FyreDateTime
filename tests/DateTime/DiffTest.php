<?php
declare(strict_types=1);

namespace Tests\DateTime;

use
    Fyre\DateTime\DateTime;

trait DiffTest
{

    public function testDiff(): void
    {
        $this->assertSame(
            54391815150,
            DateTime::fromArray([2018, 6, 15, 12, 30, 30, 500])
                ->diff(
                    DateTime::fromArray([2016, 9, 23, 23, 40, 15, 350])
                )
        );
    }

    public function testDiffYear(): void
    {
        $this->assertSame(
            1,
            DateTime::fromArray([2018])
                ->diff(
                    DateTime::fromArray([2017]),
                    'year'
                )
        );
    }

    public function testDiffYears(): void
    {
        $this->assertSame(
            2,
            DateTime::fromArray([2018])
                ->diff(
                    DateTime::fromArray([2016]),
                    'years'
                )
        );
    }

    public function testDiffYearsNegative(): void
    {
        $this->assertSame(
            -2,
            DateTime::fromArray([2016])
                ->diff(
                    DateTime::fromArray([2018]),
                    'years'
                )
        );
    }

    public function testDiffYearsRelative(): void
    {
        $this->assertSame(
            1,
            DateTime::fromArray([2018, 1])
                ->diff(
                    DateTime::fromArray([2017, 2]),
                    'years'
                )
        );
    }

    public function testDiffYearsExact(): void
    {
        $this->assertSame(
            0,
            DateTime::fromArray([2018, 1])
                ->diff(
                    DateTime::fromArray([2017, 2]),
                    'years',
                    false
                )
        );
    }

    public function testDiffMonth(): void
    {
        $this->assertSame(
            1,
            DateTime::fromArray([2018, 9])
                ->diff(
                    DateTime::fromArray([2018, 8]),
                    'month'
                )
        );
    }

    public function testDiffMonths(): void
    {
        $this->assertSame(
            3,
            DateTime::fromArray([2018, 9])
                ->diff(
                    DateTime::fromArray([2018, 6]),
                    'months'
                )
        );
    }

    public function testDiffMonthsNegative(): void
    {
        $this->assertSame(
            -3,
            DateTime::fromArray([2018, 6])
                ->diff(
                    DateTime::fromArray([2018, 9]),
                    'months'
                )
        );
    }

    public function testDiffMonthsRelative(): void
    {
        $this->assertSame(
            1,
            DateTime::fromArray([2018, 2, 1])
                ->diff(
                    DateTime::fromArray([2018, 1, 2]),
                    'months'
                )
        );
    }

    public function testDiffMonthsExact(): void
    {
        $this->assertSame(
            0,
            DateTime::fromArray([2018, 2, 1])
                ->diff(
                    DateTime::fromArray([2018, 1, 2]),
                    'months',
                    false
                )
        );
    }

    public function testDiffMonthsYears(): void
    {
        $this->assertSame(
            27,
            DateTime::fromArray([2018, 9])
                ->diff(
                    DateTime::fromArray([2016, 6]),
                    'months'
                )
        );
    }

    public function testDiffDay(): void
    {
        $this->assertSame(
            1,
            DateTime::fromArray([2018, 6, 23])
                ->diff(
                    DateTime::fromArray([2018, 6, 22]),
                    'day'
                )
        );
    }

    public function testDiffDays(): void
    {
        $this->assertSame(
            8,
            DateTime::fromArray([2018, 6, 23])
                ->diff(
                    DateTime::fromArray([2018, 6, 15]),
                    'days'
                )
        );
    }

    public function testDiffDaysNegative(): void
    {
        $this->assertSame(
            -8,
            DateTime::fromArray([2018, 6, 15])
                ->diff(
                    DateTime::fromArray([2018, 6, 23]),
                    'days'
                )
        );
    }

    public function testDiffDaysRelative(): void
    {
        $this->assertSame(
            1,
            DateTime::fromArray([2018, 1, 2, 0])
                ->diff(
                    DateTime::fromArray([2018, 1, 1, 1]),
                    'days'
                )
        );
    }

    public function testDiffDaysExact(): void
    {
        $this->assertSame(
            0,
            DateTime::fromArray([2018, 1, 2, 0])
                ->diff(
                    DateTime::fromArray([2018, 1, 1, 1]),
                    'days',
                    false
                )
        );
    }

    public function testDiffDaysMonths(): void
    {
        $this->assertSame(
            69,
            DateTime::fromArray([2018, 8, 23])
                ->diff(
                    DateTime::fromArray([2018, 6, 15]),
                    'days'
                )
        );
    }

    public function testDiffHour(): void
    {
        $this->assertSame(
            1,
            DateTime::fromArray([2018, 6, 15, 23])
                ->diff(
                    DateTime::fromArray([2018, 6, 15, 22]),
                    'hour'
                )
        );
    }

    public function testDiffHours(): void
    {
        $this->assertSame(
            11,
            DateTime::fromArray([2018, 6, 15, 23])
                ->diff(
                    DateTime::fromArray([2018, 6, 15, 12]),
                    'hours'
                )
        );
    }

    public function testDiffHoursNegative(): void
    {
        $this->assertSame(
            -11,
            DateTime::fromArray([2018, 6, 15, 12])
                ->diff(
                    DateTime::fromArray([2018, 6, 15, 23]),
                    'hours'
                )
        );
    }

    public function testDiffHoursRelative(): void
    {
        $this->assertSame(
            1,
            DateTime::fromArray([2018, 1, 1, 1, 0])
                ->diff(
                    DateTime::fromArray([2018, 1, 1, 0, 1]),
                    'hours'
                )
        );
    }

    public function testDiffHoursExact(): void
    {
        $this->assertSame(
            0,
            DateTime::fromArray([2018, 1, 1, 1, 0])
                ->diff(
                    DateTime::fromArray([2018, 1, 1, 0, 1]),
                    'hours',
                    false
                )
        );
    }

    public function testDiffHoursDays(): void
    {
        $this->assertSame(
            83,
            DateTime::fromArray([2018, 6, 18, 23])
                ->diff(
                    DateTime::fromArray([2018, 6, 15, 12]),
                    'hours'
                )
        );
    }

    public function testDiffMinute(): void
    {
        $this->assertSame(
            1,
            DateTime::fromArray([2018, 6, 15, 12, 30])
                ->diff(
                    DateTime::fromArray([2018, 6, 15, 12, 29]),
                    'minute'
                )
        );
    }

    public function testDiffMinutes(): void
    {
        $this->assertSame(
            15,
            DateTime::fromArray([2018, 6, 15, 12, 30])
                ->diff(
                    DateTime::fromArray([2018, 6, 15, 12, 15]),
                    'minutes'
                )
        );
    }

    public function testDiffMinutesNegative(): void
    {
        $this->assertSame(
            -15,
            DateTime::fromArray([2018, 6, 15, 12, 15])
                ->diff(
                    DateTime::fromArray([2018, 6, 15, 12, 30]),
                    'minutes'
                )
        );
    }

    public function testDiffMinutesRelative(): void
    {
        $this->assertSame(
            1,
            DateTime::fromArray([2018, 1, 1, 0, 1, 0])
                ->diff(
                    DateTime::fromArray([2018, 1, 1, 0, 0, 1]),
                    'minutes'
                )
        );
    }

    public function testDiffMinutesExact(): void
    {
        $this->assertSame(
            0,
            DateTime::fromArray([2018, 1, 1, 0, 1, 0])
                ->diff(
                    DateTime::fromArray([2018, 1, 1, 0, 0, 1]),
                    'minutes',
                    false
                )
        );
    }

    public function testDiffMinutesHours(): void
    {
        $this->assertSame(
            255,
            DateTime::fromArray([2018, 6, 15, 16, 30])
                ->diff(
                    DateTime::fromArray([2018, 6, 15, 12, 15]),
                    'minutes'
                )
        );
    }

    public function testDiffSecond(): void
    {
        $this->assertSame(
            1,
            DateTime::fromArray([2018, 6, 15, 12, 30, 30])
                ->diff(
                    DateTime::fromArray([2018, 6, 15, 12, 30, 29]),
                    'second'
                )
        );
    }

    public function testDiffSeconds(): void
    {
        $this->assertSame(
            15,
            DateTime::fromArray([2018, 6, 15, 12, 30, 30])
                ->diff(
                    DateTime::fromArray([2018, 6, 15, 12, 30, 15]),
                    'seconds'
                )
        );
    }

    public function testDiffSecondsNegative(): void
    {
        $this->assertSame(
            -15,
            DateTime::fromArray([2018, 6, 15, 12, 30, 15])
                ->diff(
                    DateTime::fromArray([2018, 6, 15, 12, 30, 30]),
                    'seconds'
                )
        );
    }

    public function testDiffSecondsRelative(): void
    {
        $this->assertSame(
            1,
            DateTime::fromArray([2018, 1, 1, 0, 0, 1, 0])
                ->diff(
                    DateTime::fromArray([2018, 1, 1, 0, 0, 0, 1]),
                    'seconds'
                )
        );
    }

    public function testDiffSecondsExact(): void
    {
        $this->assertSame(
            0,
            DateTime::fromArray([2018, 1, 1, 0, 0, 1, 0])
                ->diff(
                    DateTime::fromArray([2018, 1, 1, 0, 0, 0, 1]),
                    'seconds',
                    false
                )
        );
    }

    public function testDiffSecondsMinutes(): void
    {
        $this->assertSame(
            1215,
            DateTime::fromArray([2018, 6, 15, 12, 50, 30])
                ->diff(
                    DateTime::fromArray([2018, 6, 15, 12, 30, 15]),
                    'seconds'
                )
        );
    }

}
