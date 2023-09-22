<?php
require_once 'app/db.php';

function AñadirProducto(){
    contectar_tpo_db();
    
}

function MostrarProducto(){
    $Productos = ObtenerProductos();

    
  
    foreach($Productos as $Producto){ 
     
         echo  
        '<article class="seccion-todo">
            <div class="producto">'. 
             '<img class="imagen-prod"  src='. $Producto->Imagen .'>'
             ."<h1>".  $Producto->Producto ."</h1>"
             ."<p><b>Precio</b></p>".
             "<p>". $Producto->Precio ."</p>"
         ."</div>".

        '</article>' ; 
     
       
   }

}

