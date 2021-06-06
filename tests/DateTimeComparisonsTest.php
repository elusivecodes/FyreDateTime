<?php
declare(strict_types=1);

namespace Tests;

use
    Fyre\DateTime;

trait DateTimeComparisonsTest
{

    /**
     * #isAfter
     */

    public function testDateTimeIsAfterAfter(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1, 1, 1, 1]);
        $date2 = DateTime::fromArray([2018, 1, 1, 1, 2, 2]);
        $this->assertFalse(
            $date1->isAfter($date2)
        );
    }

    public function testDateTimeIsAfterBefore(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1, 1, 2, 2]);
        $date2 = DateTime::fromArray([2018, 1, 1, 1, 1, 1]);
        $this->assertTrue(
            $date1->isAfter($date2)
        );
    }

    public function testDateTimeIsAfterYearAfter(): void
    {
        $date1 = DateTime::fromArray([2018, 1]);
        $date2 = DateTime::fromArray([2019, 2]);
        $this->assertFalse(
            $date1->isAfter($date2, 'year')
        );
    }

    public function testDateTimeIsAfterYearBefore(): void
    {
        $date1 = DateTime::fromArray([2019, 2]);
        $date2 = DateTime::fromArray([2018, 1]);
        $this->assertTrue(
            $date1->isAfter($date2, 'year')
        );
    }

    public function testDateTimeIsAfterMonthAfter(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1]);
        $date2 = DateTime::fromArray([2018, 2, 2]);
        $this->assertFalse(
            $date1->isAfter($date2, 'month')
        );
    }

    public function testDateTimeIsAfterMonthBefore(): void
    {
        $date1 = DateTime::fromArray([2018, 2, 2]);
        $date2 = DateTime::fromArray([2018, 1, 1]);
        $this->assertTrue(
            $date1->isAfter($date2, 'month')
        );
    }

    public function testDateTimeIsAfterDayAfter(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1, 1]);
        $date2 = DateTime::fromArray([2018, 1, 2, 2]);
        $this->assertFalse(
            $date1->isAfter($date2, 'day')
        );
    }

    public function testDateTimeIsAfterDayBefore(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 2, 2]);
        $date2 = DateTime::fromArray([2018, 1, 1, 1]);
        $this->assertTrue(
            $date1->isAfter($date2, 'day')
        );
    }

    public function testDateTimeIsAfterHourAfter(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1, 1, 1]);
        $date2 = DateTime::fromArray([2018, 1, 1, 2, 2]);
        $this->assertFalse(
            $date1->isAfter($date2, 'hour')
        );
    }

    public function testDateTimeIsAfterHourBefore(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1, 2, 2]);
        $date2 = DateTime::fromArray([2018, 1, 1, 1, 1]);
        $this->assertTrue(
            $date1->isAfter($date2, 'hour')
        );
    }

    public function testDateTimeIsAfterMinuteAfter(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1, 1, 1, 1]);
        $date2 = DateTime::fromArray([2018, 1, 1, 1, 2, 2]);
        $this->assertFalse(
            $date1->isAfter($date2, 'minute')
        );
    }

    public function testDateTimeIsAfterMinuteBefore(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1, 1, 2, 2]);
        $date2 = DateTime::fromArray([2018, 1, 1, 1, 1, 1]);
        $this->assertTrue(
            $date1->isAfter($date2, 'minute')
        );
    }

    public function testDateTimeIsAfterSecondAfter(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1, 1, 1, 1, 1]);
        $date2 = DateTime::fromArray([2018, 1, 1, 1, 1, 2, 2]);
        $this->assertFalse(
            $date1->isAfter($date2, 'second')
        );
    }

    public function testDateTimeIsAfterSecondBefore(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1, 1, 1, 2, 2]);
        $date2 = DateTime::fromArray([2018, 1, 1, 1, 1, 1, 1]);
        $this->assertTrue(
            $date1->isAfter($date2, 'second')
        );
    }

    /**
     * #isBefore
     */

    public function testDateTimeIsBeforeAfter(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1, 1, 1, 1]);
        $date2 = DateTime::fromArray([2018, 1, 1, 1, 2, 2]);
        $this->assertTrue(
            $date1->isBefore($date2)
        );
    }

    public function testDateTimeIsBeforeBefore(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1, 1, 2, 2]);
        $date2 = DateTime::fromArray([2018, 1, 1, 1, 1, 1]);
        $this->assertFalse(
            $date1->isBefore($date2)
        );
    }

    public function testDateTimeIsBeforeYearAfter(): void
    {
        $date1 = DateTime::fromArray([2018, 1]);
        $date2 = DateTime::fromArray([2019, 2]);
        $this->assertTrue(
            $date1->isBefore($date2, 'year')
        );
    }

    public function testDateTimeIsBeforeYearBefore(): void
    {
        $date1 = DateTime::fromArray([2019, 2]);
        $date2 = DateTime::fromArray([2018, 1]);
        $this->assertFalse(
            $date1->isBefore($date2, 'year')
        );
    }

    public function testDateTimeIsBeforeMonthAfter(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1]);
        $date2 = DateTime::fromArray([2018, 2, 2]);
        $this->assertTrue(
            $date1->isBefore($date2, 'month')
        );
    }

    public function testDateTimeIsBeforeMonthBefore(): void
    {
        $date1 = DateTime::fromArray([2018, 2, 2]);
        $date2 = DateTime::fromArray([2018, 1, 1]);
        $this->assertFalse(
            $date1->isBefore($date2, 'month')
        );
    }

    public function testDateTimeIsBeforeDayAfter(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1, 1]);
        $date2 = DateTime::fromArray([2018, 1, 2, 2]);
        $this->assertTrue(
            $date1->isBefore($date2, 'day')
        );
    }

    public function testDateTimeIsBeforeDayBefore(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 2, 2]);
        $date2 = DateTime::fromArray([2018, 1, 1, 1]);
        $this->assertFalse(
            $date1->isBefore($date2, 'day')
        );
    }

    public function testDateTimeIsBeforeHourAfter(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1, 1, 1]);
        $date2 = DateTime::fromArray([2018, 1, 1, 2, 2]);
        $this->assertTrue(
            $date1->isBefore($date2, 'hour')
        );
    }

    public function testDateTimeIsBeforeHourBefore(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1, 2, 2]);
        $date2 = DateTime::fromArray([2018, 1, 1, 1, 1]);
        $this->assertFalse(
            $date1->isBefore($date2, 'hour')
        );
    }

    public function testDateTimeIsBeforeMinuteAfter(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1, 1, 1, 1]);
        $date2 = DateTime::fromArray([2018, 1, 1, 1, 2, 2]);
        $this->assertTrue(
            $date1->isBefore($date2, 'minute')
        );
    }

    public function testDateTimeIsBeforeMinuteBefore(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1, 1, 2, 2]);
        $date2 = DateTime::fromArray([2018, 1, 1, 1, 1, 1]);
        $this->assertFalse(
            $date1->isBefore($date2, 'minute')
        );
    }

    public function testDateTimeIsBeforeSecondAfter(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1, 1, 1, 1, 1]);
        $date2 = DateTime::fromArray([2018, 1, 1, 1, 1, 2, 2]);
        $this->assertTrue(
            $date1->isBefore($date2, 'second')
        );
    }

    public function testDateTimeIsBeforeSecondBefore(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1, 1, 1, 2, 2]);
        $date2 = DateTime::fromArray([2018, 1, 1, 1, 1, 1, 1]);
        $this->assertFalse(
            $date1->isBefore($date2, 'second')
        );
    }

    /**
     * #isBetween
     */

    public function testDateTimeIsBetweenBetween(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1, 1, 1, 1, 3]);
        $date2 = DateTime::fromArray([2018, 1, 1, 1, 1, 1, 2]);
        $date3 = DateTime::fromArray([2018, 1, 1, 1, 1, 1, 4]);
        $this->assertTrue(
            $date1->isBetween($date2, $date3)
        );
    }

    public function testDateTimeIsBetweenAfter(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1, 1, 1, 1, 1]);
        $date2 = DateTime::fromArray([2018, 1, 1, 1, 1, 1, 2]);
        $date3 = DateTime::fromArray([2018, 1, 1, 1, 1, 1, 4]);
        $this->assertFalse(
            $date1->isBetween($date2, $date3)
        );
    }

    public function testDateTimeIsBetweenBefore(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1, 1, 1, 1, 5]);
        $date2 = DateTime::fromArray([2018, 1, 1, 1, 1, 1, 2]);
        $date3 = DateTime::fromArray([2018, 1, 1, 1, 1, 1, 4]);
        $this->assertFalse(
            $date1->isBetween($date2, $date3)
        );
    }

    public function testDateTimeIsBetweenYearBetween(): void
    {
        $date1 = DateTime::fromArray([2019]);
        $date2 = DateTime::fromArray([2018]);
        $date3 = DateTime::fromArray([2020]);
        $this->assertTrue(
            $date1->isBetween($date2, $date3, 'year')
        );
    }

    public function testDateTimeIsBetweenYearAfter(): void
    {
        $date1 = DateTime::fromArray([2017]);
        $date2 = DateTime::fromArray([2018]);
        $date3 = DateTime::fromArray([2020]);
        $this->assertFalse(
            $date1->isBetween($date2, $date3, 'year')
        );
    }

    public function testDateTimeIsBetweenYearBefore(): void
    {
        $date1 = DateTime::fromArray([2021]);
        $date2 = DateTime::fromArray([2018]);
        $date3 = DateTime::fromArray([2020]);
        $this->assertFalse(
            $date1->isBetween($date2, $date3, 'year')
        );
    }

    public function testDateTimeIsBetweenMonthBetween(): void
    {
        $date1 = DateTime::fromArray([2018, 3]);
        $date2 = DateTime::fromArray([2018, 2]);
        $date3 = DateTime::fromArray([2018, 4]);
        $this->assertTrue(
            $date1->isBetween($date2, $date3, 'month')
        );
    }

    public function testDateTimeIsBetweenMonthAfter(): void
    {
        $date1 = DateTime::fromArray([2018, 1]);
        $date2 = DateTime::fromArray([2018, 2]);
        $date3 = DateTime::fromArray([2018, 4]);
        $this->assertFalse(
            $date1->isBetween($date2, $date3, 'month')
        );
    }

    public function testDateTimeIsBetweenMonthBefore(): void
    {
        $date1 = DateTime::fromArray([2018, 5]);
        $date2 = DateTime::fromArray([2018, 2]);
        $date3 = DateTime::fromArray([2018, 4]);
        $this->assertFalse(
            $date1->isBetween($date2, $date3, 'month')
        );
    }

    public function testDateTimeIsBetweenDayBetween(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 3]);
        $date2 = DateTime::fromArray([2018, 1, 2]);
        $date3 = DateTime::fromArray([2018, 1, 4]);
        $this->assertTrue(
            $date1->isBetween($date2, $date3, 'day')
        );
    }

    public function testDateTimeIsBetweenDayAfter(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1]);
        $date2 = DateTime::fromArray([2018, 1, 2]);
        $date3 = DateTime::fromArray([2018, 1, 4]);
        $this->assertFalse(
            $date1->isBetween($date2, $date3, 'day')
        );
    }

    public function testDateTimeIsBetweenDayBefore(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 5]);
        $date2 = DateTime::fromArray([2018, 1, 2]);
        $date3 = DateTime::fromArray([2018, 1, 4]);
        $this->assertFalse(
            $date1->isBetween($date2, $date3, 'day')
        );
    }

    public function testDateTimeIsBetweenHourBetween(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1, 3]);
        $date2 = DateTime::fromArray([2018, 1, 1, 2]);
        $date3 = DateTime::fromArray([2018, 1, 1, 4]);
        $this->assertTrue(
            $date1->isBetween($date2, $date3, 'hour')
        );
    }

    public function testDateTimeIsBetweenHourAfter(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1, 1]);
        $date2 = DateTime::fromArray([2018, 1, 1, 2]);
        $date3 = DateTime::fromArray([2018, 1, 1, 4]);
        $this->assertFalse(
            $date1->isBetween($date2, $date3, 'hour')
        );
    }

    public function testDateTimeIsBetweenHourBefore(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1, 5]);
        $date2 = DateTime::fromArray([2018, 1, 1, 2]);
        $date3 = DateTime::fromArray([2018, 1, 1, 4]);
        $this->assertFalse(
            $date1->isBetween($date2, $date3, 'hour')
        );
    }

    public function testDateTimeIsBetweenMinuteBetween(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1, 1, 3]);
        $date2 = DateTime::fromArray([2018, 1, 1, 1, 2]);
        $date3 = DateTime::fromArray([2018, 1, 1, 1, 4]);
        $this->assertTrue(
            $date1->isBetween($date2, $date3, 'minute')
        );
    }

    public function testDateTimeIsBetweenMinuteAfter(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1, 1, 1]);
        $date2 = DateTime::fromArray([2018, 1, 1, 1, 2]);
        $date3 = DateTime::fromArray([2018, 1, 1, 1, 4]);
        $this->assertFalse(
            $date1->isBetween($date2, $date3, 'minute')
        );
    }

    public function testDateTimeIsBetweenMinuteBefore(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1, 1, 5]);
        $date2 = DateTime::fromArray([2018, 1, 1, 1, 2]);
        $date3 = DateTime::fromArray([2018, 1, 1, 1, 4]);
        $this->assertFalse(
            $date1->isBetween($date2, $date3, 'minute')
        );
    }

    public function testDateTimeIsBetweenSecondBetween(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1, 1, 1, 3]);
        $date2 = DateTime::fromArray([2018, 1, 1, 1, 1, 2]);
        $date3 = DateTime::fromArray([2018, 1, 1, 1, 1, 4]);
        $this->assertTrue(
            $date1->isBetween($date2, $date3, 'second')
        );
    }

    public function testDateTimeIsBetweenSecondAfter(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1, 1, 1, 1]);
        $date2 = DateTime::fromArray([2018, 1, 1, 1, 1, 2]);
        $date3 = DateTime::fromArray([2018, 1, 1, 1, 1, 4]);
        $this->assertFalse(
            $date1->isBetween($date2, $date3, 'second')
        );
    }

    public function testDateTimeIsBetweenSecondBefore(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1, 1, 1, 5]);
        $date2 = DateTime::fromArray([2018, 1, 1, 1, 1, 2]);
        $date3 = DateTime::fromArray([2018, 1, 1, 1, 1, 4]);
        $this->assertFalse(
            $date1->isBetween($date2, $date3, 'second')
        );
    }

    /**
     * #isSame
     */

    public function testDateTimeIsSameSame(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1, 1, 1, 1]);
        $date2 = DateTime::fromArray([2018, 1, 1, 1, 1, 1]);
        $this->assertTrue(
            $date1->isSame($date2)
        );
    }

    public function testDateTimeIsSameAfter(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1, 1, 1, 1]);
        $date2 = DateTime::fromArray([2018, 1, 1, 1, 1, 2]);
        $this->assertFalse(
            $date1->isSame($date2)
        );
    }

    public function testDateTimeIsSameBefore(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1, 1, 1, 2]);
        $date2 = DateTime::fromArray([2018, 1, 1, 1, 1, 1]);
        $this->assertFalse(
            $date1->isSame($date2)
        );
    }

    public function testDateTimeIsSameYearSame(): void
    {
        $date1 = DateTime::fromArray([2018, 2]);
        $date2 = DateTime::fromArray([2018, 1]);
        $this->assertTrue(
            $date1->isSame($date2, 'year')
        );
    }

    public function testDateTimeIsSameYearAfter(): void
    {
        $date1 = DateTime::fromArray([2018, 2]);
        $date2 = DateTime::fromArray([2019, 1]);
        $this->assertFalse(
            $date1->isSame($date2, 'year')
        );
    }

    public function testDateTimeIsSameYearBefore(): void
    {
        $date1 = DateTime::fromArray([2018, 2]);
        $date2 = DateTime::fromArray([2017, 1]);
        $this->assertFalse(
            $date1->isSame($date2, 'year')
        );
    }

    public function testDateTimeIsSameMonthSame(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 2]);
        $date2 = DateTime::fromArray([2018, 1, 1]);
        $this->assertTrue(
            $date1->isSame($date2, 'month')
        );
    }

    public function testDateTimeIsSameMonthAfter(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 2]);
        $date2 = DateTime::fromArray([2018, 2, 1]);
        $this->assertFalse(
            $date1->isSame($date2, 'month')
        );
    }

    public function testDateTimeIsSameMonthBefore(): void
    {
        $date1 = DateTime::fromArray([2018, 2, 2]);
        $date2 = DateTime::fromArray([2018, 1, 1]);
        $this->assertFalse(
            $date1->isSame($date2, 'month')
        );
    }

    public function testDateTimeIsSameDaySame(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1, 2]);
        $date2 = DateTime::fromArray([2018, 1, 1, 1]);
        $this->assertTrue(
            $date1->isSame($date2, 'day')
        );
    }

    public function testDateTimeIsSameDayAfter(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1, 2]);
        $date2 = DateTime::fromArray([2018, 1, 2, 1]);
        $this->assertFalse(
            $date1->isSame($date2, 'day')
        );
    }

    public function testDateTimeIsSameDayBefore(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 2, 2]);
        $date2 = DateTime::fromArray([2018, 1, 1, 1]);
        $this->assertFalse(
            $date1->isSame($date2, 'day')
        );
    }

    public function testDateTimeIsSameHourSame(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1, 1, 2]);
        $date2 = DateTime::fromArray([2018, 1, 1, 1, 1]);
        $this->assertTrue(
            $date1->isSame($date2, 'hour')
        );
    }

    public function testDateTimeIsSameHourAfter(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1, 1, 2]);
        $date2 = DateTime::fromArray([2018, 1, 1, 2, 1]);
        $this->assertFalse(
            $date1->isSame($date2, 'hour')
        );
    }

    public function testDateTimeIsSameHourBefore(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1, 2, 2]);
        $date2 = DateTime::fromArray([2018, 1, 1, 1, 1]);
        $this->assertFalse(
            $date1->isSame($date2, 'hour')
        );
    }

    public function testDateTimeIsSameMinuteSame(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1, 1, 1, 2]);
        $date2 = DateTime::fromArray([2018, 1, 1, 1, 1, 1]);
        $this->assertTrue(
            $date1->isSame($date2, 'minute')
        );
    }

    public function testDateTimeIsSameMinuteAfter(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1, 1, 1, 2]);
        $date2 = DateTime::fromArray([2018, 1, 1, 1, 2, 1]);
        $this->assertFalse(
            $date1->isSame($date2, 'minute')
        );
    }

    public function testDateTimeIsSameMinuteBefore(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1, 1, 2, 2]);
        $date2 = DateTime::fromArray([2018, 1, 1, 1, 1, 1]);
        $this->assertFalse(
            $date1->isSame($date2, 'minute')
        );
    }

    public function testDateTimeIsSameSecondSame(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1, 1, 1, 1]);
        $date2 = DateTime::fromArray([2018, 1, 1, 1, 1, 1]);
        $this->assertTrue(
            $date1->isSame($date2, 'second')
        );
    }

    public function testDateTimeIsSameSecondAfter(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1, 1, 1, 1]);
        $date2 = DateTime::fromArray([2018, 1, 1, 1, 1, 2]);
        $this->assertFalse(
            $date1->isSame($date2, 'second')
        );
    }

    public function testDateTimeIsSameSecondBefore(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1, 1, 1, 2]);
        $date2 = DateTime::fromArray([2018, 1, 1, 1, 1, 1]);
        $this->assertFalse(
            $date1->isSame($date2, 'second')
        );
    }

    /**
     * #isSameOrAfter
     */

    public function testDateTimeIsSameOrAfterSame(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1, 1, 1, 1]);
        $date2 = DateTime::fromArray([2018, 1, 1, 1, 1, 1]);
        $this->assertTrue(
            $date1->isSameOrAfter($date2)
        );
    }

    public function testDateTimeIsSameOrAfterAfter(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1, 1, 1, 1]);
        $date2 = DateTime::fromArray([2018, 1, 1, 1, 1, 2]);
        $this->assertFalse(
            $date1->isSameOrAfter($date2)
        );
    }

    public function testDateTimeIsSameOrAfterBefore(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1, 1, 1, 2]);
        $date2 = DateTime::fromArray([2018, 1, 1, 1, 1, 1]);
        $this->assertTrue(
            $date1->isSameOrAfter($date2)
        );
    }

    public function testDateTimeIsSameOrAfterYearSame(): void
    {
        $date1 = DateTime::fromArray([2018, 2]);
        $date2 = DateTime::fromArray([2018, 1]);
        $this->assertTrue(
            $date1->isSameOrAfter($date2, 'year')
        );
    }

    public function testDateTimeIsSameOrAfterYearAfter(): void
    {
        $date1 = DateTime::fromArray([2018, 2]);
        $date2 = DateTime::fromArray([2019, 1]);
        $this->assertFalse(
            $date1->isSameOrAfter($date2, 'year')
        );
    }

    public function testDateTimeIsSameOrAfterYearBefore(): void
    {
        $date1 = DateTime::fromArray([2018, 2]);
        $date2 = DateTime::fromArray([2017, 1]);
        $this->assertTrue(
            $date1->isSameOrAfter($date2, 'year')
        );
    }

    public function testDateTimeIsSameOrAfterMonthSame(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 2]);
        $date2 = DateTime::fromArray([2018, 1, 1]);
        $this->assertTrue(
            $date1->isSameOrAfter($date2, 'month')
        );
    }

    public function testDateTimeIsSameOrAfterMonthAfter(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 2]);
        $date2 = DateTime::fromArray([2018, 2, 1]);
        $this->assertFalse(
            $date1->isSameOrAfter($date2, 'month')
        );
    }

    public function testDateTimeIsSameOrAfterMonthBefore(): void
    {
        $date1 = DateTime::fromArray([2018, 2, 2]);
        $date2 = DateTime::fromArray([2018, 1, 1]);
        $this->assertTrue(
            $date1->isSameOrAfter($date2, 'month')
        );
    }

    public function testDateTimeIsSameOrAfterDaySame(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1, 2]);
        $date2 = DateTime::fromArray([2018, 1, 1, 1]);
        $this->assertTrue(
            $date1->isSameOrAfter($date2, 'day')
        );
    }

    public function testDateTimeIsSameOrAfterDayAfter(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1, 2]);
        $date2 = DateTime::fromArray([2018, 1, 2, 1]);
        $this->assertFalse(
            $date1->isSameOrAfter($date2, 'day')
        );
    }

    public function testDateTimeIsSameOrAfterDayBefore(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 2, 2]);
        $date2 = DateTime::fromArray([2018, 1, 1, 1]);
        $this->assertTrue(
            $date1->isSameOrAfter($date2, 'day')
        );
    }

    public function testDateTimeIsSameOrAfterHourSame(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1, 1, 2]);
        $date2 = DateTime::fromArray([2018, 1, 1, 1, 1]);
        $this->assertTrue(
            $date1->isSameOrAfter($date2, 'hour')
        );
    }

    public function testDateTimeIsSameOrAfterHourAfter(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1, 1, 2]);
        $date2 = DateTime::fromArray([2018, 1, 1, 2, 1]);
        $this->assertFalse(
            $date1->isSameOrAfter($date2, 'hour')
        );
    }

    public function testDateTimeIsSameOrAfterHourBefore(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1, 2, 2]);
        $date2 = DateTime::fromArray([2018, 1, 1, 1, 1]);
        $this->assertTrue(
            $date1->isSameOrAfter($date2, 'hour')
        );
    }

    public function testDateTimeIsSameOrAfterMinuteSame(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1, 1, 1, 2]);
        $date2 = DateTime::fromArray([2018, 1, 1, 1, 1, 1]);
        $this->assertTrue(
            $date1->isSameOrAfter($date2, 'minute')
        );
    }

    public function testDateTimeIsSameOrAfterMinuteAfter(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1, 1, 1, 2]);
        $date2 = DateTime::fromArray([2018, 1, 1, 1, 2, 1]);
        $this->assertFalse(
            $date1->isSameOrAfter($date2, 'minute')
        );
    }

    public function testDateTimeIsSameOrAfterMinuteBefore(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1, 1, 2, 2]);
        $date2 = DateTime::fromArray([2018, 1, 1, 1, 1, 1]);
        $this->assertTrue(
            $date1->isSameOrAfter($date2, 'minute')
        );
    }

    public function testDateTimeIsSameOrAfterSecondSame(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1, 1, 1, 1]);
        $date2 = DateTime::fromArray([2018, 1, 1, 1, 1, 1]);
        $this->assertTrue(
            $date1->isSameOrAfter($date2, 'second')
        );
    }

    public function testDateTimeIsSameOrAfterSecondAfter(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1, 1, 1, 1]);
        $date2 = DateTime::fromArray([2018, 1, 1, 1, 1, 2]);
        $this->assertFalse(
            $date1->isSameOrAfter($date2, 'second')
        );
    }

    public function testDateTimeIsSameOrAfterSecondBefore(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1, 1, 1, 2]);
        $date2 = DateTime::fromArray([2018, 1, 1, 1, 1, 1]);
        $this->assertTrue(
            $date1->isSameOrAfter($date2, 'second')
        );
    }

    /**
     * #isSameOrBefore
     */

    public function testDateTimeIsSameOrBeforeSame(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1, 1, 1, 1]);
        $date2 = DateTime::fromArray([2018, 1, 1, 1, 1, 1]);
        $this->assertTrue(
            $date1->isSameOrBefore($date2)
        );
    }

    public function testDateTimeIsSameOrBeforeAfter(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1, 1, 1, 1]);
        $date2 = DateTime::fromArray([2018, 1, 1, 1, 1, 2]);
        $this->assertTrue(
            $date1->isSameOrBefore($date2)
        );
    }

    public function testDateTimeIsSameOrBeforeBefore(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1, 1, 1, 2]);
        $date2 = DateTime::fromArray([2018, 1, 1, 1, 1, 1]);
        $this->assertFalse(
            $date1->isSameOrBefore($date2)
        );
    }

    public function testDateTimeIsSameOrBeforeYearSame(): void
    {
        $date1 = DateTime::fromArray([2018, 2]);
        $date2 = DateTime::fromArray([2018, 1]);
        $this->assertTrue(
            $date1->isSameOrBefore($date2, 'year')
        );
    }

    public function testDateTimeIsSameOrBeforeYearAfter(): void
    {
        $date1 = DateTime::fromArray([2018, 2]);
        $date2 = DateTime::fromArray([2019, 1]);
        $this->assertTrue(
            $date1->isSameOrBefore($date2, 'year')
        );
    }

    public function testDateTimeIsSameOrBeforeYearBefore(): void
    {
        $date1 = DateTime::fromArray([2018, 2]);
        $date2 = DateTime::fromArray([2017, 1]);
        $this->assertFalse(
            $date1->isSameOrBefore($date2, 'year')
        );
    }

    public function testDateTimeIsSameOrBeforeMonthSame(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 2]);
        $date2 = DateTime::fromArray([2018, 1, 1]);
        $this->assertTrue(
            $date1->isSameOrBefore($date2, 'month')
        );
    }

    public function testDateTimeIsSameOrBeforeMonthAfter(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 2]);
        $date2 = DateTime::fromArray([2018, 2, 1]);
        $this->assertTrue(
            $date1->isSameOrBefore($date2, 'month')
        );
    }

    public function testDateTimeIsSameOrBeforeMonthBefore(): void
    {
        $date1 = DateTime::fromArray([2018, 2, 2]);
        $date2 = DateTime::fromArray([2018, 1, 1]);
        $this->assertFalse(
            $date1->isSameOrBefore($date2, 'month')
        );
    }

    public function testDateTimeIsSameOrBeforeDaySame(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1, 2]);
        $date2 = DateTime::fromArray([2018, 1, 1, 1]);
        $this->assertTrue(
            $date1->isSameOrBefore($date2, 'day')
        );
    }

    public function testDateTimeIsSameOrBeforeDayAfter(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1, 2]);
        $date2 = DateTime::fromArray([2018, 1, 2, 1]);
        $this->assertTrue(
            $date1->isSameOrBefore($date2, 'day')
        );
    }

    public function testDateTimeIsSameOrBeforeDayBefore(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 2, 2]);
        $date2 = DateTime::fromArray([2018, 1, 1, 1]);
        $this->assertFalse(
            $date1->isSameOrBefore($date2, 'day')
        );
    }

    public function testDateTimeIsSameOrBeforeHourSame(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1, 1, 2]);
        $date2 = DateTime::fromArray([2018, 1, 1, 1, 1]);
        $this->assertTrue(
            $date1->isSameOrBefore($date2, 'hour')
        );
    }

    public function testDateTimeIsSameOrBeforeHourAfter(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1, 1, 2]);
        $date2 = DateTime::fromArray([2018, 1, 1, 2, 1]);
        $this->assertTrue(
            $date1->isSameOrBefore($date2, 'hour')
        );
    }

    public function testDateTimeIsSameOrBeforeHourBefore(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1, 2, 2]);
        $date2 = DateTime::fromArray([2018, 1, 1, 1, 1]);
        $this->assertFalse(
            $date1->isSameOrBefore($date2, 'hour')
        );
    }

    public function testDateTimeIsSameOrBeforeMinuteSame(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1, 1, 1, 2]);
        $date2 = DateTime::fromArray([2018, 1, 1, 1, 1, 1]);
        $this->assertTrue(
            $date1->isSameOrBefore($date2, 'minute')
        );
    }

    public function testDateTimeIsSameOrBeforeMinuteAfter(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1, 1, 1, 2]);
        $date2 = DateTime::fromArray([2018, 1, 1, 1, 2, 1]);
        $this->assertTrue(
            $date1->isSameOrBefore($date2, 'minute')
        );
    }

    public function testDateTimeIsSameOrBeforeMinuteBefore(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1, 1, 2, 2]);
        $date2 = DateTime::fromArray([2018, 1, 1, 1, 1, 1]);
        $this->assertFalse(
            $date1->isSameOrBefore($date2, 'minute')
        );
    }

    public function testDateTimeIsSameOrBeforeSecondSame(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1, 1, 1, 1]);
        $date2 = DateTime::fromArray([2018, 1, 1, 1, 1, 1]);
        $this->assertTrue(
            $date1->isSameOrBefore($date2, 'second')
        );
    }

    public function testDateTimeIsSameOrBeforeSecondAfter(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1, 1, 1, 1]);
        $date2 = DateTime::fromArray([2018, 1, 1, 1, 1, 2]);
        $this->assertTrue(
            $date1->isSameOrBefore($date2, 'second')
        );
    }

    public function testDateTimeIsSameOrBeforeSecondBefore(): void
    {
        $date1 = DateTime::fromArray([2018, 1, 1, 1, 1, 2]);
        $date2 = DateTime::fromArray([2018, 1, 1, 1, 1, 1]);
        $this->assertFalse(
            $date1->isSameOrBefore($date2, 'second')
        );
    }

}
