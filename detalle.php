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
</head>

<body>
  <div class="header">
    <ul class="redes">
      <li>
        <a href="https://www.instagram.com/imagenes_graficas?igshid=di1ufcnwhc4f" target="_blank">
          <img class="instagram" src="img/instagram.svg" alt="Instagram" />
        </a>
      </li>
      <li>
        <a href="https://www.facebook.com/imagenesgraficasbicsas/" target="_blank">
          <img class="facebook" src="img/facebook.svg" alt="Facebook" />
        </a>
      </li>
      <li>
        <a href="https://co.pinterest.com/igraficas/" target="_blank">
          <img class="pinterest" src="img/pinterest.svg" alt="Pinterest" />
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
            <li><a href="#Proyectos">RESOURCES</a></li>
            <li><a href="#contacto">ABOUT US</a></li>
            <li><a href="#contacto">HOW WE MADE</a></li>
            <li><button class="boton primary">Request a Quote</button></li>
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
    <h1><?= htmlspecialchars($producto['nombre']) ?></h1>
  </div>

  <div class="product-container">
    <div class="product-image">
      <img src="productsimg/<?= htmlspecialchars($producto['imagen']) ?>.png" alt="">
    </div>
    <div class="product-info">
      <div class="product-title">Small tote bag</div>
      <!-- <div class="product-code">Code T10</div> -->
      
      <div class="product-code">
        CODE
      <?=htmlspecialchars($producto['numero']) ?>
      </div>
      <div class="product-description">
        Your brand name will go everywhere this shopping bag goes! It measures 13” W x 13” H x 5” Gussets x 18” Handles and is made of 100 GSM non-woven polypropylene. This bag is recyclable and reusable. High quality and hand-sewn. There is no limit to what you can do with this full color bag! Creating an ideal product for retail stores, banks, colleges and libraries alike! *The products are sublimated and then the product sewn.
      </div>

      <div class="accordion">
        <div class="accordion-header">Prices</div>
        <div class="accordion-content">Pricing information here...</div>
      </div>

      <div class="accordion">
        <div class="accordion-header">Product details</div>
        <div class="accordion-content">Details here...</div>
      </div>

      <div class="accordion">
        <div class="accordion-header">Imprint details</div>
        <div class="accordion-content">Imprint information here...</div>
      </div>

      <div class="accordion">
        <div class="accordion-header">Shipping details</div>
        <div class="accordion-content">Shipping info here...</div>
      </div>

      <div class="accordion">
        <div class="accordion-header">Legal details</div>
        <div class="accordion-content">Legal info here...</div>
      </div>
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