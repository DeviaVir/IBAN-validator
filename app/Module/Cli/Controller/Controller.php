<?php

namespace Module\Cli\Controller;

class Controller
{
    /**
     * @var \Application
     */
    protected $app;

    /**
     * @param \Application $app
     */
    public function __construct(\Silex\Application $app)
    {
        $this->app = $app;
    }

    /**
     * @return \Application
     */
    public function app()
    {
        return $this->app;
    }
}