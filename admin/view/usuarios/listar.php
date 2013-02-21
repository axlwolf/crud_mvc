
<?
loadCSS('demo_page', NULL, false);
loadCSS('demo_table',NULL, false);
loadJS('jquery.dataTables.min');
?>
<script type="text/javascript">
	$(document).ready(function(){
		$("#table1").dataTable({
			"oLanguage": {
			    "sProcessing":   "Processando...",
			    "sLengthMenu":   "Mostrar _MENU_ registros",
			    "sZeroRecords":  "Não foram encontrados resultados",
			    "sInfo":         "Mostrando de _START_ até _END_ de _TOTAL_ registros",
			    "sInfoEmpty":    "Mostrando de 0 até 0 de 0 registros",
			    "sInfoFiltered": "(filtrado de _MAX_ registros no total)",
			    "sInfoPostFix":  "",
			    "sSearch":       "Buscar:",
			    "sUrl":          "",
			    "oPaginate": {
			        "sFirst":    "Primeiro",
			        "sPrevious": "Anterior",
			        "sNext":     "Seguinte",
			        "sLast":     "último"
			    }
			}
		});
	});
</script>
<div id="menu">
	<? loadmenu("menu_usuario")?>	
</div>
<div id="conteudo">
	<div class="titulo_table">Usuários</div>
	

<table  cellpadding="0" cellspacing="0" border="0" class="display" id="table1">
	<thead>
		<tr>
			<th>Nome</th>
			<th>E-Mail</th>
			<th>CPF</Th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?foreach($Usuario->RetornaDados() as $campo):?>	
		<tr>
			<td><?= $campo['nome']?></td>
			<td><?= $campo['email']?></td>
			<td><?= $campo['cpf']?></td>
			<th>
				<a href="<?= ADMURL. "usuarios/del/".$campo['id']?>" class="ico-cancel-1" title="Apagar"></a>
				<a href="<?= ADMURL. "usuarios/editar/".$campo['id']?>" class="ico-arrows-cw" title="Atualizar"></a>
				
			</th>	
		</tr>
		<?endforeach;?>
	</tbody>
</table>
</div>
