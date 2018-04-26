<?php

namespace Mars\Schedule\Scheduler;

trait Frequencies
{
    /**
     * @param $expression
     * @return $this
     */
    public function cron($expression)
    {
        $this->expression = $expression;

        return $this;
    }

    /**
     * Every minutes
     * @return $this
     */
    public function everyMinute()
    {
        return $this->cron($this->expression);
    }

    /**
     * Every five minutes
     * @return Frequencies
     */
    public function everyFiveMinutes()
    {
        return $this->replaceIntoExpression(1, '*/5');
    }

    /**
     * Every ten minutes
     * @return Frequencies
     */
    public function everyTenMinutes()
    {
        return $this->replaceIntoExpression(1, '*/10');
    }

    /**
     * Every fifteen minutes
     * @return Frequencies
     */
    public function everyFifteenMinutes()
    {
        return $this->replaceIntoExpression(1, '*/15');
    }

    /**
     * Every thirty minutes
     * @return Frequencies
     */
    public function everyThirtyMinutes()
    {
        return $this->replaceIntoExpression(1, '*/30');
    }

    /**
     * Every forty five minutes
     * @return Frequencies
     */
    public function everyFortyFiveMinutes()
    {
        return $this->replaceIntoExpression(1, '*/45');
    }

    /**
     * Hourly
     * @return Frequencies
     */
    public function hourly()
    {
        return $this->hourlyAt(0);
    }

    /**
     * Hour At
     * @param int $minute
     * @return Frequencies
     */
    public function hourlyAt($minute = 1)
    {
        return $this->replaceIntoExpression(1, $minute);
    }

    /**
     * Daily
     * @return Frequencies
     */
    public function daily()
    {
        return $this->dailyAt(0, 0);
    }

    /**
     * Daily At
     * @param int $hour
     * @param int $minute
     * @return Frequencies
     */
    public function dailyAt($hour = 0, $minute = 0)
    {
        return $this->replaceIntoExpression(1, [$minute, $hour]);
    }

    /**
     * Twice Daily
     * @param int $firstHour
     * @param int $lastHour
     * @return Frequencies
     */
    public function twiceDaily($firstHour = 1, $lastHour = 12)
    {
        return $this->replaceIntoExpression(1, [0, "{$firstHour},{$lastHour}"]);
    }

    /**
     * Twice Daily
     * @param int $firstHour
     * @param int $lastHour
     * @return Frequencies
     */
    public function days($firstHour = 1, $lastHour = 12)
    {
        return $this->replaceIntoExpression(5, implode(',', func_get_args() ?: ['*']));
    }

    /**
     * Mondays
     * @return Frequencies
     */
    public function mondays()
    {
        return $this->days(1);
    }

    /**
     * Tuesdays
     * @return Frequencies
     */
    public function tuesdays()
    {
        return $this->days(2);
    }

    /**
     * Wednesdays
     * @return Frequencies
     */
    public function wednesdays()
    {
        return $this->days(3);
    }

    /**
     * Thursdays
     * @return Frequencies
     */
    public function thursdays()
    {
        return $this->days(4);
    }

    /**
     * Fridays
     * @return Frequencies
     */
    public function fridays()
    {
        return $this->days(5);
    }

    /**
     * Saturdays
     * @return Frequencies
     */
    public function saturdays()
    {
        return $this->days(6);
    }

    /**
     * Weekdays
     * @return Frequencies
     */
    public function weekdays()
    {
        return $this->days(1, 2, 3, 4, 5);
    }

    /**
     * Weekends
     * @return Frequencies
     */
    public function weekends()
    {
        return $this->days(6, 7);
    }

    /**
     * Sundays
     * @return Frequencies
     */
    public function sundays()
    {
        return $this->days(7);
    }

    /**
     * At
     * @param int $hour
     * @param int $minutes
     * @return Frequencies
     */
    public function at($hour = 0, $minutes = 0)
    {
        return $this->dailyAt($hour, $minutes);
    }

    /**
     * Monthly
     * @return Frequencies
     */
    public function monthly()
    {
        return $this->replaceIntoExpression(1, [0, 0, 1]);
    }

    /**
     * Monthly On
     * @param int $day
     * @return Frequencies
     */
    public function monthlyOn($day = 1)
    {
        return $this->replaceIntoExpression(1, [0, 0, $day]);
    }

    /**
     * Annually
     * @return Frequencies
     */
    public function annually()
    {
        return $this->replaceIntoExpression(1, [0, 0, 1, 1]);
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

        array_splice($expression, $position - 1, count($value), $value);

        $expression = array_slice($expression, 0, 5);

        return $this->cron(implode(' ', $expression));
    }
}
