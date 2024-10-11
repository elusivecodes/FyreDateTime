# FyreDateTime

**FyreDateTime** is a free, open-source immutable date manipulation library for *PHP*.

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
- [Manipulation](#manipulation)
- [Comparisons](#comparisons)
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
```


## Date Creation

- `$dateString` is a string representing the date, and will default to the current timestamp.
- `$timeZone` is a string representing the time zone of the date, and will default to the system time zone.
- `$locale` is a string representing the locale of the date, and will default to the system locale.

```php
$dateTime = new DateTime($dateString, $timeZone, $locale);
```

**From Array**

- `$dateArray` is an array containing the year, month, date, hours, minutes, seconds and milliseconds.
- `$timeZone` is a string representing the time zone of the date, and will default to the system time zone.
- `$locale` is a string representing the locale of the date, and will default to the system locale.

```php
$dateTime = DateTime::fromArray($dateArray, $timeZone, $locale);
```

The month and date in the `$dateArray` will default to 1 if not set. The hours, minutes, seconds and milliseconds will default to 0.

**From DateTime**

- `$dateTime` is an instance of a class implementing *DateTimeInterface*.
- `$timeZone` is a string representing the time zone of the date, and will default to the system time zone.
- `$locale` is a string representing the locale of the date, and will default to the system locale.

```php
$newDateTime = DateTime::fromDateTime($dateTime, $timeZone, $locale);
```

**From Format**

- `$formatString` is a string containing the format you wish to use for parsing.
- `$dateString` is a string representing the date you are parsing.
- `$timeZone` is a string representing the time zone of the date, and will default to the system time zone.
- `$locale` is a string representing the locale of the date, and will default to the system locale.

The `$formatString` supports tokens described in the [ICU specification](https://unicode-org.github.io/icu/userguide/format_parse/datetime/#datetime-format-syntax).

```php
$dateTime = DateTime::fromFormat($formatString, $dateString, $timeZone, $locale);
```

**From ISO String**

- `$dateString` is a string representing the date you are parsing.
- `$timeZone` is a string representing the time zone of the date, and will default to the system time zone.
- `$locale` is a string representing the locale of the date, and will default to the system locale.

```php
$dateTime = DateTime::fromISOString($dateString, $timeZone, $locale);
```

**From Timestamp**

- `$timestamp` is the number of seconds since the UNIX epoch.
- `$timeZone` is a string representing the time zone of the date, and will default to the system time zone.
- `$locale` is a string representing the locale of the date, and will default to the system locale.

```php
$dateTime = DateTime::fromTimestamp($timestamp, $timeZone, $locale);
```

**Now**

- `$timeZone` is a string representing the time zone of the date, and will default to the system time zone.
- `$locale` is a string representing the locale of the date, and will default to the system locale.

```php
$dateTime = DateTime::now($timeZone, $locale);
```


## Date Formatting

**Format**

Once you have created a *DateTime* object, you can get a string representation using a specific format with the `format` method.

- `$formatString` is a string containing the format you wish to output using.

The `$formatString` supports tokens described in the [ICU specification](https://unicode-org.github.io/icu/userguide/format_parse/datetime/#datetime-format-syntax).

```php
$dateString = $dateTime->format($formatString);
```

**To String**

Format the current date using "*eee MMM dd yyyy HH:mm:ss xx (VV)*".

```php
$string = $dateTime->toString();
```

**To Date String**

Format the current date using "*eee MMM dd yyyy*".

```php
$dateString = $dateTime->toDateString();
```

**To ISO String**

Format the current date using "*yyyy-MM-dd'T'HH:mm:ss.SSSxxx*" (in English and UTC time zone).

```php
$isoString = $dateTime->toISOString();
```

**To Time String**

Format the current date using "*HH:mm:ss xx (VV)*".

```php
$timeString = $dateTime->toTimeString();
```

**To UTC String**

Format the current date using "*eee MMM dd yyyy HH:mm:ss xx (VV)*" (in UTC time zone).

```php
$utcString = $dateTime->toUTCString();
```


## Date Attributes

**Get Date**

Get the date in current time zone.

```php
$date = $dateTime->getDate();
```

**Get Day**

Get the day of the week in current time zone.

The `$day` returned will be between *0* (Sunday) and *6* (Saturday).

```php
$day = $dateTime->getDay();
```

**Get Day Of Year**

Get the day of the year in current time zone.

The `$dayOfYear` returned will be between *0* and *365*.

```php
$dayOfYear = $dateTime->getDayOfYear();
```

**Get Month**

Get the month in current time zone.

The `$month` returned will be between *1* (January) and *12* (December).

```php
$month = $dateTime->getMonth();
```

**Get Quarter**

Get the quarter of the year in current time zone.

The `$quarter` returned will be between *1* and *4*.

```php
$quarter = $dateTime->getQuarter();
```

**Get Year**

Get the year in current time zone.

```php
$year = $dateTime->getYear();
```

**Set Date**

Set the date in current time zone.

- `$date` is a number representing the date.

```php
$newDate = $dateTime->setDate($date);
```

**Set Day**

Set the day of the week in current time zone.

- `$day` is a number representing the day of the week (between *0* and *6*).

```php
$newDateTime = $dateTime->setDay($day);
```

**Set Day Of Year**

Set the day of the year in current time zone.

- `$dayOfYear` is a number representing the day of the year (between *0* and *365*).

```php
$newDateTime = $dateTime->setDayOfYear($dayOfYear);
```

**Set Month**

Set the month in current time zone.

- `$month` is a number representing the month (between *1* and *12*).
- `$date` is a number representing the date, and will default to the current value.

If the `$date` argument is omitted, and the new month contains less days than the current date, the date will be set to the last day of the new month.

To disable date clamping, use the method `DateTime::setDateClamping()` using *false* as the argument.

```php
$newDateTime = $dateTime->setMonth($month, $date);
```

**Set Quarter**

Set the quarter of the year in current time zone.

- `$quarter` is a number representing the quarter between *1* and *4*.

```php
$newDateTime = $dateTime->setQuarter($quarter);
```

**Set Year**

Set the year in current time zone.

- `$year` is a number representing the year.
- `$month` is a number representing the month (between *1* and *12*), and will default to the current value.
- `$date` is a number representing the date, and will default to the current value.

If the `$date` argument is omitted, and the new month contains less days than the current date, the date will be set to the last day of the new month.

To disable date clamping, use the method `DateTime::setDateClamping()` using *false* as the argument.

```php
$newDateTime = $dateTime->setYear($year, $month, $date);
```


## Week Attributes

**Get Week**

Get the week of the year in current time zone.

The `$week` returned will be between *1*  and *53* (week starting on Monday).

```php
$week = $dateTime->getWeek();
```

**Get Week Day**

Get the local day of the week in current time zone.

The `$weekDay` returned will be between *1* and *7*.

```php
$weekDay = $dateTime->getWeekDay();
```

**Get Week Day In Month**

Get the day of the week in the month, in current time zone.

The `$weekDayInMonth` returned will be between *1* and *5*.

```php
$weekDayInMonth = $dateTime->getWeekDayInMonth();
```

**Get Week Of Month**

Get the week of the month in current time zone.

The `$weekOfMonth` returned will be between *1*  and *5*.

```php
$weekOfMonth = $dateTime->getWeekOfMonth();
```

**Get Week Year**

Get the week year in current time zone.

This method is identical to `getYear()` except in cases where the week belongs to the previous or next year, then that value will be used instead.

```php
$weekYear = $dateTime->getWeekYear();
```

**Set Week**

Set the week in current time zone.

- `$week` is a number representing the week.
- `$weekDay` is a number representing the day (between *1* and *7*), and will default to the current value.

```php
$newDateTime = $dateTime->setWeek($week, $weekDay);
```

**Set Week Day**

Set the local day of the week in current time zone.

- `$weekDay` is a number representing the week day (between *1* and *7*).

```php
$newDateTime = $dateTime->setWeekDay($weekDay);
```

**Set Week Day In Month**

Set the day of the week in the month, in current time zone.

- `$weekDayInMonth` is a number representing the day of the week in month (between *1* and *5*).

```php
$newDateTime = $dateTime->setWeekDayInMonth($weekDayInMonth);
```

**Set Week Of Month**

Set the week of the month in current time zone.

- `$weekOfMonth` is a number representing the week of the month (between *1*  and *5*).

```php
$newDateTime = $dateTime->setWeekOfMonth($weekOfMonth);
```

**Set Week Year**

Set the week year in current time zone.

- `$weekYear` is a number representing the year.
- `$week` is a number representing the week, and will default to the current value.
- `$weekDay` is a number representing the day (between *1* and *7*), and will default to the current value.

```php
$newDateTime = $dateTime->setWeekYear($weekYear, $week, $weekDay);
```


## Time Attributes

**Get Hours**

Get the hours of the day in current time zone.

The `$hours` returned will be between *0* and *23*.

```php
$hours = $dateTime->getHours();
```

**Get Milliseconds**

Get the milliseconds of the second in current time zone.

The `$milliseconds` returned will be between *0* and *999*.

```php
$milliseconds = $dateTime->getMilliseconds();
```

**Get Minutes**

Get the minutes of the hour in current time zone.

The `$minutes` returned will be between *0* and *59*.

```php
$minutes = $dateTime->getMinutes();
```

**Get Seconds**

Get the seconds of the minute in current time zone.

The `$seconds` returned will be between *0* and *59*.

```php
$seconds = $dateTime->getSeconds();
```

**Set Hours**

Set the hours of the day in current time zone.

- `$hours` is a number representing the hours of the day (between *0* and *23*).
- `$minutes` is a number representing the minutes of the hour (between *0* and *59*), and will default to the current value.
- `$seconds` is a number representing the seconds of the minute (between *0* and *59*), and will default to the current value.
- `$milliseconds` is a number representing the milliseconds of the second (between *0* and *999*), and will default to the current value.

```php
$newDateTime = $dateTime->setHours($hours, $minutes, $seconds, $milliseconds);
```

**Set Milliseconds**

Set the milliseconds of the second in current time zone.

- `$milliseconds` is a number representing the milliseconds of the second (between *0* and *999*).

```php
$newDateTime = $dateTime->setMilliseconds($milliseconds);
```

**Set Minutes**

Set the minutes of the hour in current time zone.

- `$minutes` is a number representing the minutes of the hour (between *0* and *59*).
- `$seconds` is a number representing the seconds of the minute (between *0* and *59*), and will default to the current value.
- `$milliseconds` is a number representing the milliseconds of the second (between *0* and *999*), and will default to the current value.

```php
$newDateTime = $dateTime->setMinutes($minutes, $seconds, $milliseconds);
```

**Set Seconds**

Set the seconds of the minute in current time zone.

- `$seconds` is a number representing the seconds of the minute (between *0* and *59*).
- `$milliseconds` is a number representing the milliseconds of the second (between *0* and *999*), and will default to the current value.

```php
$newDateTime = $dateTime->setSeconds($seconds, $milliseconds);
```


## Timestamps

**Get Milliseconds**

Get the number of milliseconds since the UNIX epoch.

```php
$time = $dateTime->getTime();
```

**Get Seconds**

Get the number of seconds since the UNIX epoch.

```php
$timestamp = $dateTime->getTimestamp();
```

**Set Milliseconds**

Set the number of milliseconds since the UNIX epoch.

```php
$newDateTime = $dateTime->setTime($time);
```

**Set Seconds**

Set the number of seconds since the UNIX epoch.

```php
$newDateTime = $dateTime->setTimestamp($timestamp);
```


## Time Zones

**Get Time Zone**

Get the name of the current time zone.

```php
$timeZone = $dateTime->getTimeZone();
```

**Get Time Zone Offset**

Get the UTC offset (in minutes) of the current time zone.

```php
$offset = $dateTime->getTimeZoneOffset();
```

**Set Time Zone**

Set the current time zone.

- `$timeZone` is the name of the new time zone, which can be either "*UTC*", a supported value from the [IANA timeZone database](https://www.iana.org/time-zones) or an offset string.

```php
$newDateTime = $dateTime->setTimeZone($timeZone);
```

**Set Time Zone Offset**

Set the UTC offset (in minutes).

- `$offset` is the UTC offset (in minutes).

```php
$newDateTime = $dateTime->setTimeZoneOffset($offset);
```


## Locales

**Get Locale**

Get the name of the current locale.

```php
$locale = $dateTime->getLocale();
```

**Set Locale**

Set the current locale.

- `$locale` is the name of the new locale.

```php
$newDateTime = $dateTime->setLocale($locale);
```


## Manipulation

**Add Day**

Add a day to the current date.

```php
$newDateTime = $dateTime->addDay();
```

**Add Days**

Add days to the current date.

- `$amount` is a number representing the amount of days to add.

```php
$newDateTime = $dateTime->addDay($amount);
```

**Add Hour**

Add a hour to the current date.

```php
$newDateTime = $dateTime->addHour();
```

**Add Hours**

Add hours to the current date.

- `$amount` is a number representing the amount of hours to add.

```php
$newDateTime = $dateTime->addHours($amount);
```

**Add Minute**

Add a minute to the current date.

```php
$newDateTime = $dateTime->addMinute();
```

**Add Minutes**

Add minutes to the current date.

- `$amount` is a number representing the amount of minutes to add.

```php
$newDateTime = $dateTime->addMinutes($amount);
```

**Add Month**

Add a month to the current date.

```php
$newDateTime = $dateTime->addMonth();
```

**Add Months**

Add months to the current date.

- `$amount` is a number representing the amount of months to add.

```php
$newDateTime = $dateTime->addMonths($amount);
```

**Add Second**

Add a second to the current date.

```php
$newDateTime = $dateTime->addSecond();
```

**Add Seconds**

Add seconds to the current date.

- `$amount` is a number representing the amount of seconds to add.

```php
$newDateTime = $dateTime->addSeconds($amount);
```

**Add Week**

Add a week to the current date.

```php
$newDateTime = $dateTime->addWeek();
```

**Add Weeks**

Add weeks to the current date.

- `$amount` is a number representing the amount of weeks to add.

```php
$newDateTime = $dateTime->addWeeks($amount);
```

**Add Year**

Add a year to the current date.

```php
$newDateTime = $dateTime->addYear();
```

**Add Years**

Add years to the current date.

- `$amount` is a number representing the amount of years to add.

```php
$newDateTime = $dateTime->addYears($amount);
```

**End Of Day**

Set the date to the end of the day in current time zone.

```php
$newDateTime = $dateTime->endOfDay();
```

**End Of Hour**

Set the date to the end of the hour in current time zone.

```php
$newDateTime = $dateTime->endOfHour();
```

**End Of Minute**

Set the date to the end of the minute in current time zone.

```php
$newDateTime = $dateTime->endOfMinute();
```

**End Of Month**

Set the date to the end of the month in current time zone.

```php
$newDateTime = $dateTime->endOfMonth();
```

**End Of Quarter**

Set the date to the end of the quarter in current time zone.

```php
$newDateTime = $dateTime->endOfQuarter();
```

**End Of Second**

Set the date to the end of the second in current time zone.

```php
$newDateTime = $dateTime->endOfSecond();
```

**End Of Week**

Set the date to the end of the week in current time zone.

```php
$newDateTime = $dateTime->endOfWeek();
```

**End Of Year**

Set the date to the end of the year in current time zone.

```php
$newDateTime = $dateTime->endOfYear();
```

**Start Of Day**

Set the date to the start of the day in current time zone.

```php
$newDateTime = $dateTime->startOfDay();
```

**Start Of Hour**

Set the date to the start of the hour in current time zone.

```php
$newDateTime = $dateTime->startOfHour();
```

**Start Of Minute**

Set the date to the start of the minute in current time zone.

```php
$newDateTime = $dateTime->startOfMinute();
```

**Start Of Month**

Set the date to the start of the month in current time zone.

```php
$newDateTime = $dateTime->startOfMonth();
```

**Start Of Quarter**

Set the date to the start of the quarter in current time zone.

```php
$newDateTime = $dateTime->startOfQuarter();
```

**Start Of Second**

Set the date to the start of the second in current time zone.

```php
$newDateTime = $dateTime->startOfSecond();
```

**Start Of Week**

Set the date to the start of the week in current time zone.

```php
$newDateTime = $dateTime->startOfWeek();
```

**Start Of Year**

Set the date to the start of the year in current time zone.

```php
$newDateTime = $dateTime->startOfYear();
```

**Subtract Day**

Subtract a day to the current date.

```php
$newDateTime = $dateTime->subtractDay();
```

**Subtract Days**

Subtract days to the current date.

- `$amount` is a number representing the amount of days to subtract.

```php
$newDateTime = $dateTime->subtractDay($amount);
```

**Subtract Hour**

Subtract a hour to the current date.

```php
$newDateTime = $dateTime->subtractHour();
```

**Subtract Hours**

Subtract hours to the current date.

- `$amount` is a number representing the amount of hours to subtract.

```php
$newDateTime = $dateTime->subtractHours($amount);
```

**Subtract Minute**

Subtract a minute to the current date.

```php
$newDateTime = $dateTime->subtractMinute();
```

**Subtract Minutes**

Subtract minutes to the current date.

- `$amount` is a number representing the amount of minutes to subtract.

```php
$newDateTime = $dateTime->subtractMinutes($amount);
```

**Subtract Month**

Subtract a month to the current date.

```php
$newDateTime = $dateTime->subtractMonth();
```

**Subtract Months**

Subtract months to the current date.

- `$amount` is a number representing the amount of months to subtract.

```php
$newDateTime = $dateTime->subtractMonths($amount);
```

**Subtract Second**

Subtract a second to the current date.

```php
$newDateTime = $dateTime->subtractSecond();
```

**Subtract Seconds**

Subtract seconds to the current date.

- `$amount` is a number representing the amount of seconds to subtract.

```php
$newDateTime = $dateTime->subtractSeconds($amount);
```

**Subtract Week**

Subtract a week to the current date.

```php
$newDateTime = $dateTime->subtractWeek();
```

**Subtract Weeks**

Subtract weeks to the current date.

- `$amount` is a number representing the amount of weeks to subtract.

```php
$newDateTime = $dateTime->subtractWeeks($amount);
```

**Subtract Year**

Subtract a year to the current date.

```php
$newDateTime = $dateTime->subtractYear();
```

**Subtract Years**

Subtract years to the current date.

- `$amount` is a number representing the amount of years to subtract.

```php
$newDateTime = $dateTime->subtractYears($amount);
```


## Comparisons

**Difference**

Get the difference between two dates in milliseconds.

- `$other` is the *DateTime* object to compare to.

```php
$diff = $dateTime->diff($other);
```

**Difference In Days**

Get the difference between two dates in days.

- `$other` is the *DateTime* object to compare to.
- `$relative` is a boolean indicating whether to return the relative difference, and will default to *true*.

```php
$diff = $dateTime->diffInDays($other, $relative);
```

If `$relative` is *true* (default) the value returned will be the relative difference, ignoring higher precision properties.

**Difference In Hours**

Get the difference between two dates in hours.

- `$other` is the *DateTime* object to compare to.
- `$relative` is a boolean indicating whether to return the relative difference, and will default to *true*.

```php
$diff = $dateTime->diffInHours($other, $relative);
```

If `$relative` is *true* (default) the value returned will be the relative difference, ignoring higher precision properties.

**Difference In Minutes**

Get the difference between two dates in minutes.

- `$other` is the *DateTime* object to compare to.
- `$relative` is a boolean indicating whether to return the relative difference, and will default to *true*.

```php
$diff = $dateTime->diffInMinutes($other, $relative);
```

If `$relative` is *true* (default) the value returned will be the relative difference, ignoring higher precision properties.

**Difference In Months**

Get the difference between two dates in months.

- `$other` is the *DateTime* object to compare to.
- `$relative` is a boolean indicating whether to return the relative difference, and will default to *true*.

```php
$diff = $dateTime->diffInMonths($other, $relative);
```

If `$relative` is *true* (default) the value returned will be the relative difference, ignoring higher precision properties.

**Difference In Seconds**

Get the difference between two dates in seconds.

- `$other` is the *DateTime* object to compare to.
- `$relative` is a boolean indicating whether to return the relative difference, and will default to *true*.

```php
$diff = $dateTime->diffInSeconds($other, $relative);
```

If `$relative` is *true* (default) the value returned will be the relative difference, ignoring higher precision properties.

**Difference In Weeks**

Get the difference between two dates in weeks.

- `$other` is the *DateTime* object to compare to.
- `$relative` is a boolean indicating whether to return the relative difference, and will default to *true*.

```php
$diff = $dateTime->diffInWeeks($other, $relative);
```

If `$relative` is *true* (default) the value returned will be the relative difference, ignoring higher precision properties.

**Difference In Years**

Get the difference between two dates in years.

- `$other` is the *DateTime* object to compare to.
- `$relative` is a boolean indicating whether to return the relative difference, and will default to *true*.

```php
$diff = $dateTime->diffInYears($other, $relative);
```

If `$relative` is *true* (default) the value returned will be the relative difference, ignoring higher precision properties.

**Is After?**

Return *true* if the *DateTime* is after another date.

- `$other` is the *DateTime* object to compare to.

```php
$isAfter = $dateTime->isAfter($other);
```

**Is After Day?**

Return *true* if the *DateTime* is after another date (comparing by day).

- `$other` is the *DateTime* object to compare to.

```php
$isAfter = $dateTime->isAfterDay($other);
```

**Is After Hour?**

Return *true* if the *DateTime* is after another date (comparing by hour).

- `$other` is the *DateTime* object to compare to.

```php
$isAfter = $dateTime->isAfterHour($other);
```

**Is After Minute?**

Return *true* if the *DateTime* is after another date (comparing by minute).

- `$other` is the *DateTime* object to compare to.

```php
$isAfter = $dateTime->isAfterMinute($other);
```

**Is After Month?**

Return *true* if the *DateTime* is after another date (comparing by month).

- `$other` is the *DateTime* object to compare to.

```php
$isAfter = $dateTime->isAfterMonth($other);
```

**Is After Second?**

Return *true* if the *DateTime* is after another date (comparing by second).

- `$other` is the *DateTime* object to compare to.

```php
$isAfter = $dateTime->isAfterSecond($other);
```

**Is After Week?**

Return *true* if the *DateTime* is after another date (comparing by week).

- `$other` is the *DateTime* object to compare to.

```php
$isAfter = $dateTime->isAfterWeek($other);
```

**Is After Year?**

Return *true* if the *DateTime* is after another date (comparing by year).

- `$other` is the *DateTime* object to compare to.

```php
$isAfter = $dateTime->isAfterYear($other);
```

**Is Before?**

Return *true* if the *DateTime* is before another date.

- `$other` is the *DateTime* object to compare to.

```php
$isBefore = $dateTime->isBefore($other);
```

**Is Before Day?**

Return *true* if the *DateTime* is before another date (comparing by day).

- `$other` is the *DateTime* object to compare to.

```php
$isBefore = $dateTime->isBeforeDay($other);
```

**Is Before Hour?**

Return *true* if the *DateTime* is before another date (comparing by hour).

- `$other` is the *DateTime* object to compare to.

```php
$isBefore = $dateTime->isBeforeHour($other);
```

**Is Before Minute?**

Return *true* if the *DateTime* is before another date (comparing by minute).

- `$other` is the *DateTime* object to compare to.

```php
$isBefore = $dateTime->isBeforeMinute($other);
```

**Is Before Month?**

Return *true* if the *DateTime* is before another date (comparing by month).

- `$other` is the *DateTime* object to compare to.

```php
$isBefore = $dateTime->isBeforeMonth($other);
```

**Is Before Second?**

Return *true* if the *DateTime* is before another date (comparing by second).

- `$other` is the *DateTime* object to compare to.

```php
$isBefore = $dateTime->isBeforeSecond($other);
```

**Is Before Week?**

Return *true* if the *DateTime* is before another date (comparing by week).

- `$other` is the *DateTime* object to compare to.

```php
$isBefore = $dateTime->isBeforeWeek($other);
```

**Is Before Year?**

Return *true* if the *DateTime* is before another date (comparing by year).

- `$other` is the *DateTime* object to compare to.

```php
$isBefore = $dateTime->isBeforeYear($other);
```

**Is Between?**

Return *true* if the *DateTime* is between two other dates.

- `$start` is the starting *DateTime* object to compare to.
- `$end` is the ending *DateTime* object to compare to.

```php
$isBetween = $dateTime->isBetween($start, $end);
```

**Is Between Day?**

Return *true* if the *DateTime* is between two other dates (comparing by day).

- `$start` is the starting *DateTime* object to compare to.
- `$end` is the ending *DateTime* object to compare to.

```php
$isBetween = $dateTime->isBetweenDay($start, $end);
```

**Is Between Hour?**

Return *true* if the *DateTime* is between two other dates (comparing by hour).

- `$start` is the starting *DateTime* object to compare to.
- `$end` is the ending *DateTime* object to compare to.

```php
$isBetween = $dateTime->isBetweenHour($start, $end);
```

**Is Between Minute?**

Return *true* if the *DateTime* is between two other dates (comparing by minute).

- `$start` is the starting *DateTime* object to compare to.
- `$end` is the ending *DateTime* object to compare to.

```php
$isBetween = $dateTime->isBetweenMinute($start, $end);
```

**Is Between Month?**

Return *true* if the *DateTime* is between two other dates (comparing by month).

- `$start` is the starting *DateTime* object to compare to.
- `$end` is the ending *DateTime* object to compare to.

```php
$isBetween = $dateTime->isBetweenMonth($start, $end);
```

**Is Between Second?**

Return *true* if the *DateTime* is between two other dates (comparing by second).

- `$start` is the starting *DateTime* object to compare to.
- `$end` is the ending *DateTime* object to compare to.

```php
$isBetween = $dateTime->isBetweenSecond($start, $end);
```

**Is Between Week?**

Return *true* if the *DateTime* is between two other dates (comparing by week).

- `$start` is the starting *DateTime* object to compare to.
- `$end` is the ending *DateTime* object to compare to.

```php
$isBetween = $dateTime->isBetweenWeek($start, $end);
```

**Is Between Year?**

Return *true* if the *DateTime* is between two other dates (comparing by year).

- `$start` is the starting *DateTime* object to compare to.
- `$end` is the ending *DateTime* object to compare to.

```php
$isBetween = $dateTime->isBetweenYear($start, $end);
```

**Is Same?**

Return *true* if the *DateTime* is the same as another date.

- `$other` is the *DateTime* object to compare to.

```php
$isSame = $dateTime->isSame($other);
```

**Is Same Day?**

Return *true* if the *DateTime* is the same as another date (comparing by day).

- `$other` is the *DateTime* object to compare to.

```php
$isSame = $dateTime->isSameDay($other);
```

**Is Same Hour?**

Return *true* if the *DateTime* is the same as another date (comparing by hour).

- `$other` is the *DateTime* object to compare to.

```php
$isSame = $dateTime->isSameHour($other);
```

**Is Same Minute?**

Return *true* if the *DateTime* is the same as another date (comparing by minute).

- `$other` is the *DateTime* object to compare to.

```php
$isSame = $dateTime->isSameMinute($other);
```

**Is Same Month?**

Return *true* if the *DateTime* is the same as another date (comparing by month).

- `$other` is the *DateTime* object to compare to.

```php
$isSame = $dateTime->isSameMonth($other);
```

**Is Same Second?**

Return *true* if the *DateTime* is the same as another date (comparing by second).

- `$other` is the *DateTime* object to compare to.

```php
$isSame = $dateTime->isSameSecond($other);
```

**Is Same Week?**

Return *true* if the *DateTime* is the same as another date (comparing by week).

- `$other` is the *DateTime* object to compare to.

```php
$isSame = $dateTime->isSameWeek($other);
```

**Is Same Year?**

Return *true* if the *DateTime* is the same as another date (comparing by year).

- `$other` is the *DateTime* object to compare to.

```php
$isSame = $dateTime->isSameYear($other);
```

**Is Same Or After?**

Return *true* if the *DateTime* is the same as or after another date.

- `$other` is the *DateTime* object to compare to.

```php
$isSameOrAfter = $dateTime->isSameOrAfter($other);
```

**Is Same Or After Day?**

Return *true* if the *DateTime* is the same as or after another date (comparing by day).

- `$other` is the *DateTime* object to compare to.

```php
$isSameOrAfter = $dateTime->isSameOrAfterDay($other);
```

**Is Same Or After Hour?**

Return *true* if the *DateTime* is the same as or after another date (comparing by hour).

- `$other` is the *DateTime* object to compare to.

```php
$isSameOrAfter = $dateTime->isSameOrAfterHour($other);
```

**Is Same Or After Minute?**

Return *true* if the *DateTime* is the same as or after another date (comparing by minute).

- `$other` is the *DateTime* object to compare to.

```php
$isSameOrAfter = $dateTime->isSameOrAfterMinute($other);
```

**Is Same Or After Month?**

Return *true* if the *DateTime* is the same as or after another date (comparing by month).

- `$other` is the *DateTime* object to compare to.

```php
$isSameOrAfter = $dateTime->isSameOrAfterMonth($other);
```

**Is Same Or After Second?**

Return *true* if the *DateTime* is the same as or after another date (comparing by second).

- `$other` is the *DateTime* object to compare to.

```php
$isSameOrAfter = $dateTime->isSameOrAfterSecond($other);
```

**Is Same Or After Week?**

Return *true* if the *DateTime* is the same as or after another date (comparing by week).

- `$other` is the *DateTime* object to compare to.

```php
$isSameOrAfter = $dateTime->isSameOrAfterWeek($other);
```

**Is Same Or After Year?**

Return *true* if the *DateTime* is the same as or after another date (comparing by year).

- `$other` is the *DateTime* object to compare to.

```php
$isSameOrAfter = $dateTime->isSameOrAfterYear($other);
```

**Is Same Or Before?**

Return *true* if the *DateTime* is the same as or before another date.

- `$other` is the *DateTime* object to compare to.

```php
$isSameOrBefore = $dateTime->isSameOrBefore($other);
```

**Is Same Or Before Day?**

Return *true* if the *DateTime* is the same as or before another date (comparing by day).

- `$other` is the *DateTime* object to compare to.

```php
$isSameOrBefore = $dateTime->isSameOrBeforeDay($other);
```

**Is Same Or Before Hour?**

Return *true* if the *DateTime* is the same as or before another date (comparing by hour).

- `$other` is the *DateTime* object to compare to.

```php
$isSameOrBefore = $dateTime->isSameOrBeforeHour($other);
```

**Is Same Or Before Minute?**

Return *true* if the *DateTime* is the same as or before another date (comparing by minute).

- `$other` is the *DateTime* object to compare to.

```php
$isSameOrBefore = $dateTime->isSameOrBeforeMinute($other);
```

**Is Same Or Before Month?**

Return *true* if the *DateTime* is the same as or before another date (comparing by month).

- `$other` is the *DateTime* object to compare to.

```php
$isSameOrBefore = $dateTime->isSameOrBeforeMonth($other);
```

**Is Same Or Before Second?**

Return *true* if the *DateTime* is the same as or before another date (comparing by second).

- `$other` is the *DateTime* object to compare to.

```php
$isSameOrBefore = $dateTime->isSameOrBeforeSecond($other);
```

**Is Same Or Before Week?**

Return *true* if the *DateTime* is the same as or before another date (comparing by week).

- `$other` is the *DateTime* object to compare to.

```php
$isSameOrBefore = $dateTime->isSameOrBeforeWeek($other);
```

**Is Same Or Before Year?**

Return *true* if the *DateTime* is the same as or before another date (comparing by year).

- `$other` is the *DateTime* object to compare to.

```php
$isSameOrBefore = $dateTime->isSameOrBeforeYear($other);
```


## Utility Methods

**Day Name**

Get the name of the day of the week in current time zone and locale.

- `$type` can be either "*long*", "*short*" or "*narrow*", and will default to "*long*" if it is not set.

```php
$dayName = $dateTime->dayName($type);
```

**Day Period**

Get the day period in current time zone and locale.

- `$type` can be either "*long*" or "*short*", and will default to "*long*" if it is not set.

```php
$dayPeriod = $dateTime->dayPeriod($type);
```

**Days In Month**

Get the number of days in the current month.

```php
$daysInMonth = $dateTime->daysInMonth();
```

**Days In Year**

Get the number of days in the current year.

```php
$daysInYear = $dateTime->daysInYear();
```

**Era**

Get the era in current time zone and locale.

- `$type` can be either "*long*", "*short*" or "*narrow*", and will default to "*long*" if it is not set.

```php
$era = $dateTime->era($type);
```

**Is DST?**

Return *true* if the *DateTime* is in daylight savings.

```php
$isDST = $dateTime->isDST();
```

**Is Leap Year?**

Return *true* if the year is a leap year.

```php
$isLeapYear = $dateTime->isLeapYear();
```

**Month Name**

Get the name of the month in current time zone and locale.

- `$type` can be either "*long*", "*short*" or "*narrow*", and will default to "*long*" if it is not set.

```php
$monthName = $dateTime->monthName($type);
```

**Time Zone Name**

Get the name of the current time zone and locale.

- `$type` can be either "*long*" or "*short*", and will default to "*long*" if it is not set.

```php
$timeZoneName = $dateTime->timeZoneName($type);
```

**Weeks In Year**

Get the number of weeks in the current year.

```php
$weeksInYear = $dateTime->weeksInYear();
```


## Static Methods

**Get Default Locale**

Get the default locale.

```php
$locale = DateTime::getDefaultLocale();
```

**Get Default Time Zone**

Get the default time zone.

```php
$timeZone = DateTime::getDefaultTimeZone();
```

**Set Date Clamping**

Set whether dates will be clamped when changing months.

- `$clampDates` is a boolean indicating whether to clamp dates.

```php
DateTime::setDateClamping($clampDates);
```

**Set Default Locale**

Set the default locale.

- `$locale` is the name of the locale, or a *Closure* that returns the locale.

```php
DateTime::setDefaultLocale($locale);
```

**Set Default Time Zone**

Set the default time zone.

- `$timeZone` is the name of the time zone, which can be either "*UTC*", a supported value from the [IANA timeZone database](https://www.iana.org/time-zones), an offset string, or a *Closure* that returns the locale.

```php
DateTime::setDefaultTimeZone($timeZone);
```
