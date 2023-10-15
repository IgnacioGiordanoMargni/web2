<?php
class vista_productos{


    function MostrarProducto($Productos){
        require_once './template/Productos.phtml';

    }


    function MostrarProductoDescripcion(){

    require_once './template/descripcion_producto.phtml';

}
}