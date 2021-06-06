<?php
declare(strict_types=1);

namespace Fyre\DateTime\Traits;

use
    IntlDateFormatter;

/**
 * OutputTrait
 */
trait OutputTrait
{

    /**
     * Format the current date using "eee MMM dd yyyy HH:mm:ss xx (VV)".
     * @return string The formatted date string.
     */
    public function __toString(): string
    {
        return $this->toString();
    }

    /**
     * Format the current date using a format string.
     * @param string $formatString The format string.
     * @return string The formatted date string.
     */
    public function format(string $formatString, string|null $locale = null): string
    {
        return IntlDateFormatter::formatObject($this->calendar, $formatString, $locale ?? $this->locale);
    }

    /**
     * Format the current date using "eee MMM dd yyyy".
     * @return string The formatted date string.
     */
    public function toDateString(): string
    {
        return $this->format(static::FORMATS['date']);
    }

    /**
     * Format the current date using "yyyy-MM-dd'THH:mm:ss.SSSSSSxxx".
     * @return string The formatted date string.
     */
    public function toISOString(): string
    {
        return $this->clone()
            ->setLocale('en')
            ->setTimeZone('UTC')
            ->format(static::FORMATS['rfc3339_extended']);
    }

    /**
     * Format the current date using "eee MMM dd yyyy HH:mm:ss xx (VV)".
     * @return string The formatted date string.
     */
    public function toString(): string
    {
        return $this->format(static::FORMATS['string']);
    }

    /**
     * Format the current date using "HH:mm:ss xx (VV)".
     * @return string The formatted date string.
     */
    public function toTimeString(): string
    {
        return $this->format(static::FORMATS['time']);
    }

    /**
     * Format the current date in UTC timeZone using "eee MMM dd yyyy HH:mm:ss xx (VV)".
     * @return string The formatted date string.
     */
    public function toUTCString(): string
    {
        return $this->clone()
            ->setTimeZone('UTC')
            ->toString();
    }

}
