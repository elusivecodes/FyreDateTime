<?php
declare(strict_types=1);

namespace Tests;

use Fyre\DateTime\DateTime;

trait TransitionTestTrait
{

    public function testNonDstPostTransition(): void
    {
        $date1 = DateTime::fromFormat('dd/MM/yyyy HH:mm:ss ZZZZZ', '07/04/2019 03:01:00 +10:00');
        $date2 = $date1->setTimeZone('Australia/Sydney');

        $this->assertSame(
            'Sun Apr 07 2019 03:01:00 +1000 (Australia/Sydney)',
            $date2->toString()
        );
    }

    public function testNonDstPostTransitionArray(): void
    {
        $date1 = DateTime::fromArray([2019, 4, 7, 3, 1, 0, 0], '+10:00');
        $date2 = $date1->setTimeZone('Australia/Sydney');

        $this->assertSame(
            'Sun Apr 07 2019 03:01:00 +1000 (Australia/Sydney)',
            $date2->toString()
        );
    }

    public function testNonDstPreTransition(): void
    {
        $date1 = DateTime::fromFormat('dd/MM/yyyy HH:mm:ss ZZZZZ', '07/04/2019 02:01:00 +10:00');
        $date2 = $date1->setTimeZone('Australia/Sydney');

        $this->assertSame(
            'Sun Apr 07 2019 02:01:00 +1000 (Australia/Sydney)',
            $date2->toString()
        );
    }

    public function testNonDstPreTransitionArray(): void
    {
        $date1 = DateTime::fromArray([2019, 4, 7, 2, 1, 0, 0], '+10:00');
        $date2 = $date1->setTimeZone('Australia/Sydney');

        $this->assertSame(
            'Sun Apr 07 2019 02:01:00 +1000 (Australia/Sydney)',
            $date2->toString()
        );
    }

    public function testDstPreTransition(): void
    {
        $date1 = DateTime::fromFormat('dd/MM/yyyy HH:mm:ss ZZZZZ', '07/04/2019 02:01:00 +11:00');
        $date2 = $date1->setTimeZone('Australia/Sydney');

        $this->assertSame(
            'Sun Apr 07 2019 02:01:00 +1100 (Australia/Sydney)',
            $date2->toString()
        );
    }

    public function testDstPreTransitionArray(): void
    {
        $date1 = DateTime::fromArray([2019, 4, 7, 2, 1, 0, 0], '+11:00');
        $date2 = $date1->setTimeZone('Australia/Sydney');

        $this->assertSame(
            'Sun Apr 07 2019 02:01:00 +1100 (Australia/Sydney)',
            $date2->toString()
        );
    }

    public function testDstPostTransition(): void
    {
        $date1 = DateTime::fromFormat('dd/MM/yyyy HH:mm:ss ZZZZZ', '07/04/2019 03:01:00 +11:00');
        $date2 = $date1->setTimeZone('Australia/Sydney');

        $this->assertSame(
            'Sun Apr 07 2019 02:01:00 +1000 (Australia/Sydney)',
            $date2->toString()
        );
    }

    public function testDstPostTransitionArray(): void
    {
        $date1 = DateTime::fromArray([2019, 4, 7, 3, 1, 0, 0], '+11:00');
        $date2 = $date1->setTimeZone('Australia/Sydney');

        $this->assertSame(
            'Sun Apr 07 2019 02:01:00 +1000 (Australia/Sydney)',
            $date2->toString()
        );
    }

    public function testDstTransition(): void
    {
        $date1 = DateTime::fromFormat('dd/MM/yyyy HH:mm:ss ZZZZZ', '07/04/2019 02:01:00 +11:00');
        $date2 = $date1->setTimeZone('Australia/Sydney');
        $date3 = $date2->add(1, 'hour');

        $this->assertSame(
            'Sun Apr 07 2019 02:01:00 +1000 (Australia/Sydney)',
            $date3->toString()
        );
    }

}
