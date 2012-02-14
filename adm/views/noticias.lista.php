<?
defined('BW') or die("Acesso negado!");

echo bwAdm::createHtmlSubMenu(0);
echo bwButton::redirect('Criar nova notícia', 'adm.php?com=noticias&view=cadastro');

class bwGridNoticias extends bwGrid
{
    function __construct()
    {
        parent::__construct(
            Doctrine_Query::create()
                ->from('Noticia n')
                ->leftJoin('n.Categoria c')        
        );
        
        $this->addCol('ID', 'n.id', 'tac', 50);
        $this->addCol('Imagem', NULL, 'tac', 100);
        $this->addCol('Data/Hora', 'n.datahora', 'tac', 100);
        $this->addCol('Título', 'n.titulo');
        $this->addCol('Categoria', 'c.nome', 'tac', 150);
        $this->addCol('Status', 'n.status', 'tac', 25);    
    }

    function col0($i)
    {
        return '<a href="' . bwRouter::_('adm.php?com=noticias&view=cadastro&id=' . $i->id) . '">'.$i->id.'</a>';
    }

    function col1($i)
    {
        $src = $i->bwImagem->getUrlResize('width=100&height=100');
        return sprintf('<img src="%s" />', $src);
    }

    function col2($i)
    {
        return bwUtil::data($i->datahora);
    }

    function col3($i)
    {
        return '<a href="' . bwRouter::_('adm.php?com=noticias&view=cadastro&id=' . $i->id) . '">'.$i->titulo.'</a>';
    }

    function col4($i)
    {
        return '<a href="' . bwRouter::_('adm.php?com=noticias&view=cadastro&id=' . $i->Categoria->id) . '">'.$i->Categoria->nome.'</a>';
    }

    function col5($i)
    {
        return bwAdm::getImgStatus($i->status);
    }
    
}

$a = new bwGridNoticias();
$a->show();

?>
