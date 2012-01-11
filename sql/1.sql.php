-- <? defined('BW') or die("Acesso negado!"); ?>


-- 
ALTER TABLE `bw_versao` ADD `com_noticias_1` INT(1) NOT NULL;


--
CREATE TABLE IF NOT EXISTS `bw_noticias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idcategoria` int(11) DEFAULT NULL,
  `datahora` datetime NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `resumo` longtext,
  `texto` longtext NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


--
CREATE TABLE IF NOT EXISTS `bw_noticias_categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `descricao` longtext,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


--
ALTER TABLE `bw_noticias` ADD `titulo_resumido` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL AFTER `titulo`;
