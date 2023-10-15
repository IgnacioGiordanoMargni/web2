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
       
       
        $mail= $_POST['Mail'];
        $password = $_POST['Contraseña'];
        $resultados=$this->model->ObtenerUsuarioPorMail($mail, $password);

        $mensaje = '';
      
          if (!empty($resultados)) {
                // Verificar la contraseña
                if (password_verify($password, $resultados['Contraseña'])) {
                    session_start();
                    $_SESSION['user_mail'] = $resultados['Mail'];
                    $_SESSION['user_permisos']=$resultados['Permisos'];
                    header('Location:home');
                  
                } else {
                    $mensaje = 'Las credenciales no coinciden';
                    echo $mensaje;
                }
            } else {
                $mensaje = 'Usuario no encontrado'; // El usuario no existe en la base de datos
                echo $mensaje;
                die();
            }
        }
        
        function logout(){
         session_destroy();
         header('Location: home');
        }
  
        
}