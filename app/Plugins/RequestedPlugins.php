<?php
namespace WordpressBase\Plugins;

/**
 * Class RequestedPlugins that sets plugins with theme
 * @package WordpressBase\Plugins
 */
class RequestedPlugins{
	/**
	 * @var array
	 * array of plugins required
     */
	private $pluginNames=array('Simple Page Ordering','Favicon by RealFaviconGenerator','WP Smushit');
	/**
	 * @var array
     */
    // private $mainsrc=get_stylesheet_directory();

	private $pluginsIncluded=array(
		array(
			'name'               => 'Advanced Custom Fields Pro', // The plugin name.
			'slug'               => 'advanced-custom-fields-pro', // The plugin slug (typically the folder name).
			'source'             => "/app/Plugins/src/advanced-custom-fields-pro.zip", // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		),
	);
private $plugins=array();
	/**
	 *
     */
	public function __construct()
	{
		foreach ($this->pluginNames as $pluginName) {
			$plugin=new Plugin($pluginName);
			$plugin->required()->force_activation();
			array_push($this->plugins,$plugin->to_array());
		}
		foreach ($this->pluginsIncluded as $pluginName) {
			$plugin=new Plugin($pluginName);
			$plugin->required()->force_activation();
			array_push($this->plugins,$plugin->to_array());
		}
		// var_dump($this->plugins);
		$this->execute();
		$this->config = array(
			'id'           => 'tgmpa',
			'default_path' => '',
			'menu'         => 'tgmpa-install-plugins',
			'parent_slug'  => 'themes.php',
			'capability'   => 'edit_theme_options',
			'has_notices'  => true,
			'dismissable'  => true,
			'dismiss_msg'  => '',
			'is_automatic' => false,
			'message'      => '',
			);

	}

	/**
	 *
     */
	public function execute(){
		add_action( 'tgmpa_register', array($this,'pluginsRequeridos'));

	}

	/**
	 *
     */
	public function pluginsRequeridos(){
		
		tgmpa( $this->plugins, $this->config );
	}
}