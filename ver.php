<?php
	
	require('conexion.php');
	
	$id=$_GET['id'];
	
	$query="SELECT usuario, contrasenia, email FROM usuarios WHERE id='$id'";
	
	$resultado=$mysqli->query($query);
	
	$row=$resultado->fetch_assoc();
	
?>

<html>
	<head>
		<title>Usuarios</title>
	</head>
	<body>
		
		<center><h1>Usuario</h1></center>
		
			<table width="50%">
				<tr>
					<input type="hidden" name="id" value="<?php echo $id; ?>">
					<td width="20"><b>Usuario</b></td>
					<td width="30"><?php echo $row['usuario']; ?></td>
				</tr>	

				<tr>
					<td><b>Email</b></td>
					<td><?php echo $row['email']; ?></td>
				</tr>
				
				<tr>
					<td><b>Imagen</b></td>
					<td><?php if (file_exists($id.'.png')) { ?><img src="<?php echo $id.'.png'; ?>" width="200" /><?php } ?></td>
				</tr>
			</table>
			<a href="index.php">Regresar</a>
	</body>
</html>	
