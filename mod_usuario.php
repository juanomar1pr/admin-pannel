<?php 
	
	require('conexion.php');
	
	$errors = '';
	$resultado = 0;
	
	$permitidos = array("image/png");
	$limite_kb = 16384;
	
	
	$id=$_POST['id'];
	$usuario=$_POST['usuario'];
	$password=$_POST['password'];
	$email=$_POST['email'];
	
	$query="UPDATE usuarios SET usuario='$usuario', contrasenia='$password', email='$email' WHERE id='$id'";
	$resultado=$mysqli->query($query);
	
	if(! isset($_FILES["imagen"]) || $_FILES["imagen"]["error"] > 0){
		
		} else {
		if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024 ){
			
			$info_img = pathinfo($_FILES['imagen']['name']);
			copy($_FILES['imagen']['tmp_name'], $id.'.'.$info_img['extension']);
			} else {
			$errors = "archivo no permitido, es tipo de archivo prohibido o excede el tamano de $limite_kb Kilobytes";
		}
	}
	
?>

<html>
	<head>
		<title>Modificar usuario</title>
	</head>
	
	<body>
		<center>
			
			<?php 
				if($resultado>0){
				?>
				
				<h1>Usuario Modificado</h1>
				
					<?php 	}else{ ?>
				
				<h1><?php echo $errors; ?></h1>	
				
			<?php	} ?>
			
			<p></p>	
			
			<a href="index.php">Regresar</a>
			
		</center>
	</body>
</html>
				
				