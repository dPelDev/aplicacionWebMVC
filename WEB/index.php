<?php

session_start();
require 'funciones.php';


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SERVERSKATEBOARDING.CLOTHES</title>

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/estilos.css">
  <link rel="stylesheet" href="assets/css/style.css">

<!-- Google-font -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Unbounded:wght@500&display=swap" rel="stylesheet">
</head>

<body>

  <!-- Fixed navbar -->
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand texto-google" href="index.php">ServerSkateboarding.Clothes</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav pull-right">
          <li>
            <a href="carrito.php" class="btn">CARRITO <span class="badge"><?php print cantidadPrendas(); ?></span></a>
          </li>
          <li>
            <a href="panel/index.php" class="btn">ACCESO ADMINISTRADORES</span></a>
          </li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </nav>

  <div class="container" id="main">
    <div class="row">
      <?php
      require 'vendor/autoload.php';
      $ropa = new dwes\ropa;
      $info_ropa = $ropa->mostrar();
      $cantidad = count($info_ropa);

      if ($cantidad > 0) {

        for ($i = 0; $i < $cantidad; $i++) {
          $item = $info_ropa[$i];

      ?>

          <div class="col-md-4">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="text-center " style="margin: 0; font-weight: bold;"><?php print $item['nombre']  ?></h4>
              </div>
              <div class="panel-body">
                <?php
                $foto = 'upload/' . $item['foto'];
                if (file_exists($foto)) {
                ?>
                  <img src="<?php print $foto ?>" class="img-responsive">
                <?php
                } else { ?>
                  <img src="assets/imagenes/not-found.jpg" class="img-responsive">
                <?php }

                ?>
              </div>
              <div class="panel-footer">
                <a href="carrito.php?id=<?php print $item['id']  ?>" class="btn btn-success btn-block">
                  <span class="glyphicon glyphicon-shopping-cart"></span>Comprar
                </a>
              </div>
            </div>
          </div>


        <?php

        }
      } else {
        ?>



      <?php } ?>
    </div>


  </div> <!-- /container -->


  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>

</body>

</html>