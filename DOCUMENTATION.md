# Documentation
Mars Scheduler documentation

- [Install](#install)
- [Configuration](#configuration)
- [Use](#use)

## Install
For install this package you need [composer]() and PHP 7.0.* or latest. Installation command
`$ composer require mars/scheduler`

## Configuration

```PHP
use Mars\Scheduler\Kernel;

$kernel = new Kernel;

$kernel->add(new SomeEvent())->everyMinute();

$kernel->run();
```

## Use
First time create new class e.g `SomeEvent.php`

```PHP
<?php

namespace App\Jobs;

use Mars\Scheduler\Event;

class SomeJob extends Event
{

    public function handle()
    {
        //my action
    }
}
```

Next step add the kernel class in your class controller

```PHP
<?php

namespace App\Controller;

use Mars\Scheduler\Kernel;
use App\Jobs\SomeJob;

class SomeController
{
    public function getIndex()
    {
        $kernel = new Kernel;
        
        $kernel->add(new SomeJob())->everyMinute();
    }
}
```

When using the scheduler, you only need to add the following Cron entry to your server.
- `* * * * * php /path-to-your-project/path-job/{command} >> /dev/null 2>&1`
- `* * * * * php /path-to-your-project/path-job/{file} >> /dev/null 2>&1`
- `* * * * * {url} >> /dev/null 2>&1`

the content of these elements must be

```PHP
use Mars\Scheduler\Kernel;

$kernel = new Kernel;

$kernel->add(new SomeEvent())->everyMinute();

$kernel->run();
```