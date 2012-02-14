<?php

class Noticia extends bwRecord
{
    var $labels = array(
        'idcategoria' => 'Categoria',
        'datahora' => 'Data/Hora',
        'titulo' => 'Título',
        'titulo_resumido' => 'Título resumido',
        'resumo' => 'Notícia resumida',
        'texto' => 'Notícia completa'
    );

    public function setTableDefinition()
    {
        $this->setTableName('bw_noticias');
        $this->hasColumn('id', 'integer', 4, array(
            'type' => 'integer',
            'length' => 4,
            'fixed' => false,
            'unsigned' => false,
            'primary' => true,
            'autoincrement' => true,
        ));
        $this->hasColumn('idcategoria', 'integer', 4, array(
            'type' => 'integer',
            'length' => 4,
            'fixed' => false,
            'unsigned' => false,
            'primary' => false,
            'notnull' => false,
            'autoincrement' => false,
            'integer' => true,
        ));
        $this->hasColumn('datahora', 'timestamp', null, array(
            'type' => 'timestamp',
            'fixed' => false,
            'unsigned' => false,
            'primary' => false,
            'notnull' => true,
            'notblank' => true,
            'autoincrement' => false,
        ));
        $this->hasColumn('titulo', 'string', 255, array(
            'type' => 'string',
            'length' => 255,
            'fixed' => false,
            'unsigned' => false,
            'primary' => false,
            'notnull' => true,
            'unique' => true,
            'notblank' => true,
            'autoincrement' => false,
        ));
        $this->hasColumn('titulo_resumido', 'string', 255, array(
            'type' => 'string',
            'length' => 255,
            'fixed' => false,
            'unsigned' => false,
            'primary' => false,
            'notnull' => false,
            'autoincrement' => false,
        ));
        $this->hasColumn('resumo', 'string', null, array(
            'type' => 'string',
            'fixed' => false,
            'unsigned' => false,
            'primary' => false,
            'notnull' => false,
            'autoincrement' => false,
        ));
        $this->hasColumn('texto', 'string', null, array(
            'type' => 'string',
            'fixed' => false,
            'unsigned' => false,
            'primary' => false,
            'notnull' => true,
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

    public function setDatahora($v)
    {
        if (preg_match('#^\d{2}\/\d{2}\/\d{4} \d{2}:\d{2}:\d{2}$#', $v))
            return $this->_set('datahora', bwUtil::data($v));
        return $v;
    }

    public function setTitulo($v)
    {
        return $this->_set('titulo', trim(bwUtil::cleanText($v)));
    }

    public function setUp()
    {
        parent::setUp();

        $this->hasOne('NoticiaCategoria as Categoria', array(
            'local' => 'idcategoria',
            'foreign' => 'id'
        ));

        $this->setBwImagem('noticias', 'imagens');
    }
    
    public function salvar($dados)
    {
        $db = bwComponent::save('Noticia', $dados);
        $r = bwComponent::retorno($db);

        return $r;
    }

    public function remover($dados)
    {
        $db = bwComponent::remover('Noticia', $dados);
        $r = bwComponent::retorno($db);

        return $r;
    }

}
