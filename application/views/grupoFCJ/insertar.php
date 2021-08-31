	<script>
	   function enlazar()
		{
           ancla="enlazador";
            ifra="buscador";
            tbl = document.getElementById('tablabuscada').value;
            cmp = "nombre";
            txt = document.getElementById('buscado');
            dest1 = document.getElementById('idlocal').value;
            dest2 = document.getElementById('nombrelocal').value;
            ordn = "nombre";
            cpoid = document.getElementById('idtablabuscada').value;
            elenlace = "<?php echo base_url(); ?>index.php/generales/buscar/"+tbl+"/"+cmp+"/"+txt.value+"/"+txt.id+"/"+dest1+"/"+dest2+"/"+ifra+"/"+ordn+"/"+cpoid;
			document.getElementById(ancla).href=elenlace;
		}
		function respaldar(idlocal,nombrelocal,idtablabuscada,tablabuscada)
		{
            
            document.getElementById('idlocal').value=idlocal;
			document.getElementById('nombrelocal').value = nombrelocal;
			document.getElementById('idtablabuscada').value = idtablabuscada;
			document.getElementById('tablabuscada').value = tablabuscada;
            
	        document.getElementById('vidlocal').value=document.getElementById(idlocal).value;
            document.getElementById('vnombrelocal').value = document.getElementById(nombrelocal).value;
            
            document.getElementById("miModal").style="display:block;"
            document.getElementById("buscado").focus();
		}
		function cancelar()
		{
			idlocal=document.getElementById('idlocal').value;
			nombrelocal=document.getElementById('nombrelocal').value;
			idtablabuscada=document.getElementById('idtablabuscada').value;
			tablabuscada=document.getElementById('tablabuscada').value;
	        document.getElementById(idlocal).value=document.getElementById('vidlocal').value;
			document.getElementById(nombrelocal).value=document.getElementById('vnombrelocal').value;
			document.getElementById("miModal").style="display:none;"
		}
	</script>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<div id="miModal" style="display:none;">
	<div class="modal-contenido">
	
	    <h3 align="center">Escriba la búsqueda</h3>
	    <input type="text" id="buscado" onkeyup="enlazar()">
	    <a class="nolink" href="../buscar/tbl/cmp/txt/dst/ifr/ord" target="buscador" id="enlazador" title="Escriba una sola palabra" onclick="document.getElementById('buscador').style.display='block';return true;" onmouseover="window.status='';return true;">&nbsp;...&nbsp;</a>
	    <iframe name="buscador" src="" width="100%" id="buscador" style="border:none;"></iframe>
        <input type="hidden" id="idlocal"/>
        <input type="hidden" id="nombrelocal"/>
	    <input type="hidden" id="idtablabuscada"/>
        <input type="hidden" id="tablabuscada"/>
	    <input type="hidden" id="vidlocal"/>
        <input type="hidden" id="vnombrelocal"/>
	    <input type="hidden" id="vidtablabuscada"/>
        <input type="hidden" id="vtablabuscada"/>
	    <button onclick="document.getElementById('miModal').style='display:none;'">&nbsp;Aceptar&nbsp;</button><button onclick="cancelar();">&nbsp;Cancelar&nbsp;</button>
	</div>
</div>
<br>

<br>
<form class="form" method="post" id="frm">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h3>Agregar nuevo grupo FCJ</h3>
            <div id="errors" class="alert alert-danger" role="alert" style="display:none;"></div>
            <div class="form-group">
                <label for="idgcj">Código</label>
                <input type="text" class="form-control" id="idgcj" name="nombre" placeholder="Código">
            </div>
             <div class="form-group">
                <label for="ciclo">Ciclo</label>
                <input type="text" class="form-control" id="ciclo" name="nombre" placeholder="Ciclo">
            </div>
            <div class="form-group">
                <label for="egresado_id">Egresado</label>
                <input type="button" value="..." onclick="respaldar('egresado_id','nombreegre','idegr','egresados');">
                <input type="text" class="form-control" id="egresado_id" name="nombre" placeholder="Nombre" size=5 readonly>
                <input type="text" class="form-control" id="nombreegre" disabled>
            </div>
            <div class="form-group">
                <label for="evaluador1">Nombre Evaluador 1</label>
                <input type="button" value="..." onclick="respaldar('evaluador1','nombreeva1','idpro','profesional');">
                <input type="text" class="form-control" id="evaluador1" name="nombre" placeholder="Nombre" size=5>
                <input type="text" class="form-control" id="nombreeva1" disabled>
            </div>
            <div class="form-group">
                <label for="evaluador2">Nombre Evaluador 2</label>
                <input type="text" class="form-control" id="evaluador2" name="nombre" placeholder="Nombre">
            </div>
            <div class="form-group">
                <label for="evaluador3">Nombre de Sustituto</label>
                <input type="text" class="form-control" id="evaluador3" name="nombre" placeholder="Nombre">
            </div>
            <div class="form-group">
                <label for="fecha">Fecha</label>
                <input type="date" class="form-control" id="fecha" name="nombre" placeholder="Fecha">
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
                text: "¿Está seguro que desea guardar el grupo de Ciencias Juridicas?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((result) => {
                if (result) {
                    var idgcj               = $('#idgcj').val();
                    var ciclo               = $('#ciclo').val();
                    var egresado_id         = $('#egresado_id').val();
                    var evaluador1          = $('#evaluador1').val();
                    var evaluador2          = $('#evaluador2').val();
                    var evaluador3         = $('#evaluador3').val();
                    var fecha               = $('#fecha').val();
                    
                    var data = {idgcj: idgcj, ciclo: ciclo, egresado_id: egresado_id, evaluador1: evaluador1, evaluador2: evaluador2,
                    evaluador3: evaluador3, fecha: fecha};
                    
                    $.post('<?php echo base_url()?>index.php/GrupoFCJControlador/guardar',data,function(response){
                        if(response == 'ok'){
                            alert("Parece que se pudo");
                            window.location = '<?php echo base_url()?>index.php/GrupoFCJControlador';
                        }else{
                            alert("Huy! No se pudo");
                            $('#errors').html(response);
                            $('#errors').show();
                        }
                    });
                }
            });

            
		});
	});
</script>