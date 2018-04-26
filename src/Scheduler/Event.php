<?php

namespace Mars\Schedule\Scheduler;

use Carbon\Carbon;
use Cron\CronExpression;

abstract class Event
{
    use Frequencies;

    /**
     * @var string
     */
    public $expression = '* * * * *';

    /**
     * @return mixed
     */
    abstract public function handle();

    /**
     * @param Carbon $date
     * @return bool
     */
    public function isDueToRun(Carbon $date)
    {
        return CronExpression::factory($this->expression)->isDue($date);
    }
}
