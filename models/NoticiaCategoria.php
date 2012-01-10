<?php

class NoticiaCategoria extends bwRecord
{
	var $labels = array(
		'id' => 'ID',
		'nome' => 'Nome',
		'descricao' => 'Descrição',
		'status' => 'status',
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
	
	public function setNome($v)
	{
		return $this->_set('nome', trim($v));
	}
	
	public function setDescricao($v)
	{
		return $this->_set('descricao', trim($v));
	}
}