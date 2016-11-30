<?php
/**
 * Created by IntelliJ IDEA.
 * User: benturkia
 * Date: 30/11/2016
 * Time: 14:16
 */

namespace Chat\Controller;


use Chat\Core\Controller;

class HomeController extends Controller
{
    public function index(){
        $this->render('views/index.php');
    }
}