<?php

namespace Mars\Scheduler;

use Carbon\Carbon;

class Kernel
{
    /**
     * @var array
     */
    protected $events = [];


    protected $date;

    /**
     * @return array
     */
    public function getEvents()
    {
        return $this->events;
    }

    /**
     * @param Event $event
     * @return Event
     */
    public function add(Event $event)
    {
        $this->events[] = $event;

        return $event;
    }

    /**
     * Run Events
     */
    public function run()
    {
        foreach ($this->getEvents() as $event) {
            if (!$event->isDueToRun($this->getDate())) {
                continue;
            }

            $event->handle();
        }
    }

    /**
     * @param Carbon $date
     */
    public function setDate(Carbon $date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        if (!$this->date) {
            return Carbon::now();
        }

        return $this->date;
    }
}
