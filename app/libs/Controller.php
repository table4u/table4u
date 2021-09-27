<?php
/*
* Base Controller
* Loads models and views 
*
*/

class Controller
{
    //load model
    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';

        //instantiate model
        return new $model();
    }

    //load view
    public function view($view, $data=[])
    {
        if(file_exists('../app/views/' . $view . '.php')){
            require_once '../app/views/' . $view . '.php';
        }
        else{
            //view does not exist
            die('view does not exist');
        }
    }
}
