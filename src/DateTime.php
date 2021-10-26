<?php
declare(strict_types=1);

namespace Fyre\DateTime;

use
    DateTimeImmutable,
    Fyre\DateTime\Traits\AttributesGetTrait,
    Fyre\DateTime\Traits\AttributesSetTrait,
    Fyre\DateTime\Traits\CreateTrait,
    Fyre\DateTime\Traits\ManipulateTrait,
    Fyre\DateTime\Traits\OutputTrait,
    Fyre\DateTime\Traits\StaticTrait,
    Fyre\DateTime\Traits\UtilityTrait,
    IntlCalendar;

/**
 * DateTime
 */
class DateTime implements DateTimeInterface
{

    const FORMATS = [
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
        'w3c' => 'yyyy-MM-dd\'T\'HH:mm:ssxxx'
    ];

    protected static string|null $defaultLocale = null;

    protected static string|null $defaultTimeZone = null;

    protected static $clampDates = true;

    protected IntlCalendar $calendar;

    /**
     * New DateTime constructor.
     * @param string|null $dateString The date to parse.
     * @param string|null $timeZone The timeZone to use.
     * @param string|null $locale The locale to use.
     * @return DateTime A new DateTime object.
     */
    public function __construct(string|null $time = null, string|null $timeZone = null, string|null $locale = null)
    {
        $this->locale = static::parseLocale($locale);

        $timeZone = static::parseTimeZone($timeZone);
        $dateTime = new DateTimeImmutable($time ?? 'now', $timeZone);
        $timestamp = $dateTime->getTimestamp();

        $this->calendar = static::createCalendar($timestamp * 1000, $timeZone, $this->locale);
    }

    use
        AttributesGetTrait,
        AttributesSetTrait,
        CreateTrait,
        ManipulateTrait,
        OutputTrait,
        StaticTrait,
        UtilityTrait;

}
