<?php 
namespace WordpressBase\ThemeSupport;
class CustomBackground{
	protected $default_color          = '';
	protected $default_image          = '';
	protected $wp_head_callback       = '_custom_background_cb';
	protected $admin_head_callback    = '';
	protected $admin_preview_callback = '';
	public function __construct()
	{
		$argumentos=func_get_args();
		$this->defaults=array(
			'default-color'          =>$this->default_color,
			'default-image'          =>$this->default_image,
			'wp-head-callback'       =>$this->wp_head_callback,
			'admin-head-callback'    =>$this->admin_head_callback,
			'admin-preview-callback' =>$this->admin_preview_callback,
			);
		if(count($argumentos)>0){
			$this->defaults=array_merge($this->defaults,$argumentos[0]);
		}
		if($this->defaults['default-image']!=''){
			$this->defaults['default-image']=get_template_directory_uri().$this->defaults['default-image'];
		}
		$this->defineCustomBackground($this->defaults);
	}
	private function defineCustomBackground($defaults){
		add_theme_support( 'custom-header', $defaults );
	}

}