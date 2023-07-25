<?php

class Controller
{

    public function view($view, $datas = [])
    {
        require_once 'app/views/' . $view . '.php';
    }
    
    public function controller($controller, $datas = [])
    {
        require_once 'app/controllers/' . $controller . '.php';
    }
}
