<?

defined('BW') or die("Acesso negado!");

class bwNoticias extends bwComponent
{
    // variaveis obrigatórias
    var $id = 'noticias';
    var $nome = 'Notícias';
    var $adm_url_default = 'adm.php?com=noticias&view=lista';
    var $adm_visivel = true;
    
    
    // getInstance
    function getInstance($class = false)
    {
        $class = $class ? $class : __CLASS__;
        return bwObject::getInstance($class);
    }
    

    public function noticiaSave($dados)
    {
        $db = bwComponent::save('Noticia', $dados);
        $r = bwComponent::retorno($db);

        return $r;
    }

    public function noticiaRemover($dados)
    {
        $db = bwComponent::remover('Noticia', $dados);
        $r = bwComponent::retorno($db);

        return $r;
    }

    public function categoriaSave($dados)
    {
        $db = bwComponent::save('NoticiaCategoria', $dados);
        $r = bwComponent::retorno($db);

        return $r;
    }

    public function categoriaRemover($dados)
    {
        $db = bwComponent::remover('NoticiaCategoria', $dados);
        $r = bwComponent::retorno($db);

        return $r;
    }

    public function noticiaLista()
    {
        // Colunas para a ordenação
        $colunas = array('n.id', 'n.datahora', 'n.titulo', 'c.nome', 'n.status');

        // Total de colunas
        $totalColunas = count($colunas);

        // valor de busca
        $search = bwRequest::getVar('sSearch', '');
        $iDisplayLength = bwRequest::getVar('iDisplayLength');
        $iDisplayStart = bwRequest::getVar('iDisplayStart', 0);

        // SQL para a consulta
        $dqlPrincipal = Doctrine_Query::create()
                        ->from('Noticia n')
                        ->leftJoin('n.Categoria c')
                        ->where('n.titulo LIKE :search OR n.id LIKE :search OR n.datahora LIKE :search OR n.resumo LIKE :search OR c.nome LIKE :search', array(':search' => "%{$search}%"));

        // Consulta banco 1
        $dql = $dqlPrincipal
                        ->orderBy($colunas[bwRequest::getVar('iSortCol_0')] . ' ' . bwRequest::getVar('sSortDir_0', 'DESC'))
                        ->offset($iDisplayStart)
                        ->limit($iDisplayLength)
                        ->execute();

        // Consulta banco 2
        $totalRegistros = $dqlPrincipal
                        ->select('COUNT(' . $colunas[0] . ') AS total')
                        ->fetchOne();

        // Total de registros
        $iTotalRecords = $totalRegistros->total;

        // Total de registros exibidos
        $iTotalDisplayRecords = $iTotalRecords;

        // Dados das colunas
        $aaData = array();
        foreach ($dql as $i)
        {

            // titulo
            $titulo = ($i->titulo == '') ? '[Sem nome]' : $i->titulo;
            $titulo = '<a href="' . bwRouter::_('adm.php?com=noticias&view=cadastro&id=' . $i->id) . '">' . $titulo . '</a>';

            // categoria
            $categoria = ($i->idcategoria == '') ? '[Não definida]' : $i->Categoria->nome;
            $categoria = '<a href="' . bwRouter::_('adm.php?com=noticias&sub=categorias&view=cadastro&id=' . $i->idcategoria) . '">' . $categoria . '</a>';

            $aaData[] = array(
                $i->id,
                $i->_date,
                $titulo,
                $categoria,
                bwAdm::getImgStatus($i->status)
            );
        }

        // retorno ao DataTable
        $retorno = array(
            'sEcho' => bwRequest::getVar('sEcho'),
            'iTotalRecords' => $iTotalRecords,
            'iTotalDisplayRecords' => $iTotalDisplayRecords,
            'aaData' => $aaData
        );

        return $retorno;
    }

    public function categoriaLista()
    {
        // Colunas para a ordenação
        $colunas = array('c.id', 'c.nome', 'c.status');

        // Total de colunas
        $totalColunas = count($colunas);

        // valor de busca
        $search = bwRequest::getVar('sSearch', '');
        $iDisplayLength = bwRequest::getVar('iDisplayLength');
        $iDisplayStart = bwRequest::getVar('iDisplayStart', 0);

        // SQL para a consulta
        $dqlPrincipal = Doctrine_Query::create()
                        ->from('NoticiaCategoria c')
                        ->where('c.nome LIKE :search OR c.id LIKE :search OR c.descricao LIKE :search', array(':search' => "%{$search}%"));

        // Consulta banco 1
        $dql = $dqlPrincipal
                        ->orderBy($colunas[bwRequest::getVar('iSortCol_0')] . ' ' . bwRequest::getVar('sSortDir_0', 'asc'))
                        ->offset($iDisplayStart)
                        ->limit($iDisplayLength)
                        ->execute();

        // Consulta banco 2
        $totalRegistros = $dqlPrincipal
                        ->select('COUNT(' . $colunas[0] . ') AS total')
                        ->fetchOne();

        // Total de registros
        $iTotalRecords = $totalRegistros->total;

        // Total de registros exibidos
        $iTotalDisplayRecords = $iTotalRecords;

        // Dados das colunas
        $aaData = array();
        foreach ($dql as $i)
        {

            // nome
            $nome = ($i->nome == '') ? '[Sem nome]' : $i->nome;
            $nome = '<a href="' . bwRouter::_('adm.php?com=noticias&sub=categorias&view=cadastro&id=' . $i->id) . '">' . $nome . '</a>';

            $aaData[] = array(
                $i->id,
                $nome,
                bwAdm::getImgStatus($i->status)
            );
        }

        // retorno ao DataTable
        $retorno = array(
            'sEcho' => bwRequest::getVar('sEcho'),
            'iTotalRecords' => $iTotalRecords,
            'iTotalDisplayRecords' => $iTotalDisplayRecords,
            'aaData' => $aaData
        );

        return $retorno;
    }

}
?>
