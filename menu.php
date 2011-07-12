<?php
/**
 * MenuHelper
 * 
 * Generates a "semi-acl" menu, based on user group.
 * 
 * @author Weslly Honorato
 * @version 0.1
 */
class MenuHelper extends AppHelper {
	var $helpers = array('Html');

	function render($group) {
		$menu['1']=array(
			array("title"=>"Início","url"=>array("controller"=>"users","action"=>"home")),
			array("title"=>"Usuários","url"=>array("controller"=>"users","action"=>"index"),
				"children"=> array(
					array("title"=>"Listar","url"=>array("controller"=>"users","action"=>"index")),
					array("title"=>"Adicionar","url"=>array("controller"=>"users","action"=>"add")),
					array("title"=>"Grupos","url"=>array("controller"=>"groups","action"=>"index"),
						"children"=>array(
							array("title"=>"Adicionar","url"=>array("controller"=>"groups","action"=>"add")
						))),
				)
			),
			array("title"=>"Anunciantes","url"=>"#"),
		);
		
		$out="";
		foreach($menu[$group] as $item){
			$out.=$this->generate($item);
		}
		return $out;
	}
	function generate($i){
		$out="";
		if(!isset($i['children'])){
			$out.= $this->Html->tag("li",$this->Html->link($i["title"],$i["url"]));
		}
		else{
			$multi="";
			for($j=0;$j<count($i['children']);$j++){
				$multi.=$this->generate($i['children'][$j]);
			}
			$out.= $this->Html->tag("li",$this->Html->link($i["title"],$i["url"]).$this->Html->tag("ul",$multi));
			
		}
		return $out;
	}
}
?>