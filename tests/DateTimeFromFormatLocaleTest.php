<?php
declare(strict_types=1);

namespace Tests;

use
    Fyre\DateTime;

trait DateTimeFromFormatLocaleTest
{

    /**
     * Era
     */

    public function testDateTimeFromFormatLocaleEraShort(): void
    {
        $this->assertEquals(
            1970,
            DateTime::fromFormat('yyyy GGG', '1970 н. э.', null, 'ru')->getYear()
        );
    }

    public function testDateTimeFromFormatLocaleEraShortBc(): void
    {
        $this->assertEquals(
            -1970,
            DateTime::fromFormat('yyyy GGG', '1970 до н. э.', null, 'ru')->getYear()
        );
    }

    public function testDateTimeFromFormatLocaleEraLong(): void
    {
        $this->assertEquals(
            1970,
            DateTime::fromFormat('yyyy GGGG', '1970 от Рождества Христова', null, 'ru')->getYear()
        );
    }

    public function testDateTimeFromFormatLocaleEraLongBc(): void
    {
        $this->assertEquals(
            -1970,
            DateTime::fromFormat('yyyy GGGG', '1970 до Рождества Христова', null, 'ru')->getYear()
        );
    }

    public function testDateTimeFromFormatLocaleEraNarrow(): void
    {
        $this->assertEquals(
            1970,
            DateTime::fromFormat('yyyy GGGGG', '1970 н.э.', null, 'ru')->getYear()
        );
    }

    public function testDateTimeFromFormatLocaleEraNarrowBc(): void
    {
        $this->assertEquals(
            -1970,
            DateTime::fromFormat('yyyy GGGGG', '1970 до н.э.', null, 'ru')->getYear()
        );
    }

    /**
     * Year
     */

    public function testDateTimeFromFormatLocaleYear1DigitFull(): void
    {
        $this->assertEquals(
            2018,
            DateTime::fromFormat('y', '٢٠١٨', null, 'ar-eg')->getYear()
        );
    }

    public function testDateTimeFromFormatLocaleYear1Digit(): void
    {
        $this->assertEquals(
            5,
            DateTime::fromFormat('y', '٥', null, 'ar-eg')->getYear()
        );
    }

    public function testDateTimeFromFormatLocaleYear2DigitsFull(): void
    {
        $this->assertEquals(
            2018,
            DateTime::fromFormat('yy', '٢٠١٨', null, 'ar-eg')->getYear()
        );
    }

    public function testDateTimeFromFormatLocaleYear2Digits(): void
    {
        $this->assertEquals(
            1988,
            DateTime::fromFormat('yy', '٨٨', null, 'ar-eg')->getYear()
        );
    }

    public function testDateTimeFromFormatLocaleYear3DigitsFull(): void
    {
        $this->assertEquals(
            2018,
            DateTime::fromFormat('yyy', '٢٠١٨', null, 'ar-eg')->getYear()
        );
    }

    public function testDateTimeFromFormatLocaleYear3Digits(): void
    {
        $this->assertEquals(
            88,
            DateTime::fromFormat('yyy', '٠٨٨', null, 'ar-eg')->getYear()
        );
    }

    public function testDateTimeFromFormatLocaleYear4DigitsFull(): void
    {
        $this->assertEquals(
            2018,
            DateTime::fromFormat('yyyy', '٢٠١٨', null, 'ar-eg')->getYear()
        );
    }

    public function testDateTimeFromFormatLocaleYear4Digits(): void
    {
        $this->assertEquals(
            88,
            DateTime::fromFormat('yyyy', '٠٠٨٨', null, 'ar-eg')->getYear()
        );
    }

    /**
     * Week Year
     */

    public function testDateTimeFromFormatLocaleWeekYear1DigitFull(): void
    {
        $this->assertEquals(
            2018,
            DateTime::fromFormat('Y w e', '٢٠١٨ ١ ٣', null, 'ar-eg')->getWeekYear()
        );
    }

    public function testDateTimeFromFormatLocaleWeekYear1Digit(): void
    {
        $this->assertEquals(
            5,
            DateTime::fromFormat('Y w e', '٥ ١ ١', null, 'ar-eg')->getWeekYear()
        );
    }

    public function testDateTimeFromFormatLocaleWeekYear2DigitsFull(): void
    {
        $this->assertEquals(
            2018,
            DateTime::fromFormat('YY w e', '٢٠١٨ ١ ٣', null, 'ar-eg')->getWeekYear()
        );
    }

    public function testDateTimeFromFormatLocaleWeekYear2Digits(): void
    {
        $this->assertEquals(
            1988,
            DateTime::fromFormat('YY w e', '٨٨ ١ ٦', null, 'ar-eg')->getWeekYear()
        );
    }

    public function testDateTimeFromFormatLocaleWeekYear3DigitsFull(): void
    {
        $this->assertEquals(
            2018,
            DateTime::fromFormat('YYY w e', '٢٠١٨ ١ ٣', null, 'ar-eg')->getWeekYear()
        );
    }

    public function testDateTimeFromFormatLocaleWeekYear3Digits(): void
    {
        $this->assertEquals(
            88,
            DateTime::fromFormat('YYY w e', '٠٨٨ ١ ٦', null, 'ar-eg')->getWeekYear()
        );
    }

    public function testDateTimeFromFormatLocaleWeekYear4DigitsFull(): void
    {
        $this->assertEquals(
            2018,
            DateTime::fromFormat('YYYY w e', '٢٠١٨ ١ ٣', null, 'ar-eg')->getWeekYear()
        );
    }

    public function testDateTimeFromFormatLocaleWeekYear4Digits(): void
    {
        $this->assertEquals(
            88,
            DateTime::fromFormat('YYYY w e', '٠٠٨٨ ١ ٦', null, 'ar-eg')->getWeekYear()
        );
    }

    /**
     * Quarter
     */

    public function testDateTimeFromFormatLocaleQuarter1Digit(): void
    {
        $this->assertEquals(
            3,
            DateTime::fromFormat('q', '٣', null, 'ar-eg')->getQuarter()
        );
    }

    public function testDateTimeFromFormatLocaleQuarter2Digits(): void
    {
        $this->assertEquals(
            3,
            DateTime::fromFormat('qq', '٠٣', null, 'ar-eg')->getQuarter()
        );
    }

    public function testDateTimeFromFormatLocaleStandaloneQuarter1Digit(): void
    {
        $this->assertEquals(
            3,
            DateTime::fromFormat('Q', '٣', null, 'ar-eg')->getQuarter()
        );
    }

    public function testDateTimeFromFormatLocaleStandaloneQuarter2Digits(): void
    {
        $this->assertEquals(
            3,
            DateTime::fromFormat('QQ', '٠٣', null, 'ar-eg')->getQuarter()
        );
    }

    /**
     * Month
     */

    public function testDateTimeFromFormatLocaleMonth1DigitFull(): void
    {
        $this->assertEquals(
            10,
            DateTime::fromFormat('M', '١٠', null, 'ar-eg')->getMonth()
        );
    }

    public function testDateTimeFromFormatLocaleMonth1Digit(): void
    {
        $this->assertEquals(
            1,
            DateTime::fromFormat('M', '١', null, 'ar-eg')->getMonth()
        );
    }

    public function testDateTimeFromFormatLocaleMonth2DigitsFull(): void
    {
        $this->assertEquals(
            10,
            DateTime::fromFormat('MM', '١٠', null, 'ar-eg')->getMonth()
        );
    }

    public function testDateTimeFromFormatLocaleMonth2Digits(): void
    {
        $this->assertEquals(
            1,
            DateTime::fromFormat('MM', '٠١', null, 'ar-eg')->getMonth()
        );
    }

    public function testDateTimeFromFormatLocaleMonthShort(): void
    {
        $this->assertEquals(
            10,
            DateTime::fromFormat('MMM', 'окт.', null, 'ru')->getMonth()
        );
    }

    public function testDateTimeFromFormatLocaleMonthLong(): void
    {
        $this->assertEquals(
            10,
            DateTime::fromFormat('MMMM', 'октября', null, 'ru')->getMonth()
        );
    }

    // public function testDateTimeFromFormatLocaleMonthNarrow(): void
    // {
    //     $this->assertEquals(
    //         10,
    //         DateTime::fromFormat('MMMMM', 'О', null, 'ru')->getMonth()
    //     );
    // }

    public function testDateTimeFromFormatLocaleStandaloneMonth1DigitFull(): void
    {
        $this->assertEquals(
            10,
            DateTime::fromFormat('L', '١٠', null, 'ar-eg')->getMonth()
        );
    }

    public function testDateTimeFromFormatLocaleStandaloneMonth1Digit(): void
    {
        $this->assertEquals(
            1,
            DateTime::fromFormat('L', '١', null, 'ar-eg')->getMonth()
        );
    }

    public function testDateTimeFromFormatLocaleStandaloneMonth2DigitsFull(): void
    {
        $this->assertEquals(
            10,
            DateTime::fromFormat('LL', '١٠', null, 'ar-eg')->getMonth()
        );
    }

    public function testDateTimeFromFormatLocaleStandaloneMonth2Digits(): void
    {
        $this->assertEquals(
            1,
            DateTime::fromFormat('LL', '٠١', null, 'ar-eg')->getMonth()
        );
    }

    public function testDateTimeFromFormatLocaleStandaloneMonthShort(): void
    {
        $this->assertEquals(
            10,
            DateTime::fromFormat('LLL', 'окт.', null, 'ru')->getMonth()
        );
    }

    public function testDateTimeFromFormatLocaleStandaloneMonthLong(): void
    {
        $this->assertEquals(
            10,
            DateTime::fromFormat('LLLL', 'октябрь', null, 'ru')->getMonth()
        );
    }

    // public function testDateTimeFromFormatLocaleStandaloneMonthNarrow(): void
    // {
    //     $this->assertEquals(
    //         10,
    //         DateTime::fromFormat('LLLLL', 'О', null, 'ru')->getMonth()
    //     );
    // }

    /**
     * Week
     */

    public function testDateTimeFromFormatLocaleWeek1DigitFull(): void
    {
        $this->assertEquals(
            22,
            DateTime::fromFormat('w', '٢٢', null, 'ar-eg')->getWeek()
        );
    }

    public function testDateTimeFromFormatLocaleWeek1Digit(): void
    {
        $this->assertEquals(
            1,
            DateTime::fromFormat('w', '١', null, 'ar-eg')->getWeek()
        );
    }

    public function testDateTimeFromFormatLocaleWeek2DigitsFull(): void
    {
        $this->assertEquals(
            22,
            DateTime::fromFormat('ww', '٢٢', null, 'ar-eg')->getWeek()
        );
    }

    public function testDateTimeFromFormatLocaleWeek2Digits(): void
    {
        $this->assertEquals(
            1,
            DateTime::fromFormat('ww', '٠١', null, 'ar-eg')->getWeek()
        );
    }

    public function testDateTimeFromFormatLocaleWeekOfMonth(): void
    {
        $this->assertEquals(
            3,
            DateTime::fromFormat('W', '٣', null, 'ar-eg')->getWeekOfMonth()
        );
    }

    /**
     * Day
     */

    public function testDateTimeFromFormatLocaleDayOfMonth1DigitFull(): void
    {
        $this->assertEquals(
            21,
            DateTime::fromFormat('d', '٢١', null, 'ar-eg')->getDate()
        );
    }

    public function testDateTimeFromFormatLocaleDayOfMonth1Digit(): void
    {
        $this->assertEquals(
            1,
            DateTime::fromFormat('d', '١', null, 'ar-eg')->getDate()
        );
    }

    public function testDateTimeFromFormatLocaleDayOfMonth2DigitsFull(): void
    {
        $this->assertEquals(
            21,
            DateTime::fromFormat('dd', '٢١', null, 'ar-eg')->getDate()
        );
    }

    public function testDateTimeFromFormatLocaleDayOfMonth2Digits(): void
    {
        $this->assertEquals(
            1,
            DateTime::fromFormat('dd', '٠١', null, 'ar-eg')->getDate()
        );
    }

    public function testDateTimeFromFormatLocaleDayOfYear1DigitFull(): void
    {
        $this->assertEquals(
            152,
            DateTime::fromFormat('D', '١٥٢', null, 'ar-eg')->getDayOfYear()
        );
    }

    public function testDateTimeFromFormatLocaleDayOfYear1Digit(): void
    {
        $this->assertEquals(
            1,
            DateTime::fromFormat('D', '١', null, 'ar-eg')->getDayOfYear()
        );
    }

    public function testDateTimeFromFormatLocaleDayOfYear2DigitsFull(): void
    {
        $this->assertEquals(
            152,
            DateTime::fromFormat('DD', '١٥٢', null, 'ar-eg')->getDayOfYear()
        );
    }

    public function testDateTimeFromFormatLocaleDayOfYear2Digits(): void
    {
        $this->assertEquals(
            1,
            DateTime::fromFormat('DD', '٠١', null, 'ar-eg')->getDayOfYear()
        );
    }

    public function testDateTimeFromFormatLocaleDayOfYear3DigitsFull(): void
    {
        $this->assertEquals(
            152,
            DateTime::fromFormat('DDD', '١٥٢', null, 'ar-eg')->getDayOfYear()
        );
    }

    public function testDateTimeFromFormatLocaleDayOfYear3Digits(): void
    {
        $this->assertEquals(
            1,
            DateTime::fromFormat('DDD', '٠٠١', null, 'ar-eg')->getDayOfYear()
        );
    }

    public function testDateTimeFromFormatLocaleDayOfWeekInMonthMonth(): void
    {
        $this->assertEquals(
            3,
            DateTime::fromFormat('F', '٣', null, 'ar-eg')->getWeekDayInMonth()
        );
    }

    /**
     * Week Day
     */

    public function testDateTimeFromFormatLocaleAltWeekDayShort(): void
    {
        $this->assertEquals(
            5,
            DateTime::fromFormat('EEE', 'пт', null, 'ru')->getWeekDay()
        );
    }

    public function testDateTimeFromFormatLocaleAltWeekDayLong(): void
    {
        $this->assertEquals(
            5,
            DateTime::fromFormat('EEEE', 'пятница', null, 'ru')->getWeekDay()
        );
    }

    // public function testDateTimeFromFormatLocaleAltWeekDayNarrow(): void
    // {
    //     $this->assertEquals(
    //         1,
    //         DateTime::fromFormat('EEEEE', 'П', null, 'ru')->getWeekDay()
    //     );
    // }

    public function testDateTimeFromFormatLocaleWeekDay1Digit(): void
    {
        $this->assertEquals(
            5,
            DateTime::fromFormat('e', '٥', null, 'ar-eg')->getWeekDay()
        );
    }

    public function testDateTimeFromFormatLocaleWeekDay2Digits(): void
    {
        $this->assertEquals(
            5,
            DateTime::fromFormat('ee', '٠٥', null, 'ar-eg')->getWeekDay()
        );
    }

    public function testDateTimeFromFormatLocaleWeekDayShort(): void
    {
        $this->assertEquals(
            5,
            DateTime::fromFormat('eee', 'пт', null, 'ru')->getWeekDay()
        );
    }

    public function testDateTimeFromFormatLocaleWeekDayLong(): void
    {
        $this->assertEquals(
            5,
            DateTime::fromFormat('eeee', 'пятница', null, 'ru')->getWeekDay()
        );
    }

    // public function testDateTimeFromFormatLocaleWeekDayNarrow(): void
    // {
    //     $this->assertEquals(
    //         1,
    //         DateTime::fromFormat('eeeee', 'П', null, 'ru')->getWeekDay()
    //     );
    // }

    public function testDateTimeFromFormatLocaleStandaloneWeekDay1Digit(): void
    {
        $this->assertEquals(
            5,
            DateTime::fromFormat('c', '٥', null, 'ar-eg')->getWeekDay()
        );
    }

    public function testDateTimeFromFormatLocaleStandaloneWeekDay2Digits(): void
    {
        $this->assertEquals(
            5,
            DateTime::fromFormat('cc', '٠٥', null, 'ar-eg')->getWeekDay()
        );
    }

    public function testDateTimeFromFormatLocaleStandaloneWeekDayShort(): void
    {
        $this->assertEquals(
            5,
            DateTime::fromFormat('ccc', 'пт', null, 'ru')->getWeekDay()
        );
    }

    public function testDateTimeFromFormatLocaleStandaloneWeekDayLong(): void
    {
        $this->assertEquals(
            5,
            DateTime::fromFormat('cccc', 'пятница', null, 'ru')->getWeekDay()
        );
    }

    // public function testDateTimeFromFormatLocaleStandaloneWeekDayNarrow(): void
    // {
    //     $this->assertEquals(
    //         1,
    //         DateTime::fromFormat('ccccc', 'П', null, 'ru')->getWeekDay()
    //     );
    // }

    /**
     * Day Period
     */

    public function testDateTimeFromFormatLocaleDayPeriodShort(): void
    {
        $this->assertEquals(
            0,
            DateTime::fromFormat('aaa', '上午', null, 'zh')->getHours()
        );
    }

    public function testDateTimeFromFormatLocaleDayPeriodShortPm(): void
    {
        $this->assertEquals(
            12,
            DateTime::fromFormat('aaa', '下午', null, 'zh')->getHours()
        );
    }

    public function testDateTimeFromFormatLocaleDayPeriodLong(): void
    {
        $this->assertEquals(
            0,
            DateTime::fromFormat('aaaa', '上午', null, 'zh')->getHours()
        );
    }

    public function testDateTimeFromFormatLocaleDayPeriodLongPm(): void
    {
        $this->assertEquals(
            12,
            DateTime::fromFormat('aaaa', '下午', null, 'zh')->getHours()
        );
    }

    /**
     * Hour
     */

    public function testDateTimeFromFormatLocale12Hour1Digit(): void
    {
        $this->assertEquals(
            0,
            DateTime::fromFormat('h', '١٢', null, 'ar-eg')->getHours()
        );
    }

    public function testDateTimeFromFormatLocale12Hour1DigitPadding(): void
    {
        $this->assertEquals(
            1,
            DateTime::fromFormat('h', '١', null, 'ar-eg')->getHours()
        );
    }

    public function testDateTimeFromFormatLocale12Hour2Digits(): void
    {
        $this->assertEquals(
            0,
            DateTime::fromFormat('hh', '١٢', null, 'ar-eg')->getHours()
        );
    }

    public function testDateTimeFromFormatLocale12Hour2DigitsPadding(): void
    {
        $this->assertEquals(
            1,
            DateTime::fromFormat('hh', '٠١', null, 'ar-eg')->getHours()
        );
    }

    public function testDateTimeFromFormatLocale23Hour1Digit(): void
    {
        $this->assertEquals(
            23,
            DateTime::fromFormat('H', '٢٣', null, 'ar-eg')->getHours()
        );
    }

    public function testDateTimeFromFormatLocale23Hour1DigitPadding(): void
    {
        $this->assertEquals(
            0,
            DateTime::fromFormat('H', '٠', null, 'ar-eg')->getHours()
        );
    }

    public function testDateTimeFromFormatLocale23Hour2Digits(): void
    {
        $this->assertEquals(
            23,
            DateTime::fromFormat('HH', '٢٣', null, 'ar-eg')->getHours()
        );
    }

    public function testDateTimeFromFormatLocale23Hour2DigitsPadding(): void
    {
        $this->assertEquals(
            0,
            DateTime::fromFormat('HH', '٠٠', null, 'ar-eg')->getHours()
        );
    }


    public function testDateTimeFromFormatLocale11Hour1Digit(): void
    {
        $this->assertEquals(
            11,
            DateTime::fromFormat('K', '١١', null, 'ar-eg')->getHours()
        );
    }

    public function testDateTimeFromFormatLocale11Hour1DigitPadding(): void
    {
        $this->assertEquals(
            0,
            DateTime::fromFormat('K', '٠', null, 'ar-eg')->getHours()
        );
    }

    public function testDateTimeFromFormatLocale11Hour2Digits(): void
    {
        $this->assertEquals(
            11,
            DateTime::fromFormat('KK', '١١', null, 'ar-eg')->getHours()
        );
    }

    public function testDateTimeFromFormatLocale11Hour2DigitsPadding(): void
    {
        $this->assertEquals(
            00,
            DateTime::fromFormat('KK', '٠٠', null, 'ar-eg')->getHours()
        );
    }

    public function testDateTimeFromFormatLocale24Hour1Digit(): void
    {
        $this->assertEquals(
            0,
            DateTime::fromFormat('k', '٢٤', null, 'ar-eg')->getHours()
        );
    }

    public function testDateTimeFromFormatLocale24Hour1DigitPadding(): void
    {
        $this->assertEquals(
            1,
            DateTime::fromFormat('k', '١', null, 'ar-eg')->getHours()
        );
    }

    public function testDateTimeFromFormatLocale24Hour2Digits(): void
    {
        $this->assertEquals(
            0,
            DateTime::fromFormat('kk', '٢٤', null, 'ar-eg')->getHours()
        );
    }

    public function testDateTimeFromFormatLocale24Hour2DigitsPadding(): void
    {
        $this->assertEquals(
            1,
            DateTime::fromFormat('kk', '٠١', null, 'ar-eg')->getHours()
        );
    }

    /**
     * Minute
     */

    public function testDateTimeFromFormatLocaleMinute1Digit(): void
    {
        $this->assertEquals(
            25,
            DateTime::fromFormat('m', '٢٥', null, 'ar-eg')->getMinutes()
        );
    }

    public function testDateTimeFromFormatLocaleMinute1DigitPadding(): void
    {
        $this->assertEquals(
            1,
            DateTime::fromFormat('m', '١', null, 'ar-eg')->getMinutes()
        );
    }

    public function testDateTimeFromFormatLocaleMinute2Digits(): void
    {
        $this->assertEquals(
            25,
            DateTime::fromFormat('mm', '٢٥', null, 'ar-eg')->getMinutes()
        );
    }

    public function testDateTimeFromFormatLocaleMinute2DigitsPadding(): void
    {
        $this->assertEquals(
            1,
            DateTime::fromFormat('mm', '٠١', null, 'ar-eg')->getMinutes()
        );
    }

    /**
     * Second
     */

    public function testDateTimeFromFormatLocaleSecond1Digit(): void
    {
        $this->assertEquals(
            25,
            DateTime::fromFormat('s', '٢٥', null, 'ar-eg')->getSeconds()
        );
    }

    public function testDateTimeFromFormatLocaleSecond1DigitPadding(): void
    {
        $this->assertEquals(
            1,
            DateTime::fromFormat('s', '١', null, 'ar-eg')->getSeconds()
        );
    }

    public function testDateTimeFromFormatLocaleSecond2Digits(): void
    {
        $this->assertEquals(
            25,
            DateTime::fromFormat('ss', '٢٥', null, 'ar-eg')->getSeconds()
        );
    }

    public function testDateTimeFromFormatLocaleSecond2DigitsPadding(): void
    {
        $this->assertEquals(
            1,
            DateTime::fromFormat('ss', '٠١', null, 'ar-eg')->getSeconds()
        );
    }

    public function testDateTimeFromFormatLocaleFractional(): void
    {
        $this->assertEquals(
            0,
            DateTime::fromFormat('SSS', '١٢٣', null, 'ar-eg')->getMilliseconds()
        );
    }

    /**
     * Time Zone
     */

    public function testDateTimeFromFormatLocaleTimeZoneIso8601BasicAlt(): void
    {
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            DateTime::fromFormat('dd/MM/yyyy HH:mm:ss ZZZ', '01/01/2019 00:00:00 +0000', null, 'ru')->toISOString()
        );
    }

    public function testDateTimeFromFormatLocaleTimeZoneIso8601BasicAltTimeZone(): void
    {
        $this->assertEquals(
            '2018-12-31T14:00:00.000+00:00',
            DateTime::fromFormat('dd/MM/yyyy HH:mm:ss ZZZ', '01/01/2019 00:00:00 +1000', null, 'ru')->toISOString()
        );
    }

    public function testDateTimeFromFormatLocaleTimeZoneLongBasic(): void
    {
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            DateTime::fromFormat('dd/MM/yyyy HH:mm:ss ZZZZ', '01/01/2019 00:00:00 GMT+00:00', null, 'ru')->toISOString()
        );
    }

    public function testDateTimeFromFormatLocaleTimeZoneLongBasicTimeZone(): void
    {
        $this->assertEquals(
            '2018-12-31T14:00:00.000+00:00',
            DateTime::fromFormat('dd/MM/yyyy HH:mm:ss ZZZZ', '01/01/2019 00:00:00 GMT+10:00', null, 'ru')->toISOString()
        );
    }

    public function testDateTimeFromFormatLocaleTimeZoneIso8601ExtendedAlt(): void
    {
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            DateTime::fromFormat('dd/MM/yyyy HH:mm:ss ZZZZZ', '01/01/2019 00:00:00 +00:00', null, 'ru')->toISOString()
        );
    }

    public function testDateTimeFromFormatLocaleTimeZoneIso8601ExtendedAltTimeZone(): void
    {
        $this->assertEquals(
            '2018-12-31T14:00:00.000+00:00',
            DateTime::fromFormat('dd/MM/yyyy HH:mm:ss ZZZZZ', '01/01/2019 00:00:00 +10:00', null, 'ru')->toISOString()
        );
    }

    public function testDateTimeFromFormatLocaleTimeZoneShortLocalized(): void
    {
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            DateTime::fromFormat('dd/MM/yyyy HH:mm:ss O', '01/01/2019 00:00:00 GMT+00', null, 'ru')->toISOString()
        );
    }

    public function testDateTimeFromFormatLocaleTimeZoneShortLocalizedTimeZone(): void
    {
        $this->assertEquals(
            '2018-12-31T14:00:00.000+00:00',
            DateTime::fromFormat('dd/MM/yyyy HH:mm:ss O', '01/01/2019 00:00:00 GMT+10', null, 'ru')->toISOString()
        );
    }

    public function testDateTimeFromFormatLocaleTimeZoneLongLocalized(): void
    {
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            DateTime::fromFormat('dd/MM/yyyy HH:mm:ss OOOO', '01/01/2019 00:00:00 GMT+00:00', null, 'ru')->toISOString()
        );
    }

    public function testDateTimeFromFormatLocaleTimeZoneLongLocalizedTimeZone(): void
    {
        $this->assertEquals(
            '2018-12-31T14:00:00.000+00:00',
            DateTime::fromFormat('dd/MM/yyyy HH:mm:ss OOOO', '01/01/2019 00:00:00 GMT+10:00', null, 'ru')->toISOString()
        );
    }

    public function testDateTimeFromFormatLocaleTimeZoneLongTimeZoneId(): void
    {
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            DateTime::fromFormat('dd/MM/yyyy HH:mm:ss VV', '01/01/2019 00:00:00 UTC', null, 'ru')->toISOString()
        );
    }

    public function testDateTimeFromFormatLocaleTimeZoneLongTimeZoneIdTimeZone(): void
    {
        $this->assertEquals(
            '2018-12-31T14:00:00.000+00:00',
            DateTime::fromFormat('dd/MM/yyyy HH:mm:ss VV', '01/01/2019 00:00:00 Australia/Brisbane', null, 'ru')->toISOString()
        );
    }

    public function testDateTimeFromFormatLocaleTimeZoneIso8601BasicShortZ(): void
    {
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            DateTime::fromFormat('dd/MM/yyyy HH:mm:ss X', '01/01/2019 00:00:00 Z', null, 'ru')->toISOString()
        );
    }

    public function testDateTimeFromFormatLocaleTimeZoneIso8601BasicShortZTimeZone(): void
    {
        $this->assertEquals(
            '2018-12-31T14:00:00.000+00:00',
            DateTime::fromFormat('dd/MM/yyyy HH:mm:ss X', '01/01/2019 00:00:00 +10', null, 'ru')->toISOString()
        );
    }

    public function testDateTimeFromFormatLocaleTimeZoneIso8601BasicZ(): void
    {
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            DateTime::fromFormat('dd/MM/yyyy HH:mm:ss XX', '01/01/2019 00:00:00 Z', null, 'ru')->toISOString()
        );
    }

    public function testDateTimeFromFormatLocaleTimeZoneIso8601BasicZTimeZone(): void
    {
        $this->assertEquals(
            '2018-12-31T14:00:00.000+00:00',
            DateTime::fromFormat('dd/MM/yyyy HH:mm:ss XX', '01/01/2019 00:00:00 +1000', null, 'ru')->toISOString()
        );
    }

    public function testDateTimeFromFormatLocaleTimeZoneIso8601ExtendedZ(): void
    {
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            DateTime::fromFormat('dd/MM/yyyy HH:mm:ss XXX', '01/01/2019 00:00:00 Z', null, 'ru')->toISOString()
        );
    }

    public function testDateTimeFromFormatLocaleTimeZoneIso8601ExtendedZTimeZone(): void
    {
        $this->assertEquals(
            '2018-12-31T14:00:00.000+00:00',
            DateTime::fromFormat('dd/MM/yyyy HH:mm:ss XXX', '01/01/2019 00:00:00 +10:00', null, 'ru')->toISOString()
        );
    }

    public function testDateTimeFromFormatLocaleTimeZoneIso8601BasicShort(): void
    {
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            DateTime::fromFormat('dd/MM/yyyy HH:mm:ss x', '01/01/2019 00:00:00 +00', null, 'ru')->toISOString()
        );
    }

    public function testDateTimeFromFormatLocaleTimeZoneIso8601BasicShortTimeZone(): void
    {
        $this->assertEquals(
            '2018-12-31T14:00:00.000+00:00',
            DateTime::fromFormat('dd/MM/yyyy HH:mm:ss x', '01/01/2019 00:00:00 +10', null, 'ru')->toISOString()
        );
    }

    public function testDateTimeFromFormatLocaleTimeZoneIso8601Basic(): void
    {
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            DateTime::fromFormat('dd/MM/yyyy HH:mm:ss xx', '01/01/2019 00:00:00 +0000', null, 'ru')->toISOString()
        );
    }

    public function testDateTimeFromFormatLocaleTimeZoneIso8601BasicTimeZone(): void
    {
        $this->assertEquals(
            '2018-12-31T14:00:00.000+00:00',
            DateTime::fromFormat('dd/MM/yyyy HH:mm:ss xx', '01/01/2019 00:00:00 +1000', null, 'ru')->toISOString()
        );
    }

    public function testDateTimeFromFormatLocaleTimeZoneIso8601Extended(): void
    {
        $this->assertEquals(
            '2019-01-01T00:00:00.000+00:00',
            DateTime::fromFormat('dd/MM/yyyy HH:mm:ss xxx', '01/01/2019 00:00:00 +00:00', null, 'ru')->toISOString()
        );
    }

    public function testDateTimeFromFormatLocaleTimeZoneIso8601ExtendedTimeZone(): void
    {
        $this->assertEquals(
            '2018-12-31T14:00:00.000+00:00',
            DateTime::fromFormat('dd/MM/yyyy HH:mm:ss xxx', '01/01/2019 00:00:00 +10:00', null, 'ru')->toISOString()
        );
    }

}
