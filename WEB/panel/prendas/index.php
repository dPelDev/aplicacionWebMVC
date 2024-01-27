<?php

session_start();

if (!isset($_SESSION['usuario_info']) or empty(print $_SESSION['usuario_info'])) {
  header('Location: ../index.php');
}

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

  <title>SSK8.CLOTHES - ROPA</title>

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../assets/css/estilos.css">
  <link rel="stylesheet" href="../../assets/css/style.css">

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
        <a class="navbar-brand texto-google" href="../dashboard.php">ServerSkateboarding.Clothes</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav pull-right">
          <li>
            <a href="../pedidos/index.php" class="btn">Pedidos</a>
          </li>
          <li class="active">
            <a href="index.php" class="btn">Ropa</a>
          </li>
          <li>
            <a href="#" class="btn"><?php print $_SESSION['usuario_info']['nombre_usuario']?></a>
          </li>
          <li>
            <a href="../cerrar_session.php" class="btn">Cerrar Sesión</a>
          </li>
        </ul>




      </div><!--/.nav-collapse -->
    </div>
  </nav>



  <div class="container" id="main">

    <div class="row">
      <div class="col-md-12">
        <div class="pull-right">
          <a href="form_registrar.php" class="btn btn-primary"> <span class="glyphicon glyphicon-plus"></span>Nuevo</a>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <fieldset>Listado de Prendas</fieldset>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>#</th>
              <th>Nombre</th>
              <th>Categoría</th>
              <th>Precio</th>
              <th class="text-center">Foto</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
            //realizamos una instancia
            require '../../vendor/autoload.php';
            $ropa = new dwes\Ropa;
            //lanzamos la función mostrar del objeto ropa y recogemos la cantidad.
            $info_ropa = $ropa->mostrar();
            $cantidad = count($info_ropa);
            //Si la cantidad >0, muestrame la tabla con sus datos
            if ($cantidad > 0) {
              $c = 0; //Contador para listar.
              for ($i = 0; $i < $cantidad; $i++) {
                $c++;
                $item = $info_ropa[$i];


            ?>
                <tr>
                  <td><?php print $c   ?></td>
                  <td><?php print  $item['nombre']  ?></td>
                  <td><?php print  $item['nombre_categoria']  ?></td>
                  <td><?php print  $item['precio']  ?></td>
                  <td class="text-center">

                    <?php
                    $foto = '../../upload/' . $item['foto'];
                    if (file_exists($foto)) {
                    ?>
                      <img src="<?php print $foto ?>" width="50">
                    <?php
                    } else { ?>
                      SIN FOTO
                    <?php }

                    ?>
                  </td>
                  <td class="text-center">
                    <a href="../acciones.php?id=<?php print($item['id']) ?> " class="btn btn-danger btn-sm"> <span class="glyphicon glyphicon-trash"></span></a>
                    <a href="form_actualizar.php?id=<?php print($item['id']) ?>" class="btn btn-success btn-sm"> <span class="glyphicon glyphicon-edit"></span></a>
                  </td>
                </tr>
              <?php
              }
            } else {
              ?>
              <!-- Si no hay, muestrame esto otro. -->
              <tr>
                <td colspan="6">NO HAY REGISTROS</td>
              </tr>

            <?php } ?>

          </tbody>
        </table>
      </div>
    </div>
  </div>

  </div> <!-- /container -->


  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="../../sets/js/jquery.min.js"></script>
  <script src="../../assets/js/bootstrap.min.js"></script>

</body>

</html>