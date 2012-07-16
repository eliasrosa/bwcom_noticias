<?
defined('BW') or die("Acesso negado!");
$task = bwRequest::getVar('task');


// NOTÍCIAS
/////////////////////////////////////////////////////////////

if ($task == 'noticiaSave')
{
    $r = Noticia::salvar(bwRequest::getVar('dados', array()));        
}

if ($task == 'noticiaRemover')
{
    $r = Noticia::remover(bwRequest::getVar('dados', array()));
    $r['redirect'] = bwRouter::_("/noticias/lista");
}




// CATEGORIAS
/////////////////////////////////////////////////////////////

if ($task == 'categoriaSave')
{
    $r = NoticiaCategoria::salvar(bwRequest::getVar('dados', array()));
}

if ($task == 'categoriaRemover')
{
    $r = NoticiaCategoria::remover(bwRequest::getVar('dados', array()));
    $r['redirect'] = bwRouter::_("/noticias/categorias/lista");
}

die(json_encode($r));
?>
