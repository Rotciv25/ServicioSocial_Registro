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
//$nick = $_POST['nick'];
//$fi=$_POST['fi'];
//$ff=$_POST['ff'];

//se buscara el id del nick
//$consultaid = "SELECT id, nombre, apaterno, amaterno FROM usuarios";

//$filaid = mysqli_fetch_assoc($resultadoid);
//$totalid = mysqli_num_rows($resultadoid);
//$id=$filaid['id'];
//$hoy=date('Y-m-d');
$hoy_fecha = date('Y-m-d', time());
$consulta = "SELECT u.nombre, u.apaterno, u.amaterno, a.entrada, a.salida from asistencia a, usuarios u where a.id=u.id and entrada>='".$hoy_fecha." 00:00:00'";

$resultado = $connect->query($consulta);
$fila = mysqli_fetch_assoc($resultado);
$total = mysqli_num_rows($resultado);
?>

<div class="container center">
  <center>
   <table id="table" class="centered">
    <thead>
      <tr>
        <th colspan="6">Lista de horas</th>
      </tr>
      </thead>
    <tbody>
    <tr>
      <td> Apellido Paterno </td>
			<td> Apellido Materno </td>
			<td> Nombre </td>
      <td>Entrada</td>
      <td>Salida</td>
     <td>Horas</td>
    </tr>

<?php if ($total>0) { ?>

     <?php do{ ?>
       <div class="detalles">
         <tr>
           <td class="titulo"><?php echo $fila['apaterno']?></td>
					 <td class="titulo"><?php echo $fila['amaterno']?></td>
					 <td class="titulo"><?php echo $fila['nombre']?></td>
            <td class="titulo"><?php echo $fila['entrada']?></td>
            <td class="titulo"><?php echo $fila['salida']?></td>
         </tr>
       </div>
     <?php } while ($fila = mysqli_fetch_assoc($resultado)); ?>
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
