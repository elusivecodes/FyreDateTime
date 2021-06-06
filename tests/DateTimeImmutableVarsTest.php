<?php
declare(strict_types=1);

namespace Tests;

use
    Fyre\DateTimeImmutable;

trait DateTimeImmutableVarsTest
{

    public function testDateTimeImmutableFormatsAtom(): void
    {
        $this->assertEquals(
            '2020-01-01T00:00:00+00:00',
            DateTimeImmutable::fromArray([2020])->format(DateTimeImmutable::FORMATS['atom'])
        );
    }

    public function testDateTimeImmutableFormatsCookie(): void
    {
        $this->assertEquals(
            'Wednesday, 01-Jan-2020 00:00:00 GMT',
            DateTimeImmutable::fromArray([2020])->format(DateTimeImmutable::FORMATS['cookie'])
        );
    }

    public function testDateTimeImmutableFormatsDate(): void
    {
        $this->assertEquals(
            'Wed Jan 01 2020',
            DateTimeImmutable::fromArray([2020])->format(DateTimeImmutable::FORMATS['date'])
        );
    }

    public function testDateTimeImmutableFormatsIso8601(): void
    {
        $this->assertEquals(
            '2020-01-01T00:00:00+0000',
            DateTimeImmutable::fromArray([2020])->format(DateTimeImmutable::FORMATS['iso8601'])
        );
    }

    public function testDateTimeImmutableFormatsRfc822(): void
    {
        $this->assertEquals(
            'Wed, 01 Jan 20 00:00:00 +0000',
            DateTimeImmutable::fromArray([2020])->format(DateTimeImmutable::FORMATS['rfc822'])
        );
    }

    public function testDateTimeImmutableFormatsRfc850(): void
    {
        $this->assertEquals(
            'Wednesday 01-Jan-20 00:00:00 GMT',
            DateTimeImmutable::fromArray([2020])->format(DateTimeImmutable::FORMATS['rfc850'])
        );
    }

    public function testDateTimeImmutableFormatsRfc1036(): void
    {
        $this->assertEquals(
            'Wed, 01 Jan 20 00:00:00 +0000',
            DateTimeImmutable::fromArray([2020])->format(DateTimeImmutable::FORMATS['rfc1036'])
        );
    }

    public function testDateTimeImmutableFormatsRfc1123(): void
    {
        $this->assertEquals(
            'Wed, 01 Jan 2020 00:00:00 +0000',
            DateTimeImmutable::fromArray([2020])->format(DateTimeImmutable::FORMATS['rfc1123'])
        );
    }

    public function testDateTimeImmutableFormatsRfc2822(): void
    {
        $this->assertEquals(
            'Wed, 01 Jan 2020 00:00:00 +0000',
            DateTimeImmutable::fromArray([2020])->format(DateTimeImmutable::FORMATS['rfc2822'])
        );
    }

    public function testDateTimeImmutableFormatsRfc3339(): void
    {
        $this->assertEquals(
            '2020-01-01T00:00:00+00:00',
            DateTimeImmutable::fromArray([2020])->format(DateTimeImmutable::FORMATS['rfc3339'])
        );
    }

    public function testDateTimeImmutableFormatsRfc3339Extended(): void
    {
        $this->assertEquals(
            '2020-01-01T00:00:00.000+00:00',
            DateTimeImmutable::fromArray([2020])->format(DateTimeImmutable::FORMATS['rfc3339_extended'])
        );
    }

    public function testDateTimeImmutableFormatsRss(): void
    {
        $this->assertEquals(
            'Wed, 01 Jan 2020 00:00:00 +0000',
            DateTimeImmutable::fromArray([2020])->format(DateTimeImmutable::FORMATS['rss'])
        );
    }

    public function testDateTimeImmutableFormatsString(): void
    {
        $this->assertEquals(
            'Wed Jan 01 2020 00:00:00 +0000 (UTC)',
            DateTimeImmutable::fromArray([2020])->format(DateTimeImmutable::FORMATS['string'])
        );
    }

    public function testDateTimeImmutableFormatsTime(): void
    {
        $this->assertEquals(
            '00:00:00 +0000 (UTC)',
            DateTimeImmutable::fromArray([2020])->format(DateTimeImmutable::FORMATS['time'])
        );
    }

    public function testDateTimeImmutableFormatsW3c(): void
    {
        $this->assertEquals(
            '2020-01-01T00:00:00+00:00',
            DateTimeImmutable::fromArray([2020])->format(DateTimeImmutable::FORMATS['w3c'])
        );
    }

}
