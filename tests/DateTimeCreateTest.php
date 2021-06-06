<?php
declare(strict_types=1);

namespace Tests;

use
    Fyre\DateTime;

use function
    time;

trait DateTimeCreateTest
{

    /**
     * #__construct
     */

    public function testDateTimeConstructor(): void
    {
        $start = time();
        $now = (new DateTime())->getTimestamp();
        $end = time();
        $this->assertTrue(
            $start <= $now && $end >= $now
        );
    }

    public function testDateTimeConstructorDateTime(): void
    {
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            (new DateTime('January 1, 2019 00:00:00'))->toISOString()
        );
    }

    public function testDateTimeConstructorIso(): void
    {
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            (new DateTime('2019-01-01T00:00:00'))->toISOString()
        );
    }

    public function testDateTimeConstructorDate(): void
    {
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            (new DateTime('January 1, 2019'))->toISOString()
        );
    }

    public function testDateTimeConstructorWithTimeZone(): void
    {
        $this->assertEquals(
            '2018-12-31T14:00:00.000+00:00',
            (new DateTime('January 1, 2019 00:00:00', 'Australia/Brisbane'))->toISOString()
        );
    }

    public function testDateTimeConstructorWithTimeZoneFromOffset(): void
    {
        $this->assertEquals(
            '2018-12-31T14:00:00.000+00:00',
            (new DateTime('January 1, 2019 00:00:00', '+10:00'))->toISOString()
        );
    }

    public function testDateTimeConstructorWithTimeZoneFromOffsetWithoutColon(): void
    {
        $this->assertEquals(
            '2018-12-31T14:00:00.000+00:00',
            (new DateTime('January 1, 2019 00:00:00', '+1000'))->toISOString()
        );
    }

    public function testDateTimeConstructorWithLocale(): void
    {
        $this->assertEquals(
            'الثلاثاء يناير ٠١ ٢٠١٩ ٠٠:٠٠:٠٠ +0000 (UTC)',
            (new DateTime('January 1, 2019 00:00:00', null, 'ar-eg'))->toString()
        );
    }

    /**
     * #fromArray
     */

    public function testDateTimeFromArray(): void
    {
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            DateTime::fromArray([2019])->toISOString()
        );
    }

    public function testDateTimeFromArrayMonth(): void
    {
        $this->assertEquals(
            '2019-02-01T00:00:00.000+00:00',
            DateTime::fromArray([2019, 2])->toISOString()
        );
    }

    public function testDateTimeFromArrayDate(): void
    {
        $this->assertEquals(
            '2019-01-02T00:00:00.000+00:00',
            DateTime::fromArray([2019, 1, 2])->toISOString()
        );
    }

    public function testDateTimeFromArrayHour(): void
    {
        $this->assertEquals(
            '2019-01-01T01:00:00.000+00:00',
            DateTime::fromArray([2019, 1, 1, 1])->toISOString()
        );
    }

    public function testDateTimeFromArrayMinute(): void
    {
        $this->assertEquals(
            '2019-01-01T00:01:00.000+00:00',
            DateTime::fromArray([2019, 1, 1, 0, 1])->toISOString()
        );
    }

    public function testDateTimeFromArraySecond(): void
    {
        $this->assertEquals(
            '2019-01-01T00:00:01.000+00:00',
            DateTime::fromArray([2019, 1, 1, 0, 0, 1])->toISOString()
        );
    }

    public function testDateTimeFromArrayMillisecond(): void
    {
        $this->assertEquals(
            '2019-01-01T00:00:00.001+00:00',
            DateTime::fromArray([2019, 1, 1, 0, 0, 0, 1])->toISOString()
        );
    }

    public function testDateTimeFromArrayWithTimeZone(): void
    {
        $this->assertEquals(
            'Tue Jan 01 2019 00:00:00 +1000 (Australia/Brisbane)',
            DateTime::fromArray([2019, 1, 1, 0, 0, 0], 'Australia/Brisbane')->toString()
        );
    }

    public function testDateTimeFromArrayWithLocale(): void
    {
        $this->assertEquals(
            'الثلاثاء يناير ٠١ ٢٠١٩ ٠٠:٠٠:٠٠ +0000 (UTC)',
            DateTime::fromArray([2019, 1, 1, 0, 0, 0], null, 'ar-eg')->toString()
        );
    }

    public function testDateTimeFromArrayInstanceOf(): void
    {
        $this->assertInstanceOf(
            DateTime::class,
            DateTime::fromArray([2018])
        );
    }

    /**
     * #fromDateTime
     */

    public function testDateTimeFromDateTime(): void
    {
        $date = new \DateTime('@1546300800');
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            DateTime::fromDateTime($date)->toISOString()
        );
    }

    public function testDateTimeFromDateTimeWithTimeZone(): void
    {
        $date = new \DateTime('@1546300800');
        $this->assertEquals(
            'Tue Jan 01 2019 10:00:00 +1000 (Australia/Brisbane)',
            DateTime::fromDateTime($date, 'Australia/Brisbane')->toString()
        );
    }

    public function testDateTimeFromDateTimeWithLocale(): void
    {
        $date = new \DateTime('@1546300800');
        $this->assertEquals(
            'الثلاثاء يناير ٠١ ٢٠١٩ ٠٠:٠٠:٠٠ +0000 (GMT)',
            DateTime::fromDateTime($date, null, 'ar-eg')->toString()
        );
    }

    public function testDateTimeFromDateTimeInstanceOf(): void
    {
        $date = new \DateTime('@1546300800');
        $this->assertInstanceOf(
            DateTime::class,
            DateTime::fromDateTime($date)
        );
    }

    /**
     * #fromISOString
     */

    public function testDateTimeFromIsoString(): void
    {
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            DateTime::fromISOString('2019-01-01T00:00:00.000+00:00')->toISOString()
        );
    }

    public function testDateTimeFromIsoStringWithTimeZone(): void
    {
        $this->assertEquals(
            'Tue Jan 01 2019 10:00:00 +1000 (Australia/Brisbane)',
            DateTime::fromISOString('2019-01-01T00:00:00.000+00:00', 'Australia/Brisbane')->toString()
        );
    }

    public function testDateTimeFromIsoStringWithLocale(): void
    {
        $this->assertEquals(
            'الثلاثاء يناير ٠١ ٢٠١٩ ٠٠:٠٠:٠٠ +0000 (UTC)',
            DateTime::fromISOString('2019-01-01T00:00:00.000+00:00', null, 'ar-eg')->toString()
        );
    }

    public function testDateTimeFromIsoStringInstanceOf(): void
    {
        $this->assertInstanceOf(
            DateTime::class,
            DateTime::fromISOString('2019-01-01T00:00:00.000+00:00')
        );
    }

    /**
     * #fromTimestamp
     */

    public function testDateTimeFromTimestamp(): void
    {
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            DateTime::fromTimestamp(1546300800)->toISOString()
        );
    }

    public function testDateTimeFromTimestampWithTimeZone(): void
    {
        $this->assertEquals(
            'Tue Jan 01 2019 10:00:00 +1000 (Australia/Brisbane)',
            DateTime::fromTimestamp(1546300800, 'Australia/Brisbane')->toString()
        );
    }

    public function testDateTimeFromTimestampWithLocale(): void
    {
        $this->assertEquals(
            'الثلاثاء يناير ٠١ ٢٠١٩ ٠٠:٠٠:٠٠ +0000 (UTC)',
            DateTime::fromTimestamp(1546300800, null, 'ar-eg')->toString()
        );
    }

    public function testDateTimeFromTimestampInstanceOf(): void
    {
        $this->assertInstanceOf(
            DateTime::class,
            DateTime::fromTimestamp(1546300800)
        );
    }

    /**
     * #now
     */

    public function testDateTimeNow(): void
    {
        $start = time();
        $now = DateTime::now()->getTimestamp();
        $end = time();
        $this->assertTrue(
            $start <= $now && $end >= $now
        );
    }

    public function testDateTimeNowWithTimeZone(): void
    {
        $this->assertEquals(
            'Australia/Brisbane',
            DateTime::now('Australia/Brisbane')->getTimeZone()
        );
    }

    public function testDateTimeNowWithLocale(): void
    {
        $this->assertEquals(
            'ar-eg',
            DateTime::now(null, 'ar-eg')->getLocale()
        );
    }

    public function testDateTimeNowInstanceOf(): void
    {
        $this->assertInstanceOf(
            DateTime::class,
            DateTime::now()
        );
    }

}
