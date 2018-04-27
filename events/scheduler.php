<?php

use Carbon\Carbon;
use Events\SomeEvent;
use Mars\Scheduler\Kernel;

require_once __DIR__ . '/../vendor/autoload.php';

$kernel = new Kernel;

$kernel->setDate(Carbon::create(2018, 04, 27, 15, 00));

$kernel->add(new SomeEvent())->hourly();

$kernel->run();
