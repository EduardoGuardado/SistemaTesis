<form class="form" method="post" id="frm">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h3>Modificación de datos del profesional</h3>
            <div id="errors" class="alert alert-danger" role="alert" style="display:none;"></div>
            <div class="form-group">
                <label for="idpro">Código</label>
                <input type="text" class="form-control" value="<?php echo $profesional->idpro; ?>" id="idpro" name="nombre" placeholder="Código" readonly>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" value="<?php echo $profesional->nombre; ?>" id="nombre" name="nombre" placeholder="Nombre">
            </div>
            <div class="form-group">
                <label for="tituloob">Título obtenido como profesional</label>
                <input type="text" class="form-control" value="<?php echo $profesional->tituloob; ?>" id="tituloob" name="nombre" placeholder="Título obtenido">
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
                text: "¿Está seguro que desea editar el profesional?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((result) => {
                if (result) {
                    var idpro               = $('#idpro').val();
                    var nombre               = $('#nombre').val();
                    var tituloob               = $('#tituloob').val();
                    
                    var data = {idpro: idpro, nombre: nombre, tituloob: tituloob};
                    $.post('<?php echo base_url()?>index.php/ProfesionalControlador/editar/<?php echo $id;?>',data,function(response){
                        if(response == 'ok'){
                            window.location = '<?php echo base_url()?>index.php/ProfesionalControlador';
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