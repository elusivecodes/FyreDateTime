<?php
declare(strict_types=1);

namespace Tests;

use Fyre\DateTime\DateTime;

trait FromFormatLocaleTestTrait
{
    public function testFromFormatLocale11Hour1Digit(): void
    {
        $this->assertSame(
            11,
            DateTime::fromFormat('K', '١١', null, 'ar-eg')->getHours()
        );
    }

    public function testFromFormatLocale11Hour1DigitPadding(): void
    {
        $this->assertSame(
            0,
            DateTime::fromFormat('K', '٠', null, 'ar-eg')->getHours()
        );
    }

    public function testFromFormatLocale11Hour2Digits(): void
    {
        $this->assertSame(
            11,
            DateTime::fromFormat('KK', '١١', null, 'ar-eg')->getHours()
        );
    }

    public function testFromFormatLocale11Hour2DigitsPadding(): void
    {
        $this->assertSame(
            00,
            DateTime::fromFormat('KK', '٠٠', null, 'ar-eg')->getHours()
        );
    }

    public function testFromFormatLocale12Hour1Digit(): void
    {
        $this->assertSame(
            0,
            DateTime::fromFormat('h', '١٢', null, 'ar-eg')->getHours()
        );
    }

    public function testFromFormatLocale12Hour1DigitPadding(): void
    {
        $this->assertSame(
            1,
            DateTime::fromFormat('h', '١', null, 'ar-eg')->getHours()
        );
    }

    public function testFromFormatLocale12Hour2Digits(): void
    {
        $this->assertSame(
            0,
            DateTime::fromFormat('hh', '١٢', null, 'ar-eg')->getHours()
        );
    }

    public function testFromFormatLocale12Hour2DigitsPadding(): void
    {
        $this->assertSame(
            1,
            DateTime::fromFormat('hh', '٠١', null, 'ar-eg')->getHours()
        );
    }

    public function testFromFormatLocale23Hour1Digit(): void
    {
        $this->assertSame(
            23,
            DateTime::fromFormat('H', '٢٣', null, 'ar-eg')->getHours()
        );
    }

    public function testFromFormatLocale23Hour1DigitPadding(): void
    {
        $this->assertSame(
            0,
            DateTime::fromFormat('H', '٠', null, 'ar-eg')->getHours()
        );
    }

    public function testFromFormatLocale23Hour2Digits(): void
    {
        $this->assertSame(
            23,
            DateTime::fromFormat('HH', '٢٣', null, 'ar-eg')->getHours()
        );
    }

    public function testFromFormatLocale23Hour2DigitsPadding(): void
    {
        $this->assertSame(
            0,
            DateTime::fromFormat('HH', '٠٠', null, 'ar-eg')->getHours()
        );
    }

    public function testFromFormatLocale24Hour1Digit(): void
    {
        $this->assertSame(
            0,
            DateTime::fromFormat('k', '٢٤', null, 'ar-eg')->getHours()
        );
    }

    public function testFromFormatLocale24Hour1DigitPadding(): void
    {
        $this->assertSame(
            1,
            DateTime::fromFormat('k', '١', null, 'ar-eg')->getHours()
        );
    }

    public function testFromFormatLocale24Hour2Digits(): void
    {
        $this->assertSame(
            0,
            DateTime::fromFormat('kk', '٢٤', null, 'ar-eg')->getHours()
        );
    }

    public function testFromFormatLocale24Hour2DigitsPadding(): void
    {
        $this->assertSame(
            1,
            DateTime::fromFormat('kk', '٠١', null, 'ar-eg')->getHours()
        );
    }

    public function testFromFormatLocaleAltWeekDayLong(): void
    {
        $this->assertSame(
            5,
            DateTime::fromFormat('EEEE', 'пятница', null, 'ru')->getWeekDay()
        );
    }

    public function testFromFormatLocaleAltWeekDayShort(): void
    {
        $this->assertSame(
            5,
            DateTime::fromFormat('EEE', 'пт', null, 'ru')->getWeekDay()
        );
    }

    public function testFromFormatLocaleDayOfMonth1Digit(): void
    {
        $this->assertSame(
            1,
            DateTime::fromFormat('d', '١', null, 'ar-eg')->getDate()
        );
    }

    public function testFromFormatLocaleDayOfMonth1DigitFull(): void
    {
        $this->assertSame(
            21,
            DateTime::fromFormat('d', '٢١', null, 'ar-eg')->getDate()
        );
    }

    public function testFromFormatLocaleDayOfMonth2Digits(): void
    {
        $this->assertSame(
            1,
            DateTime::fromFormat('dd', '٠١', null, 'ar-eg')->getDate()
        );
    }

    public function testFromFormatLocaleDayOfMonth2DigitsFull(): void
    {
        $this->assertSame(
            21,
            DateTime::fromFormat('dd', '٢١', null, 'ar-eg')->getDate()
        );
    }

    public function testFromFormatLocaleDayOfWeekInMonthMonth(): void
    {
        $this->assertSame(
            3,
            DateTime::fromFormat('F', '٣', null, 'ar-eg')->getWeekDayInMonth()
        );
    }

    public function testFromFormatLocaleDayOfYear1Digit(): void
    {
        $this->assertSame(
            1,
            DateTime::fromFormat('D', '١', null, 'ar-eg')->getDayOfYear()
        );
    }

    public function testFromFormatLocaleDayOfYear1DigitFull(): void
    {
        $this->assertSame(
            152,
            DateTime::fromFormat('D', '١٥٢', null, 'ar-eg')->getDayOfYear()
        );
    }

    public function testFromFormatLocaleDayOfYear2Digits(): void
    {
        $this->assertSame(
            1,
            DateTime::fromFormat('DD', '٠١', null, 'ar-eg')->getDayOfYear()
        );
    }

    public function testFromFormatLocaleDayOfYear2DigitsFull(): void
    {
        $this->assertSame(
            152,
            DateTime::fromFormat('DD', '١٥٢', null, 'ar-eg')->getDayOfYear()
        );
    }

    public function testFromFormatLocaleDayOfYear3Digits(): void
    {
        $this->assertSame(
            1,
            DateTime::fromFormat('DDD', '٠٠١', null, 'ar-eg')->getDayOfYear()
        );
    }

    public function testFromFormatLocaleDayOfYear3DigitsFull(): void
    {
        $this->assertSame(
            152,
            DateTime::fromFormat('DDD', '١٥٢', null, 'ar-eg')->getDayOfYear()
        );
    }

    public function testFromFormatLocaleDayPeriodLong(): void
    {
        $this->assertSame(
            0,
            DateTime::fromFormat('aaaa', '上午', null, 'zh')->getHours()
        );
    }

    public function testFromFormatLocaleDayPeriodLongPm(): void
    {
        $this->assertSame(
            12,
            DateTime::fromFormat('aaaa', '下午', null, 'zh')->getHours()
        );
    }

    // public function testFromFormatLocaleStandaloneWeekDayNarrow(): void
    // {
    //     $this->assertSame(
    //         1,
    //         DateTime::fromFormat('ccccc', 'П', null, 'ru')->getWeekDay()
    //     );
    // }

    public function testFromFormatLocaleDayPeriodShort(): void
    {
        $this->assertSame(
            0,
            DateTime::fromFormat('aaa', '上午', null, 'zh')->getHours()
        );
    }

    public function testFromFormatLocaleDayPeriodShortPm(): void
    {
        $this->assertSame(
            12,
            DateTime::fromFormat('aaa', '下午', null, 'zh')->getHours()
        );
    }

    public function testFromFormatLocaleEraLong(): void
    {
        $this->assertSame(
            1970,
            DateTime::fromFormat('yyyy GGGG', '1970 от Рождества Христова', null, 'ru')->getYear()
        );
    }

    public function testFromFormatLocaleEraLongBc(): void
    {
        $this->assertSame(
            -1970,
            DateTime::fromFormat('yyyy GGGG', '1970 до Рождества Христова', null, 'ru')->getYear()
        );
    }

    public function testFromFormatLocaleEraNarrow(): void
    {
        $this->assertSame(
            1970,
            DateTime::fromFormat('yyyy GGGGG', '1970 н.э.', null, 'ru')->getYear()
        );
    }

    public function testFromFormatLocaleEraNarrowBc(): void
    {
        $this->assertSame(
            -1970,
            DateTime::fromFormat('yyyy GGGGG', '1970 до н.э.', null, 'ru')->getYear()
        );
    }

    public function testFromFormatLocaleEraShort(): void
    {
        $this->assertSame(
            1970,
            DateTime::fromFormat('yyyy GGG', '1970 н. э.', null, 'ru')->getYear()
        );
    }

    public function testFromFormatLocaleEraShortBc(): void
    {
        $this->assertSame(
            -1970,
            DateTime::fromFormat('yyyy GGG', '1970 до н. э.', null, 'ru')->getYear()
        );
    }

    public function testFromFormatLocaleFractional(): void
    {
        $this->assertSame(
            0,
            DateTime::fromFormat('SSS', '١٢٣', null, 'ar-eg')->getMilliseconds()
        );
    }

    public function testFromFormatLocaleMinute1Digit(): void
    {
        $this->assertSame(
            25,
            DateTime::fromFormat('m', '٢٥', null, 'ar-eg')->getMinutes()
        );
    }

    public function testFromFormatLocaleMinute1DigitPadding(): void
    {
        $this->assertSame(
            1,
            DateTime::fromFormat('m', '١', null, 'ar-eg')->getMinutes()
        );
    }

    public function testFromFormatLocaleMinute2Digits(): void
    {
        $this->assertSame(
            25,
            DateTime::fromFormat('mm', '٢٥', null, 'ar-eg')->getMinutes()
        );
    }

    public function testFromFormatLocaleMinute2DigitsPadding(): void
    {
        $this->assertSame(
            1,
            DateTime::fromFormat('mm', '٠١', null, 'ar-eg')->getMinutes()
        );
    }

    public function testFromFormatLocaleMonth1Digit(): void
    {
        $this->assertSame(
            1,
            DateTime::fromFormat('M', '١', null, 'ar-eg')->getMonth()
        );
    }

    public function testFromFormatLocaleMonth1DigitFull(): void
    {
        $this->assertSame(
            10,
            DateTime::fromFormat('M', '١٠', null, 'ar-eg')->getMonth()
        );
    }

    public function testFromFormatLocaleMonth2Digits(): void
    {
        $this->assertSame(
            1,
            DateTime::fromFormat('MM', '٠١', null, 'ar-eg')->getMonth()
        );
    }

    public function testFromFormatLocaleMonth2DigitsFull(): void
    {
        $this->assertSame(
            10,
            DateTime::fromFormat('MM', '١٠', null, 'ar-eg')->getMonth()
        );
    }

    public function testFromFormatLocaleMonthLong(): void
    {
        $this->assertSame(
            10,
            DateTime::fromFormat('MMMM', 'октября', null, 'ru')->getMonth()
        );
    }

    public function testFromFormatLocaleMonthShort(): void
    {
        $this->assertSame(
            10,
            DateTime::fromFormat('MMM', 'окт.', null, 'ru')->getMonth()
        );
    }

    public function testFromFormatLocaleQuarter1Digit(): void
    {
        $this->assertSame(
            3,
            DateTime::fromFormat('q', '٣', null, 'ar-eg')->getQuarter()
        );
    }

    public function testFromFormatLocaleQuarter2Digits(): void
    {
        $this->assertSame(
            3,
            DateTime::fromFormat('qq', '٠٣', null, 'ar-eg')->getQuarter()
        );
    }

    public function testFromFormatLocaleSecond1Digit(): void
    {
        $this->assertSame(
            25,
            DateTime::fromFormat('s', '٢٥', null, 'ar-eg')->getSeconds()
        );
    }

    public function testFromFormatLocaleSecond1DigitPadding(): void
    {
        $this->assertSame(
            1,
            DateTime::fromFormat('s', '١', null, 'ar-eg')->getSeconds()
        );
    }

    public function testFromFormatLocaleSecond2Digits(): void
    {
        $this->assertSame(
            25,
            DateTime::fromFormat('ss', '٢٥', null, 'ar-eg')->getSeconds()
        );
    }

    public function testFromFormatLocaleSecond2DigitsPadding(): void
    {
        $this->assertSame(
            1,
            DateTime::fromFormat('ss', '٠١', null, 'ar-eg')->getSeconds()
        );
    }

    public function testFromFormatLocaleStandaloneMonth1Digit(): void
    {
        $this->assertSame(
            1,
            DateTime::fromFormat('L', '١', null, 'ar-eg')->getMonth()
        );
    }

    // public function testFromFormatLocaleMonthNarrow(): void
    // {
    //     $this->assertSame(
    //         10,
    //         DateTime::fromFormat('MMMMM', 'О', null, 'ru')->getMonth()
    //     );
    // }

    public function testFromFormatLocaleStandaloneMonth1DigitFull(): void
    {
        $this->assertSame(
            10,
            DateTime::fromFormat('L', '١٠', null, 'ar-eg')->getMonth()
        );
    }

    public function testFromFormatLocaleStandaloneMonth2Digits(): void
    {
        $this->assertSame(
            1,
            DateTime::fromFormat('LL', '٠١', null, 'ar-eg')->getMonth()
        );
    }

    public function testFromFormatLocaleStandaloneMonth2DigitsFull(): void
    {
        $this->assertSame(
            10,
            DateTime::fromFormat('LL', '١٠', null, 'ar-eg')->getMonth()
        );
    }

    public function testFromFormatLocaleStandaloneMonthLong(): void
    {
        $this->assertSame(
            10,
            DateTime::fromFormat('LLLL', 'октябрь', null, 'ru')->getMonth()
        );
    }

    public function testFromFormatLocaleStandaloneMonthShort(): void
    {
        $this->assertSame(
            10,
            DateTime::fromFormat('LLL', 'окт.', null, 'ru')->getMonth()
        );
    }

    public function testFromFormatLocaleStandaloneQuarter1Digit(): void
    {
        $this->assertSame(
            3,
            DateTime::fromFormat('Q', '٣', null, 'ar-eg')->getQuarter()
        );
    }

    public function testFromFormatLocaleStandaloneQuarter2Digits(): void
    {
        $this->assertSame(
            3,
            DateTime::fromFormat('QQ', '٠٣', null, 'ar-eg')->getQuarter()
        );
    }

    // public function testFromFormatLocaleWeekDayNarrow(): void
    // {
    //     $this->assertSame(
    //         1,
    //         DateTime::fromFormat('eeeee', 'П', null, 'ru')->getWeekDay()
    //     );
    // }

    public function testFromFormatLocaleStandaloneWeekDay1Digit(): void
    {
        $this->assertSame(
            5,
            DateTime::fromFormat('c', '٥', null, 'ar-eg')->getWeekDay()
        );
    }

    public function testFromFormatLocaleStandaloneWeekDay2Digits(): void
    {
        $this->assertSame(
            5,
            DateTime::fromFormat('cc', '٠٥', null, 'ar-eg')->getWeekDay()
        );
    }

    public function testFromFormatLocaleStandaloneWeekDayLong(): void
    {
        $this->assertSame(
            5,
            DateTime::fromFormat('cccc', 'пятница', null, 'ru')->getWeekDay()
        );
    }

    public function testFromFormatLocaleStandaloneWeekDayShort(): void
    {
        $this->assertSame(
            5,
            DateTime::fromFormat('ccc', 'пт', null, 'ru')->getWeekDay()
        );
    }

    public function testFromFormatLocaleTimeZoneIso8601Basic(): void
    {
        $this->assertSame(
            '2019-01-01T00:00:00.000+00:00',
            DateTime::fromFormat('dd/MM/yyyy HH:mm:ss xx', '01/01/2019 00:00:00 +0000', null, 'ru')->toISOString()
        );
    }

    public function testFromFormatLocaleTimeZoneIso8601BasicAlt(): void
    {
        $this->assertSame(
            '2019-01-01T00:00:00.000+00:00',
            DateTime::fromFormat('dd/MM/yyyy HH:mm:ss ZZZ', '01/01/2019 00:00:00 +0000', null, 'ru')->toISOString()
        );
    }

    public function testFromFormatLocaleTimeZoneIso8601BasicAltTimeZone(): void
    {
        $this->assertSame(
            '2018-12-31T14:00:00.000+00:00',
            DateTime::fromFormat('dd/MM/yyyy HH:mm:ss ZZZ', '01/01/2019 00:00:00 +1000', null, 'ru')->toISOString()
        );
    }

    public function testFromFormatLocaleTimeZoneIso8601BasicShort(): void
    {
        $this->assertSame(
            '2019-01-01T00:00:00.000+00:00',
            DateTime::fromFormat('dd/MM/yyyy HH:mm:ss x', '01/01/2019 00:00:00 +00', null, 'ru')->toISOString()
        );
    }

    public function testFromFormatLocaleTimeZoneIso8601BasicShortTimeZone(): void
    {
        $this->assertSame(
            '2018-12-31T14:00:00.000+00:00',
            DateTime::fromFormat('dd/MM/yyyy HH:mm:ss x', '01/01/2019 00:00:00 +10', null, 'ru')->toISOString()
        );
    }

    public function testFromFormatLocaleTimeZoneIso8601BasicShortZ(): void
    {
        $this->assertSame(
            '2019-01-01T00:00:00.000+00:00',
            DateTime::fromFormat('dd/MM/yyyy HH:mm:ss X', '01/01/2019 00:00:00 Z', null, 'ru')->toISOString()
        );
    }

    public function testFromFormatLocaleTimeZoneIso8601BasicShortZTimeZone(): void
    {
        $this->assertSame(
            '2018-12-31T14:00:00.000+00:00',
            DateTime::fromFormat('dd/MM/yyyy HH:mm:ss X', '01/01/2019 00:00:00 +10', null, 'ru')->toISOString()
        );
    }

    public function testFromFormatLocaleTimeZoneIso8601BasicTimeZone(): void
    {
        $this->assertSame(
            '2018-12-31T14:00:00.000+00:00',
            DateTime::fromFormat('dd/MM/yyyy HH:mm:ss xx', '01/01/2019 00:00:00 +1000', null, 'ru')->toISOString()
        );
    }

    public function testFromFormatLocaleTimeZoneIso8601BasicZ(): void
    {
        $this->assertSame(
            '2019-01-01T00:00:00.000+00:00',
            DateTime::fromFormat('dd/MM/yyyy HH:mm:ss XX', '01/01/2019 00:00:00 Z', null, 'ru')->toISOString()
        );
    }

    public function testFromFormatLocaleTimeZoneIso8601BasicZTimeZone(): void
    {
        $this->assertSame(
            '2018-12-31T14:00:00.000+00:00',
            DateTime::fromFormat('dd/MM/yyyy HH:mm:ss XX', '01/01/2019 00:00:00 +1000', null, 'ru')->toISOString()
        );
    }

    public function testFromFormatLocaleTimeZoneIso8601Extended(): void
    {
        $this->assertSame(
            '2019-01-01T00:00:00.000+00:00',
            DateTime::fromFormat('dd/MM/yyyy HH:mm:ss xxx', '01/01/2019 00:00:00 +00:00', null, 'ru')->toISOString()
        );
    }

    public function testFromFormatLocaleTimeZoneIso8601ExtendedAlt(): void
    {
        $this->assertSame(
            '2019-01-01T00:00:00.000+00:00',
            DateTime::fromFormat('dd/MM/yyyy HH:mm:ss ZZZZZ', '01/01/2019 00:00:00 +00:00', null, 'ru')->toISOString()
        );
    }

    public function testFromFormatLocaleTimeZoneIso8601ExtendedAltTimeZone(): void
    {
        $this->assertSame(
            '2018-12-31T14:00:00.000+00:00',
            DateTime::fromFormat('dd/MM/yyyy HH:mm:ss ZZZZZ', '01/01/2019 00:00:00 +10:00', null, 'ru')->toISOString()
        );
    }

    public function testFromFormatLocaleTimeZoneIso8601ExtendedTimeZone(): void
    {
        $this->assertSame(
            '2018-12-31T14:00:00.000+00:00',
            DateTime::fromFormat('dd/MM/yyyy HH:mm:ss xxx', '01/01/2019 00:00:00 +10:00', null, 'ru')->toISOString()
        );
    }

    public function testFromFormatLocaleTimeZoneIso8601ExtendedZ(): void
    {
        $this->assertSame(
            '2019-01-01T00:00:00.000+00:00',
            DateTime::fromFormat('dd/MM/yyyy HH:mm:ss XXX', '01/01/2019 00:00:00 Z', null, 'ru')->toISOString()
        );
    }

    public function testFromFormatLocaleTimeZoneIso8601ExtendedZTimeZone(): void
    {
        $this->assertSame(
            '2018-12-31T14:00:00.000+00:00',
            DateTime::fromFormat('dd/MM/yyyy HH:mm:ss XXX', '01/01/2019 00:00:00 +10:00', null, 'ru')->toISOString()
        );
    }

    public function testFromFormatLocaleTimeZoneLongBasic(): void
    {
        $this->assertSame(
            '2019-01-01T00:00:00.000+00:00',
            DateTime::fromFormat('dd/MM/yyyy HH:mm:ss ZZZZ', '01/01/2019 00:00:00 GMT+00:00', null, 'ru')->toISOString()
        );
    }

    public function testFromFormatLocaleTimeZoneLongBasicTimeZone(): void
    {
        $this->assertSame(
            '2018-12-31T14:00:00.000+00:00',
            DateTime::fromFormat('dd/MM/yyyy HH:mm:ss ZZZZ', '01/01/2019 00:00:00 GMT+10:00', null, 'ru')->toISOString()
        );
    }

    public function testFromFormatLocaleTimeZoneLongLocalized(): void
    {
        $this->assertSame(
            '2019-01-01T00:00:00.000+00:00',
            DateTime::fromFormat('dd/MM/yyyy HH:mm:ss OOOO', '01/01/2019 00:00:00 GMT+00:00', null, 'ru')->toISOString()
        );
    }

    public function testFromFormatLocaleTimeZoneLongLocalizedTimeZone(): void
    {
        $this->assertSame(
            '2018-12-31T14:00:00.000+00:00',
            DateTime::fromFormat('dd/MM/yyyy HH:mm:ss OOOO', '01/01/2019 00:00:00 GMT+10:00', null, 'ru')->toISOString()
        );
    }

    public function testFromFormatLocaleTimeZoneLongTimeZoneId(): void
    {
        $this->assertSame(
            '2019-01-01T00:00:00.000+00:00',
            DateTime::fromFormat('dd/MM/yyyy HH:mm:ss VV', '01/01/2019 00:00:00 UTC', null, 'ru')->toISOString()
        );
    }

    public function testFromFormatLocaleTimeZoneLongTimeZoneIdTimeZone(): void
    {
        $this->assertSame(
            '2018-12-31T14:00:00.000+00:00',
            DateTime::fromFormat('dd/MM/yyyy HH:mm:ss VV', '01/01/2019 00:00:00 Australia/Brisbane', null, 'ru')->toISOString()
        );
    }

    public function testFromFormatLocaleTimeZoneShortLocalized(): void
    {
        $this->assertSame(
            '2019-01-01T00:00:00.000+00:00',
            DateTime::fromFormat('dd/MM/yyyy HH:mm:ss O', '01/01/2019 00:00:00 GMT+00', null, 'ru')->toISOString()
        );
    }

    public function testFromFormatLocaleTimeZoneShortLocalizedTimeZone(): void
    {
        $this->assertSame(
            '2018-12-31T14:00:00.000+00:00',
            DateTime::fromFormat('dd/MM/yyyy HH:mm:ss O', '01/01/2019 00:00:00 GMT+10', null, 'ru')->toISOString()
        );
    }

    public function testFromFormatLocaleWeek1Digit(): void
    {
        $this->assertSame(
            1,
            DateTime::fromFormat('w', '١', null, 'ar-eg')->getWeek()
        );
    }

    // public function testFromFormatLocaleStandaloneMonthNarrow(): void
    // {
    //     $this->assertSame(
    //         10,
    //         DateTime::fromFormat('LLLLL', 'О', null, 'ru')->getMonth()
    //     );
    // }

    public function testFromFormatLocaleWeek1DigitFull(): void
    {
        $this->assertSame(
            22,
            DateTime::fromFormat('w', '٢٢', null, 'ar-eg')->getWeek()
        );
    }

    public function testFromFormatLocaleWeek2Digits(): void
    {
        $this->assertSame(
            1,
            DateTime::fromFormat('ww', '٠١', null, 'ar-eg')->getWeek()
        );
    }

    public function testFromFormatLocaleWeek2DigitsFull(): void
    {
        $this->assertSame(
            22,
            DateTime::fromFormat('ww', '٢٢', null, 'ar-eg')->getWeek()
        );
    }

    // public function testFromFormatLocaleAltWeekDayNarrow(): void
    // {
    //     $this->assertSame(
    //         1,
    //         DateTime::fromFormat('EEEEE', 'П', null, 'ru')->getWeekDay()
    //     );
    // }

    public function testFromFormatLocaleWeekDay1Digit(): void
    {
        $this->assertSame(
            5,
            DateTime::fromFormat('e', '٥', null, 'ar-eg')->getWeekDay()
        );
    }

    public function testFromFormatLocaleWeekDay2Digits(): void
    {
        $this->assertSame(
            5,
            DateTime::fromFormat('ee', '٠٥', null, 'ar-eg')->getWeekDay()
        );
    }

    public function testFromFormatLocaleWeekDayLong(): void
    {
        $this->assertSame(
            5,
            DateTime::fromFormat('eeee', 'пятница', null, 'ru')->getWeekDay()
        );
    }

    public function testFromFormatLocaleWeekDayShort(): void
    {
        $this->assertSame(
            5,
            DateTime::fromFormat('eee', 'пт', null, 'ru')->getWeekDay()
        );
    }

    public function testFromFormatLocaleWeekOfMonth(): void
    {
        $this->assertSame(
            3,
            DateTime::fromFormat('W', '٣', null, 'ar-eg')->getWeekOfMonth()
        );
    }

    public function testFromFormatLocaleWeekYear1Digit(): void
    {
        $this->assertSame(
            5,
            DateTime::fromFormat('Y w e', '٥ ١ ١', null, 'ar-eg')->getWeekYear()
        );
    }

    public function testFromFormatLocaleWeekYear1DigitFull(): void
    {
        $this->assertSame(
            2018,
            DateTime::fromFormat('Y w e', '٢٠١٨ ١ ٣', null, 'ar-eg')->getWeekYear()
        );
    }

    public function testFromFormatLocaleWeekYear2Digits(): void
    {
        $this->assertSame(
            1988,
            DateTime::fromFormat('YY w e', '٨٨ ١ ٦', null, 'ar-eg')->getWeekYear()
        );
    }

    public function testFromFormatLocaleWeekYear2DigitsFull(): void
    {
        $this->assertSame(
            2018,
            DateTime::fromFormat('YY w e', '٢٠١٨ ١ ٣', null, 'ar-eg')->getWeekYear()
        );
    }

    public function testFromFormatLocaleWeekYear3Digits(): void
    {
        $this->assertSame(
            88,
            DateTime::fromFormat('YYY w e', '٠٨٨ ١ ٦', null, 'ar-eg')->getWeekYear()
        );
    }

    public function testFromFormatLocaleWeekYear3DigitsFull(): void
    {
        $this->assertSame(
            2018,
            DateTime::fromFormat('YYY w e', '٢٠١٨ ١ ٣', null, 'ar-eg')->getWeekYear()
        );
    }

    public function testFromFormatLocaleWeekYear4Digits(): void
    {
        $this->assertSame(
            88,
            DateTime::fromFormat('YYYY w e', '٠٠٨٨ ١ ٦', null, 'ar-eg')->getWeekYear()
        );
    }

    public function testFromFormatLocaleWeekYear4DigitsFull(): void
    {
        $this->assertSame(
            2018,
            DateTime::fromFormat('YYYY w e', '٢٠١٨ ١ ٣', null, 'ar-eg')->getWeekYear()
        );
    }

    public function testFromFormatLocaleYear1Digit(): void
    {
        $this->assertSame(
            5,
            DateTime::fromFormat('y', '٥', null, 'ar-eg')->getYear()
        );
    }

    public function testFromFormatLocaleYear1DigitFull(): void
    {
        $this->assertSame(
            2018,
            DateTime::fromFormat('y', '٢٠١٨', null, 'ar-eg')->getYear()
        );
    }

    public function testFromFormatLocaleYear2Digits(): void
    {
        $this->assertSame(
            1988,
            DateTime::fromFormat('yy', '٨٨', null, 'ar-eg')->getYear()
        );
    }

    public function testFromFormatLocaleYear2DigitsFull(): void
    {
        $this->assertSame(
            2018,
            DateTime::fromFormat('yy', '٢٠١٨', null, 'ar-eg')->getYear()
        );
    }

    public function testFromFormatLocaleYear3Digits(): void
    {
        $this->assertSame(
            88,
            DateTime::fromFormat('yyy', '٠٨٨', null, 'ar-eg')->getYear()
        );
    }

    public function testFromFormatLocaleYear3DigitsFull(): void
    {
        $this->assertSame(
            2018,
            DateTime::fromFormat('yyy', '٢٠١٨', null, 'ar-eg')->getYear()
        );
    }

    public function testFromFormatLocaleYear4Digits(): void
    {
        $this->assertSame(
            88,
            DateTime::fromFormat('yyyy', '٠٠٨٨', null, 'ar-eg')->getYear()
        );
    }

    public function testFromFormatLocaleYear4DigitsFull(): void
    {
        $this->assertSame(
            2018,
            DateTime::fromFormat('yyyy', '٢٠١٨', null, 'ar-eg')->getYear()
        );
    }
}
