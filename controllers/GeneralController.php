<?php
namespace  Controllers;
use Cassandra\Varint;
use Models\Usuario;
class GeneralController
{
    function login(){
        $objUser = new Usuario();
        //inicio de sesion de usuario
        if($_POST['iniciar']!=''){

            $chkUser = $objUser->autenticateUser($_POST['user'],$_POST['pass']);
            if(count($chkUser)>0){
                $_SESSION['id_usuario']=$chkUser[0]['id_usuario'];
                $_SESSION['usuario']=$chkUser[0]['usuario'];
                $_SESSION['nombres']=$chkUser[0]['nombres'];
                header("Location: ".ROOT."/documentos/view/");
            }else{
                $msj = "Usuario y clave incorrectos";;
            }
        }
        if($_SESSION['id_usuario']){
            header("Location: ".ROOT."/documentos/view/");
        }
        include_once 'views/login.php';
    }
    function cerrar(){
        session_destroy();
        header("Location: ".ROOT);
    }
}