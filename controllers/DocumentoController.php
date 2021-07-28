<?php


namespace Controllers;

class DocumentoController
{
    function view(){
        $view = "documento";
        include_once "views/master.php";
    }

    function crear(){
        $view = "crea_documento";
        include_once "views/master.php";
    }

}