<?
defined('BW') or die("Acesso negado!");

$dados = bwRequest::getVar('dados', array(), 'post');


// NOTÍCIAS
/////////////////////////////////////////////////////////////

if ($task == 'noticiaSave')
{
    $r = Noticia::salvar($dados);        
}

if ($task == 'noticiaRemover')
{
    $r = Noticia::remover($dados);
    $r['redirect'] = bwRouter::_("adm.php?com=noticias&view=lista");
}




// CATEGORIAS
/////////////////////////////////////////////////////////////

if ($task == 'categoriaSave')
{
    $r = NoticiaCategoria::salvar($dados);
}

if ($task == 'categoriaRemover')
{
    $r = NoticiaCategoria::remover($dados);
    $r['redirect'] = bwRouter::_("adm.php?com=noticias&sub=categorias&view=lista");
}

die(json_encode($r));
?>
