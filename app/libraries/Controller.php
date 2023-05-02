<?php

/** 
 * @Desc: Biblioteca de Controller principal, é extendida por todos os outros Controllers
 */
class Controller
{

    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        return new $model;
    }

    public function view($view, $data = [])
    {
        $arquivo = ('../app/views/' . $view . '.php');
        if (file_exists($arquivo)) {
            require_once $arquivo;
        } else {
            die('A view não foi encontrada!');
        }
    }
}