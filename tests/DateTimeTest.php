<?php
declare(strict_types=1);

namespace Tests;

use
    Fyre\DateTime,
    PHPUnit\Framework\TestCase;

final class DateTimeTest extends TestCase
{

    public static function setUpBeforeClass(): void
    {
        DateTime::setDefaultLocale('en');
        DateTime::setDefaultTimeZone('UTC');
    }

    use
        DateTimeAttributesGetTest,
        DateTimeAttributesSetTest,
        DateTimeComparisonsTest,
        DateTimeCreateTest,
        DateTimeDiffTest,
        DateTimeFormatLocaleTest,
        DateTimeFormatTest,
        DateTimeFromFormatLocaleTest,
        DateTimeFromFormatTest,
        DateTimeManipulateTest,
        DateTimeOutputTest,
        DateTimeUtilityTest,
        DateTimeVarsTest,
        DateTimeImmutableAttributesGetTest,
        DateTimeImmutableAttributesSetTest,
        DateTimeImmutableComparisonsTest,
        DateTimeImmutableCreateTest,
        DateTimeImmutableFormatTest,
        DateTimeImmutableFromFormatTest,
        DateTimeImmutableManipulateTest,
        DateTimeImmutableOutputTest,
        DateTimeImmutableUtilityTest,
        DateTimeImmutableVarsTest,
        TransitionTest;

}
