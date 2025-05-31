<?php
  use PHPMailer\PHPMailer\{PHPMailer, SMTP,Exception};
  require 'PHPMailer/src/Exception.php';
  require 'PHPMailer/src/PHPMailer.php';
  require 'PHPMailer/src/SMTP.php';
  if(isset($_POST['submit'])){
      $nombre = $_POST['name'];
      $email = $_POST['correo'];
      $request = $_POST['request'];
      $errors = array();
      if(empty($nombre)){
        $errors[] = 'Name is required';
      }
      if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors[] = 'The email address is invalid';
      }
      if(empty($request)){
        $errors[] = 'Request is required';
      }
      if (count($errors)== 0){
        $msj="De: $nombre<br> Correo:<a href='mailto:$email'>$email</a><br>";
        $msj.="Asunto: Solicitud de cotización<br>";
        $msj.="empresa: $request<br>";
        $msj.="<br>";
        $mail = new PHPMailer(true);}
        try {
          $mail ->SMTPDebug  = SMTP::DEBUG_OFF;
          $mail->isSMTP();
          $mail->Host='smtp.mi.com.co';
          $mail->SMTPAuth = true;
          $mail->Username='prueba@imagraphicusa.com';
          $mail->Password='Jdrg0908*/';
          $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
          $mail->Port = 465;
          $mail->setFrom('prueba@imagraphicusa.com', 'CONTACTO IMAGRAPHICUSA');
          $mail->addAddress('prueba@imagraphicusa.com', 'CONTACTO IMAGRAPHICUSA');          
          $mail->isHTML(true);
          $mail->Subject = 'CONTACTO IMAGRAPHICUSA';
          $mail->Body    =utf8_decode($msj);
          $mail->send();
          $respuesta = "MESSAGE SENT";
      }
      catch (Exception $e) {
        $respuesta = 'Mensaje '.$mail->ErrorInfo;
      }
  }
?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"
    />
    <title>Imagrafic</title>
        <link rel="icon" href="img/favicon.ico" type="img/ico" />

    
  </head>

  <body>
    <!-- CAMBIO JEFRY 5-20-2025 12:13AM -->
    <div class="header">
      <ul class="redes">
        <li>
          <a
            href="https://www.instagram.com/imagraphic_promo/
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
                <li>
                <a href="#formulario"><button id="btnabrir" class="boton primary" >
                  Request a Quote
                </button></a>
              </li>
              
            </ul>
          </div>
        </div>
      </div>
     
    </div>

    <div class="slider_cont">
      <ul class="ulslider">
        <li><img src="img/1.png" alt="" /></li>
        <li><img src="img/2.png" alt="" /></li>
        <li><img src="img/3.png" alt="" /></li>
        <li><img src="img/4.png" alt="" /></li>
      </ul>
    </div>
    <div class="imagenes3">
      <a href=""><img class="imagen1" src="img/5.png" alt="" /></a>
      <a href=""><img class="imagen2" src="img/6.png" alt="" /></a>
      <a href=""><img class="imagen3" src="img/7.png" alt="" /></a>
    </div>
    <div class="texini">
      <img width="100%" src="img/10.png" alt="" />
    </div>
    
     <div class="gallery-container">
      <div class="bag-item1 item-1">
      <div class="bag-text" onclick="window.location.href='products.php?categoria=Bags'">BAGS</div>
      </div>
      <div class="bag-item3 item-3">
        <div class="bag-text" onclick="window.location.href='products.php?categoria=Backpacks'">Backpacks</div>
      </div>
      <div class="bag-item4 item-4">
        <div class="bag-text" onclick="window.location.href='products.php?categoria=Pouches'" >Pouches</div>
      </div>
      <div class="bag-item2 item-2">
        <div class="bag-text" onclick="window.location.href='products.php?categoria=Tote bags'" >Tote bags</div>
      </div>
      <div class="bag-item5 item-5">
        <div class="bag-text" onclick="window.location.href='products.php?categoria=Drawstring bags'">Drawstring bags</div>
      </div>
    </div>
    <div class="section-divider">
      <div class="divider-line"></div>
     <span class="divider-text">See all products</span>
      <div class="divider-line"></div>
    </div>
    <div class="featured-container">
      <div class="section-header">
        <h2 class="section-title">Featured Products</h2>
      </div>

      <div class="product-slider">
        <div onclick="window.location.href='detalle.php?numero=T81'" class="product-item">
          <div class="product-image"><img width="150px" src="img/11.png" alt=""></div>
          <h3 class="product-name">drawstring bag </h3>
          <p class="product-status">Read More</p>
        </div>

        <div class="product-item">
          <div onclick="window.location.href='detalle.php?numero=T02'" class="product-image"><img width="110px" src="productsimg/T02.PNG" alt=""></div>
          <h3 class="product-name">Small tote bag</h3>
          <p class="product-status">Read More</p>
        </div>

        <div class="product-item">
          <div onclick="window.location.href='detalle.php?numero=LP08'" class="product-image"><img width="150px" src="productsimg/LP08.PNG" alt=""></div>
          <h3 class="product-name">Notepad plus</h3>
          <p class="product-status">Read More</p>
        </div>

        <div class="product-item">
          <div onclick="window.location.href='detalle.php?numero=T67'" class="product-image"><img width="150px" src="productsimg/T67.PNG" alt=""></div>
          <h3 class="product-name">Travel restroom</h3>
          <p class="product-status">Read More</p>
        </div>

        <!-- Puedes añadir más productos si necesitas -->
        <div class="product-item">
          <div onclick="window.location.href='detalle.php?numero=T100'"  class="product-image"><img width="150px" src="productsimg/T100.PNG" alt=""></div>
          <h3 class="product-name">Cosmetic baggie</h3>
          <p class="product-status">Read More</p>
        </div>
      </div>
    </div>
    <div class="final">
      <div class="imgfinal1">
        <img width="180px" src="img/bombillo.png" alt="" />
        <div class="form2">
          <?php
                if(isset($errors)){
                if(count($errors) > 0){
            ?>
            <div class="row">
              <div class="col-lag-6 col-md-12">
                <div class="alert alert-danger alert-dismissible" role="alert">
                  <?php
                    foreach($errors as $error){
                      echo $error.'<br>';
                    }
                  ?>
                </div>
              </div>
            </div>
          <?php
            }}        
          ?>
          <h1 class="text_form2">Subscribe now!</h1>
            
          <form id="formulario" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF'])?>"autocomplete="off">
            <div class="form2">
              <input class="intform2"   name="name"  placeholder="Your Name" required/>
            </div>
            <div class="form2">
              <input class="intform2" name="correo"  required
              placeholder="Your Email" />
            </div>
            <div class="form2">
              <input class="intform2"  name="request"placeholder="Your Company" required />
            </div>
            <?php if(isset($respuesta)){?>
              <div class="formmjs">
                
                <?php echo $respuesta;
                 ?>
                
                
              </div>
          <?php }?> 
           <button name="submit" type="submit"  class="btnform2">Send</button>
          </form>
          
          <div class="container_follow">
            <h4 class="follow">Follow us on:</h4>
            <div class="follow_img">
              <a
                href="https://www.instagram.com/imagraphic_promo/"><img width="40px" src="img/instagram.svg" alt="" /></a>
              <a href="https://wa.me/573176428571 "><img width="40px" src="img/whatsapp.png"alt="" /></a>
              
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
    <script src="funciones.js"></script>
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script>
     $(document).ready(function () {
        $(".product-slider").slick({
            dots: true,
            arrows: true,
            infinite: true,
            speed: 500, // Velocidad de transición (ms)
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true, // Activa el autoplay
            autoplaySpeed: 3000, // Cambia cada 3 segundos (ajustable)
            pauseOnHover: true, // Pausa al pasar el mouse
            responsive: [
              {
                breakpoint: 1024,
                settings: {
                  slidesToShow: 3,
                },
              },
              {
                breakpoint: 768,
                settings: {
                  slidesToShow: 2,
                },
              },
              {
                breakpoint: 480,
                settings: {
                  slidesToShow: 1,
                  arrows: false,
                },
              },
            ],
         });
        });
      </script>
    
    </body>
</html>