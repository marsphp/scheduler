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

    protected function frequencies()
    {
        try {
            $frequencies = $this->getMockForTrait(Frequencies::class);
            $frequencies->expression = '* * * * *';

            return $frequencies;
        } catch (ReflectionException $e) { }
    }
}
