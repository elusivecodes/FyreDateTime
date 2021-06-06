<?php
declare(strict_types=1);

namespace Tests;

use
    Fyre\DateTimeImmutable;

use function
    time;

trait DateTimeImmutableCreateTest
{

    /**
     * #__construct
     */

    public function testDateTimeImmutableConstructor(): void
    {
        $start = time();
        $now = (new DateTimeImmutable())->getTimestamp();
        $end = time();
        $this->assertTrue(
            $start <= $now && $end >= $now
        );
    }

    public function testDateTimeImmutableConstructorDateTimeImmutable(): void
    {
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            (new DateTimeImmutable('January 1, 2019 00:00:00'))->toISOString()
        );
    }

    public function testDateTimeImmutableConstructorIso(): void
    {
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            (new DateTimeImmutable('2019-01-01T00:00:00'))->toISOString()
        );
    }

    public function testDateTimeImmutableConstructorDate(): void
    {
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            (new DateTimeImmutable('January 1, 2019'))->toISOString()
        );
    }

    public function testDateTimeImmutableConstructorWithTimeZone(): void
    {
        $this->assertEquals(
            '2018-12-31T14:00:00.000+00:00',
            (new DateTimeImmutable('January 1, 2019 00:00:00', 'Australia/Brisbane'))->toISOString()
        );
    }

    public function testDateTimeImmutableConstructorWithTimeZoneFromOffset(): void
    {
        $this->assertEquals(
            '2018-12-31T14:00:00.000+00:00',
            (new DateTimeImmutable('January 1, 2019 00:00:00', '+10:00'))->toISOString()
        );
    }

    public function testDateTimeImmutableConstructorWithTimeZoneFromOffsetWithoutColon(): void
    {
        $this->assertEquals(
            '2018-12-31T14:00:00.000+00:00',
            (new DateTimeImmutable('January 1, 2019 00:00:00', '+1000'))->toISOString()
        );
    }

    public function testDateTimeImmutableConstructorWithLocale(): void
    {
        $this->assertEquals(
            'الثلاثاء يناير ٠١ ٢٠١٩ ٠٠:٠٠:٠٠ +0000 (UTC)',
            (new DateTimeImmutable('January 1, 2019 00:00:00', null, 'ar-eg'))->toString()
        );
    }

    /**
     * #fromArray
     */

    public function testDateTimeImmutableFromArray(): void
    {
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            DateTimeImmutable::fromArray([2019])->toISOString()
        );
    }

    public function testDateTimeImmutableFromArrayMonth(): void
    {
        $this->assertEquals(
            '2019-02-01T00:00:00.000+00:00',
            DateTimeImmutable::fromArray([2019, 2])->toISOString()
        );
    }

    public function testDateTimeImmutableFromArrayDate(): void
    {
        $this->assertEquals(
            '2019-01-02T00:00:00.000+00:00',
            DateTimeImmutable::fromArray([2019, 1, 2])->toISOString()
        );
    }

    public function testDateTimeImmutableFromArrayHour(): void
    {
        $this->assertEquals(
            '2019-01-01T01:00:00.000+00:00',
            DateTimeImmutable::fromArray([2019, 1, 1, 1])->toISOString()
        );
    }

    public function testDateTimeImmutableFromArrayMinute(): void
    {
        $this->assertEquals(
            '2019-01-01T00:01:00.000+00:00',
            DateTimeImmutable::fromArray([2019, 1, 1, 0, 1])->toISOString()
        );
    }

    public function testDateTimeImmutableFromArraySecond(): void
    {
        $this->assertEquals(
            '2019-01-01T00:00:01.000+00:00',
            DateTimeImmutable::fromArray([2019, 1, 1, 0, 0, 1])->toISOString()
        );
    }

    public function testDateTimeImmutableFromArrayMillisecond(): void
    {
        $this->assertEquals(
            '2019-01-01T00:00:00.001+00:00',
            DateTimeImmutable::fromArray([2019, 1, 1, 0, 0, 0, 1])->toISOString()
        );
    }

    public function testDateTimeImmutableFromArrayWithTimeZone(): void
    {
        $this->assertEquals(
            'Tue Jan 01 2019 00:00:00 +1000 (Australia/Brisbane)',
            DateTimeImmutable::fromArray([2019, 1, 1, 0, 0, 0], 'Australia/Brisbane')->toString()
        );
    }

    public function testDateTimeImmutableFromArrayWithLocale(): void
    {
        $this->assertEquals(
            'الثلاثاء يناير ٠١ ٢٠١٩ ٠٠:٠٠:٠٠ +0000 (UTC)',
            DateTimeImmutable::fromArray([2019, 1, 1, 0, 0, 0], null, 'ar-eg')->toString()
        );
    }

    public function testDateTimeImmutableFromArrayInstanceOf(): void
    {
        $this->assertInstanceOf(
            DateTimeImmutable::class,
            DateTimeImmutable::fromArray([2018])
        );
    }

    /**
     * #fromDateTime
     */

    public function testDateTimeImmutableFromDateTime(): void
    {
        $date = new \DateTimeImmutable('@1546300800');
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            DateTimeImmutable::fromDateTime($date)->toISOString()
        );
    }

    public function testDateTimeImmutableFromDateTimeWithTimeZone(): void
    {
        $date = new \DateTimeImmutable('@1546300800');
        $this->assertEquals(
            'Tue Jan 01 2019 10:00:00 +1000 (Australia/Brisbane)',
            DateTimeImmutable::fromDateTime($date, 'Australia/Brisbane')->toString()
        );
    }

    public function testDateTimeImmutableFromDateTimeWithLocale(): void
    {
        $date = new \DateTimeImmutable('@1546300800');
        $this->assertEquals(
            'الثلاثاء يناير ٠١ ٢٠١٩ ٠٠:٠٠:٠٠ +0000 (GMT)',
            DateTimeImmutable::fromDateTime($date, null, 'ar-eg')->toString()
        );
    }

    public function testDateTimeImmutableFromDateTimeInstanceOf(): void
    {
        $date = new \DateTimeImmutable('@1546300800');
        $this->assertInstanceOf(
            DateTimeImmutable::class,
            DateTimeImmutable::fromDateTime($date)
        );
    }

    /**
     * #fromISOString
     */

    public function testDateTimeImmutableFromIsoString(): void
    {
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            DateTimeImmutable::fromISOString('2019-01-01T00:00:00.000+00:00')->toISOString()
        );
    }

    public function testDateTimeImmutableFromIsoStringWithTimeZone(): void
    {
        $this->assertEquals(
            'Tue Jan 01 2019 10:00:00 +1000 (Australia/Brisbane)',
            DateTimeImmutable::fromISOString('2019-01-01T00:00:00.000+00:00', 'Australia/Brisbane')->toString()
        );
    }

    public function testDateTimeImmutableFromIsoStringWithLocale(): void
    {
        $this->assertEquals(
            'الثلاثاء يناير ٠١ ٢٠١٩ ٠٠:٠٠:٠٠ +0000 (UTC)',
            DateTimeImmutable::fromISOString('2019-01-01T00:00:00.000+00:00', null, 'ar-eg')->toString()
        );
    }

    public function testDateTimeImmutableFromIsoStringInstanceOf(): void
    {
        $this->assertInstanceOf(
            DateTimeImmutable::class,
            DateTimeImmutable::fromISOString('2019-01-01T00:00:00.000+00:00')
        );
    }

    /**
     * #fromTimestamp
     */

    public function testDateTimeImmutableFromTimestamp(): void
    {
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            DateTimeImmutable::fromTimestamp(1546300800)->toISOString()
        );
    }

    public function testDateTimeImmutableFromTimestampWithTimeZone(): void
    {
        $this->assertEquals(
            'Tue Jan 01 2019 10:00:00 +1000 (Australia/Brisbane)',
            DateTimeImmutable::fromTimestamp(1546300800, 'Australia/Brisbane')->toString()
        );
    }

    public function testDateTimeImmutableFromTimestampWithLocale(): void
    {
        $this->assertEquals(
            'الثلاثاء يناير ٠١ ٢٠١٩ ٠٠:٠٠:٠٠ +0000 (UTC)',
            DateTimeImmutable::fromTimestamp(1546300800, null, 'ar-eg')->toString()
        );
    }

    public function testDateTimeImmutableFromTimestampInstanceOf(): void
    {
        $this->assertInstanceOf(
            DateTimeImmutable::class,
            DateTimeImmutable::fromTimestamp(1546300800)
        );
    }

    /**
     * #now
     */

    public function testDateTimeImmutableNow(): void
    {
        $start = time();
        $now = DateTimeImmutable::now()->getTimestamp();
        $end = time();
        $this->assertTrue(
            $start <= $now && $end >= $now
        );
    }

    public function testDateTimeImmutableNowWithTimeZone(): void
    {
        $this->assertEquals(
            'Australia/Brisbane',
            DateTimeImmutable::now('Australia/Brisbane')->getTimeZone()
        );
    }

    public function testDateTimeImmutableNowWithLocale(): void
    {
        $this->assertEquals(
            'ar-eg',
            DateTimeImmutable::now(null, 'ar-eg')->getLocale()
        );
    }

    public function testDateTimeImmutableNowInstanceOf(): void
    {
        $this->assertInstanceOf(
            DateTimeImmutable::class,
            DateTimeImmutable::now()
        );
    }

}
