<?php
require_once 'app/db.php';


function AñadirProducto($Nombre){
    $Producto= $_POST['Producto'];
    $Imagen= $_POST['Imagen'];
    $Precio= $_POST['Precio'];
  

    //chequeo que los campos tengan contenido
    if(!empty($_POST['Producto'])&&!empty($_POST['Imagen'])&&!empty($_POST['Precio'])){
        
        //paso los datos a la funcion
        $id=insertarDatos_Productos($Producto, $Imagen, $Precio);
        insertar_Productos_Nombres($Producto, $Nombre);
    }

    
    if($id!=null){
      //redirijo al usuario a la pantalla principal
      header('Location: verificar_usuario');
    } else{
        echo "error al insertar el producto!";
    }
    
}

function MostrarProducto(){
    $Productos = ObtenerProductos();

    
  
    foreach($Productos as $Producto){ 
     
         echo  
       
            '<div class="producto">'. 
             '<img class="imagen-prod"  src='. $Producto->Imagen .'>'
             ."<h1>".  $Producto->Producto ."</h1>"
             ."<p><b>Precio</b></p>".
             "<p>". $Producto->Precio ."</p>"
         ."</div>" ; 
      
   }
}


function verificar_permisos_agregar(){
    $db=conectar_tpo_db();
    $mail=$_POST['Mail'];
    $password=$_POST['Contraseña'];
    $registro = $db->prepare('SELECT Nombre, Contraseña, Permisos FROM usuarios WHERE Mail = :Mail');
    $registro->bindParam(':Mail', $_POST['Mail']);
    $registro->execute();
    $resultados = $registro->fetch(PDO::FETCH_ASSOC);
    $Nombre=$resultados['Nombre'];
  
  if(password_verify($password, $resultados['Contraseña'])){
    if($resultados['Permisos']==1){
      AñadirProducto($Nombre);

        }else{
            echo "no estan los permisos adecuados";
        }
        
  }else{
    echo "las credenciales no coinciden";
  }
}

function verificar_permisos_quitar(){
  $db=conectar_tpo_db();
  $mail=$_POST['Mail'];
  $password=$_POST['Contraseña'];
  $registro = $db->prepare('SELECT Nombre, Contraseña, Permisos FROM usuarios WHERE Mail = :Mail');
  $registro->bindParam(':Mail', $_POST['Mail']);
  $registro->execute();
  $Nombre=$registro['Nombre'];
  $resultados = $registro->fetch(PDO::FETCH_ASSOC);

if(password_verify($password, $resultados['Contraseña'])){
  if($resultados['Permisos']==1){
    QuitarProducto();
      }else{
          echo "no estan los permisos adecuados";
      }
      
}else{
  echo "las credenciales no coinciden";
}
}


function QuitarProducto(){
  $producto=$_POST['Producto'];
  $db=conectar_tpo_db();
  $sentencia = $db->prepare("DELETE FROM productos WHERE Producto=:Producto");
  $sentencia->bindParam(':Producto', $_POST['Producto']);
  $sentencia->execute();
  header('Location: añadiroquitar_producto');
  
}


