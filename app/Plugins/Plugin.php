<?php
namespace WordpressBase\Plugins;

/**
 * Class Plugin
 * This is for plugins that should or must be used with this theme
 * @package WordpressBase\Plugins
 *
 */
class Plugin{

	/**
	 * @var string
	 * ejemplo 'TGM Example Plugin', // The plugin name.
     */
	private $name;
	/**
	 * @var string
	 *  ejemplo 'tgm-example-plugin', // The plugin slug (typically the folder name).
     */
	private  $slug;
	/**
	 * @var string
	 * ejemplo get_stylesheet_directory() . '/lib/plugins/tgm-example-plugin.zip', // The plugin source.
     */
	private  $source='';
	/**
	 * @var bool
	 * ejemplo true, // If false, the plugin is only 'recommended' instead of required.
     */
	private  $required;
	/**
	 * @var string
	 * ejemplo '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
     */
	private  $version='';
	/**
	 * @var bool
	 * ejemplo false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
     */
	private  $force_activation;
	/**
	 * @var bool
	 * ejemplo false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
     */
	private  $force_deactivation=false;
	/**
	 * @var string
	 * ejemplo '', // If set, overrides default API URL and points to an external URL.
     */
	private  $external_url='';
	/**
	 * @var
	 * If set, this callable will be be checked for availability to determine if a plugin is active.
     */
	private  $is_callable='';

	/**
	 * @param $plugin string|array
	 * plugin name or array with info
     */
	public function __construct($plugin)
	{

		if(is_string($plugin)){
			$this->name=$plugin;
			$this->source='';
			// $this->crearPluginDetallado($plugin);
			$this->slug=slugify($this->name);
		}
		else{
			// var_dump($plugin);	
			// $this->name=$plugin['name'];
			// $this->source=get_stylesheet_directory().$plugin['source'];
			// $this->slug=$plugin['slug'];
			$this->crearPluginDetallado($plugin);
		}
		// var_dump($this);
	}

	/**
	 * @return Plugin
	 * set Requiren true
     */
	public function required(){
		$this->required=true;
		return $this;
	}

	/**
	 * @return Plugin
	 * set force_activation to true
     */
	public function force_activation(){
		$this->force_activation=true;
		return $this;
	}

	/**
	 * @return Plugin
	 * set force_deactivation to true
     */
	public function force_deactivation(){
		$this->force_deactivation=true;
		return $this;
	}

	/**
	 * @param $url
	 * @return Plugin
	 * set external_url
     */
	public function external_url($url){
		return $this->external_url=$url;
		return $this;
	}

	/**
	 * @param $source
	 * @return Plugin
     */
	public function source($source){
		$this->source=get_stylesheet_directory().$source;
		return $this;
	}

	/**
	 * @param $slug
	 * @return mixed
     */
	public function slug($slug){
		$this->slug=$slug;
		return $this;
	}

	/**
	 * @param $version
	 * @return Plugin
     */
	public function version($version){
		$this->version=$version;
		return $this;
	}

	/**
	 * @param $is_callable
	 * @return Plugin
     */
	public function isCallable($is_callable){
		$this->is_callable=$is_callable;
		return $this;
	}

	/**
	 * @return array
     */
	public function to_array(){
		return get_object_vars($this);
	}

	/**
	 * @param array $plugin
     */
	public function crearPluginDetallado(array $plugin){
		foreach ($plugin as $key => $value)
		{
			$this->$key=$value;
			if($key=='source'){	
				$this->source=get_stylesheet_directory().$value;
			}


		}
	}


}