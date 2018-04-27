<?php

namespace Events;

use Mars\Scheduler\Event;

class SomeEvent extends Event
{

    public function handle()
    {
        var_dump($this->expression);
    }
}