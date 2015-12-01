<?php 
namespace WordpressBase\ThemeSupport;
class Logo{
	protected $Logo=true;
	protected $logo_default_image          = '';
	protected $logo_width                  = 0;
	protected $logo_height                 = 0;
	protected $logo_flex_height            = false;
	protected $logo_flex_width             = false;
	protected $logo_uploads                = true;
	protected $logo_random_default         = false;
	protected $logo_header_text            = true;
	protected $logo_default_text_color     = '';
	protected $logo_wp_head_callback       = '';
	protected $logo_admin_head_callback    = '';
	protected $logo_admin_preview_callback = '';

	
	public function __construct()
	{
		$argumentos=func_get_args();
		
		$this->defaults=array(
			'default-image'          => $this->logo_default_image,
			'width'                  => $this->logo_width,
			'height'                 => $this->logo_height,
			'flex-height'            => $this->logo_flex_height,
			'flex-width'             => $this->logo_flex_width,
			'uploads'                => $this->logo_uploads,
			'random-default'         => $this->logo_random_default,
			'header-text'            => $this->logo_header_text,
			'default-text-color'     => $this->logo_default_text_color,
			'wp-head-callback'       => $this->logo_wp_head_callback,
			'admin-head-callback'    => $this->logo_admin_head_callback,
			'admin-preview-callback' => $this->logo_admin_preview_callback,
			);
		if(count($argumentos)>0){
			$this->defaults=array_merge($this->defaults,$argumentos[0]);
		}
		if($this->defaults['default-image']!=''){
			$this->defaults['default-image']=get_template_directory_uri().$this->defaults['default-image'];
		}
		$this->defineCustomLogo($this->defaults);
	}

	private function defineCustomLogo($defaults){
		add_theme_support( 'custom-header', $defaults );
	}

}