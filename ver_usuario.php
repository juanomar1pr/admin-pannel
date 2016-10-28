<?php
	require('conexion.php');
	
	$usuario = $_POST['usuario'];
	
	$query="SELECT id, usuario, email FROM usuarios WHERE email LIKE '%$usuario%'";
	
	$resultado=$mysqli->query($query);
	
	$rows = $resultado->num_rows;
	
?>

<html>
	<head>
		<title>Usuarios</title>
	</head>
	<body>
		
		<center><h1>Usuarios</h1></center>
		
		<a href="nuevo.php">Nuevo usuario</a>
		<p></p>
		<a href="buscar.php">Buscar usuario</a>
		<p></p>
		<a href="index.php">Inicio</a>
		<p></p>
		
		<?php if($rows > 0) { ?>
		
		<table border=1 width="80%">
			<thead>
				<tr>
					<td><b>Usuario</b></td>
					<td><b>Email</b></td>
					<td></td>
					<td></td>
				</tr>
				<tbody>
					<?php while($row=$resultado->fetch_assoc()){ ?>
						<tr>
							<td><?php echo $row['usuario'];?>
							</td>
							<td>
								<?php echo $row['email'];?>
							</td>
							<td>
								<a href="modificar.php?id=<?php echo $row['id'];?>">Modificar</a>
							</td>
							<td>
								<a href="eliminar.php?id=<?php echo $row['id'];?>">Eliminar</a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
			
		<?php } else { ?>
		<h1>No se encontraron usuarios</h1>
		<?php } ?>
		</body>
	</html>	
	
