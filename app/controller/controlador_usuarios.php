<?php
require_once "./app/Models/modelo_usuarios.php";
require_once "./app/view/vista_usuarios.php";

class controlador_usuarios {

    private $model;
    private $view;

    function __construct(){
        $this->model= new modelo_usuarios(); 
        $this->view= new vista_usuarios();
    }

    function adduser(){
        $mail= $_POST['Mail'];
        $nombre= $_POST['Nombre'];
        $contraseña= password_hash($_POST['Contraseña'], PASSWORD_BCRYPT); //Cifro los datos de la contraseña, para que no sea posible averiguarla con solo ver la db
        
    
        //chequeo que los campos tengan contenido
        if(!empty($_POST['Mail'])&&!empty($_POST['Nombre'])&&!empty($_POST['Contraseña'])){
            
            //paso los datos a la funcion
            $id= $this->model->insertarDatos($mail, $nombre, $contraseña);
        }
    
        
        if($id!=null){
          //redirijo al usuario a la pantalla principal
          header('Location: home');
        } else{
            echo "error al insertar el usuario!";
        }
     }

     function verificar_log(){
        session_start();
        $db= $this->model->conectar_tpo_db();
        $mail= $_POST['Mail'];
    
        if (!empty($_POST['Mail']) && !empty($_POST['Contraseña'])) {
          $mail = $_POST['Mail'];
          $password = $_POST['Contraseña'];
          $registros = $db->prepare('SELECT Mail, Contraseña FROM usuarios WHERE Mail = :Mail');
          $registros->bindParam(':Mail', $_POST['Mail']);
          $registros->execute();
          $resultados = $registros->fetch(PDO::FETCH_ASSOC);
        
          $mensaje = '';
      
          if ($resultados && !empty($_POST['Contraseña'])) {
                // Verificar la contraseña
                if (password_verify($password, $resultados['Contraseña'])) {
                    $_SESSION['user_id'] = $mail;
                    header('Location:home');
                    exit(); // Importante: asegúrate de salir para evitar que el código siga ejecutándose
                } else {
                    $mensaje = 'Las credenciales no coinciden';
                    echo $mensaje;
                }
            } else {
                $mensaje = 'Usuario no encontrado'; // El usuario no existe en la base de datos
                echo $mensaje;
            }
        }
            
        }

        
}