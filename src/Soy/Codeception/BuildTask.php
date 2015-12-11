<?php

namespace Soy\Codeception;

use League\CLImate\CLImate;
use Soy\Task\CliTask;

class BuildTask extends CliTask
{
    use ConfigTrait;

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
        return $this->getBinary() . ' build ' . $this->config->getDefaultArguments();
    }
}
