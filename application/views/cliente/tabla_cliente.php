<table class="table">
    <thead>
        <tr>
            <th>Código</th>
            <th>Nombre</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($ListaClientes as $cliente){?>
            <tr>
                <td><?php echo $cliente->codigo; ?></td>
                <td><?php echo $cliente->nombre; ?></td>
                <td class="text-right">
                    <a class="btn btn-warning btn-icon btn-sm" href="<?php echo base_url()?>index.php/ClienteControlador/editar/<?php echo $cliente->codigo ?>" data-toggle="tooltip" data-placement="top" title="Editar">
                        <i class="material-icons">edit</i>
                    </a>
                    <button class="btn btn-danger btn-icon btn-sm" data-eliminar="<?php echo $cliente->codigo;?>" data-toggle="tooltip" data-placement="top" title="Eliminar">
                        <i class="material-icons">delete</i>
                    </button>
                </td>
            </tr>
        <?php }?>
    </tbody>
</table>