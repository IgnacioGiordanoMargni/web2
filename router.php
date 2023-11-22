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
    case 'añadiroquitar_producto':
        $controller_producto->permisos_modificar();
        ?> <a href='home'>Volver</a><?php
         break;
    case 'insertar_producto':
     $controller_producto->AñadirProducto();
         break;
    case 'quitar_producto':
        $id = $params[1];
        $controller_producto->verificar_permisos_quitar($id);
        ?> <a href='añadiroquitar_product'>Volver</a><?php
        break;
    case 'form_modificar':
        $id = $params[1];
        $controller_producto->form_modificar($id);
         break;       
    case 'modificar_producto':
        $id = $params[1];
        $controller_producto->ModificarProducto($id);
       
         break;        
    case 'logout':
        $controller_user->logout();
         break;

    case 'descripcion':   
     $controller_producto->MostrarBotonera();
     $id = $params[1];
     $controller_producto->Mostrar_Producto_Descripcion($id);
    
      break;        
    case 'agregar_categoria':   
     
     $controller_producto->AgregarCategoria();
       
      break;   
    case 'categoria':   
     $id= $params[1];
     $controller_producto->MostrarBotonera();
     $controller_producto->MostrarCategoria($id);
     require_once 'template/footer.phtml';
      break;  
    default:
    echo "404 Page Not Found";
    break;
}
?>
<script src="./js/btn_nav.js"></script>
