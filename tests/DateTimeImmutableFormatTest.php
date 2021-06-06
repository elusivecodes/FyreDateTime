<?php
declare(strict_types=1);

namespace Tests;

use
    Fyre\DateTimeImmutable;

trait DateTimeImmutableFormatTest
{

    /**
     * Era
     */

    public function testDateTimeImmutableFormatEraShort(): void
    {
        $this->assertEquals(
            'AD',
            DateTimeImmutable::fromArray([2018])->format('GGG')
        );
    }

    public function testDateTimeImmutableFormatEraShortBc(): void
    {
        $this->assertEquals(
            'BC',
            DateTimeImmutable::fromArray([-5])->format('GGG')
        );
    }

    public function testDateTimeImmutableFormatEraLong(): void
    {
        $this->assertEquals(
            'Anno Domini',
            DateTimeImmutable::fromArray([2018])->format('GGGG')
        );
    }

    public function testDateTimeImmutableFormatEraLongBc(): void
    {
        $this->assertEquals(
            'Before Christ',
            DateTimeImmutable::fromArray([-5])->format('GGGG')
        );
    }

    public function testDateTimeImmutableFormatEraNarrow(): void
    {
        $this->assertEquals(
            'A',
            DateTimeImmutable::fromArray([2018])->format('GGGGG')
        );
    }

    public function testDateTimeImmutableFormatEraNarrowBc(): void
    {
        $this->assertEquals(
            'B',
            DateTimeImmutable::fromArray([-5])->format('GGGGG')
        );
    }

    /**
     * Year
     */

    public function testDateTimeImmutableFormatYear1Digit(): void
    {
        $this->assertEquals(
            '2018',
            DateTimeImmutable::fromArray([2018])->format('y')
        );
    }

    public function testDateTimeImmutableFormatYear1DigitPadding(): void
    {
        $this->assertEquals(
            '5',
            DateTimeImmutable::fromArray([5])->format('y')
        );
    }

    public function testDateTimeImmutableFormatYear2Digits(): void
    {
        $this->assertEquals(
            '18',
            DateTimeImmutable::fromArray([2018])->format('yy')
        );
    }

    public function testDateTimeImmutableFormatYear2DigitsPadding(): void
    {
        $this->assertEquals(
            '05',
            DateTimeImmutable::fromArray([5])->format('yy')
        );
    }

    public function testDateTimeImmutableFormatYear3Digits(): void
    {
        $this->assertEquals(
            '2018',
            DateTimeImmutable::fromArray([2018])->format('yyy')
        );
    }

    public function testDateTimeImmutableFormatYear3DigitsPadding(): void
    {
        $this->assertEquals(
            '005',
            DateTimeImmutable::fromArray([5])->format('yyy')
        );
    }

    public function testDateTimeImmutableFormatYear4Digits(): void
    {
        $this->assertEquals(
            '2018',
            DateTimeImmutable::fromArray([2018])->format('yyyy')
        );
    }

    public function testDateTimeImmutableFormatYear4DigitsPadding(): void
    {
        $this->assertEquals(
            '0005',
            DateTimeImmutable::fromArray([5])->format('yyyy')
        );
    }

    /**
     * Week Year
     */

    public function testDateTimeImmutableFormatWeekYear1Digit(): void
    {
        $this->assertEquals(
            '2018',
            DateTimeImmutable::fromArray([2018])->format('Y')
        );
    }

    public function testDateTimeImmutableFormatWeekYear1DigitCurrentWeek(): void
    {
        $this->assertEquals(
            '2020',
            DateTimeImmutable::fromArray([2019, 12, 30])->format('Y')
        );
    }

    public function testDateTimeImmutableFormatWeekYear1DigitPadding(): void
    {
        $this->assertEquals(
            '5',
            DateTimeImmutable::fromArray([5])->format('Y')
        );
    }

    public function testDateTimeImmutableFormatWeekYear2Digits(): void
    {
        $this->assertEquals(
            '18',
            DateTimeImmutable::fromArray([2018])->format('YY')
        );
    }

    public function testDateTimeImmutableFormatWeekYear2DigitsCurrentWeek(): void
    {
        $this->assertEquals(
            '20',
            DateTimeImmutable::fromArray([2019, 12, 30])->format('YY')
        );
    }

    public function testDateTimeImmutableFormatWeekYear2DigitsPadding(): void
    {
        $this->assertEquals(
            '05',
            DateTimeImmutable::fromArray([5])->format('YY')
        );
    }

    public function testDateTimeImmutableFormatWeekYear3Digits(): void
    {
        $this->assertEquals(
            '2018',
            DateTimeImmutable::fromArray([2018])->format('YYY')
        );
    }

    public function testDateTimeImmutableFormatWeekYear3DigitsCurrentWeek(): void
    {
        $this->assertEquals(
            '2020',
            DateTimeImmutable::fromArray([2019, 12, 30])->format('YYY')
        );
    }

    public function testDateTimeImmutableFormatWeekYear3DigitsPadding(): void
    {
        $this->assertEquals(
            '005',
            DateTimeImmutable::fromArray([5])->format('YYY')
        );
    }

    public function testDateTimeImmutableFormatWeekYear4Digits(): void
    {
        $this->assertEquals(
            '2018',
            DateTimeImmutable::fromArray([2018])->format('YYYY')
        );
    }

    public function testDateTimeImmutableFormatWeekYear4DigitsCurrentWeek(): void
    {
        $this->assertEquals(
            '2020',
            DateTimeImmutable::fromArray([2019, 12, 30])->format('YYYY')
        );
    }

    public function testDateTimeImmutableFormatWeekYear4DigitsPadding(): void
    {
        $this->assertEquals(
            '0005',
            DateTimeImmutable::fromArray([5])->format('YYYY')
        );
    }

    /**
     * Quarter
     */

    public function testDateTimeImmutableFormatQuarter1Digit(): void
    {
        $this->assertEquals(
            '3',
            DateTimeImmutable::fromArray([2018, 8])->format('q')
        );
    }

    public function testDateTimeImmutableFormatQuarter2Digits(): void
    {
        $this->assertEquals(
            '03',
            DateTimeImmutable::fromArray([2018, 8])->format('qq')
        );
    }

    public function testDateTimeImmutableFormatStandaloneQuarter1Digit(): void
    {
        $this->assertEquals(
            '3',
            DateTimeImmutable::fromArray([2018, 8])->format('Q')
        );
    }

    public function testDateTimeImmutableFormatStandaloneQuarter2Digits(): void
    {
        $this->assertEquals(
            '03',
            DateTimeImmutable::fromArray([2018, 8])->format('QQ')
        );
    }

    /**
     * Month
     */

    public function testDateTimeImmutableFormatMonth1Digit(): void
    {
        $this->assertEquals(
            '10',
            DateTimeImmutable::fromArray([2018, 10])->format('M')
        );
    }

    public function testDateTimeImmutableFormatMonth1DigitPadding(): void
    {
        $this->assertEquals(
            '1',
            DateTimeImmutable::fromArray([2018, 1])->format('M')
        );
    }

    public function testDateTimeImmutableFormatMonth2Digits(): void
    {
        $this->assertEquals(
            '10',
            DateTimeImmutable::fromArray([2018, 10])->format('MM')
        );
    }

    public function testDateTimeImmutableFormatMonth2DigitsPadding(): void
    {
        $this->assertEquals(
            '01',
            DateTimeImmutable::fromArray([2018, 1])->format('MM')
        );
    }

    public function testDateTimeImmutableFormatMonthShort(): void
    {
        $this->assertEquals(
            'Oct',
            DateTimeImmutable::fromArray([2018, 10])->format('MMM')
        );
    }

    public function testDateTimeImmutableFormatMonthLong(): void
    {
        $this->assertEquals(
            'October',
            DateTimeImmutable::fromArray([2018, 10])->format('MMMM')
        );
    }

    public function testDateTimeImmutableFormatMonthNarrow(): void
    {
        $this->assertEquals(
            'O',
            DateTimeImmutable::fromArray([2018, 10])->format('MMMMM')
        );
    }

    public function testDateTimeImmutableFormatStandaloneMonth1Digit(): void
    {
        $this->assertEquals(
            '10',
            DateTimeImmutable::fromArray([2018, 10])->format('L')
        );
    }

    public function testDateTimeImmutableFormatStandaloneMonth1DigitPadding(): void
    {
        $this->assertEquals(
            '1',
            DateTimeImmutable::fromArray([2018, 1])->format('L')
        );
    }

    public function testDateTimeImmutableFormatStandaloneMonth2Digits(): void
    {
        $this->assertEquals(
            '10',
            DateTimeImmutable::fromArray([2018, 10])->format('LL')
        );
    }

    public function testDateTimeImmutableFormatStandaloneMonth2DigitsPadding(): void
    {
        $this->assertEquals(
            '01',
            DateTimeImmutable::fromArray([2018, 1])->format('LL')
        );
    }

    public function testDateTimeImmutableFormatStandaloneMonthShort(): void
    {
        $this->assertEquals(
            'Oct',
            DateTimeImmutable::fromArray([2018, 10])->format('LLL')
        );
    }

    public function testDateTimeImmutableFormatStandaloneMonthLong(): void
    {
        $this->assertEquals(
            'October',
            DateTimeImmutable::fromArray([2018, 10])->format('LLLL')
        );
    }

    public function testDateTimeImmutableFormatStandaloneMonthNarrow(): void
    {
        $this->assertEquals(
            'O',
            DateTimeImmutable::fromArray([2018, 10])->format('LLLLL')
        );
    }

    /**
     * Week
     */

    public function testDateTimeImmutableFormatWeekOfYear1Digit(): void
    {
        $this->assertEquals(
            '22',
            DateTimeImmutable::fromArray([2018, 6])->format('w')
        );
    }

    public function testDateTimeImmutableFormatWeekOfYear1DigitPadding(): void
    {
        $this->assertEquals(
            '1',
            DateTimeImmutable::fromArray([2018, 1])->format('w')
        );
    }

    public function testDateTimeImmutableFormatWeekOfYear2Digits(): void
    {
        $this->assertEquals(
            '22',
            DateTimeImmutable::fromArray([2018, 6])->format('ww')
        );
    }

    public function testDateTimeImmutableFormatWeekOfYear2DigitsPadding(): void
    {
        $this->assertEquals(
            '01',
            DateTimeImmutable::fromArray([2018, 1])->format('ww')
        );
    }

    public function testDateTimeImmutableFormatWeekOfMonth(): void
    {
        $this->assertEquals(
            '1',
            DateTimeImmutable::fromArray([2018, 6, 1])->format('W')
        );
    }

    public function testDateTimeImmutableFormatWeekOfMonthCurrentWeek(): void
    {
        $this->assertEquals(
            '2',
            DateTimeImmutable::fromArray([2018, 6, 3])->format('W')
        );
    }

    /**
     * Day
     */

    public function testDateTimeImmutableFormatDayOfMonth1Digit(): void
    {
        $this->assertEquals(
            '21',
            DateTimeImmutable::fromArray([2018, 1, 21])->format('d')
        );
    }

    public function testDateTimeImmutableFormatDayOfMonth1DigitPadding(): void
    {
        $this->assertEquals(
            '1',
            DateTimeImmutable::fromArray([2018, 1, 1])->format('d')
        );
    }

    public function testDateTimeImmutableFormatDayOfMonth2Digits(): void
    {
        $this->assertEquals(
            '21',
            DateTimeImmutable::fromArray([2018, 1, 21])->format('dd')
        );
    }

    public function testDateTimeImmutableFormatDayOfMonth2DigitsPadding(): void
    {
        $this->assertEquals(
            '01',
            DateTimeImmutable::fromArray([2018, 1, 1])->format('dd')
        );
    }

    public function testDateTimeImmutableFormatDayOfYear1Digit(): void
    {
        $this->assertEquals(
            '152',
            DateTimeImmutable::fromArray([2018, 6, 1])->format('D')
        );
    }

    public function testDateTimeImmutableFormatDayOfYear1DigitPadding(): void
    {
        $this->assertEquals(
            '1',
            DateTimeImmutable::fromArray([2018, 1, 1])->format('D')
        );
    }

    public function testDateTimeImmutableFormatDayOfYear2Digits(): void
    {
        $this->assertEquals(
            '152',
            DateTimeImmutable::fromArray([2018, 6, 1])->format('DD')
        );
    }

    public function testDateTimeImmutableFormatDayOfYear2DigitsPadding(): void
    {
        $this->assertEquals(
            '01',
            DateTimeImmutable::fromArray([2018, 1, 1])->format('DD')
        );
    }

    public function testDateTimeImmutableFormatDayOfYear3Digits(): void
    {
        $this->assertEquals(
            '152',
            DateTimeImmutable::fromArray([2018, 6, 1])->format('DDD')
        );
    }

    public function testDateTimeImmutableFormatDayOfYear3DigitsPadding(): void
    {
        $this->assertEquals(
            '001',
            DateTimeImmutable::fromArray([2018, 1, 1])->format('DDD')
        );
    }

    public function testDateTimeImmutableFormatDayOfWeekInMonth(): void
    {
        $this->assertEquals(
            '1',
            DateTimeImmutable::fromArray([2018, 6, 1])->format('F')
        );
    }

    public function testDateTimeImmutableFormatDayOfWeekInMonthCurrentWeek(): void
    {
        $this->assertEquals(
            '1',
            DateTimeImmutable::fromArray([2018, 6, 7])->format('F')
        );
    }

    /**
     * Week Day
     */

    public function testDateTimeImmutableFormatAltWeekDayShort(): void
    {
        $this->assertEquals(
            'Fri',
            DateTimeImmutable::fromArray([2018, 6, 1])->format('EEE')
        );
    }

    public function testDateTimeImmutableFormatAltWeekDayLong(): void
    {
        $this->assertEquals(
            'Friday',
            DateTimeImmutable::fromArray([2018, 6, 1])->format('EEEE')
        );
    }

    public function testDateTimeImmutableFormatAltWeekDayNarrow(): void
    {
        $this->assertEquals(
            'F',
            DateTimeImmutable::fromArray([2018, 6, 1])->format('EEEEE')
        );
    }

    public function testDateTimeImmutableFormatWeekDay1Digit(): void
    {
        $this->assertEquals(
            '6',
            DateTimeImmutable::fromArray([2018, 6, 1])->format('e')
        );
    }

    public function testDateTimeImmutableFormatWeekDay2Digits(): void
    {
        $this->assertEquals(
            '06',
            DateTimeImmutable::fromArray([2018, 6, 1])->format('ee')
        );
    }

    public function testDateTimeImmutableFormatWeekDayShort(): void
    {
        $this->assertEquals(
            'Fri',
            DateTimeImmutable::fromArray([2018, 6, 1])->format('eee')
        );
    }

    public function testDateTimeImmutableFormatWeekDayLong(): void
    {
        $this->assertEquals(
            'Friday',
            DateTimeImmutable::fromArray([2018, 6, 1])->format('eeee')
        );
    }

    public function testDateTimeImmutableFormatWeekDayNarrow(): void
    {
        $this->assertEquals(
            'F',
            DateTimeImmutable::fromArray([2018, 6, 1])->format('eeeee')
        );
    }

    public function testDateTimeImmutableFormatStandaloneWeekDay1Digit(): void
    {
        $this->assertEquals(
            '6',
            DateTimeImmutable::fromArray([2018, 6, 1])->format('c')
        );
    }

    public function testDateTimeImmutableFormatStandaloneWeekDay2Digits(): void
    {
        $this->assertEquals(
            '6',
            DateTimeImmutable::fromArray([2018, 6, 1])->format('cc')
        );
    }

    public function testDateTimeImmutableFormatStandaloneWeekDayShort(): void
    {
        $this->assertEquals(
            'Fri',
            DateTimeImmutable::fromArray([2018, 6, 1])->format('ccc')
        );
    }

    public function testDateTimeImmutableFormatStandaloneWeekDayLong(): void
    {
        $this->assertEquals(
            'Friday',
            DateTimeImmutable::fromArray([2018, 6, 1])->format('cccc')
        );
    }

    public function testDateTimeImmutableFormatStandaloneWeekDayNarrow(): void
    {
        $this->assertEquals(
            'F',
            DateTimeImmutable::fromArray([2018, 6, 1])->format('ccccc')
        );
    }

    /**
     * Day Period
     */

    public function testDateTimeImmutableFormatDayPeriodShortAm(): void
    {
        $this->assertEquals(
            'AM',
            DateTimeImmutable::fromArray([2018, 1, 1, 0])->format('aaa')
        );
    }

    public function testDateTimeImmutableFormatDayPeriodShortPm(): void
    {
        $this->assertEquals(
            'PM',
            DateTimeImmutable::fromArray([2018, 1, 1, 12])->format('aaa')
        );
    }

    public function testDateTimeImmutableFormatDayPeriodLongAm(): void
    {
        $this->assertEquals(
            'AM',
            DateTimeImmutable::fromArray([2018, 1, 1, 0])->format('aaaa')
        );
    }

    public function testDateTimeImmutableFormatDayPeriodLongPm(): void
    {
        $this->assertEquals(
            'PM',
            DateTimeImmutable::fromArray([2018, 1, 1, 12])->format('aaaa')
        );
    }

    /**
     * Hour
     */

    public function testDateTimeImmutableFormat12Hour1Digit(): void
    {
        $this->assertEquals(
            '12',
            DateTimeImmutable::fromArray([2018, 1, 1, 12])->format('h')
        );
    }

    public function testDateTimeImmutableFormat12Hour1DigitPadding(): void
    {
        $this->assertEquals(
            '1',
            DateTimeImmutable::fromArray([2018, 1, 1, 1])->format('h')
        );
    }

    public function testDateTimeImmutableFormat12Hour2Digits(): void
    {
        $this->assertEquals(
            '11',
            DateTimeImmutable::fromArray([2018, 1, 1, 23])->format('hh')
        );
    }

    public function testDateTimeImmutableFormat12Hour2DigitsPadding(): void
    {
        $this->assertEquals(
            '01',
            DateTimeImmutable::fromArray([2018, 1, 1, 1])->format('hh')
        );
    }

    public function testDateTimeImmutableFormat23Hour1Digit(): void
    {
        $this->assertEquals(
            '23',
            DateTimeImmutable::fromArray([2018, 1, 1, 23])->format('H')
        );
    }

    public function testDateTimeImmutableFormat23Hour1DigitPadding(): void
    {
        $this->assertEquals(
            '0',
            DateTimeImmutable::fromArray([2018, 1, 1, 0])->format('H')
        );
    }

    public function testDateTimeImmutableFormat23Hour2Digits(): void
    {
        $this->assertEquals(
            '23',
            DateTimeImmutable::fromArray([2018, 1, 1, 23])->format('HH')
        );
    }

    public function testDateTimeImmutableFormat23Hour2DigitsPadding(): void
    {
        $this->assertEquals(
            '00',
            DateTimeImmutable::fromArray([2018, 1, 1, 0])->format('HH')
        );
    }

    public function testDateTimeImmutableFormat11Hour1Digit(): void
    {
        $this->assertEquals(
            '11',
            DateTimeImmutable::fromArray([2018, 1, 1, 23])->format('K')
        );
    }

    public function testDateTimeImmutableFormat11Hour1DigitPadding(): void
    {
        $this->assertEquals(
            '0',
            DateTimeImmutable::fromArray([2018, 1, 1, 0])->format('K')
        );
    }

    public function testDateTimeImmutableFormat11Hour2Digits(): void
    {
        $this->assertEquals(
            '11',
            DateTimeImmutable::fromArray([2018, 1, 1, 23])->format('KK')
        );
    }

    public function testDateTimeImmutableFormat11Hour2DigitsPadding(): void
    {
        $this->assertEquals(
            '00',
            DateTimeImmutable::fromArray([2018, 1, 1, 0])->format('KK')
        );
    }

    public function testDateTimeImmutableFormat24Hour1Digit(): void
    {
        $this->assertEquals(
            '24',
            DateTimeImmutable::fromArray([2018, 1, 1, 0])->format('k')
        );
    }

    public function testDateTimeImmutableFormat24Hour1DigitPadding(): void
    {
        $this->assertEquals(
            '1',
            DateTimeImmutable::fromArray([2018, 1, 1, 1])->format('k')
        );
    }

    public function testDateTimeImmutableFormat24Hour2Digits(): void
    {
        $this->assertEquals(
            '24',
            DateTimeImmutable::fromArray([2018, 1, 1, 0])->format('kk')
        );
    }

    public function testDateTimeImmutableFormat24Hour2DigitsPadding(): void
    {
        $this->assertEquals(
            '01',
            DateTimeImmutable::fromArray([2018, 1, 1, 1])->format('kk')
        );
    }

    /**
     * Minute
     */

    public function testDateTimeImmutableFormatMinute1Digit(): void
    {
        $this->assertEquals(
            '25',
            DateTimeImmutable::fromArray([2018, 1, 1, 0, 25])->format('m')
        );
    }

    public function testDateTimeImmutableFormatMinute1DigitPadding(): void
    {
        $this->assertEquals(
            '1',
            DateTimeImmutable::fromArray([2018, 1, 1, 0, 1])->format('m')
        );
    }

    public function testDateTimeImmutableFormatMinute2Digits(): void
    {
        $this->assertEquals(
            '25',
            DateTimeImmutable::fromArray([2018, 1, 1, 0, 25])->format('mm')
        );
    }

    public function testDateTimeImmutableFormatMinute2DigitsPadding(): void
    {
        $this->assertEquals(
            '01',
            DateTimeImmutable::fromArray([2018, 1, 1, 0, 1])->format('mm')
        );
    }

    /**
     * Second
     */

    public function testDateTimeImmutableFormatSecond1Digit(): void
    {
        $this->assertEquals(
            '25',
            DateTimeImmutable::fromArray([2018, 1, 1, 0, 0, 25])->format('s')
        );
    }

    public function testDateTimeImmutableFormatSecond1DigitPadding(): void
    {
        $this->assertEquals(
            '1',
            DateTimeImmutable::fromArray([2018, 1, 1, 0, 0, 1])->format('s')
        );
    }

    public function testDateTimeImmutableFormatSecond2Digits(): void
    {
        $this->assertEquals(
            '25',
            DateTimeImmutable::fromArray([2018, 1, 1, 0, 0, 25])->format('ss')
        );
    }

    public function testDateTimeImmutableFormatSecond2DigitsPadding(): void
    {
        $this->assertEquals(
            '01',
            DateTimeImmutable::fromArray([2018, 1, 1, 0, 0, 1])->format('ss')
        );
    }

    public function testDateTimeImmutableFormatFractional(): void
    {
        $this->assertEquals(
            '123',
            DateTimeImmutable::fromArray([2018, 1, 1, 0, 0, 0, 123])->format('SSS')
        );
    }

    public function testDateTimeImmutableFormatFractionalTruncate(): void
    {
        $this->assertEquals(
            '1',
            DateTimeImmutable::fromArray([2018, 1, 1, 0, 0, 0, 123])->format('S')
        );
    }

    public function testDateTimeImmutableFormatFractionalPadding(): void
    {
        $this->assertEquals(
            '123000',
            DateTimeImmutable::fromArray([2018, 1, 1, 0, 0, 0, 123])->format('SSSSSS')
        );
    }

    /**
     * Time Zone
     */

    public function testDateTimeImmutableFormatTimeZoneShortNonLocation(): void
    {
        $this->assertEquals(
            'UTC',
            DateTimeImmutable::now()->format('zzz')
        );
    }

    public function testDateTimeImmutableFormatTimeZoneShortNonLocationTimeZone(): void
    {
        $this->assertEquals(
            'GMT+10',
            DateTimeImmutable::now('Australia/Brisbane')->format('zzz')
        );
    }

    public function testDateTimeImmutableFormatTimeZoneLongNonLocation(): void
    {
        $this->assertEquals(
            'Coordinated Universal Time',
            DateTimeImmutable::now()->format('zzzz')
        );
    }

    public function testDateTimeImmutableFormatTimeZoneLongNonLocationTimeZone(): void
    {
        $this->assertEquals(
            'Australian Eastern Standard Time',
            DateTimeImmutable::now('Australia/Brisbane')->format('zzzz')
        );
    }

    public function testDateTimeImmutableFormatTimeZoneIso8601BasicAlt(): void
    {
        $this->assertEquals(
            '+0000',
            DateTimeImmutable::now()->format('ZZZ')
        );
    }

    public function testDateTimeImmutableFormatTimeZoneIso8601BasicAltTimeZone(): void
    {
        $this->assertEquals(
            '+1000',
            DateTimeImmutable::now('Australia/Brisbane')->format('ZZZ')
        );
    }

    public function testDateTimeImmutableFormatTimeZoneLongBasic(): void
    {
        $this->assertEquals(
            'GMT',
            DateTimeImmutable::now()->format('ZZZZ')
        );
    }

    public function testDateTimeImmutableFormatTimeZoneLongBasicTimeZone(): void
    {
        $this->assertEquals(
            'GMT+10:00',
            DateTimeImmutable::now('Australia/Brisbane')->format('ZZZZ')
        );
    }

    public function testDateTimeImmutableFormatTimeZoneIso8601ExtendedAlt(): void
    {
        $this->assertEquals(
            'Z',
            DateTimeImmutable::now()->format('ZZZZZ')
        );
    }

    public function testDateTimeImmutableFormatTimeZoneIso8601ExtendedAltTimeZone(): void
    {
        $this->assertEquals(
            '+10:00',
            DateTimeImmutable::now('Australia/Brisbane')->format('ZZZZZ')
        );
    }

    public function testDateTimeImmutableFormatTimeZoneShortLocalized(): void
    {
        $this->assertEquals(
            'GMT',
            DateTimeImmutable::now()->format('O')
        );
    }

    public function testDateTimeImmutableFormatTimeZoneShortLocalizedTimeZone(): void
    {
        $this->assertEquals(
            'GMT+10',
            DateTimeImmutable::now('Australia/Brisbane')->format('O')
        );
    }

    public function testDateTimeImmutableFormatTimeZoneLongLocalized(): void
    {
        $this->assertEquals(
            'GMT',
            DateTimeImmutable::now()->format('OOOO')
        );
    }

    public function testDateTimeImmutableFormatTimeZoneLongLocalizedTimeZone(): void
    {
        $this->assertEquals(
            'GMT+10:00',
            DateTimeImmutable::now('Australia/Brisbane')->format('OOOO')
        );
    }

    public function testDateTimeImmutableFormatTimeZoneLongTimeZoneId(): void
    {
        $this->assertEquals(
            'UTC',
            DateTimeImmutable::now()->format('VV')
        );
    }

    public function testDateTimeImmutableFormatTimeZoneLongTimeZoneIdTimeZone(): void
    {
        $this->assertEquals(
            'Australia/Brisbane',
            DateTimeImmutable::now('Australia/Brisbane')->format('VV')
        );
    }

    public function testDateTimeImmutableFormatTimeZoneIso8601BasicShortZ(): void
    {
        $this->assertEquals(
            'Z',
            DateTimeImmutable::now()->format('X')
        );
    }

    public function testDateTimeImmutableFormatTimeZoneIso8601BasicShortZTimeZone(): void
    {
        $this->assertEquals(
            '+10',
            DateTimeImmutable::now('Australia/Brisbane')->format('X')
        );
    }

    public function testDateTimeImmutableFormatTimeZoneIso8601BasicZ(): void
    {
        $this->assertEquals(
            'Z',
            DateTimeImmutable::now()->format('XX')
        );
    }

    public function testDateTimeImmutableFormatTimeZoneIso8601BasicZTimeZone(): void
    {
        $this->assertEquals(
            '+1000',
            DateTimeImmutable::now('Australia/Brisbane')->format('XX')
        );
    }

    public function testDateTimeImmutableFormatTimeZoneIso8601ExtendedZ(): void
    {
        $this->assertEquals(
            'Z',
            DateTimeImmutable::now()->format('XXX')
        );
    }

    public function testDateTimeImmutableFormatTimeZoneIso8601ExtendedZTimeZone(): void
    {
        $this->assertEquals(
            '+10:00',
            DateTimeImmutable::now('Australia/Brisbane')->format('XXX')
        );
    }

    public function testDateTimeImmutableFormatTimeZoneIso8601BasicShort(): void
    {
        $this->assertEquals(
            '+00',
            DateTimeImmutable::now()->format('x')
        );
    }

    public function testDateTimeImmutableFormatTimeZoneIso8601BasicShortTimeZone(): void
    {
        $this->assertEquals(
            '+10',
            DateTimeImmutable::now('Australia/Brisbane')->format('x')
        );
    }

    public function testDateTimeImmutableFormatTimeZoneIso8601Basic(): void
    {
        $this->assertEquals(
            '+0000',
            DateTimeImmutable::now()->format('xx')
        );
    }

    public function testDateTimeImmutableFormatTimeZoneIso8601BasicTimeZone(): void
    {
        $this->assertEquals(
            '+1000',
            DateTimeImmutable::now('Australia/Brisbane')->format('xx')
        );
    }

    public function testDateTimeImmutableFormatTimeZoneIso8601Extended(): void
    {
        $this->assertEquals(
            '+00:00',
            DateTimeImmutable::now()->format('xxx')
        );
    }

    public function testDateTimeImmutableFormatTimeZoneIso8601ExtendedTimeZone(): void
    {
        $this->assertEquals(
            '+10:00',
            DateTimeImmutable::now('Australia/Brisbane')->format('xxx')
        );
    }

}
