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

    $filId = $_GET["id"]??null;
    $filTit = $_GET["tit"]??null ;
    $filGen = $_GET["gen"]??null ;
         
    $CodPel = $_GET["CodPel"]??null ;

    $cop = $_GET["cop"]??null ;

    $db = Database::getInstance("root", "", "cine") ;

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
    <title>Pop! Cines | Peliculas</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css"/>
</head>
<body class="bgAmarillo">

    <?php
        require_once "lib/comp/redirector.php"
    ?>

    <!--LISTA-->
    <div class="container p-3">
        <div class="row bgRojo p-3 justify-content-center">
            <form class="form-inline my-2 my-lg-0" action="/cartelera/selec.php" method="get">
            <input type="hidden" name="CodSal" value="<?= $_GET['CodSal'] ?>">
        <?php require_once "lib/comp/form/filtroPel.php"; ?>
        <div class="row bg-light">
            <table class="table m-3">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Duración</th>
                        <th scope="col">Genero</th>
                        <th scope="col">Añadir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php	
                    $db = Database::getInstance("root", "", "cine") ;
                    if (!$db->query($consulta)){
                        print_r("No se han encontrado series en la base de datos") ;
                    }else{

                        while ($item = $db->getObject("Pelicula")){
                    ?>
                    <tr>
                        <th scope="row"><?= $item->getCodPel() ?></th>
                        <td><?= $item->getTitulo() ?></td>
                        <td><?= $item->getDuracion() ?></td>
                        <td><?= $item->getGenero() ?></td>
                        <td><button onclick="location.href='emision.php?cop=emi&CodSal=<?= $_GET['CodSal'] ?>&CodPel=<?=$item->getCodPel()?>&CodCin=<?=$cine->getCodCin()?>'" type="button" class="btn btn-warning">Añadir</button></td>
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