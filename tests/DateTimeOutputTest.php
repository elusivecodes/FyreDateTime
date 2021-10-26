<?php
declare(strict_types=1);

namespace Tests;

use
    Fyre\DateTime\DateTime;

trait DateTimeOutputTest
{

    public function testDateTimeToDateString(): void
    {
        $this->assertEquals(
            'Mon Jan 01 2018',
            DateTime::fromArray([2018])->toDateString()
        );
    }

    public function testDateTimeToTimeString(): void
    {
        $this->assertEquals(
            '00:00:00 +0000 (UTC)',
            DateTime::fromArray([2018])->toTimeString()
        );
    }

    public function testDateTimeToIsoString(): void
    {
        $this->assertEquals(
            '2017-12-31T14:00:00.000+00:00',
            DateTime::fromArray([2018], 'Australia/Brisbane')->toISOString()
        );
    }

    public function testDateTimeToString(): void
    {
        $this->assertEquals(
            'Mon Jan 01 2018 00:00:00 +1000 (Australia/Brisbane)',
            DateTime::fromArray([2018], 'Australia/Brisbane')->toString()
        );
    }

    public function testDateTimeToUtcString(): void
    {
        $this->assertEquals(
            'Sun Dec 31 2017 14:00:00 +0000 (UTC)',
            DateTime::fromArray([2018], 'Australia/Brisbane')->toUTCString()
        );
    }

    public function testDateTimeAsString(): void
    {
        $this->assertEquals(
            'Mon Jan 01 2018 00:00:00 +1000 (Australia/Brisbane)',
            ''.DateTime::fromArray([2018], 'Australia/Brisbane')
        );
    }

}
