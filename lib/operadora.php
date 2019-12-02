<?php 
switch($cop):
    //Actualiza los datos de una pelicula
    case "act":
        $db->query("SELECT * FROM pelicula WHERE CodPel=".$_GET["id"]." ;");
        $preAct = $db->getObject("Pelicula");

        $tit = $_GET["tit"]==""? $preAct->getTitulo() : $_GET["tit"];
        $dur = $_GET["dur"]==""? $preAct->getDuracion() : $_GET["dur"];
        $gen = $_GET["gen"]==""? $preAct->getGenero() : $_GET["gen"];

        $db->query("UPDATE pelicula SET titulo = '".$tit."', duracion= $dur, genero='".$gen."' WHERE CodPel = ".$preAct->getCodPel().";");
    break;

    //Elimina una pelicula
    case "del":
        $db->query("DELETE FROM pelicula WHERE CodPel=$CodPel ;") ;
    break ;

    //Filtra la lista de peliculas
    case "fil":
        if($_GET["id"]){
            $id = "AND CodPel='".$_GET["id"]."'";
        }else{
            $id = "" ;
        }

        if($_GET["tit"]){
            $tit = "AND titulo LIKE'%".$_GET["tit"]."%'"?? 1 ;
        }else{
            $tit = "" ;
        }

        if($_GET["gen"]){
            $gen = "AND genero='".$_GET["gen"]."'" ?? "" ;
        }else{
            $gen = "" ;
        }
        $consulta = "SELECT * FROM pelicula WHERE 1 ".$id." ".$tit." ".$gen." ;" ;
    break ;

    //Filtra la lista de series
    case "filSal":
        if($_GET["type"]){
            $consulta .= " AND Tipo='".$_GET["type"]."'" ?? "" ;
        }
    break ;

    //Crea una emisión
    case "emi":
        $db->query("INSERT INTO emision (CodSal, CodPel, FecEmi, CodCin) VALUES (".$_GET["CodSal"].", ".$_GET["CodPel"].", CURRENT_DATE(), ".$_GET["CodCin"].");");
        $db->query("UPDATE sala SET Libre = 0 WHERE CodSal = ".$_GET["CodSal"]." ;");
    break;
    case "delEmi":
        $db->query("DELETE FROM emision WHERE CodEmi=".$_GET["CodEmi"]." ;") ;
        $db->query("UPDATE sala SET Libre = 1 WHERE CodSal = ".$_GET["CodSal"]." ;");
    break;
endswitch ;
?>