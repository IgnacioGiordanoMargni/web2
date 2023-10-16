<link rel="stylesheet" href="css/style.css">

<?php



require_once 'app/controller/controlador_producto.php';
require_once 'app/controller/controlador_usuarios.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']). '/');

$action= 'home'; 

if(!empty ( $_GET['action'])){
    $action = $_GET['action'];
}

$params = explode('/', $action);//mejorar ruteo

$controller_user = new controlador_usuarios(); 
$controller_producto = new controlador_producto(); 
session_start();
switch ($params[0]){
    case 'home':
        $controller_producto->MostrarBotonera();
        $controller_producto = new controlador_producto(); 
        $controller_producto->mostrar_productos();
        
        require_once 'template/footer.phtml';
        break;
    case 'entrar':
         
         require_once 'template/registro_login.phtml';
         
         break;
    case 'agregar_usuario':
  
        $controller_user->adduser();
        break;
    case 'logueo':
     $controller_user->verificar_log();
         break;
    case 'verificar_usuario':
         require_once 'template/registro_producto.phtml';
         break;
     case 'verificar_usuario2':
          verificar_permisos();
         break;
    case 'añadiroquitar_producto':
        
         require_once 'template/registro_producto.phtml';
         $controller_producto->Mostrar_Producto_Quitar();
  
         break;
    case 'insertar_producto':
     $controller_producto->verificar_permisos_agregar();
         break;
    case 'quitar_producto':
        $id = $params[1];
        $controller_producto->verificar_permisos_quitar($id);
        ?> <a href='añadiroquitar_product'>Volver</a><?php
         break;
    case 'logout':
        $controller_user->logout();
         break;

    case 'descripcion':   
     $id = $params[1];
     $controller_producto->Mostrar_Producto_Descripcion($id);
    
      break;        
      
    case 'categoria':   
     $id= $params[1];
     $controller_producto->MostrarBotonera();
     $controller_producto->MostrarCategoria($id);
       
      break;  
    default:
    echo "404 Page Not Found";
    break;
}
?>
<script src="./js/btn_nav.js"></script>
