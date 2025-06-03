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
  <link rel="stylesheet" href="css/detalle.css" />
  <title>Imagrafic/Products/Details</title>
  <link rel="icon" href="img/favicon.ico" type="img/ico" />

</head>

<body>
  <div class="header">
    <ul class="redes">
      <li>
        <a href="https://www.instagram.com/imagraphic_promo/" target="_blank">
          <img class="instagram" src="img/instagram.svg" alt="Instagram" />
        </a>
      </li>
     
     
    </ul>
  </div>

  <div class="menu">
    <div class="izquierdo">
      <img class="izquierdo_imagen" src="img/bombillo.png" alt="Bombillo" />
    </div>
    <div class="derecho">
      <div class="derecho_imagen">
        <img src="img/Pgina-principal-1.jpg" alt="Principal" />
      </div>
      <div class="derecho_menu">
        <div class="nav">
          <ul class="menu2">
            <li><a href="index.php">HOME</a></li>
            <li><a href="products.php">PRODUCTS</a></li>
            <li><a href="aboutus.php">ABOUT US</a></li>
            <li><a href="howwemade.php">HOW WE MADE</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>


  <div class="breadcrumb">
    <a href="#">HOME</a> ›
    <a href="#">Products</a> ›
    <a href="#">Categories</a> ›
    <a href="#">Bags</a> ›
    <!-- <span>Laminated</span> -->
  </div>
  <div class="nombre">
    <!-- <h1><?= ucfirst(strtolower(htmlspecialchars($producto['nombre']))) ?></h1> -->
    <h1>
      <?= ucfirst(
        strtolower(
          preg_replace("/[^[:alpha:][:space:]]/u", "", htmlspecialchars($producto['nombre']))
        )
      )
      ?>
    </h1>


  </div>

  <div class="product-container">
    <div class="product-image">
      <img src="productsimg/<?= htmlspecialchars($producto['imagen']) ?>.png" alt="">
    </div>
    <div class="product-info">
      <div class="product-title"><?= ucfirst(strtolower(preg_replace("/[^[:alpha:][:space:]]/u", "", htmlspecialchars($producto['nombre']))))?></div>
      <div class="product-code">
        CODE
        <?= htmlspecialchars($producto['numero']) ?>
      </div>
      <div class="product-description">
        <?= htmlspecialchars($producto['descripcion']) ?>
      </div>

      <div class="accordion">
        <div class="accordion-header">Prices</div>
        <div class="accordion-content"><img src="imgprices/<?= htmlspecialchars($producto['Prices']) ?>.png" alt=""></div>
      </div>

      <div class="accordion">
        <div class="accordion-header">Product details</div>
        <div class="accordion-content"><?= htmlspecialchars($producto['Product details']) ?></div>
      </div>

      <div class="accordion">
        <div class="accordion-header">Imprint details</div>
        <div class="accordion-content"><?= htmlspecialchars($producto['Imprint details']) ?></div>
      </div>

      <div class="accordion">
        <div class="accordion-header">Shipping details</div>
        <div class="accordion-content"><?= htmlspecialchars($producto['Shipping details']) ?></div>
      </div>

      <!-- <div class="accordion">
        <div class="accordion-header">Legal details</div>
        <div class="accordion-content"><?= htmlspecialchars($producto['Legal details']) ?></div>
      </div> -->
    </div>
  </div>

  <script>
    document.querySelectorAll('.accordion-header').forEach(header => {
      header.addEventListener('click', () => {
        const content = header.nextElementSibling;
        content.style.display = content.style.display === 'block' ? 'none' : 'block';
      });
    });
  </script>

  <!-- 
  <h1><?= htmlspecialchars($producto['nombre']) ?></h1>
  <img src="productsimg/<?= htmlspecialchars($producto['imagen']) ?>.png" alt="">
  <p><?= htmlspecialchars($producto['numero']) ?></p> -->

</body>

</html>