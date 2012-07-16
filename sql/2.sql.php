-- <? defined('BW') or die("Acesso negado!"); ?>


-- 
ALTER TABLE `bw_versao` CHANGE `com_noticias_1` `com_noticias_2` INT NOT NULL;

--
ALTER TABLE `bw_noticias` ADD `metatagalias` VARCHAR( 255 ) NULL;
ALTER TABLE `bw_noticias` ADD `metatagkeywords` VARCHAR( 255 ) NULL;
ALTER TABLE `bw_noticias` ADD `metatagdescription` VARCHAR( 255 ) NULL;


--
ALTER TABLE `bw_noticias_categorias` ADD `metatagalias` VARCHAR( 255 ) NULL;
ALTER TABLE `bw_noticias_categorias` ADD `metatagkeywords` VARCHAR( 255 ) NULL;
ALTER TABLE `bw_noticias_categorias` ADD `metatagdescription` VARCHAR( 255 ) NULL;
