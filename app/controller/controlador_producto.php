<?php
require_once "./app/Models/modelo_producto.php";
require_once "./app/view/vista_productos.php";

class controlador_producto{
private $model;
private $view;

function __construct(){
    $this->model= new modelo_producto(); 
    $this->view= new vista_productos();
}

private function conectar_tpo_db(){
    $db = new PDO('mysql:host=localhost;dbname=tpo_web2;charset=utf8','root', '');
    return $db;
 }

function AñadirProducto($Nombre){
    $Producto= $_POST['Producto'];
    $Imagen= $_POST['Imagen'];
    $Precio= $_POST['Precio'];
  

    //chequeo que los campos tengan contenido
    if(!empty($_POST['Producto'])&&!empty($_POST['Imagen'])&&!empty($_POST['Precio'])){
        
        //paso los datos a la funcion
        $id=$this->model->insertarDatos_Productos($Producto, $Imagen, $Precio);
        $this->model->insertar_Productos_Nombres($Producto, $Nombre);
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

function verificar_permisos_agregar(){
    $db=$this->conectar_tpo_db();
    $mail=$_POST['Mail'];
    $password=$_POST['Contraseña'];
    $registro = $db->prepare('SELECT Nombre, Contraseña, Permisos FROM usuarios WHERE Mail = :Mail');
    $registro->bindParam(':Mail', $_POST['Mail']);
    $registro->execute();
    $resultados = $registro->fetch(PDO::FETCH_ASSOC);
    $Nombre=$resultados['Nombre'];
  
  if(password_verify($password, $resultados['Contraseña'])){
    if($resultados['Permisos']==1){
      $this->AñadirProducto($Nombre);

        }else{
            echo "no estan los permisos adecuados";
        }
        
  }else{
    echo "las credenciales no coinciden";
  }
}

function verificar_permisos_quitar($id){
  $db=$this->conectar_tpo_db();

  

if(isset($_SESSION['user_permisos'])){
  if($_SESSION['user_permisos']==1){
    $this->model->QuitarProducto($id);

      }else{
          echo "no estan los permisos adecuados";
      }
}else {
  echo "No existen las credenciales";
}

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

}