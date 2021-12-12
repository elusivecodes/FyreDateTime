<?php
declare(strict_types=1);

namespace Tests\DateTime;

use
    Fyre\DateTime\DateTime;

trait UtilityTest
{

    /**
     * #clone
     */

    public function testClone(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
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

    public function testCloneNotReference(): void
    {
        $date1 = DateTime::fromArray([2019, 1, 1]);
        $date2 = $date1->clone();
        $date2->setYear(2018);
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            $date1->toISOString()
        );
        $this->assertEquals(
            '2018-01-01T00:00:00.000+00:00',
            $date2->toISOString()
        );
    }

    /**
     * #dayName
     */

    public function testDayName(): void
    {
        $dayNames = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        foreach ($dayNames AS $i => $dayName) {
            $this->assertEquals(
                $dayName,
                DateTime::fromArray([2019, 1, 1])
                    ->setDay($i)
                    ->dayName(),
            );
        }
    }

    public function testDayNameShort(): void
    {
        $dayNames = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        foreach ($dayNames AS $i => $dayName) {
            $this->assertEquals(
                $dayName,
                DateTime::fromArray([2019, 1, 1])
                    ->setDay($i)
                    ->dayName('short'),
            );
        }
    }

    public function testDayNameNarrow(): void
    {
        $dayNames = ['S', 'M', 'T', 'W', 'T', 'F', 'S'];
        foreach ($dayNames AS $i => $dayName) {
            $this->assertEquals(
                $dayName,
                DateTime::fromArray([2019, 1, 1])
                    ->setDay($i)
                    ->dayName('narrow'),
            );
        }
    }

    /**
     * #dayPeriod
     */

    public function testDayPeriod(): void
    {
        $this->assertEquals(
            'AM',
            DateTime::fromArray([2019, 1, 1, 0])
                ->dayPeriod(),
        );
    }

    public function testDayPeriodPm(): void
    {
        $this->assertEquals(
            'PM',
            DateTime::fromArray([2019, 1, 1, 12])
                ->dayPeriod(),
        );
    }

    public function testDayPeriodShort(): void
    {
        $this->assertEquals(
            'AM',
            DateTime::fromArray([2019, 1, 1, 0])
                ->dayPeriod('short'),
        );
    }

    public function testDayPeriodShortPm(): void
    {
        $this->assertEquals(
            'PM',
            DateTime::fromArray([2019, 1, 1, 12])
                ->dayPeriod('short'),
        );
    }

    /**
     * #daysInMonth
     */

    public function testDaysInMonth(): void
    {
        $monthDays = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
        foreach ($monthDays AS $i => $daysInMonth) {
            $this->assertEquals(
                $daysInMonth,
                DateTime::fromArray([2018, $i + 1, 1])
                    ->daysInMonth(),
            );
        }
    }

    public function testDaysInMonthLeapYear(): void
    {
        $this->assertEquals(
            29,
            DateTime::fromArray([2020, 2, 1])
                ->daysInMonth(),
        );
    }

    /**
     * #daysInYear
     */

    public function testDaysInYear(): void
    {
        $this->assertEquals(
            365,
            DateTime::fromArray([2018, 1, 1])
                ->daysInYear(),
        );
    }

    public function testDaysInYearLeapYear(): void
    {
        $this->assertEquals(
            366,
            DateTime::fromArray([2020, 1, 1])
                ->daysInYear(),
        );
    }

    /**
     * #era
     */

    public function testEra(): void
    {
        $this->assertEquals(
            'Anno Domini',
            DateTime::fromArray([2018])
                ->era(),
        );
    }

    public function testEraBc(): void
    {
        $this->assertEquals(
            'Before Christ',
            DateTime::fromArray([-5])
                ->era(),
        );
    }

    public function testEraShort(): void
    {
        $this->assertEquals(
            'AD',
            DateTime::fromArray([2018])
                ->era('short'),
        );
    }

    public function testEraShortBc(): void
    {
        $this->assertEquals(
            'BC',
            DateTime::fromArray([-5])
                ->era('short'),
        );
    }

    public function testEraNarrow(): void
    {
        $this->assertEquals(
            'A',
            DateTime::fromArray([2018])
                ->era('narrow'),
        );
    }

    public function testEraNarrowBc(): void
    {
        $this->assertEquals(
            'B',
            DateTime::fromArray([-5])
                ->era('narrow'),
        );
    }

    /**
     * #isDST
     */

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

    /**
     * #isLeapYear
     */

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

    /**
     * #monthName
     */

    public function testMonthName(): void
    {
        $monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        foreach ($monthNames AS $i => $monthName) {
            $this->assertEquals(
                $monthName,
                DateTime::fromArray([2019, $i + 1, 1])
                    ->monthName(),
            );
        }
    }

    public function testMonthNameShort(): void
    {
        $monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        foreach ($monthNames AS $i => $monthName) {
            $this->assertEquals(
                $monthName,
                DateTime::fromArray([2019, $i + 1, 1])
                    ->monthName('short'),
            );
        }
    }

    public function testMonthNameNarrow(): void
    {
        $monthNames = ['J', 'F', 'M', 'A', 'M', 'J', 'J', 'A', 'S', 'O', 'N', 'D'];
        foreach ($monthNames AS $i => $monthName) {
            $this->assertEquals(
                $monthName,
                DateTime::fromArray([2019, $i + 1, 1])
                    ->monthName('narrow'),
            );
        }
    }

    /**
     * #timeZoneName
     */

    public function testTimeZoneName(): void
    {
        $this->assertEquals(
            'Australian Eastern Standard Time',
            DateTime::fromArray([2018], 'Australia/Brisbane')
                ->timeZoneName(),
        );
    }

    public function testTimeZoneNameOffset(): void
    {
        $this->assertEquals(
            'GMT+10:00',
            DateTime::fromArray([2018], '+10:00')
                ->timeZoneName(),
        );
    }

    public function testTimeZoneNameShort(): void
    {
        $this->assertEquals(
            'GMT+10',
            DateTime::fromArray([2018], 'Australia/Brisbane')
                ->timeZoneName('short'),
        );
    }

    public function testTimeZoneNameShortOffset(): void
    {
        $this->assertEquals(
            'GMT+10',
            DateTime::fromArray([2018], '+10:00')
                ->timeZoneName('short'),
        );
    }

    /**
     * #weeksInYear
     */

    public function testWeeksInYear(): void
    {
        $this->assertEquals(
            52,
            DateTime::fromArray([2018, 1, 1])
                ->weeksInYear(),
        );
    }

    public function testWeeksInYearLocal(): void
    {
        $this->assertEquals(
            53,
            DateTime::fromArray([2016, 1, 1])
                ->weeksInYear(),
        );
    }

}
