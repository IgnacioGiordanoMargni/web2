<?php
require_once 'app/db.php';


function AñadirProducto(){
    $Producto= $_POST['Producto'];
    $Imagen= $_POST['Imagen'];
    $Precio= $_POST['Precio']; //Cifro los datos de la contraseña, para que no sea posible averiguarla con solo ver la db
    

    //chequeo que los campos tengan contenido
    if(!empty($_POST['Producto'])&&!empty($_POST['Imagen'])&&!empty($_POST['Precio'])){
        
        //paso los datos a la funcion
        $id= insertarDatos_Productos($Producto, $Imagen, $Precio);
    }

    
    if($id!=null){
      //redirijo al usuario a la pantalla principal
      header('Location: home');
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


   function MostrarProducto2(){
    $Productos = ObtenerProductos();

    
  
    foreach($Productos as $Producto){ 
     
         echo  '<article class="seccion-todo">
                  <div class="producto">
                     <img class="imagen-prod" src='. $Producto->Imagen . '>
                       <h1>'. $Producto->Producto .'</h1>
                        <p><b>Precio</b></p>
                        <p>'. $Producto->Precio .'</p
                        </div>
                        </article>';
       
   }

}

function verificar_permisos(){
    $db=conectar_tpo_db();
    $mail=$_POST['Mail'];
    $password=$_POST['Contraseña'];
    $registro = $db->prepare('SELECT Contraseña, Permisos FROM usuarios WHERE Mail = :Mail');
    $registro->bindParam(':Mail', $_POST['Mail']);
    $registro->execute();
    $resultados = $registro->fetch(PDO::FETCH_ASSOC);
  
  if(password_verify($password, $resultados['Contraseña'])){
    if($resultados['Permisos']==1){
            require_once 'template/registro_producto.php';

        }else{
            echo "no estan los permisos adecuados";
        }
        
  }else{
    echo "las credenciales no coinciden";
  }
}

