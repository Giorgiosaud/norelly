<?php
namespace WordpressBase\Menus;
class Menus{
	public function __construct()
	{
		$this->menus=func_get_args();
		$this->menus=$this->menus[0];
		// var_dump($this);
		add_action( 'init', array($this,'register_my_menus'), 0 );
	}
	public function register_my_menus()
	{
		register_nav_menus($this->menus);
	}

}