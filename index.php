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
    <title>Imagrafic</title>
  </head>

  <body>
    <!-- CAMBIO JEFRY 5-20-2025 12:13AM -->
    <div class="header">
      <ul class="redes">
        <li>
          <a
            href="https://www.instagram.com/imagenes_graficas?igshid=di1ufcnwhc4f"
            target="_blank">
            <img class="instagram" src="img/instagram.svg" alt="" />
          </a>
        </li>
        <li>
          <a
            href="https://www.facebook.com/imagenesgraficasbicsas/"
            target="_blank">
            <img class="facebook" src="img/facebook.svg" alt="" />
          </a>
        </li>
        <li>
          <a
            href="https://co.pinterest.com/igraficas/?invite_code=624950ea13b548a7b1c680f4787bd4c9&sender=506162583028394334"
            target="_blank">
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
              <li><a href="#Home">HOME</a></li>
              <li><a href="products.php">PRODUCTS</a></li>
              <li><a href="#Proyectos">RESOURCES</a></li>
              <li><a href="aboutus.php">ABOUT US</a></li>
              <li><a href="howwemade.php">HOW WE MADE</a></li>
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
    <div class="muestra">
      <div class="recuadro1">
        <div class="imgrecu1">
          <a href=""><img width="180px" justify src="img/cotton-bag-t25.png" alt="" />
          </a>
        </div>
        <div class="price">View $7.66</div>
      </div>
      <div class="recuadro2">
        <div class="imgrecu2">
          <a href=""><img width="150px" src="img/tote-bag-t01.png" alt="" />
          </a>
        </div>
        <div class="price">View $7.66</div>
      </div>
      <div class="recuadro3">
        <div class="imgrecu3">
          <a href="">
            <img width="340px" src="img/12.png" alt="" />
          </a>
        </div>
        <div class="price">View $7.66</div>
      </div>
      <div class="recuadro4">
        <div class="imgrecu4">
          <a href="">
            <img width="300px" src="img/11.png" alt="" />
          </a>
        </div>
        <div class="price">View $7.66</div>
      </div>
      <div class="recuadro5">
        <div class="imgrecu5">
          <a href=""><img width="380px" src="img/13.png" alt="" /></a>
        </div>
        <div class="price">View $7.66</div>
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
                href="https://www.instagram.com/imagenes_graficas?igshid=di1ufcnwhc4f"><img width="40px" src="img/instagram.svg" alt="" /></a>
              <a href="https://www.facebook.com/imagenesgraficasbicsas/"><img width="40px" src="img/facebook.svg" alt="" /></a>
              <a
                href="https://co.pinterest.com/igraficas/?invite_code=624950ea13b548a7b1c680f4787bd4c9&sender=506162583028394334"><img width="40px" src="img/pinterest.svg" alt="" /></a>
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
    </body>
</html>