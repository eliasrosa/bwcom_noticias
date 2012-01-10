<?
defined('BW') or die("Acesso negado!");

$dados = bwRequest::getVar('dados', array(), 'post');


// NOTÍCIAS
/////////////////////////////////////////////////////////////

if ($task == 'noticiaLista')
{
    $r = bwNoticias::getInstance()->noticiaLista();		
}

if ($task == 'noticiaSave')
{
    $r = bwNoticias::getInstance()->noticiaSave($dados);		
}

if ($task == 'noticiaRemover')
{
    $r = bwNoticias::getInstance()->noticiaRemover($dados);
    $r['redirect'] = bwRouter::_("adm.php?com=noticias&view=lista");
}




// CATEGORIAS
/////////////////////////////////////////////////////////////

if ($task == 'categoriaLista')
{
    $r = bwNoticias::getInstance()->categoriaLista();
}

if ($task == 'categoriaSave')
{
    $r = bwNoticias::getInstance()->categoriaSave($dados);
}

if ($task == 'categoriaRemover')
{
    $r = bwNoticias::getInstance()->categoriaRemover($dados);
    $r['redirect'] = bwRouter::_("adm.php?com=noticias&sub=categorias&view=lista");
}

die(json_encode($r));
?>
