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

    protected function setUp(): void
    {
        DateTime::setDefaultLocale('en');
        DateTime::setDefaultTimeZone('UTC');
    }
}
