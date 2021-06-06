<?php
declare(strict_types=1);

namespace Tests;

use
    Fyre\DateTimeImmutable;

trait DateTimeImmutableUtilityTest
{

    /**
     * #clone
     */

    public function testDateTimeImmutableClone(): void
    {
        $date1 = DateTimeImmutable::fromArray([2019, 1, 1]);
        $date2 = $date1->clone();
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            $date2->toISOString()
        );
    }

    public function testDateTimeImmutableCloneNotReference(): void
    {
        $date1 = DateTimeImmutable::fromArray([2019, 1, 1]);
        $date2 = $date1->clone();
        $date3 = $date2->setYear(2018);
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            $date2->toISOString()
        );
        $this->assertEquals(
            '2018-01-01T00:00:00.000+00:00',
            $date3->toISOString()
        );
    }

    /**
     * #dayName
     */

    public function testDateTimeImmutableDayName(): void
    {
        $dayNames = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        foreach ($dayNames AS $i => $dayName) {
            $this->assertEquals(
                $dayName,
                DateTimeImmutable::fromArray([2019, 1, 1])
                    ->setDay($i)
                    ->dayName(),
            );
        }
    }

    public function testDateTimeImmutableDayNameShort(): void
    {
        $dayNames = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        foreach ($dayNames AS $i => $dayName) {
            $this->assertEquals(
                $dayName,
                DateTimeImmutable::fromArray([2019, 1, 1])
                    ->setDay($i)
                    ->dayName('short'),
            );
        }
    }

    public function testDateTimeImmutableDayNameNarrow(): void
    {
        $dayNames = ['S', 'M', 'T', 'W', 'T', 'F', 'S'];
        foreach ($dayNames AS $i => $dayName) {
            $this->assertEquals(
                $dayName,
                DateTimeImmutable::fromArray([2019, 1, 1])
                    ->setDay($i)
                    ->dayName('narrow'),
            );
        }
    }

    /**
     * #dayPeriod
     */

    public function testDateTimeImmutableDayPeriod(): void
    {
        $this->assertEquals(
            'AM',
            DateTimeImmutable::fromArray([2019, 1, 1, 0])
                ->dayPeriod(),
        );
    }

    public function testDateTimeImmutableDayPeriodPm(): void
    {
        $this->assertEquals(
            'PM',
            DateTimeImmutable::fromArray([2019, 1, 1, 12])
                ->dayPeriod(),
        );
    }

    public function testDateTimeImmutableDayPeriodShort(): void
    {
        $this->assertEquals(
            'AM',
            DateTimeImmutable::fromArray([2019, 1, 1, 0])
                ->dayPeriod('short'),
        );
    }

    public function testDateTimeImmutableDayPeriodShortPm(): void
    {
        $this->assertEquals(
            'PM',
            DateTimeImmutable::fromArray([2019, 1, 1, 12])
                ->dayPeriod('short'),
        );
    }

    /**
     * #daysInMonth
     */

    public function testDateTimeImmutableDaysInMonth(): void
    {
        $monthDays = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
        foreach ($monthDays AS $i => $daysInMonth) {
            $this->assertEquals(
                $daysInMonth,
                DateTimeImmutable::fromArray([2018, $i + 1, 1])
                    ->daysInMonth(),
            );
        }
    }

    public function testDateTimeImmutableDaysInMonthLeapYear(): void
    {
        $this->assertEquals(
            29,
            DateTimeImmutable::fromArray([2020, 2, 1])
                ->daysInMonth(),
        );
    }

    /**
     * #daysInYear
     */

    public function testDateTimeImmutableDaysInYear(): void
    {
        $this->assertEquals(
            365,
            DateTimeImmutable::fromArray([2018, 1, 1])
                ->daysInYear(),
        );
    }

    public function testDateTimeImmutableDaysInYearLeapYear(): void
    {
        $this->assertEquals(
            366,
            DateTimeImmutable::fromArray([2020, 1, 1])
                ->daysInYear(),
        );
    }

    /**
     * #era
     */

    public function testDateTimeImmutableEra(): void
    {
        $this->assertEquals(
            'Anno Domini',
            DateTimeImmutable::fromArray([2018])
                ->era(),
        );
    }

    public function testDateTimeImmutableEraBc(): void
    {
        $this->assertEquals(
            'Before Christ',
            DateTimeImmutable::fromArray([-5])
                ->era(),
        );
    }

    public function testDateTimeImmutableEraShort(): void
    {
        $this->assertEquals(
            'AD',
            DateTimeImmutable::fromArray([2018])
                ->era('short'),
        );
    }

    public function testDateTimeImmutableEraShortBc(): void
    {
        $this->assertEquals(
            'BC',
            DateTimeImmutable::fromArray([-5])
                ->era('short'),
        );
    }

    public function testDateTimeImmutableEraNarrow(): void
    {
        $this->assertEquals(
            'A',
            DateTimeImmutable::fromArray([2018])
                ->era('narrow'),
        );
    }

    public function testDateTimeImmutableEraNarrowBc(): void
    {
        $this->assertEquals(
            'B',
            DateTimeImmutable::fromArray([-5])
                ->era('narrow'),
        );
    }

    /**
     * #isDST
     */

    public function testDateTimeImmutableIsDst(): void
    {
        $this->assertFalse(
            DateTimeImmutable::fromArray([2018, 1, 1])
                ->isDST(),
        );
    }

    public function testDateTimeImmutableIsDstDst(): void
    {
        $this->assertTrue(
            DateTimeImmutable::fromArray([2018, 6, 1], 'America/New_York')
                ->isDST(),
        );
    }

    /**
     * #isLeapYear
     */

    public function testDateTimeImmutableIsLeapYear(): void
    {
        $this->assertFalse(
            DateTimeImmutable::fromArray([2019])
                ->isLeapYear(),
        );
    }

    public function testDateTimeImmutableIsLeapYearLeapYear(): void
    {
        $this->assertTrue(
            DateTimeImmutable::fromArray([2020])
                ->isLeapYear(),
        );
    }

    /**
     * #monthName
     */

    public function testDateTimeImmutableMonthName(): void
    {
        $monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        foreach ($monthNames AS $i => $monthName) {
            $this->assertEquals(
                $monthName,
                DateTimeImmutable::fromArray([2019, $i + 1, 1])
                    ->monthName(),
            );
        }
    }

    public function testDateTimeImmutableMonthNameShort(): void
    {
        $monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        foreach ($monthNames AS $i => $monthName) {
            $this->assertEquals(
                $monthName,
                DateTimeImmutable::fromArray([2019, $i + 1, 1])
                    ->monthName('short'),
            );
        }
    }

    public function testDateTimeImmutableMonthNameNarrow(): void
    {
        $monthNames = ['J', 'F', 'M', 'A', 'M', 'J', 'J', 'A', 'S', 'O', 'N', 'D'];
        foreach ($monthNames AS $i => $monthName) {
            $this->assertEquals(
                $monthName,
                DateTimeImmutable::fromArray([2019, $i + 1, 1])
                    ->monthName('narrow'),
            );
        }
    }

    /**
     * #timeZoneName
     */

    public function testDateTimeImmutableTimeZoneName(): void
    {
        $this->assertEquals(
            'Australian Eastern Standard Time',
            DateTimeImmutable::fromArray([2018], 'Australia/Brisbane')
                ->timeZoneName(),
        );
    }

    public function testDateTimeImmutableTimeZoneNameOffset(): void
    {
        $this->assertEquals(
            'GMT+10:00',
            DateTimeImmutable::fromArray([2018], '+10:00')
                ->timeZoneName(),
        );
    }

    public function testDateTimeImmutableTimeZoneNameShort(): void
    {
        $this->assertEquals(
            'GMT+10',
            DateTimeImmutable::fromArray([2018], 'Australia/Brisbane')
                ->timeZoneName('short'),
        );
    }

    public function testDateTimeImmutableTimeZoneNameShortOffset(): void
    {
        $this->assertEquals(
            'GMT+10',
            DateTimeImmutable::fromArray([2018], '+10:00')
                ->timeZoneName('short'),
        );
    }

    /**
     * #weeksInYear
     */

    public function testDateTimeImmutableWeeksInYear(): void
    {
        $this->assertEquals(
            52,
            DateTimeImmutable::fromArray([2018, 1, 1])
                ->weeksInYear(),
        );
    }

    public function testDateTimeImmutableWeeksInYearLocal(): void
    {
        $this->assertEquals(
            53,
            DateTimeImmutable::fromArray([2016, 1, 1])
                ->weeksInYear(),
        );
    }

}
