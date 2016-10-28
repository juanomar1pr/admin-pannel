<?php 
	
	require('conexion.php');
	
	$errors = '';
	$resultado = 0;
	
	if ( ! isset($_FILES["imagen"]) || $_FILES["imagen"]["error"] > 0){
		
		$errors = "Ha ocurrido un error";
		
		} else {
		
		$permitidos = array("image/png");
		$limite_kb = 16384;
		
		if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024){
			
			$usuario=$_POST['usuario'];
			$password=$_POST['password'];
			$email=$_POST['email'];
			$info_img = pathinfo($_FILES['imagen']['name']);
			
			$query="INSERT INTO usuarios (usuario, contrasenia, email) VALUES ('$usuario','$password','$email')";
			$resultado=$mysqli->query($query);
			$idImagen = $mysqli->insert_id;
			
			copy($_FILES['imagen']['tmp_name'], $idImagen.'.'.$info_img['extension']);
			
			} else {
			$errors = "archivo no permitido, es tipo de archivo prohibido o excede el tamano de $limite_kb Kilobytes";
		}
	}
	
?>

<html>
	<head>
		<title>Guardar usuario</title>
	</head>
	<body>
		<center>	
			
			<?php if($resultado>0){ ?>
				<h1>Usuario Guardado</h1>
				<?php }else{ ?>
				<h1><?php echo $errors; ?></h1>		
			<?php	} ?>		
			
			<p></p>	
			
			<a href="index.php">Regresar</a>
			
		</center>
		</body>
	</html>			