<?php
/**
 * MenuHelper
 * 
 * Receive a group and generate a simple HTML menu structure using YAML files
 * as input.
 * 
 * @author Weslly Honorato
 * @version 0.6.1
 */
class MenuHelper extends AppHelper {
	var $helpers = array('Html');
	
	/**
	 * 
	 * @param string $group user group
	 * @return string html code for menu 
	 */
	function render($group) {
		App::import('Vendor', 'Menu.Spyc/Spyc');
		/**
		 * @TODO is there a cleaner way to get the plugin folder?
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