<?php
require_once "./app/Models/modelo_usuarios.php";
require_once "./app/view/vista_usuarios.php";
require_once './app/helper/authhelper.php';

class controlador_usuarios {

    private $model;
    private $view;

    function __construct(){
        $this->helper = new AuthHelper();
        $this->model= new modelo_usuarios(); 
        $this->view= new vista_usuarios();
    }

    function showLogin(){
        $this->view->showLogin();
    }    
    function adduser(){
        $mail= $_POST['Mail'];
        $nombre= $_POST['Nombre'];
        $contraseña= password_hash($_POST['Contraseña'], PASSWORD_BCRYPT); //Cifro los datos de la contraseña, para que no sea posible averiguarla con solo ver la db
        $check =$this->model->verificar_existencia($mail); //verifico que el mail no exista en la base de datos
    
        //chequeo que los campos tengan contenido
        if(!empty($_POST['Mail'])&&!empty($_POST['Nombre'])&&!empty($_POST['Contraseña'])){
            
           if($check==1){
             //paso los datos a la funcion
             $id= $this->model->insertarDatos($mail, $nombre, $contraseña);
             if($id!=null){
                //redirijo al usuario a la pantalla principal
                header('Location: home');
              } else{
                  echo "error al insertar el usuario!";
              }
           } else {
             echo "Usuario con mail ya existente ";
             ?><a href='home'>Volver</a> <?php 
           }
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