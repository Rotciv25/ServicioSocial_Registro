<?php
$errores = '';

if (isset($_POST['submit'])) {
  $nombre = $_POST['nombre'];
  $correo = $_POST['correo'];

  if(!empty($nombre)) {
    //$nombre = trim($nombre);
    //$nombre = htmlspecialchars($nombre);
    //$nombre = stripslashes($nombre);


    $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);

    echo "Tu nombre es: $nombre <br />";
  } else {
    $errores .= 'Por favor agrega un nombre';//variable errores
  }


  echo "Tu correo es: $correo";
}


 ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Document</title>
  </head>
  <body>
    <form.action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"  method="post">
    <input type="text" name="nombre:" placeholder="nombre">
    <input  type="email" name="correo" placeholder="Correo">

    <?php
if (!empty($errores)): ?>
  <div class="error"> <?php echo $errores ?> </div>
<?php endif; ?>

    <input type="submit" name="submit"
    </form>
  </body>
</html>
