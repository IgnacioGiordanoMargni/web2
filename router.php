<link rel="stylesheet" href="css/style.css">

<?php

require_once 'app/usuarios.php';
require_once 'app/productos.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']). '/');

$action= 'entrar'; 

if(!empty ( $_GET['action'])){
    $action = $_GET['action'];
}

$params = explode('/', $action);

switch ($params[0]){
    case 'home':
        require_once 'template/botonera.php';
       ?> <p class="titulo-cat"><u>Todos los objetos</u></p> 
       <article class="seccion-todo">
       <?php MostrarProducto2(); ?> 
       </article>
       
        <a href="verificar_usuario">Agregar Productos</a> <?php
        
        require_once 'template/footer.php';
        break;
    case 'entrar':
          //tengo que averiguar como filtrar a los id o mails repetidos
         require_once 'template/registro_login.php';
         
         break;
    case 'agregar_usuario':
        adduser();
        break;
    case 'logueo':
         verificar_log();
         break;
    case 'verificar_usuario':
        require_once 'template/verificar_usuario.php';
         break;
    case 'añadir_producto':
         verificar_permisos();
         break;
    case 'insertar_producto':
         AñadirProducto();
         break;
    default:
    echo "404 Page Not Found";
    break;
}
?>
<script src="./js/btn_nav.js"></script>
