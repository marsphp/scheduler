<?php

use Carbon\Carbon;
use Mars\Scheduler\Event;
use PHPUnit\Framework\TestCase;

class EventTest extends TestCase
{

    /** @test */
    public function eventHasDefaultCronExpression()
    {
        try {
            $event = $this->getMockForAbstractClass(Event::class);

            $this->assertEquals($event->expression, '* * * * *');

        } catch (ReflectionException $e) {
            $this->assertTrue(!$e);
        }
    }

    /** @test */
    public function eventShouldBeRunTest()
    {
        try {
            $event = $this->getMockForAbstractClass(Event::class);
            $this->assertTrue($event->isDueToRun(Carbon::now()));
        } catch (ReflectionException $e) {
        }
    }

    /** @test */
    public function eventShouldNotBeRunTest()
    {
        try {
            $event = $this->getMockForAbstractClass(Event::class);
            $event->expression = '0 0 1 * *';
            $this->assertFalse($event->isDueToRun(Carbon::create(2017, 10, 2, 0, 0, 0)));
        } catch (ReflectionException $e) {
        }
    }
}
