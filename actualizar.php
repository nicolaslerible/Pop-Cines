<?php

    require_once "lib/clases/Sesion.php" ;

	require_once "lib/clases/Pelicula.php" ;
    require_once "lib/clases/Database.php" ;
    require_once "lib/clases/Cine.php" ;
    

	$ses = Sesion::getInstance() ;

	if (!$ses->checkActiveSession())
         $ses->redirect("index.php") ;

	$db = Database::getInstance("root", "", "cine") ;
         
    $CodPel = $_GET["CodPel"]??null ;

    $cine=$ses->getAdmin()->getCodAdm();
    
    if (!$db->query("SELECT * FROM cine WHERE CodAdm=".$cine." ;")){
        mostrarAlerta("No se han encontrado series en la base de datos", "danger") ;
    }else{
        $cine = $db->getObject("Cine");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pop! Cines | Actualizar</title>
    <link rel="stylesheet" href="style.css"/>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
</head>
<body class="bgAmarillo">


    <?php
        require_once "lib/comp/redirector.php"
    ?>

    <!--LISTA-->
    <?php	
        $db = Database::getInstance("root", "", "cine") ;
        if (!$db->query("SELECT * FROM Pelicula WHERE CodPel=".$CodPel." ;")){
            mostrarAlerta("No se han encontrado series en la base de datos", "danger") ;
        }else{
    ?>
    <div class="container bgRojo p-3">
        <div class="row">
            <div class="col">
                <form class="form my-2 my-lg-0" action="/cartelera/lista.php" method="get">
                    <input type="hidden" name="cop" value="act">
                    <input type="hidden" name="id" value="<?php echo $CodPel ?>">
                    <div class="form-group">
                        <label class="oro"><b>Titulo</b></label>
                        <input name="tit" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="oro"><b>Duracion</b></label>
                        <input name="dur" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="oro"><b>Genero</b></label>
                        <select name="gen" class="form-control mr-sm-5">
                            <option value=""> - </option>
                            <option value="Comedia">Comedia</option>
                            <option value="Suspense">Suspense</option>
                            <option value="Fantasía">Fantasía</option>
                            <option value="Acción">Acción</option>
                            <option value="Animación">Animación</option>
                            <option value="Terror">Terror</option>
                            <option value="Drama">Drama</option>
                            <option value="Aventura">Aventura</option>
                            <option value="Ciencia ficción">Ciencia ficción</option>
                            <option value="Crimen">Crimen</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-warning"><b>Actualizar</b></button>
                </form>
            </div>
            <div class="col-6">
                <div class="logo"></div>
            </div>
        </div>
    </div>
    <?php
        } //Fin if
    ?>

    <?php
        require_once "lib/comp/footer.php" ;
    ?>
    
    <!--BOOTSTRAP-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>