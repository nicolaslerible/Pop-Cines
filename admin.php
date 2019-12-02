<?php

	require_once "lib/clases/Sesion.php" ;

	$ses = Sesion::getInstance() ;

	if ($ses->checkActiveSession())
		$ses->redirect("emision.php") ;

	if (!empty($_POST)):

		$nom = $_POST["nombre"] ;
		$pass  = $_POST["pass"] ;

		$existe  = $ses->login($nom, $pass) ;

		if ($existe) $ses->redirect("emision.php") ;

	endif ;

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Pop! Cines | Administracion</title>
	<meta charset="utf8" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
</head>
<body class="bgAmarillo">

	<div class="container bgRojo">

		<!-- formulario de login -->
		<form method="post">

			<!-- nombre -->
			<div class="row mt-5 form-group">
				<div class="col-md-12">
					<input class="form-control w-25 mx-auto" type="text" 
						   name="nombre" placeholder="Administrador" required />
				</div>
			</div>

			<!-- contraseña -->
			<div class="row form-group">
				<div class="col-md-12">
					<input class="form-control w-25 mx-auto" type="text" 
						   name="pass" placeholder="contraseña" required />
				</div>
			</div>

			<?php
				if ((isset($existe)) && (!$existe)):
			?>
			<div class="row">
				<div class="col-md-12 text-center">
					<div class="alert alert-danger w-50" role="alert">
					  Nombre o contraseña incorrectas.
					</div>
				</div>
			</div>
			<?php
				endif ;
			?>

			<!-- botón LOGIN -->
			<div class="row form-group">
				<div class="col-md-12 text-center">
					<button class="btn btn-warning w-25" type="submit">Entrar</button>
				</div>
			</div>

		</form>

	</div> <!-- container -->

	<?php
  		require_once "lib/comp/footer.php" ;
  	?>

</body>
</html>