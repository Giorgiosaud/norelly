<?php
namespace WordpressBase\CustomPosts;
class Equipo extends CustomPostBase{
	protected $icon='dashicons-groups';
	protected $supports=array('editor');
	public function __construct()
	{
		parent::__construct();
		add_filter('manage_equipos_posts_columns' , array($this,'equipos_cpt_columns'));
		add_action( 'manage_equipos_posts_custom_column', array($this,'my_manage_equipos_columns'), 10, 2 );
		add_filter( 'manage_edit-equipo_sortable_columns', 'equipo_sortable_columns' );

	}

	function equipo_sortable_columns( $columns ) {

		$columns['duration'] = 'duration';

		return $columns;
	}
	function my_manage_equipos_columns($column, $post_id){
		global $post;
		switch( $column ){
			case 'nombre':
			$nombre=get_post_meta( $post_id, 'nombre', true );
			if ( empty( $nombre ) )
				echo __( 'Campo no llenado' );
			else
				printf( __( '%s' ), $nombre );
			break;
			default :
			break;
		}
	}
	function equipos_cpt_columns($columns) {

		$new_columns = array(
			'nombre' => __('Nombre', 'WordpressBase'),
			);
		return $new_columns;
	}


}