<?php

  require_once "lib/clases/Sesion.php" ;

	require_once "lib/clases/Emision.php" ;
  require_once "lib/clases/Database.php" ;
  require_once "lib/clases/genero.php" ;
  require_once "lib/clases/Cine.php" ;

  $cin = $_GET["CodCin"]??1;
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Pop! Cines</title>
  <link rel="stylesheet" href="style.css"/>
  <!--BOOTSTRAP-->    
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
</head>
<body class="bgAmarillo">
  <!--NAVBAR-->
  <nav class="navbar navbar-expand-lg navbar-light bgRojo">
    <div class="pop"></div>
  </nav>

  <!--CONTENIDO-->
  <div class="container mt-4">
    <div class="row">
      <!--BUSCADOR-->
      <div class="col-3 bgRojo mr-3 mt-3">
        <h1 class="oro text-center">Mis Cines</h1>
        <?php
          $db = Database::getInstance("root", "", "cine") ;
          if (!$db->query("SELECT * FROM cine")){
            print_r("socorro");
          }else{
            while ($item = $db->getObject("Cine")){
        ?>
        <button onclick="location.href='index.php?CodCin=<?=$item->getCodCin()?>'" type="button" class="btn btn-warning"><?= $item->getNomCin()?></button>
        <?php
            }
          }
        ?>
      </div>
      <!--PELICULAS-->
      <div class="col-8">
        <?php	
        $db = Database::getInstance("root", "", "cine") ;
        if (!$db->query("SELECT * FROM ( emision e JOIN pelicula p ON e.CodPel=p.CodPel ) JOIN sala s ON s.CodSal=e.CodSal WHERE s.CodCin=". $cin ."")){
          print_r("No se han encontrado Emisiones en la base de datos") ;
        }else{
          while ($item = $db->getObject("Emision")){
            $img = "https://image.tmdb.org/t/p/w300".$item->getPoster();
        ?>
        <div class="row pt-3 pb-3 mt-3 bgRojo">
            <div class="col-5">
              <img src="<?php echo $img ?>" alt="Poster">
            </div>
            <div class="col">
              <h1><?php echo $item->getTitulo() ?></h1>
              <h4><?= $item->getGenero() ." - ". $item->getDuracion() . " minutos"?></h4>
              <p><?= $item->getArgumento() ?></p>
            </div>
        </div>
        <?php
          } //Fin while
        } //Fin if
        ?>                    
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