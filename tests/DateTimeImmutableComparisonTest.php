<?php
declare(strict_types=1);

namespace Tests;

use
    Fyre\DateTime\DateTimeImmutable;

trait DateTimeImmutableComparisonsTest
{

    /**
     * #isAfter
     */

    public function testDateTimeImmutableIsAfterAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 2, 2]);
        $this->assertFalse(
            $date1->isAfter($date2)
        );
    }

    public function testDateTimeImmutableIsAfterBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 2, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $this->assertTrue(
            $date1->isAfter($date2)
        );
    }

    public function testDateTimeImmutableIsAfterYearAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1]);
        $date2 = DateTimeImmutable::fromArray([2019, 2]);
        $this->assertFalse(
            $date1->isAfter($date2, 'year')
        );
    }

    public function testDateTimeImmutableIsAfterYearBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2019, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1]);
        $this->assertTrue(
            $date1->isAfter($date2, 'year')
        );
    }

    public function testDateTimeImmutableIsAfterMonthAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1]);
        $date2 = DateTimeImmutable::fromArray([2018, 2, 2]);
        $this->assertFalse(
            $date1->isAfter($date2, 'month')
        );
    }

    public function testDateTimeImmutableIsAfterMonthBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 2, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1]);
        $this->assertTrue(
            $date1->isAfter($date2, 'month')
        );
    }

    public function testDateTimeImmutableIsAfterDayAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 2, 2]);
        $this->assertFalse(
            $date1->isAfter($date2, 'day')
        );
    }

    public function testDateTimeImmutableIsAfterDayBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 2, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1]);
        $this->assertTrue(
            $date1->isAfter($date2, 'day')
        );
    }

    public function testDateTimeImmutableIsAfterHourAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 2, 2]);
        $this->assertFalse(
            $date1->isAfter($date2, 'hour')
        );
    }

    public function testDateTimeImmutableIsAfterHourBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 2, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1]);
        $this->assertTrue(
            $date1->isAfter($date2, 'hour')
        );
    }

    public function testDateTimeImmutableIsAfterMinuteAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 2, 2]);
        $this->assertFalse(
            $date1->isAfter($date2, 'minute')
        );
    }

    public function testDateTimeImmutableIsAfterMinuteBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 2, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $this->assertTrue(
            $date1->isAfter($date2, 'minute')
        );
    }

    public function testDateTimeImmutableIsAfterSecondAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1, 1]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 2, 2]);
        $this->assertFalse(
            $date1->isAfter($date2, 'second')
        );
    }

    public function testDateTimeImmutableIsAfterSecondBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 2, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1, 1]);
        $this->assertTrue(
            $date1->isAfter($date2, 'second')
        );
    }

    /**
     * #isBefore
     */

    public function testDateTimeImmutableIsBeforeAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 2, 2]);
        $this->assertTrue(
            $date1->isBefore($date2)
        );
    }

    public function testDateTimeImmutableIsBeforeBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 2, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $this->assertFalse(
            $date1->isBefore($date2)
        );
    }

    public function testDateTimeImmutableIsBeforeYearAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1]);
        $date2 = DateTimeImmutable::fromArray([2019, 2]);
        $this->assertTrue(
            $date1->isBefore($date2, 'year')
        );
    }

    public function testDateTimeImmutableIsBeforeYearBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2019, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1]);
        $this->assertFalse(
            $date1->isBefore($date2, 'year')
        );
    }

    public function testDateTimeImmutableIsBeforeMonthAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1]);
        $date2 = DateTimeImmutable::fromArray([2018, 2, 2]);
        $this->assertTrue(
            $date1->isBefore($date2, 'month')
        );
    }

    public function testDateTimeImmutableIsBeforeMonthBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 2, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1]);
        $this->assertFalse(
            $date1->isBefore($date2, 'month')
        );
    }

    public function testDateTimeImmutableIsBeforeDayAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 2, 2]);
        $this->assertTrue(
            $date1->isBefore($date2, 'day')
        );
    }

    public function testDateTimeImmutableIsBeforeDayBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 2, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1]);
        $this->assertFalse(
            $date1->isBefore($date2, 'day')
        );
    }

    public function testDateTimeImmutableIsBeforeHourAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 2, 2]);
        $this->assertTrue(
            $date1->isBefore($date2, 'hour')
        );
    }

    public function testDateTimeImmutableIsBeforeHourBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 2, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1]);
        $this->assertFalse(
            $date1->isBefore($date2, 'hour')
        );
    }

    public function testDateTimeImmutableIsBeforeMinuteAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 2, 2]);
        $this->assertTrue(
            $date1->isBefore($date2, 'minute')
        );
    }

    public function testDateTimeImmutableIsBeforeMinuteBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 2, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $this->assertFalse(
            $date1->isBefore($date2, 'minute')
        );
    }

    public function testDateTimeImmutableIsBeforeSecondAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1, 1]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 2, 2]);
        $this->assertTrue(
            $date1->isBefore($date2, 'second')
        );
    }

    public function testDateTimeImmutableIsBeforeSecondBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 2, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1, 1]);
        $this->assertFalse(
            $date1->isBefore($date2, 'second')
        );
    }

    /**
     * #isBetween
     */

    public function testDateTimeImmutableIsBetweenBetween(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1, 3]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1, 2]);
        $date3 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1, 4]);
        $this->assertTrue(
            $date1->isBetween($date2, $date3)
        );
    }

    public function testDateTimeImmutableIsBetweenAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1, 1]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1, 2]);
        $date3 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1, 4]);
        $this->assertFalse(
            $date1->isBetween($date2, $date3)
        );
    }

    public function testDateTimeImmutableIsBetweenBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1, 5]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1, 2]);
        $date3 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1, 4]);
        $this->assertFalse(
            $date1->isBetween($date2, $date3)
        );
    }

    public function testDateTimeImmutableIsBetweenYearBetween(): void
    {
        $date1 = DateTimeImmutable::fromArray([2019]);
        $date2 = DateTimeImmutable::fromArray([2018]);
        $date3 = DateTimeImmutable::fromArray([2020]);
        $this->assertTrue(
            $date1->isBetween($date2, $date3, 'year')
        );
    }

    public function testDateTimeImmutableIsBetweenYearAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2017]);
        $date2 = DateTimeImmutable::fromArray([2018]);
        $date3 = DateTimeImmutable::fromArray([2020]);
        $this->assertFalse(
            $date1->isBetween($date2, $date3, 'year')
        );
    }

    public function testDateTimeImmutableIsBetweenYearBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2021]);
        $date2 = DateTimeImmutable::fromArray([2018]);
        $date3 = DateTimeImmutable::fromArray([2020]);
        $this->assertFalse(
            $date1->isBetween($date2, $date3, 'year')
        );
    }

    public function testDateTimeImmutableIsBetweenMonthBetween(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 3]);
        $date2 = DateTimeImmutable::fromArray([2018, 2]);
        $date3 = DateTimeImmutable::fromArray([2018, 4]);
        $this->assertTrue(
            $date1->isBetween($date2, $date3, 'month')
        );
    }

    public function testDateTimeImmutableIsBetweenMonthAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1]);
        $date2 = DateTimeImmutable::fromArray([2018, 2]);
        $date3 = DateTimeImmutable::fromArray([2018, 4]);
        $this->assertFalse(
            $date1->isBetween($date2, $date3, 'month')
        );
    }

    public function testDateTimeImmutableIsBetweenMonthBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 5]);
        $date2 = DateTimeImmutable::fromArray([2018, 2]);
        $date3 = DateTimeImmutable::fromArray([2018, 4]);
        $this->assertFalse(
            $date1->isBetween($date2, $date3, 'month')
        );
    }

    public function testDateTimeImmutableIsBetweenDayBetween(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 3]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 2]);
        $date3 = DateTimeImmutable::fromArray([2018, 1, 4]);
        $this->assertTrue(
            $date1->isBetween($date2, $date3, 'day')
        );
    }

    public function testDateTimeImmutableIsBetweenDayAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 2]);
        $date3 = DateTimeImmutable::fromArray([2018, 1, 4]);
        $this->assertFalse(
            $date1->isBetween($date2, $date3, 'day')
        );
    }

    public function testDateTimeImmutableIsBetweenDayBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 5]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 2]);
        $date3 = DateTimeImmutable::fromArray([2018, 1, 4]);
        $this->assertFalse(
            $date1->isBetween($date2, $date3, 'day')
        );
    }

    public function testDateTimeImmutableIsBetweenHourBetween(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 3]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 2]);
        $date3 = DateTimeImmutable::fromArray([2018, 1, 1, 4]);
        $this->assertTrue(
            $date1->isBetween($date2, $date3, 'hour')
        );
    }

    public function testDateTimeImmutableIsBetweenHourAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 2]);
        $date3 = DateTimeImmutable::fromArray([2018, 1, 1, 4]);
        $this->assertFalse(
            $date1->isBetween($date2, $date3, 'hour')
        );
    }

    public function testDateTimeImmutableIsBetweenHourBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 5]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 2]);
        $date3 = DateTimeImmutable::fromArray([2018, 1, 1, 4]);
        $this->assertFalse(
            $date1->isBetween($date2, $date3, 'hour')
        );
    }

    public function testDateTimeImmutableIsBetweenMinuteBetween(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 3]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 2]);
        $date3 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 4]);
        $this->assertTrue(
            $date1->isBetween($date2, $date3, 'minute')
        );
    }

    public function testDateTimeImmutableIsBetweenMinuteAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 2]);
        $date3 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 4]);
        $this->assertFalse(
            $date1->isBetween($date2, $date3, 'minute')
        );
    }

    public function testDateTimeImmutableIsBetweenMinuteBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 5]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 2]);
        $date3 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 4]);
        $this->assertFalse(
            $date1->isBetween($date2, $date3, 'minute')
        );
    }

    public function testDateTimeImmutableIsBetweenSecondBetween(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 3]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 2]);
        $date3 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 4]);
        $this->assertTrue(
            $date1->isBetween($date2, $date3, 'second')
        );
    }

    public function testDateTimeImmutableIsBetweenSecondAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 2]);
        $date3 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 4]);
        $this->assertFalse(
            $date1->isBetween($date2, $date3, 'second')
        );
    }

    public function testDateTimeImmutableIsBetweenSecondBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 5]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 2]);
        $date3 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 4]);
        $this->assertFalse(
            $date1->isBetween($date2, $date3, 'second')
        );
    }

    /**
     * #isSame
     */

    public function testDateTimeImmutableIsSameSame(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $this->assertTrue(
            $date1->isSame($date2)
        );
    }

    public function testDateTimeImmutableIsSameAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 2]);
        $this->assertFalse(
            $date1->isSame($date2)
        );
    }

    public function testDateTimeImmutableIsSameBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $this->assertFalse(
            $date1->isSame($date2)
        );
    }

    public function testDateTimeImmutableIsSameYearSame(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1]);
        $this->assertTrue(
            $date1->isSame($date2, 'year')
        );
    }

    public function testDateTimeImmutableIsSameYearAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 2]);
        $date2 = DateTimeImmutable::fromArray([2019, 1]);
        $this->assertFalse(
            $date1->isSame($date2, 'year')
        );
    }

    public function testDateTimeImmutableIsSameYearBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 2]);
        $date2 = DateTimeImmutable::fromArray([2017, 1]);
        $this->assertFalse(
            $date1->isSame($date2, 'year')
        );
    }

    public function testDateTimeImmutableIsSameMonthSame(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1]);
        $this->assertTrue(
            $date1->isSame($date2, 'month')
        );
    }

    public function testDateTimeImmutableIsSameMonthAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 2, 1]);
        $this->assertFalse(
            $date1->isSame($date2, 'month')
        );
    }

    public function testDateTimeImmutableIsSameMonthBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 2, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1]);
        $this->assertFalse(
            $date1->isSame($date2, 'month')
        );
    }

    public function testDateTimeImmutableIsSameDaySame(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1]);
        $this->assertTrue(
            $date1->isSame($date2, 'day')
        );
    }

    public function testDateTimeImmutableIsSameDayAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 2, 1]);
        $this->assertFalse(
            $date1->isSame($date2, 'day')
        );
    }

    public function testDateTimeImmutableIsSameDayBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 2, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1]);
        $this->assertFalse(
            $date1->isSame($date2, 'day')
        );
    }

    public function testDateTimeImmutableIsSameHourSame(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1]);
        $this->assertTrue(
            $date1->isSame($date2, 'hour')
        );
    }

    public function testDateTimeImmutableIsSameHourAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 2, 1]);
        $this->assertFalse(
            $date1->isSame($date2, 'hour')
        );
    }

    public function testDateTimeImmutableIsSameHourBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 2, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1]);
        $this->assertFalse(
            $date1->isSame($date2, 'hour')
        );
    }

    public function testDateTimeImmutableIsSameMinuteSame(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $this->assertTrue(
            $date1->isSame($date2, 'minute')
        );
    }

    public function testDateTimeImmutableIsSameMinuteAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 2, 1]);
        $this->assertFalse(
            $date1->isSame($date2, 'minute')
        );
    }

    public function testDateTimeImmutableIsSameMinuteBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 2, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $this->assertFalse(
            $date1->isSame($date2, 'minute')
        );
    }

    public function testDateTimeImmutableIsSameSecondSame(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $this->assertTrue(
            $date1->isSame($date2, 'second')
        );
    }

    public function testDateTimeImmutableIsSameSecondAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 2]);
        $this->assertFalse(
            $date1->isSame($date2, 'second')
        );
    }

    public function testDateTimeImmutableIsSameSecondBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $this->assertFalse(
            $date1->isSame($date2, 'second')
        );
    }

    /**
     * #isSameOrAfter
     */

    public function testDateTimeImmutableIsSameOrAfterSame(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $this->assertTrue(
            $date1->isSameOrAfter($date2)
        );
    }

    public function testDateTimeImmutableIsSameOrAfterAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 2]);
        $this->assertFalse(
            $date1->isSameOrAfter($date2)
        );
    }

    public function testDateTimeImmutableIsSameOrAfterBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $this->assertTrue(
            $date1->isSameOrAfter($date2)
        );
    }

    public function testDateTimeImmutableIsSameOrAfterYearSame(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1]);
        $this->assertTrue(
            $date1->isSameOrAfter($date2, 'year')
        );
    }

    public function testDateTimeImmutableIsSameOrAfterYearAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 2]);
        $date2 = DateTimeImmutable::fromArray([2019, 1]);
        $this->assertFalse(
            $date1->isSameOrAfter($date2, 'year')
        );
    }

    public function testDateTimeImmutableIsSameOrAfterYearBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 2]);
        $date2 = DateTimeImmutable::fromArray([2017, 1]);
        $this->assertTrue(
            $date1->isSameOrAfter($date2, 'year')
        );
    }

    public function testDateTimeImmutableIsSameOrAfterMonthSame(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1]);
        $this->assertTrue(
            $date1->isSameOrAfter($date2, 'month')
        );
    }

    public function testDateTimeImmutableIsSameOrAfterMonthAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 2, 1]);
        $this->assertFalse(
            $date1->isSameOrAfter($date2, 'month')
        );
    }

    public function testDateTimeImmutableIsSameOrAfterMonthBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 2, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1]);
        $this->assertTrue(
            $date1->isSameOrAfter($date2, 'month')
        );
    }

    public function testDateTimeImmutableIsSameOrAfterDaySame(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1]);
        $this->assertTrue(
            $date1->isSameOrAfter($date2, 'day')
        );
    }

    public function testDateTimeImmutableIsSameOrAfterDayAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 2, 1]);
        $this->assertFalse(
            $date1->isSameOrAfter($date2, 'day')
        );
    }

    public function testDateTimeImmutableIsSameOrAfterDayBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 2, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1]);
        $this->assertTrue(
            $date1->isSameOrAfter($date2, 'day')
        );
    }

    public function testDateTimeImmutableIsSameOrAfterHourSame(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1]);
        $this->assertTrue(
            $date1->isSameOrAfter($date2, 'hour')
        );
    }

    public function testDateTimeImmutableIsSameOrAfterHourAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 2, 1]);
        $this->assertFalse(
            $date1->isSameOrAfter($date2, 'hour')
        );
    }

    public function testDateTimeImmutableIsSameOrAfterHourBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 2, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1]);
        $this->assertTrue(
            $date1->isSameOrAfter($date2, 'hour')
        );
    }

    public function testDateTimeImmutableIsSameOrAfterMinuteSame(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $this->assertTrue(
            $date1->isSameOrAfter($date2, 'minute')
        );
    }

    public function testDateTimeImmutableIsSameOrAfterMinuteAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 2, 1]);
        $this->assertFalse(
            $date1->isSameOrAfter($date2, 'minute')
        );
    }

    public function testDateTimeImmutableIsSameOrAfterMinuteBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 2, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $this->assertTrue(
            $date1->isSameOrAfter($date2, 'minute')
        );
    }

    public function testDateTimeImmutableIsSameOrAfterSecondSame(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $this->assertTrue(
            $date1->isSameOrAfter($date2, 'second')
        );
    }

    public function testDateTimeImmutableIsSameOrAfterSecondAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 2]);
        $this->assertFalse(
            $date1->isSameOrAfter($date2, 'second')
        );
    }

    public function testDateTimeImmutableIsSameOrAfterSecondBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $this->assertTrue(
            $date1->isSameOrAfter($date2, 'second')
        );
    }

    /**
     * #isSameOrBefore
     */

    public function testDateTimeImmutableIsSameOrBeforeSame(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $this->assertTrue(
            $date1->isSameOrBefore($date2)
        );
    }

    public function testDateTimeImmutableIsSameOrBeforeAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 2]);
        $this->assertTrue(
            $date1->isSameOrBefore($date2)
        );
    }

    public function testDateTimeImmutableIsSameOrBeforeBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $this->assertFalse(
            $date1->isSameOrBefore($date2)
        );
    }

    public function testDateTimeImmutableIsSameOrBeforeYearSame(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1]);
        $this->assertTrue(
            $date1->isSameOrBefore($date2, 'year')
        );
    }

    public function testDateTimeImmutableIsSameOrBeforeYearAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 2]);
        $date2 = DateTimeImmutable::fromArray([2019, 1]);
        $this->assertTrue(
            $date1->isSameOrBefore($date2, 'year')
        );
    }

    public function testDateTimeImmutableIsSameOrBeforeYearBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 2]);
        $date2 = DateTimeImmutable::fromArray([2017, 1]);
        $this->assertFalse(
            $date1->isSameOrBefore($date2, 'year')
        );
    }

    public function testDateTimeImmutableIsSameOrBeforeMonthSame(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1]);
        $this->assertTrue(
            $date1->isSameOrBefore($date2, 'month')
        );
    }

    public function testDateTimeImmutableIsSameOrBeforeMonthAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 2, 1]);
        $this->assertTrue(
            $date1->isSameOrBefore($date2, 'month')
        );
    }

    public function testDateTimeImmutableIsSameOrBeforeMonthBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 2, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1]);
        $this->assertFalse(
            $date1->isSameOrBefore($date2, 'month')
        );
    }

    public function testDateTimeImmutableIsSameOrBeforeDaySame(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1]);
        $this->assertTrue(
            $date1->isSameOrBefore($date2, 'day')
        );
    }

    public function testDateTimeImmutableIsSameOrBeforeDayAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 2, 1]);
        $this->assertTrue(
            $date1->isSameOrBefore($date2, 'day')
        );
    }

    public function testDateTimeImmutableIsSameOrBeforeDayBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 2, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1]);
        $this->assertFalse(
            $date1->isSameOrBefore($date2, 'day')
        );
    }

    public function testDateTimeImmutableIsSameOrBeforeHourSame(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1]);
        $this->assertTrue(
            $date1->isSameOrBefore($date2, 'hour')
        );
    }

    public function testDateTimeImmutableIsSameOrBeforeHourAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 2, 1]);
        $this->assertTrue(
            $date1->isSameOrBefore($date2, 'hour')
        );
    }

    public function testDateTimeImmutableIsSameOrBeforeHourBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 2, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1]);
        $this->assertFalse(
            $date1->isSameOrBefore($date2, 'hour')
        );
    }

    public function testDateTimeImmutableIsSameOrBeforeMinuteSame(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $this->assertTrue(
            $date1->isSameOrBefore($date2, 'minute')
        );
    }

    public function testDateTimeImmutableIsSameOrBeforeMinuteAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 2, 1]);
        $this->assertTrue(
            $date1->isSameOrBefore($date2, 'minute')
        );
    }

    public function testDateTimeImmutableIsSameOrBeforeMinuteBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 2, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $this->assertFalse(
            $date1->isSameOrBefore($date2, 'minute')
        );
    }

    public function testDateTimeImmutableIsSameOrBeforeSecondSame(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $this->assertTrue(
            $date1->isSameOrBefore($date2, 'second')
        );
    }

    public function testDateTimeImmutableIsSameOrBeforeSecondAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 2]);
        $this->assertTrue(
            $date1->isSameOrBefore($date2, 'second')
        );
    }

    public function testDateTimeImmutableIsSameOrBeforeSecondBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $this->assertFalse(
            $date1->isSameOrBefore($date2, 'second')
        );
    }

}
