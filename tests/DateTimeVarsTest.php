<?php
declare(strict_types=1);

namespace Tests;

use
    Fyre\DateTime;

trait DateTimeVarsTest
{

    public function testDateTimeFormatsAtom(): void
    {
        $this->assertEquals(
            '2020-01-01T00:00:00+00:00',
            DateTime::fromArray([2020])->format(DateTime::FORMATS['atom'])
        );
    }

    public function testDateTimeFormatsCookie(): void
    {
        $this->assertEquals(
            'Wednesday, 01-Jan-2020 00:00:00 GMT',
            DateTime::fromArray([2020])->format(DateTime::FORMATS['cookie'])
        );
    }

    public function testDateTimeFormatsDate(): void
    {
        $this->assertEquals(
            'Wed Jan 01 2020',
            DateTime::fromArray([2020])->format(DateTime::FORMATS['date'])
        );
    }

    public function testDateTimeFormatsIso8601(): void
    {
        $this->assertEquals(
            '2020-01-01T00:00:00+0000',
            DateTime::fromArray([2020])->format(DateTime::FORMATS['iso8601'])
        );
    }

    public function testDateTimeFormatsRfc822(): void
    {
        $this->assertEquals(
            'Wed, 01 Jan 20 00:00:00 +0000',
            DateTime::fromArray([2020])->format(DateTime::FORMATS['rfc822'])
        );
    }

    public function testDateTimeFormatsRfc850(): void
    {
        $this->assertEquals(
            'Wednesday 01-Jan-20 00:00:00 GMT',
            DateTime::fromArray([2020])->format(DateTime::FORMATS['rfc850'])
        );
    }

    public function testDateTimeFormatsRfc1036(): void
    {
        $this->assertEquals(
            'Wed, 01 Jan 20 00:00:00 +0000',
            DateTime::fromArray([2020])->format(DateTime::FORMATS['rfc1036'])
        );
    }

    public function testDateTimeFormatsRfc1123(): void
    {
        $this->assertEquals(
            'Wed, 01 Jan 2020 00:00:00 +0000',
            DateTime::fromArray([2020])->format(DateTime::FORMATS['rfc1123'])
        );
    }

    public function testDateTimeFormatsRfc2822(): void
    {
        $this->assertEquals(
            'Wed, 01 Jan 2020 00:00:00 +0000',
            DateTime::fromArray([2020])->format(DateTime::FORMATS['rfc2822'])
        );
    }

    public function testDateTimeFormatsRfc3339(): void
    {
        $this->assertEquals(
            '2020-01-01T00:00:00+00:00',
            DateTime::fromArray([2020])->format(DateTime::FORMATS['rfc3339'])
        );
    }

    public function testDateTimeFormatsRfc3339Extended(): void
    {
        $this->assertEquals(
            '2020-01-01T00:00:00.000+00:00',
            DateTime::fromArray([2020])->format(DateTime::FORMATS['rfc3339_extended'])
        );
    }

    public function testDateTimeFormatsRss(): void
    {
        $this->assertEquals(
            'Wed, 01 Jan 2020 00:00:00 +0000',
            DateTime::fromArray([2020])->format(DateTime::FORMATS['rss'])
        );
    }

    public function testDateTimeFormatsString(): void
    {
        $this->assertEquals(
            'Wed Jan 01 2020 00:00:00 +0000 (UTC)',
            DateTime::fromArray([2020])->format(DateTime::FORMATS['string'])
        );
    }

    public function testDateTimeFormatsTime(): void
    {
        $this->assertEquals(
            '00:00:00 +0000 (UTC)',
            DateTime::fromArray([2020])->format(DateTime::FORMATS['time'])
        );
    }

    public function testDateTimeFormatsW3c(): void
    {
        $this->assertEquals(
            '2020-01-01T00:00:00+00:00',
            DateTime::fromArray([2020])->format(DateTime::FORMATS['w3c'])
        );
    }

}
