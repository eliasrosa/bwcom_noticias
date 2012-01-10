<?
defined('BW') or die("Acesso negado!");

function noticiasBuildRoute( &$query )
{
	$segments = array();	

	if(preg_match('#open#', $query['view']))
	{
		
		if(!isset($query['id']) || !isset($query['alias']))
		{
			$t = Doctrine_Query::create()
				->from('Noticia n')
				->where('n.status = 1')
				->orderBy("n.datahora DESC, n.titulo ASC")
				->fetchOne();
				
			if($t)
			{
				$segments[] = $t->id;
				$segments[] = bwUtil::alias($t->titulo);		
			}
		}
		else
		{
			$segments[] = $query['id'];
			$segments[] = $query['alias'];
			unset($query['id'], $query['alias']);
		}
	}

	return $segments;
}

function noticiasParseRoute( $segments )
{
	$vars = array();
	
	if(count($segments))
	{
		$vars['id'] = $segments[0];		
		$vars['alias'] = $segments[1];		
	}
	
	return $vars;	
}
?>