<?php

class NoticiaCategoria extends bwRecord
{

    var $labels = array(
        'nome' => 'Nome',
        'descricao' => 'Descrição'
    );

    public function setTableDefinition()
    {
        $this->setTableName('bw_noticias_categorias');
        $this->hasColumn('id', 'integer', 4, array(
            'type' => 'integer',
            'length' => 4,
            'fixed' => false,
            'unsigned' => false,
            'primary' => true,
            'autoincrement' => true,
        ));
        $this->hasColumn('nome', 'string', 255, array(
            'type' => 'string',
            'length' => 255,
            'fixed' => false,
            'unsigned' => false,
            'primary' => false,
            'notnull' => true,
            'notblank' => true,
            'unique' => true,
            'autoincrement' => false,
        ));
        $this->hasColumn('descricao', 'string', null, array(
            'type' => 'string',
            'fixed' => false,
            'unsigned' => false,
            'primary' => false,
            'notnull' => false,
            'autoincrement' => false,
        ));
        $this->hasColumn('status', 'integer', 4, array(
            'type' => 'integer',
            'length' => 4,
            'fixed' => false,
            'unsigned' => false,
            'primary' => false,
            'notnull' => true,
            'autoincrement' => false,
        ));
    }

    public function setUp()
    {
        parent::setUp();

        $this->hasMany('Noticia as Noticias', array(
            'local' => 'id',
            'foreign' => 'idcategoria'
        ));
    }

    public function salvar($dados)
    {
        $db = bwComponent::save('NoticiaCategoria', $dados);
        $r = bwComponent::retorno($db);

        return $r;
    }

    public function remover($dados)
    {
        // verifica se exite notícias relacionadas
        $dql = Doctrine_Query::create()
            ->from('Noticia')
            ->where('idcategoria = ?', $dados['id']);

        if ($dql->fetchOne()) {
            return array(
                'retorno' => false,
                'msg' => 'Existem notícias cadastradas nesta categoria!',
            );
        }
        
        $db = bwComponent::remover('NoticiaCategoria', $dados);
        $r = bwComponent::retorno($db);

        return $r;
    }

}