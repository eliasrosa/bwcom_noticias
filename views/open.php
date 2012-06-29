<?

defined('BW') or die("Acesso negado!");

$id = bwRequest::getInt('id', 0);

$t = Doctrine_Query::create()
                ->from('Noticia n')
                ->where('n.id = ? AND n.status = 1', $id)
                ->fetchOne();

if ($t)
{
    echo '<h1>Notícias</h1>';
    echo '<h2>' . $t->titulo . '</h2>';
    echo '<p class="data">' . $t->datahora . '</p>';

    if (!$t->bwImagem->isError404())
    {
        echo '<div class="imagem">';
        echo "<img src=\"{$t->bwImagem->getUrl()}\" width=\"250\" height=\"250\" />";
        echo '<a rel="lightbox" width="650" height="450" href="' . $t->bwImagem->getUrl() . '"><span>Ampliar imagem</span></a></div>';
    }


    echo '<div class="texto html">';
    echo $t->texto;
    echo "</div>";

    $noticias = Doctrine_Query::create()
                    ->from('Noticia n')
                    ->where('n.id != ? AND n.status = 1 AND n.idcategoria = ?', array($id, $t->idcategoria))
                    ->orderBy('n.datahora DESC')
                    ->limit(5)
                    ->execute();

    if ($noticias->count())
    {
        echo '<br class="clear"/>';
        echo '<div class="mais">';
        echo '<h1>Mais notícias sobre ' . $t->Categoria->nome . '</h1>';
        echo "<ul>";

        $itemid = bwRequest::getVar('itemid');
        foreach ($noticias as $i)
        {
            if ($i->id != $id)
            {
                echo '<li><span class="data">' . $i->datahora . ' - </span><a href="' . bwRouter::_("index.php?com=noticias&view=open&itemid=$itemid&id={$i->id}&alias=" . bwUtil::alias($i->titulo)) . '">' . $i->titulo . '</a></li>';
            }
        }

        echo '</ul>';
        echo '</div>';
    }
}
else
{
    bwError::header404();
    echo '<h1>Notícias</h1>';
    echo '<p>Nenhuma notícia foi encontrada!</p>';
}
?>
