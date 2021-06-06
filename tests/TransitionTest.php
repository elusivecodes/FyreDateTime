<?php
declare(strict_types=1);

namespace Tests;

use
    Fyre\DateTime,
    Fyre\DateTimeImmutable;

trait TransitionTest
{

    public function testNonDstPostTransition(): void
    {
        $date = DateTime::fromFormat('dd/MM/yyyy HH:mm:ss ZZZZZ', '07/04/2019 03:01:00 +10:00');
        $date->setTimeZone('Australia/Sydney');
        $this->assertEquals(
            'Sun Apr 07 2019 03:01:00 +1000 (Australia/Sydney)',
            $date->toString()
        );
    }

    public function testNonDstPostTransitionArray(): void
    {
        $date = DateTime::fromArray([2019, 4, 7, 3, 1, 0, 0], '+10:00');
        $date->setTimeZone('Australia/Sydney');
        $this->assertEquals(
            'Sun Apr 07 2019 03:01:00 +1000 (Australia/Sydney)',
            $date->toString()
        );
    }

    public function testNonDstPreTransition(): void
    {
        $date = DateTime::fromFormat('dd/MM/yyyy HH:mm:ss ZZZZZ', '07/04/2019 02:01:00 +10:00');
        $date->setTimeZone('Australia/Sydney');
        $this->assertEquals(
            'Sun Apr 07 2019 02:01:00 +1000 (Australia/Sydney)',
            $date->toString()
        );
    }

    public function testNonDstPreTransitionArray(): void
    {
        $date = DateTime::fromArray([2019, 4, 7, 2, 1, 0, 0], '+10:00');
        $date->setTimeZone('Australia/Sydney');
        $this->assertEquals(
            'Sun Apr 07 2019 02:01:00 +1000 (Australia/Sydney)',
            $date->toString()
        );
    }

    public function testDstPreTransition(): void
    {
        $date = DateTime::fromFormat('dd/MM/yyyy HH:mm:ss ZZZZZ', '07/04/2019 02:01:00 +11:00');
        $date->setTimeZone('Australia/Sydney');
        $this->assertEquals(
            'Sun Apr 07 2019 02:01:00 +1100 (Australia/Sydney)',
            $date->toString()
        );
    }

    public function testDstPreTransitionArray(): void
    {
        $date = DateTime::fromArray([2019, 4, 7, 2, 1, 0, 0], '+11:00');
        $date->setTimeZone('Australia/Sydney');
        $this->assertEquals(
            'Sun Apr 07 2019 02:01:00 +1100 (Australia/Sydney)',
            $date->toString()
        );
    }

    public function testDstPostTransition(): void
    {
        $date = DateTime::fromFormat('dd/MM/yyyy HH:mm:ss ZZZZZ', '07/04/2019 03:01:00 +11:00');
        $date->setTimeZone('Australia/Sydney');
        $this->assertEquals(
            'Sun Apr 07 2019 02:01:00 +1000 (Australia/Sydney)',
            $date->toString()
        );
    }

    public function testDstPostTransitionArray(): void
    {
        $date = DateTime::fromArray([2019, 4, 7, 3, 1, 0, 0], '+11:00');
        $date->setTimeZone('Australia/Sydney');
        $this->assertEquals(
            'Sun Apr 07 2019 02:01:00 +1000 (Australia/Sydney)',
            $date->toString()
        );
    }

    public function testDateTimeDstTransition(): void
    {
        $date = DateTime::fromFormat('dd/MM/yyyy HH:mm:ss ZZZZZ', '07/04/2019 02:01:00 +11:00');
        $date->setTimeZone('Australia/Sydney');
        $date->add(1, 'hour');
        $this->assertEquals(
            'Sun Apr 07 2019 02:01:00 +1000 (Australia/Sydney)',
            $date->toString()
        );
    }

    public function testDateTimeImmutableDstTransition(): void
    {
        $date = DateTimeImmutable::fromFormat('dd/MM/yyyy HH:mm:ss ZZZZZ', '07/04/2019 02:01:00 +11:00');
        $date = $date->setTimeZone('Australia/Sydney');
        $date = $date->add(1, 'hour');
        $this->assertEquals(
            'Sun Apr 07 2019 02:01:00 +1000 (Australia/Sydney)',
            $date->toString()
        );
    }

}
