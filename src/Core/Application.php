<?php
/**
 * Created by IntelliJ IDEA.
 * User: benturkia
 * Date: 30/11/2016
 * Time: 13:44
 */

namespace Chat\Core;
use ActiveRecord\Config;
/**
 * Class Application
 * @package Chat\Core
 */
class Application
{


    /**
     * Application constructor.
     * start application
     */
    public function __construct()
    {
        session_start();
        /**
         * init connection DB
         */
        Config::initialize(function ($cfg) {
            $cfg->set_model_directory(APP . 'Entity/');
            $cfg->set_connections(array(
                'development' => DB_TYPE.'://'.DB_USER.':'. DB_PASS .'@'.DB_HOST.'/'.DB_NAME));
        });
        $route = new Router();
        $route->Dispatch();
    }



}