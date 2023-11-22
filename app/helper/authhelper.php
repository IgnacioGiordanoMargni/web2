<?php
//lo añadimos como por norma general, aunque no le encontramos aplicacion en el contexto de nuestra pagina
class AuthHelper {

    
    function checkLoggedIn() {
        if (!isset($_SESSION['IS_LOGGED'])) {
            header("Location: " . BASE_URL. 'login' );
            die();
        }
    } 

     function getUser(){
        return $_SESSION;
    }

}