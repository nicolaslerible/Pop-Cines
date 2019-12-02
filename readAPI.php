<!DOCTYPE html>
<html lang="es">
<head>
	<title>· FlixNet ·</title>
	<meta charset="utf8" />
</head>
<body>

	<?php

		//error_reporting(0) ;	// ocultar cualquier mensaje de error de PHP

		define('API_KEY', '8eb12adbd8c3ded2c9fce73d5d737772') ;

		// realizamos la primera solicitud
		// para buscar las series que están emitiéndose
        $datos  = file_get_contents("https://api.themoviedb.org/3/movie/popular?api_key=". API_KEY ."&language=es_ES&page=1") ;

		// si tengo información
		if ($datos): 

			// conectamos con la base de datos
			$sqli = new mysqli("localhost", "root", "") or die("Se ha producido un error en la conexión.") ;
			$sqli->select_db("cine") ;
			$sqli->set_charset("utf8") ;

			// convertimos el JSON a un formato manejable por PHP
			$info   = json_decode($datos) ;
			//echo "<pre>".print_r($info, true)."</pre>" ;

			foreach ($info->results as $item):

				$id    = $item->id ;
				$datos = file_get_contents("https://api.themoviedb.org/3/movie/$id?api_key=". API_KEY ."&language=es-ES") ;

				if ($datos):
					// convertimos de nuevo el JSON a un formato manejable por PHP
					$movie = json_decode($datos) ;
					//echo "<pre>".print_r($show, true)."</pre>" ;

					// guardamos los datos necesarios
					$titulo     = $movie->title ;
					$argumento  = $movie->overview ;
                    $poster       = $movie->poster_path ;
                    $duracion   = $movie->runtime+30;
					$genero     = (!empty($movie->genres))?$movie->genres[0]->name :null ;


					$sql = "INSERT INTO pelicula(titulo, argumento, poster, duracion, genero)" ;
					$sql.= "VALUES ('$titulo', '$argumento', '$poster', '$duracion', '$genero') ;" ;

					echo "Insertando $titulo....<br/>" ;
					$sqli->query($sql) ;

				else :
					echo "Sin información<br/>" ;

				endif ;

			endforeach ;

			// cerramos la conexión con la base de datos
			$sqli->close() ;

		else:
			echo "No hay información.<br/>" ;
		endif;
	?>

</body>
</html>