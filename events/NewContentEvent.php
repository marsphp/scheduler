<?php

namespace Events;

use Mars\Scheduler\Event;

class NewContentEvent extends Event
{

    public function handle()
    {
        var_dump($this->expression);
    }
}