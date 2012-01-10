<?
defined('BW') or die("Acesso negado!");

$tituloPage = "Administração de Notícias";

$menu = array(
    '0' => array(
        'url' => 'adm.php?com=noticias&view=lista',
        'tit' => 'Notícias'
    ),
    '1' => array(
        'url' => 'adm.php?com=noticias&sub=categorias&view=lista',
        'tit' => 'Categorias'
    )
);

?>
