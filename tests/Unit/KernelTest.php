<?php

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use Mars\Schedule\Scheduler\Event;
use Mars\Schedule\Scheduler\Kernel;

class KernelTest extends TestCase
{

    /** @test */
    public function can_get_events()
    {
        $kernel = new Kernel;

        $this->assertEquals([], $kernel->getEvents());
    }

    /** @test */
    public function can_add_events()
    {
        try {
            $event = $this->getMockForAbstractClass(Event::class);
            $kernel = new Kernel;

            $kernel->add($event);

            $this->assertCount(1, $kernel->getEvents());
        } catch (ReflectionException $e) {
        }
    }

    /** @test */
    public function can_add_not_event()
    {
        $this->expectException(TypeError::class);

        $kernel = new Kernel;
        $kernel->add('no event');
    }

    /** @test */
    public function adding_event_returns_event()
    {
        try {
            $event = $this->getMockForAbstractClass(Event::class);

            $kernel = new Kernel;
            $result = $kernel->add($event);

            $this->assertInstanceOf(Event::class, $result);

        } catch (ReflectionException $e) { }
    }

    /** @test */
    public function can_set_date()
    {
        $kernel = new Kernel;

        $kernel->setDate(Carbon::now());

        $this->assertInstanceOf(Carbon::class, $kernel->getDate());
    }

    /** @test */
    public function has_default_date_set()
    {
        $kernel = new Kernel;

        $this->assertInstanceOf(Carbon::class, $kernel->getDate());
    }

    /** @test */
    public function runs_expected_event()
    {
        try {
            $event = $this->getMockForAbstractClass(Event::class);
            $event->expects($this->once())->method('handle');

            $kernel = new Kernel;
            $kernel->add($event);

            $kernel->run();

        } catch (ReflectionException $e) { }
    }

    /** @test */
    public function does_not_run_unexpected_events()
    {
        try {
            $event = $this->getMockForAbstractClass(Event::class);
            $event->monthly();

            $event->expects($this->never())->method('handle');

            $kernel = new Kernel;
            $kernel->setDate(Carbon::create(2018, 04, 27, 0, 0, 0));
            $kernel->add($event);

            $kernel->run();

        } catch (ReflectionException $e) { }
    }
}
