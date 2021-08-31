<script>
	function lista_onchange(lst)
	{
		var i = lst.selectedIndex ;
		var t = lst.options[i].text ;
		var v = lst.options[i].value ;
		parent.document.getElementById('<?php echo $dest1; ?>').value = v ;
		parent.document.getElementById('<?php echo $dest2; ?>').value = t ;
	}
	function lista_onkeyup(lst,evt)
	{
		var tcl = (evt.which) ? evt.which : event.keyCode;
		if(tcl==13){
			lst.onchange();
			lst.ondblclick();
		}
	}
</script>
<?php if (count($busq) > 0 ): ?>
<select multiple="no" id="listaMn" size="8" onchange="lista_onchange(this)" onclick="lista_onchange(this)" style="width: 100%;">
<?php foreach($busq as $reg){ ?>
	<option value='<?php echo ($reg->codigo)."'>".($reg->nombre);?></option>
<?php } ?>	
</select>
<?php else :?>
     <h3>No hay registros</h3>
<?php endif; ?>