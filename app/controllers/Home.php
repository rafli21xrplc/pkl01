<?php

class Home extends Controller
{

    public function index()
    {
            $datas['title'] = 'Homepage';
            $this->view('home', $datas);
    }

    public function validationAbsen()
    {
        echo "Hello World";
    }
}
