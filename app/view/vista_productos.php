<?php
class vista_productos{


    function MostrarProducto($Productos){
       
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

}