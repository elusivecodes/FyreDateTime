<?php
declare(strict_types=1);

namespace Tests\DateTimeImmutable;

use
    Fyre\DateTime\DateTimeImmutable;

trait FromFormatTest
{

    /**
     * Era
     */

    public function testFromFormatEraShort(): void
    {
        $this->assertEquals(
            1970,
            DateTimeImmutable::fromFormat('yyyy GGG', '1970 AD')->getYear()
        );
    }

    public function testFromFormatEraShortBc(): void
    {
        $this->assertEquals(
            -1970,
            DateTimeImmutable::fromFormat('yyyy GGG', '1970 BC')->getYear()
        );
    }

    public function testFromFormatEraLong(): void
    {
        $this->assertEquals(
            1970,
            DateTimeImmutable::fromFormat('yyyy GGGG', '1970 Anno Domini')->getYear()
        );
    }

    public function testFromFormatEraLongBc(): void
    {
        $this->assertEquals(
            -1970,
            DateTimeImmutable::fromFormat('yyyy GGGG', '1970 Before Christ')->getYear()
        );
    }

    public function testFromFormatEraNarrow(): void
    {
        $this->assertEquals(
            1970,
            DateTimeImmutable::fromFormat('yyyy GGGGG', '1970 A')->getYear()
        );
    }

    public function testFromFormatEraNarrowBc(): void
    {
        $this->assertEquals(
            -1970,
            DateTimeImmutable::fromFormat('yyyy GGGGG', '1970 B')->getYear()
        );
    }

    /**
     * Year
     */

    public function testFromFormatYear1DigitFull(): void
    {
        $this->assertEquals(
            2018,
            DateTimeImmutable::fromFormat('y', '2018')->getYear()
        );
    }

    public function testFromFormatYear1Digit(): void
    {
        $this->assertEquals(
            5,
            DateTimeImmutable::fromFormat('y', '5')->getYear()
        );
    }

    public function testFromFormatYear2DigitsFull(): void
    {
        $this->assertEquals(
            2018,
            DateTimeImmutable::fromFormat('yy', '2018')->getYear()
        );
    }

    public function testFromFormatYear2Digits(): void
    {
        $this->assertEquals(
            1988,
            DateTimeImmutable::fromFormat('yy', '88')->getYear()
        );
    }

    public function testFromFormatYear3DigitsFull(): void
    {
        $this->assertEquals(
            2018,
            DateTimeImmutable::fromFormat('yyy', '2018')->getYear()
        );
    }

    public function testFromFormatYear3Digits(): void
    {
        $this->assertEquals(
            88,
            DateTimeImmutable::fromFormat('yyy', '088')->getYear()
        );
    }

    public function testFromFormatYear4DigitsFull(): void
    {
        $this->assertEquals(
            2018,
            DateTimeImmutable::fromFormat('yyyy', '2018')->getYear()
        );
    }

    public function testFromFormatYear4Digits(): void
    {
        $this->assertEquals(
            88,
            DateTimeImmutable::fromFormat('yyyy', '0088')->getYear()
        );
    }

    /**
     * Week Year
     */

    public function testFromFormatWeekYear1DigitFull(): void
    {
        $this->assertEquals(
            2018,
            DateTimeImmutable::fromFormat('Y w e', '2018 1 1')->getWeekYear()
        );
    }

    public function testFromFormatWeekYear1Digit(): void
    {
        $this->assertEquals(
            5,
            DateTimeImmutable::fromFormat('Y w e', '5 1 1')->getWeekYear()
        );
    }

    public function testFromFormatWeekYear2DigitsFull(): void
    {
        $this->assertEquals(
            2018,
            DateTimeImmutable::fromFormat('YY w e', '2018 1 1')->getWeekYear()
        );
    }

    public function testFromFormatWeekYear2Digits(): void
    {
        $this->assertEquals(
            1988,
            DateTimeImmutable::fromFormat('YY w e', '88 1 1')->getWeekYear()
        );
    }

    public function testFromFormatWeekYear3DigitsFull(): void
    {
        $this->assertEquals(
            2018,
            DateTimeImmutable::fromFormat('YYY w e', '2018 1 1')->getWeekYear()
        );
    }

    public function testFromFormatWeekYear3Digits(): void
    {
        $this->assertEquals(
            88,
            DateTimeImmutable::fromFormat('YYY w e', '088 1 1')->getWeekYear()
        );
    }

    public function testFromFormatWeekYear4DigitsFull(): void
    {
        $this->assertEquals(
            2018,
            DateTimeImmutable::fromFormat('YYYY w e', '2018 1 1')->getWeekYear()
        );
    }

    public function testFromFormatWeekYear4Digits(): void
    {
        $this->assertEquals(
            88,
            DateTimeImmutable::fromFormat('YYYY w e', '0088 1 1')->getWeekYear()
        );
    }

    /**
     * Quarter
     */

    public function testFromFormatQuarter1Digit(): void
    {
        $this->assertEquals(
            3,
            DateTimeImmutable::fromFormat('q', '3')->getQuarter()
        );
    }

    public function testFromFormatQuarter2Digits(): void
    {
        $this->assertEquals(
            3,
            DateTimeImmutable::fromFormat('qq', '03')->getQuarter()
        );
    }

    public function testFromFormatStandaloneQuarter1Digit(): void
    {
        $this->assertEquals(
            3,
            DateTimeImmutable::fromFormat('Q', '3')->getQuarter()
        );
    }

    public function testFromFormatStandaloneQuarter2Digits(): void
    {
        $this->assertEquals(
            3,
            DateTimeImmutable::fromFormat('QQ', '03')->getQuarter()
        );
    }

    /**
     * Month
     */

    public function testFromFormatMonth1DigitFull(): void
    {
        $this->assertEquals(
            10,
            DateTimeImmutable::fromFormat('M', '10')->getMonth()
        );
    }

    public function testFromFormatMonth1Digit(): void
    {
        $this->assertEquals(
            1,
            DateTimeImmutable::fromFormat('M', '1')->getMonth()
        );
    }

    public function testFromFormatMonth2DigitsFull(): void
    {
        $this->assertEquals(
            10,
            DateTimeImmutable::fromFormat('MM', '10')->getMonth()
        );
    }

    public function testFromFormatMonth2Digits(): void
    {
        $this->assertEquals(
            1,
            DateTimeImmutable::fromFormat('MM', '01')->getMonth()
        );
    }

    public function testFromFormatMonthShort(): void
    {
        $this->assertEquals(
            10,
            DateTimeImmutable::fromFormat('MMM', 'Oct')->getMonth()
        );
    }

    public function testFromFormatMonthLong(): void
    {
        $this->assertEquals(
            10,
            DateTimeImmutable::fromFormat('MMMM', 'October')->getMonth()
        );
    }

    // public function testFromFormatMonthNarrow(): void
    // {
    //     $this->assertEquals(
    //         10,
    //         DateTimeImmutable::fromFormat('MMMMM', 'O')->getMonth()
    //     );
    // }

    public function testFromFormatStandaloneMonth1DigitFull(): void
    {
        $this->assertEquals(
            10,
            DateTimeImmutable::fromFormat('L', '10')->getMonth()
        );
    }

    public function testFromFormatStandaloneMonth1Digit(): void
    {
        $this->assertEquals(
            1,
            DateTimeImmutable::fromFormat('L', '1')->getMonth()
        );
    }

    public function testFromFormatStandaloneMonth2DigitsFull(): void
    {
        $this->assertEquals(
            10,
            DateTimeImmutable::fromFormat('LL', '10')->getMonth()
        );
    }

    public function testFromFormatStandaloneMonth2Digits(): void
    {
        $this->assertEquals(
            1,
            DateTimeImmutable::fromFormat('LL', '01')->getMonth()
        );
    }

    public function testFromFormatStandaloneMonthShort(): void
    {
        $this->assertEquals(
            10,
            DateTimeImmutable::fromFormat('LLL', 'Oct')->getMonth()
        );
    }

    public function testFromFormatStandaloneMonthLong(): void
    {
        $this->assertEquals(
            10,
            DateTimeImmutable::fromFormat('LLLL', 'October')->getMonth()
        );
    }

    // public function testFromFormatStandaloneMonthNarrow(): void
    // {
    //     $this->assertEquals(
    //         10,
    //         DateTimeImmutable::fromFormat('LLLLL', 'O')->getMonth()
    //     );
    // }

    /**
     * Week
     */

    public function testFromFormatWeek1DigitFull(): void
    {
        $this->assertEquals(
            22,
            DateTimeImmutable::fromFormat('w', '22')->getWeek()
        );
    }

    public function testFromFormatWeek1Digit(): void
    {
        $this->assertEquals(
            1,
            DateTimeImmutable::fromFormat('w', '1')->getWeek()
        );
    }

    public function testFromFormatWeek2DigitsFull(): void
    {
        $this->assertEquals(
            22,
            DateTimeImmutable::fromFormat('ww', '22')->getWeek()
        );
    }

    public function testFromFormatWeek2Digits(): void
    {
        $this->assertEquals(
            1,
            DateTimeImmutable::fromFormat('ww', '01')->getWeek()
        );
    }

    public function testFromFormatWeekOfMonth(): void
    {
        $this->assertEquals(
            3,
            DateTimeImmutable::fromFormat('W', '3')->getWeekOfMonth()
        );
    }

    /**
     * Day
     */

    public function testFromFormatDayOfMonth1DigitFull(): void
    {
        $this->assertEquals(
            21,
            DateTimeImmutable::fromFormat('d', '21')->getDate()
        );
    }

    public function testFromFormatDayOfMonth1Digit(): void
    {
        $this->assertEquals(
            1,
            DateTimeImmutable::fromFormat('d', '1')->getDate()
        );
    }

    public function testFromFormatDayOfMonth2DigitsFull(): void
    {
        $this->assertEquals(
            21,
            DateTimeImmutable::fromFormat('dd', '21')->getDate()
        );
    }

    public function testFromFormatDayOfMonth2Digits(): void
    {
        $this->assertEquals(
            1,
            DateTimeImmutable::fromFormat('dd', '01')->getDate()
        );
    }

    public function testFromFormatDayOfYear1DigitFull(): void
    {
        $this->assertEquals(
            152,
            DateTimeImmutable::fromFormat('D', '152')->getDayOfYear()
        );
    }

    public function testFromFormatDayOfYear1Digit(): void
    {
        $this->assertEquals(
            1,
            DateTimeImmutable::fromFormat('D', '1')->getDayOfYear()
        );
    }

    public function testFromFormatDayOfYear2DigitsFull(): void
    {
        $this->assertEquals(
            152,
            DateTimeImmutable::fromFormat('DD', '152')->getDayOfYear()
        );
    }

    public function testFromFormatDayOfYear2Digits(): void
    {
        $this->assertEquals(
            1,
            DateTimeImmutable::fromFormat('DD', '01')->getDayOfYear()
        );
    }

    public function testFromFormatDayOfYear3DigitsFull(): void
    {
        $this->assertEquals(
            152,
            DateTimeImmutable::fromFormat('DDD', '152')->getDayOfYear()
        );
    }

    public function testFromFormatDayOfYear3Digits(): void
    {
        $this->assertEquals(
            1,
            DateTimeImmutable::fromFormat('DDD', '001')->getDayOfYear()
        );
    }

    public function testFromFormatDayOfWeekInMonthMonth(): void
    {
        $this->assertEquals(
            3,
            DateTimeImmutable::fromFormat('F', '3')->getWeekDayInMonth()
        );
    }

    /**
     * Week Day
     */

    public function testFromFormatAltWeekDayShort(): void
    {
        $this->assertEquals(
            6,
            DateTimeImmutable::fromFormat('EEE', 'Fri')->getWeekDay()
        );
    }

    public function testFromFormatAltWeekDayLong(): void
    {
        $this->assertEquals(
            6,
            DateTimeImmutable::fromFormat('EEEE', 'Friday')->getWeekDay()
        );
    }

    // public function testFromFormatAltWeekDayNarrow(): void
    // {
    //     $this->assertEquals(
    //         6,
    //         DateTimeImmutable::fromFormat('EEEEE', 'F')->getWeekDay()
    //     );
    // }

    public function testFromFormatWeekDay1Digit(): void
    {
        $this->assertEquals(
            6,
            DateTimeImmutable::fromFormat('e', '6')->getWeekDay()
        );
    }

    public function testFromFormatWeekDay2Digits(): void
    {
        $this->assertEquals(
            6,
            DateTimeImmutable::fromFormat('ee', '06')->getWeekDay()
        );
    }

    public function testFromFormatWeekDayShort(): void
    {
        $this->assertEquals(
            6,
            DateTimeImmutable::fromFormat('eee', 'Fri')->getWeekDay()
        );
    }

    public function testFromFormatWeekDayLong(): void
    {
        $this->assertEquals(
            6,
            DateTimeImmutable::fromFormat('eeee', 'Friday')->getWeekDay()
        );
    }

    // public function testFromFormatWeekDayNarrow(): void
    // {
    //     $this->assertEquals(
    //         6,
    //         DateTimeImmutable::fromFormat('eeeee', 'F')->getWeekDay()
    //     );
    // }

    public function testFromFormatStandaloneWeekDay1Digit(): void
    {
        $this->assertEquals(
            6,
            DateTimeImmutable::fromFormat('c', '6')->getWeekDay()
        );
    }

    public function testFromFormatStandaloneWeekDay2Digits(): void
    {
        $this->assertEquals(
            6,
            DateTimeImmutable::fromFormat('cc', '06')->getWeekDay()
        );
    }

    public function testFromFormatStandaloneWeekDayShort(): void
    {
        $this->assertEquals(
            6,
            DateTimeImmutable::fromFormat('ccc', 'Fri')->getWeekDay()
        );
    }

    public function testFromFormatStandaloneWeekDayLong(): void
    {
        $this->assertEquals(
            6,
            DateTimeImmutable::fromFormat('cccc', 'Friday')->getWeekDay()
        );
    }

    // public function testFromFormatStandaloneWeekDayNarrow(): void
    // {
    //     $this->assertEquals(
    //         6,
    //         DateTimeImmutable::fromFormat('ccccc', 'F')->getWeekDay()
    //     );
    // }

    /**
     * Day Period
     */

    public function testFromFormatDayPeriodShort(): void
    {
        $this->assertEquals(
            0,
            DateTimeImmutable::fromFormat('aaa', 'AM')->getHours()
        );
    }

    public function testFromFormatDayPeriodShortPm(): void
    {
        $this->assertEquals(
            12,
            DateTimeImmutable::fromFormat('aaa', 'PM')->getHours()
        );
    }

    public function testFromFormatDayPeriodLong(): void
    {
        $this->assertEquals(
            0,
            DateTimeImmutable::fromFormat('aaaa', 'AM')->getHours()
        );
    }

    public function testFromFormatDayPeriodLongPm(): void
    {
        $this->assertEquals(
            12,
            DateTimeImmutable::fromFormat('aaaa', 'PM')->getHours()
        );
    }

    /**
     * Hour
     */

    public function testFromFormat12Hour1Digit(): void
    {
        $this->assertEquals(
            0,
            DateTimeImmutable::fromFormat('h', '12')->getHours()
        );
    }

    public function testFromFormat12Hour1DigitPadding(): void
    {
        $this->assertEquals(
            1,
            DateTimeImmutable::fromFormat('h', '1')->getHours()
        );
    }

    public function testFromFormat12Hour2Digits(): void
    {
        $this->assertEquals(
            0,
            DateTimeImmutable::fromFormat('hh', '12')->getHours()
        );
    }

    public function testFromFormat12Hour2DigitsPadding(): void
    {
        $this->assertEquals(
            1,
            DateTimeImmutable::fromFormat('hh', '01')->getHours()
        );
    }

    public function testFromFormat23Hour1Digit(): void
    {
        $this->assertEquals(
            23,
            DateTimeImmutable::fromFormat('H', '23')->getHours()
        );
    }

    public function testFromFormat23Hour1DigitPadding(): void
    {
        $this->assertEquals(
            0,
            DateTimeImmutable::fromFormat('H', '0')->getHours()
        );
    }

    public function testFromFormat23Hour2Digits(): void
    {
        $this->assertEquals(
            23,
            DateTimeImmutable::fromFormat('HH', '23')->getHours()
        );
    }

    public function testFromFormat23Hour2DigitsPadding(): void
    {
        $this->assertEquals(
            0,
            DateTimeImmutable::fromFormat('HH', '00')->getHours()
        );
    }


    public function testFromFormat11Hour1Digit(): void
    {
        $this->assertEquals(
            11,
            DateTimeImmutable::fromFormat('K', '11')->getHours()
        );
    }

    public function testFromFormat11Hour1DigitPadding(): void
    {
        $this->assertEquals(
            0,
            DateTimeImmutable::fromFormat('K', '0')->getHours()
        );
    }

    public function testFromFormat11Hour2Digits(): void
    {
        $this->assertEquals(
            11,
            DateTimeImmutable::fromFormat('KK', '11')->getHours()
        );
    }

    public function testFromFormat11Hour2DigitsPadding(): void
    {
        $this->assertEquals(
            00,
            DateTimeImmutable::fromFormat('KK', '00')->getHours()
        );
    }

    public function testFromFormat24Hour1Digit(): void
    {
        $this->assertEquals(
            0,
            DateTimeImmutable::fromFormat('k', '24')->getHours()
        );
    }

    public function testFromFormat24Hour1DigitPadding(): void
    {
        $this->assertEquals(
            1,
            DateTimeImmutable::fromFormat('k', '1')->getHours()
        );
    }

    public function testFromFormat24Hour2Digits(): void
    {
        $this->assertEquals(
            0,
            DateTimeImmutable::fromFormat('kk', '24')->getHours()
        );
    }

    public function testFromFormat24Hour2DigitsPadding(): void
    {
        $this->assertEquals(
            1,
            DateTimeImmutable::fromFormat('kk', '01')->getHours()
        );
    }

    /**
     * Minute
     */

    public function testFromFormatMinute1Digit(): void
    {
        $this->assertEquals(
            25,
            DateTimeImmutable::fromFormat('m', '25')->getMinutes()
        );
    }

    public function testFromFormatMinute1DigitPadding(): void
    {
        $this->assertEquals(
            1,
            DateTimeImmutable::fromFormat('m', '1')->getMinutes()
        );
    }

    public function testFromFormatMinute2Digits(): void
    {
        $this->assertEquals(
            25,
            DateTimeImmutable::fromFormat('mm', '25')->getMinutes()
        );
    }

    public function testFromFormatMinute2DigitsPadding(): void
    {
        $this->assertEquals(
            1,
            DateTimeImmutable::fromFormat('mm', '01')->getMinutes()
        );
    }

    /**
     * Second
     */

    public function testFromFormatSecond1Digit(): void
    {
        $this->assertEquals(
            25,
            DateTimeImmutable::fromFormat('s', '25')->getSeconds()
        );
    }

    public function testFromFormatSecond1DigitPadding(): void
    {
        $this->assertEquals(
            1,
            DateTimeImmutable::fromFormat('s', '1')->getSeconds()
        );
    }

    public function testFromFormatSecond2Digits(): void
    {
        $this->assertEquals(
            25,
            DateTimeImmutable::fromFormat('ss', '25')->getSeconds()
        );
    }

    public function testFromFormatSecond2DigitsPadding(): void
    {
        $this->assertEquals(
            1,
            DateTimeImmutable::fromFormat('ss', '01')->getSeconds()
        );
    }

    public function testFromFormatFractional(): void
    {
        $this->assertEquals(
            0,
            DateTimeImmutable::fromFormat('SSS', '123')->getMilliseconds()
        );
    }

    /**
     * Time Zone
     */

    public function testFromFormatTimeZoneIso8601BasicAlt(): void
    {
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            DateTimeImmutable::fromFormat('dd/MM/yyyy HH:mm:ss ZZZ', '01/01/2019 00:00:00 +0000')->toISOString()
        );
    }

    public function testFromFormatTimeZoneIso8601BasicAltTimeZone(): void
    {
        $this->assertEquals(
            '2018-12-31T14:00:00.000+00:00',
            DateTimeImmutable::fromFormat('dd/MM/yyyy HH:mm:ss ZZZ', '01/01/2019 00:00:00 +1000')->toISOString()
        );
    }

    public function testFromFormatTimeZoneLongBasic(): void
    {
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            DateTimeImmutable::fromFormat('dd/MM/yyyy HH:mm:ss ZZZZ', '01/01/2019 00:00:00 GMT+00:00')->toISOString()
        );
    }

    public function testFromFormatTimeZoneLongBasicTimeZone(): void
    {
        $this->assertEquals(
            '2018-12-31T14:00:00.000+00:00',
            DateTimeImmutable::fromFormat('dd/MM/yyyy HH:mm:ss ZZZZ', '01/01/2019 00:00:00 GMT+10:00')->toISOString()
        );
    }

    public function testFromFormatTimeZoneIso8601ExtendedAlt(): void
    {
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            DateTimeImmutable::fromFormat('dd/MM/yyyy HH:mm:ss ZZZZZ', '01/01/2019 00:00:00 +00:00')->toISOString()
        );
    }

    public function testFromFormatTimeZoneIso8601ExtendedAltTimeZone(): void
    {
        $this->assertEquals(
            '2018-12-31T14:00:00.000+00:00',
            DateTimeImmutable::fromFormat('dd/MM/yyyy HH:mm:ss ZZZZZ', '01/01/2019 00:00:00 +10:00')->toISOString()
        );
    }

    public function testFromFormatTimeZoneShortLocalized(): void
    {
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            DateTimeImmutable::fromFormat('dd/MM/yyyy HH:mm:ss O', '01/01/2019 00:00:00 GMT+00')->toISOString()
        );
    }

    public function testFromFormatTimeZoneShortLocalizedTimeZone(): void
    {
        $this->assertEquals(
            '2018-12-31T14:00:00.000+00:00',
            DateTimeImmutable::fromFormat('dd/MM/yyyy HH:mm:ss O', '01/01/2019 00:00:00 GMT+10')->toISOString()
        );
    }

    public function testFromFormatTimeZoneLongLocalized(): void
    {
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            DateTimeImmutable::fromFormat('dd/MM/yyyy HH:mm:ss OOOO', '01/01/2019 00:00:00 GMT+00:00')->toISOString()
        );
    }

    public function testFromFormatTimeZoneLongLocalizedTimeZone(): void
    {
        $this->assertEquals(
            '2018-12-31T14:00:00.000+00:00',
            DateTimeImmutable::fromFormat('dd/MM/yyyy HH:mm:ss OOOO', '01/01/2019 00:00:00 GMT+10:00')->toISOString()
        );
    }

    public function testFromFormatTimeZoneLongTimeZoneId(): void
    {
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            DateTimeImmutable::fromFormat('dd/MM/yyyy HH:mm:ss VV', '01/01/2019 00:00:00 UTC')->toISOString()
        );
    }

    public function testFromFormatTimeZoneLongTimeZoneIdTimeZone(): void
    {
        $this->assertEquals(
            '2018-12-31T14:00:00.000+00:00',
            DateTimeImmutable::fromFormat('dd/MM/yyyy HH:mm:ss VV', '01/01/2019 00:00:00 Australia/Brisbane')->toISOString()
        );
    }

    public function testFromFormatTimeZoneIso8601BasicShortZ(): void
    {
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            DateTimeImmutable::fromFormat('dd/MM/yyyy HH:mm:ss X', '01/01/2019 00:00:00 Z')->toISOString()
        );
    }

    public function testFromFormatTimeZoneIso8601BasicShortZTimeZone(): void
    {
        $this->assertEquals(
            '2018-12-31T14:00:00.000+00:00',
            DateTimeImmutable::fromFormat('dd/MM/yyyy HH:mm:ss X', '01/01/2019 00:00:00 +10')->toISOString()
        );
    }

    public function testFromFormatTimeZoneIso8601BasicZ(): void
    {
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            DateTimeImmutable::fromFormat('dd/MM/yyyy HH:mm:ss XX', '01/01/2019 00:00:00 Z')->toISOString()
        );
    }

    public function testFromFormatTimeZoneIso8601BasicZTimeZone(): void
    {
        $this->assertEquals(
            '2018-12-31T14:00:00.000+00:00',
            DateTimeImmutable::fromFormat('dd/MM/yyyy HH:mm:ss XX', '01/01/2019 00:00:00 +1000')->toISOString()
        );
    }

    public function testFromFormatTimeZoneIso8601ExtendedZ(): void
    {
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            DateTimeImmutable::fromFormat('dd/MM/yyyy HH:mm:ss XXX', '01/01/2019 00:00:00 Z')->toISOString()
        );
    }

    public function testFromFormatTimeZoneIso8601ExtendedZTimeZone(): void
    {
        $this->assertEquals(
            '2018-12-31T14:00:00.000+00:00',
            DateTimeImmutable::fromFormat('dd/MM/yyyy HH:mm:ss XXX', '01/01/2019 00:00:00 +10:00')->toISOString()
        );
    }

    public function testFromFormatTimeZoneIso8601BasicShort(): void
    {
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            DateTimeImmutable::fromFormat('dd/MM/yyyy HH:mm:ss x', '01/01/2019 00:00:00 +00')->toISOString()
        );
    }

    public function testFromFormatTimeZoneIso8601BasicShortTimeZone(): void
    {
        $this->assertEquals(
            '2018-12-31T14:00:00.000+00:00',
            DateTimeImmutable::fromFormat('dd/MM/yyyy HH:mm:ss x', '01/01/2019 00:00:00 +10')->toISOString()
        );
    }

    public function testFromFormatTimeZoneIso8601Basic(): void
    {
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            DateTimeImmutable::fromFormat('dd/MM/yyyy HH:mm:ss xx', '01/01/2019 00:00:00 +0000')->toISOString()
        );
    }

    public function testFromFormatTimeZoneIso8601BasicTimeZone(): void
    {
        $this->assertEquals(
            '2018-12-31T14:00:00.000+00:00',
            DateTimeImmutable::fromFormat('dd/MM/yyyy HH:mm:ss xx', '01/01/2019 00:00:00 +1000')->toISOString()
        );
    }

    public function testFromFormatTimeZoneIso8601Extended(): void
    {
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            DateTimeImmutable::fromFormat('dd/MM/yyyy HH:mm:ss xxx', '01/01/2019 00:00:00 +00:00')->toISOString()
        );
    }

    public function testFromFormatTimeZoneIso8601ExtendedTimeZone(): void
    {
        $this->assertEquals(
            '2018-12-31T14:00:00.000+00:00',
            DateTimeImmutable::fromFormat('dd/MM/yyyy HH:mm:ss xxx', '01/01/2019 00:00:00 +10:00')->toISOString()
        );
    }

}
