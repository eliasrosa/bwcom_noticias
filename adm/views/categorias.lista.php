<?
defined('BW') or die("Acesso negado!");

echo bwAdm::createHtmlSubMenu(1);
echo bwButton::redirect('Criar nova categoria', 'adm.php?com=noticias&sub=categorias&view=cadastro');

class bwGridNoticiasCategorias extends bwGrid
{
    function __construct()
    {
        parent::__construct(
            Doctrine_Query::create()
                ->from('NoticiaCategoria c')       
        );
        
        $this->addCol('ID', 'c.id', 'tac', 50);
        $this->addCol('Categoria', 'c.nome', NULL);
        $this->addCol('Status', 'c.status', 'tac', 25);    
    }

    function col0($i)
    {
        return '<a href="' . bwRouter::_('adm.php?com=noticias&sub=categorias&view=cadastro&id=' . $i->id) . '">'.$i->id.'</a>';
    }

    function col1($i)
    {
        return '<a href="' . bwRouter::_('adm.php?com=noticias&sub=categorias&view=cadastro&id=' . $i->id) . '">'.$i->nome.'</a>';
    }

    function col2($i)
    {
        return bwAdm::getImgStatus($i->status);
    }
    
}

$a = new bwGridNoticiasCategorias();
$a->show();
