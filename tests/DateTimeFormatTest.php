<?php
declare(strict_types=1);

namespace Tests;

use
    Fyre\DateTime;

trait DateTimeFormatTest
{

    /**
     * Era
     */

    public function testDateTimeFormatEraShort(): void
    {
        $this->assertEquals(
            'AD',
            DateTime::fromArray([2018])->format('GGG')
        );
    }

    public function testDateTimeFormatEraShortBc(): void
    {
        $this->assertEquals(
            'BC',
            DateTime::fromArray([-5])->format('GGG')
        );
    }

    public function testDateTimeFormatEraLong(): void
    {
        $this->assertEquals(
            'Anno Domini',
            DateTime::fromArray([2018])->format('GGGG')
        );
    }

    public function testDateTimeFormatEraLongBc(): void
    {
        $this->assertEquals(
            'Before Christ',
            DateTime::fromArray([-5])->format('GGGG')
        );
    }

    public function testDateTimeFormatEraNarrow(): void
    {
        $this->assertEquals(
            'A',
            DateTime::fromArray([2018])->format('GGGGG')
        );
    }

    public function testDateTimeFormatEraNarrowBc(): void
    {
        $this->assertEquals(
            'B',
            DateTime::fromArray([-5])->format('GGGGG')
        );
    }

    /**
     * Year
     */

    public function testDateTimeFormatYear1Digit(): void
    {
        $this->assertEquals(
            '2018',
            DateTime::fromArray([2018])->format('y')
        );
    }

    public function testDateTimeFormatYear1DigitPadding(): void
    {
        $this->assertEquals(
            '5',
            DateTime::fromArray([5])->format('y')
        );
    }

    public function testDateTimeFormatYear2Digits(): void
    {
        $this->assertEquals(
            '18',
            DateTime::fromArray([2018])->format('yy')
        );
    }

    public function testDateTimeFormatYear2DigitsPadding(): void
    {
        $this->assertEquals(
            '05',
            DateTime::fromArray([5])->format('yy')
        );
    }

    public function testDateTimeFormatYear3Digits(): void
    {
        $this->assertEquals(
            '2018',
            DateTime::fromArray([2018])->format('yyy')
        );
    }

    public function testDateTimeFormatYear3DigitsPadding(): void
    {
        $this->assertEquals(
            '005',
            DateTime::fromArray([5])->format('yyy')
        );
    }

    public function testDateTimeFormatYear4Digits(): void
    {
        $this->assertEquals(
            '2018',
            DateTime::fromArray([2018])->format('yyyy')
        );
    }

    public function testDateTimeFormatYear4DigitsPadding(): void
    {
        $this->assertEquals(
            '0005',
            DateTime::fromArray([5])->format('yyyy')
        );
    }

    /**
     * Week Year
     */

    public function testDateTimeFormatWeekYear1Digit(): void
    {
        $this->assertEquals(
            '2018',
            DateTime::fromArray([2018])->format('Y')
        );
    }

    public function testDateTimeFormatWeekYear1DigitCurrentWeek(): void
    {
        $this->assertEquals(
            '2020',
            DateTime::fromArray([2019, 12, 30])->format('Y')
        );
    }

    public function testDateTimeFormatWeekYear1DigitPadding(): void
    {
        $this->assertEquals(
            '5',
            DateTime::fromArray([5])->format('Y')
        );
    }

    public function testDateTimeFormatWeekYear2Digits(): void
    {
        $this->assertEquals(
            '18',
            DateTime::fromArray([2018])->format('YY')
        );
    }

    public function testDateTimeFormatWeekYear2DigitsCurrentWeek(): void
    {
        $this->assertEquals(
            '20',
            DateTime::fromArray([2019, 12, 30])->format('YY')
        );
    }

    public function testDateTimeFormatWeekYear2DigitsPadding(): void
    {
        $this->assertEquals(
            '05',
            DateTime::fromArray([5])->format('YY')
        );
    }

    public function testDateTimeFormatWeekYear3Digits(): void
    {
        $this->assertEquals(
            '2018',
            DateTime::fromArray([2018])->format('YYY')
        );
    }

    public function testDateTimeFormatWeekYear3DigitsCurrentWeek(): void
    {
        $this->assertEquals(
            '2020',
            DateTime::fromArray([2019, 12, 30])->format('YYY')
        );
    }

    public function testDateTimeFormatWeekYear3DigitsPadding(): void
    {
        $this->assertEquals(
            '005',
            DateTime::fromArray([5])->format('YYY')
        );
    }

    public function testDateTimeFormatWeekYear4Digits(): void
    {
        $this->assertEquals(
            '2018',
            DateTime::fromArray([2018])->format('YYYY')
        );
    }

    public function testDateTimeFormatWeekYear4DigitsCurrentWeek(): void
    {
        $this->assertEquals(
            '2020',
            DateTime::fromArray([2019, 12, 30])->format('YYYY')
        );
    }

    public function testDateTimeFormatWeekYear4DigitsPadding(): void
    {
        $this->assertEquals(
            '0005',
            DateTime::fromArray([5])->format('YYYY')
        );
    }

    /**
     * Quarter
     */

    public function testDateTimeFormatQuarter1Digit(): void
    {
        $this->assertEquals(
            '3',
            DateTime::fromArray([2018, 8])->format('q')
        );
    }

    public function testDateTimeFormatQuarter2Digits(): void
    {
        $this->assertEquals(
            '03',
            DateTime::fromArray([2018, 8])->format('qq')
        );
    }

    public function testDateTimeFormatStandaloneQuarter1Digit(): void
    {
        $this->assertEquals(
            '3',
            DateTime::fromArray([2018, 8])->format('Q')
        );
    }

    public function testDateTimeFormatStandaloneQuarter2Digits(): void
    {
        $this->assertEquals(
            '03',
            DateTime::fromArray([2018, 8])->format('QQ')
        );
    }

    /**
     * Month
     */

    public function testDateTimeFormatMonth1Digit(): void
    {
        $this->assertEquals(
            '10',
            DateTime::fromArray([2018, 10])->format('M')
        );
    }

    public function testDateTimeFormatMonth1DigitPadding(): void
    {
        $this->assertEquals(
            '1',
            DateTime::fromArray([2018, 1])->format('M')
        );
    }

    public function testDateTimeFormatMonth2Digits(): void
    {
        $this->assertEquals(
            '10',
            DateTime::fromArray([2018, 10])->format('MM')
        );
    }

    public function testDateTimeFormatMonth2DigitsPadding(): void
    {
        $this->assertEquals(
            '01',
            DateTime::fromArray([2018, 1])->format('MM')
        );
    }

    public function testDateTimeFormatMonthShort(): void
    {
        $this->assertEquals(
            'Oct',
            DateTime::fromArray([2018, 10])->format('MMM')
        );
    }

    public function testDateTimeFormatMonthLong(): void
    {
        $this->assertEquals(
            'October',
            DateTime::fromArray([2018, 10])->format('MMMM')
        );
    }

    public function testDateTimeFormatMonthNarrow(): void
    {
        $this->assertEquals(
            'O',
            DateTime::fromArray([2018, 10])->format('MMMMM')
        );
    }

    public function testDateTimeFormatStandaloneMonth1Digit(): void
    {
        $this->assertEquals(
            '10',
            DateTime::fromArray([2018, 10])->format('L')
        );
    }

    public function testDateTimeFormatStandaloneMonth1DigitPadding(): void
    {
        $this->assertEquals(
            '1',
            DateTime::fromArray([2018, 1])->format('L')
        );
    }

    public function testDateTimeFormatStandaloneMonth2Digits(): void
    {
        $this->assertEquals(
            '10',
            DateTime::fromArray([2018, 10])->format('LL')
        );
    }

    public function testDateTimeFormatStandaloneMonth2DigitsPadding(): void
    {
        $this->assertEquals(
            '01',
            DateTime::fromArray([2018, 1])->format('LL')
        );
    }

    public function testDateTimeFormatStandaloneMonthShort(): void
    {
        $this->assertEquals(
            'Oct',
            DateTime::fromArray([2018, 10])->format('LLL')
        );
    }

    public function testDateTimeFormatStandaloneMonthLong(): void
    {
        $this->assertEquals(
            'October',
            DateTime::fromArray([2018, 10])->format('LLLL')
        );
    }

    public function testDateTimeFormatStandaloneMonthNarrow(): void
    {
        $this->assertEquals(
            'O',
            DateTime::fromArray([2018, 10])->format('LLLLL')
        );
    }

    /**
     * Week
     */

    public function testDateTimeFormatWeekOfYear1Digit(): void
    {
        $this->assertEquals(
            '22',
            DateTime::fromArray([2018, 6])->format('w')
        );
    }

    public function testDateTimeFormatWeekOfYear1DigitPadding(): void
    {
        $this->assertEquals(
            '1',
            DateTime::fromArray([2018, 1])->format('w')
        );
    }

    public function testDateTimeFormatWeekOfYear2Digits(): void
    {
        $this->assertEquals(
            '22',
            DateTime::fromArray([2018, 6])->format('ww')
        );
    }

    public function testDateTimeFormatWeekOfYear2DigitsPadding(): void
    {
        $this->assertEquals(
            '01',
            DateTime::fromArray([2018, 1])->format('ww')
        );
    }

    public function testDateTimeFormatWeekOfMonth(): void
    {
        $this->assertEquals(
            '1',
            DateTime::fromArray([2018, 6, 1])->format('W')
        );
    }

    public function testDateTimeFormatWeekOfMonthCurrentWeek(): void
    {
        $this->assertEquals(
            '2',
            DateTime::fromArray([2018, 6, 3])->format('W')
        );
    }

    /**
     * Day
     */

    public function testDateTimeFormatDayOfMonth1Digit(): void
    {
        $this->assertEquals(
            '21',
            DateTime::fromArray([2018, 1, 21])->format('d')
        );
    }

    public function testDateTimeFormatDayOfMonth1DigitPadding(): void
    {
        $this->assertEquals(
            '1',
            DateTime::fromArray([2018, 1, 1])->format('d')
        );
    }

    public function testDateTimeFormatDayOfMonth2Digits(): void
    {
        $this->assertEquals(
            '21',
            DateTime::fromArray([2018, 1, 21])->format('dd')
        );
    }

    public function testDateTimeFormatDayOfMonth2DigitsPadding(): void
    {
        $this->assertEquals(
            '01',
            DateTime::fromArray([2018, 1, 1])->format('dd')
        );
    }

    public function testDateTimeFormatDayOfYear1Digit(): void
    {
        $this->assertEquals(
            '152',
            DateTime::fromArray([2018, 6, 1])->format('D')
        );
    }

    public function testDateTimeFormatDayOfYear1DigitPadding(): void
    {
        $this->assertEquals(
            '1',
            DateTime::fromArray([2018, 1, 1])->format('D')
        );
    }

    public function testDateTimeFormatDayOfYear2Digits(): void
    {
        $this->assertEquals(
            '152',
            DateTime::fromArray([2018, 6, 1])->format('DD')
        );
    }

    public function testDateTimeFormatDayOfYear2DigitsPadding(): void
    {
        $this->assertEquals(
            '01',
            DateTime::fromArray([2018, 1, 1])->format('DD')
        );
    }

    public function testDateTimeFormatDayOfYear3Digits(): void
    {
        $this->assertEquals(
            '152',
            DateTime::fromArray([2018, 6, 1])->format('DDD')
        );
    }

    public function testDateTimeFormatDayOfYear3DigitsPadding(): void
    {
        $this->assertEquals(
            '001',
            DateTime::fromArray([2018, 1, 1])->format('DDD')
        );
    }

    public function testDateTimeFormatDayOfWeekInMonth(): void
    {
        $this->assertEquals(
            '1',
            DateTime::fromArray([2018, 6, 1])->format('F')
        );
    }

    public function testDateTimeFormatDayOfWeekInMonthCurrentWeek(): void
    {
        $this->assertEquals(
            '1',
            DateTime::fromArray([2018, 6, 7])->format('F')
        );
    }

    /**
     * Week Day
     */

    public function testDateTimeFormatAltWeekDayShort(): void
    {
        $this->assertEquals(
            'Fri',
            DateTime::fromArray([2018, 6, 1])->format('EEE')
        );
    }

    public function testDateTimeFormatAltWeekDayLong(): void
    {
        $this->assertEquals(
            'Friday',
            DateTime::fromArray([2018, 6, 1])->format('EEEE')
        );
    }

    public function testDateTimeFormatAltWeekDayNarrow(): void
    {
        $this->assertEquals(
            'F',
            DateTime::fromArray([2018, 6, 1])->format('EEEEE')
        );
    }

    public function testDateTimeFormatWeekDay1Digit(): void
    {
        $this->assertEquals(
            '6',
            DateTime::fromArray([2018, 6, 1])->format('e')
        );
    }

    public function testDateTimeFormatWeekDay2Digits(): void
    {
        $this->assertEquals(
            '06',
            DateTime::fromArray([2018, 6, 1])->format('ee')
        );
    }

    public function testDateTimeFormatWeekDayShort(): void
    {
        $this->assertEquals(
            'Fri',
            DateTime::fromArray([2018, 6, 1])->format('eee')
        );
    }

    public function testDateTimeFormatWeekDayLong(): void
    {
        $this->assertEquals(
            'Friday',
            DateTime::fromArray([2018, 6, 1])->format('eeee')
        );
    }

    public function testDateTimeFormatWeekDayNarrow(): void
    {
        $this->assertEquals(
            'F',
            DateTime::fromArray([2018, 6, 1])->format('eeeee')
        );
    }

    public function testDateTimeFormatStandaloneWeekDay1Digit(): void
    {
        $this->assertEquals(
            '6',
            DateTime::fromArray([2018, 6, 1])->format('c')
        );
    }

    public function testDateTimeFormatStandaloneWeekDay2Digits(): void
    {
        $this->assertEquals(
            '6',
            DateTime::fromArray([2018, 6, 1])->format('cc')
        );
    }

    public function testDateTimeFormatStandaloneWeekDayShort(): void
    {
        $this->assertEquals(
            'Fri',
            DateTime::fromArray([2018, 6, 1])->format('ccc')
        );
    }

    public function testDateTimeFormatStandaloneWeekDayLong(): void
    {
        $this->assertEquals(
            'Friday',
            DateTime::fromArray([2018, 6, 1])->format('cccc')
        );
    }

    public function testDateTimeFormatStandaloneWeekDayNarrow(): void
    {
        $this->assertEquals(
            'F',
            DateTime::fromArray([2018, 6, 1])->format('ccccc')
        );
    }

    /**
     * Day Period
     */

    public function testDateTimeFormatDayPeriodShortAm(): void
    {
        $this->assertEquals(
            'AM',
            DateTime::fromArray([2018, 1, 1, 0])->format('aaa')
        );
    }

    public function testDateTimeFormatDayPeriodShortPm(): void
    {
        $this->assertEquals(
            'PM',
            DateTime::fromArray([2018, 1, 1, 12])->format('aaa')
        );
    }

    public function testDateTimeFormatDayPeriodLongAm(): void
    {
        $this->assertEquals(
            'AM',
            DateTime::fromArray([2018, 1, 1, 0])->format('aaaa')
        );
    }

    public function testDateTimeFormatDayPeriodLongPm(): void
    {
        $this->assertEquals(
            'PM',
            DateTime::fromArray([2018, 1, 1, 12])->format('aaaa')
        );
    }

    /**
     * Hour
     */

    public function testDateTimeFormat12Hour1Digit(): void
    {
        $this->assertEquals(
            '12',
            DateTime::fromArray([2018, 1, 1, 12])->format('h')
        );
    }

    public function testDateTimeFormat12Hour1DigitPadding(): void
    {
        $this->assertEquals(
            '1',
            DateTime::fromArray([2018, 1, 1, 1])->format('h')
        );
    }

    public function testDateTimeFormat12Hour2Digits(): void
    {
        $this->assertEquals(
            '11',
            DateTime::fromArray([2018, 1, 1, 23])->format('hh')
        );
    }

    public function testDateTimeFormat12Hour2DigitsPadding(): void
    {
        $this->assertEquals(
            '01',
            DateTime::fromArray([2018, 1, 1, 1])->format('hh')
        );
    }

    public function testDateTimeFormat23Hour1Digit(): void
    {
        $this->assertEquals(
            '23',
            DateTime::fromArray([2018, 1, 1, 23])->format('H')
        );
    }

    public function testDateTimeFormat23Hour1DigitPadding(): void
    {
        $this->assertEquals(
            '0',
            DateTime::fromArray([2018, 1, 1, 0])->format('H')
        );
    }

    public function testDateTimeFormat23Hour2Digits(): void
    {
        $this->assertEquals(
            '23',
            DateTime::fromArray([2018, 1, 1, 23])->format('HH')
        );
    }

    public function testDateTimeFormat23Hour2DigitsPadding(): void
    {
        $this->assertEquals(
            '00',
            DateTime::fromArray([2018, 1, 1, 0])->format('HH')
        );
    }

    public function testDateTimeFormat11Hour1Digit(): void
    {
        $this->assertEquals(
            '11',
            DateTime::fromArray([2018, 1, 1, 23])->format('K')
        );
    }

    public function testDateTimeFormat11Hour1DigitPadding(): void
    {
        $this->assertEquals(
            '0',
            DateTime::fromArray([2018, 1, 1, 0])->format('K')
        );
    }

    public function testDateTimeFormat11Hour2Digits(): void
    {
        $this->assertEquals(
            '11',
            DateTime::fromArray([2018, 1, 1, 23])->format('KK')
        );
    }

    public function testDateTimeFormat11Hour2DigitsPadding(): void
    {
        $this->assertEquals(
            '00',
            DateTime::fromArray([2018, 1, 1, 0])->format('KK')
        );
    }

    public function testDateTimeFormat24Hour1Digit(): void
    {
        $this->assertEquals(
            '24',
            DateTime::fromArray([2018, 1, 1, 0])->format('k')
        );
    }

    public function testDateTimeFormat24Hour1DigitPadding(): void
    {
        $this->assertEquals(
            '1',
            DateTime::fromArray([2018, 1, 1, 1])->format('k')
        );
    }

    public function testDateTimeFormat24Hour2Digits(): void
    {
        $this->assertEquals(
            '24',
            DateTime::fromArray([2018, 1, 1, 0])->format('kk')
        );
    }

    public function testDateTimeFormat24Hour2DigitsPadding(): void
    {
        $this->assertEquals(
            '01',
            DateTime::fromArray([2018, 1, 1, 1])->format('kk')
        );
    }

    /**
     * Minute
     */

    public function testDateTimeFormatMinute1Digit(): void
    {
        $this->assertEquals(
            '25',
            DateTime::fromArray([2018, 1, 1, 0, 25])->format('m')
        );
    }

    public function testDateTimeFormatMinute1DigitPadding(): void
    {
        $this->assertEquals(
            '1',
            DateTime::fromArray([2018, 1, 1, 0, 1])->format('m')
        );
    }

    public function testDateTimeFormatMinute2Digits(): void
    {
        $this->assertEquals(
            '25',
            DateTime::fromArray([2018, 1, 1, 0, 25])->format('mm')
        );
    }

    public function testDateTimeFormatMinute2DigitsPadding(): void
    {
        $this->assertEquals(
            '01',
            DateTime::fromArray([2018, 1, 1, 0, 1])->format('mm')
        );
    }

    /**
     * Second
     */

    public function testDateTimeFormatSecond1Digit(): void
    {
        $this->assertEquals(
            '25',
            DateTime::fromArray([2018, 1, 1, 0, 0, 25])->format('s')
        );
    }

    public function testDateTimeFormatSecond1DigitPadding(): void
    {
        $this->assertEquals(
            '1',
            DateTime::fromArray([2018, 1, 1, 0, 0, 1])->format('s')
        );
    }

    public function testDateTimeFormatSecond2Digits(): void
    {
        $this->assertEquals(
            '25',
            DateTime::fromArray([2018, 1, 1, 0, 0, 25])->format('ss')
        );
    }

    public function testDateTimeFormatSecond2DigitsPadding(): void
    {
        $this->assertEquals(
            '01',
            DateTime::fromArray([2018, 1, 1, 0, 0, 1])->format('ss')
        );
    }

    public function testDateTimeFormatFractional(): void
    {
        $this->assertEquals(
            '123',
            DateTime::fromArray([2018, 1, 1, 0, 0, 0, 123])->format('SSS')
        );
    }

    public function testDateTimeFormatFractionalTruncate(): void
    {
        $this->assertEquals(
            '1',
            DateTime::fromArray([2018, 1, 1, 0, 0, 0, 123])->format('S')
        );
    }

    public function testDateTimeFormatFractionalPadding(): void
    {
        $this->assertEquals(
            '123000',
            DateTime::fromArray([2018, 1, 1, 0, 0, 0, 123])->format('SSSSSS')
        );
    }

    /**
     * Time Zone
     */

    public function testDateTimeFormatTimeZoneShortNonLocation(): void
    {
        $this->assertEquals(
            'UTC',
            DateTime::now()->format('zzz')
        );
    }

    public function testDateTimeFormatTimeZoneShortNonLocationTimeZone(): void
    {
        $this->assertEquals(
            'GMT+10',
            DateTime::now('Australia/Brisbane')->format('zzz')
        );
    }

    public function testDateTimeFormatTimeZoneLongNonLocation(): void
    {
        $this->assertEquals(
            'Coordinated Universal Time',
            DateTime::now()->format('zzzz')
        );
    }

    public function testDateTimeFormatTimeZoneLongNonLocationTimeZone(): void
    {
        $this->assertEquals(
            'Australian Eastern Standard Time',
            DateTime::now('Australia/Brisbane')->format('zzzz')
        );
    }

    public function testDateTimeFormatTimeZoneIso8601BasicAlt(): void
    {
        $this->assertEquals(
            '+0000',
            DateTime::now()->format('ZZZ')
        );
    }

    public function testDateTimeFormatTimeZoneIso8601BasicAltTimeZone(): void
    {
        $this->assertEquals(
            '+1000',
            DateTime::now('Australia/Brisbane')->format('ZZZ')
        );
    }

    public function testDateTimeFormatTimeZoneLongBasic(): void
    {
        $this->assertEquals(
            'GMT',
            DateTime::now()->format('ZZZZ')
        );
    }

    public function testDateTimeFormatTimeZoneLongBasicTimeZone(): void
    {
        $this->assertEquals(
            'GMT+10:00',
            DateTime::now('Australia/Brisbane')->format('ZZZZ')
        );
    }

    public function testDateTimeFormatTimeZoneIso8601ExtendedAlt(): void
    {
        $this->assertEquals(
            'Z',
            DateTime::now()->format('ZZZZZ')
        );
    }

    public function testDateTimeFormatTimeZoneIso8601ExtendedAltTimeZone(): void
    {
        $this->assertEquals(
            '+10:00',
            DateTime::now('Australia/Brisbane')->format('ZZZZZ')
        );
    }

    public function testDateTimeFormatTimeZoneShortLocalized(): void
    {
        $this->assertEquals(
            'GMT',
            DateTime::now()->format('O')
        );
    }

    public function testDateTimeFormatTimeZoneShortLocalizedTimeZone(): void
    {
        $this->assertEquals(
            'GMT+10',
            DateTime::now('Australia/Brisbane')->format('O')
        );
    }

    public function testDateTimeFormatTimeZoneLongLocalized(): void
    {
        $this->assertEquals(
            'GMT',
            DateTime::now()->format('OOOO')
        );
    }

    public function testDateTimeFormatTimeZoneLongLocalizedTimeZone(): void
    {
        $this->assertEquals(
            'GMT+10:00',
            DateTime::now('Australia/Brisbane')->format('OOOO')
        );
    }

    public function testDateTimeFormatTimeZoneLongTimeZoneId(): void
    {
        $this->assertEquals(
            'UTC',
            DateTime::now()->format('VV')
        );
    }

    public function testDateTimeFormatTimeZoneLongTimeZoneIdTimeZone(): void
    {
        $this->assertEquals(
            'Australia/Brisbane',
            DateTime::now('Australia/Brisbane')->format('VV')
        );
    }

    public function testDateTimeFormatTimeZoneIso8601BasicShortZ(): void
    {
        $this->assertEquals(
            'Z',
            DateTime::now()->format('X')
        );
    }

    public function testDateTimeFormatTimeZoneIso8601BasicShortZTimeZone(): void
    {
        $this->assertEquals(
            '+10',
            DateTime::now('Australia/Brisbane')->format('X')
        );
    }

    public function testDateTimeFormatTimeZoneIso8601BasicZ(): void
    {
        $this->assertEquals(
            'Z',
            DateTime::now()->format('XX')
        );
    }

    public function testDateTimeFormatTimeZoneIso8601BasicZTimeZone(): void
    {
        $this->assertEquals(
            '+1000',
            DateTime::now('Australia/Brisbane')->format('XX')
        );
    }

    public function testDateTimeFormatTimeZoneIso8601ExtendedZ(): void
    {
        $this->assertEquals(
            'Z',
            DateTime::now()->format('XXX')
        );
    }

    public function testDateTimeFormatTimeZoneIso8601ExtendedZTimeZone(): void
    {
        $this->assertEquals(
            '+10:00',
            DateTime::now('Australia/Brisbane')->format('XXX')
        );
    }

    public function testDateTimeFormatTimeZoneIso8601BasicShort(): void
    {
        $this->assertEquals(
            '+00',
            DateTime::now()->format('x')
        );
    }

    public function testDateTimeFormatTimeZoneIso8601BasicShortTimeZone(): void
    {
        $this->assertEquals(
            '+10',
            DateTime::now('Australia/Brisbane')->format('x')
        );
    }

    public function testDateTimeFormatTimeZoneIso8601Basic(): void
    {
        $this->assertEquals(
            '+0000',
            DateTime::now()->format('xx')
        );
    }

    public function testDateTimeFormatTimeZoneIso8601BasicTimeZone(): void
    {
        $this->assertEquals(
            '+1000',
            DateTime::now('Australia/Brisbane')->format('xx')
        );
    }

    public function testDateTimeFormatTimeZoneIso8601Extended(): void
    {
        $this->assertEquals(
            '+00:00',
            DateTime::now()->format('xxx')
        );
    }

    public function testDateTimeFormatTimeZoneIso8601ExtendedTimeZone(): void
    {
        $this->assertEquals(
            '+10:00',
            DateTime::now('Australia/Brisbane')->format('xxx')
        );
    }

}
