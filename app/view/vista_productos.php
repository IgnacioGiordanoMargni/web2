<link rel="stylesheet" href="../css/style.css">
<?php
class vista_productos{


    function MostrarProducto($Productos){


        require_once './template/Productos.phtml';

    }


    function MostrarProductoDescripcion($producto){

    require_once './template/descripcion_producto.phtml';

}

function MostrarProductoQuitar($Productos){

    require_once './template/ProductoQuitar.phtml';

}

function botonera($categorias){
    require_once './template/botonera.phtml';
}

function form_modificar($datos, $categorias){
    require_once './template/form_modificar.phtml';
}

function registro_producto(){
    require_once 'template/registro_producto.phtml';
}
}



 





