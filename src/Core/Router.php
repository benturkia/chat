<?php
/**
 * Created by IntelliJ IDEA.
 * User: benturkia
 * Date: 30/11/2016
 * Time: 14:11
 */

namespace Chat\Core;


use Chat\Controller\HomeController;

class Router
{
    /** @var null The controller */
    private $urlController = null;

    /** @var null The action */
    private $urlAction = null;

    /** @var array URL parameters */
    private $urlParams = array();

    public function Dispatch(){
        $this->splitUrl();

        if (!$this->urlController) {
            $page = new HomeController();
            $page->index();
        } elseif (file_exists(APP . 'Controller/' . ucfirst($this->urlController) . 'Controller.php')) {
            $controller = "\\Chat\\Controller\\" . ucfirst($this->urlController) . 'Controller';
            $this->urlController = new $controller();

            if (method_exists($this->urlController, $this->urlAction)) {

                if (!empty($this->urlParams)) {
                    call_user_func_array(array($this->urlController, $this->urlAction), $this->urlParams);
                } else {
                    $this->urlController->{$this->urlAction}();
                }

            } else {
                if (strlen($this->urlAction) == 0) {
                    $this->urlController->index();
                } else {
                   // header('location: ' . URL . 'error');
                }
            }
        } else {
          //  header('location: ' . URL . 'error');
        }
    }


    /**
     * Get and split the URL
     */
    private function splitUrl()
    {

        if (isset($_GET['url'])) {

            // split URL
            $url = trim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);


            $this->urlController = isset($url[0]) ? $url[0] : null;
            $this->urlAction = isset($url[1]) ? $url[1] : null;

            // Remove controller and action from the split URL
            unset($url[0], $url[1]);
            $this->urlParams = array_values($url);
        }
    }

}