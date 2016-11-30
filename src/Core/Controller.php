<?php
/**
 * Created by IntelliJ IDEA.
 * User: benturkia
 * Date: 30/11/2016
 * Time: 13:57
 */

namespace Chat\Core;


class Controller
{


    public function render($template, $data = array())
    {
        require APP . $template;
    }
}