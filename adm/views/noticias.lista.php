<?
defined('BW') or die("Acesso negado!");

echo bwAdm::createHtmlSubMenu(0);

?>

<?= bwButton::redirect('Criar nova notícia', 'adm.php?com=noticias&view=cadastro'); ?>

<table id="dataTable01">
	<thead>
		<tr>
			<th class="tac" style="width: 50px;">ID</th>
			<th class="tac" style="width: 70px;">Data</th>
			<th>Título</th>
			<th class="tac" style="width: 150px;">Categoria</th>
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
			sClass: "tac", aTargets: [0, 1, 3, 4] 
		}],
			sAjaxSource: "<?= bwRouter::_('adm.php?com=noticias&task=noticiaLista&' .bwRequest::getToken(). '=1') ?>"
		}));
		
	});
</script>
