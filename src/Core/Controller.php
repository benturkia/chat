<?php
/**
 * Created by IntelliJ IDEA.
 * User: benturkia
 * Date: 30/11/2016
 * Time: 13:57
 */

namespace Chat\Core;

/**
 * Class Controller
 * @package Chat\Core
 */
class Controller
{

    /**
     * @param array $data
     */
    public function renderJson($data = array())
    {
        header('Content-type: application/json');
        echo json_encode($data);
        return;
    }

    /**
     * @param $template
     * @param array $data
     */
    public function render($template, $data = array())
    {
        require APP . $template;
    }

    /**
     * @return mixed
     */
    public function getCurrentUser(){
        if(isset($_SESSION['uid']))
        return $_SESSION['uid'];
    }
}