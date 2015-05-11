<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="description" content="insertar usuarios">
		<meta content="width=device-width, initial-scale=1, minimum-scale=1" name="viewport">
		<title>Insertar usuario</title>
		<!-- <link href="movil.css" rel="stylesheet" media="all and (min-width:0px) and (max-width: 480px)" />
		<link href="tablet.css" rel="stylesheet" media="all and (min-width: 481px) and (max-width: 800px)" />
		<link href="escritorio.css" rel="stylesheet" media="all and (min-width: 801px)" /> -->
	</head>
	<body>
		<section id="userform">
<?php
	if (isset($_REQUEST['insertar']))
	{
		$insertar = $_REQUEST['insertar'];
		$usuario = $_REQUEST['usuario'];
		$clave = $_REQUEST['clave'];
		$correo = $_REQUEST['correo'];
		$servername = "localhost";
		$username = "usuariocliente";
		$password = "";
		$dbname = "clientes";
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn)
		{
			die("Connection failed: " . mysqli_connect_error());
		}
		$sql = "INSERT INTO clientes (usuario, clave, correo) values ('$usuario', '$clave', '$correo')";
		if (mysqli_query($conn, $sql))
		{
			echo "Usuario creado satisfactoriamente";
		}
		else
		{
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
		print ("<p><a href='test.html'>Volver a la pagina anterior</a></p>\n");
	}
	else
	{
?>
			<h1>Registrarse:</h1>
			<form action="insertar_usuario.php" name="insertar" method="post">
				<p class="field">Usuario:&nbsp;<input type="text" name="usuario" size="10" maxlength="10"></p>
				<p class="field">Clave:&nbsp;<input type="password" name="clave" id="pword" size="10" maxlength="10"></p>
				<p class="field">Correo:&nbsp;<input type="email" name="correo"></p>
				<p class="field"><input type="submit" name="insertar" value="Registrarse"></p>
			</form>
			<p>Nota: Todos los datos son obligatorios</p>
			<p><a href="../test.html">Volver a la pagina anterior</a></p>
<?php
	}
?>
		</section>
	</body>
</html>