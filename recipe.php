<?php

$recipe = new \Soy\Recipe();

$recipe->component('default', function (\Soy\Codeception\RunTask $runTask) {
    $runTask
        ->setBinary('codecept')
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
