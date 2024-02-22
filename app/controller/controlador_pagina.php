<?php

require_once "./app/view/vista_pagina.php";


class controlador_pagina{

private $view;

function __construct(){

    $this->view= new vista_pagina();
}

function showFooter(){
    $this->view->footer();
}

function botonVolver(){
    $this->view->volver();
}

}