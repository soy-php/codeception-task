<?php

namespace Soy\Codeception;

use League\CLImate\CLImate;
use Soy\Task\CliTask;

class RunTask extends CliTask
{
    use ConfigTrait;

    const REPORT_JSON = 'json';
    const REPORT_HTML = 'html';
    const REPORT_XML = 'xml';
    const REPORT_TAP = 'tap';

    const COVERAGE_SERIALIZED = 'serialized';
    const COVERAGE_HTML = 'html';
    const COVERAGE_XML = 'xml';
    const COVERAGE_TEXT = 'text';

    /**
     * @var bool
     */
    protected $report;

    /**
     * @var array
     */
    protected $reportFormats;

    /**
     * @var string
     */
    protected $suite;

    /**
     * @var bool
     */
    protected $debug;

    /**
     * @var array
     */
    protected $coverageFormats;

    /**
     * @param CLImate $climate
     * @param Config $config
     */
    public function __construct(CLImate $climate, Config $config)
    {
        parent::__construct($climate);
        $this->config = $config;
    }

    /**
     * @return string
     */
    public function getCommand()
    {
        $command = $this->getBinary() . ' run ' . ($this->getSuite() !== null ? $this->getSuite() . ' ' : '')
            . $this->config->getDefaultArguments()
            . ($this->isDebug() ? '-d ' : '');

        if (count($this->getCoverageFormats()) > 0) {
            foreach ($this->getCoverageFormats() as $format => $file) {
                $command .= '--coverage' . ($format === self::COVERAGE_SERIALIZED ? '' : '-' . $format)
                    . ($file !== null ? '=' . $file : '') . ' ';
            }
        }

        if (count($this->getReportFormats()) > 0) {
            foreach ($this->getReportFormats() as $format => $file) {
                $command .= '--' . $format . ($file !== null ? '=' . $file : '') . ' ';
            }
        }

        return $command;
    }

    /**
     * @return bool
     */
    public function isReport()
    {
        return $this->report;
    }

    /**
     * @param bool $report
     * @return $this
     */
    public function setReport($report)
    {
        $this->report = $report;
        return $this;
    }

    /**
     * @return string
     */
    public function getSuite()
    {
        return $this->suite;
    }

    /**
     * @param string $suite
     * @return $this
     */
    public function setSuite($suite)
    {
        $this->suite = $suite;
        return $this;
    }

    /**
     * @return bool
     */
    public function isDebug()
    {
        return $this->debug;
    }

    /**
     * @param bool $debug
     * @return $this
     */
    public function setDebug($debug)
    {
        $this->debug = $debug;
        return $this;
    }

    /**
     * @return array
     */
    public function getCoverageFormats()
    {
        return $this->coverageFormats;
    }

    /**
     * @param array $coverageFormats
     * @return $this
     */
    public function setCoverageFormats(array $coverageFormats)
    {
        $this->coverageFormats = [];

        foreach ($coverageFormats as $key => $value) {
            $format = $key;
            $filename = $value;

            if (!is_string($key)) {
                $format = $value;
                $filename = null;
            }

            $this->addCoverageFormat($format, $filename);
        }

        return $this;
    }

    /**
     * @param string $format
     * @param string|null $filename
     * @return $this
     */
    public function addCoverageFormat($format, $filename = null)
    {
        $this->coverageFormats[$format] = $filename;
        return $this;
    }

    /**
     * @param string $format
     * @return $this
     */
    public function removeCoverageFormat($format)
    {
        unset($this->coverageFormats[$format]);
        return $this;
    }

    /**
     * @return array
     */
    public function getReportFormats()
    {
        return $this->reportFormats;
    }

    /**
     * @param array $reportFormats
     * @return $this
     */
    public function setReportFormats(array $reportFormats)
    {
        $this->coverageFormats = [];

        foreach ($reportFormats as $key => $value) {
            $format = $key;
            $filename = $value;

            if (!is_string($key)) {
                $format = $value;
                $filename = null;
            }

            $this->addReportFormat($format, $filename);
        }

        return $this;
    }

    /**
     * @param string $format
     * @param string|null $filename
     * @return $this
     */
    public function addReportFormat($format, $filename = null)
    {
        $this->reportFormats[$format] = $filename;
        return $this;
    }

    /**
     * @param string $format
     * @return $this
     */
    public function removeReportFormat($format)
    {
        unset($this->reportFormats[$format]);
        return $this;
    }
}
