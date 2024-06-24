<?php
declare(strict_types=1);

namespace Tests;

use Fyre\DateTime\DateTime;

trait UtilityTestTrait
{
    public function testDayName(): void
    {
        $dayNames = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        foreach ($dayNames as $i => $dayName) {
            $this->assertSame(
                $dayName,
                DateTime::fromArray([2019, 1, 1])
                    ->setDay($i)
                    ->dayName(),
            );
        }
    }

    public function testDayNameNarrow(): void
    {
        $dayNames = ['S', 'M', 'T', 'W', 'T', 'F', 'S'];
        foreach ($dayNames as $i => $dayName) {
            $this->assertSame(
                $dayName,
                DateTime::fromArray([2019, 1, 1])
                    ->setDay($i)
                    ->dayName('narrow'),
            );
        }
    }

    public function testDayNameShort(): void
    {
        $dayNames = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        foreach ($dayNames as $i => $dayName) {
            $this->assertSame(
                $dayName,
                DateTime::fromArray([2019, 1, 1])
                    ->setDay($i)
                    ->dayName('short'),
            );
        }
    }

    public function testDayPeriod(): void
    {
        $this->assertSame(
            'AM',
            DateTime::fromArray([2019, 1, 1, 0])
                ->dayPeriod(),
        );
    }

    public function testDayPeriodPm(): void
    {
        $this->assertSame(
            'PM',
            DateTime::fromArray([2019, 1, 1, 12])
                ->dayPeriod(),
        );
    }

    public function testDayPeriodShort(): void
    {
        $this->assertSame(
            'AM',
            DateTime::fromArray([2019, 1, 1, 0])
                ->dayPeriod('short'),
        );
    }

    public function testDayPeriodShortPm(): void
    {
        $this->assertSame(
            'PM',
            DateTime::fromArray([2019, 1, 1, 12])
                ->dayPeriod('short'),
        );
    }

    public function testDaysInMonth(): void
    {
        $monthDays = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
        foreach ($monthDays as $i => $daysInMonth) {
            $this->assertSame(
                $daysInMonth,
                DateTime::fromArray([2018, $i + 1, 1])
                    ->daysInMonth(),
            );
        }
    }

    public function testDaysInMonthLeapYear(): void
    {
        $this->assertSame(
            29,
            DateTime::fromArray([2020, 2, 1])
                ->daysInMonth(),
        );
    }

    public function testDaysInYear(): void
    {
        $this->assertSame(
            365,
            DateTime::fromArray([2018, 1, 1])
                ->daysInYear(),
        );
    }

    public function testDaysInYearLeapYear(): void
    {
        $this->assertSame(
            366,
            DateTime::fromArray([2020, 1, 1])
                ->daysInYear(),
        );
    }

    public function testEra(): void
    {
        $this->assertSame(
            'Anno Domini',
            DateTime::fromArray([2018])
                ->era(),
        );
    }

    public function testEraBc(): void
    {
        $this->assertSame(
            'Before Christ',
            DateTime::fromArray([-5])
                ->era(),
        );
    }

    public function testEraNarrow(): void
    {
        $this->assertSame(
            'A',
            DateTime::fromArray([2018])
                ->era('narrow'),
        );
    }

    public function testEraNarrowBc(): void
    {
        $this->assertSame(
            'B',
            DateTime::fromArray([-5])
                ->era('narrow'),
        );
    }

    public function testEraShort(): void
    {
        $this->assertSame(
            'AD',
            DateTime::fromArray([2018])
                ->era('short'),
        );
    }

    public function testEraShortBc(): void
    {
        $this->assertSame(
            'BC',
            DateTime::fromArray([-5])
                ->era('short'),
        );
    }

    public function testIsDst(): void
    {
        $this->assertFalse(
            DateTime::fromArray([2018, 1, 1])
                ->isDST(),
        );
    }

    public function testIsDstDst(): void
    {
        $this->assertTrue(
            DateTime::fromArray([2018, 6, 1], 'America/New_York')
                ->isDST(),
        );
    }

    public function testIsLeapYear(): void
    {
        $this->assertFalse(
            DateTime::fromArray([2019])
                ->isLeapYear(),
        );
    }

    public function testIsLeapYearLeapYear(): void
    {
        $this->assertTrue(
            DateTime::fromArray([2020])
                ->isLeapYear(),
        );
    }

    public function testMonthName(): void
    {
        $monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        foreach ($monthNames as $i => $monthName) {
            $this->assertSame(
                $monthName,
                DateTime::fromArray([2019, $i + 1, 1])
                    ->monthName(),
            );
        }
    }

    public function testMonthNameNarrow(): void
    {
        $monthNames = ['J', 'F', 'M', 'A', 'M', 'J', 'J', 'A', 'S', 'O', 'N', 'D'];
        foreach ($monthNames as $i => $monthName) {
            $this->assertSame(
                $monthName,
                DateTime::fromArray([2019, $i + 1, 1])
                    ->monthName('narrow'),
            );
        }
    }

    public function testMonthNameShort(): void
    {
        $monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        foreach ($monthNames as $i => $monthName) {
            $this->assertSame(
                $monthName,
                DateTime::fromArray([2019, $i + 1, 1])
                    ->monthName('short'),
            );
        }
    }

    public function testTimeZoneName(): void
    {
        $this->assertSame(
            'Australian Eastern Standard Time',
            DateTime::fromArray([2018], 'Australia/Brisbane')
                ->timeZoneName(),
        );
    }

    public function testTimeZoneNameOffset(): void
    {
        $this->assertSame(
            'GMT+10:00',
            DateTime::fromArray([2018], '+10:00')
                ->timeZoneName(),
        );
    }

    public function testTimeZoneNameShort(): void
    {
        $this->assertSame(
            'GMT+10',
            DateTime::fromArray([2018], 'Australia/Brisbane')
                ->timeZoneName('short'),
        );
    }

    public function testTimeZoneNameShortOffset(): void
    {
        $this->assertSame(
            'GMT+10',
            DateTime::fromArray([2018], '+10:00')
                ->timeZoneName('short'),
        );
    }

    public function testWeeksInYear(): void
    {
        $this->assertSame(
            52,
            DateTime::fromArray([2018, 1, 1])
                ->weeksInYear(),
        );
    }

    public function testWeeksInYearLocal(): void
    {
        $this->assertSame(
            53,
            DateTime::fromArray([2016, 1, 1])
                ->weeksInYear(),
        );
    }
}
