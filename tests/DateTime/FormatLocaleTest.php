<?php
declare(strict_types=1);

namespace Tests\DateTime;

use
    Fyre\DateTime\DateTime;

trait FormatLocaleTest
{

    /**
     * Era
     */

    public function testFormatLocaleEraShort(): void
    {
        $this->assertEquals(
            'н. э.',
            DateTime::fromArray([2018], null, 'ru')->format('GGG')
        );
    }

    public function testFormatLocaleEraShortBc(): void
    {
        $this->assertEquals(
            'до н. э.',
            DateTime::fromArray([-5], null, 'ru')->format('GGG')
        );
    }

    public function testFormatLocaleEraLong(): void
    {
        $this->assertEquals(
            'от Рождества Христова',
            DateTime::fromArray([2018], null, 'ru')->format('GGGG')
        );
    }

    public function testFormatLocaleEraLongBc(): void
    {
        $this->assertEquals(
            'до Рождества Христова',
            DateTime::fromArray([-5], null, 'ru')->format('GGGG')
        );
    }

    public function testFormatLocaleEraNarrow(): void
    {
        $this->assertEquals(
            'н.э.',
            DateTime::fromArray([2018], null, 'ru')->format('GGGGG')
        );
    }

    public function testFormatLocaleEraNarrowBc(): void
    {
        $this->assertEquals(
            'до н.э.',
            DateTime::fromArray([-5], null, 'ru')->format('GGGGG')
        );
    }

    /**
     * Year
     */

    public function testFormatLocaleYear1Digit(): void
    {
        $this->assertEquals(
            '٢٠١٨',
            DateTime::fromArray([2018], null, 'ar-eg')->format('y')
        );
    }

    public function testFormatLocaleYear1DigitPadding(): void
    {
        $this->assertEquals(
            '٥',
            DateTime::fromArray([5], null, 'ar-eg')->format('y')
        );
    }

    public function testFormatLocaleYear2Digits(): void
    {
        $this->assertEquals(
            '١٨',
            DateTime::fromArray([2018], null, 'ar-eg')->format('yy')
        );
    }

    public function testFormatLocaleYear2DigitsPadding(): void
    {
        $this->assertEquals(
            '٠٥',
            DateTime::fromArray([5], null, 'ar-eg')->format('yy')
        );
    }

    public function testFormatLocaleYear3Digits(): void
    {
        $this->assertEquals(
            '٢٠١٨',
            DateTime::fromArray([2018], null, 'ar-eg')->format('yyy')
        );
    }

    public function testFormatLocaleYear3DigitsPadding(): void
    {
        $this->assertEquals(
            '٠٠٥',
            DateTime::fromArray([5], null, 'ar-eg')->format('yyy')
        );
    }

    public function testFormatLocaleYear4Digits(): void
    {
        $this->assertEquals(
            '٢٠١٨',
            DateTime::fromArray([2018], null, 'ar-eg')->format('yyyy')
        );
    }

    public function testFormatLocaleYear4DigitsPadding(): void
    {
        $this->assertEquals(
            '٠٠٠٥',
            DateTime::fromArray([5], null, 'ar-eg')->format('yyyy')
        );
    }

    /**
     * Week Year
     */

    public function testFormatLocaleWeekYear1Digit(): void
    {
        $this->assertEquals(
            '٢٠١٨',
            DateTime::fromArray([2018], null, 'ar-eg')->format('Y')
        );
    }

    public function testFormatLocaleWeekYear1DigitCurrentWeek(): void
    {
        $this->assertEquals(
            '٢٠٢٠',
            DateTime::fromArray([2019, 12, 30], null, 'ar-eg')->format('Y')
        );
    }

    public function testFormatLocaleWeekYear1DigitPadding(): void
    {
        $this->assertEquals(
            '٥',
            DateTime::fromArray([5, 2], null, 'ar-eg')->format('Y')
        );
    }

    public function testFormatLocaleWeekYear2Digits(): void
    {
        $this->assertEquals(
            '١٨',
            DateTime::fromArray([2018], null, 'ar-eg')->format('YY')
        );
    }

    public function testFormatLocaleWeekYear2DigitsCurrentWeek(): void
    {
        $this->assertEquals(
            '٢٠',
            DateTime::fromArray([2019, 12, 30], null, 'ar-eg')->format('YY')
        );
    }

    public function testFormatLocaleWeekYear2DigitsPadding(): void
    {
        $this->assertEquals(
            '٠٥',
            DateTime::fromArray([5, 2], null, 'ar-eg')->format('YY')
        );
    }

    public function testFormatLocaleWeekYear3Digits(): void
    {
        $this->assertEquals(
            '٢٠١٨',
            DateTime::fromArray([2018], null, 'ar-eg')->format('YYY')
        );
    }

    public function testFormatLocaleWeekYear3DigitsCurrentWeek(): void
    {
        $this->assertEquals(
            '٢٠٢٠',
            DateTime::fromArray([2019, 12, 30], null, 'ar-eg')->format('YYY')
        );
    }

    public function testFormatLocaleWeekYear3DigitsPadding(): void
    {
        $this->assertEquals(
            '٠٠٥',
            DateTime::fromArray([5], null, 'ar-eg')->format('YYY')
        );
    }

    public function testFormatLocaleWeekYear4Digits(): void
    {
        $this->assertEquals(
            '٢٠١٨',
            DateTime::fromArray([2018], null, 'ar-eg')->format('YYYY')
        );
    }

    public function testFormatLocaleWeekYear4DigitsCurrentWeek(): void
    {
        $this->assertEquals(
            '٢٠٢٠',
            DateTime::fromArray([2019, 12, 30], null, 'ar-eg')->format('YYYY')
        );
    }

    public function testFormatLocaleWeekYear4DigitsPadding(): void
    {
        $this->assertEquals(
            '٠٠٠٥',
            DateTime::fromArray([5], null, 'ar-eg')->format('YYYY')
        );
    }

    /**
     * Quarter
     */

    public function testFormatLocaleQuarter1Digit(): void
    {
        $this->assertEquals(
            '٣',
            DateTime::fromArray([2018, 8], null, 'ar-eg')->format('q')
        );
    }

    public function testFormatLocaleQuarter2Digits(): void
    {
        $this->assertEquals(
            '٠٣',
            DateTime::fromArray([2018, 8], null, 'ar-eg')->format('qq')
        );
    }

    public function testFormatLocaleStandaloneQuarter1Digit(): void
    {
        $this->assertEquals(
            '٣',
            DateTime::fromArray([2018, 8], null, 'ar-eg')->format('Q')
        );
    }

    public function testFormatLocaleStandaloneQuarter2Digits(): void
    {
        $this->assertEquals(
            '٠٣',
            DateTime::fromArray([2018, 8], null, 'ar-eg')->format('QQ')
        );
    }

    /**
     * Month
     */

    public function testFormatLocaleMonth1Digit(): void
    {
        $this->assertEquals(
            '١٠',
            DateTime::fromArray([2018, 10], null, 'ar-eg')->format('M')
        );
    }

    public function testFormatLocaleMonth1DigitPadding(): void
    {
        $this->assertEquals(
            '١',
            DateTime::fromArray([2018, 1], null, 'ar-eg')->format('M')
        );
    }

    public function testFormatLocaleMonth2Digits(): void
    {
        $this->assertEquals(
            '١٠',
            DateTime::fromArray([2018, 10], null, 'ar-eg')->format('MM')
        );
    }

    public function testFormatLocaleMonth2DigitsPadding(): void
    {
        $this->assertEquals(
            '٠١',
            DateTime::fromArray([2018, 1], null, 'ar-eg')->format('MM')
        );
    }

    public function testFormatLocaleMonthShort(): void
    {
        $this->assertEquals(
            'окт.',
            DateTime::fromArray([2018, 10], null, 'ru')->format('MMM')
        );
    }

    public function testFormatLocaleMonthLong(): void
    {
        $this->assertEquals(
            'октября',
            DateTime::fromArray([2018, 10], null, 'ru')->format('MMMM')
        );
    }

    public function testFormatLocaleMonthNarrow(): void
    {
        $this->assertEquals(
            'О',
            DateTime::fromArray([2018, 10], null, 'ru')->format('MMMMM')
        );
    }

    public function testFormatLocaleStandaloneMonth1Digit(): void
    {
        $this->assertEquals(
            '١٠',
            DateTime::fromArray([2018, 10], null, 'ar-eg')->format('L')
        );
    }

    public function testFormatLocaleStandaloneMonth1DigitPadding(): void
    {
        $this->assertEquals(
            '١',
            DateTime::fromArray([2018, 1], null, 'ar-eg')->format('L')
        );
    }

    public function testFormatLocaleStandaloneMonth2Digits(): void
    {
        $this->assertEquals(
            '١٠',
            DateTime::fromArray([2018, 10], null, 'ar-eg')->format('LL')
        );
    }

    public function testFormatLocaleStandaloneMonth2DigitsPadding(): void
    {
        $this->assertEquals(
            '٠١',
            DateTime::fromArray([2018, 1], null, 'ar-eg')->format('LL')
        );
    }

    public function testFormatLocaleStandaloneMonthShort(): void
    {
        $this->assertEquals(
            'окт.',
            DateTime::fromArray([2018, 10], null, 'ru')->format('LLL')
        );
    }

    public function testFormatLocaleStandaloneMonthLong(): void
    {
        $this->assertEquals(
            'октябрь',
            DateTime::fromArray([2018, 10], null, 'ru')->format('LLLL')
        );
    }

    public function testFormatLocaleStandaloneMonthNarrow(): void
    {
        $this->assertEquals(
            'О',
            DateTime::fromArray([2018, 10], null, 'ru')->format('LLLLL')
        );
    }

    /**
     * Week
     */

    public function testFormatLocaleWeekOfYear1Digit(): void
    {
        $this->assertEquals(
            '٢٢',
            DateTime::fromArray([2018, 6], null, 'ar-eg')->format('w')
        );
    }

    public function testFormatLocaleWeekOfYear1DigitPadding(): void
    {
        $this->assertEquals(
            '١',
            DateTime::fromArray([2018, 1], null, 'ar-eg')->format('w')
        );
    }

    public function testFormatLocaleWeekOfYear2Digits(): void
    {
        $this->assertEquals(
            '٢٢',
            DateTime::fromArray([2018, 6], null, 'ar-eg')->format('ww')
        );
    }

    public function testFormatLocaleWeekOfYear2DigitsPadding(): void
    {
        $this->assertEquals(
            '٠١',
            DateTime::fromArray([2018, 1], null, 'ar-eg')->format('ww')
        );
    }

    public function testFormatLocaleWeekOfMonth(): void
    {
        $this->assertEquals(
            '١',
            DateTime::fromArray([2019, 6, 1], null, 'ar-eg')->format('W')
        );
    }

    public function testFormatLocaleWeekOfMonthCurrentWeek(): void
    {
        $this->assertEquals(
            '٢',
            DateTime::fromArray([2019, 6, 8], null, 'ar-eg')->format('W')
        );
    }

    /**
     * Day
     */

    public function testFormatLocaleDayOfMonth1Digit(): void
    {
        $this->assertEquals(
            '٢١',
            DateTime::fromArray([2019, 1, 21], null, 'ar-eg')->format('d')
        );
    }

    public function testFormatLocaleDayOfMonth1DigitPadding(): void
    {
        $this->assertEquals(
            '١',
            DateTime::fromArray([2019, 1, 1], null, 'ar-eg')->format('d')
        );
    }

    public function testFormatLocaleDayOfMonth2Digits(): void
    {
        $this->assertEquals(
            '٢١',
            DateTime::fromArray([2019, 1, 21], null, 'ar-eg')->format('dd')
        );
    }

    public function testFormatLocaleDayOfMonth2DigitsPadding(): void
    {
        $this->assertEquals(
            '٠١',
            DateTime::fromArray([2019, 1, 1], null, 'ar-eg')->format('dd')
        );
    }

    public function testFormatLocaleDayOfYear1Digit(): void
    {
        $this->assertEquals(
            '١٥٢',
            DateTime::fromArray([2019, 6, 1], null, 'ar-eg')->format('D')
        );
    }

    public function testFormatLocaleDayOfYear1DigitPadding(): void
    {
        $this->assertEquals(
            '١',
            DateTime::fromArray([2019, 1, 1], null, 'ar-eg')->format('D')
        );
    }

    public function testFormatLocaleDayOfYear2Digits(): void
    {
        $this->assertEquals(
            '١٥٢',
            DateTime::fromArray([2019, 6, 1], null, 'ar-eg')->format('DD')
        );
    }

    public function testFormatLocaleDayOfYear2DigitsPadding(): void
    {
        $this->assertEquals(
            '٠١',
            DateTime::fromArray([2019, 1, 1], null, 'ar-eg')->format('DD')
        );
    }

    public function testFormatLocaleDayOfYear3Digits(): void
    {
        $this->assertEquals(
            '١٥٢',
            DateTime::fromArray([2019, 6, 1], null, 'ar-eg')->format('DDD')
        );
    }

    public function testFormatLocaleDayOfYear3DigitsPadding(): void
    {
        $this->assertEquals(
            '٠٠١',
            DateTime::fromArray([2019, 1, 1], null, 'ar-eg')->format('DDD')
        );
    }

    public function testFormatLocaleDayOfWeekInMonth(): void
    {
        $this->assertEquals(
            '١',
            DateTime::fromArray([2019, 1, 1], null, 'ar-eg')->format('F')
        );
    }

    public function testFormatLocaleDayOfWeekInMonthCurrentWeek(): void
    {
        $this->assertEquals(
            '١',
            DateTime::fromArray([2019, 6, 7], null, 'ar-eg')->format('F')
        );
    }

    /**
     * Week Day
     */

    public function testFormatLocaleAltWeekDayShort(): void
    {
        $this->assertEquals(
            'пт',
            DateTime::fromArray([2018, 6, 1], null, 'ru')->format('EEE')
        );
    }

    public function testFormatLocaleAltWeekDayLong(): void
    {
        $this->assertEquals(
            'пятница',
            DateTime::fromArray([2018, 6, 1], null, 'ru')->format('EEEE')
        );
    }

    // public function testFormatLocaleAltWeekDayNarrow(): void
    // {
    //     $this->assertEquals(
    //         'П',
    //         DateTime::fromArray([2018, 6, 1], null, 'ru')->format('EEEEE')
    //     );
    // }

    public function testFormatLocaleWeekDay1Digit(): void
    {
        $this->assertEquals(
            '٧',
            DateTime::fromArray([2018, 6, 1], null, 'ar-eg')->format('e')
        );
    }

    public function testFormatLocaleWeekDay2Digits(): void
    {
        $this->assertEquals(
            '٠٧',
            DateTime::fromArray([2018, 6, 1], null, 'ar-eg')->format('ee')
        );
    }

    public function testFormatLocaleWeekDayShort(): void
    {
        $this->assertEquals(
            'пт',
            DateTime::fromArray([2018, 6, 1], null, 'ru')->format('eee')
        );
    }

    public function testFormatLocaleWeekDayLong(): void
    {
        $this->assertEquals(
            'пятница',
            DateTime::fromArray([2018, 6, 1], null, 'ru')->format('eeee')
        );
    }

    // public function testFormatLocaleWeekDayNarrow(): void
    // {
    //     $this->assertEquals(
    //         'П',
    //         DateTime::fromArray([2018, 6, 1], null, 'ru')->format('eeeee')
    //     );
    // }

    public function testFormatLocaleStandaloneWeekDay1Digit(): void
    {
        $this->assertEquals(
            '٧',
            DateTime::fromArray([2018, 6, 1], null, 'ar-eg')->format('c')
        );
    }

    public function testFormatLocaleStandaloneWeekDay2Digits(): void
    {
        $this->assertEquals(
            '٧',
            DateTime::fromArray([2018, 6, 1], null, 'ar-eg')->format('cc')
        );
    }

    public function testFormatLocaleStandaloneWeekDayShort(): void
    {
        $this->assertEquals(
            'пт',
            DateTime::fromArray([2018, 6, 1], null, 'ru')->format('ccc')
        );
    }

    public function testFormatLocaleStandaloneWeekDayLong(): void
    {
        $this->assertEquals(
            'пятница',
            DateTime::fromArray([2018, 6, 1], null, 'ru')->format('cccc')
        );
    }

    public function testFormatLocaleStandaloneWeekDayNarrow(): void
    {
        $this->assertEquals(
            'П',
            DateTime::fromArray([2018, 6, 1], null, 'ru')->format('ccccc')
        );
    }

    /**
     * Day Period
     */

    public function testFormatLocaleDayPeriodShortAm(): void
    {
        $this->assertEquals(
            '上午',
            DateTime::fromArray([2018, 1, 1, 0], null, 'zh')->format('aaa')
        );
    }

    public function testFormatLocaleDayPeriodShortPm(): void
    {
        $this->assertEquals(
            '下午',
            DateTime::fromArray([2018, 1, 1, 12], null, 'zh')->format('aaa')
        );
    }

    public function testFormatLocaleDayPeriodLongAm(): void
    {
        $this->assertEquals(
            '上午',
            DateTime::fromArray([2018, 1, 1, 0], null, 'zh')->format('aaaa')
        );
    }

    public function testFormatLocaleDayPeriodLongPm(): void
    {
        $this->assertEquals(
            '下午',
            DateTime::fromArray([2018, 1, 1, 12], null, 'zh')->format('aaaa')
        );
    }

    /**
     * Hour
     */

    public function testFormatLocale12Hour1Digit(): void
    {
        $this->assertEquals(
            '١٢',
            DateTime::fromArray([2018, 1, 1, 12], null, 'ar-eg')->format('h')
        );
    }

    public function testFormatLocale12Hour1DigitPadding(): void
    {
        $this->assertEquals(
            '١',
            DateTime::fromArray([2018, 1, 1, 1], null, 'ar-eg')->format('h')
        );
    }

    public function testFormatLocale12Hour2Digits(): void
    {
        $this->assertEquals(
            '١١',
            DateTime::fromArray([2018, 1, 1, 23], null, 'ar-eg')->format('hh')
        );
    }

    public function testFormatLocale12Hour2DigitsPadding(): void
    {
        $this->assertEquals(
            '٠١',
            DateTime::fromArray([2018, 1, 1, 1], null, 'ar-eg')->format('hh')
        );
    }

    public function testFormatLocale23Hour1Digit(): void
    {
        $this->assertEquals(
            '٢٣',
            DateTime::fromArray([2018, 1, 1, 23], null, 'ar-eg')->format('H')
        );
    }

    public function testFormatLocale23Hour1DigitPadding(): void
    {
        $this->assertEquals(
            '٠',
            DateTime::fromArray([2018, 1, 1, 0], null, 'ar-eg')->format('H')
        );
    }

    public function testFormatLocale23Hour2Digits(): void
    {
        $this->assertEquals(
            '٢٣',
            DateTime::fromArray([2018, 1, 1, 23], null, 'ar-eg')->format('HH')
        );
    }

    public function testFormatLocale23Hour2DigitsPadding(): void
    {
        $this->assertEquals(
            '٠٠',
            DateTime::fromArray([2018, 1, 1, 0], null, 'ar-eg')->format('HH')
        );
    }

    public function testFormatLocale11Hour1Digit(): void
    {
        $this->assertEquals(
            '١١',
            DateTime::fromArray([2018, 1, 1, 23], null, 'ar-eg')->format('K')
        );
    }

    public function testFormatLocale11Hour1DigitPadding(): void
    {
        $this->assertEquals(
            '٠',
            DateTime::fromArray([2018, 1, 1, 0], null, 'ar-eg')->format('K')
        );
    }

    public function testFormatLocale11Hour2Digits(): void
    {
        $this->assertEquals(
            '١١',
            DateTime::fromArray([2018, 1, 1, 23], null, 'ar-eg')->format('KK')
        );
    }

    public function testFormatLocale11Hour2DigitsPadding(): void
    {
        $this->assertEquals(
            '٠٠',
            DateTime::fromArray([2018, 1, 1, 0], null, 'ar-eg')->format('KK')
        );
    }

    public function testFormatLocale24Hour1Digit(): void
    {
        $this->assertEquals(
            '٢٤',
            DateTime::fromArray([2018, 1, 1, 0], null, 'ar-eg')->format('k')
        );
    }

    public function testFormatLocale24Hour1DigitPadding(): void
    {
        $this->assertEquals(
            '١',
            DateTime::fromArray([2018, 1, 1, 1], null, 'ar-eg')->format('k')
        );
    }

    public function testFormatLocale24Hour2Digits(): void
    {
        $this->assertEquals(
            '٢٤',
            DateTime::fromArray([2018, 1, 1, 0], null, 'ar-eg')->format('kk')
        );
    }

    public function testFormatLocale24Hour2DigitsPadding(): void
    {
        $this->assertEquals(
            '٠١',
            DateTime::fromArray([2018, 1, 1, 1], null, 'ar-eg')->format('kk')
        );
    }

    /**
     * Minute
     */

    public function testFormatLocaleMinute1Digit(): void
    {
        $this->assertEquals(
            '٢٥',
            DateTime::fromArray([2018, 1, 1, 0, 25], null, 'ar-eg')->format('m')
        );
    }

    public function testFormatLocaleMinute1DigitPadding(): void
    {
        $this->assertEquals(
            '١',
            DateTime::fromArray([2018, 1, 1, 0, 1], null, 'ar-eg')->format('m')
        );
    }

    public function testFormatLocaleMinute2Digits(): void
    {
        $this->assertEquals(
            '٢٥',
            DateTime::fromArray([2018, 1, 1, 0, 25], null, 'ar-eg')->format('mm')
        );
    }

    public function testFormatLocaleMinute2DigitsPadding(): void
    {
        $this->assertEquals(
            '٠١',
            DateTime::fromArray([2018, 1, 1, 0, 1], null, 'ar-eg')->format('mm')
        );
    }

    /**
     * Second
     */

    public function testFormatLocaleSecond1Digit(): void
    {
        $this->assertEquals(
            '٢٥',
            DateTime::fromArray([2018, 1, 1, 0, 0, 25], null, 'ar-eg')->format('s')
        );
    }

    public function testFormatLocaleSecond1DigitPadding(): void
    {
        $this->assertEquals(
            '١',
            DateTime::fromArray([2018, 1, 1, 0, 0, 1], null, 'ar-eg')->format('s')
        );
    }

    public function testFormatLocaleSecond2Digits(): void
    {
        $this->assertEquals(
            '٢٥',
            DateTime::fromArray([2018, 1, 1, 0, 0, 25], null, 'ar-eg')->format('ss')
        );
    }

    public function testFormatLocaleSecond2DigitsPadding(): void
    {
        $this->assertEquals(
            '٠١',
            DateTime::fromArray([2018, 1, 1, 0, 0, 1], null, 'ar-eg')->format('ss')
        );
    }

    public function testFormatLocaleFractional(): void
    {
        $this->assertEquals(
            '١٢٣',
            DateTime::fromArray([2018, 1, 1, 0, 0, 0, 123], null, 'ar-eg')->format('SSS')
        );
    }

    public function testFormatLocaleFractionalTruncate(): void
    {
        $this->assertEquals(
            '١',
            DateTime::fromArray([2018, 1, 1, 0, 0, 0, 123], null, 'ar-eg')->format('S')
        );
    }

    public function testFormatLocaleFractionalPadding(): void
    {
        $this->assertEquals(
            '١٢٣٠٠٠',
            DateTime::fromArray([2018, 1, 1, 0, 0, 0, 123], null, 'ar-eg')->format('SSSSSS')
        );
    }

    /**
     * Time Zone
     */

    public function testFormatLocaleTimeZoneShortNonLocation(): void
    {
        $this->assertEquals(
            'UTC',
            DateTime::now(null, 'ru')->format('zzz')
        );
    }

    public function testFormatLocaleTimeZoneShortNonLocationTimeZone(): void
    {
        $this->assertEquals(
            'GMT+10',
            DateTime::now('Australia/Brisbane', null, 'ru')->format('zzz')
        );
    }

    public function testFormatLocaleTimeZoneLongNonLocation(): void
    {
        $this->assertEquals(
            'Всемирное координированное время',
            DateTime::now(null, 'ru')->format('zzzz')
        );
    }

    // public function testFormatLocaleTimeZoneLongNonLocationTimeZone(): void
    // {
    //     $this->assertEquals(
    //         'Восточная Австралия, стандартное время',
    //         DateTime::now('Australia/Brisbane', null, 'ru')->format('zzzz')
    //     );
    // }

    public function testFormatLocaleTimeZoneIso8601BasicAlt(): void
    {
        $this->assertEquals(
            '+0000',
            DateTime::now(null, 'ru')->format('ZZZ')
        );
    }

    public function testFormatLocaleTimeZoneIso8601BasicAltTimeZone(): void
    {
        $this->assertEquals(
            '+1000',
            DateTime::now('Australia/Brisbane', null, 'ru')->format('ZZZ')
        );
    }

    public function testFormatLocaleTimeZoneLongBasic(): void
    {
        $this->assertEquals(
            'GMT',
            DateTime::now(null, 'ru')->format('ZZZZ')
        );
    }

    public function testFormatLocaleTimeZoneLongBasicTimeZone(): void
    {
        $this->assertEquals(
            'GMT+10:00',
            DateTime::now('Australia/Brisbane', null, 'ru')->format('ZZZZ')
        );
    }

    public function testFormatLocaleTimeZoneIso8601ExtendedAlt(): void
    {
        $this->assertEquals(
            'Z',
            DateTime::now(null, 'ru')->format('ZZZZZ')
        );
    }

    public function testFormatLocaleTimeZoneIso8601ExtendedAltTimeZone(): void
    {
        $this->assertEquals(
            '+10:00',
            DateTime::now('Australia/Brisbane', null, 'ru')->format('ZZZZZ')
        );
    }

    public function testFormatLocaleTimeZoneShortLocalized(): void
    {
        $this->assertEquals(
            'GMT',
            DateTime::now(null, 'ru')->format('O')
        );
    }

    public function testFormatLocaleTimeZoneShortLocalizedTimeZone(): void
    {
        $this->assertEquals(
            'GMT+10',
            DateTime::now('Australia/Brisbane', null, 'ru')->format('O')
        );
    }

    public function testFormatLocaleTimeZoneLongLocalized(): void
    {
        $this->assertEquals(
            'GMT',
            DateTime::now(null, 'ru')->format('OOOO')
        );
    }

    public function testFormatLocaleTimeZoneLongLocalizedTimeZone(): void
    {
        $this->assertEquals(
            'GMT+10:00',
            DateTime::now('Australia/Brisbane', null, 'ru')->format('OOOO')
        );
    }

    public function testFormatLocaleTimeZoneLongTimeZoneId(): void
    {
        $this->assertEquals(
            'UTC',
            DateTime::now(null, 'ru')->format('VV')
        );
    }

    public function testFormatLocaleTimeZoneLongTimeZoneIdTimeZone(): void
    {
        $this->assertEquals(
            'Australia/Brisbane',
            DateTime::now('Australia/Brisbane', null, 'ru')->format('VV')
        );
    }

    public function testFormatLocaleTimeZoneIso8601BasicShortZ(): void
    {
        $this->assertEquals(
            'Z',
            DateTime::now(null, 'ru')->format('X')
        );
    }

    public function testFormatLocaleTimeZoneIso8601BasicShortZTimeZone(): void
    {
        $this->assertEquals(
            '+10',
            DateTime::now('Australia/Brisbane', null, 'ru')->format('X')
        );
    }

    public function testFormatLocaleTimeZoneIso8601BasicZ(): void
    {
        $this->assertEquals(
            'Z',
            DateTime::now(null, 'ru')->format('XX')
        );
    }

    public function testFormatLocaleTimeZoneIso8601BasicZTimeZone(): void
    {
        $this->assertEquals(
            '+1000',
            DateTime::now('Australia/Brisbane', null, 'ru')->format('XX')
        );
    }

    public function testFormatLocaleTimeZoneIso8601ExtendedZ(): void
    {
        $this->assertEquals(
            'Z',
            DateTime::now(null, 'ru')->format('XXX')
        );
    }

    public function testFormatLocaleTimeZoneIso8601ExtendedZTimeZone(): void
    {
        $this->assertEquals(
            '+10:00',
            DateTime::now('Australia/Brisbane', null, 'ru')->format('XXX')
        );
    }

    public function testFormatLocaleTimeZoneIso8601BasicShort(): void
    {
        $this->assertEquals(
            '+00',
            DateTime::now(null, 'ru')->format('x')
        );
    }

    public function testFormatLocaleTimeZoneIso8601BasicShortTimeZone(): void
    {
        $this->assertEquals(
            '+10',
            DateTime::now('Australia/Brisbane', null, 'ru')->format('x')
        );
    }

    public function testFormatLocaleTimeZoneIso8601Basic(): void
    {
        $this->assertEquals(
            '+0000',
            DateTime::now(null, 'ru')->format('xx')
        );
    }

    public function testFormatLocaleTimeZoneIso8601BasicTimeZone(): void
    {
        $this->assertEquals(
            '+1000',
            DateTime::now('Australia/Brisbane', null, 'ru')->format('xx')
        );
    }

    public function testFormatLocaleTimeZoneIso8601Extended(): void
    {
        $this->assertEquals(
            '+00:00',
            DateTime::now(null, 'ru')->format('xxx')
        );
    }

    public function testFormatLocaleTimeZoneIso8601ExtendedTimeZone(): void
    {
        $this->assertEquals(
            '+10:00',
            DateTime::now('Australia/Brisbane', null, 'ru')->format('xxx')
        );
    }

}
