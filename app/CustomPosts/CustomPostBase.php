<?php 
namespace WordpressBase\CustomPosts;

abstract class CustomPostBase
{
	protected $nombre;
	protected $plural;
	protected $ismale=true;
	protected $icon='dashicons-menu';
	protected $supports=array( 'title', 'editor', 'excerpt' );
	protected $taxonomies=array( 'category', 'post_tag' );
	protected $hierarchical=false;
	protected $public=true;
	protected $show_ui=true;
	protected $show_in_menu=true;
	protected $menu_position=5;
	protected $show_in_admin_bar=true;
	protected $show_in_nav_menus=true;
	protected $can_export=true;
	protected $has_archive=true;
	protected $exclude_from_search=false;
	protected $publicly_queryable=true;
	protected $capability_type='post';

	public function __construct()
	{
		if(!isset($this->$nombre)){
			$this->nombre=(new \ReflectionClass($this))->getShortName();
		}
		if(!isset($this->$plural)){
			$this->plural=$plural;
		}
		$this->plural=$this->nombre.'s';
		$this->pluralAll='Todos Los ';
		$this->pluralNew='Nuevo ';
		if(!$this->ismale){
			$this->pluralAll='Todas Las ';
			$this->pluralNew='Nueva ';
		}
		// var_dump($this);
		$this->execute();
		
	}
	public function execute(){
		add_action( 'init', array($this,'cutomPostGenerate'), 0 );
	}

	public function cutomPostGenerate() {

		$labels = array(
			'name'                => _x( $this->nombre, 'Post Type General Name', 'zonapro' ),
			'singular_name'       => _x( $this->nombre, 'Post Type Singular Name', 'zonapro' ),
			'menu_name'           => __( $this->plural, 'zonapro' ),
			'name_admin_bar'      => __( $this->plural, 'zonapro' ),
			'parent_item_colon'   => __( $this->nombre.' Padre', 'zonapro' ),
			'all_items'           => __( $this->pluralAll.$this->plural, 'zonapro' ),
			'add_new_item'        => __( $this->pluralNew.$this->nombre, 'zonapro' ),
			'add_new'             => __( 'Agregar '.$this->pluralNew.$this->nombre, 'zonapro' ),
			'Nuevo_item'            => __( $this->pluralNew.$this->nombre, 'zonapro' ),
			'edit_item'           => __( 'Editar '.$this->nombre, 'zonapro' ),
			'update_item'         => __( 'Actualizar '.$this->nombre, 'zonapro' ),
			'view_item'           => __( 'Ver '.$this->nombre, 'zonapro' ),
			'search_items'        => __( 'Buscar '.$this->nombre, 'zonapro' ),
			'not_found'           => __( $this->nombre.' No Encontrado', 'zonapro' ),
			'not_found_in_trash'  => __( $this->nombre.' No Encontrado En la Papelera', 'zonapro' ),
			);

$args = array(
	'label'               => __( $this->nombre, 'zonapro' ),
	'menu_icon'=>$this->icon,
	'labels'              => $labels,
	'supports'            => $this->supports,
	'taxonomies'          => $this->taxonomies,
	'hierarchical'        => $this->hierarchical,
	'public'              => $this->public,
	'show_ui'             => $this->show_ui,
	'show_in_menu'        => $this->show_in_menu,
	'menu_position'       => $this->menu_position,
	'show_in_admin_bar'   => $this->show_in_admin_bar,
	'show_in_nav_menus'   => $this->show_in_nav_menus,
	'can_export'          => $this->can_export,
	'has_archive'         => $this->has_archive,
	'exclude_from_search' => $this->exclude_from_search,
	'publicly_queryable'  => $this->publicly_queryable,
	'capability_type'     => $this->capability_type ,
	);
register_post_type( $this->plural, $args );

}

}