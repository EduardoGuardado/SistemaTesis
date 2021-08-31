<table class="table">
    <thead>
        <tr>
            <th>Código</th>
            <th>Ciclo</th>
            <th>Egresado</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($ListaGruposFCJ as $grupofcj){?>
            <tr>
                <td><?php echo $grupofcj->idgcj; ?></td>
                <td><?php echo $grupofcj->ciclo; ?></td>
                <td><?php echo $grupofcj->egresado_id; ?></td>
                <td class="text-right">
                    <a class="btn btn-warning btn-icon btn-sm" href="<?php echo base_url()?>index.php/GrupoFCJControlador/editar/<?php echo $grupofcj->idgcj ?>" data-toggle="tooltip" data-placement="top" title="Editar">
                        <i class="material-icons">edit</i>
                    </a>
                    <button class="btn btn-danger btn-icon btn-sm" data-eliminar="<?php echo $grupofcj->idgcj;?>" data-toggle="tooltip" data-placement="top" title="Eliminar">
                        <i class="material-icons">delete</i>
                    </button>
                </td>
            </tr>
        <?php }?>
    </tbody>
</table>