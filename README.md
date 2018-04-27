[![Build Status](https://travis-ci.org/marsphp/scheduler.svg?branch=master)](https://travis-ci.org/marsphp/scheduler)

# Scheduler
Mars framework task scheduler

### Team

### How to use

- [Install](#install)
- [Configuration](#configuration)
- [Use](#use)

### Install

For install this package you need [composer]() and PHP 7.0.* or latest. Installation command
`$ composer require mars/scheduler`

### Configuration

```PHP
use Mars\Schedule\Scheduler\Kernel;

$kernel = new Kernel;

$kernel->add(new SomeEvent())->everyMinute();

$kernel->run();
```

### Use

## Contribute

## Security Vulnerabilities

If you discover a security vulnerability within Mars Schedule, please send an e-mail to Houssene Dao via [dao.houssene@themartiangeeks.com](mailto:dao.houssene@themartiangeeks.com) or Hassane Dao via [dao.hassane@themartiangeeks.com](mailto:dao.hassane@themartiangeeks.com). All security vulnerabilities will be promptly addressed.

## License

Mars Schedule is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
