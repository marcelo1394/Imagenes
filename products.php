<?php
include_once 'conexion.php';

// Número de productos por página
$por_pagina = 32;
$pagina_actual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$inicio = ($pagina_actual - 1) * $por_pagina;

// Filtro de categoría
$categoria = isset($_GET['categoria']) ? $conn->real_escape_string($_GET['categoria']) : null;
$filtro_categoria = $categoria ? "WHERE categoria = '$categoria'" : "";

// Total de productos
$total_sql = "SELECT COUNT(*) AS total FROM productos $filtro_categoria";
$total_result = $conn->query($total_sql);
$total_filas = $total_result->fetch_assoc()['total'];
$total_paginas = ceil($total_filas / $por_pagina);

// Consulta principal
$sql = "SELECT * FROM productos $filtro_categoria LIMIT $inicio, $por_pagina";
$resultado = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="en">

<head>

  <style>
    .grid-container {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      /* 4 columnas fijas */
      gap: 40px;
      max-width: 1400px;
      margin: auto;
    }

    .card {
      background: white;
      padding: 15px;
      border: 2px solid #ffe262;
      text-align: center;
      height: 420px;
      width: 100%;
      /* se ajusta automáticamente a su columna */
      box-sizing: border-box;
    }

    .card img {
      max-width: 100%;
      height: 250px;
      object-fit: cover;
      border-radius: 6px;
    }

    .card h3 {
      margin: 20px 0 5px;
    }

    .card p {
      margin: 0;
      color: #666;
    }

    @media (max-width: 1024px) {
      .grid-container {
        grid-template-columns: repeat(2, 1fr);
      }

      .card {
        height: 400px;
      }

      .card img {
        height: 200px;
      }
    }

    @media (max-width: 600px) {
      .grid-container {
        grid-template-columns: 1fr;
      }

      .card {
        height: 380px;
      }

      .card img {
        height: 180px;
      }
    }

    .paginacion {
      text-align: center;
      margin-top: 30px;
    }

    .paginacion a {
      margin: 0 5px;
      padding: 8px 12px;
      background: rgb(163, 161, 30);
      color: white;
      text-decoration: none;
      border-radius: 5px;
    }

    .paginacion a.activa {
      background: rgb(212, 210, 62);
    }

    .paginacion a:hover {
      background: rgb(209, 206, 34);
    }

    .category_izquierda_ul2 a {
      text-decoration: none;
      color: black;
    }

    .category_izquierda_ul2 a:hover {
      color: grey;
    }

    /* ----------------- */

    .category {
      display: flex;
      gap: 40px;
      padding: 20px;
    }

    .category_izquierda {
      flex: 1;
      max-width: 250px;
    }

    .category_derecha {
      flex: 3;
      width: 100%;
    }

    .category_izquierda_ul1,
    .category_izquierda_ul2 {
      list-style: none;
      padding: 0;
    }

    .category_izquierda_ul1 li,
    .category_izquierda_ul2 li {
      margin-bottom: 10px;
    }

    .category_izquierda_p {
      font-weight: bold;
      margin: 20px 0 10px;
    }

    @media (max-width: 1024px) {
      .category {
        flex-direction: column;
      }

      .category_izquierda {
        max-width: 100%;
        width: 100%;
        margin-bottom: 20px;
      }

      .category_derecha {
        width: 100%;
      }

      .grid-container {
        grid-template-columns: repeat(2, 1fr);
      }
    }

    @media (max-width: 600px) {
      .category {
        flex-direction: column;
        padding: 10px;
      }

      .category_izquierda {
        max-width: 100%;
        width: 100%;
        margin-bottom: 300px;
      }

      .category_derecha {
        width: 100%;
      }

      .grid-container {
        grid-template-columns: 4fr;
      }

      .category_izquierda_ul1 {
        display: flex;
        margin-left: 110px;
      }

      .category_izquierda_p {
        display: flex;
        margin-left: 60px;
      }

      .category_izquierda_ul2 {
        margin-left: 110px;
      }

    }
  </style>

  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/products.css" />
  <!-- <title>Imagrafic/Products</title> -->
  <link rel="icon" href="img/favicon.ico" type="img/ico" />

</head>

<body>
  <div class="header">
    <ul class="redes">
      <li>
        <a
          href="https://www.instagram.com/imagraphic_promo/"
          target="_blank">
          <img class="instagram" src="img/instagram.svg" alt="" />
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
            <li><a href="index">HOME</a></li>
            <li><a href="products">PRODUCTS</a></li>
            <li><a href="aboutus">ABOUT US</a></li>
            <li><a href="howwemade">HOW WE MADE</a></li>
          </ul>
        </div>
      </div>
    </div>
    <dialog id="modal" class="modal">
      <div class="stilomodal">
        <h2>Request a Quote</h2>

        <form>
          <div class="form-group">
            <label for="name">Name:</label>
            <input
              type="text"
              id="name"
              placeholder="Enter your full name" />
          </div>
          <div class="form-group">
            <label for="email">Email:</label>
            <input
              type="email"
              id="email"
              placeholder="Enter your email address" />
          </div>
          <div class="form-group">
            <label for="request" class="request-label">application:</label>
            <textarea
              id="request"
              placeholder="Describe your request here"></textarea>
          </div>
        </form>
        <button id="btnenviar" class="btn-submit">Send</button>
      </div>
    </dialog>
  </div>

  <div class="category">
    <div class="category_izquierda">
      <ul class="category_izquierda_ul1">
        <li><a href="index.php">HOME</a></li>
        <!-- <li><a href="products.php">PRODUCTS</a></li> -->
      </ul>
      <p class="category_izquierda_p">CATEGORIES</p>
      <ul class="category_izquierda_ul2">
        <li><a href="products.php?categoria=Bags">Bags</a></li>
        <li><a href="products.php?categoria=Backpacks">Backpacks</a></li>
        <li><a href="products.php?categoria=Pouches">Pouches</a></li>
        <li><a href="products.php?categoria=Tote bags">Tote bags</a></li>
        <li><a href="products.php?categoria=Drawstring bags">Drawstring bags</a></li>
        <li><a href="products.php?categoria=Baskets">Baskets</a></li>
        <li><a href="products.php?categoria=Cloths">Cloths</a></li>
        <!-- <li><a href="products.php?categoria=Clothing">Clothing</a></li> -->
      </ul>
    </div>
    <div class="category_derecha">
      <?php if ($resultado && $resultado->num_rows > 0): ?>
        <div class="grid-container">
          <?php while ($fila = $resultado->fetch_assoc()): ?>
            <div class="card">
              <a href="detalle.php?numero=<?= $fila['numero'] ?>">
                <img src="productsimg/<?= $fila['imagen'] ?>.png" alt="<?= htmlspecialchars($fila['nombre']) ?>">
              </a>
              <!-- <h3><?= ucfirst(strtolower(htmlspecialchars($fila['nombre']))) ?></h3>   codigo con caracteres -->
              <h3>
                <?= ucfirst(
                  strtolower(
                    preg_replace("/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/u", "", htmlspecialchars($fila['nombre']))
                  )
                )
                ?>
              </h3>


              <!-- <p><?= htmlspecialchars($fila['numero']) ?></p> -->
            </div>
          <?php endwhile; ?>
        </div>
      <?php else: ?>
        <p style="text-align:center;">No hay productos en esta categoría.</p>
      <?php endif; ?>

      <div class="paginacion">
        <?php for ($i = 1; $i <= $total_paginas; $i++): ?>
          <a class="<?= $i == $pagina_actual ? 'activa' : '' ?>"
            href="products.php?pagina=<?= $i ?><?= $categoria ? '&categoria=' . urlencode($categoria) : '' ?>">
            <?= $i ?>
          </a>
        <?php endfor; ?>
      </div>


    </div> <!-- cierre de .category_derecha -->

  </div> <!-- cierre de .category -->
  <!-- <div class="texini">
    <img width="100%" src="img/10.png" alt="" />
  </div>

  <div class="final">
    <div class="imgfinal1">
      <img width="180px" src="img/bombillo.png" alt="" />
      <div class="form2">
        <h1 class="text_form2">Subscribe now!</h1>
        <form>
          <div class="form2">
            <input class="intform2" id="name" placeholder="Your Name" />
          </div>
          <div class="form2">
            <input class="intform2" id="email" placeholder="Your Email" />
          </div>
          <div class="form2">
            <input class="intform2" id="email" placeholder="Your Company" />
          </div>
        </form>
        <button id="btnenviar" class="btnform2">Enviar</button>
        <div class="container_follow">
          <h4 class="follow">Follow us on:</h4>
          <div class="follow_img">
            <a href="https://www.instagram.com/imagenes_graficas?igshid=di1ufcnwhc4f">
              <img width="40px" src="img/instagram.svg" alt="" />
            </a>
            <a href="https://www.facebook.com/imagenesgraficasbicsas/">
              <img width="40px" src="img/facebook.svg" alt="" />
            </a>
            <a href="https://co.pinterest.com/igraficas/?invite_code=624950ea13b548a7b1c680f4787bd4c9&sender=506162583028394334">
              <img width="40px" src="img/pinterest.svg" alt="" />
            </a>
          </div>
        </div>
      </div>
      <div class="footer_img">
        <img width="400px" src="img/9.png" alt="" />
      </div>
    </div>

    <div class="texfinal">
      Copyright 2025 Imagraphic - All Rights Reserved
    </div>
  </div> -->

  <script src="funciones.js"></script>

</body>

</html>