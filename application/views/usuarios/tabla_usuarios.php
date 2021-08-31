<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
			<th>Rol</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($ListaUsuarios as $usuario){?>
            <tr>
                <td><?php echo $usuario->id_usuario; ?></td>
                <td><?php echo $usuario->nombre; ?></td>
				<td><?php echo $usuario->id_rol; ?></td>
                <td class="text-right">
                    <a class="btn btn-warning btn-icon btn-sm" href="<?php echo base_url()?>index.php/ClienteControlador/editar/<?php echo $usuario->id_usuario ?>" data-toggle="tooltip" data-placement="top" title="Editar">
                        <i class="material-icons">edit</i>
                    </a>
                    <button class="btn btn-danger btn-icon btn-sm" data-eliminar="<?php echo $usuario->id_usuario;?>" data-toggle="tooltip" data-placement="top" title="Eliminar">
                        <i class="material-icons">delete</i>
                    </button>
                </td>
            </tr>
        <?php }?>
    </tbody>
</table>