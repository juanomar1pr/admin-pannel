<html>
	<head>
		<title>Usuarios</title>
	</head>
	<body>
		
		<center><h1>Nuevo Usuario</h1></center>
		
		<form name="nuevo_usuario" method="POST" action="guarda_usuario.php" enctype="multipart/form-data" >
			<table width="50%">
				<tr>
					<td width="20"><b>Usuario</b></td>
					<td width="30"><input type="text" name="usuario" size="25" /></td>
				</tr>
				<tr>
					<td><b>Password</b></td>
					<td><input type="password" name="password" size="25" /></td>
				</tr>
				<tr>
					<td><b>Email</b></td>
					<td><input type="text" name="email" size="25" /></td>
				</tr>
				<tr>
					<td><b>Imagen</b></td>
					<td><input type="file" name="imagen" id="imagen" accept="image/png" /></td>
				</tr>
				<tr>
					<td colspan="2"><center><input type="submit" name="eviar" value="Registrar" /></center></td>
				</tr>
			</table>
		</form>
	</body>
</html>						