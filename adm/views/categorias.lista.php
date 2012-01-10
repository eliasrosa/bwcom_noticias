<?
defined('BW') or die("Acesso negado!");

echo bwAdm::createHtmlSubMenu(1);
?>

<?= bwButton::redirect('Criar nova categoria', 'adm.php?com=noticias&sub=categorias&view=cadastro'); ?>

<table id="dataTable01">
	<thead>
		<tr>
			<th class="tac" style="width: 50px;">ID</th>
			<th>Nome</th>
			<th class="tac" style="width: 25px;">Status</th>
		</tr>
	</thead>
	<tbody>
	</tbody>
</table>

<script type="text/javascript">
	$(document).ready(function() {

		oTable = $('#dataTable01').dataTable($.extend($.dataTableSettings, {
			
		// Fixbug
		aoColumnDefs: [{
			sClass: "tac", aTargets: [0, 2] 
		}],
			sAjaxSource: "<?= bwRouter::_('adm.php?com=noticias&task=categoriaLista&' .bwRequest::getToken(). '=1') ?>"
		}));
		
	});
</script>
