<?php

use PHPMailer\PHPMailer\{PHPMailer, SMTP, Exception};

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
if (isset($_POST['submit'])) {
  $nombre = $_POST['name'];
  $email = $_POST['correo'];
  $request = $_POST['request'];
  $errors = array();
  if (empty($nombre)) {
    $errors[] = 'Name is required';
  }
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'The email address is invalid';
  }
  if (empty($request)) {
    $errors[] = 'Request is required';
  }
  if (count($errors) == 0) {
    $msj = "De: $nombre<br> Correo:<a href='mailto:$email'>$email</a><br>";
    $msj .= "Asunto: Solicitud de cotización<br>";
    $msj .= "empresa: $request<br>";
    $msj .= "<br>";
    $mail = new PHPMailer(true);
  }
  try {
    $mail->SMTPDebug  = SMTP::DEBUG_OFF;
    $mail->isSMTP();
    $mail->Host = 'smtp.mi.com.co';
    $mail->SMTPAuth = true;
    $mail->Username = 'prueba@imagraphicusa.com';
    $mail->Password = 'Jdrg0908*/';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465;
    $mail->setFrom('prueba@imagraphicusa.com', 'CONTACTO IMAGRAPHICUSA');
    $mail->addAddress('prueba@imagraphicusa.com', 'CONTACTO IMAGRAPHICUSA');
    $mail->isHTML(true);
    $mail->Subject = 'CONTACTO IMAGRAPHICUSA';
    $mail->Body    = utf8_decode($msj);
    $mail->send();
    $respuesta = "MESSAGE SENT";
  } catch (Exception $e) {
    $respuesta = 'Mensaje ' . $mail->ErrorInfo;
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/aboutus.css" />
  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap"
    rel="stylesheet" />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <title>Imagrafic/About us</title>
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
            <li><a href="index">HOME</a></li>
            <li><a href="products">PRODUCTS</a></li>
            <li><a href="aboutus">ABOUT US</a></li>
            <li><a href="howwemade">HOW WE MADE</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <section class="hero">
    <div class="container">
      <div class="hero-content">
        <img width="350px" src="img/LOGO.png" alt="">
        <p class="tagline">
          The factory of great ideas
        </p>
      </div>
    </div>
  </section>

  <!-- About Section -->
  <section class="about">
    <div class="container">
      <div class="section-title">
        <h2>Welcome Our Company</h2>
      </div>
      <div class="about-content">
        <div class="about-text">
          <p>We are a company focused on the production of promotional products of the best quality. We have more than<strong> 36 years of experience</strong> and we have the support of a large production plant with offset printing processes, textile, screen printing, digital printing, laser engraving, sewing and more. We are manufacturer company and we can supply your eco-friendly and gifts products needs

          </p>

          <div class="highlight-box">
            <p>
              "One Stop Shop" for all your promotional product’s needs, we manufacture in house all our paper made and sewn products to guarantee the highest quality!
            </p>
          </div>

          <p>
            Our company can supply you with a whole souvenirs solution, we are manufacturers. Our in house designer team offers great new ideas. If you can imagine it, we can create it!
          </p>
        </div>
      </div>
    </div>
  </section>
  <!-- Capabilities Section -->
  <section class="features">
    <div class="container">
      <div class="section-title">
        <h2>Our Manufacturing Capabilities</h2>
      </div>

      <div class="features-grid">
        <div class="feature-card">
          <div class="feature-icon">
            <i class="fas fa-cogs"></i>
          </div>
          <h3>Custom design capabilities</h3>

        </div>

        <div class="feature-card">
          <div class="feature-icon">
            <i class="fas fa-tachometer-alt"></i>
          </div>
          <h3>Efficient Workflow</h3>
        </div>

        <div class="feature-card">
          <div class="feature-icon">
            <i class="fas fa-industry"></i>
          </div>
          <h3>Direct from the factory</h3>

        </div>

        <div class="feature-card">
          <div class="feature-icon">
            <i class="fas fa-boxes"></i>
          </div>
          <h3>Small and large-quantity orders options</h3>

        </div>

        <div class="feature-card">
          <div class="feature-icon">
            <i class="fas fa-puzzle-piece"></i>
          </div>
          <h3>Exclusive designs</h3>
        </div>

        <div class="feature-card">
          <div class="feature-icon">
            <i class="fas fa-project-diagram"></i>
          </div>
          <h3>Possibility of special finishes </h3>

        </div>
        <div class="feature-card">
          <div class="feature-icon">
            <i class="fas fa-leaf"></i>
          </div>
          <h3>Low environmental impact</h3>

        </div>

        <div class="feature-card">
          <div class="feature-icon">
            <i class="fas fa-pencil-ruler"></i>
          </div>
          <h3>Custom Designs</h3>

        </div>

        <div class="feature-card">
          <div class="feature-icon">
            <i class="fas fa-lightbulb"></i>
          </div>
          <h3>Innovative productive processes</h3>

        </div>

        <div class="feature-card">
          <div class="feature-icon">
            <i class="fas fa-eye"></i>
          </div>
          <h3>Designer Oversight</h3>

        </div>

        <div class="feature-card">
          <div class="feature-icon">
            <i class="fas fa-tshirt"></i>
          </div>
          <h3>Possibility of special finishes </h3>

        </div>

        <div class="feature-card">
          <div class="feature-icon">
            <i class="fas fa-sliders-h"></i>
          </div>
          <h3>Custom products </h3>

        </div>
      </div>
    </div>

  </section>
  <!-- CTA Section -->
  <section class="cta-section">
    <div class="container">
      <h2 class="cta-title">
        Call us to see how we can help you with your next Project.
      </h2>
      <p class="cta-subtitle">
        Our team is ready to help you
      </p>
      <a href="https://wa.me/573176428571" class="cta-button">
        <i class="fas fa-phone-alt"></i> Contact Us Today
      </a>
    </div>
  </section>
  <div class="final">
    <div class="imgfinal1">
      <img width="180px" src="img/bombillo.png" alt="" />
      <div class="form2">
        <?php
        if (isset($errors)) {
          if (count($errors) > 0) {
        ?>
            <div class="row">
              <div class="col-lag-6 col-md-12">
                <div class="alert alert-danger alert-dismissible" role="alert">
                  <?php
                  foreach ($errors as $error) {
                    echo $error . '<br>';
                  }
                  ?>
                </div>
              </div>
            </div>
        <?php
          }
        }
        ?>
        <h1 class="text_form2">Subscribe now!</h1>

        <form id="formulario" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>" autocomplete="off">
          <div class="form2">
            <input class="intform2" name="name" placeholder="Your Name" required />
          </div>
          <div class="form2">
            <input class="intform2" name="correo" required
              placeholder="Your Email" />
          </div>
          <div class="form2">
            <input class="intform2" name="request" placeholder="Your Company" required />
          </div>
          <?php if (isset($respuesta)) { ?>
            <div class="formmjs">

              <?php echo $respuesta;
              ?>


            </div>
          <?php } ?>
          <button name="submit" type="submit" class="btnform2">Send</button>
        </form>
        <div class="container_follow">
          <h4 class="follow">Follow us on:</h4>
          <div class="follow_img">
            <a
              href="https://www.instagram.com/imagraphic_promo/"><img width="40px" src="img/instagram.svg" alt="" /></a>
            <a href="https://wa.me/573176428571"><img width="40px" src="img/whatsapp.png" alt="" /></a>

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
  </div>
  
  
</body>

</html>