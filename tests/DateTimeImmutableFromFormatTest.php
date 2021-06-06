<?php
declare(strict_types=1);

namespace Tests;

use
    Fyre\DateTimeImmutable;

trait DateTimeImmutableFromFormatTest
{

    /**
     * Era
     */

    public function testDateTimeImmutableFromFormatEraShort(): void
    {
        $this->assertEquals(
            1970,
            DateTimeImmutable::fromFormat('yyyy GGG', '1970 AD')->getYear()
        );
    }

    public function testDateTimeImmutableFromFormatEraShortBc(): void
    {
        $this->assertEquals(
            -1970,
            DateTimeImmutable::fromFormat('yyyy GGG', '1970 BC')->getYear()
        );
    }

    public function testDateTimeImmutableFromFormatEraLong(): void
    {
        $this->assertEquals(
            1970,
            DateTimeImmutable::fromFormat('yyyy GGGG', '1970 Anno Domini')->getYear()
        );
    }

    public function testDateTimeImmutableFromFormatEraLongBc(): void
    {
        $this->assertEquals(
            -1970,
            DateTimeImmutable::fromFormat('yyyy GGGG', '1970 Before Christ')->getYear()
        );
    }

    public function testDateTimeImmutableFromFormatEraNarrow(): void
    {
        $this->assertEquals(
            1970,
            DateTimeImmutable::fromFormat('yyyy GGGGG', '1970 A')->getYear()
        );
    }

    public function testDateTimeImmutableFromFormatEraNarrowBc(): void
    {
        $this->assertEquals(
            -1970,
            DateTimeImmutable::fromFormat('yyyy GGGGG', '1970 B')->getYear()
        );
    }

    /**
     * Year
     */

    public function testDateTimeImmutableFromFormatYear1DigitFull(): void
    {
        $this->assertEquals(
            2018,
            DateTimeImmutable::fromFormat('y', '2018')->getYear()
        );
    }

    public function testDateTimeImmutableFromFormatYear1Digit(): void
    {
        $this->assertEquals(
            5,
            DateTimeImmutable::fromFormat('y', '5')->getYear()
        );
    }

    public function testDateTimeImmutableFromFormatYear2DigitsFull(): void
    {
        $this->assertEquals(
            2018,
            DateTimeImmutable::fromFormat('yy', '2018')->getYear()
        );
    }

    public function testDateTimeImmutableFromFormatYear2Digits(): void
    {
        $this->assertEquals(
            1988,
            DateTimeImmutable::fromFormat('yy', '88')->getYear()
        );
    }

    public function testDateTimeImmutableFromFormatYear3DigitsFull(): void
    {
        $this->assertEquals(
            2018,
            DateTimeImmutable::fromFormat('yyy', '2018')->getYear()
        );
    }

    public function testDateTimeImmutableFromFormatYear3Digits(): void
    {
        $this->assertEquals(
            88,
            DateTimeImmutable::fromFormat('yyy', '088')->getYear()
        );
    }

    public function testDateTimeImmutableFromFormatYear4DigitsFull(): void
    {
        $this->assertEquals(
            2018,
            DateTimeImmutable::fromFormat('yyyy', '2018')->getYear()
        );
    }

    public function testDateTimeImmutableFromFormatYear4Digits(): void
    {
        $this->assertEquals(
            88,
            DateTimeImmutable::fromFormat('yyyy', '0088')->getYear()
        );
    }

    /**
     * Week Year
     */

    public function testDateTimeImmutableFromFormatWeekYear1DigitFull(): void
    {
        $this->assertEquals(
            2018,
            DateTimeImmutable::fromFormat('Y w e', '2018 1 1')->getWeekYear()
        );
    }

    public function testDateTimeImmutableFromFormatWeekYear1Digit(): void
    {
        $this->assertEquals(
            5,
            DateTimeImmutable::fromFormat('Y w e', '5 1 1')->getWeekYear()
        );
    }

    public function testDateTimeImmutableFromFormatWeekYear2DigitsFull(): void
    {
        $this->assertEquals(
            2018,
            DateTimeImmutable::fromFormat('YY w e', '2018 1 1')->getWeekYear()
        );
    }

    public function testDateTimeImmutableFromFormatWeekYear2Digits(): void
    {
        $this->assertEquals(
            1988,
            DateTimeImmutable::fromFormat('YY w e', '88 1 1')->getWeekYear()
        );
    }

    public function testDateTimeImmutableFromFormatWeekYear3DigitsFull(): void
    {
        $this->assertEquals(
            2018,
            DateTimeImmutable::fromFormat('YYY w e', '2018 1 1')->getWeekYear()
        );
    }

    public function testDateTimeImmutableFromFormatWeekYear3Digits(): void
    {
        $this->assertEquals(
            88,
            DateTimeImmutable::fromFormat('YYY w e', '088 1 1')->getWeekYear()
        );
    }

    public function testDateTimeImmutableFromFormatWeekYear4DigitsFull(): void
    {
        $this->assertEquals(
            2018,
            DateTimeImmutable::fromFormat('YYYY w e', '2018 1 1')->getWeekYear()
        );
    }

    public function testDateTimeImmutableFromFormatWeekYear4Digits(): void
    {
        $this->assertEquals(
            88,
            DateTimeImmutable::fromFormat('YYYY w e', '0088 1 1')->getWeekYear()
        );
    }

    /**
     * Quarter
     */

    public function testDateTimeImmutableFromFormatQuarter1Digit(): void
    {
        $this->assertEquals(
            3,
            DateTimeImmutable::fromFormat('q', '3')->getQuarter()
        );
    }

    public function testDateTimeImmutableFromFormatQuarter2Digits(): void
    {
        $this->assertEquals(
            3,
            DateTimeImmutable::fromFormat('qq', '03')->getQuarter()
        );
    }

    public function testDateTimeImmutableFromFormatStandaloneQuarter1Digit(): void
    {
        $this->assertEquals(
            3,
            DateTimeImmutable::fromFormat('Q', '3')->getQuarter()
        );
    }

    public function testDateTimeImmutableFromFormatStandaloneQuarter2Digits(): void
    {
        $this->assertEquals(
            3,
            DateTimeImmutable::fromFormat('QQ', '03')->getQuarter()
        );
    }

    /**
     * Month
     */

    public function testDateTimeImmutableFromFormatMonth1DigitFull(): void
    {
        $this->assertEquals(
            10,
            DateTimeImmutable::fromFormat('M', '10')->getMonth()
        );
    }

    public function testDateTimeImmutableFromFormatMonth1Digit(): void
    {
        $this->assertEquals(
            1,
            DateTimeImmutable::fromFormat('M', '1')->getMonth()
        );
    }

    public function testDateTimeImmutableFromFormatMonth2DigitsFull(): void
    {
        $this->assertEquals(
            10,
            DateTimeImmutable::fromFormat('MM', '10')->getMonth()
        );
    }

    public function testDateTimeImmutableFromFormatMonth2Digits(): void
    {
        $this->assertEquals(
            1,
            DateTimeImmutable::fromFormat('MM', '01')->getMonth()
        );
    }

    public function testDateTimeImmutableFromFormatMonthShort(): void
    {
        $this->assertEquals(
            10,
            DateTimeImmutable::fromFormat('MMM', 'Oct')->getMonth()
        );
    }

    public function testDateTimeImmutableFromFormatMonthLong(): void
    {
        $this->assertEquals(
            10,
            DateTimeImmutable::fromFormat('MMMM', 'October')->getMonth()
        );
    }

    // public function testDateTimeImmutableFromFormatMonthNarrow(): void
    // {
    //     $this->assertEquals(
    //         10,
    //         DateTimeImmutable::fromFormat('MMMMM', 'O')->getMonth()
    //     );
    // }

    public function testDateTimeImmutableFromFormatStandaloneMonth1DigitFull(): void
    {
        $this->assertEquals(
            10,
            DateTimeImmutable::fromFormat('L', '10')->getMonth()
        );
    }

    public function testDateTimeImmutableFromFormatStandaloneMonth1Digit(): void
    {
        $this->assertEquals(
            1,
            DateTimeImmutable::fromFormat('L', '1')->getMonth()
        );
    }

    public function testDateTimeImmutableFromFormatStandaloneMonth2DigitsFull(): void
    {
        $this->assertEquals(
            10,
            DateTimeImmutable::fromFormat('LL', '10')->getMonth()
        );
    }

    public function testDateTimeImmutableFromFormatStandaloneMonth2Digits(): void
    {
        $this->assertEquals(
            1,
            DateTimeImmutable::fromFormat('LL', '01')->getMonth()
        );
    }

    public function testDateTimeImmutableFromFormatStandaloneMonthShort(): void
    {
        $this->assertEquals(
            10,
            DateTimeImmutable::fromFormat('LLL', 'Oct')->getMonth()
        );
    }

    public function testDateTimeImmutableFromFormatStandaloneMonthLong(): void
    {
        $this->assertEquals(
            10,
            DateTimeImmutable::fromFormat('LLLL', 'October')->getMonth()
        );
    }

    // public function testDateTimeImmutableFromFormatStandaloneMonthNarrow(): void
    // {
    //     $this->assertEquals(
    //         10,
    //         DateTimeImmutable::fromFormat('LLLLL', 'O')->getMonth()
    //     );
    // }

    /**
     * Week
     */

    public function testDateTimeImmutableFromFormatWeek1DigitFull(): void
    {
        $this->assertEquals(
            22,
            DateTimeImmutable::fromFormat('w', '22')->getWeek()
        );
    }

    public function testDateTimeImmutableFromFormatWeek1Digit(): void
    {
        $this->assertEquals(
            1,
            DateTimeImmutable::fromFormat('w', '1')->getWeek()
        );
    }

    public function testDateTimeImmutableFromFormatWeek2DigitsFull(): void
    {
        $this->assertEquals(
            22,
            DateTimeImmutable::fromFormat('ww', '22')->getWeek()
        );
    }

    public function testDateTimeImmutableFromFormatWeek2Digits(): void
    {
        $this->assertEquals(
            1,
            DateTimeImmutable::fromFormat('ww', '01')->getWeek()
        );
    }

    public function testDateTimeImmutableFromFormatWeekOfMonth(): void
    {
        $this->assertEquals(
            3,
            DateTimeImmutable::fromFormat('W', '3')->getWeekOfMonth()
        );
    }

    /**
     * Day
     */

    public function testDateTimeImmutableFromFormatDayOfMonth1DigitFull(): void
    {
        $this->assertEquals(
            21,
            DateTimeImmutable::fromFormat('d', '21')->getDate()
        );
    }

    public function testDateTimeImmutableFromFormatDayOfMonth1Digit(): void
    {
        $this->assertEquals(
            1,
            DateTimeImmutable::fromFormat('d', '1')->getDate()
        );
    }

    public function testDateTimeImmutableFromFormatDayOfMonth2DigitsFull(): void
    {
        $this->assertEquals(
            21,
            DateTimeImmutable::fromFormat('dd', '21')->getDate()
        );
    }

    public function testDateTimeImmutableFromFormatDayOfMonth2Digits(): void
    {
        $this->assertEquals(
            1,
            DateTimeImmutable::fromFormat('dd', '01')->getDate()
        );
    }

    public function testDateTimeImmutableFromFormatDayOfYear1DigitFull(): void
    {
        $this->assertEquals(
            152,
            DateTimeImmutable::fromFormat('D', '152')->getDayOfYear()
        );
    }

    public function testDateTimeImmutableFromFormatDayOfYear1Digit(): void
    {
        $this->assertEquals(
            1,
            DateTimeImmutable::fromFormat('D', '1')->getDayOfYear()
        );
    }

    public function testDateTimeImmutableFromFormatDayOfYear2DigitsFull(): void
    {
        $this->assertEquals(
            152,
            DateTimeImmutable::fromFormat('DD', '152')->getDayOfYear()
        );
    }

    public function testDateTimeImmutableFromFormatDayOfYear2Digits(): void
    {
        $this->assertEquals(
            1,
            DateTimeImmutable::fromFormat('DD', '01')->getDayOfYear()
        );
    }

    public function testDateTimeImmutableFromFormatDayOfYear3DigitsFull(): void
    {
        $this->assertEquals(
            152,
            DateTimeImmutable::fromFormat('DDD', '152')->getDayOfYear()
        );
    }

    public function testDateTimeImmutableFromFormatDayOfYear3Digits(): void
    {
        $this->assertEquals(
            1,
            DateTimeImmutable::fromFormat('DDD', '001')->getDayOfYear()
        );
    }

    public function testDateTimeImmutableFromFormatDayOfWeekInMonthMonth(): void
    {
        $this->assertEquals(
            3,
            DateTimeImmutable::fromFormat('F', '3')->getWeekDayInMonth()
        );
    }

    /**
     * Week Day
     */

    public function testDateTimeImmutableFromFormatAltWeekDayShort(): void
    {
        $this->assertEquals(
            6,
            DateTimeImmutable::fromFormat('EEE', 'Fri')->getWeekDay()
        );
    }

    public function testDateTimeImmutableFromFormatAltWeekDayLong(): void
    {
        $this->assertEquals(
            6,
            DateTimeImmutable::fromFormat('EEEE', 'Friday')->getWeekDay()
        );
    }

    // public function testDateTimeImmutableFromFormatAltWeekDayNarrow(): void
    // {
    //     $this->assertEquals(
    //         6,
    //         DateTimeImmutable::fromFormat('EEEEE', 'F')->getWeekDay()
    //     );
    // }

    public function testDateTimeImmutableFromFormatWeekDay1Digit(): void
    {
        $this->assertEquals(
            6,
            DateTimeImmutable::fromFormat('e', '6')->getWeekDay()
        );
    }

    public function testDateTimeImmutableFromFormatWeekDay2Digits(): void
    {
        $this->assertEquals(
            6,
            DateTimeImmutable::fromFormat('ee', '06')->getWeekDay()
        );
    }

    public function testDateTimeImmutableFromFormatWeekDayShort(): void
    {
        $this->assertEquals(
            6,
            DateTimeImmutable::fromFormat('eee', 'Fri')->getWeekDay()
        );
    }

    public function testDateTimeImmutableFromFormatWeekDayLong(): void
    {
        $this->assertEquals(
            6,
            DateTimeImmutable::fromFormat('eeee', 'Friday')->getWeekDay()
        );
    }

    // public function testDateTimeImmutableFromFormatWeekDayNarrow(): void
    // {
    //     $this->assertEquals(
    //         6,
    //         DateTimeImmutable::fromFormat('eeeee', 'F')->getWeekDay()
    //     );
    // }

    public function testDateTimeImmutableFromFormatStandaloneWeekDay1Digit(): void
    {
        $this->assertEquals(
            6,
            DateTimeImmutable::fromFormat('c', '6')->getWeekDay()
        );
    }

    public function testDateTimeImmutableFromFormatStandaloneWeekDay2Digits(): void
    {
        $this->assertEquals(
            6,
            DateTimeImmutable::fromFormat('cc', '06')->getWeekDay()
        );
    }

    public function testDateTimeImmutableFromFormatStandaloneWeekDayShort(): void
    {
        $this->assertEquals(
            6,
            DateTimeImmutable::fromFormat('ccc', 'Fri')->getWeekDay()
        );
    }

    public function testDateTimeImmutableFromFormatStandaloneWeekDayLong(): void
    {
        $this->assertEquals(
            6,
            DateTimeImmutable::fromFormat('cccc', 'Friday')->getWeekDay()
        );
    }

    // public function testDateTimeImmutableFromFormatStandaloneWeekDayNarrow(): void
    // {
    //     $this->assertEquals(
    //         6,
    //         DateTimeImmutable::fromFormat('ccccc', 'F')->getWeekDay()
    //     );
    // }

    /**
     * Day Period
     */

    public function testDateTimeImmutableFromFormatDayPeriodShort(): void
    {
        $this->assertEquals(
            0,
            DateTimeImmutable::fromFormat('aaa', 'AM')->getHours()
        );
    }

    public function testDateTimeImmutableFromFormatDayPeriodShortPm(): void
    {
        $this->assertEquals(
            12,
            DateTimeImmutable::fromFormat('aaa', 'PM')->getHours()
        );
    }

    public function testDateTimeImmutableFromFormatDayPeriodLong(): void
    {
        $this->assertEquals(
            0,
            DateTimeImmutable::fromFormat('aaaa', 'AM')->getHours()
        );
    }

    public function testDateTimeImmutableFromFormatDayPeriodLongPm(): void
    {
        $this->assertEquals(
            12,
            DateTimeImmutable::fromFormat('aaaa', 'PM')->getHours()
        );
    }

    /**
     * Hour
     */

    public function testDateTimeImmutableFromFormat12Hour1Digit(): void
    {
        $this->assertEquals(
            0,
            DateTimeImmutable::fromFormat('h', '12')->getHours()
        );
    }

    public function testDateTimeImmutableFromFormat12Hour1DigitPadding(): void
    {
        $this->assertEquals(
            1,
            DateTimeImmutable::fromFormat('h', '1')->getHours()
        );
    }

    public function testDateTimeImmutableFromFormat12Hour2Digits(): void
    {
        $this->assertEquals(
            0,
            DateTimeImmutable::fromFormat('hh', '12')->getHours()
        );
    }

    public function testDateTimeImmutableFromFormat12Hour2DigitsPadding(): void
    {
        $this->assertEquals(
            1,
            DateTimeImmutable::fromFormat('hh', '01')->getHours()
        );
    }

    public function testDateTimeImmutableFromFormat23Hour1Digit(): void
    {
        $this->assertEquals(
            23,
            DateTimeImmutable::fromFormat('H', '23')->getHours()
        );
    }

    public function testDateTimeImmutableFromFormat23Hour1DigitPadding(): void
    {
        $this->assertEquals(
            0,
            DateTimeImmutable::fromFormat('H', '0')->getHours()
        );
    }

    public function testDateTimeImmutableFromFormat23Hour2Digits(): void
    {
        $this->assertEquals(
            23,
            DateTimeImmutable::fromFormat('HH', '23')->getHours()
        );
    }

    public function testDateTimeImmutableFromFormat23Hour2DigitsPadding(): void
    {
        $this->assertEquals(
            0,
            DateTimeImmutable::fromFormat('HH', '00')->getHours()
        );
    }


    public function testDateTimeImmutableFromFormat11Hour1Digit(): void
    {
        $this->assertEquals(
            11,
            DateTimeImmutable::fromFormat('K', '11')->getHours()
        );
    }

    public function testDateTimeImmutableFromFormat11Hour1DigitPadding(): void
    {
        $this->assertEquals(
            0,
            DateTimeImmutable::fromFormat('K', '0')->getHours()
        );
    }

    public function testDateTimeImmutableFromFormat11Hour2Digits(): void
    {
        $this->assertEquals(
            11,
            DateTimeImmutable::fromFormat('KK', '11')->getHours()
        );
    }

    public function testDateTimeImmutableFromFormat11Hour2DigitsPadding(): void
    {
        $this->assertEquals(
            00,
            DateTimeImmutable::fromFormat('KK', '00')->getHours()
        );
    }

    public function testDateTimeImmutableFromFormat24Hour1Digit(): void
    {
        $this->assertEquals(
            0,
            DateTimeImmutable::fromFormat('k', '24')->getHours()
        );
    }

    public function testDateTimeImmutableFromFormat24Hour1DigitPadding(): void
    {
        $this->assertEquals(
            1,
            DateTimeImmutable::fromFormat('k', '1')->getHours()
        );
    }

    public function testDateTimeImmutableFromFormat24Hour2Digits(): void
    {
        $this->assertEquals(
            0,
            DateTimeImmutable::fromFormat('kk', '24')->getHours()
        );
    }

    public function testDateTimeImmutableFromFormat24Hour2DigitsPadding(): void
    {
        $this->assertEquals(
            1,
            DateTimeImmutable::fromFormat('kk', '01')->getHours()
        );
    }

    /**
     * Minute
     */

    public function testDateTimeImmutableFromFormatMinute1Digit(): void
    {
        $this->assertEquals(
            25,
            DateTimeImmutable::fromFormat('m', '25')->getMinutes()
        );
    }

    public function testDateTimeImmutableFromFormatMinute1DigitPadding(): void
    {
        $this->assertEquals(
            1,
            DateTimeImmutable::fromFormat('m', '1')->getMinutes()
        );
    }

    public function testDateTimeImmutableFromFormatMinute2Digits(): void
    {
        $this->assertEquals(
            25,
            DateTimeImmutable::fromFormat('mm', '25')->getMinutes()
        );
    }

    public function testDateTimeImmutableFromFormatMinute2DigitsPadding(): void
    {
        $this->assertEquals(
            1,
            DateTimeImmutable::fromFormat('mm', '01')->getMinutes()
        );
    }

    /**
     * Second
     */

    public function testDateTimeImmutableFromFormatSecond1Digit(): void
    {
        $this->assertEquals(
            25,
            DateTimeImmutable::fromFormat('s', '25')->getSeconds()
        );
    }

    public function testDateTimeImmutableFromFormatSecond1DigitPadding(): void
    {
        $this->assertEquals(
            1,
            DateTimeImmutable::fromFormat('s', '1')->getSeconds()
        );
    }

    public function testDateTimeImmutableFromFormatSecond2Digits(): void
    {
        $this->assertEquals(
            25,
            DateTimeImmutable::fromFormat('ss', '25')->getSeconds()
        );
    }

    public function testDateTimeImmutableFromFormatSecond2DigitsPadding(): void
    {
        $this->assertEquals(
            1,
            DateTimeImmutable::fromFormat('ss', '01')->getSeconds()
        );
    }

    public function testDateTimeImmutableFromFormatFractional(): void
    {
        $this->assertEquals(
            0,
            DateTimeImmutable::fromFormat('SSS', '123')->getMilliseconds()
        );
    }

    /**
     * Time Zone
     */

    public function testDateTimeImmutableFromFormatTimeZoneIso8601BasicAlt(): void
    {
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            DateTimeImmutable::fromFormat('dd/MM/yyyy HH:mm:ss ZZZ', '01/01/2019 00:00:00 +0000')->toISOString()
        );
    }

    public function testDateTimeImmutableFromFormatTimeZoneIso8601BasicAltTimeZone(): void
    {
        $this->assertEquals(
            '2018-12-31T14:00:00.000+00:00',
            DateTimeImmutable::fromFormat('dd/MM/yyyy HH:mm:ss ZZZ', '01/01/2019 00:00:00 +1000')->toISOString()
        );
    }

    public function testDateTimeImmutableFromFormatTimeZoneLongBasic(): void
    {
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            DateTimeImmutable::fromFormat('dd/MM/yyyy HH:mm:ss ZZZZ', '01/01/2019 00:00:00 GMT+00:00')->toISOString()
        );
    }

    public function testDateTimeImmutableFromFormatTimeZoneLongBasicTimeZone(): void
    {
        $this->assertEquals(
            '2018-12-31T14:00:00.000+00:00',
            DateTimeImmutable::fromFormat('dd/MM/yyyy HH:mm:ss ZZZZ', '01/01/2019 00:00:00 GMT+10:00')->toISOString()
        );
    }

    public function testDateTimeImmutableFromFormatTimeZoneIso8601ExtendedAlt(): void
    {
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            DateTimeImmutable::fromFormat('dd/MM/yyyy HH:mm:ss ZZZZZ', '01/01/2019 00:00:00 +00:00')->toISOString()
        );
    }

    public function testDateTimeImmutableFromFormatTimeZoneIso8601ExtendedAltTimeZone(): void
    {
        $this->assertEquals(
            '2018-12-31T14:00:00.000+00:00',
            DateTimeImmutable::fromFormat('dd/MM/yyyy HH:mm:ss ZZZZZ', '01/01/2019 00:00:00 +10:00')->toISOString()
        );
    }

    public function testDateTimeImmutableFromFormatTimeZoneShortLocalized(): void
    {
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            DateTimeImmutable::fromFormat('dd/MM/yyyy HH:mm:ss O', '01/01/2019 00:00:00 GMT+00')->toISOString()
        );
    }

    public function testDateTimeImmutableFromFormatTimeZoneShortLocalizedTimeZone(): void
    {
        $this->assertEquals(
            '2018-12-31T14:00:00.000+00:00',
            DateTimeImmutable::fromFormat('dd/MM/yyyy HH:mm:ss O', '01/01/2019 00:00:00 GMT+10')->toISOString()
        );
    }

    public function testDateTimeImmutableFromFormatTimeZoneLongLocalized(): void
    {
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            DateTimeImmutable::fromFormat('dd/MM/yyyy HH:mm:ss OOOO', '01/01/2019 00:00:00 GMT+00:00')->toISOString()
        );
    }

    public function testDateTimeImmutableFromFormatTimeZoneLongLocalizedTimeZone(): void
    {
        $this->assertEquals(
            '2018-12-31T14:00:00.000+00:00',
            DateTimeImmutable::fromFormat('dd/MM/yyyy HH:mm:ss OOOO', '01/01/2019 00:00:00 GMT+10:00')->toISOString()
        );
    }

    public function testDateTimeImmutableFromFormatTimeZoneLongTimeZoneId(): void
    {
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            DateTimeImmutable::fromFormat('dd/MM/yyyy HH:mm:ss VV', '01/01/2019 00:00:00 UTC')->toISOString()
        );
    }

    public function testDateTimeImmutableFromFormatTimeZoneLongTimeZoneIdTimeZone(): void
    {
        $this->assertEquals(
            '2018-12-31T14:00:00.000+00:00',
            DateTimeImmutable::fromFormat('dd/MM/yyyy HH:mm:ss VV', '01/01/2019 00:00:00 Australia/Brisbane')->toISOString()
        );
    }

    public function testDateTimeImmutableFromFormatTimeZoneIso8601BasicShortZ(): void
    {
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            DateTimeImmutable::fromFormat('dd/MM/yyyy HH:mm:ss X', '01/01/2019 00:00:00 Z')->toISOString()
        );
    }

    public function testDateTimeImmutableFromFormatTimeZoneIso8601BasicShortZTimeZone(): void
    {
        $this->assertEquals(
            '2018-12-31T14:00:00.000+00:00',
            DateTimeImmutable::fromFormat('dd/MM/yyyy HH:mm:ss X', '01/01/2019 00:00:00 +10')->toISOString()
        );
    }

    public function testDateTimeImmutableFromFormatTimeZoneIso8601BasicZ(): void
    {
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            DateTimeImmutable::fromFormat('dd/MM/yyyy HH:mm:ss XX', '01/01/2019 00:00:00 Z')->toISOString()
        );
    }

    public function testDateTimeImmutableFromFormatTimeZoneIso8601BasicZTimeZone(): void
    {
        $this->assertEquals(
            '2018-12-31T14:00:00.000+00:00',
            DateTimeImmutable::fromFormat('dd/MM/yyyy HH:mm:ss XX', '01/01/2019 00:00:00 +1000')->toISOString()
        );
    }

    public function testDateTimeImmutableFromFormatTimeZoneIso8601ExtendedZ(): void
    {
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            DateTimeImmutable::fromFormat('dd/MM/yyyy HH:mm:ss XXX', '01/01/2019 00:00:00 Z')->toISOString()
        );
    }

    public function testDateTimeImmutableFromFormatTimeZoneIso8601ExtendedZTimeZone(): void
    {
        $this->assertEquals(
            '2018-12-31T14:00:00.000+00:00',
            DateTimeImmutable::fromFormat('dd/MM/yyyy HH:mm:ss XXX', '01/01/2019 00:00:00 +10:00')->toISOString()
        );
    }

    public function testDateTimeImmutableFromFormatTimeZoneIso8601BasicShort(): void
    {
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            DateTimeImmutable::fromFormat('dd/MM/yyyy HH:mm:ss x', '01/01/2019 00:00:00 +00')->toISOString()
        );
    }

    public function testDateTimeImmutableFromFormatTimeZoneIso8601BasicShortTimeZone(): void
    {
        $this->assertEquals(
            '2018-12-31T14:00:00.000+00:00',
            DateTimeImmutable::fromFormat('dd/MM/yyyy HH:mm:ss x', '01/01/2019 00:00:00 +10')->toISOString()
        );
    }

    public function testDateTimeImmutableFromFormatTimeZoneIso8601Basic(): void
    {
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            DateTimeImmutable::fromFormat('dd/MM/yyyy HH:mm:ss xx', '01/01/2019 00:00:00 +0000')->toISOString()
        );
    }

    public function testDateTimeImmutableFromFormatTimeZoneIso8601BasicTimeZone(): void
    {
        $this->assertEquals(
            '2018-12-31T14:00:00.000+00:00',
            DateTimeImmutable::fromFormat('dd/MM/yyyy HH:mm:ss xx', '01/01/2019 00:00:00 +1000')->toISOString()
        );
    }

    public function testDateTimeImmutableFromFormatTimeZoneIso8601Extended(): void
    {
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            DateTimeImmutable::fromFormat('dd/MM/yyyy HH:mm:ss xxx', '01/01/2019 00:00:00 +00:00')->toISOString()
        );
    }

    public function testDateTimeImmutableFromFormatTimeZoneIso8601ExtendedTimeZone(): void
    {
        $this->assertEquals(
            '2018-12-31T14:00:00.000+00:00',
            DateTimeImmutable::fromFormat('dd/MM/yyyy HH:mm:ss xxx', '01/01/2019 00:00:00 +10:00')->toISOString()
        );
    }

}
