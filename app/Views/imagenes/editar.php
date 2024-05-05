<?=$cabecera?>


<div class="card text-start">
    <div class="card-body">
        <h4 class="card-title">Ingresa tu imagen</h4>
        <p class="card-text">
        <form action="<?=site_url('/actualizar')?>" method="POST" enctype="multipart/form-data" >
    <input type="hidden" name="id" value="<?=$imagen['id']?>">
    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text"  value="<?=$imagen['nombre']?>" class="form-control" id="nombre" name="nombre">
    </div>
    <br>
    <div class="form-group">
        <label for="imagen">Imagen</label>
        <br>
        <img class="img-thumbnail img-fluid"
            src="<?=base_url('uploads/'.$imagen['imagen'])?>"
            width="100"
            alt="">
        <br>
        <br>
        <input type="file" class="form-control-file" id="imagen" name="imagen">
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="<?=base_url('listar')?>" class="btn btn-info" >Cancelar</a>
        </p>
    </div>
</div>
<?=$piepagina?>