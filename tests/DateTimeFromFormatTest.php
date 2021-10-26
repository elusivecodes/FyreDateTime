<?php
declare(strict_types=1);

namespace Tests;

use
    Fyre\DateTime\DateTime;

trait DateTimeFromFormatTest
{

    /**
     * Era
     */

    public function testDateTimeFromFormatEraShort(): void
    {
        $this->assertEquals(
            1970,
            DateTime::fromFormat('yyyy GGG', '1970 AD')->getYear()
        );
    }

    public function testDateTimeFromFormatEraShortBc(): void
    {
        $this->assertEquals(
            -1970,
            DateTime::fromFormat('yyyy GGG', '1970 BC')->getYear()
        );
    }

    public function testDateTimeFromFormatEraLong(): void
    {
        $this->assertEquals(
            1970,
            DateTime::fromFormat('yyyy GGGG', '1970 Anno Domini')->getYear()
        );
    }

    public function testDateTimeFromFormatEraLongBc(): void
    {
        $this->assertEquals(
            -1970,
            DateTime::fromFormat('yyyy GGGG', '1970 Before Christ')->getYear()
        );
    }

    public function testDateTimeFromFormatEraNarrow(): void
    {
        $this->assertEquals(
            1970,
            DateTime::fromFormat('yyyy GGGGG', '1970 A')->getYear()
        );
    }

    public function testDateTimeFromFormatEraNarrowBc(): void
    {
        $this->assertEquals(
            -1970,
            DateTime::fromFormat('yyyy GGGGG', '1970 B')->getYear()
        );
    }

    /**
     * Year
     */

    public function testDateTimeFromFormatYear1DigitFull(): void
    {
        $this->assertEquals(
            2018,
            DateTime::fromFormat('y', '2018')->getYear()
        );
    }

    public function testDateTimeFromFormatYear1Digit(): void
    {
        $this->assertEquals(
            5,
            DateTime::fromFormat('y', '5')->getYear()
        );
    }

    public function testDateTimeFromFormatYear2DigitsFull(): void
    {
        $this->assertEquals(
            2018,
            DateTime::fromFormat('yy', '2018')->getYear()
        );
    }

    public function testDateTimeFromFormatYear2Digits(): void
    {
        $this->assertEquals(
            1988,
            DateTime::fromFormat('yy', '88')->getYear()
        );
    }

    public function testDateTimeFromFormatYear3DigitsFull(): void
    {
        $this->assertEquals(
            2018,
            DateTime::fromFormat('yyy', '2018')->getYear()
        );
    }

    public function testDateTimeFromFormatYear3Digits(): void
    {
        $this->assertEquals(
            88,
            DateTime::fromFormat('yyy', '088')->getYear()
        );
    }

    public function testDateTimeFromFormatYear4DigitsFull(): void
    {
        $this->assertEquals(
            2018,
            DateTime::fromFormat('yyyy', '2018')->getYear()
        );
    }

    public function testDateTimeFromFormatYear4Digits(): void
    {
        $this->assertEquals(
            88,
            DateTime::fromFormat('yyyy', '0088')->getYear()
        );
    }

    /**
     * Week Year
     */

    public function testDateTimeFromFormatWeekYear1DigitFull(): void
    {
        $this->assertEquals(
            2018,
            DateTime::fromFormat('Y w e', '2018 1 1')->getWeekYear()
        );
    }

    public function testDateTimeFromFormatWeekYear1Digit(): void
    {
        $this->assertEquals(
            5,
            DateTime::fromFormat('Y w e', '5 1 1')->getWeekYear()
        );
    }

    public function testDateTimeFromFormatWeekYear2DigitsFull(): void
    {
        $this->assertEquals(
            2018,
            DateTime::fromFormat('YY w e', '2018 1 1')->getWeekYear()
        );
    }

    public function testDateTimeFromFormatWeekYear2Digits(): void
    {
        $this->assertEquals(
            1988,
            DateTime::fromFormat('YY w e', '88 1 1')->getWeekYear()
        );
    }

    public function testDateTimeFromFormatWeekYear3DigitsFull(): void
    {
        $this->assertEquals(
            2018,
            DateTime::fromFormat('YYY w e', '2018 1 1')->getWeekYear()
        );
    }

    public function testDateTimeFromFormatWeekYear3Digits(): void
    {
        $this->assertEquals(
            88,
            DateTime::fromFormat('YYY w e', '088 1 1')->getWeekYear()
        );
    }

    public function testDateTimeFromFormatWeekYear4DigitsFull(): void
    {
        $this->assertEquals(
            2018,
            DateTime::fromFormat('YYYY w e', '2018 1 1')->getWeekYear()
        );
    }

    public function testDateTimeFromFormatWeekYear4Digits(): void
    {
        $this->assertEquals(
            88,
            DateTime::fromFormat('YYYY w e', '0088 1 1')->getWeekYear()
        );
    }

    /**
     * Quarter
     */

    public function testDateTimeFromFormatQuarter1Digit(): void
    {
        $this->assertEquals(
            3,
            DateTime::fromFormat('q', '3')->getQuarter()
        );
    }

    public function testDateTimeFromFormatQuarter2Digits(): void
    {
        $this->assertEquals(
            3,
            DateTime::fromFormat('qq', '03')->getQuarter()
        );
    }

    public function testDateTimeFromFormatStandaloneQuarter1Digit(): void
    {
        $this->assertEquals(
            3,
            DateTime::fromFormat('Q', '3')->getQuarter()
        );
    }

    public function testDateTimeFromFormatStandaloneQuarter2Digits(): void
    {
        $this->assertEquals(
            3,
            DateTime::fromFormat('QQ', '03')->getQuarter()
        );
    }

    /**
     * Month
     */

    public function testDateTimeFromFormatMonth1DigitFull(): void
    {
        $this->assertEquals(
            10,
            DateTime::fromFormat('M', '10')->getMonth()
        );
    }

    public function testDateTimeFromFormatMonth1Digit(): void
    {
        $this->assertEquals(
            1,
            DateTime::fromFormat('M', '1')->getMonth()
        );
    }

    public function testDateTimeFromFormatMonth2DigitsFull(): void
    {
        $this->assertEquals(
            10,
            DateTime::fromFormat('MM', '10')->getMonth()
        );
    }

    public function testDateTimeFromFormatMonth2Digits(): void
    {
        $this->assertEquals(
            1,
            DateTime::fromFormat('MM', '01')->getMonth()
        );
    }

    public function testDateTimeFromFormatMonthShort(): void
    {
        $this->assertEquals(
            10,
            DateTime::fromFormat('MMM', 'Oct')->getMonth()
        );
    }

    public function testDateTimeFromFormatMonthLong(): void
    {
        $this->assertEquals(
            10,
            DateTime::fromFormat('MMMM', 'October')->getMonth()
        );
    }

    // public function testDateTimeFromFormatMonthNarrow(): void
    // {
    //     $this->assertEquals(
    //         10,
    //         DateTime::fromFormat('MMMMM', 'O')->getMonth()
    //     );
    // }

    public function testDateTimeFromFormatStandaloneMonth1DigitFull(): void
    {
        $this->assertEquals(
            10,
            DateTime::fromFormat('L', '10')->getMonth()
        );
    }

    public function testDateTimeFromFormatStandaloneMonth1Digit(): void
    {
        $this->assertEquals(
            1,
            DateTime::fromFormat('L', '1')->getMonth()
        );
    }

    public function testDateTimeFromFormatStandaloneMonth2DigitsFull(): void
    {
        $this->assertEquals(
            10,
            DateTime::fromFormat('LL', '10')->getMonth()
        );
    }

    public function testDateTimeFromFormatStandaloneMonth2Digits(): void
    {
        $this->assertEquals(
            1,
            DateTime::fromFormat('LL', '01')->getMonth()
        );
    }

    public function testDateTimeFromFormatStandaloneMonthShort(): void
    {
        $this->assertEquals(
            10,
            DateTime::fromFormat('LLL', 'Oct')->getMonth()
        );
    }

    public function testDateTimeFromFormatStandaloneMonthLong(): void
    {
        $this->assertEquals(
            10,
            DateTime::fromFormat('LLLL', 'October')->getMonth()
        );
    }

    // public function testDateTimeFromFormatStandaloneMonthNarrow(): void
    // {
    //     $this->assertEquals(
    //         10,
    //         DateTime::fromFormat('LLLLL', 'O')->getMonth()
    //     );
    // }

    /**
     * Week
     */

    public function testDateTimeFromFormatWeek1DigitFull(): void
    {
        $this->assertEquals(
            22,
            DateTime::fromFormat('w', '22')->getWeek()
        );
    }

    public function testDateTimeFromFormatWeek1Digit(): void
    {
        $this->assertEquals(
            1,
            DateTime::fromFormat('w', '1')->getWeek()
        );
    }

    public function testDateTimeFromFormatWeek2DigitsFull(): void
    {
        $this->assertEquals(
            22,
            DateTime::fromFormat('ww', '22')->getWeek()
        );
    }

    public function testDateTimeFromFormatWeek2Digits(): void
    {
        $this->assertEquals(
            1,
            DateTime::fromFormat('ww', '01')->getWeek()
        );
    }

    public function testDateTimeFromFormatWeekOfMonth(): void
    {
        $this->assertEquals(
            3,
            DateTime::fromFormat('W', '3')->getWeekOfMonth()
        );
    }

    /**
     * Day
     */

    public function testDateTimeFromFormatDayOfMonth1DigitFull(): void
    {
        $this->assertEquals(
            21,
            DateTime::fromFormat('d', '21')->getDate()
        );
    }

    public function testDateTimeFromFormatDayOfMonth1Digit(): void
    {
        $this->assertEquals(
            1,
            DateTime::fromFormat('d', '1')->getDate()
        );
    }

    public function testDateTimeFromFormatDayOfMonth2DigitsFull(): void
    {
        $this->assertEquals(
            21,
            DateTime::fromFormat('dd', '21')->getDate()
        );
    }

    public function testDateTimeFromFormatDayOfMonth2Digits(): void
    {
        $this->assertEquals(
            1,
            DateTime::fromFormat('dd', '01')->getDate()
        );
    }

    public function testDateTimeFromFormatDayOfYear1DigitFull(): void
    {
        $this->assertEquals(
            152,
            DateTime::fromFormat('D', '152')->getDayOfYear()
        );
    }

    public function testDateTimeFromFormatDayOfYear1Digit(): void
    {
        $this->assertEquals(
            1,
            DateTime::fromFormat('D', '1')->getDayOfYear()
        );
    }

    public function testDateTimeFromFormatDayOfYear2DigitsFull(): void
    {
        $this->assertEquals(
            152,
            DateTime::fromFormat('DD', '152')->getDayOfYear()
        );
    }

    public function testDateTimeFromFormatDayOfYear2Digits(): void
    {
        $this->assertEquals(
            1,
            DateTime::fromFormat('DD', '01')->getDayOfYear()
        );
    }

    public function testDateTimeFromFormatDayOfYear3DigitsFull(): void
    {
        $this->assertEquals(
            152,
            DateTime::fromFormat('DDD', '152')->getDayOfYear()
        );
    }

    public function testDateTimeFromFormatDayOfYear3Digits(): void
    {
        $this->assertEquals(
            1,
            DateTime::fromFormat('DDD', '001')->getDayOfYear()
        );
    }

    public function testDateTimeFromFormatDayOfWeekInMonthMonth(): void
    {
        $this->assertEquals(
            3,
            DateTime::fromFormat('F', '3')->getWeekDayInMonth()
        );
    }

    /**
     * Week Day
     */

    public function testDateTimeFromFormatAltWeekDayShort(): void
    {
        $this->assertEquals(
            6,
            DateTime::fromFormat('EEE', 'Fri')->getWeekDay()
        );
    }

    public function testDateTimeFromFormatAltWeekDayLong(): void
    {
        $this->assertEquals(
            6,
            DateTime::fromFormat('EEEE', 'Friday')->getWeekDay()
        );
    }

    // public function testDateTimeFromFormatAltWeekDayNarrow(): void
    // {
    //     $this->assertEquals(
    //         6,
    //         DateTime::fromFormat('EEEEE', 'F')->getWeekDay()
    //     );
    // }

    public function testDateTimeFromFormatWeekDay1Digit(): void
    {
        $this->assertEquals(
            6,
            DateTime::fromFormat('e', '6')->getWeekDay()
        );
    }

    public function testDateTimeFromFormatWeekDay2Digits(): void
    {
        $this->assertEquals(
            6,
            DateTime::fromFormat('ee', '06')->getWeekDay()
        );
    }

    public function testDateTimeFromFormatWeekDayShort(): void
    {
        $this->assertEquals(
            6,
            DateTime::fromFormat('eee', 'Fri')->getWeekDay()
        );
    }

    public function testDateTimeFromFormatWeekDayLong(): void
    {
        $this->assertEquals(
            6,
            DateTime::fromFormat('eeee', 'Friday')->getWeekDay()
        );
    }

    // public function testDateTimeFromFormatWeekDayNarrow(): void
    // {
    //     $this->assertEquals(
    //         6,
    //         DateTime::fromFormat('eeeee', 'F')->getWeekDay()
    //     );
    // }

    public function testDateTimeFromFormatStandaloneWeekDay1Digit(): void
    {
        $this->assertEquals(
            6,
            DateTime::fromFormat('c', '6')->getWeekDay()
        );
    }

    public function testDateTimeFromFormatStandaloneWeekDay2Digits(): void
    {
        $this->assertEquals(
            6,
            DateTime::fromFormat('cc', '06')->getWeekDay()
        );
    }

    public function testDateTimeFromFormatStandaloneWeekDayShort(): void
    {
        $this->assertEquals(
            6,
            DateTime::fromFormat('ccc', 'Fri')->getWeekDay()
        );
    }

    public function testDateTimeFromFormatStandaloneWeekDayLong(): void
    {
        $this->assertEquals(
            6,
            DateTime::fromFormat('cccc', 'Friday')->getWeekDay()
        );
    }

    // public function testDateTimeFromFormatStandaloneWeekDayNarrow(): void
    // {
    //     $this->assertEquals(
    //         6,
    //         DateTime::fromFormat('ccccc', 'F')->getWeekDay()
    //     );
    // }

    /**
     * Day Period
     */

    public function testDateTimeFromFormatDayPeriodShort(): void
    {
        $this->assertEquals(
            0,
            DateTime::fromFormat('aaa', 'AM')->getHours()
        );
    }

    public function testDateTimeFromFormatDayPeriodShortPm(): void
    {
        $this->assertEquals(
            12,
            DateTime::fromFormat('aaa', 'PM')->getHours()
        );
    }

    public function testDateTimeFromFormatDayPeriodLong(): void
    {
        $this->assertEquals(
            0,
            DateTime::fromFormat('aaaa', 'AM')->getHours()
        );
    }

    public function testDateTimeFromFormatDayPeriodLongPm(): void
    {
        $this->assertEquals(
            12,
            DateTime::fromFormat('aaaa', 'PM')->getHours()
        );
    }

    /**
     * Hour
     */

    public function testDateTimeFromFormat12Hour1Digit(): void
    {
        $this->assertEquals(
            0,
            DateTime::fromFormat('h', '12')->getHours()
        );
    }

    public function testDateTimeFromFormat12Hour1DigitPadding(): void
    {
        $this->assertEquals(
            1,
            DateTime::fromFormat('h', '1')->getHours()
        );
    }

    public function testDateTimeFromFormat12Hour2Digits(): void
    {
        $this->assertEquals(
            0,
            DateTime::fromFormat('hh', '12')->getHours()
        );
    }

    public function testDateTimeFromFormat12Hour2DigitsPadding(): void
    {
        $this->assertEquals(
            1,
            DateTime::fromFormat('hh', '01')->getHours()
        );
    }

    public function testDateTimeFromFormat23Hour1Digit(): void
    {
        $this->assertEquals(
            23,
            DateTime::fromFormat('H', '23')->getHours()
        );
    }

    public function testDateTimeFromFormat23Hour1DigitPadding(): void
    {
        $this->assertEquals(
            0,
            DateTime::fromFormat('H', '0')->getHours()
        );
    }

    public function testDateTimeFromFormat23Hour2Digits(): void
    {
        $this->assertEquals(
            23,
            DateTime::fromFormat('HH', '23')->getHours()
        );
    }

    public function testDateTimeFromFormat23Hour2DigitsPadding(): void
    {
        $this->assertEquals(
            0,
            DateTime::fromFormat('HH', '00')->getHours()
        );
    }


    public function testDateTimeFromFormat11Hour1Digit(): void
    {
        $this->assertEquals(
            11,
            DateTime::fromFormat('K', '11')->getHours()
        );
    }

    public function testDateTimeFromFormat11Hour1DigitPadding(): void
    {
        $this->assertEquals(
            0,
            DateTime::fromFormat('K', '0')->getHours()
        );
    }

    public function testDateTimeFromFormat11Hour2Digits(): void
    {
        $this->assertEquals(
            11,
            DateTime::fromFormat('KK', '11')->getHours()
        );
    }

    public function testDateTimeFromFormat11Hour2DigitsPadding(): void
    {
        $this->assertEquals(
            00,
            DateTime::fromFormat('KK', '00')->getHours()
        );
    }

    public function testDateTimeFromFormat24Hour1Digit(): void
    {
        $this->assertEquals(
            0,
            DateTime::fromFormat('k', '24')->getHours()
        );
    }

    public function testDateTimeFromFormat24Hour1DigitPadding(): void
    {
        $this->assertEquals(
            1,
            DateTime::fromFormat('k', '1')->getHours()
        );
    }

    public function testDateTimeFromFormat24Hour2Digits(): void
    {
        $this->assertEquals(
            0,
            DateTime::fromFormat('kk', '24')->getHours()
        );
    }

    public function testDateTimeFromFormat24Hour2DigitsPadding(): void
    {
        $this->assertEquals(
            1,
            DateTime::fromFormat('kk', '01')->getHours()
        );
    }

    /**
     * Minute
     */

    public function testDateTimeFromFormatMinute1Digit(): void
    {
        $this->assertEquals(
            25,
            DateTime::fromFormat('m', '25')->getMinutes()
        );
    }

    public function testDateTimeFromFormatMinute1DigitPadding(): void
    {
        $this->assertEquals(
            1,
            DateTime::fromFormat('m', '1')->getMinutes()
        );
    }

    public function testDateTimeFromFormatMinute2Digits(): void
    {
        $this->assertEquals(
            25,
            DateTime::fromFormat('mm', '25')->getMinutes()
        );
    }

    public function testDateTimeFromFormatMinute2DigitsPadding(): void
    {
        $this->assertEquals(
            1,
            DateTime::fromFormat('mm', '01')->getMinutes()
        );
    }

    /**
     * Second
     */

    public function testDateTimeFromFormatSecond1Digit(): void
    {
        $this->assertEquals(
            25,
            DateTime::fromFormat('s', '25')->getSeconds()
        );
    }

    public function testDateTimeFromFormatSecond1DigitPadding(): void
    {
        $this->assertEquals(
            1,
            DateTime::fromFormat('s', '1')->getSeconds()
        );
    }

    public function testDateTimeFromFormatSecond2Digits(): void
    {
        $this->assertEquals(
            25,
            DateTime::fromFormat('ss', '25')->getSeconds()
        );
    }

    public function testDateTimeFromFormatSecond2DigitsPadding(): void
    {
        $this->assertEquals(
            1,
            DateTime::fromFormat('ss', '01')->getSeconds()
        );
    }

    public function testDateTimeFromFormatFractional(): void
    {
        $this->assertEquals(
            0,
            DateTime::fromFormat('SSS', '123')->getMilliseconds()
        );
    }

    /**
     * Time Zone
     */

    public function testDateTimeFromFormatTimeZoneIso8601BasicAlt(): void
    {
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            DateTime::fromFormat('dd/MM/yyyy HH:mm:ss ZZZ', '01/01/2019 00:00:00 +0000')->toISOString()
        );
    }

    public function testDateTimeFromFormatTimeZoneIso8601BasicAltTimeZone(): void
    {
        $this->assertEquals(
            '2018-12-31T14:00:00.000+00:00',
            DateTime::fromFormat('dd/MM/yyyy HH:mm:ss ZZZ', '01/01/2019 00:00:00 +1000')->toISOString()
        );
    }

    public function testDateTimeFromFormatTimeZoneLongBasic(): void
    {
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            DateTime::fromFormat('dd/MM/yyyy HH:mm:ss ZZZZ', '01/01/2019 00:00:00 GMT+00:00')->toISOString()
        );
    }

    public function testDateTimeFromFormatTimeZoneLongBasicTimeZone(): void
    {
        $this->assertEquals(
            '2018-12-31T14:00:00.000+00:00',
            DateTime::fromFormat('dd/MM/yyyy HH:mm:ss ZZZZ', '01/01/2019 00:00:00 GMT+10:00')->toISOString()
        );
    }

    public function testDateTimeFromFormatTimeZoneIso8601ExtendedAlt(): void
    {
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            DateTime::fromFormat('dd/MM/yyyy HH:mm:ss ZZZZZ', '01/01/2019 00:00:00 +00:00')->toISOString()
        );
    }

    public function testDateTimeFromFormatTimeZoneIso8601ExtendedAltTimeZone(): void
    {
        $this->assertEquals(
            '2018-12-31T14:00:00.000+00:00',
            DateTime::fromFormat('dd/MM/yyyy HH:mm:ss ZZZZZ', '01/01/2019 00:00:00 +10:00')->toISOString()
        );
    }

    public function testDateTimeFromFormatTimeZoneShortLocalized(): void
    {
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            DateTime::fromFormat('dd/MM/yyyy HH:mm:ss O', '01/01/2019 00:00:00 GMT+00')->toISOString()
        );
    }

    public function testDateTimeFromFormatTimeZoneShortLocalizedTimeZone(): void
    {
        $this->assertEquals(
            '2018-12-31T14:00:00.000+00:00',
            DateTime::fromFormat('dd/MM/yyyy HH:mm:ss O', '01/01/2019 00:00:00 GMT+10')->toISOString()
        );
    }

    public function testDateTimeFromFormatTimeZoneLongLocalized(): void
    {
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            DateTime::fromFormat('dd/MM/yyyy HH:mm:ss OOOO', '01/01/2019 00:00:00 GMT+00:00')->toISOString()
        );
    }

    public function testDateTimeFromFormatTimeZoneLongLocalizedTimeZone(): void
    {
        $this->assertEquals(
            '2018-12-31T14:00:00.000+00:00',
            DateTime::fromFormat('dd/MM/yyyy HH:mm:ss OOOO', '01/01/2019 00:00:00 GMT+10:00')->toISOString()
        );
    }

    public function testDateTimeFromFormatTimeZoneLongTimeZoneId(): void
    {
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            DateTime::fromFormat('dd/MM/yyyy HH:mm:ss VV', '01/01/2019 00:00:00 UTC')->toISOString()
        );
    }

    public function testDateTimeFromFormatTimeZoneLongTimeZoneIdTimeZone(): void
    {
        $this->assertEquals(
            '2018-12-31T14:00:00.000+00:00',
            DateTime::fromFormat('dd/MM/yyyy HH:mm:ss VV', '01/01/2019 00:00:00 Australia/Brisbane')->toISOString()
        );
    }

    public function testDateTimeFromFormatTimeZoneIso8601BasicShortZ(): void
    {
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            DateTime::fromFormat('dd/MM/yyyy HH:mm:ss X', '01/01/2019 00:00:00 Z')->toISOString()
        );
    }

    public function testDateTimeFromFormatTimeZoneIso8601BasicShortZTimeZone(): void
    {
        $this->assertEquals(
            '2018-12-31T14:00:00.000+00:00',
            DateTime::fromFormat('dd/MM/yyyy HH:mm:ss X', '01/01/2019 00:00:00 +10')->toISOString()
        );
    }

    public function testDateTimeFromFormatTimeZoneIso8601BasicZ(): void
    {
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            DateTime::fromFormat('dd/MM/yyyy HH:mm:ss XX', '01/01/2019 00:00:00 Z')->toISOString()
        );
    }

    public function testDateTimeFromFormatTimeZoneIso8601BasicZTimeZone(): void
    {
        $this->assertEquals(
            '2018-12-31T14:00:00.000+00:00',
            DateTime::fromFormat('dd/MM/yyyy HH:mm:ss XX', '01/01/2019 00:00:00 +1000')->toISOString()
        );
    }

    public function testDateTimeFromFormatTimeZoneIso8601ExtendedZ(): void
    {
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            DateTime::fromFormat('dd/MM/yyyy HH:mm:ss XXX', '01/01/2019 00:00:00 Z')->toISOString()
        );
    }

    public function testDateTimeFromFormatTimeZoneIso8601ExtendedZTimeZone(): void
    {
        $this->assertEquals(
            '2018-12-31T14:00:00.000+00:00',
            DateTime::fromFormat('dd/MM/yyyy HH:mm:ss XXX', '01/01/2019 00:00:00 +10:00')->toISOString()
        );
    }

    public function testDateTimeFromFormatTimeZoneIso8601BasicShort(): void
    {
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            DateTime::fromFormat('dd/MM/yyyy HH:mm:ss x', '01/01/2019 00:00:00 +00')->toISOString()
        );
    }

    public function testDateTimeFromFormatTimeZoneIso8601BasicShortTimeZone(): void
    {
        $this->assertEquals(
            '2018-12-31T14:00:00.000+00:00',
            DateTime::fromFormat('dd/MM/yyyy HH:mm:ss x', '01/01/2019 00:00:00 +10')->toISOString()
        );
    }

    public function testDateTimeFromFormatTimeZoneIso8601Basic(): void
    {
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            DateTime::fromFormat('dd/MM/yyyy HH:mm:ss xx', '01/01/2019 00:00:00 +0000')->toISOString()
        );
    }

    public function testDateTimeFromFormatTimeZoneIso8601BasicTimeZone(): void
    {
        $this->assertEquals(
            '2018-12-31T14:00:00.000+00:00',
            DateTime::fromFormat('dd/MM/yyyy HH:mm:ss xx', '01/01/2019 00:00:00 +1000')->toISOString()
        );
    }

    public function testDateTimeFromFormatTimeZoneIso8601Extended(): void
    {
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            DateTime::fromFormat('dd/MM/yyyy HH:mm:ss xxx', '01/01/2019 00:00:00 +00:00')->toISOString()
        );
    }

    public function testDateTimeFromFormatTimeZoneIso8601ExtendedTimeZone(): void
    {
        $this->assertEquals(
            '2018-12-31T14:00:00.000+00:00',
            DateTime::fromFormat('dd/MM/yyyy HH:mm:ss xxx', '01/01/2019 00:00:00 +10:00')->toISOString()
        );
    }

}
