<?php
include_once 'conexion.php';

// Obtener el valor de 'numero' desde la URL
$numero = isset($_GET['numero']) ? $conn->real_escape_string($_GET['numero']) : '';

// Verificar que el número no esté vacío
if (empty($numero)) {
    die("Número de producto no especificado.");
}

// Consulta usando 'numero' en lugar de 'id'
$sql = "SELECT * FROM productos WHERE numero = '$numero'";
$result = $conn->query($sql);

// Verificar si la consulta fue exitosa
if (!$result) {
    die("Error en la consulta: " . $conn->error);
}

// Verificar si se encontró el producto
if ($result->num_rows === 0) {
    die("Producto no encontrado.");
}

// Obtener los datos del producto
$producto = $result->fetch_assoc();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/products.css" />
    <title>Imagrafic/Products/Details</title>
</head>
<body>
    <div class="header">
      <ul class="redes">
        <li>
          <a
            href="https://www.instagram.com/imagenes_graficas?igshid=di1ufcnwhc4f"
            target="_blank"
          >
            <img class="instagram" src="img/instagram.svg" alt="" />
          </a>
        </li>
        <li>
          <a
            href="https://www.facebook.com/imagenesgraficasbicsas/"
            target="_blank"
          >
            <img class="facebook" src="img/facebook.svg" alt="" />
          </a>
        </li>
        <li>
          <a
            href="https://co.pinterest.com/igraficas/?invite_code=624950ea13b548a7b1c680f4787bd4c9&sender=506162583028394334"
            target="_blank"
          >
            <img class="pinterest" src="img/pinterest.svg" alt="" />
          </a>
        </li>
      </ul>
    </div>
    <div class="menu">
      <div class="izquierdo">
        <img class="izquierdo_imagen" src="img/bombillo.png" alt="" />
      </div>
      <div class="derecho">
        <div class="derecho_imagen">
          <img width="100%" src="img/Pgina-principal-1.jpg" alt="" />
        </div>
        <div class="derecho_menu">
          <div class="nav">
            <ul class="menu2">
              <li><a href="index.php">HOME</a></li>
              <li><a href="products.php">PRODUCTS</a></li>
              <li><a href="#Proyectos">RESOURCES</a></li>
              <li><a href="#contacto">ABOUT US</a></li>
              <li><a href="#contacto">HOW WE MADE</a></li>
              <li><button class="boton primary">Request a Quote</button></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <h1><?= htmlspecialchars($producto['nombre']) ?></h1>
    <img src="productsimg/<?= htmlspecialchars($producto['imagen']) ?>.png" alt="">
    <p><?= htmlspecialchars($producto['numero']) ?></p>
    
</body>
</html>