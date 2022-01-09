<?php
declare(strict_types=1);

namespace Tests\DateTime;

use
    Fyre\DateTime\DateTime;

use function
    time;

trait CreateTest
{

    /**
     * #__construct
     */

    public function testConstructor(): void
    {
        $start = time();
        $now = (new DateTime())->getTimestamp();
        $end = time();

        $this->assertGreaterThanOrEqual(
            $start,
            $now
        );

        $this->assertLessThanOrEqual(
            $end,
            $now
        );
    }

    public function testConstructorDateTime(): void
    {
        $this->assertSame(
            '2019-01-01T00:00:00.000+00:00',
            (new DateTime('January 1, 2019 00:00:00'))->toISOString()
        );
    }

    public function testConstructorIso(): void
    {
        $this->assertSame(
            '2019-01-01T00:00:00.000+00:00',
            (new DateTime('2019-01-01T00:00:00'))->toISOString()
        );
    }

    public function testConstructorDate(): void
    {
        $this->assertSame(
            '2019-01-01T00:00:00.000+00:00',
            (new DateTime('January 1, 2019'))->toISOString()
        );
    }

    public function testConstructorWithTimeZone(): void
    {
        $this->assertSame(
            '2018-12-31T14:00:00.000+00:00',
            (new DateTime('January 1, 2019 00:00:00', 'Australia/Brisbane'))->toISOString()
        );
    }

    public function testConstructorWithTimeZoneFromOffset(): void
    {
        $this->assertSame(
            '2018-12-31T14:00:00.000+00:00',
            (new DateTime('January 1, 2019 00:00:00', '+10:00'))->toISOString()
        );
    }

    public function testConstructorWithTimeZoneFromOffsetWithoutColon(): void
    {
        $this->assertSame(
            '2018-12-31T14:00:00.000+00:00',
            (new DateTime('January 1, 2019 00:00:00', '+1000'))->toISOString()
        );
    }

    public function testConstructorWithLocale(): void
    {
        $this->assertSame(
            'الثلاثاء يناير ٠١ ٢٠١٩ ٠٠:٠٠:٠٠ +0000 (UTC)',
            (new DateTime('January 1, 2019 00:00:00', null, 'ar-eg'))->toString()
        );
    }

    /**
     * #fromArray
     */

    public function testFromArray(): void
    {
        $this->assertSame(
            '2019-01-01T00:00:00.000+00:00',
            DateTime::fromArray([2019])->toISOString()
        );
    }

    public function testFromArrayMonth(): void
    {
        $this->assertSame(
            '2019-02-01T00:00:00.000+00:00',
            DateTime::fromArray([2019, 2])->toISOString()
        );
    }

    public function testFromArrayDate(): void
    {
        $this->assertSame(
            '2019-01-02T00:00:00.000+00:00',
            DateTime::fromArray([2019, 1, 2])->toISOString()
        );
    }

    public function testFromArrayHour(): void
    {
        $this->assertSame(
            '2019-01-01T01:00:00.000+00:00',
            DateTime::fromArray([2019, 1, 1, 1])->toISOString()
        );
    }

    public function testFromArrayMinute(): void
    {
        $this->assertSame(
            '2019-01-01T00:01:00.000+00:00',
            DateTime::fromArray([2019, 1, 1, 0, 1])->toISOString()
        );
    }

    public function testFromArraySecond(): void
    {
        $this->assertSame(
            '2019-01-01T00:00:01.000+00:00',
            DateTime::fromArray([2019, 1, 1, 0, 0, 1])->toISOString()
        );
    }

    public function testFromArrayMillisecond(): void
    {
        $this->assertSame(
            '2019-01-01T00:00:00.001+00:00',
            DateTime::fromArray([2019, 1, 1, 0, 0, 0, 1])->toISOString()
        );
    }

    public function testFromArrayWithTimeZone(): void
    {
        $this->assertSame(
            'Tue Jan 01 2019 00:00:00 +1000 (Australia/Brisbane)',
            DateTime::fromArray([2019, 1, 1, 0, 0, 0], 'Australia/Brisbane')->toString()
        );
    }

    public function testFromArrayWithLocale(): void
    {
        $this->assertSame(
            'الثلاثاء يناير ٠١ ٢٠١٩ ٠٠:٠٠:٠٠ +0000 (UTC)',
            DateTime::fromArray([2019, 1, 1, 0, 0, 0], null, 'ar-eg')->toString()
        );
    }

    public function testFromArrayInstanceOf(): void
    {
        $this->assertInstanceOf(
            DateTime::class,
            DateTime::fromArray([2018])
        );
    }

    /**
     * #fromDateTime
     */

    public function testFromDateTime(): void
    {
        $date = new \DateTime('@1546300800');
        $this->assertSame(
            '2019-01-01T00:00:00.000+00:00',
            DateTime::fromDateTime($date)->toISOString()
        );
    }

    public function testFromDateTimeWithTimeZone(): void
    {
        $date = new \DateTime('@1546300800');
        $this->assertSame(
            'Tue Jan 01 2019 10:00:00 +1000 (Australia/Brisbane)',
            DateTime::fromDateTime($date, 'Australia/Brisbane')->toString()
        );
    }

    public function testFromDateTimeWithLocale(): void
    {
        $date = new \DateTime('@1546300800');
        $this->assertSame(
            'الثلاثاء يناير ٠١ ٢٠١٩ ٠٠:٠٠:٠٠ +0000 (GMT)',
            DateTime::fromDateTime($date, null, 'ar-eg')->toString()
        );
    }

    public function testFromDateTimeInstanceOf(): void
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

    public function testFromIsoString(): void
    {
        $this->assertSame(
            '2019-01-01T00:00:00.000+00:00',
            DateTime::fromISOString('2019-01-01T00:00:00.000+00:00')->toISOString()
        );
    }

    public function testFromIsoStringWithTimeZone(): void
    {
        $this->assertSame(
            'Tue Jan 01 2019 10:00:00 +1000 (Australia/Brisbane)',
            DateTime::fromISOString('2019-01-01T00:00:00.000+00:00', 'Australia/Brisbane')->toString()
        );
    }

    public function testFromIsoStringWithLocale(): void
    {
        $this->assertSame(
            'الثلاثاء يناير ٠١ ٢٠١٩ ٠٠:٠٠:٠٠ +0000 (UTC)',
            DateTime::fromISOString('2019-01-01T00:00:00.000+00:00', null, 'ar-eg')->toString()
        );
    }

    public function testFromIsoStringInstanceOf(): void
    {
        $this->assertInstanceOf(
            DateTime::class,
            DateTime::fromISOString('2019-01-01T00:00:00.000+00:00')
        );
    }

    /**
     * #fromTimestamp
     */

    public function testFromTimestamp(): void
    {
        $this->assertSame(
            '2019-01-01T00:00:00.000+00:00',
            DateTime::fromTimestamp(1546300800)->toISOString()
        );
    }

    public function testFromTimestampWithTimeZone(): void
    {
        $this->assertSame(
            'Tue Jan 01 2019 10:00:00 +1000 (Australia/Brisbane)',
            DateTime::fromTimestamp(1546300800, 'Australia/Brisbane')->toString()
        );
    }

    public function testFromTimestampWithLocale(): void
    {
        $this->assertSame(
            'الثلاثاء يناير ٠١ ٢٠١٩ ٠٠:٠٠:٠٠ +0000 (UTC)',
            DateTime::fromTimestamp(1546300800, null, 'ar-eg')->toString()
        );
    }

    public function testFromTimestampInstanceOf(): void
    {
        $this->assertInstanceOf(
            DateTime::class,
            DateTime::fromTimestamp(1546300800)
        );
    }

    /**
     * #now
     */

    public function testNow(): void
    {
        $start = time();
        $now = DateTime::now()->getTimestamp();
        $end = time();

        $this->assertGreaterThanOrEqual(
            $start,
            $now
        );

        $this->assertLessThanOrEqual(
            $end,
            $now
        );
    }

    public function testNowWithTimeZone(): void
    {
        $this->assertSame(
            'Australia/Brisbane',
            DateTime::now('Australia/Brisbane')->getTimeZone()
        );
    }

    public function testNowWithLocale(): void
    {
        $this->assertSame(
            'ar-eg',
            DateTime::now(null, 'ar-eg')->getLocale()
        );
    }

    public function testNowInstanceOf(): void
    {
        $this->assertInstanceOf(
            DateTime::class,
            DateTime::now()
        );
    }

}
