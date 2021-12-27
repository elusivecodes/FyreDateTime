<?php
declare(strict_types=1);

namespace Tests\DateTime;

use
    Fyre\DateTime\DateTime,
    PHPUnit\Framework\TestCase;

final class DateTimeTest extends TestCase
{

    use
        AttributesGetTest,
        AttributesSetTest,
        ComparisonsTest,
        CreateTest,
        DiffTest,
        FormatLocaleTest,
        FormatTest,
        FromFormatLocaleTest,
        FromFormatTest,
        ManipulateTest,
        OutputTest,
        UtilityTest,
        VarsTest;

    public static function setUpBeforeClass(): void
    {
        DateTime::setDefaultLocale('en');
        DateTime::setDefaultTimeZone('UTC');
    }
    
}
