<?
defined('BW') or die("Acesso negado!");

echo bwAdm::createHtmlSubMenu(1);

$id = bwRequest::getInt('id');
$i = bwComponent::openById('NoticiaCategoria', $id);

$form = new bwForm($i, bwRouter::_('/noticias/task'));
$form->addH2('Dados da categoria');
$form->addInputID();
$form->addInput('nome');
$form->addTextArea('descricao');
$form->addStatus();

$form->addSeo();

$form->addBottonSalvar('categoriaSave');
$form->addBottonRemover('categoriaRemover');
$form->show();

?>
