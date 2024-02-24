<link rel="stylesheet" href="css/style.css">

<?php



require_once 'app/controller/controlador_producto.php';
require_once 'app/controller/controlador_usuarios.php';
require_once 'app/controller/controlador_pagina.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']). '/');

$action= 'home'; 

if(!empty ( $_GET['action'])){
    $action = $_GET['action'];
}

$params = explode('/', $action);//mejorar ruteo

$controller_user = new controlador_usuarios(); 
$controller_producto = new controlador_producto(); 
$controller_pagina = new controlador_pagina(); 
session_start();


switch ($params[0]){
    case 'home':
        $controller_producto->MostrarBotonera();
        $controller_producto->mostrar_productos(); 
        $controller_pagina->showFooter();
       
        break;

    case 'Buscar':
           $controller_producto->MostrarBotonera();
           $controller_producto->BuscarProductos();
           $controller_pagina->showFooter();
           
               
         break;
    case 'entrar':
         
      $controller_user->showLogin();
         
         break;
    case 'agregar_usuario':
  
        $controller_user->adduser();
        break;
    case 'logueo':
     $controller_user->verificar_log();
         break;
    case 'añadiroquitar_producto':
        $controller_producto->permisos_modificar();
        $controller_pagina->botonVolver();
         break;
    case 'insertar_producto':
     $controller_producto->AñadirProducto();
         break;
    case 'quitar_producto':
        $id = $params[1];
        $controller_producto->verificar_permisos_quitar($id);
        $controller_pagina->botonVolver();
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
     $controller_pagina->showFooter();

      break;  
    default:
    echo "404 Page Not Found";
    break;
}
?>
<script src="./js/btn_nav.js"></script>