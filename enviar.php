<?php

// Función para evitar inyecciones
function Filtro($texto) {
  return htmlspecialchars(trim($texto), ENT_QUOTES);
}

// Variables
$directorio = 'C:/wamp/www/FormularioPHP/assets/';
$enviado = isset($_POST['enviado']) ? (int) $_POST['enviado'] : 0;
$contenido = isset($_POST['contenido']) ? (int) $_POST['contenido'] : 0;
$nombre = isset($_POST['nombre']) ? Filtro($_POST['nombre']) : '';
$apellido = isset($_POST['apellido']) ? Filtro($_POST['apellido']) : '';
$area = isset($_POST['area']) ? Filtro($_POST['area']) : '';
$direccionweb = isset($_POST['direccionweb']) ? Filtro($_POST['direccionweb']) : '';
$email_control = isset($_POST['email_control']) ? Filtro($_POST['email_control']) : '';
$sexo = isset($_POST['sexo']) ? Filtro($_POST['sexo']) : '';
$fecha = isset($_POST['fecha']) ? (int) $_POST['fecha'] : 0;
$region = isset($_POST['region']) ? Filtro($_POST['region']) : '';
$color_control = isset($_POST['color_control']) ? Filtro($_POST['color_control']) : '';

$error = '';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="description" content="Experiencia 2">
  <meta name="keywords" content="html, bootstrap, php, formulario, desarrollo, web">
  <meta name="author" content="Rodrigo Catalan">
  <title>Formulario enviado</title>
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="bower_components/bootstrap/dist/css/bootstrap-theme.min.css">
</head>
<body>
<div class="container">
  <span style="padding-top: 10px;"></span>
<?php
// Mostrar contenido
if($enviado == 1 && $contenido == 1) {
  echo '<pre>';
  print_r($_POST);
  echo '</pre>';
  exit;
} else if(empty($nombre)) {
  $error = 'Por favor, ingrese su nombre.';
} else if(empty($apellido)) {
  $error = 'Por favor, ingrese su apellido.';
} else if(empty($sexo)) {
  $error = 'Por favor, ingrese su sexo.';
} else if(empty($fecha)) {
  $error = 'Por favor, seleccione su fecha de nacimiento.';
} 

// Vista de error
if(!empty($error)) {
?>
<div class="alert alert-info">
  <i class="glyphicon glyphicon-info-sign"></i>
  <?php echo $error; ?>
</div>
<a href="./" class="btn btn-warning">
  <i class="glyphicon glyphicon-chevron-left"></i>
  Volver
</a>
<?php
// Vista de éxito
} else {
  // Subir imagen

?>
  <h3>¡Formulario enviado satisfactoriamente!</h3>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Datos enviados</h3>
    </div>
    <div class="panel-body">
      <p>Muchas Gracias<b><p></p><?php echo $nombre; ?> <?php echo $apellido; ?></b>,</p>
      <p>Region <b><?php echo $region; ?></b>,</p>
      <p> Tu sexo es: <b><?php echo ($sexo == 'm' ? 'Masculino' : 'Femenino'); ?></b></p>
      <p>
        Tu pagina personal es: <b><?php echo $direccionweb; ?></b>
      </p>
     <p>
        Tu correo es: <b><?php echo $email_control; ?></b>
      </p>
      <p>
        Tu color es: <b><?php echo $color_control; ?></b>
      </p>
    </div>
    <div class="panel-footer">
      <div class="text-right">
        <a href="./" class="btn btn-primary">
          <i class="glyphicon glyphicon-chevron-left"></i>
          Volver
        </a>
      </div>
    </div>
  </div>
<?php } ?>
  <!-- Pie de página -->
  <footer>
    <div class="text-center">
      <i class="glyphicon glyphicon-leaf"></i>
      Desarrollado por <a href="https://github.com/ShlCatalan" target="_blank">Rodrigo Catalan Lopez</a>
    </div>
  </footer>
</div>
</body>
</html>