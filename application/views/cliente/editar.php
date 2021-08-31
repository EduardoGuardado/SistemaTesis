<form class="form" method="post" id="frm">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h3>Agregar cliente</h3>
            <div id="errors" class="alert alert-danger" role="alert" style="display:none;"></div>
            <div class="form-group">
                <label for="codigo">Código</label>
                <input type="text" class="form-control" value="<?php echo $cliente->codigo; ?>" id="codigo" name="nombre" placeholder="Código" readonly>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" value="<?php echo $cliente->nombre; ?>" id="nombre" name="nombre" placeholder="Nombre">
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
                text: "¿Está seguro que desea editar el cliente?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((result) => {
                if (result) {
                    var codigo               = $('#codigo').val();
                    var nombre               = $('#nombre').val();
                    
                    var data = {codigo: codigo, nombre: nombre};
                    $.post('<?php echo base_url()?>index.php/ClienteControlador/editar/<?php echo $id;?>',data,function(response){
                        if(response == 'ok'){
                            window.location = '<?php echo base_url()?>index.php/ClienteControlador';
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