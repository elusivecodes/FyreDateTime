<?php
declare(strict_types=1);

namespace Tests;

use Fyre\DateTime\DateTime;
use Fyre\Utility\Traits\MacroTrait;
use PHPUnit\Framework\TestCase;

use function class_uses;

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

    public function testMacroable(): void
    {
        $this->assertContains(
            MacroTrait::class,
            class_uses(DateTime::class)
        );
    }

    protected function setUp(): void
    {
        DateTime::setDefaultLocale('en');
        DateTime::setDefaultTimeZone('UTC');
    }
}
