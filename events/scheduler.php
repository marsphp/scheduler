<?php

use Carbon\Carbon;
use Events\SomeEvent;
use Events\NewContentEvent;
use Mars\Scheduler\Kernel;

require_once __DIR__ . '/../vendor/autoload.php';

$kernel = new Kernel;

$kernel->add(new SomeEvent())->everyMinute();
$kernel->add(new NewContentEvent())->everyFiveMinutes();
$kernel->add(new NewContentEvent())->everyTenMinutes();
$kernel->add(new NewContentEvent())->everyThirtyMinutes();
$kernel->add(new NewContentEvent())->everyFortyFiveMinutes();

$kernel->run();
