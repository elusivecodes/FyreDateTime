# FyreDateTime

**FyreDateTime** is a free, open-source date manipulation library for *PHP*.

It is a modern library, and features support for ICU formats, time zones and locales.


## Table Of Contents
- [Installation](#installation)
- [Date Creation](#date-creation)
- [Date Formatting](#date-formatting)
- [Date Attributes](#date-attributes)
- [Week Attributes](#week-attributes)
- [Time Attributes](#time-attributes)
- [Timestamps](#timestamps)
- [Time Zones](#time-zones)
- [Locales](#locales)
- [Utility Methods](#utility-methods)
- [Static Methods](#static-methods)



## Installation

**Using Composer**

```
composer require fyre/datetime
```

In PHP:

```php
use Fyre\DateTime\DateTime;
use Fyre\DateTime\DateTimeImmutable;
```


## Date Creation

- `$dateString` is a string representing the date, and will default to the current timestamp.
- `$timeZone` is a string representing the time zone of the date, and will default to the system time zone.
- `$locale` is a string representing the locale of the date, and will default to the system locale.

```php
$date = new DateTime($dateString, $timeZone, $locale);
```

**Immutable DateTime**

By default, *DateTime* objects are mutable, but if you wish to create an immutable reference you can use the following syntax.

Immutable *DateTime* objects return a new *DateTimeImmutable* whenever they are modified.

```php
$date = new DateTimeImmutable($dateString, $timeZone, $locale);
```

**From Array**

- `$dateArray` is an array containing the year, month, date, hours, minutes, seconds and milliseconds.
- `$timeZone` is a string representing the time zone of the date, and will default to the system time zone.
- `$locale` is a string representing the locale of the date, and will default to the system locale.

```php
$date = DateTime::fromArray($dateArray, $timeZone, $locale);
```

The month and date in the `$dateArray` will default to 1 if not set. The hours, minutes, seconds and milliseconds will default to 0.

**From DateTime**

- `$dateTime` is an instance of a class implementing *DateTimeInterface*.
- `$timeZone` is a string representing the time zone of the date, and will default to the system time zone.
- `$locale` is a string representing the locale of the date, and will default to the system locale.

```php
$date = DateTime::fromDateTime($dateTime, $timeZone, $locale);
```

**From Format**

- `$formatString` is a string containing the format you wish to use for parsing.
- `$dateString` is a string representing the date you are parsing.
- `$timeZone` is a string representing the time zone of the date, and will default to the system time zone.
- `$locale` is a string representing the locale of the date, and will default to the system locale.

The `$formatString` supports tokens described in the [ICU specification](https://unicode-org.github.io/icu/userguide/format_parse/datetime/#datetime-format-syntax).

```php
$date = DateTime::fromFormat($formatString, $dateString, $timeZone, $locale);
```

**From ISO String**

- `$dateString` is a string representing the date you are parsing.
- `$timeZone` is a string representing the time zone of the date, and will default to the system time zone.
- `$locale` is a string representing the locale of the date, and will default to the system locale.

```php
$date = DateTime::fromISOString($dateString, $timeZone, $locale);
```

**From Timestamp**

- `$timestamp` is the number of seconds since the UNIX epoch.
- `$timeZone` is a string representing the time zone of the date, and will default to the system time zone.
- `$locale` is a string representing the locale of the date, and will default to the system locale.

```php
$date = DateTime::fromTimestamp($timestamp, $timeZone, $locale);
```

**Now**

- `$timeZone` is a string representing the time zone of the date, and will default to the system time zone.
- `$locale` is a string representing the locale of the date, and will default to the system locale.

```php
$date = DateTime::now($timeZone, $locale);
```


## Date Formatting

**Format**

Once you have created a *DateTime* object, you can get a string representation using a specific format with the `format` method.

- `$formatString` is a string containing the format you wish to output using.

The `$formatString` supports tokens described in the [ICU specification](https://unicode-org.github.io/icu/userguide/format_parse/datetime/#datetime-format-syntax).

```php
$dateString = $date->format($formatString);
```

**To String**

Format the current date using "*eee MMM dd yyyy HH:mm:ss xx (VV)*".

```php
$string = $date->toString();
```

**To Date String**

Format the current date using "*eee MMM dd yyyy*".

```php
$dateString = $date->toDateString();
```

**To ISO String**

Format the current date using "*yyyy-MM-dd'T'HH:mm:ss.SSSxxx*" (in English and UTC time zone).

```php
$isoString = $date->toISOString();
```

**To Time String**

Format the current date using "*HH:mm:ss xx (VV)*".

```php
$timeString = $date->toTimeString();
```

**To UTC String**

Format the current date using "*eee MMM dd yyyy HH:mm:ss xx (VV)*" (in UTC time zone).

```php
$utcString = $date->toUTCString();
```


## Date Attributes

**Get Date**

Get the date in current time zone.

```php
$date = $date->getDate();
```

**Get Day**

Get the day of the week in current time zone.

The `$day` returned will be between *0* (Sunday) and *6* (Saturday).

```php
$day = $date->getDay();
```

**Get Day Of Year**

Get the day of the year in current time zone.

The `$dayOfYear` returned will be between *0* and *365*.

```php
$dayOfYear = $date->getDayOfYear();
```

**Get Month**

Get the month in current time zone.

The `$month` returned will be between *1* (January) and *12* (December).

```php
$month = $date->getMonth();
```

**Get Quarter**

Get the quarter of the year in current time zone.

The `$quarter` returned will be between *1* and *4*.

```php
$quarter = $date->getQuarter();
```

**Get Year**

Get the year in current time zone.

```php
$year = $date->getYear();
```

**Set Date**

Set the date in current time zone.

- `$date` is a number representing the date.

```php
$date->setDate($date);
```

**Set Day**

Set the day of the week in current time zone.

- `$day` is a number representing the day of the week (between *0* and *6*).

```php
$date->setDay($day);
```

**Set Day Of Year**

Set the day of the year in current time zone.

- `$dayOfYear` is a number representing the day of the year (between *0* and *365*).

```php
$date->setDayOfYear($dayOfYear);
```

**Set Month**

Set the month in current time zone.

- `$month` is a number representing the month (between *1* and *12*).
- `$date` is a number representing the date, and will default to the current value.

If the `$date` argument is omitted, and the new month contains less days than the current date, the date will be set to the last day of the new month.

To disable date clamping, use the method `DateTime::setDateClamping()` using *false* as the argument.

```php
$date->setMonth($month, $date);
```

**Set Quarter**

Set the quarter of the year in current time zone.

- `$quarter` is a number representing the quarter between *1* and *4*.

```php
$date->setQuarter($quarter);
```

**Set Year**

Set the year in current time zone.

- `$year` is a number representing the year.
- `$month` is a number representing the month (between *1* and *12*), and will default to the current value.
- `$date` is a number representing the date, and will default to the current value.

If the `$date` argument is omitted, and the new month contains less days than the current date, the date will be set to the last day of the new month.

To disable date clamping, use the method `DateTime::setDateClamping()` using *false* as the argument.

```php
$date->setYear($year, $month, $date);
```


## Week Attributes

**Get Week**

Get the week of the year in current time zone.

The `$week` returned will be between *1*  and *53* (week starting on Monday).

```php
$week = $date->getWeek();
```

**Get Week Day**

Get the local day of the week in current time zone.

The `$weekDay` returned will be between *1* and *7*.

```php
$weekDay = $date->getWeekDay();
```

**Get Week Day In Month**

Get the day of the week in the month, in current time zone.

The `$weekDayInMonth` returned will be between *1* and *5*.

```php
$weekDayInMonth = $date->getWeekDayInMonth();
```

**Get Week Of Month**

Get the week of the month in current time zone.

The `$weekOfMonth` returned will be between *1*  and *5*.

```php
$weekOfMonth = $date->getWeekOfMonth();
```

**Get Week Year**

Get the week year in current time zone.

This method is identical to `getYear()` except in cases where the week belongs to the previous or next year, then that value will be used instead.

```php
$weekYear = $date->getWeekYear();
```

**Set Week**

Set the week in current time zone.

- `$week` is a number representing the week.
- `$weekDay` is a number representing the day (between *1* and *7*), and will default to the current value.

```php
$date->setWeek($week, $weekDay);
```

**Set Week Day**

Set the local day of the week in current time zone.

- `$weekDay` is a number representing the week day (between *1* and *7*).

```php
$date->setWeekDay($weekDay);
```

**Set Week Day In Month**

Set the day of the week in the month, in current time zone.

- `$weekDayInMonth` is a number representing the day of the week in month (between *1* and *5*).

```php
$date->setWeekDayInMonth($weekDayInMonth);
```

**Set Week Of Month**

Set the week of the month in current time zone.

- `$weekOfMonth` is a number representing the week of the month (between *1*  and *5*).

```php
$date->setWeekOfMonth($weekOfMonth);
```

**Set Week Year**

Set the week year in current time zone.

- `$weekYear` is a number representing the year.
- `$week` is a number representing the week, and will default to the current value.
- `$weekDay` is a number representing the day (between *1* and *7*), and will default to the current value.

```php
$date->setWeekYear($weekYear, $week, $weekDay);
```


## Time Attributes

**Get Hours**

Get the hours of the day in current time zone.

The `$hours` returned will be between *0* and *23*.

```php
$hours = $date->getHours();
```

**Get Milliseconds**

Get the milliseconds of the second in current time zone.

The `$milliseconds` returned will be between *0* and *999*.

```php
$milliseconds = $date->getMilliseconds();
```

**Get Minutes**

Get the minutes of the hour in current time zone.

The `$minutes` returned will be between *0* and *59*.

```php
$minutes = $date->getMinutes();
```

**Get Seconds**

Get the seconds of the minute in current time zone.

The `$seconds` returned will be between *0* and *59*.

```php
$seconds = $date->getSeconds();
```

**Set Hours**

Set the hours of the day in current time zone.

- `$hours` is a number representing the hours of the day (between *0* and *23*).
- `$minutes` is a number representing the minutes of the hour (between *0* and *59*), and will default to the current value.
- `$seconds` is a number representing the seconds of the minute (between *0* and *59*), and will default to the current value.
- `$milliseconds` is a number representing the milliseconds of the second (between *0* and *999*), and will default to the current value.

```php
$date->setHours($hours, $minutes, $seconds, $milliseconds);
```

**Set Milliseconds**

Set the milliseconds of the second in current time zone.

- `$milliseconds` is a number representing the milliseconds of the second (between *0* and *999*).

```php
$date->setMilliseconds($milliseconds);
```

**Set Minutes**

Set the minutes of the hour in current time zone.

- `$minutes` is a number representing the minutes of the hour (between *0* and *59*).
- `$seconds` is a number representing the seconds of the minute (between *0* and *59*), and will default to the current value.
- `$milliseconds` is a number representing the milliseconds of the second (between *0* and *999*), and will default to the current value.

```php
$date->setMinutes($minutes, $seconds, $milliseconds);
```

**Set Seconds**

Set the seconds of the minute in current time zone.

- `$seconds` is a number representing the seconds of the minute (between *0* and *59*).
- `$milliseconds` is a number representing the milliseconds of the second (between *0* and *999*), and will default to the current value.

```php
$date->setSeconds($seconds, $milliseconds);
```


## Timestamps

**Get Milliseconds**

Get the number of milliseconds since the UNIX epoch.

```php
$time = $date->getTime();
```

**Get Seconds**

Get the number of seconds since the UNIX epoch.

```php
$timestamp = $date->getTimestamp();
```

**Set Milliseconds**

Set the number of milliseconds since the UNIX epoch.

```php
$date->setTime($time);
```

**Set Seconds**

Set the number of seconds since the UNIX epoch.

```php
$date->setTimestamp($timestamp);
```


## Time Zones

**Get Time Zone**

Get the name of the current time zone.

```php
$timeZone = $date->getTimeZone();
```

**Get Time Zone Offset**

Get the UTC offset (in minutes) of the current time zone.

```php
$offset = $date->getTimeZoneOffset();
```

**Set Time Zone**

Set the current time zone.

- `$timeZone` is the name of the new time zone, which can be either "*UTC*", a supported value from the [IANA timeZone database](https://www.iana.org/time-zones) or an offset string.

```php
$date->setTimeZone($timeZone);
```

**Set Time Zone Offset**

Set the UTC offset (in minutes).

- `$offset` is the UTC offset (in minutes).

```php
$date->setTimeZoneOffset($offset);
```


## Locales

**Get Locale**

Get the name of the current locale.

```php
$locale = $date->getLocale();
```

**Set Locale**

Set the current locale.

- `$locale` is the name of the new locale.

```php
$date->setLocale($locale);
```


## Manipulation

**Add**

Add a duration to the date.

- `$amount` is a number representing the amount of the `timeUnit` to add.
- `$timeUnit` is a string representing the unit of time to add, and can be one of either "*year*", "*month*", "*week*", "*day*", "*hour*", "*minute*" or "*second*", or their pluralized versions.

```php
$date->add($amount, $timeUnit);
```

**End Of**

Set the date to the end of a unit of time in current time zone.

- `$timeUnit` is a string representing the unit of time to use, and can be one of either "*year*", "*quarter*", "*month*", "*week*", "*day*", "*hour*", "*minute*" or "*second*".

```php
$date->endOf($timeUnit);
```

**Start Of**

Set the date to the start of a unit of time in current time zone.

- `$timeUnit` is a string representing the unit of time to use, and can be one of either "*year*", "*quarter*", "*month*", "*week*", "*day*", "*hour*", "*minute*" or "*second*".

```php
$date->startOf($timeUnit);
```

**Subtract**

- `$amount` is a number representing the amount of the `timeUnit` to subtract.
- `$timeUnit` is a string representing the unit of time to subtract, and can be one of either "*year*", "*month*", "*week*", "*day*", "*hour*", "*minute*" or "*second*", or their pluralized versions.

```php
$date->sub($amount, $timeUnit);
```


## Utility Methods

**Clone**

Create a new *DateTime* using the current date and time zone.

```php
$clone = $date->clone();
```

**Day Name**

Get the name of the day of the week in current time zone and locale.

- `$type` can be either "*long*", "*short*" or "*narrow*", and will default to "*long*" if it is not set.

```php
$dayName = $date->dayName($type);
```

**Day Period**

Get the day period in current time zone and locale.

- `$type` can be either "*long*" or "*short*", and will default to "*long*" if it is not set.

```php
$dayPeriod = $date->dayPeriod($type);
```

**Days In Month**

Get the number of days in the current month.

```php
$daysInMonth = $date->daysInMonth();
```

**Days In Year**

Get the number of days in the current year.

```php
$daysInYear = $date->daysInYear();
```

**Difference**

Get the difference between two Dates.

- `$other` is the *DateTime* object to compare to.
- `$timeUnit` is a string representing the unit of time to return, and can be one of either "*year*", "*month*", "*day*", "*hour*", "*minute*" or "*second*", or their pluralized versions.
- `$relative` is a boolean indicating whether to return the relative difference, and will default to *true*.

If the `$timeUnit` is omitted, this method will return the difference in milliseconds.

```php
$diff = $date->diff($other, $timeUnit, $relative);
```

If `$relative` is *true* (default) the value returned will be the difference in the specified `$timeUnit`, ignoring less significant values.

```php
DateTime::fromFormat('yyyy-MM-dd', '2019-01-01')->diff(DateTime::fromFormat('yyyy-MM-dd', '2018-12-31'), 'years', true); // 1
DateTime::fromFormat('yyyy-MM-dd', '2019-01-01')->diff(DateTime::fromFormat('yyyy-MM-dd', '2018-12-31'), 'years', false); // 0
DateTime::fromFormat('yyyy-MM-dd', '2019-01-01')->diff(DateTime::fromFormat('yyyy-MM-dd', '2017-12-31'), 'years', true); // 2
DateTime::fromFormat('yyyy-MM-dd', '2019-01-01')->diff(DateTime::fromFormat('yyyy-MM-dd', '2017-12-31'), 'years', false); // 1
```

**Era**

Get the era in current time zone and locale.

- `$type` can be either "*long*", "*short*" or "*narrow*", and will default to "*long*" if it is not set.

```php
$era = $date->era($type);
```

**Is After?**

Return *true* if the *DateTime* is after another date.

- `$other` is the *DateTime* object to compare to.
- `$granularity` is a string specifying the level of granularity to use when comparing the dates, and can be one of either "*year*", "*month*", "*day*", "*hour*", "*minute*" or "*second*".

```php
$isAfter = $date->isAfter($other, $granularity);
```

If a `$granularity` is not specified, this method will compare the dates in milliseconds.

**Is Before?**

Return *true* if the *DateTime* is before another date.

- `$other` is the *DateTime* object to compare to.
- `$granularity` is a string specifying the level of granularity to use when comparing the dates, and can be one of either "*year*", "*month*", "*day*", "*hour*", "*minute*" or "*second*".

```php
$isBefore = $date->isBefore($other, $granularity);
```

If a `$granularity` is not specified, this method will compare the dates in milliseconds.

**Is Between?**

Return *true* if the *DateTime* is between two other dates.

- `$start` is the starting *DateTime* object to compare to.
- `$end` is the ending *DateTime* object to compare to.
- `$granularity` is a string specifying the level of granularity to use when comparing the dates, and can be one of either "*year*", "*month*", "*day*", "*hour*", "*minute*" or "*second*".

```php
$isBetween = $date->isBetween($start, $end, $granularity);
```

If a `$granularity` is not specified, this method will compare the dates in milliseconds.

**Is DST?**

Return *true* if the *DateTime* is in daylight savings.

```php
$isDST = $date->isDST();
```

**Is Leap Year?**

Return *true* if the year is a leap year.

```php
$isLeapYear = $date->isLeapYear();
```

**Is Same?**

Return *true* if the *DateTime* is the same as another date.

- `$other` is the *DateTime* object to compare to.
- `$granularity` is a string specifying the level of granularity to use when comparing the dates, and can be one of either "*year*", "*month*", "*day*", "*hour*", "*minute*" or "*second*".

```php
$isSame = $date->isSame($other, $granularity);
```

If a `$granularity` is not specified, this method will compare the dates in milliseconds.

**Is Same Or After?**

Return *true* if the *DateTime* is the same or after another date.

- `$other` is the *DateTime* object to compare to.
- `$granularity` is a string specifying the level of granularity to use when comparing the dates, and can be one of either "*year*", "*month*", "*day*", "*hour*", "*minute*" or "*second*".

```php
$isSameOrAfter = $date->isSameOrAfter($other, $granularity);
```

If a `$granularity` is not specified, this method will compare the dates in milliseconds.

**Is Same Or Before?**

Return *true* if the *DateTime* is the same or before another date.

- `$other` is the *DateTime* object to compare to.
- `$granularity` is a string specifying the level of granularity to use when comparing the dates, and can be one of either "*year*", "*month*", "*day*", "*hour*", "*minute*" or "*second*".

```php
$isSameOrBefore = $date->isSameOrBefore($other, $granularity);
```

If a `$granularity` is not specified, this method will compare the dates in milliseconds.

**Month Name**

Get the name of the month in current time zone and locale.

- `$type` can be either "*long*", "*short*" or "*narrow*", and will default to "*long*" if it is not set.

```php
$monthName = $date->monthName($type);
```

**Time Zone Name**

Get the name of the current time zone and locale.

- `$type` can be either "*long*" or "*short*", and will default to "*long*" if it is not set.

```php
$timeZoneName = $date->timeZoneName($type);
```

**Weeks In Year**

Get the number of weeks in the current year.

```php
$weeksInYear = $date->weeksInYear();
```


## Static Methods

**Set Date Clamping**

Set whether dates will be clamped when changing months.

- `$clampDates` is a boolean indicating whether to clamp dates.

```php
DateTime::setDateClamping($clampDates);
```

**Set Default Locale**

Set the default locale.

- `$locale` is the name of the locale.

```php
DateTime::setDefaultLocale($locale);
```

**Set Default Time Zone**

Set the default time zone.

- `$timeZone` is the name of the time zone, which can be either "*UTC*", a supported value from the [IANA timeZone database](https://www.iana.org/time-zones) or an offset string.

```php
DateTime::setDefaultTimeZone($timeZone);
```
