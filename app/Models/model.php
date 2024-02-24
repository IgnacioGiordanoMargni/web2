<?php
require_once "database/config.php";
class Model
{
protected $db;

  function __construct() {

    $this->db = new PDO('mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DB . ';charset=utf8', MYSQL_USER, MYSQL_PASS);
    $this->deploy();
  }

  
  function deploy(){

    $query = $this->db->query('SHOW TABLES');
    $tables = $query->fetchAll();
    if (count($tables) == 0){
      $sql = <<<END

      CREATE TABLE `productos` (
        `Producto` varchar(45) NOT NULL,
        `Imagen` varchar(255) NOT NULL,
        `Precio` int(45) NOT NULL,
        `id` int(45) NOT NULL,
        `Categoria` int(11) NOT NULL,
        `Descripcion` varchar(255) NOT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
      
      --
      -- Volcado de datos para la tabla `productos`
      --
      
      INSERT INTO `productos` (`Producto`, `Imagen`, `Precio`, `id`, `Categoria`, `Descripcion`) VALUES
      ('Varita Harry Potter', 'https://libria.com.ar/wp-content/uploads/2019/05/varita-harry.jpg', 100000, 21, 2, 'Varita replica'),
      ('Vela en lata| Harry Potter', 'https://http2.mlstatic.com/D_NQ_NP_624352-MLA53273382938_012023-O.webp', 5000, 22, 2, 'Velas en lata');
      
      -- --------------------------------------------------------
      
      --
      -- Estructura de tabla para la tabla `usuarios`
      --
      
      CREATE TABLE `usuarios` (
        `Mail` varchar(255) NOT NULL,
        `Nombre` varchar(255) NOT NULL,
        `Contraseña` varchar(255) NOT NULL,
        `Permisos` tinyint(1) NOT NULL DEFAULT 0
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
      
      --
      -- Volcado de datos para la tabla `usuarios`
      --
      
      INSERT INTO `usuarios` (`Mail`, `Nombre`, `Contraseña`, `Permisos`) VALUES
      ('hdgasfgadfsg', 'sdfdfasdf', '$2y$10$UrJyCcNM/QQxWf0DWzhDsO9sbkOHzARinAVAplkeNt1fCRFGlzZK6', 0),
      ('Icasas760@gmail.com', 'Nacho', '$2y$10$yZ3QrbNqx5pozXQ95kjn9OaWUDwbvKFo1ait0Jp0IB4cn2YUsd3sm', 0),
      ('ignaciocasas132@gmail.com', 'dfgdfgdfgd', '$2y$10$aA8lHiU9.LRkSIEGZ5Cp8.e2/Kay5o7YEoEpnwj63FwGk5XrlzOmC', 1),
      ('jorgemorcillo1966@gmail.com', 'matias', '$2y$10$AjevlZ/bOQ.4Kg638AJtLuZssBTD8AL6iWP9WUadMxBbz7wN.ku5e', 0),
      ('matias', 'a', '$2y$10$pzb6zG8SOj3ghF3avfTxUujZkVeFXrfjAznkocOqfROOiF64NZTIW', 0);
      
      --
      -- Índices para tablas volcadas
      --
      
      --
      -- Indices de la tabla `productos`
      --
      ALTER TABLE `productos`
        ADD PRIMARY KEY (`id`),
        ADD KEY `fk_Categoria` (`Categoria`);
      
      --
      -- Indices de la tabla `usuarios`
      --
      ALTER TABLE `usuarios`
        ADD PRIMARY KEY (`Mail`);
      
      --
      -- AUTO_INCREMENT de las tablas volcadas
      --
      
      --
      -- AUTO_INCREMENT de la tabla `productos`
      --
      ALTER TABLE `productos`
        MODIFY `id` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
      
      --
      -- Restricciones para tablas volcadas
      --
      
      --
      -- Filtros para la tabla `productos`
      --
      ALTER TABLE `productos`
        ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`Categoria`) REFERENCES `categorias` (`id`);
      COMMIT;
      END;
      $this->db->query($sql);

    }

    }

}