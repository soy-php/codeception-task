<?php

namespace Soy\Codeception;

class Config
{
    /**
     * @var string
     */
    protected $binary = './vendor/bin/codeception';

    /**
     * @var string
     */
    protected $configDirectory;

    /**
     * @var bool
     */
    protected $interactionEnabled = false;

    /**
     * @return string
     */
    public function getDefaultArguments()
    {
        return ($this->getConfigDirectory() !== null ? '-c ' . $this->getConfigDirectory() . ' ' : '')
            . (!$this->isInteractionEnabled() ? '-n ' : '');
    }

    /**
     * @return string
     */
    public function getBinary()
    {
        return $this->binary;
    }

    /**
     * @param string $binary
     * @return $this
     */
    public function setBinary($binary)
    {
        $this->binary = $binary;
        return $this;
    }

    /**
     * @return string
     */
    public function getConfigDirectory()
    {
        return $this->configDirectory;
    }

    /**
     * @param string $configDirectory
     * @return $this
     */
    public function setConfigDirectory($configDirectory)
    {
        $this->configDirectory = $configDirectory;
        return $this;
    }

    /**
     * @return bool
     */
    public function isInteractionEnabled()
    {
        return $this->interactionEnabled;
    }

    /**
     * @return $this
     */
    public function enableInteraction()
    {
        $this->interactionEnabled = true;
        return $this;
    }

    /**
     * @return $this
     */
    public function disableInteraction()
    {
        $this->interactionEnabled = false;
        return $this;
    }
}
