        <input type="hidden" name="cop" value="fil">
        <input name="id" class="form-control mr-sm-5" type="search" placeholder="ID" aria-label="Search">
        <input name="tit" class="form-control mr-sm-5" type="search" placeholder="TITULO" value="<?php echo $filTit ?>" aria-label="Search">
        <select name="gen" class="form-control mr-sm-5" value="<?php echo $filGen ?>">
            <option value=""> - </option>
            <?php
            if (!$db->query("SELECT * FROM genero")){
                print_r("No se han encontrado peliculas en la base de datos");
            }else{
                while ($gender = $db->getObject("Genero")){        
                    $selected = $filGen==$gender->getNomGen()?"selected":"" ;
                    echo "<option value=\"".$gender->getNomGen()."\" $selected>".$gender->getNomGen()."</option>" ;
                }
            }
            ?> 
        </select>
        <button  class="btn btn-outline-warning my-2 my-sm-0" type="submit">Filtrar</button>
    </form>
</div>