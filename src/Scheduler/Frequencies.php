<?php

namespace Mars\Schedule\Scheduler;


trait Frequencies
{

    public function cron($expression)
    {
        $this->expression = $expression;

        return $this;
    }

    public function everyMinute()
    {
        $this->expression = '* * * * *';

        return $this;
    }

    public function everyFiveMinutes()
    {
        $this->replaceIntoExpression(1, '*/5');

        return $this;
    }

    public function everyTenMinutes()
    {
        $this->expression = '*/10 * * * *';

        return $this;
    }

    public function everyFifteenMinutes()
    {
        $this->expression = '*/15 * * * *';

        return $this;
    }

    public function everyThirtyMinutes()
    {
        $this->expression = '*/30 * * * *';

        return $this;
    }

    public function everyFortyFiveMinutes()
    {
        $this->expression = '*/45 * * * *';

        return $this;
    }

    public function everyDay()
    {

    }

    public function everyMonth()
    {

    }

    public function everyYear()
    {

    }

    /**
     * @param $position
     * @param $value
     * @return Frequencies
     */
    public function replaceIntoExpression($position, $value)
    {
        $value = (array) $value;

        $expression = explode(' ', $this->expression);

        array_splice($expression, $position - 1, 1, $value);

        $expression = array_slice($expression, 0, 5);

        return $this->cron(implode(' ', $expression));
    }
}
