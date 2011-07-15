<?php
/**
 * MenuHelper
 * 
 * Receive a group and generate a simple HTML menu structure using YAML files
 * as input.
 * 
 * @author Weslly Honorato
 * @version 0.5
 */
class MenuHelper extends AppHelper {
	var $helpers = array('Html','Xml');
	
	/**
	 * 
	 * @param string $group User group
	 * @return string "Html do menu" 
	 */
	function render($group) {
		/**
		 * @todo check if there's a "cleaner" way to get the plugin folder
		 */
		$menufile=APP.'plugins'.DS.'menu'.DS.'config'.DS.$group.'.yml';
		if(!file_exists($menufile)) return false;
		$menu = Spyc::YAMLLoad(file_get_contents($menufile));
		$out="";
		foreach($menu as $item){
			$out.=$this->generate($item);
		}
		return $out;
	}
	private function generate($i){
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