<?
defined('BW') or die("Acesso negado!");

bwRouter::addUrl('/noticias');
bwRouter::addUrl('/noticias/detalhes/:metatagalias', '/noticias/detalhes', array(
    ':metatagalias' => '[\w\d-]+'
));
?>