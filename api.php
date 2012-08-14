<?

defined('BW') or die("Acesso negado!");

class bwNoticias extends bwComponent
{
    // variaveis obrigatórias
    var $id = 'noticias';
    var $nome = 'Notícias';
    var $adm_visivel = true;
    
    
    // getInstance
    function getInstance($class = false)
    {
        $class = $class ? $class : __CLASS__;
        return bwObject::getInstance($class);
    }
}
?>
