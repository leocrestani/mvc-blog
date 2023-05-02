<?php

/** 
 * @Desc: Controller da página Home. Carrega a página inicial.
 */
class Home extends Controller
{

    public function index()
    {
        $this->view('pages/home');
    }
}