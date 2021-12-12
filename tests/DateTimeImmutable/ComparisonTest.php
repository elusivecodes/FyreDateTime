<?php
declare(strict_types=1);

namespace Tests\DateTimeImmutable;

use
    Fyre\DateTime\DateTimeImmutable;

trait ComparisonsTest
{

    /**
     * #isAfter
     */

    public function testIsAfterAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 2, 2]);
        $this->assertFalse(
            $date1->isAfter($date2)
        );
    }

    public function testIsAfterBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 2, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $this->assertTrue(
            $date1->isAfter($date2)
        );
    }

    public function testIsAfterYearAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1]);
        $date2 = DateTimeImmutable::fromArray([2019, 2]);
        $this->assertFalse(
            $date1->isAfter($date2, 'year')
        );
    }

    public function testIsAfterYearBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2019, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1]);
        $this->assertTrue(
            $date1->isAfter($date2, 'year')
        );
    }

    public function testIsAfterMonthAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1]);
        $date2 = DateTimeImmutable::fromArray([2018, 2, 2]);
        $this->assertFalse(
            $date1->isAfter($date2, 'month')
        );
    }

    public function testIsAfterMonthBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 2, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1]);
        $this->assertTrue(
            $date1->isAfter($date2, 'month')
        );
    }

    public function testIsAfterDayAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 2, 2]);
        $this->assertFalse(
            $date1->isAfter($date2, 'day')
        );
    }

    public function testIsAfterDayBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 2, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1]);
        $this->assertTrue(
            $date1->isAfter($date2, 'day')
        );
    }

    public function testIsAfterHourAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 2, 2]);
        $this->assertFalse(
            $date1->isAfter($date2, 'hour')
        );
    }

    public function testIsAfterHourBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 2, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1]);
        $this->assertTrue(
            $date1->isAfter($date2, 'hour')
        );
    }

    public function testIsAfterMinuteAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 2, 2]);
        $this->assertFalse(
            $date1->isAfter($date2, 'minute')
        );
    }

    public function testIsAfterMinuteBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 2, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $this->assertTrue(
            $date1->isAfter($date2, 'minute')
        );
    }

    public function testIsAfterSecondAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1, 1]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 2, 2]);
        $this->assertFalse(
            $date1->isAfter($date2, 'second')
        );
    }

    public function testIsAfterSecondBefore(): void
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

    public function testIsBeforeAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 2, 2]);
        $this->assertTrue(
            $date1->isBefore($date2)
        );
    }

    public function testIsBeforeBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 2, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $this->assertFalse(
            $date1->isBefore($date2)
        );
    }

    public function testIsBeforeYearAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1]);
        $date2 = DateTimeImmutable::fromArray([2019, 2]);
        $this->assertTrue(
            $date1->isBefore($date2, 'year')
        );
    }

    public function testIsBeforeYearBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2019, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1]);
        $this->assertFalse(
            $date1->isBefore($date2, 'year')
        );
    }

    public function testIsBeforeMonthAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1]);
        $date2 = DateTimeImmutable::fromArray([2018, 2, 2]);
        $this->assertTrue(
            $date1->isBefore($date2, 'month')
        );
    }

    public function testIsBeforeMonthBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 2, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1]);
        $this->assertFalse(
            $date1->isBefore($date2, 'month')
        );
    }

    public function testIsBeforeDayAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 2, 2]);
        $this->assertTrue(
            $date1->isBefore($date2, 'day')
        );
    }

    public function testIsBeforeDayBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 2, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1]);
        $this->assertFalse(
            $date1->isBefore($date2, 'day')
        );
    }

    public function testIsBeforeHourAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 2, 2]);
        $this->assertTrue(
            $date1->isBefore($date2, 'hour')
        );
    }

    public function testIsBeforeHourBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 2, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1]);
        $this->assertFalse(
            $date1->isBefore($date2, 'hour')
        );
    }

    public function testIsBeforeMinuteAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 2, 2]);
        $this->assertTrue(
            $date1->isBefore($date2, 'minute')
        );
    }

    public function testIsBeforeMinuteBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 2, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $this->assertFalse(
            $date1->isBefore($date2, 'minute')
        );
    }

    public function testIsBeforeSecondAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1, 1]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 2, 2]);
        $this->assertTrue(
            $date1->isBefore($date2, 'second')
        );
    }

    public function testIsBeforeSecondBefore(): void
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

    public function testIsBetweenBetween(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1, 3]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1, 2]);
        $date3 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1, 4]);
        $this->assertTrue(
            $date1->isBetween($date2, $date3)
        );
    }

    public function testIsBetweenAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1, 1]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1, 2]);
        $date3 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1, 4]);
        $this->assertFalse(
            $date1->isBetween($date2, $date3)
        );
    }

    public function testIsBetweenBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1, 5]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1, 2]);
        $date3 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1, 4]);
        $this->assertFalse(
            $date1->isBetween($date2, $date3)
        );
    }

    public function testIsBetweenYearBetween(): void
    {
        $date1 = DateTimeImmutable::fromArray([2019]);
        $date2 = DateTimeImmutable::fromArray([2018]);
        $date3 = DateTimeImmutable::fromArray([2020]);
        $this->assertTrue(
            $date1->isBetween($date2, $date3, 'year')
        );
    }

    public function testIsBetweenYearAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2017]);
        $date2 = DateTimeImmutable::fromArray([2018]);
        $date3 = DateTimeImmutable::fromArray([2020]);
        $this->assertFalse(
            $date1->isBetween($date2, $date3, 'year')
        );
    }

    public function testIsBetweenYearBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2021]);
        $date2 = DateTimeImmutable::fromArray([2018]);
        $date3 = DateTimeImmutable::fromArray([2020]);
        $this->assertFalse(
            $date1->isBetween($date2, $date3, 'year')
        );
    }

    public function testIsBetweenMonthBetween(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 3]);
        $date2 = DateTimeImmutable::fromArray([2018, 2]);
        $date3 = DateTimeImmutable::fromArray([2018, 4]);
        $this->assertTrue(
            $date1->isBetween($date2, $date3, 'month')
        );
    }

    public function testIsBetweenMonthAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1]);
        $date2 = DateTimeImmutable::fromArray([2018, 2]);
        $date3 = DateTimeImmutable::fromArray([2018, 4]);
        $this->assertFalse(
            $date1->isBetween($date2, $date3, 'month')
        );
    }

    public function testIsBetweenMonthBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 5]);
        $date2 = DateTimeImmutable::fromArray([2018, 2]);
        $date3 = DateTimeImmutable::fromArray([2018, 4]);
        $this->assertFalse(
            $date1->isBetween($date2, $date3, 'month')
        );
    }

    public function testIsBetweenDayBetween(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 3]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 2]);
        $date3 = DateTimeImmutable::fromArray([2018, 1, 4]);
        $this->assertTrue(
            $date1->isBetween($date2, $date3, 'day')
        );
    }

    public function testIsBetweenDayAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 2]);
        $date3 = DateTimeImmutable::fromArray([2018, 1, 4]);
        $this->assertFalse(
            $date1->isBetween($date2, $date3, 'day')
        );
    }

    public function testIsBetweenDayBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 5]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 2]);
        $date3 = DateTimeImmutable::fromArray([2018, 1, 4]);
        $this->assertFalse(
            $date1->isBetween($date2, $date3, 'day')
        );
    }

    public function testIsBetweenHourBetween(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 3]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 2]);
        $date3 = DateTimeImmutable::fromArray([2018, 1, 1, 4]);
        $this->assertTrue(
            $date1->isBetween($date2, $date3, 'hour')
        );
    }

    public function testIsBetweenHourAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 2]);
        $date3 = DateTimeImmutable::fromArray([2018, 1, 1, 4]);
        $this->assertFalse(
            $date1->isBetween($date2, $date3, 'hour')
        );
    }

    public function testIsBetweenHourBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 5]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 2]);
        $date3 = DateTimeImmutable::fromArray([2018, 1, 1, 4]);
        $this->assertFalse(
            $date1->isBetween($date2, $date3, 'hour')
        );
    }

    public function testIsBetweenMinuteBetween(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 3]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 2]);
        $date3 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 4]);
        $this->assertTrue(
            $date1->isBetween($date2, $date3, 'minute')
        );
    }

    public function testIsBetweenMinuteAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 2]);
        $date3 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 4]);
        $this->assertFalse(
            $date1->isBetween($date2, $date3, 'minute')
        );
    }

    public function testIsBetweenMinuteBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 5]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 2]);
        $date3 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 4]);
        $this->assertFalse(
            $date1->isBetween($date2, $date3, 'minute')
        );
    }

    public function testIsBetweenSecondBetween(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 3]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 2]);
        $date3 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 4]);
        $this->assertTrue(
            $date1->isBetween($date2, $date3, 'second')
        );
    }

    public function testIsBetweenSecondAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 2]);
        $date3 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 4]);
        $this->assertFalse(
            $date1->isBetween($date2, $date3, 'second')
        );
    }

    public function testIsBetweenSecondBefore(): void
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

    public function testIsSameSame(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $this->assertTrue(
            $date1->isSame($date2)
        );
    }

    public function testIsSameAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 2]);
        $this->assertFalse(
            $date1->isSame($date2)
        );
    }

    public function testIsSameBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $this->assertFalse(
            $date1->isSame($date2)
        );
    }

    public function testIsSameYearSame(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1]);
        $this->assertTrue(
            $date1->isSame($date2, 'year')
        );
    }

    public function testIsSameYearAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 2]);
        $date2 = DateTimeImmutable::fromArray([2019, 1]);
        $this->assertFalse(
            $date1->isSame($date2, 'year')
        );
    }

    public function testIsSameYearBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 2]);
        $date2 = DateTimeImmutable::fromArray([2017, 1]);
        $this->assertFalse(
            $date1->isSame($date2, 'year')
        );
    }

    public function testIsSameMonthSame(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1]);
        $this->assertTrue(
            $date1->isSame($date2, 'month')
        );
    }

    public function testIsSameMonthAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 2, 1]);
        $this->assertFalse(
            $date1->isSame($date2, 'month')
        );
    }

    public function testIsSameMonthBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 2, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1]);
        $this->assertFalse(
            $date1->isSame($date2, 'month')
        );
    }

    public function testIsSameDaySame(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1]);
        $this->assertTrue(
            $date1->isSame($date2, 'day')
        );
    }

    public function testIsSameDayAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 2, 1]);
        $this->assertFalse(
            $date1->isSame($date2, 'day')
        );
    }

    public function testIsSameDayBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 2, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1]);
        $this->assertFalse(
            $date1->isSame($date2, 'day')
        );
    }

    public function testIsSameHourSame(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1]);
        $this->assertTrue(
            $date1->isSame($date2, 'hour')
        );
    }

    public function testIsSameHourAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 2, 1]);
        $this->assertFalse(
            $date1->isSame($date2, 'hour')
        );
    }

    public function testIsSameHourBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 2, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1]);
        $this->assertFalse(
            $date1->isSame($date2, 'hour')
        );
    }

    public function testIsSameMinuteSame(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $this->assertTrue(
            $date1->isSame($date2, 'minute')
        );
    }

    public function testIsSameMinuteAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 2, 1]);
        $this->assertFalse(
            $date1->isSame($date2, 'minute')
        );
    }

    public function testIsSameMinuteBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 2, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $this->assertFalse(
            $date1->isSame($date2, 'minute')
        );
    }

    public function testIsSameSecondSame(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $this->assertTrue(
            $date1->isSame($date2, 'second')
        );
    }

    public function testIsSameSecondAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 2]);
        $this->assertFalse(
            $date1->isSame($date2, 'second')
        );
    }

    public function testIsSameSecondBefore(): void
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

    public function testIsSameOrAfterSame(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $this->assertTrue(
            $date1->isSameOrAfter($date2)
        );
    }

    public function testIsSameOrAfterAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 2]);
        $this->assertFalse(
            $date1->isSameOrAfter($date2)
        );
    }

    public function testIsSameOrAfterBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $this->assertTrue(
            $date1->isSameOrAfter($date2)
        );
    }

    public function testIsSameOrAfterYearSame(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1]);
        $this->assertTrue(
            $date1->isSameOrAfter($date2, 'year')
        );
    }

    public function testIsSameOrAfterYearAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 2]);
        $date2 = DateTimeImmutable::fromArray([2019, 1]);
        $this->assertFalse(
            $date1->isSameOrAfter($date2, 'year')
        );
    }

    public function testIsSameOrAfterYearBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 2]);
        $date2 = DateTimeImmutable::fromArray([2017, 1]);
        $this->assertTrue(
            $date1->isSameOrAfter($date2, 'year')
        );
    }

    public function testIsSameOrAfterMonthSame(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1]);
        $this->assertTrue(
            $date1->isSameOrAfter($date2, 'month')
        );
    }

    public function testIsSameOrAfterMonthAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 2, 1]);
        $this->assertFalse(
            $date1->isSameOrAfter($date2, 'month')
        );
    }

    public function testIsSameOrAfterMonthBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 2, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1]);
        $this->assertTrue(
            $date1->isSameOrAfter($date2, 'month')
        );
    }

    public function testIsSameOrAfterDaySame(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1]);
        $this->assertTrue(
            $date1->isSameOrAfter($date2, 'day')
        );
    }

    public function testIsSameOrAfterDayAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 2, 1]);
        $this->assertFalse(
            $date1->isSameOrAfter($date2, 'day')
        );
    }

    public function testIsSameOrAfterDayBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 2, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1]);
        $this->assertTrue(
            $date1->isSameOrAfter($date2, 'day')
        );
    }

    public function testIsSameOrAfterHourSame(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1]);
        $this->assertTrue(
            $date1->isSameOrAfter($date2, 'hour')
        );
    }

    public function testIsSameOrAfterHourAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 2, 1]);
        $this->assertFalse(
            $date1->isSameOrAfter($date2, 'hour')
        );
    }

    public function testIsSameOrAfterHourBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 2, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1]);
        $this->assertTrue(
            $date1->isSameOrAfter($date2, 'hour')
        );
    }

    public function testIsSameOrAfterMinuteSame(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $this->assertTrue(
            $date1->isSameOrAfter($date2, 'minute')
        );
    }

    public function testIsSameOrAfterMinuteAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 2, 1]);
        $this->assertFalse(
            $date1->isSameOrAfter($date2, 'minute')
        );
    }

    public function testIsSameOrAfterMinuteBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 2, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $this->assertTrue(
            $date1->isSameOrAfter($date2, 'minute')
        );
    }

    public function testIsSameOrAfterSecondSame(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $this->assertTrue(
            $date1->isSameOrAfter($date2, 'second')
        );
    }

    public function testIsSameOrAfterSecondAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 2]);
        $this->assertFalse(
            $date1->isSameOrAfter($date2, 'second')
        );
    }

    public function testIsSameOrAfterSecondBefore(): void
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

    public function testIsSameOrBeforeSame(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $this->assertTrue(
            $date1->isSameOrBefore($date2)
        );
    }

    public function testIsSameOrBeforeAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 2]);
        $this->assertTrue(
            $date1->isSameOrBefore($date2)
        );
    }

    public function testIsSameOrBeforeBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $this->assertFalse(
            $date1->isSameOrBefore($date2)
        );
    }

    public function testIsSameOrBeforeYearSame(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1]);
        $this->assertTrue(
            $date1->isSameOrBefore($date2, 'year')
        );
    }

    public function testIsSameOrBeforeYearAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 2]);
        $date2 = DateTimeImmutable::fromArray([2019, 1]);
        $this->assertTrue(
            $date1->isSameOrBefore($date2, 'year')
        );
    }

    public function testIsSameOrBeforeYearBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 2]);
        $date2 = DateTimeImmutable::fromArray([2017, 1]);
        $this->assertFalse(
            $date1->isSameOrBefore($date2, 'year')
        );
    }

    public function testIsSameOrBeforeMonthSame(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1]);
        $this->assertTrue(
            $date1->isSameOrBefore($date2, 'month')
        );
    }

    public function testIsSameOrBeforeMonthAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 2, 1]);
        $this->assertTrue(
            $date1->isSameOrBefore($date2, 'month')
        );
    }

    public function testIsSameOrBeforeMonthBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 2, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1]);
        $this->assertFalse(
            $date1->isSameOrBefore($date2, 'month')
        );
    }

    public function testIsSameOrBeforeDaySame(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1]);
        $this->assertTrue(
            $date1->isSameOrBefore($date2, 'day')
        );
    }

    public function testIsSameOrBeforeDayAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 2, 1]);
        $this->assertTrue(
            $date1->isSameOrBefore($date2, 'day')
        );
    }

    public function testIsSameOrBeforeDayBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 2, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1]);
        $this->assertFalse(
            $date1->isSameOrBefore($date2, 'day')
        );
    }

    public function testIsSameOrBeforeHourSame(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1]);
        $this->assertTrue(
            $date1->isSameOrBefore($date2, 'hour')
        );
    }

    public function testIsSameOrBeforeHourAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 2, 1]);
        $this->assertTrue(
            $date1->isSameOrBefore($date2, 'hour')
        );
    }

    public function testIsSameOrBeforeHourBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 2, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1]);
        $this->assertFalse(
            $date1->isSameOrBefore($date2, 'hour')
        );
    }

    public function testIsSameOrBeforeMinuteSame(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $this->assertTrue(
            $date1->isSameOrBefore($date2, 'minute')
        );
    }

    public function testIsSameOrBeforeMinuteAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 2, 1]);
        $this->assertTrue(
            $date1->isSameOrBefore($date2, 'minute')
        );
    }

    public function testIsSameOrBeforeMinuteBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 2, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $this->assertFalse(
            $date1->isSameOrBefore($date2, 'minute')
        );
    }

    public function testIsSameOrBeforeSecondSame(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $this->assertTrue(
            $date1->isSameOrBefore($date2, 'second')
        );
    }

    public function testIsSameOrBeforeSecondAfter(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 2]);
        $this->assertTrue(
            $date1->isSameOrBefore($date2, 'second')
        );
    }

    public function testIsSameOrBeforeSecondBefore(): void
    {
        $date1 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 2]);
        $date2 = DateTimeImmutable::fromArray([2018, 1, 1, 1, 1, 1]);
        $this->assertFalse(
            $date1->isSameOrBefore($date2, 'second')
        );
    }

}
