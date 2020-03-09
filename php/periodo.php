<!DOCTYPE html>
<html>
<head><meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../css/estilosm.css">
  <script type="text/javascript" src="../js/jquery.js"></script>
  <script src="../materialize/js/materialize.min.js"></script>
	<title>Buscador</title>
  <link rel="stylesheet" href="../materialize/css/materialize.min.css" />
</head>
<body>
  <div id="container">
		<img src="../img/logoMetro.png" id="logo">
	</div>
<?php require_once('../conn/connect.php'); ?>

<?php
date_default_timezone_set('America/Mexico_City');
$nick = $_POST['nick'];
$fi=$_POST['fi'];
$ff=$_POST['ff'];

//se buscara el id del nick
$consultaid = "SELECT id, nombre, apaterno, amaterno FROM usuarios WHERE  nick = '".$nick."'";

$resultadoid = $connect->query($consultaid);
$filaid = mysqli_fetch_assoc($resultadoid);
$totalid = mysqli_num_rows($resultadoid);
$id=$filaid['id'];

$consulta = "SELECT * FROM asistencia WHERE id=".$id." AND entrada>='".$fi." 00:00:00 ' AND entrada<= '".$ff." 23:59:59'";

$resultado = $connect->query($consulta);
$fila = mysqli_fetch_assoc($resultado);
$total = mysqli_num_rows($resultado);
?>

<div class="container center">
  <center>
   <table id="table" class="centered">
    <thead>
      <tr>
        <th colspan="2">Lista de horas</th>
      </tr>
      </thead>
    <tbody>
    <tr>
      <td>Entrada</td>
      <td>Salida</td>
    </tr>

<?php if ($total>0) { ?>
     <h2>Resultados: <?php echo $total . "<br>"; ?> Usuario: <?php echo $filaid['nombre']." ".$filaid['apaterno']." ".$filaid['amaterno']; ?> </h2>
     <?php do { ?>
       <div class="detalles">
         <tr>
            <td class="titulo"><?php echo $fila['entrada']?></td>
            <td class="titulo"><?php echo $fila['salida']?></td>
         </tr>
       </div>
     <?php } while ($fila=mysqli_fetch_assoc($resultado)); ?>
<?php }
elseif ($total>0) echo '';
else echo '<h2>No se encontraron resultados.</h2>';
?>

    </tbody>
   </table>
	 <br>
	 <a href="consultas.html"><input type="button" value="Regresar"></a>
   </center>
</div>
</body>
</html>
