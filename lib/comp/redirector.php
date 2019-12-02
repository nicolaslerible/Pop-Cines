<!--NAVBAR-->
<nav class="navbar navbar-expand-lg navbar-light bgRojo mb-4">
    <div class="pop"></div>
</nav>

<!--OPERACIONES-->
<div class="container p-3 bgRojo rounded mb-4">
    <h1 class="oro text-center"><?php echo $cine->getNomCin() ?></h1>
    <div class="row">
        <div class="col">
            <button type="button" class="btn btn-light btn-lg btn-block" onclick="location.href='emision.php'"><b>SALAS</b></button>
        </div>
        <div class="col">
            <button type="button" class="btn btn-light btn-lg btn-block" onclick="location.href='lista.php'"><b>PELÍCULAS</b></button>
        </div>
        <div class="col">
            <button type="button" class="btn btn-light btn-lg btn-block" onclick="location.href='editor.php'"><b>EMISIONES</b></button>
        </div>
    </div>
</div>