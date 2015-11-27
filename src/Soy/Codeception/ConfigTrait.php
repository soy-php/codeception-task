<?php

namespace Soy\Codeception;

trait ConfigTrait
{
    /**
     * @var Config
     */
    protected $config;

    /**
     * @return string
     */
    public function getBinary()
    {
        return $this->config->getBinary();
    }

    /**
     * @param string $binary
     * @return $this
     */
    public function setBinary($binary)
    {
        $this->config->setBinary($binary);
        return $this;
    }

    /**
     * @return string
     */
    public function getConfigDirectory()
    {
        return $this->getConfigDirectory();
    }

    /**
     * @param string $configDirectory
     * @return $this
     */
    public function setConfigDirectory($configDirectory)
    {
        $this->setConfigDirectory($configDirectory);
        return $this;
    }

    /**
     * @return bool
     */
    public function isInteractionEnabled()
    {
        return $this->config->isInteractionEnabled();
    }

    /**
     * @return $this
     */
    public function enableInteraction()
    {
        $this->config->enableInteraction();
        return $this;
    }

    /**
     * @return $this
     */
    public function disableInteraction()
    {
        $this->config->disableInteraction();
        return $this;
    }
}
