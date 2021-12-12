<?php
declare(strict_types=1);

namespace Tests\DateTimeImmutable;

use
    Fyre\DateTime\DateTimeImmutable;

trait FormatTest
{

    /**
     * Era
     */

    public function testFormatEraShort(): void
    {
        $this->assertEquals(
            'AD',
            DateTimeImmutable::fromArray([2018])->format('GGG')
        );
    }

    public function testFormatEraShortBc(): void
    {
        $this->assertEquals(
            'BC',
            DateTimeImmutable::fromArray([-5])->format('GGG')
        );
    }

    public function testFormatEraLong(): void
    {
        $this->assertEquals(
            'Anno Domini',
            DateTimeImmutable::fromArray([2018])->format('GGGG')
        );
    }

    public function testFormatEraLongBc(): void
    {
        $this->assertEquals(
            'Before Christ',
            DateTimeImmutable::fromArray([-5])->format('GGGG')
        );
    }

    public function testFormatEraNarrow(): void
    {
        $this->assertEquals(
            'A',
            DateTimeImmutable::fromArray([2018])->format('GGGGG')
        );
    }

    public function testFormatEraNarrowBc(): void
    {
        $this->assertEquals(
            'B',
            DateTimeImmutable::fromArray([-5])->format('GGGGG')
        );
    }

    /**
     * Year
     */

    public function testFormatYear1Digit(): void
    {
        $this->assertEquals(
            '2018',
            DateTimeImmutable::fromArray([2018])->format('y')
        );
    }

    public function testFormatYear1DigitPadding(): void
    {
        $this->assertEquals(
            '5',
            DateTimeImmutable::fromArray([5])->format('y')
        );
    }

    public function testFormatYear2Digits(): void
    {
        $this->assertEquals(
            '18',
            DateTimeImmutable::fromArray([2018])->format('yy')
        );
    }

    public function testFormatYear2DigitsPadding(): void
    {
        $this->assertEquals(
            '05',
            DateTimeImmutable::fromArray([5])->format('yy')
        );
    }

    public function testFormatYear3Digits(): void
    {
        $this->assertEquals(
            '2018',
            DateTimeImmutable::fromArray([2018])->format('yyy')
        );
    }

    public function testFormatYear3DigitsPadding(): void
    {
        $this->assertEquals(
            '005',
            DateTimeImmutable::fromArray([5])->format('yyy')
        );
    }

    public function testFormatYear4Digits(): void
    {
        $this->assertEquals(
            '2018',
            DateTimeImmutable::fromArray([2018])->format('yyyy')
        );
    }

    public function testFormatYear4DigitsPadding(): void
    {
        $this->assertEquals(
            '0005',
            DateTimeImmutable::fromArray([5])->format('yyyy')
        );
    }

    /**
     * Week Year
     */

    public function testFormatWeekYear1Digit(): void
    {
        $this->assertEquals(
            '2018',
            DateTimeImmutable::fromArray([2018])->format('Y')
        );
    }

    public function testFormatWeekYear1DigitCurrentWeek(): void
    {
        $this->assertEquals(
            '2020',
            DateTimeImmutable::fromArray([2019, 12, 30])->format('Y')
        );
    }

    public function testFormatWeekYear1DigitPadding(): void
    {
        $this->assertEquals(
            '5',
            DateTimeImmutable::fromArray([5])->format('Y')
        );
    }

    public function testFormatWeekYear2Digits(): void
    {
        $this->assertEquals(
            '18',
            DateTimeImmutable::fromArray([2018])->format('YY')
        );
    }

    public function testFormatWeekYear2DigitsCurrentWeek(): void
    {
        $this->assertEquals(
            '20',
            DateTimeImmutable::fromArray([2019, 12, 30])->format('YY')
        );
    }

    public function testFormatWeekYear2DigitsPadding(): void
    {
        $this->assertEquals(
            '05',
            DateTimeImmutable::fromArray([5])->format('YY')
        );
    }

    public function testFormatWeekYear3Digits(): void
    {
        $this->assertEquals(
            '2018',
            DateTimeImmutable::fromArray([2018])->format('YYY')
        );
    }

    public function testFormatWeekYear3DigitsCurrentWeek(): void
    {
        $this->assertEquals(
            '2020',
            DateTimeImmutable::fromArray([2019, 12, 30])->format('YYY')
        );
    }

    public function testFormatWeekYear3DigitsPadding(): void
    {
        $this->assertEquals(
            '005',
            DateTimeImmutable::fromArray([5])->format('YYY')
        );
    }

    public function testFormatWeekYear4Digits(): void
    {
        $this->assertEquals(
            '2018',
            DateTimeImmutable::fromArray([2018])->format('YYYY')
        );
    }

    public function testFormatWeekYear4DigitsCurrentWeek(): void
    {
        $this->assertEquals(
            '2020',
            DateTimeImmutable::fromArray([2019, 12, 30])->format('YYYY')
        );
    }

    public function testFormatWeekYear4DigitsPadding(): void
    {
        $this->assertEquals(
            '0005',
            DateTimeImmutable::fromArray([5])->format('YYYY')
        );
    }

    /**
     * Quarter
     */

    public function testFormatQuarter1Digit(): void
    {
        $this->assertEquals(
            '3',
            DateTimeImmutable::fromArray([2018, 8])->format('q')
        );
    }

    public function testFormatQuarter2Digits(): void
    {
        $this->assertEquals(
            '03',
            DateTimeImmutable::fromArray([2018, 8])->format('qq')
        );
    }

    public function testFormatStandaloneQuarter1Digit(): void
    {
        $this->assertEquals(
            '3',
            DateTimeImmutable::fromArray([2018, 8])->format('Q')
        );
    }

    public function testFormatStandaloneQuarter2Digits(): void
    {
        $this->assertEquals(
            '03',
            DateTimeImmutable::fromArray([2018, 8])->format('QQ')
        );
    }

    /**
     * Month
     */

    public function testFormatMonth1Digit(): void
    {
        $this->assertEquals(
            '10',
            DateTimeImmutable::fromArray([2018, 10])->format('M')
        );
    }

    public function testFormatMonth1DigitPadding(): void
    {
        $this->assertEquals(
            '1',
            DateTimeImmutable::fromArray([2018, 1])->format('M')
        );
    }

    public function testFormatMonth2Digits(): void
    {
        $this->assertEquals(
            '10',
            DateTimeImmutable::fromArray([2018, 10])->format('MM')
        );
    }

    public function testFormatMonth2DigitsPadding(): void
    {
        $this->assertEquals(
            '01',
            DateTimeImmutable::fromArray([2018, 1])->format('MM')
        );
    }

    public function testFormatMonthShort(): void
    {
        $this->assertEquals(
            'Oct',
            DateTimeImmutable::fromArray([2018, 10])->format('MMM')
        );
    }

    public function testFormatMonthLong(): void
    {
        $this->assertEquals(
            'October',
            DateTimeImmutable::fromArray([2018, 10])->format('MMMM')
        );
    }

    public function testFormatMonthNarrow(): void
    {
        $this->assertEquals(
            'O',
            DateTimeImmutable::fromArray([2018, 10])->format('MMMMM')
        );
    }

    public function testFormatStandaloneMonth1Digit(): void
    {
        $this->assertEquals(
            '10',
            DateTimeImmutable::fromArray([2018, 10])->format('L')
        );
    }

    public function testFormatStandaloneMonth1DigitPadding(): void
    {
        $this->assertEquals(
            '1',
            DateTimeImmutable::fromArray([2018, 1])->format('L')
        );
    }

    public function testFormatStandaloneMonth2Digits(): void
    {
        $this->assertEquals(
            '10',
            DateTimeImmutable::fromArray([2018, 10])->format('LL')
        );
    }

    public function testFormatStandaloneMonth2DigitsPadding(): void
    {
        $this->assertEquals(
            '01',
            DateTimeImmutable::fromArray([2018, 1])->format('LL')
        );
    }

    public function testFormatStandaloneMonthShort(): void
    {
        $this->assertEquals(
            'Oct',
            DateTimeImmutable::fromArray([2018, 10])->format('LLL')
        );
    }

    public function testFormatStandaloneMonthLong(): void
    {
        $this->assertEquals(
            'October',
            DateTimeImmutable::fromArray([2018, 10])->format('LLLL')
        );
    }

    public function testFormatStandaloneMonthNarrow(): void
    {
        $this->assertEquals(
            'O',
            DateTimeImmutable::fromArray([2018, 10])->format('LLLLL')
        );
    }

    /**
     * Week
     */

    public function testFormatWeekOfYear1Digit(): void
    {
        $this->assertEquals(
            '22',
            DateTimeImmutable::fromArray([2018, 6])->format('w')
        );
    }

    public function testFormatWeekOfYear1DigitPadding(): void
    {
        $this->assertEquals(
            '1',
            DateTimeImmutable::fromArray([2018, 1])->format('w')
        );
    }

    public function testFormatWeekOfYear2Digits(): void
    {
        $this->assertEquals(
            '22',
            DateTimeImmutable::fromArray([2018, 6])->format('ww')
        );
    }

    public function testFormatWeekOfYear2DigitsPadding(): void
    {
        $this->assertEquals(
            '01',
            DateTimeImmutable::fromArray([2018, 1])->format('ww')
        );
    }

    public function testFormatWeekOfMonth(): void
    {
        $this->assertEquals(
            '1',
            DateTimeImmutable::fromArray([2018, 6, 1])->format('W')
        );
    }

    public function testFormatWeekOfMonthCurrentWeek(): void
    {
        $this->assertEquals(
            '2',
            DateTimeImmutable::fromArray([2018, 6, 3])->format('W')
        );
    }

    /**
     * Day
     */

    public function testFormatDayOfMonth1Digit(): void
    {
        $this->assertEquals(
            '21',
            DateTimeImmutable::fromArray([2018, 1, 21])->format('d')
        );
    }

    public function testFormatDayOfMonth1DigitPadding(): void
    {
        $this->assertEquals(
            '1',
            DateTimeImmutable::fromArray([2018, 1, 1])->format('d')
        );
    }

    public function testFormatDayOfMonth2Digits(): void
    {
        $this->assertEquals(
            '21',
            DateTimeImmutable::fromArray([2018, 1, 21])->format('dd')
        );
    }

    public function testFormatDayOfMonth2DigitsPadding(): void
    {
        $this->assertEquals(
            '01',
            DateTimeImmutable::fromArray([2018, 1, 1])->format('dd')
        );
    }

    public function testFormatDayOfYear1Digit(): void
    {
        $this->assertEquals(
            '152',
            DateTimeImmutable::fromArray([2018, 6, 1])->format('D')
        );
    }

    public function testFormatDayOfYear1DigitPadding(): void
    {
        $this->assertEquals(
            '1',
            DateTimeImmutable::fromArray([2018, 1, 1])->format('D')
        );
    }

    public function testFormatDayOfYear2Digits(): void
    {
        $this->assertEquals(
            '152',
            DateTimeImmutable::fromArray([2018, 6, 1])->format('DD')
        );
    }

    public function testFormatDayOfYear2DigitsPadding(): void
    {
        $this->assertEquals(
            '01',
            DateTimeImmutable::fromArray([2018, 1, 1])->format('DD')
        );
    }

    public function testFormatDayOfYear3Digits(): void
    {
        $this->assertEquals(
            '152',
            DateTimeImmutable::fromArray([2018, 6, 1])->format('DDD')
        );
    }

    public function testFormatDayOfYear3DigitsPadding(): void
    {
        $this->assertEquals(
            '001',
            DateTimeImmutable::fromArray([2018, 1, 1])->format('DDD')
        );
    }

    public function testFormatDayOfWeekInMonth(): void
    {
        $this->assertEquals(
            '1',
            DateTimeImmutable::fromArray([2018, 6, 1])->format('F')
        );
    }

    public function testFormatDayOfWeekInMonthCurrentWeek(): void
    {
        $this->assertEquals(
            '1',
            DateTimeImmutable::fromArray([2018, 6, 7])->format('F')
        );
    }

    /**
     * Week Day
     */

    public function testFormatAltWeekDayShort(): void
    {
        $this->assertEquals(
            'Fri',
            DateTimeImmutable::fromArray([2018, 6, 1])->format('EEE')
        );
    }

    public function testFormatAltWeekDayLong(): void
    {
        $this->assertEquals(
            'Friday',
            DateTimeImmutable::fromArray([2018, 6, 1])->format('EEEE')
        );
    }

    public function testFormatAltWeekDayNarrow(): void
    {
        $this->assertEquals(
            'F',
            DateTimeImmutable::fromArray([2018, 6, 1])->format('EEEEE')
        );
    }

    public function testFormatWeekDay1Digit(): void
    {
        $this->assertEquals(
            '6',
            DateTimeImmutable::fromArray([2018, 6, 1])->format('e')
        );
    }

    public function testFormatWeekDay2Digits(): void
    {
        $this->assertEquals(
            '06',
            DateTimeImmutable::fromArray([2018, 6, 1])->format('ee')
        );
    }

    public function testFormatWeekDayShort(): void
    {
        $this->assertEquals(
            'Fri',
            DateTimeImmutable::fromArray([2018, 6, 1])->format('eee')
        );
    }

    public function testFormatWeekDayLong(): void
    {
        $this->assertEquals(
            'Friday',
            DateTimeImmutable::fromArray([2018, 6, 1])->format('eeee')
        );
    }

    public function testFormatWeekDayNarrow(): void
    {
        $this->assertEquals(
            'F',
            DateTimeImmutable::fromArray([2018, 6, 1])->format('eeeee')
        );
    }

    public function testFormatStandaloneWeekDay1Digit(): void
    {
        $this->assertEquals(
            '6',
            DateTimeImmutable::fromArray([2018, 6, 1])->format('c')
        );
    }

    public function testFormatStandaloneWeekDay2Digits(): void
    {
        $this->assertEquals(
            '6',
            DateTimeImmutable::fromArray([2018, 6, 1])->format('cc')
        );
    }

    public function testFormatStandaloneWeekDayShort(): void
    {
        $this->assertEquals(
            'Fri',
            DateTimeImmutable::fromArray([2018, 6, 1])->format('ccc')
        );
    }

    public function testFormatStandaloneWeekDayLong(): void
    {
        $this->assertEquals(
            'Friday',
            DateTimeImmutable::fromArray([2018, 6, 1])->format('cccc')
        );
    }

    public function testFormatStandaloneWeekDayNarrow(): void
    {
        $this->assertEquals(
            'F',
            DateTimeImmutable::fromArray([2018, 6, 1])->format('ccccc')
        );
    }

    /**
     * Day Period
     */

    public function testFormatDayPeriodShortAm(): void
    {
        $this->assertEquals(
            'AM',
            DateTimeImmutable::fromArray([2018, 1, 1, 0])->format('aaa')
        );
    }

    public function testFormatDayPeriodShortPm(): void
    {
        $this->assertEquals(
            'PM',
            DateTimeImmutable::fromArray([2018, 1, 1, 12])->format('aaa')
        );
    }

    public function testFormatDayPeriodLongAm(): void
    {
        $this->assertEquals(
            'AM',
            DateTimeImmutable::fromArray([2018, 1, 1, 0])->format('aaaa')
        );
    }

    public function testFormatDayPeriodLongPm(): void
    {
        $this->assertEquals(
            'PM',
            DateTimeImmutable::fromArray([2018, 1, 1, 12])->format('aaaa')
        );
    }

    /**
     * Hour
     */

    public function testFormat12Hour1Digit(): void
    {
        $this->assertEquals(
            '12',
            DateTimeImmutable::fromArray([2018, 1, 1, 12])->format('h')
        );
    }

    public function testFormat12Hour1DigitPadding(): void
    {
        $this->assertEquals(
            '1',
            DateTimeImmutable::fromArray([2018, 1, 1, 1])->format('h')
        );
    }

    public function testFormat12Hour2Digits(): void
    {
        $this->assertEquals(
            '11',
            DateTimeImmutable::fromArray([2018, 1, 1, 23])->format('hh')
        );
    }

    public function testFormat12Hour2DigitsPadding(): void
    {
        $this->assertEquals(
            '01',
            DateTimeImmutable::fromArray([2018, 1, 1, 1])->format('hh')
        );
    }

    public function testFormat23Hour1Digit(): void
    {
        $this->assertEquals(
            '23',
            DateTimeImmutable::fromArray([2018, 1, 1, 23])->format('H')
        );
    }

    public function testFormat23Hour1DigitPadding(): void
    {
        $this->assertEquals(
            '0',
            DateTimeImmutable::fromArray([2018, 1, 1, 0])->format('H')
        );
    }

    public function testFormat23Hour2Digits(): void
    {
        $this->assertEquals(
            '23',
            DateTimeImmutable::fromArray([2018, 1, 1, 23])->format('HH')
        );
    }

    public function testFormat23Hour2DigitsPadding(): void
    {
        $this->assertEquals(
            '00',
            DateTimeImmutable::fromArray([2018, 1, 1, 0])->format('HH')
        );
    }

    public function testFormat11Hour1Digit(): void
    {
        $this->assertEquals(
            '11',
            DateTimeImmutable::fromArray([2018, 1, 1, 23])->format('K')
        );
    }

    public function testFormat11Hour1DigitPadding(): void
    {
        $this->assertEquals(
            '0',
            DateTimeImmutable::fromArray([2018, 1, 1, 0])->format('K')
        );
    }

    public function testFormat11Hour2Digits(): void
    {
        $this->assertEquals(
            '11',
            DateTimeImmutable::fromArray([2018, 1, 1, 23])->format('KK')
        );
    }

    public function testFormat11Hour2DigitsPadding(): void
    {
        $this->assertEquals(
            '00',
            DateTimeImmutable::fromArray([2018, 1, 1, 0])->format('KK')
        );
    }

    public function testFormat24Hour1Digit(): void
    {
        $this->assertEquals(
            '24',
            DateTimeImmutable::fromArray([2018, 1, 1, 0])->format('k')
        );
    }

    public function testFormat24Hour1DigitPadding(): void
    {
        $this->assertEquals(
            '1',
            DateTimeImmutable::fromArray([2018, 1, 1, 1])->format('k')
        );
    }

    public function testFormat24Hour2Digits(): void
    {
        $this->assertEquals(
            '24',
            DateTimeImmutable::fromArray([2018, 1, 1, 0])->format('kk')
        );
    }

    public function testFormat24Hour2DigitsPadding(): void
    {
        $this->assertEquals(
            '01',
            DateTimeImmutable::fromArray([2018, 1, 1, 1])->format('kk')
        );
    }

    /**
     * Minute
     */

    public function testFormatMinute1Digit(): void
    {
        $this->assertEquals(
            '25',
            DateTimeImmutable::fromArray([2018, 1, 1, 0, 25])->format('m')
        );
    }

    public function testFormatMinute1DigitPadding(): void
    {
        $this->assertEquals(
            '1',
            DateTimeImmutable::fromArray([2018, 1, 1, 0, 1])->format('m')
        );
    }

    public function testFormatMinute2Digits(): void
    {
        $this->assertEquals(
            '25',
            DateTimeImmutable::fromArray([2018, 1, 1, 0, 25])->format('mm')
        );
    }

    public function testFormatMinute2DigitsPadding(): void
    {
        $this->assertEquals(
            '01',
            DateTimeImmutable::fromArray([2018, 1, 1, 0, 1])->format('mm')
        );
    }

    /**
     * Second
     */

    public function testFormatSecond1Digit(): void
    {
        $this->assertEquals(
            '25',
            DateTimeImmutable::fromArray([2018, 1, 1, 0, 0, 25])->format('s')
        );
    }

    public function testFormatSecond1DigitPadding(): void
    {
        $this->assertEquals(
            '1',
            DateTimeImmutable::fromArray([2018, 1, 1, 0, 0, 1])->format('s')
        );
    }

    public function testFormatSecond2Digits(): void
    {
        $this->assertEquals(
            '25',
            DateTimeImmutable::fromArray([2018, 1, 1, 0, 0, 25])->format('ss')
        );
    }

    public function testFormatSecond2DigitsPadding(): void
    {
        $this->assertEquals(
            '01',
            DateTimeImmutable::fromArray([2018, 1, 1, 0, 0, 1])->format('ss')
        );
    }

    public function testFormatFractional(): void
    {
        $this->assertEquals(
            '123',
            DateTimeImmutable::fromArray([2018, 1, 1, 0, 0, 0, 123])->format('SSS')
        );
    }

    public function testFormatFractionalTruncate(): void
    {
        $this->assertEquals(
            '1',
            DateTimeImmutable::fromArray([2018, 1, 1, 0, 0, 0, 123])->format('S')
        );
    }

    public function testFormatFractionalPadding(): void
    {
        $this->assertEquals(
            '123000',
            DateTimeImmutable::fromArray([2018, 1, 1, 0, 0, 0, 123])->format('SSSSSS')
        );
    }

    /**
     * Time Zone
     */

    public function testFormatTimeZoneShortNonLocation(): void
    {
        $this->assertEquals(
            'UTC',
            DateTimeImmutable::now()->format('zzz')
        );
    }

    public function testFormatTimeZoneShortNonLocationTimeZone(): void
    {
        $this->assertEquals(
            'GMT+10',
            DateTimeImmutable::now('Australia/Brisbane')->format('zzz')
        );
    }

    public function testFormatTimeZoneLongNonLocation(): void
    {
        $this->assertEquals(
            'Coordinated Universal Time',
            DateTimeImmutable::now()->format('zzzz')
        );
    }

    public function testFormatTimeZoneLongNonLocationTimeZone(): void
    {
        $this->assertEquals(
            'Australian Eastern Standard Time',
            DateTimeImmutable::now('Australia/Brisbane')->format('zzzz')
        );
    }

    public function testFormatTimeZoneIso8601BasicAlt(): void
    {
        $this->assertEquals(
            '+0000',
            DateTimeImmutable::now()->format('ZZZ')
        );
    }

    public function testFormatTimeZoneIso8601BasicAltTimeZone(): void
    {
        $this->assertEquals(
            '+1000',
            DateTimeImmutable::now('Australia/Brisbane')->format('ZZZ')
        );
    }

    public function testFormatTimeZoneLongBasic(): void
    {
        $this->assertEquals(
            'GMT',
            DateTimeImmutable::now()->format('ZZZZ')
        );
    }

    public function testFormatTimeZoneLongBasicTimeZone(): void
    {
        $this->assertEquals(
            'GMT+10:00',
            DateTimeImmutable::now('Australia/Brisbane')->format('ZZZZ')
        );
    }

    public function testFormatTimeZoneIso8601ExtendedAlt(): void
    {
        $this->assertEquals(
            'Z',
            DateTimeImmutable::now()->format('ZZZZZ')
        );
    }

    public function testFormatTimeZoneIso8601ExtendedAltTimeZone(): void
    {
        $this->assertEquals(
            '+10:00',
            DateTimeImmutable::now('Australia/Brisbane')->format('ZZZZZ')
        );
    }

    public function testFormatTimeZoneShortLocalized(): void
    {
        $this->assertEquals(
            'GMT',
            DateTimeImmutable::now()->format('O')
        );
    }

    public function testFormatTimeZoneShortLocalizedTimeZone(): void
    {
        $this->assertEquals(
            'GMT+10',
            DateTimeImmutable::now('Australia/Brisbane')->format('O')
        );
    }

    public function testFormatTimeZoneLongLocalized(): void
    {
        $this->assertEquals(
            'GMT',
            DateTimeImmutable::now()->format('OOOO')
        );
    }

    public function testFormatTimeZoneLongLocalizedTimeZone(): void
    {
        $this->assertEquals(
            'GMT+10:00',
            DateTimeImmutable::now('Australia/Brisbane')->format('OOOO')
        );
    }

    public function testFormatTimeZoneLongTimeZoneId(): void
    {
        $this->assertEquals(
            'UTC',
            DateTimeImmutable::now()->format('VV')
        );
    }

    public function testFormatTimeZoneLongTimeZoneIdTimeZone(): void
    {
        $this->assertEquals(
            'Australia/Brisbane',
            DateTimeImmutable::now('Australia/Brisbane')->format('VV')
        );
    }

    public function testFormatTimeZoneIso8601BasicShortZ(): void
    {
        $this->assertEquals(
            'Z',
            DateTimeImmutable::now()->format('X')
        );
    }

    public function testFormatTimeZoneIso8601BasicShortZTimeZone(): void
    {
        $this->assertEquals(
            '+10',
            DateTimeImmutable::now('Australia/Brisbane')->format('X')
        );
    }

    public function testFormatTimeZoneIso8601BasicZ(): void
    {
        $this->assertEquals(
            'Z',
            DateTimeImmutable::now()->format('XX')
        );
    }

    public function testFormatTimeZoneIso8601BasicZTimeZone(): void
    {
        $this->assertEquals(
            '+1000',
            DateTimeImmutable::now('Australia/Brisbane')->format('XX')
        );
    }

    public function testFormatTimeZoneIso8601ExtendedZ(): void
    {
        $this->assertEquals(
            'Z',
            DateTimeImmutable::now()->format('XXX')
        );
    }

    public function testFormatTimeZoneIso8601ExtendedZTimeZone(): void
    {
        $this->assertEquals(
            '+10:00',
            DateTimeImmutable::now('Australia/Brisbane')->format('XXX')
        );
    }

    public function testFormatTimeZoneIso8601BasicShort(): void
    {
        $this->assertEquals(
            '+00',
            DateTimeImmutable::now()->format('x')
        );
    }

    public function testFormatTimeZoneIso8601BasicShortTimeZone(): void
    {
        $this->assertEquals(
            '+10',
            DateTimeImmutable::now('Australia/Brisbane')->format('x')
        );
    }

    public function testFormatTimeZoneIso8601Basic(): void
    {
        $this->assertEquals(
            '+0000',
            DateTimeImmutable::now()->format('xx')
        );
    }

    public function testFormatTimeZoneIso8601BasicTimeZone(): void
    {
        $this->assertEquals(
            '+1000',
            DateTimeImmutable::now('Australia/Brisbane')->format('xx')
        );
    }

    public function testFormatTimeZoneIso8601Extended(): void
    {
        $this->assertEquals(
            '+00:00',
            DateTimeImmutable::now()->format('xxx')
        );
    }

    public function testFormatTimeZoneIso8601ExtendedTimeZone(): void
    {
        $this->assertEquals(
            '+10:00',
            DateTimeImmutable::now('Australia/Brisbane')->format('xxx')
        );
    }

}
