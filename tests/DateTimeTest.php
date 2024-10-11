<?php
declare(strict_types=1);

namespace Tests;

use Fyre\DateTime\DateTime;
use PHPUnit\Framework\TestCase;

final class DateTimeTest extends TestCase
{
    use AttributesGetTestTrait;
    use AttributesSetTestTrait;
    use ComparisonsTestTrait;
    use CreateTestTrait;
    use DiffTestTrait;
    use FormatLocaleTestTrait;
    use FormatTestTrait;
    use FromFormatLocaleTestTrait;
    use FromFormatTestTrait;
    use ManipulateTestTrait;
    use OutputTestTrait;
    use TransitionTestTrait;
    use UtilityTestTrait;
    use VarsTestTrait;

    public function testSetDefaultLocaleCallback(): void
    {
        DateTime::setDefaultLocale(fn(): string => 'ru');

        $this->assertSame(
            'ru',
            DateTime::now()->getLocale()
        );
    }

    public function testSetDefaultTimeZoneCallback(): void
    {
        DateTime::setDefaultTimeZone(fn(): string => '+10:00');

        $this->assertSame(
            '+10:00',
            DateTime::now()->getTimeZone()
        );
    }

    protected function setUp(): void
    {
        DateTime::setDefaultLocale('en');
        DateTime::setDefaultTimeZone('UTC');
    }
}
