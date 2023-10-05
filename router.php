<link rel="stylesheet" href="css/style.css">

<?php



require_once 'app/controller/controlador_producto.php';
require_once 'app/controller/controlador_usuarios.php';

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
       <?php 
        
        $controller = new controlador_producto(); 
        $controller->mostrar_productos();

        ?> 
       </article>
       
        <a href="añadiroquitar_producto">Agregar Productos</a> <?php
        
        require_once 'template/footer.php';
        break;
    case 'entrar':
         
         require_once 'template/registro_login.php';
         
         break;
    case 'agregar_usuario':
     $controller = new controlador_usuarios(); 
     $controller->adduser();
        break;
    case 'logueo':
     $controller = new controlador_usuarios(); 
     $controller->verificar_log();
         break;
    case 'verificar_usuario':
         require_once 'template/registro_producto.php';
         break;
     case 'verificar_usuario2':
          verificar_permisos();
         break;
    case 'añadiroquitar_producto':
        
         require_once 'template/registro_producto.php';
         require_once 'template/form_quitar.php';
         ?><h1>Lista de productos</h1>
         <article class="seccion-todo">
         <?php
         $controller = new controlador_producto(); 
         $controller->mostrar_productos();
 
         ?>
         </article>
         <a href='home'>Ir al sitio principal</a><?php
         break;
    case 'insertar_producto':
     $controller = new controlador_producto();
     $controller->verificar_permisos_agregar();
         break;
    case 'quitar_producto':
     $controller = new controlador_producto();
     $controller->verificar_permisos_quitar();
         break;
    default:
    echo "404 Page Not Found";
    break;
}
?>
<script src="./js/btn_nav.js"></script>
