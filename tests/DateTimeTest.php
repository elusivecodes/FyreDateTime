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
    use FormatTestTrait;
    use FormatLocaleTestTrait;
    use FromFormatTestTrait;
    use FromFormatLocaleTestTrait;
    use ManipulateTestTrait;
    use OutputTestTrait;
    use TransitionTestTrait;
    use UtilityTestTrait;
    use VarsTestTrait;

    public static function setUpBeforeClass(): void
    {
        DateTime::setDefaultLocale('en');
        DateTime::setDefaultTimeZone('UTC');
    }
    
}
