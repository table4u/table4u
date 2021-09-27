<?php

// App core class
// creates URL and load core controller
// URL FORMAT /contoller/method/param

class Core
{

    protected $currentController = 'Home'; //default controller - when no controller is defined in the url
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct()
    {
        //debugging 
        // print_r($this->getURL());
        $url = $this->getURL();

        //find the controllers        
        if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
            //if exists set as the controller
            $this->currentController = ucwords($url[0]);
            // echo "login";
            //unset 0 index
            unset($url[0]);
        }
        //require the controller
        require_once '../app/controllers/' . $this->currentController . '.php';

        //instantiate controller
        $this->currentController = new $this->currentController;

        //check for second part of url - method
        if (isset($url[1])) {
            if (method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
        }

        //debugging
        // echo $this->currentMethod;

        //GET PARAMS
        $this->params = $url ? array_values($url) : [];

        // call a callback with array of params
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    public function getURL()
    {
        if (isset($_GET['url'])) {
            //remove the ending slash if any
            $url = rtrim($_GET['url'], '/');

            //remove any character that is not valid in url
            $url = filter_var($url, FILTER_SANITIZE_URL);

            //break the url into values by the slash
            $url = explode('/', $url);

            return $url;
        }
    }
}
