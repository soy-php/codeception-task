# Codeception Task

[![Latest Stable Version](https://poser.pugx.org/soy-php/codeception-task/v/stable)](https://packagist.org/packages/soy-php/codeception-task) [![Total Downloads](https://poser.pugx.org/soy-php/codeception-task/downloads)](https://packagist.org/packages/soy-php/codeception-task) [![Latest Unstable Version](https://poser.pugx.org/soy-php/codeception-task/v/unstable)](https://packagist.org/packages/soy-php/codeception-task) [![License](https://poser.pugx.org/soy-php/codeception-task/license)](https://packagist.org/packages/soy-php/codeception-task)

## Introduction
This is a [Codeception](http://codeception.com/) task for Soy

## Usage
Include `soy-php/codeception-task` in your project with composer:

```sh
$ composer require soy-php/codeception-task
```

Then in your recipe you can use the task as follows:
```php
<?php

$recipe = new \Soy\Recipe();

$recipe->component('default', function (\Soy\Codeception\BuildTask $buildTask, \Soy\Codeception\RunTask $runTask) {
    $buildTask
        ->setVerbose(true)
        ->run();

    $runTask
        ->setCoverageFormats([
            \Soy\Codeception\RunTask::COVERAGE_TEXT,
            \Soy\Codeception\RunTask::COVERAGE_XML => 'my-report.xml',
        ])
        ->addReportFormat(\Soy\Codeception\RunTask::REPORT_JSON)
        ->setVerbose(true)
        ->setDebug(true)
        ->run();
});

return $recipe;
```
