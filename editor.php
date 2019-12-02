<?php

    require_once "lib/clases/Sesion.php" ;

	require_once "lib/clases/Emision.php" ;
    require_once "lib/clases/Database.php" ;
    require_once "lib/clases/genero.php" ;
    require_once "lib/clases/Cine.php" ;
    

	$ses = Sesion::getInstance() ;

	if (!$ses->checkActiveSession())
         $ses->redirect("index.php") ;

    $db = Database::getInstance("root", "", "cine") ;

    $cop = $_GET["cop"]??null ;
    $CodEmi = $_GET["CodEmi"]??null ;
    $CodSal = $_GET["CodSal"]??null ;

    $db = Database::getInstance("root", "", "cine") ;

    $cine=$ses->getAdmin()->getCodAdm();
    
    if (!$db->query("SELECT * FROM cine WHERE CodAdm=".$cine." ;")){
        mostrarAlerta("No se han encontrado series en la base de datos", "danger") ;
    }else{
        $cine = $db->getObject("Cine");
    }

    $consulta = "SELECT * FROM emision WHERE CodCin=\"". $cine->getCodCin() ."\";" ;

    require_once "lib/operadora.php";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pop! Cines | Emisiones</title>
    <link rel="stylesheet" href="style.css"/>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
</head>
<body class="bgAmarillo">

    <?php
        require_once "lib/comp/redirector.php"
    ?>

    <!--LISTA-->
    <div class="container p-3">
        <div class="row bgRojo justify-content-center"><h1 class="oro">EMISIONES</h1></div>
        <div class="row bg-light">
            <div class="col">
                <table class="table m-3">
                    <thead>
                        <tr>
                            <th scope="col">Pelicula</th>
                            <th scope="col">Sala</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php	
                        $db = Database::getInstance("root", "", "cine") ;
                        if (!$db->query($consulta)){
                            ?>
                            <div class="alert alert-danger mt-3 ml-4 text-center" role="alert"><b>Actualmente no existe ninguna emisión</b></div>
                            <?php
                        }else{

                            while ($item = $db->getObject("Emision")){
                                //$a = "https://image.tmdb.org/t/p/w500".$item->getFoto();
                        ?>
                        <tr>
                            <th scope="row"><?= $item->getCodPel() ?></th>
                            <td><?= $item->getCodSal() ?></td>
                            <td><button onclick="location.href='editor.php?cop=delEmi&CodEmi=<?=$item->getCodEmi()?>&CodSal=<?=$item->getCodSal()?>'" type="button" class="btn btn-danger">Eliminar Emision</button></td>
                        </tr>

                        <?php
                            } //Fin while

                        } //Fin if
                        ?>                    
                    </tbody>
                </table>
            </div>
            <div class="col">
                <div class="logo"></div>
            </div>
        </div>
    </div>

    <?php
        require_once "lib/comp/footer.php" ;
    ?>