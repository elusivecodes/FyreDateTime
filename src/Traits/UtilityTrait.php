<?php
declare(strict_types=1);

namespace Fyre\DateTime\Traits;

use Fyre\DateTime\DateTime;

use function strtolower;

/**
 * UtilityTrait
 */
trait UtilityTrait
{
    /**
     * Get the name of the day of the week in current timeZone.
     *
     * @param string $type The type of day name to return.
     * @return string|null The name of the day of the week.
     */
    public function dayName($type = 'long'): string|null
    {
        $type = strtolower($type);

        return match ($type) {
            'short' => $this->format('ccc'),
            'long' => $this->format('cccc'),
            'narrow' => $this->format('ccccc'),
            default => null
        };
    }

    /**
     * Get the day period in current timeZone.
     *
     * @param string $type The type of day period to return.
     * @return string|null The day period.
     */
    public function dayPeriod($type = 'long'): string|null
    {
        $type = strtolower($type);

        return match ($type) {
            'short' => $this->format('aaa'),
            'long' => $this->format('aaaa'),
            default => null
        };
    }

    /**
     * Get the number of days in the current month.
     *
     * @return int The number of days in the current month.
     */
    public function daysInMonth(): int
    {
        return (int) $this->toDateTime()->format('t');
    }

    /**
     * Get the number of days in the current year.
     *
     * @return int The number of days in the current year.
     */
    public function daysInYear(): int
    {
        return $this->isLeapYear() ? 366 : 365;
    }

    /**
     * Get the era in current timeZone.
     *
     * @param string $type The type of era to return.
     * @return string|null The era.
     */
    public function era($type = 'long'): string|null
    {
        $type = strtolower($type);

        return match ($type) {
            'short' => $this->format('GGG'),
            'long' => $this->format('GGGG'),
            'narrow' => $this->format('GGGGG'),
            default => null
        };
    }

    /**
     * Return true if the DateTime is in daylight savings.
     *
     * @return bool TRUE if the current time is in daylight savings, otherwise FALSE.
     */
    public function isDST(): bool
    {
        return (bool) $this->toDateTime()->format('I');
    }

    /**
     * Return true if the year is a leap year.
     *
     * @return bool TRUE if the current year is a leap year, otherwise FALSE.
     */
    public function isLeapYear(): bool
    {
        return (bool) $this->toDateTime()->format('L');
    }

    /**
     * Get the name of the month in current timeZone.
     *
     * @param string $type The type of month name to return.
     * @return string|null The name of the month.
     */
    public function monthName($type = 'long'): string|null
    {
        $type = strtolower($type);

        return match ($type) {
            'short' => $this->format('LLL'),
            'long' => $this->format('LLLL'),
            'narrow' => $this->format('LLLLL'),
            default => null
        };
    }

    /**
     * Get the name of the current timeZone.
     *
     * @param string $type The formatting type.
     * @return string|null The name of the time zone.
     */
    public function timeZoneName($type = 'full'): string|null
    {
        $type = strtolower($type);

        return match ($type) {
            'short' => $this->format('zzz'),
            'full' => $this->format('zzzz'),
            default => null
        };
    }

    /**
     * Convert the object to a native DateTime.
     *
     * @return \DateTime A native DateTime.
     */
    public function toDateTime(): \DateTime
    {
        return $this->calendar->toDateTime();
    }

    /**
     * Get the number of weeks in the current year.
     *
     * @return int The number of weeks in the current year.
     */
    public function weeksInYear(): int
    {
        $minimumDays = $this->calendar->getMinimalDaysInFirstWeek();

        return (new static())
            ->setYear($this->getWeekYear(), 12, 24 + $minimumDays)
            ->getWeek();
    }

    /**
     * Get the value for a calendar field.
     *
     * @param string $field The field to get.
     * @return int The field value.
     */
    protected function getCalendarField(string $field): int
    {
        $key = static::getField($field);

        return $this->calendar->get($key);
    }

    /**
     * Set calendar field values.
     *
     * @param bool $adjust Whether to adjust the current time fields.
     * @param array $array The values to set.
     * @return DateTime a new DateTime.
     */
    protected function setCalendarFields(array $values, bool $adjust = false): static
    {
        $oldTime = $this->getTime();

        $temp = new static(null, $this->getTimeZone(), $this->locale);
        $temp->calendar->setTime($oldTime);

        foreach ($values as $field => $value) {
            if ($value === null) {
                continue;
            }

            $key = static::getField($field);

            if ($adjust) {
                $temp->calendar->add($key, $value);
            } else {
                $temp->calendar->set($key, $value);
            }
        }

        return $temp;
    }
}
