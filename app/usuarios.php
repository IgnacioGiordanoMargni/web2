<?php
require_once 'app/db.php';


function MostrarUsuarios() {

    $Users = ObtenerUsuarios();

    
  
     foreach($Users as $User){ 
      
          echo "<li>". $User->Nombre . "</li>"; 
          
    
    }
}

function adduser(){
    $mail= $_POST['Mail'];
    $nombre= $_POST['Nombre'];
    $contraseña= $_POST['Contraseña'];

    //chequeo que los campos tengan contenido
    if(!empty($_POST['Mail'])&&!empty($_POST['Nombre'])&&!empty($_POST['Contraseña'])){
        
        //paso los datos a la funcion
        $id= insertarDatos($mail, $nombre, $contraseña);
    }

    
    if($id!=null){
      //redirijo al usuario a la pantalla principal
      header('Location: home');
    } else{
        echo "error al insertar el usuario!";
    }
 }
  //por terminar
 function verificar_log(){
    $Mail= $_POST['Mail'];
    $Contraseña= $_POST['Contraseña'];
    
     
}