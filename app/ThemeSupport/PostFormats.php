<?php
namespace WordpressBase\ThemeSupport;
class PostFormats{
	public function __construct()
	{
		$argumentos=func_get_args();
		// var_dump($argumentos[0][0]);
		add_theme_support( 'post-formats', $argumentos[0] );
	}

}
