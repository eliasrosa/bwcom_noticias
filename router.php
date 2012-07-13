<?
defined('BW') or die("Acesso negado!");

bwRouter::addUrl('/noticias');
bwRouter::addUrl('/noticias/detalhes/:alias/:id', array('titulo', 'id'));
?>