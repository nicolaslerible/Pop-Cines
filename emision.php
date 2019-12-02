<?php

    require_once "lib/clases/Sesion.php" ;

	require_once "lib/clases/Sala.php" ;
	require_once "lib/clases/Cine.php" ;
	require_once "lib/clases/Database.php" ;

    $ses = Sesion::getInstance() ;

	if (!$ses->checkActiveSession())
         $ses->redirect("index.php") ;

    $db = Database::getInstance("root", "", "cine") ;

    $cine=$ses->getAdmin()->getCodAdm();
    
    if (!$db->query("SELECT * FROM cine WHERE CodAdm=".$cine." ;")){
        mostrarAlerta("No se han encontrado series en la base de datos", "danger") ;
    }else{
        $cine = $db->getObject("Cine");
    }

    $consulta = "SELECT * FROM sala WHERE CodCin=".$cine->getCodCin()."";

    $cop = $_GET["cop"]??null ;
    require_once "lib/operadora.php";    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pop! Cines | Salas</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css"/>
</head>
<body class="bgAmarillo">
    <?php
        require_once "lib/comp/redirector.php"
    ?>

    <div class="container bg-light">
        <div class="row bgRojo justify-content-center"><h1 class="oro">SALAS</h1></div>
        <div class="row justify-content-center mt-3">  
        </div>
        <div class="row">
            <div class="col">
                <table class="table m-3">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">boton</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php	
                        $db = Database::getInstance("root", "", "cine") ;
                        if (!$db->query($consulta)){
                            print_r("Error en la consulta");
                        }else{
                            while ($item = $db->getObject("Sala")){
                                $estado = $item->getLibre()? "" : "disabled" ;
                        ?>
                        <tr>
                            <th scope="row"><?= $item->getCodSal() ?></th>
                            <td><?= $item->getTipo() ?></td>
                            <td><button onclick="location.href='selec.php?CodSal=<?=$item->getCodSal()?>'" type="button" class="btn btn-lg btn-warning" <?php echo $estado ?>>Seleccionar</button></td>
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

    <!--BOOTSTRAP-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>