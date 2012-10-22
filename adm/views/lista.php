<?
defined('BW') or die("Acesso negado!");

echo bwAdm::createHtmlSubMenu(0);
echo bwButton::redirect('Criar nova notícia', '/noticias/cadastro/0');

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
        $this->addCol('Galeria', NULL, 'tac', 100);    
        $this->addCol('Status', 'n.status', 'tac', 25);    
    }

    function col0($i)
    {
        return '<a href="' . $i->getUrl('/noticias/cadastro') . '">'.$i->id.'</a>';
    }

    function col1($i)
    {
        $src = $i->bwImagem->default->resize(100, 100);
        return sprintf('<img src="%s" />', $src);
    }

    function col2($i)
    {
        return bwUtil::data($i->datahora);
    }

    function col3($i)
    {
        return $i->titulo;
    }

    function col4($i)
    {
        return $i->Categoria->nome;
    }

    function col5($i)
    {
        return '<a href="' .$i->bwGaleria->getAdmUrl() . '">Galeria de imagens</a>';
    }

    function col6($i)
    {
        return bwAdm::getImgStatus($i->status);
    }
    
}

$a = new bwGridNoticias();
$a->show();

?>
