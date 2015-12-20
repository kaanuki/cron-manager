<?php

/**
 * User: mult1mate
 * Date: 20.12.15
 * Time: 22:19
 */
class BaseController
{
    public function __construct()
    {
        ActiveRecord\Config::initialize(function ($cfg) {
            $cfg->set_model_directory('models');
            $cfg->set_connections([
                'development' => 'mysql://root:qwerty@localhost/crontab']);
        });

        $method = (isset($_GET['m']) && method_exists($this, $_GET['m'])) ? $_GET['m'] : 'index';

        $this->$method();
    }

}