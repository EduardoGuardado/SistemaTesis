<form class="form" method="post" id="frm">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h3>Agregar nuevo profesional</h3>
            <div id="errors" class="alert alert-danger" role="alert" style="display:none;"></div>
            <div class="form-group">
                <label for="idpro">Código</label>
                <input type="text" class="form-control" id="idpro" name="nombre" placeholder="Código">
            </div>
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
            </div>
            <div class="form-group">
                <label for="nombre">Título obtenido</label>
                <input type="text" class="form-control" id="tituloob" name="nombre" placeholder="Título de profesional">
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
                text: "¿Está seguro que desea guardar el profesional?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((result) => {
                if (result) {
                    var idpro               = $('#idpro').val();
                    var nombre               = $('#nombre').val();
                    var tituloob               = $('#tituloob').val();
                    
                    var data = {idpro: idpro, nombre: nombre, tituloob: tituloob};
                    $.post('<?php echo base_url()?>index.php/ProfesionalControlador/insertar',data,function(response){
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