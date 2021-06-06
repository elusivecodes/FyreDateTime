<?php
declare(strict_types=1);

namespace Tests;

use
    Fyre\DateTimeImmutable;

trait DateTimeImmutableOutputTest
{

    public function testDateTimeImmutableToDateString(): void
    {
        $this->assertEquals(
            'Mon Jan 01 2018',
            DateTimeImmutable::fromArray([2018])->toDateString()
        );
    }

    public function testDateTimeImmutableToTimeString(): void
    {
        $this->assertEquals(
            '00:00:00 +0000 (UTC)',
            DateTimeImmutable::fromArray([2018])->toTimeString()
        );
    }

    public function testDateTimeImmutableToIsoString(): void
    {
        $this->assertEquals(
            '2017-12-31T14:00:00.000+00:00',
            DateTimeImmutable::fromArray([2018], 'Australia/Brisbane')->toISOString()
        );
    }

    public function testDateTimeImmutableToString(): void
    {
        $this->assertEquals(
            'Mon Jan 01 2018 00:00:00 +1000 (Australia/Brisbane)',
            DateTimeImmutable::fromArray([2018], 'Australia/Brisbane')->toString()
        );
    }

    public function testDateTimeImmutableToUtcString(): void
    {
        $this->assertEquals(
            'Sun Dec 31 2017 14:00:00 +0000 (UTC)',
            DateTimeImmutable::fromArray([2018], 'Australia/Brisbane')->toUTCString()
        );
    }

    public function testDateTimeImmutableAsString(): void
    {
        $this->assertEquals(
            'Mon Jan 01 2018 00:00:00 +1000 (Australia/Brisbane)',
            ''.DateTimeImmutable::fromArray([2018], 'Australia/Brisbane')
        );
    }

}
