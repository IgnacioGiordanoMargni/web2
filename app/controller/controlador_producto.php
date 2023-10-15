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

function QuitarProducto(){ //mejorar, ver filmina
    $producto=$_POST['Producto'];
    $db=$this->conectar_tpo_db();
    $sentencia = $db->prepare("DELETE FROM productos WHERE Producto=:Producto");
    $sentencia->bindParam(':Producto', $_POST['Producto']);
    $sentencia->execute();
    header('Location: añadiroquitar_producto');
    
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

function verificar_permisos_quitar(){
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
    $this->QuitarProducto();
      }else{
          echo "no estan los permisos adecuados";
      }
      
}else{
  echo "las credenciales no coinciden";
}
}
function Mostrar_Producto_Descripcion(){
  $this->view->MostrarProductoDescripcion();
}
}