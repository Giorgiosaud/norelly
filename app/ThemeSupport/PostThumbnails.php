<?php 
namespace WordpressBase\ThemeSupport;
class PostThumbnails{
	public function __construct()
	{
		return	add_theme_support( 'post-thumbnails');
	}
}