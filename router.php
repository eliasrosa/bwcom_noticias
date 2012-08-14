<?
defined('BW') or die("Acesso negado!");

// SITE
bwRouter::addUrl('/noticias');
bwRouter::addUrl('/noticias/detalhes/:alias/:id', array('fields' => array('titulo', 'id')));

// ADM
bwRouter::addUrl('/noticias/task', array('type' => 'task'));
bwRouter::addUrl('/noticias/lista');
bwRouter::addUrl('/noticias/cadastro/:id', array('fields' => array('id')));
bwRouter::addUrl('/noticias/categorias/lista');
bwRouter::addUrl('/noticias/categorias/cadastro/:id', array('fields' => array('id')));
?>