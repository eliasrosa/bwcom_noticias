<?
defined('BW') or die("Acesso negado!");

echo bwAdm::createHtmlSubMenu(0);

$id = bwRequest::getInt('id');
$i = bwComponent::openById('Noticia', $id);

$form = new bwForm($i, bwRouter::_('/noticias/task'));
$form->addH2('Dados da notícia');
$form->addInputID();
$form->addInputDataHora('datahora');
$form->addSelectDB('idcategoria', 'NoticiaCategoria');
$form->addInput('titulo');
$form->addStatus();

$form->addH2('Notícia resumida');
$form->addInput('titulo_resumido');
$form->addTextArea('resumo');

$form->addH2('Notícia completa');
$form->addEditorHTML('texto');

$form->addSeo();
$form->addH2('Imagem');
$form->addInputFileImg();

$form->addBottonSalvar('noticiaSave');
$form->addBottonRemover('noticiaRemover');
$form->show();
?>
