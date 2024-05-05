<?=$cabecera?>
<a class="btn btn-success" href="<?=base_url('crear')?>">Crear imagen</a>
<br>
<br>
        <div
            class="table-responsive"
        >
            <table
                class="table table-light table-striped table-hover"
            >
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Nombre de imagen</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach($imagenes as $imagen): ?> 

                    <tr>
                        <td><?=$imagen['id'];?></td>

                        <td>
                            <img class="img-thumbnail img-fluid"
                                src="<?=base_url('uploads/'.$imagen['imagen'])?>"
                                width="100"
                                alt=""
                            >
                        <td><?=$imagen['imagen'];?></td>
                        <td><?=$imagen['nombre'];?></td>
                        <td>
                            <a href="<?=base_url('editar/'.$imagen['id'])?>" class="btn btn-primary" >Editar</a>
                            <a href="<?=base_url('eliminar/'.$imagen['id'])?>" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            
            </table>
        </div>
        
<?=$piepagina?>
