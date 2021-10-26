<?php
declare(strict_types=1);

namespace Tests;

use
    Fyre\DateTime\DateTime;

trait DateTimeFormatLocaleTest
{

    /**
     * Era
     */

    public function testDateTimeFormatLocaleEraShort(): void
    {
        $this->assertEquals(
            'н. э.',
            DateTime::fromArray([2018], null, 'ru')->format('GGG')
        );
    }

    public function testDateTimeFormatLocaleEraShortBc(): void
    {
        $this->assertEquals(
            'до н. э.',
            DateTime::fromArray([-5], null, 'ru')->format('GGG')
        );
    }

    public function testDateTimeFormatLocaleEraLong(): void
    {
        $this->assertEquals(
            'от Рождества Христова',
            DateTime::fromArray([2018], null, 'ru')->format('GGGG')
        );
    }

    public function testDateTimeFormatLocaleEraLongBc(): void
    {
        $this->assertEquals(
            'до Рождества Христова',
            DateTime::fromArray([-5], null, 'ru')->format('GGGG')
        );
    }

    public function testDateTimeFormatLocaleEraNarrow(): void
    {
        $this->assertEquals(
            'н.э.',
            DateTime::fromArray([2018], null, 'ru')->format('GGGGG')
        );
    }

    public function testDateTimeFormatLocaleEraNarrowBc(): void
    {
        $this->assertEquals(
            'до н.э.',
            DateTime::fromArray([-5], null, 'ru')->format('GGGGG')
        );
    }

    /**
     * Year
     */

    public function testDateTimeFormatLocaleYear1Digit(): void
    {
        $this->assertEquals(
            '٢٠١٨',
            DateTime::fromArray([2018], null, 'ar-eg')->format('y')
        );
    }

    public function testDateTimeFormatLocaleYear1DigitPadding(): void
    {
        $this->assertEquals(
            '٥',
            DateTime::fromArray([5], null, 'ar-eg')->format('y')
        );
    }

    public function testDateTimeFormatLocaleYear2Digits(): void
    {
        $this->assertEquals(
            '١٨',
            DateTime::fromArray([2018], null, 'ar-eg')->format('yy')
        );
    }

    public function testDateTimeFormatLocaleYear2DigitsPadding(): void
    {
        $this->assertEquals(
            '٠٥',
            DateTime::fromArray([5], null, 'ar-eg')->format('yy')
        );
    }

    public function testDateTimeFormatLocaleYear3Digits(): void
    {
        $this->assertEquals(
            '٢٠١٨',
            DateTime::fromArray([2018], null, 'ar-eg')->format('yyy')
        );
    }

    public function testDateTimeFormatLocaleYear3DigitsPadding(): void
    {
        $this->assertEquals(
            '٠٠٥',
            DateTime::fromArray([5], null, 'ar-eg')->format('yyy')
        );
    }

    public function testDateTimeFormatLocaleYear4Digits(): void
    {
        $this->assertEquals(
            '٢٠١٨',
            DateTime::fromArray([2018], null, 'ar-eg')->format('yyyy')
        );
    }

    public function testDateTimeFormatLocaleYear4DigitsPadding(): void
    {
        $this->assertEquals(
            '٠٠٠٥',
            DateTime::fromArray([5], null, 'ar-eg')->format('yyyy')
        );
    }

    /**
     * Week Year
     */

    public function testDateTimeFormatLocaleWeekYear1Digit(): void
    {
        $this->assertEquals(
            '٢٠١٨',
            DateTime::fromArray([2018], null, 'ar-eg')->format('Y')
        );
    }

    public function testDateTimeFormatLocaleWeekYear1DigitCurrentWeek(): void
    {
        $this->assertEquals(
            '٢٠٢٠',
            DateTime::fromArray([2019, 12, 30], null, 'ar-eg')->format('Y')
        );
    }

    public function testDateTimeFormatLocaleWeekYear1DigitPadding(): void
    {
        $this->assertEquals(
            '٥',
            DateTime::fromArray([5, 2], null, 'ar-eg')->format('Y')
        );
    }

    public function testDateTimeFormatLocaleWeekYear2Digits(): void
    {
        $this->assertEquals(
            '١٨',
            DateTime::fromArray([2018], null, 'ar-eg')->format('YY')
        );
    }

    public function testDateTimeFormatLocaleWeekYear2DigitsCurrentWeek(): void
    {
        $this->assertEquals(
            '٢٠',
            DateTime::fromArray([2019, 12, 30], null, 'ar-eg')->format('YY')
        );
    }

    public function testDateTimeFormatLocaleWeekYear2DigitsPadding(): void
    {
        $this->assertEquals(
            '٠٥',
            DateTime::fromArray([5, 2], null, 'ar-eg')->format('YY')
        );
    }

    public function testDateTimeFormatLocaleWeekYear3Digits(): void
    {
        $this->assertEquals(
            '٢٠١٨',
            DateTime::fromArray([2018], null, 'ar-eg')->format('YYY')
        );
    }

    public function testDateTimeFormatLocaleWeekYear3DigitsCurrentWeek(): void
    {
        $this->assertEquals(
            '٢٠٢٠',
            DateTime::fromArray([2019, 12, 30], null, 'ar-eg')->format('YYY')
        );
    }

    public function testDateTimeFormatLocaleWeekYear3DigitsPadding(): void
    {
        $this->assertEquals(
            '٠٠٥',
            DateTime::fromArray([5], null, 'ar-eg')->format('YYY')
        );
    }

    public function testDateTimeFormatLocaleWeekYear4Digits(): void
    {
        $this->assertEquals(
            '٢٠١٨',
            DateTime::fromArray([2018], null, 'ar-eg')->format('YYYY')
        );
    }

    public function testDateTimeFormatLocaleWeekYear4DigitsCurrentWeek(): void
    {
        $this->assertEquals(
            '٢٠٢٠',
            DateTime::fromArray([2019, 12, 30], null, 'ar-eg')->format('YYYY')
        );
    }

    public function testDateTimeFormatLocaleWeekYear4DigitsPadding(): void
    {
        $this->assertEquals(
            '٠٠٠٥',
            DateTime::fromArray([5], null, 'ar-eg')->format('YYYY')
        );
    }

    /**
     * Quarter
     */

    public function testDateTimeFormatLocaleQuarter1Digit(): void
    {
        $this->assertEquals(
            '٣',
            DateTime::fromArray([2018, 8], null, 'ar-eg')->format('q')
        );
    }

    public function testDateTimeFormatLocaleQuarter2Digits(): void
    {
        $this->assertEquals(
            '٠٣',
            DateTime::fromArray([2018, 8], null, 'ar-eg')->format('qq')
        );
    }

    public function testDateTimeFormatLocaleStandaloneQuarter1Digit(): void
    {
        $this->assertEquals(
            '٣',
            DateTime::fromArray([2018, 8], null, 'ar-eg')->format('Q')
        );
    }

    public function testDateTimeFormatLocaleStandaloneQuarter2Digits(): void
    {
        $this->assertEquals(
            '٠٣',
            DateTime::fromArray([2018, 8], null, 'ar-eg')->format('QQ')
        );
    }

    /**
     * Month
     */

    public function testDateTimeFormatLocaleMonth1Digit(): void
    {
        $this->assertEquals(
            '١٠',
            DateTime::fromArray([2018, 10], null, 'ar-eg')->format('M')
        );
    }

    public function testDateTimeFormatLocaleMonth1DigitPadding(): void
    {
        $this->assertEquals(
            '١',
            DateTime::fromArray([2018, 1], null, 'ar-eg')->format('M')
        );
    }

    public function testDateTimeFormatLocaleMonth2Digits(): void
    {
        $this->assertEquals(
            '١٠',
            DateTime::fromArray([2018, 10], null, 'ar-eg')->format('MM')
        );
    }

    public function testDateTimeFormatLocaleMonth2DigitsPadding(): void
    {
        $this->assertEquals(
            '٠١',
            DateTime::fromArray([2018, 1], null, 'ar-eg')->format('MM')
        );
    }

    public function testDateTimeFormatLocaleMonthShort(): void
    {
        $this->assertEquals(
            'окт.',
            DateTime::fromArray([2018, 10], null, 'ru')->format('MMM')
        );
    }

    public function testDateTimeFormatLocaleMonthLong(): void
    {
        $this->assertEquals(
            'октября',
            DateTime::fromArray([2018, 10], null, 'ru')->format('MMMM')
        );
    }

    public function testDateTimeFormatLocaleMonthNarrow(): void
    {
        $this->assertEquals(
            'О',
            DateTime::fromArray([2018, 10], null, 'ru')->format('MMMMM')
        );
    }

    public function testDateTimeFormatLocaleStandaloneMonth1Digit(): void
    {
        $this->assertEquals(
            '١٠',
            DateTime::fromArray([2018, 10], null, 'ar-eg')->format('L')
        );
    }

    public function testDateTimeFormatLocaleStandaloneMonth1DigitPadding(): void
    {
        $this->assertEquals(
            '١',
            DateTime::fromArray([2018, 1], null, 'ar-eg')->format('L')
        );
    }

    public function testDateTimeFormatLocaleStandaloneMonth2Digits(): void
    {
        $this->assertEquals(
            '١٠',
            DateTime::fromArray([2018, 10], null, 'ar-eg')->format('LL')
        );
    }

    public function testDateTimeFormatLocaleStandaloneMonth2DigitsPadding(): void
    {
        $this->assertEquals(
            '٠١',
            DateTime::fromArray([2018, 1], null, 'ar-eg')->format('LL')
        );
    }

    public function testDateTimeFormatLocaleStandaloneMonthShort(): void
    {
        $this->assertEquals(
            'окт.',
            DateTime::fromArray([2018, 10], null, 'ru')->format('LLL')
        );
    }

    public function testDateTimeFormatLocaleStandaloneMonthLong(): void
    {
        $this->assertEquals(
            'октябрь',
            DateTime::fromArray([2018, 10], null, 'ru')->format('LLLL')
        );
    }

    public function testDateTimeFormatLocaleStandaloneMonthNarrow(): void
    {
        $this->assertEquals(
            'О',
            DateTime::fromArray([2018, 10], null, 'ru')->format('LLLLL')
        );
    }

    /**
     * Week
     */

    public function testDateTimeFormatLocaleWeekOfYear1Digit(): void
    {
        $this->assertEquals(
            '٢٢',
            DateTime::fromArray([2018, 6], null, 'ar-eg')->format('w')
        );
    }

    public function testDateTimeFormatLocaleWeekOfYear1DigitPadding(): void
    {
        $this->assertEquals(
            '١',
            DateTime::fromArray([2018, 1], null, 'ar-eg')->format('w')
        );
    }

    public function testDateTimeFormatLocaleWeekOfYear2Digits(): void
    {
        $this->assertEquals(
            '٢٢',
            DateTime::fromArray([2018, 6], null, 'ar-eg')->format('ww')
        );
    }

    public function testDateTimeFormatLocaleWeekOfYear2DigitsPadding(): void
    {
        $this->assertEquals(
            '٠١',
            DateTime::fromArray([2018, 1], null, 'ar-eg')->format('ww')
        );
    }

    public function testDateTimeFormatLocaleWeekOfMonth(): void
    {
        $this->assertEquals(
            '١',
            DateTime::fromArray([2019, 6, 1], null, 'ar-eg')->format('W')
        );
    }

    public function testDateTimeFormatLocaleWeekOfMonthCurrentWeek(): void
    {
        $this->assertEquals(
            '٢',
            DateTime::fromArray([2019, 6, 8], null, 'ar-eg')->format('W')
        );
    }

    /**
     * Day
     */

    public function testDateTimeFormatLocaleDayOfMonth1Digit(): void
    {
        $this->assertEquals(
            '٢١',
            DateTime::fromArray([2019, 1, 21], null, 'ar-eg')->format('d')
        );
    }

    public function testDateTimeFormatLocaleDayOfMonth1DigitPadding(): void
    {
        $this->assertEquals(
            '١',
            DateTime::fromArray([2019, 1, 1], null, 'ar-eg')->format('d')
        );
    }

    public function testDateTimeFormatLocaleDayOfMonth2Digits(): void
    {
        $this->assertEquals(
            '٢١',
            DateTime::fromArray([2019, 1, 21], null, 'ar-eg')->format('dd')
        );
    }

    public function testDateTimeFormatLocaleDayOfMonth2DigitsPadding(): void
    {
        $this->assertEquals(
            '٠١',
            DateTime::fromArray([2019, 1, 1], null, 'ar-eg')->format('dd')
        );
    }

    public function testDateTimeFormatLocaleDayOfYear1Digit(): void
    {
        $this->assertEquals(
            '١٥٢',
            DateTime::fromArray([2019, 6, 1], null, 'ar-eg')->format('D')
        );
    }

    public function testDateTimeFormatLocaleDayOfYear1DigitPadding(): void
    {
        $this->assertEquals(
            '١',
            DateTime::fromArray([2019, 1, 1], null, 'ar-eg')->format('D')
        );
    }

    public function testDateTimeFormatLocaleDayOfYear2Digits(): void
    {
        $this->assertEquals(
            '١٥٢',
            DateTime::fromArray([2019, 6, 1], null, 'ar-eg')->format('DD')
        );
    }

    public function testDateTimeFormatLocaleDayOfYear2DigitsPadding(): void
    {
        $this->assertEquals(
            '٠١',
            DateTime::fromArray([2019, 1, 1], null, 'ar-eg')->format('DD')
        );
    }

    public function testDateTimeFormatLocaleDayOfYear3Digits(): void
    {
        $this->assertEquals(
            '١٥٢',
            DateTime::fromArray([2019, 6, 1], null, 'ar-eg')->format('DDD')
        );
    }

    public function testDateTimeFormatLocaleDayOfYear3DigitsPadding(): void
    {
        $this->assertEquals(
            '٠٠١',
            DateTime::fromArray([2019, 1, 1], null, 'ar-eg')->format('DDD')
        );
    }

    public function testDateTimeFormatLocaleDayOfWeekInMonth(): void
    {
        $this->assertEquals(
            '١',
            DateTime::fromArray([2019, 1, 1], null, 'ar-eg')->format('F')
        );
    }

    public function testDateTimeFormatLocaleDayOfWeekInMonthCurrentWeek(): void
    {
        $this->assertEquals(
            '١',
            DateTime::fromArray([2019, 6, 7], null, 'ar-eg')->format('F')
        );
    }

    /**
     * Week Day
     */

    public function testDateTimeFormatLocaleAltWeekDayShort(): void
    {
        $this->assertEquals(
            'пт',
            DateTime::fromArray([2018, 6, 1], null, 'ru')->format('EEE')
        );
    }

    public function testDateTimeFormatLocaleAltWeekDayLong(): void
    {
        $this->assertEquals(
            'пятница',
            DateTime::fromArray([2018, 6, 1], null, 'ru')->format('EEEE')
        );
    }

    // public function testDateTimeFormatLocaleAltWeekDayNarrow(): void
    // {
    //     $this->assertEquals(
    //         'П',
    //         DateTime::fromArray([2018, 6, 1], null, 'ru')->format('EEEEE')
    //     );
    // }

    public function testDateTimeFormatLocaleWeekDay1Digit(): void
    {
        $this->assertEquals(
            '٧',
            DateTime::fromArray([2018, 6, 1], null, 'ar-eg')->format('e')
        );
    }

    public function testDateTimeFormatLocaleWeekDay2Digits(): void
    {
        $this->assertEquals(
            '٠٧',
            DateTime::fromArray([2018, 6, 1], null, 'ar-eg')->format('ee')
        );
    }

    public function testDateTimeFormatLocaleWeekDayShort(): void
    {
        $this->assertEquals(
            'пт',
            DateTime::fromArray([2018, 6, 1], null, 'ru')->format('eee')
        );
    }

    public function testDateTimeFormatLocaleWeekDayLong(): void
    {
        $this->assertEquals(
            'пятница',
            DateTime::fromArray([2018, 6, 1], null, 'ru')->format('eeee')
        );
    }

    // public function testDateTimeFormatLocaleWeekDayNarrow(): void
    // {
    //     $this->assertEquals(
    //         'П',
    //         DateTime::fromArray([2018, 6, 1], null, 'ru')->format('eeeee')
    //     );
    // }

    public function testDateTimeFormatLocaleStandaloneWeekDay1Digit(): void
    {
        $this->assertEquals(
            '٧',
            DateTime::fromArray([2018, 6, 1], null, 'ar-eg')->format('c')
        );
    }

    public function testDateTimeFormatLocaleStandaloneWeekDay2Digits(): void
    {
        $this->assertEquals(
            '٧',
            DateTime::fromArray([2018, 6, 1], null, 'ar-eg')->format('cc')
        );
    }

    public function testDateTimeFormatLocaleStandaloneWeekDayShort(): void
    {
        $this->assertEquals(
            'пт',
            DateTime::fromArray([2018, 6, 1], null, 'ru')->format('ccc')
        );
    }

    public function testDateTimeFormatLocaleStandaloneWeekDayLong(): void
    {
        $this->assertEquals(
            'пятница',
            DateTime::fromArray([2018, 6, 1], null, 'ru')->format('cccc')
        );
    }

    public function testDateTimeFormatLocaleStandaloneWeekDayNarrow(): void
    {
        $this->assertEquals(
            'П',
            DateTime::fromArray([2018, 6, 1], null, 'ru')->format('ccccc')
        );
    }

    /**
     * Day Period
     */

    public function testDateTimeFormatLocaleDayPeriodShortAm(): void
    {
        $this->assertEquals(
            '上午',
            DateTime::fromArray([2018, 1, 1, 0], null, 'zh')->format('aaa')
        );
    }

    public function testDateTimeFormatLocaleDayPeriodShortPm(): void
    {
        $this->assertEquals(
            '下午',
            DateTime::fromArray([2018, 1, 1, 12], null, 'zh')->format('aaa')
        );
    }

    public function testDateTimeFormatLocaleDayPeriodLongAm(): void
    {
        $this->assertEquals(
            '上午',
            DateTime::fromArray([2018, 1, 1, 0], null, 'zh')->format('aaaa')
        );
    }

    public function testDateTimeFormatLocaleDayPeriodLongPm(): void
    {
        $this->assertEquals(
            '下午',
            DateTime::fromArray([2018, 1, 1, 12], null, 'zh')->format('aaaa')
        );
    }

    /**
     * Hour
     */

    public function testDateTimeFormatLocale12Hour1Digit(): void
    {
        $this->assertEquals(
            '١٢',
            DateTime::fromArray([2018, 1, 1, 12], null, 'ar-eg')->format('h')
        );
    }

    public function testDateTimeFormatLocale12Hour1DigitPadding(): void
    {
        $this->assertEquals(
            '١',
            DateTime::fromArray([2018, 1, 1, 1], null, 'ar-eg')->format('h')
        );
    }

    public function testDateTimeFormatLocale12Hour2Digits(): void
    {
        $this->assertEquals(
            '١١',
            DateTime::fromArray([2018, 1, 1, 23], null, 'ar-eg')->format('hh')
        );
    }

    public function testDateTimeFormatLocale12Hour2DigitsPadding(): void
    {
        $this->assertEquals(
            '٠١',
            DateTime::fromArray([2018, 1, 1, 1], null, 'ar-eg')->format('hh')
        );
    }

    public function testDateTimeFormatLocale23Hour1Digit(): void
    {
        $this->assertEquals(
            '٢٣',
            DateTime::fromArray([2018, 1, 1, 23], null, 'ar-eg')->format('H')
        );
    }

    public function testDateTimeFormatLocale23Hour1DigitPadding(): void
    {
        $this->assertEquals(
            '٠',
            DateTime::fromArray([2018, 1, 1, 0], null, 'ar-eg')->format('H')
        );
    }

    public function testDateTimeFormatLocale23Hour2Digits(): void
    {
        $this->assertEquals(
            '٢٣',
            DateTime::fromArray([2018, 1, 1, 23], null, 'ar-eg')->format('HH')
        );
    }

    public function testDateTimeFormatLocale23Hour2DigitsPadding(): void
    {
        $this->assertEquals(
            '٠٠',
            DateTime::fromArray([2018, 1, 1, 0], null, 'ar-eg')->format('HH')
        );
    }

    public function testDateTimeFormatLocale11Hour1Digit(): void
    {
        $this->assertEquals(
            '١١',
            DateTime::fromArray([2018, 1, 1, 23], null, 'ar-eg')->format('K')
        );
    }

    public function testDateTimeFormatLocale11Hour1DigitPadding(): void
    {
        $this->assertEquals(
            '٠',
            DateTime::fromArray([2018, 1, 1, 0], null, 'ar-eg')->format('K')
        );
    }

    public function testDateTimeFormatLocale11Hour2Digits(): void
    {
        $this->assertEquals(
            '١١',
            DateTime::fromArray([2018, 1, 1, 23], null, 'ar-eg')->format('KK')
        );
    }

    public function testDateTimeFormatLocale11Hour2DigitsPadding(): void
    {
        $this->assertEquals(
            '٠٠',
            DateTime::fromArray([2018, 1, 1, 0], null, 'ar-eg')->format('KK')
        );
    }

    public function testDateTimeFormatLocale24Hour1Digit(): void
    {
        $this->assertEquals(
            '٢٤',
            DateTime::fromArray([2018, 1, 1, 0], null, 'ar-eg')->format('k')
        );
    }

    public function testDateTimeFormatLocale24Hour1DigitPadding(): void
    {
        $this->assertEquals(
            '١',
            DateTime::fromArray([2018, 1, 1, 1], null, 'ar-eg')->format('k')
        );
    }

    public function testDateTimeFormatLocale24Hour2Digits(): void
    {
        $this->assertEquals(
            '٢٤',
            DateTime::fromArray([2018, 1, 1, 0], null, 'ar-eg')->format('kk')
        );
    }

    public function testDateTimeFormatLocale24Hour2DigitsPadding(): void
    {
        $this->assertEquals(
            '٠١',
            DateTime::fromArray([2018, 1, 1, 1], null, 'ar-eg')->format('kk')
        );
    }

    /**
     * Minute
     */

    public function testDateTimeFormatLocaleMinute1Digit(): void
    {
        $this->assertEquals(
            '٢٥',
            DateTime::fromArray([2018, 1, 1, 0, 25], null, 'ar-eg')->format('m')
        );
    }

    public function testDateTimeFormatLocaleMinute1DigitPadding(): void
    {
        $this->assertEquals(
            '١',
            DateTime::fromArray([2018, 1, 1, 0, 1], null, 'ar-eg')->format('m')
        );
    }

    public function testDateTimeFormatLocaleMinute2Digits(): void
    {
        $this->assertEquals(
            '٢٥',
            DateTime::fromArray([2018, 1, 1, 0, 25], null, 'ar-eg')->format('mm')
        );
    }

    public function testDateTimeFormatLocaleMinute2DigitsPadding(): void
    {
        $this->assertEquals(
            '٠١',
            DateTime::fromArray([2018, 1, 1, 0, 1], null, 'ar-eg')->format('mm')
        );
    }

    /**
     * Second
     */

    public function testDateTimeFormatLocaleSecond1Digit(): void
    {
        $this->assertEquals(
            '٢٥',
            DateTime::fromArray([2018, 1, 1, 0, 0, 25], null, 'ar-eg')->format('s')
        );
    }

    public function testDateTimeFormatLocaleSecond1DigitPadding(): void
    {
        $this->assertEquals(
            '١',
            DateTime::fromArray([2018, 1, 1, 0, 0, 1], null, 'ar-eg')->format('s')
        );
    }

    public function testDateTimeFormatLocaleSecond2Digits(): void
    {
        $this->assertEquals(
            '٢٥',
            DateTime::fromArray([2018, 1, 1, 0, 0, 25], null, 'ar-eg')->format('ss')
        );
    }

    public function testDateTimeFormatLocaleSecond2DigitsPadding(): void
    {
        $this->assertEquals(
            '٠١',
            DateTime::fromArray([2018, 1, 1, 0, 0, 1], null, 'ar-eg')->format('ss')
        );
    }

    public function testDateTimeFormatLocaleFractional(): void
    {
        $this->assertEquals(
            '١٢٣',
            DateTime::fromArray([2018, 1, 1, 0, 0, 0, 123], null, 'ar-eg')->format('SSS')
        );
    }

    public function testDateTimeFormatLocaleFractionalTruncate(): void
    {
        $this->assertEquals(
            '١',
            DateTime::fromArray([2018, 1, 1, 0, 0, 0, 123], null, 'ar-eg')->format('S')
        );
    }

    public function testDateTimeFormatLocaleFractionalPadding(): void
    {
        $this->assertEquals(
            '١٢٣٠٠٠',
            DateTime::fromArray([2018, 1, 1, 0, 0, 0, 123], null, 'ar-eg')->format('SSSSSS')
        );
    }

    /**
     * Time Zone
     */

    public function testDateTimeFormatLocaleTimeZoneShortNonLocation(): void
    {
        $this->assertEquals(
            'UTC',
            DateTime::now(null, 'ru')->format('zzz')
        );
    }

    public function testDateTimeFormatLocaleTimeZoneShortNonLocationTimeZone(): void
    {
        $this->assertEquals(
            'GMT+10',
            DateTime::now('Australia/Brisbane', null, 'ru')->format('zzz')
        );
    }

    public function testDateTimeFormatLocaleTimeZoneLongNonLocation(): void
    {
        $this->assertEquals(
            'Всемирное координированное время',
            DateTime::now(null, 'ru')->format('zzzz')
        );
    }

    // public function testDateTimeFormatLocaleTimeZoneLongNonLocationTimeZone(): void
    // {
    //     $this->assertEquals(
    //         'Восточная Австралия, стандартное время',
    //         DateTime::now('Australia/Brisbane', null, 'ru')->format('zzzz')
    //     );
    // }

    public function testDateTimeFormatLocaleTimeZoneIso8601BasicAlt(): void
    {
        $this->assertEquals(
            '+0000',
            DateTime::now(null, 'ru')->format('ZZZ')
        );
    }

    public function testDateTimeFormatLocaleTimeZoneIso8601BasicAltTimeZone(): void
    {
        $this->assertEquals(
            '+1000',
            DateTime::now('Australia/Brisbane', null, 'ru')->format('ZZZ')
        );
    }

    public function testDateTimeFormatLocaleTimeZoneLongBasic(): void
    {
        $this->assertEquals(
            'GMT',
            DateTime::now(null, 'ru')->format('ZZZZ')
        );
    }

    public function testDateTimeFormatLocaleTimeZoneLongBasicTimeZone(): void
    {
        $this->assertEquals(
            'GMT+10:00',
            DateTime::now('Australia/Brisbane', null, 'ru')->format('ZZZZ')
        );
    }

    public function testDateTimeFormatLocaleTimeZoneIso8601ExtendedAlt(): void
    {
        $this->assertEquals(
            'Z',
            DateTime::now(null, 'ru')->format('ZZZZZ')
        );
    }

    public function testDateTimeFormatLocaleTimeZoneIso8601ExtendedAltTimeZone(): void
    {
        $this->assertEquals(
            '+10:00',
            DateTime::now('Australia/Brisbane', null, 'ru')->format('ZZZZZ')
        );
    }

    public function testDateTimeFormatLocaleTimeZoneShortLocalized(): void
    {
        $this->assertEquals(
            'GMT',
            DateTime::now(null, 'ru')->format('O')
        );
    }

    public function testDateTimeFormatLocaleTimeZoneShortLocalizedTimeZone(): void
    {
        $this->assertEquals(
            'GMT+10',
            DateTime::now('Australia/Brisbane', null, 'ru')->format('O')
        );
    }

    public function testDateTimeFormatLocaleTimeZoneLongLocalized(): void
    {
        $this->assertEquals(
            'GMT',
            DateTime::now(null, 'ru')->format('OOOO')
        );
    }

    public function testDateTimeFormatLocaleTimeZoneLongLocalizedTimeZone(): void
    {
        $this->assertEquals(
            'GMT+10:00',
            DateTime::now('Australia/Brisbane', null, 'ru')->format('OOOO')
        );
    }

    public function testDateTimeFormatLocaleTimeZoneLongTimeZoneId(): void
    {
        $this->assertEquals(
            'UTC',
            DateTime::now(null, 'ru')->format('VV')
        );
    }

    public function testDateTimeFormatLocaleTimeZoneLongTimeZoneIdTimeZone(): void
    {
        $this->assertEquals(
            'Australia/Brisbane',
            DateTime::now('Australia/Brisbane', null, 'ru')->format('VV')
        );
    }

    public function testDateTimeFormatLocaleTimeZoneIso8601BasicShortZ(): void
    {
        $this->assertEquals(
            'Z',
            DateTime::now(null, 'ru')->format('X')
        );
    }

    public function testDateTimeFormatLocaleTimeZoneIso8601BasicShortZTimeZone(): void
    {
        $this->assertEquals(
            '+10',
            DateTime::now('Australia/Brisbane', null, 'ru')->format('X')
        );
    }

    public function testDateTimeFormatLocaleTimeZoneIso8601BasicZ(): void
    {
        $this->assertEquals(
            'Z',
            DateTime::now(null, 'ru')->format('XX')
        );
    }

    public function testDateTimeFormatLocaleTimeZoneIso8601BasicZTimeZone(): void
    {
        $this->assertEquals(
            '+1000',
            DateTime::now('Australia/Brisbane', null, 'ru')->format('XX')
        );
    }

    public function testDateTimeFormatLocaleTimeZoneIso8601ExtendedZ(): void
    {
        $this->assertEquals(
            'Z',
            DateTime::now(null, 'ru')->format('XXX')
        );
    }

    public function testDateTimeFormatLocaleTimeZoneIso8601ExtendedZTimeZone(): void
    {
        $this->assertEquals(
            '+10:00',
            DateTime::now('Australia/Brisbane', null, 'ru')->format('XXX')
        );
    }

    public function testDateTimeFormatLocaleTimeZoneIso8601BasicShort(): void
    {
        $this->assertEquals(
            '+00',
            DateTime::now(null, 'ru')->format('x')
        );
    }

    public function testDateTimeFormatLocaleTimeZoneIso8601BasicShortTimeZone(): void
    {
        $this->assertEquals(
            '+10',
            DateTime::now('Australia/Brisbane', null, 'ru')->format('x')
        );
    }

    public function testDateTimeFormatLocaleTimeZoneIso8601Basic(): void
    {
        $this->assertEquals(
            '+0000',
            DateTime::now(null, 'ru')->format('xx')
        );
    }

    public function testDateTimeFormatLocaleTimeZoneIso8601BasicTimeZone(): void
    {
        $this->assertEquals(
            '+1000',
            DateTime::now('Australia/Brisbane', null, 'ru')->format('xx')
        );
    }

    public function testDateTimeFormatLocaleTimeZoneIso8601Extended(): void
    {
        $this->assertEquals(
            '+00:00',
            DateTime::now(null, 'ru')->format('xxx')
        );
    }

    public function testDateTimeFormatLocaleTimeZoneIso8601ExtendedTimeZone(): void
    {
        $this->assertEquals(
            '+10:00',
            DateTime::now('Australia/Brisbane', null, 'ru')->format('xxx')
        );
    }

}
