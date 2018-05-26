# calendarframework [![Build Status](https://travis-ci.org/yoyoginorth/calendarframework.svg?branch=master)](https://travis-ci.org/yoyoginorth/calendarframework)
the simple calender system!

## Usage
### Show Calendar
- Add the following to show calendar.
```php
echo yoyoginorth_show_calendar();
```
or
```php
<?php echo yoyoginorth_show_calendar(); ?>
```

## How to execute unit test?
Just run the following command.

### Install composer packages
```bash
$ composer install
```
### Execute `phpunit` for unit testing
```bash
$ ./vendor/bin/phpunit
```

### Set `phpcs` config
```bash
$ ./vendor/bin/phpcs --config-set installed_paths vendor/wp-coding-standards/wpcs
```
### Execute `phpcs` for code sniffer
```bash
$ ./vendor/bin/phpcs
```

## How to update Language file?
1. Update `languages/combined-calendar.pot`
1. Update `languages/combined-calendar-ja.po`
1. Re-Generate `languages/combined-calendar-ja.mo`
```bash
$ msgfmt -o languages/combined-calendar-ja.mo languages/combined-calendar-ja.po
```
