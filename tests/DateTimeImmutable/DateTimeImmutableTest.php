<?php
declare(strict_types=1);

namespace Tests\DateTimeImmutable;

use
    Fyre\DateTime\DateTimeImmutable,
    PHPUnit\Framework\TestCase;

final class DateTimeImmutableTest extends TestCase
{

    public static function setUpBeforeClass(): void
    {
        DateTimeImmutable::setDefaultLocale('en');
        DateTimeImmutable::setDefaultTimeZone('UTC');
    }

    use
        AttributesGetTest,
        AttributesSetTest,
        ComparisonsTest,
        CreateTest,
        FormatTest,
        FromFormatTest,
        ManipulateTest,
        OutputTest,
        UtilityTest,
        VarsTest;

}
