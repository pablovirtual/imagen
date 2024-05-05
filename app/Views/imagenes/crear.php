<?=$cabecera?>
    formulario de creación

    <?php if(session('mensaje')) { ?>

    <div class="alert alert-danger" role="alert">
        <?php
        echo session('mensaje')
        ?>
    </div>

    <?php 
    }
 ?>

<div class="card text-start">
    
    <div class="card-body">
        <h4 class="card-title">Ingresa tu imagen</h4>
        <p class="card-text">
        <form action="<?=site_url('/guardar')?>" method="POST" enctype="multipart/form-data" >
    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" value="<?=old('nombre')?>" class="form-control" id="nombre" name="nombre">
    </div>
    <br>
    <div class="form-group">
        <label for="imagen">Imagen</label>
        <input type="file" class="form-control-file" id="imagen" name="imagen">
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="<?=base_url('listar')?>" class="btn btn-info" >Cancelar</a>
        </p>
    </div>
</div>


    

<?=$piepagina?>