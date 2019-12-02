<?php

    require_once "lib/clases/Sesion.php" ;

	require_once "lib/clases/Pelicula.php" ;
    require_once "lib/clases/Database.php" ;
    require_once "lib/clases/genero.php" ;
	require_once "lib/clases/Cine.php" ;

    

	$ses = Sesion::getInstance() ;

	if (!$ses->checkActiveSession())
         $ses->redirect("index.php") ;

    $db = Database::getInstance("root", "", "cine") ;

    $filTit = $_GET["tit"]??null ;
    $filGen = $_GET["gen"]??null ;
         
    $CodPel = $_GET["CodPel"]??null ;

    $cop = $_GET["cop"]??null ;

    $cine=$ses->getAdmin()->getCodAdm();
    
    if (!$db->query("SELECT * FROM cine WHERE CodAdm=".$cine." ;")){
        mostrarAlerta("No se han encontrado series en la base de datos", "danger") ;
    }else{
        $cine = $db->getObject("Cine");
    }

    $consulta = "SELECT * FROM pelicula ;" ;

    require_once "lib/operadora.php";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pop! Cines | Películas</title>
    <link rel="stylesheet" href="style.css"/>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
</head>
<body class="bgAmarillo">

    <?php
        require_once "lib/comp/redirector.php"
    ?>

    <!--LISTA-->
    <div class="container p-3">
        <div class="row bgRojo p-3 justify-content-center">
            <form class="form-inline my-2 my-lg-0" action="/cartelera/lista.php" method="get">
        <?php require_once "lib/comp/form/filtroPel.php"; ?>
        <div class="row bg-light">
            <table class="table m-3">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Duración</th>
                        <th scope="col">Genero</th>
                        <th class="text-center" colspan="2" style="width: 5%" scope="col"><b>Botones</b></th>
                    </tr>
                </thead>
                <tbody>
                    <?php	
                    $db = Database::getInstance("root", "", "cine") ;
                    if (!$db->query($consulta)){
                        print_r("No se han encontrado series en la base de datos") ;
                    }else{

                        while ($item = $db->getObject("Pelicula")){
                            //$a = "https://image.tmdb.org/t/p/w500".$item->getFoto();
                    ?>
                    <tr>
                        <th scope="row"><?= $item->getCodPel() ?></th>
                        <td><?= $item->getTitulo() ?></td>
                        <td><?= $item->getDuracion() ?></td>
                        <td><?= $item->getGenero() ?></td>
                        <td><button onclick="location.href='actualizar.php?CodPel=<?=$item->getCodPel()?>'" type="button" class="btn btn-warning">Act</button></td>
                        <td><button onclick="location.href='lista.php?cop=del&CodPel=<?=$item->getCodPel()?>'" type="button" class="btn btn-danger">Eli</button></td>
                    </tr>

                    <?php
                        } //Fin while

                    } //Fin if
                    ?>                    
                </tbody>
            </table>
        </div>
    </div>

    <?php
        require_once "lib/comp/footer.php" ;
    ?>

    <!--BOOTSTRAP-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>