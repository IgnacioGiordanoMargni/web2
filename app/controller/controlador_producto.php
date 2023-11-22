<?php
require_once "./app/Models/modelo_producto.php";
require_once "./app/view/vista_productos.php";

;
class controlador_producto{
private $model;
private $view;

function __construct(){
    $this->model= new modelo_producto(); 
    $this->view= new vista_productos();
}


function AñadirProducto(){
    $Producto= $_POST['Producto'];
    $Imagen= $_POST['Imagen'];
    $Precio= $_POST['Precio'];
    $Descripcion= $_POST['Descripcion'];
    $mail= $_SESSION['user_mail'];

    //chequeo que los campos tengan contenido
    if(!empty($_POST['Producto'])&&!empty($_POST['Imagen'])&&!empty($_POST['Precio'])){
        
        //paso los datos a la funcion
        $id=$this->model->insertarDatos_Productos($Producto, $Imagen, $Precio, $Descripcion);
        $this->model->insertar_Productos_Nombres($Producto, $mail);
    }

    
    if($id!=null){
      //redirijo al usuario a la pantalla principal
      header('Location: añadiroquitar_producto');
    } else{
        echo "error al insertar el producto!";
    }
    
}



function mostrar_productos(){
    $Productos= $this->model->ObtenerProductos();
    $this->view->MostrarProducto($Productos);
}



function verificar_permisos_quitar($id){
    $this->model->QuitarProducto($id);
}


function Mostrar_Producto_Descripcion($id){
  $Producto= $this->model->obtenerProductoId($id);
 
  $this->view->MostrarProductoDescripcion($Producto);
}

function Mostrar_Producto_Quitar(){

  $Productos= $this->model->ObtenerProductos();
  
  $this->view->MostrarProductoQuitar($Productos);
 
}

function MostrarBotonera(){
  $categorias= $this->model->ObtenerCategorias();
  $this->view->botonera($categorias);
}

function MostrarCategoria($categoria){
  $Productos= $this->model->ObtenerProductosCategoria($categoria);
  $this->view->MostrarProducto($Productos);
}



function permisos_modificar(){

  if(isset($_SESSION['user_permisos'])){

    if($_SESSION['user_permisos']==1){
     $categorias= $this->model->ObtenerCategorias();
     require_once 'template/registro_producto.phtml';
     $this->Mostrar_Producto_Quitar();

      } else if($_SESSION['user_permisos']!=1) {

     echo "Necesitas permisos para estaa aca!"
     ?> <a href='home'>Volver</a><?php
 }
} else if( !isset($_SESSION['user_permisos'])) {
    echo "Necesitas permisos para estaa aca!"
    ?> <a href='home'>Volver</a><?php
}
}

function AgregarCategoria(){
  $categoria= $_POST['categoria'];
  $check = $this->model->verificar_existencia($categoria);
  
  if($check==1){
  $id= $this->model->InsertarCategoria($categoria);
    if($id!=null){
    //redirijo al usuario a la pantalla principal
      header('Location: añadiroquitar_producto');
    } else{
      echo "error al insertar categoria!";
    } 
  } else {
    echo "Categoria ya existente";
    ?> <a href='añadiroquitar_producto'>Volver</a><?php
  }
}

function ModificarProducto($id){
$Producto= $_POST['Producto'];
$Imagen= $_POST['Imagen'];
$Precio= $_POST['Precio'];
$Categoria= $_POST['Categoria'];
$this->model->modificar_producto($Producto, $Imagen, $Precio, $Categoria, $id);
}

function form_modificar($id){
  $categorias= $this->model->ObtenerCategorias();
  $datos=$this->model->ObtenerProductoId($id);
  $this->view->form_modificar($datos, $categorias);
}

}