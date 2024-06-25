<?php
declare(strict_types=1);

namespace Fyre\DateTime;

use DateTimeImmutable;
use Fyre\DateTime\Traits\AttributesGetTrait;
use Fyre\DateTime\Traits\AttributesSetTrait;
use Fyre\DateTime\Traits\ComparisonsTrait;
use Fyre\DateTime\Traits\CreateTrait;
use Fyre\DateTime\Traits\ManipulateTrait;
use Fyre\DateTime\Traits\OutputTrait;
use Fyre\DateTime\Traits\StaticTrait;
use Fyre\DateTime\Traits\UtilityTrait;
use IntlCalendar;

/**
 * DateTime
 */
class DateTime
{
    use AttributesGetTrait;
    use AttributesSetTrait;
    use ComparisonsTrait;
    use CreateTrait;
    use ManipulateTrait;
    use OutputTrait;
    use StaticTrait;
    use UtilityTrait;

    public const FORMATS = [
        'atom' => 'yyyy-MM-dd\'T\'HH:mm:ssxxx',
        'cookie' => 'eeee, dd-MMM-yyyy HH:mm:ss ZZZZ',
        'date' => 'eee MMM dd yyyy',
        'iso8601' => 'yyyy-MM-dd\'T\'HH:mm:ssxx',
        'rfc822' => 'eee, dd MMM yy HH:mm:ss xx',
        'rfc850' => 'eeee dd-MMM-yy HH:mm:ss ZZZZ',
        'rfc1036' => 'eee, dd MMM yy HH:mm:ss xx',
        'rfc1123' => 'eee, dd MMM yyyy HH:mm:ss xx',
        'rfc2822' => 'eee, dd MMM yyyy HH:mm:ss xx',
        'rfc3339' => 'yyyy-MM-dd\'T\'HH:mm:ssxxx',
        'rfc3339_extended' => 'yyyy-MM-dd\'T\'HH:mm:ss.SSSxxx',
        'rss' => 'eee, dd MMM yyyy HH:mm:ss xx',
        'string' => 'eee MMM dd yyyy HH:mm:ss xx (VV)',
        'time' => 'HH:mm:ss xx (VV)',
        'w3c' => 'yyyy-MM-dd\'T\'HH:mm:ssxxx',
    ];

    protected static bool $clampDates = true;

    protected static string|null $defaultLocale = null;

    protected static string|null $defaultTimeZone = null;

    protected IntlCalendar $calendar;

    protected string $locale;

    /**
     * New DateTime constructor.
     *
     * @param string|null $timeZone The timeZone to use.
     * @param string|null $locale The locale to use.
     * @param string|null $dateString The date to parse.
     */
    public function __construct(string|null $time = null, string|null $timeZone = null, string|null $locale = null)
    {
        $this->locale = static::parseLocale($locale);

        $timeZone = static::parseTimeZone($timeZone);
        $dateTime = new DateTimeImmutable($time ?? 'now', $timeZone);
        $timestamp = $dateTime->getTimestamp();

        $this->calendar = static::createCalendar($timestamp * 1000, $timeZone, $this->locale);
    }
}
