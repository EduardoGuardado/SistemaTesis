<table class="table">
    <thead>
        <tr>
            <th>Código</th>
            <th>Nombre</th>
            <th>Título</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($ListaProfesionales as $profesional){?>
            <tr>
                <td><?php echo $profesional->idpro; ?></td>
                <td><?php echo $profesional->nombre; ?></td>
                <td><?php echo $profesional->tituloob; ?></td>
                <td class="text-right">
                    <a class="btn btn-warning btn-icon btn-sm" href="<?php echo base_url()?>index.php/ProfesionalControlador/editar/<?php echo $profesional->idpro ?>" data-toggle="tooltip" data-placement="top" title="Editar">
                        <i class="material-icons">edit</i>
                    </a>
                    <button class="btn btn-danger btn-icon btn-sm" data-eliminar="<?php echo $profesional->idpro;?>" data-toggle="tooltip" data-placement="top" title="Eliminar">
                        <i class="material-icons">delete</i>
                    </button>
                </td>
            </tr>
        <?php }?>
    </tbody>
</table>