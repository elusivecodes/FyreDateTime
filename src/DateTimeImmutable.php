<?php
declare(strict_types=1);

namespace Fyre\DateTime;

/**
 * DateTimeImmutable
 */
class DateTimeImmutable extends DateTime implements DateTimeInterface
{

    /**
     * Set the current locale.
     * @param string $locale The name of the timeZone.
     * @return DateTimeImmutable A new DateTimeImmutable object.
     */
    public function setLocale(string $locale): static
    {
        $dateTime = new static(null, $this->getTimeZone(), $locale);

        $time = $this->getTime();
        $dateTime->calendar->setTime($time);

        return $dateTime;
    }

    /**
     * Set the number of milliseconds since the UNIX epoch.
     * @param int $time The number of milliseconds since the UNIX epoch.
     * @return DateTimeImmutable A new DateTimeImmutable object.
     */
    public function setTime(int $time): static
    {
        $dateTime = new static(null, $this->getTimeZone(), $this->locale);

        $dateTime->calendar->setTime($time);

        return $dateTime;
    }

    /**
     * Set the current timeZone.
     * @param string $timeZone The name of the timeZone.
     * @return DateTimeImmutable A new DateTimeImmutable object.
     */
    public function setTimeZone(string $timeZone): static
    {
        $dateTime = new static(null, $timeZone, $this->locale);

        $time = $this->getTime();
        $dateTime->calendar->setTime($time);

        return $dateTime;
    }

    /**
     * Set calendar field values.
     * @param array $array The values to set.
     * @return DateTimeImmutable A new DateTimeImmutable object.
     */
    protected function setCalendarFields(array $values): static
    {
        $oldOffset = $this->getTimeZoneOffset();

        $dateTime = $this->clone();

        foreach ($values AS $field => $value) {
            if ($value === null) {
                continue;
            }

            $key = static::getField($field);
            $dateTime->calendar->set($key, $value);
        }

        $newOffset = $dateTime->getTimeZoneOffset();

        if ($oldOffset !== $newOffset) {
            $dateTime->calendar->setTime(
                $dateTime->calendar->getTime() + (($oldOffset - $newOffset) * 60000)
            );
        }

        return $dateTime;
    }

}
