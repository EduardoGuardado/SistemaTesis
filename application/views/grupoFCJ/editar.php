<form class="form" method="post" id="frm">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h3>Actualización de datos grupos de Facultad Ciencias Juridicas</h3>
            <div id="errors" class="alert alert-danger" role="alert" style="display:none;"></div>
            <div class="form-group">
                <label for="idgcj">Código</label>
                <input type="text" class="form-control" value="<?php echo $grupofcj->idgcj; ?>" id="idgcj" name="idgcj" placeholder="Código" readonly>
            </div>
            <div class="form-group">
                <label for="ciclo">Ciclo</label>
                <input type="text" class="form-control" value="<?php echo $grupofcj->ciclo; ?>" id="ciclo" name="ciclo" placeholder="Ciclo">
            </div>
            <div class="form-group">
                <label for="evaluador1">Nombre Ev1</label>
                <input type="text" class="form-control" value="<?php echo $grupofcj->evaluador1; ?>" id="evaluador1" name="evaluador1" placeholder="Nombre">
            </div>
            <div class="form-group">
                <label for="evaluador2">Nombre Ev2</label>
                <input type="text" class="form-control" value="<?php echo $grupofcj->evaluador2; ?>" id="evaluador2" name="evaluador2" placeholder="Nombre">
            </div>
            <div class="form-group">
                <label for="sustitucion">Nombre de Sustituto</label>
                <input type="text" class="form-control" value="<?php echo $grupofcj->sustitucion; ?>" id="sustitucion" name="sustitucion" placeholder="Nombre">
            </div>
            <div class="form-group">
                <label for="fecha">Fecha</label>
                <input type="date" class="form-control" value="<?php echo $grupofcj->fecha; ?>" id="fecha" name="fecha" placeholder="Fecha">
            </div>
        </div>
        <div class="col-md-8 offset-md-2 text-right">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </div>
</form>

<script type="text/javascript">
	$(function(){
		$('#frm').submit(function(e){
			e.preventDefault();
            $('#errors').hide();
            
            swal({
                title: "Guardar",
                text: "¿Está seguro que desea editar el grupoFCJ?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((result) => {
                if (result) {
                    var idgcj               = $('#idgcj').val();
                    var ciclo               = $('#ciclo').val();
                    var evaluador1          = $('#evaluador1').val();
                    var evaluador2          = $('#evaluador2').val();
                    var sustitucion         = $('#sustitucion').val();
                    var fecha               = $('#fecha').val();;
                    
                    var data = {idgcj: idgcj, ciclo: ciclo, evaluador1: evaluador1, evaluador2: evaluador2,
                    sustitucion: sustitucion, fecha: fecha};
                    $.post('<?php echo base_url()?>index.php/grupoFCJControlador/editar/<?php echo $id;?>',data,function(response){
                        if(response == 'ok'){
                            window.location = '<?php echo base_url()?>index.php/grupoFCJControlador';
                        }else{
                            $('#errors').html(response);
                            $('#errors').show();
                        }
                    });
                }
            });

            
		});
	});
</script>