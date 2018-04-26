<?php

use Carbon\Carbon;
use Mars\Schedule\Scheduler\Frequencies;
use PHPUnit\Framework\TestCase;

class FrequenciesTest extends TestCase
{
    /** @test */
    public function canReplaceIntoExpressionAtPositionTest()
    {
        $frequencies = $this->frequencies();
        $frequencies->replaceIntoExpression(1, 1);

        $this->assertEquals($frequencies->expression, '1 * * * *');
    }

    /** @test */
    public function canReplaceIntoExpressionByChainingTest()
    {
        $frequencies = $this->frequencies();
        $frequencies->replaceIntoExpression(1, 1)->replaceIntoExpression(2, 2);

        $this->assertEquals($frequencies->expression, '1 2 * * *');
    }

    /** @test */
    public function canReplaceIntoExpressionWithArrayTest()
    {
        $frequencies = $this->frequencies();
        $frequencies->replaceIntoExpression(1, [1, 2]);

        $this->assertEquals($frequencies->expression, '1 2 * * *');
    }

    /** @test */
    public function canReplacePastTheEndOfAnExpressionTest()
    {
        $frequencies = $this->frequencies();
        $frequencies->replaceIntoExpression(5, [1, 2]);

        $this->assertEquals($frequencies->expression, '* * * * 1');
    }

    /** @test */
    public function canSetPlainCronExpressionTest()
    {
        $frequencies = $this->frequencies();
        $frequencies->cron('some expression');

        $this->assertEquals($frequencies->expression, 'some expression');
    }

    /** @test */
    public function canSetEveryMinuteTest()
    {
        $frequencies = $this->frequencies();
        $frequencies->everyMinute();

        $this->assertEquals($frequencies->expression, '* * * * *');
    }

    /** @test */
    public function canSetEveryFiveMinuteTest()
    {
        $frequencies = $this->frequencies();
        $frequencies->everyFiveMinutes();

        $this->assertEquals($frequencies->expression, '*/5 * * * *');
    }

    /** @test */
    public function canSetEveryTenMinuteTest()
    {
        $frequencies = $this->frequencies();
        $frequencies->everyTenMinutes();

        $this->assertEquals($frequencies->expression, '*/10 * * * *');
    }

    /** @test */
    public function canSetEveryThirtyMinuteTest()
    {
        $frequencies = $this->frequencies();
        $frequencies->everyThirtyMinutes();

        $this->assertEquals($frequencies->expression, '*/30 * * * *');
    }

    /** @test */
    public function canSetEveryFortyFiveMinuteTest()
    {
        $frequencies = $this->frequencies();
        $frequencies->everyFortyFiveMinutes();

        $this->assertEquals($frequencies->expression, '*/45 * * * *');
    }

    /** @test */
    public function canSetHourlyAtTest()
    {
        $frequencies = $this->frequencies();
        $frequencies->hourlyAt(45);

        $this->assertEquals($frequencies->expression, '45 * * * *');
    }

    /** @test */
    public function canSetHourlyTest()
    {
        $frequencies = $this->frequencies();
        $frequencies->hourly();

        $this->assertEquals($frequencies->expression, '0 * * * *');
    }

    /** @test */
    public function canSetDailyAtTest()
    {
        $frequencies = $this->frequencies();
        $frequencies->dailyAt(12, 30);

        $this->assertEquals($frequencies->expression, '30 12 * * *');
    }

    /** @test */
    public function canSetDailyTest()
    {
        $frequencies = $this->frequencies();
        $frequencies->daily();

        $this->assertEquals($frequencies->expression, '0 0 * * *');
    }

    /** @test */
    public function canSetMontlyTest()
    {
        $frequencies = $this->frequencies();
        $frequencies->monthly();

        $this->assertEquals($frequencies->expression, '0 0 1 * *');
    }

    /** @test */
    public function canSetMontlyOnSpecificTest()
    {
        $frequencies = $this->frequencies();
        $frequencies->monthlyOn(10);

        $this->assertEquals($frequencies->expression, '0 0 10 * *');
    }

    /** @test */
    public function canSetAnnuallyTest()
    {
        $frequencies = $this->frequencies();
        $frequencies->annually();

        $this->assertEquals($frequencies->expression, '0 0 1 1 *');
    }

    /** @test */
    public function canSetTwiceDailyTest()
    {
        $frequencies = $this->frequencies();
        $frequencies->twiceDaily(3, 10);

        $this->assertEquals($frequencies->expression, '0 3,10 * * *');
    }

    /** @test */
    public function canSetTwiceDailyDefaultTest()
    {
        $frequencies = $this->frequencies();
        $frequencies->twiceDaily();

        $this->assertEquals($frequencies->expression, '0 1,12 * * *');
    }

    /** @test */
    public function canSetDaysTest()
    {
        $frequencies = $this->frequencies();
        $frequencies->days(1, 3, 5);

        $this->assertEquals($frequencies->expression, '* * * * 1,3,5');
    }

    /** @test */
    public function canSetMondaysTest()
    {
        $frequencies = $this->frequencies();
        $frequencies->mondays();

        $this->assertEquals($frequencies->expression, '* * * * 1');
    }

    /** @test */
    public function canSetTuesdaysTest()
    {
        $frequencies = $this->frequencies();
        $frequencies->tuesdays();

        $this->assertEquals($frequencies->expression, '* * * * 2');
    }

    /** @test */
    public function canSetWednesdaysTest()
    {
        $frequencies = $this->frequencies();
        $frequencies->wednesdays();

        $this->assertEquals($frequencies->expression, '* * * * 3');
    }

    /** @test */
    public function canSetThursdaysTest()
    {
        $frequencies = $this->frequencies();
        $frequencies->thursdays();

        $this->assertEquals($frequencies->expression, '* * * * 4');
    }

    /** @test */
    public function canSetFridaysTest()
    {
        $frequencies = $this->frequencies();
        $frequencies->fridays();

        $this->assertEquals($frequencies->expression, '* * * * 5');
    }

    /** @test */
    public function canSetSaturdaysTest()
    {
        $frequencies = $this->frequencies();
        $frequencies->saturdays();

        $this->assertEquals($frequencies->expression, '* * * * 6');
    }

    /** @test */
    public function canSetSundaysTest()
    {
        $frequencies = $this->frequencies();
        $frequencies->sundays();

        $this->assertEquals($frequencies->expression, '* * * * 7');
    }

    /** @test */
    public function canSetWeekdaysTest()
    {
        $frequencies = $this->frequencies();
        $frequencies->weekdays();

        $this->assertEquals($frequencies->expression, '* * * * 1,2,3,4,5');
    }

    /** @test */
    public function canSetWeekendsTest()
    {
        $frequencies = $this->frequencies();
        $frequencies->weekends();

        $this->assertEquals($frequencies->expression, '* * * * 6,7');
    }

    /** @test */
    public function canSetAtTimeTest()
    {
        $frequencies = $this->frequencies();
        $frequencies->at(12, 30);

        $this->assertEquals($frequencies->expression, '30 12 * * *');
    }

    /** @test */
    public function canSetDayAndTimeTest()
    {
        $frequencies = $this->frequencies();
        $frequencies->at(12, 30)->weekends();

        $this->assertEquals($frequencies->expression, '30 12 * * 6,7');
    }

    /**
     * Frequencies trait calling
     * @return \PHPUnit\Framework\MockObject\MockObject
     */
    protected function frequencies()
    {
        try {
            $frequencies = $this->getMockForTrait(Frequencies::class);
            $frequencies->expression = '* * * * *';

            return $frequencies;
        } catch (ReflectionException $e) { }
    }
}
