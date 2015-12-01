<?php
#recuerda eliminar readme.html de la carpeta raiz de wordpress
#crea archivo robots.tx en la raiz con el siguiente contenido
/*
User-agent: *

Disallow: /feed/
Disallow: /trackback/
Disallow: /wp-admin/
Disallow: /wp-content/
Disallow: /wp-includes/
Disallow: /xmlrpc.php
Disallow: /wp-
*/
/*

desactiva editor de codigo en el administrador para evitar daños futuros añadiendo a wp-config esta linea
define('DISALLOW_FILE_EDIT', true);
desactiva actualizacion de plugins  tambien añadiendo
define('DISALLOW_FILE_MODS', true);
cambia los valores de AUTH / SALT

usa prefijos de base de datos distintos
 */

// desactiva errores de pagina login
function login_errors_message() {
	return 'Ooooops!';
}
add_filter('login_errors', 'login_errors_message');
// Elimina basura del head
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
// elimina el codigo HTML de los comentarios
add_filter('pre_comment_content', 'wp_specialchars');

if(function_exists('acf_add_options_page')){
	acf_add_options_page(array(
		'page_title'=>'Theme Options',
		'menu_title'=>'Theme Options',
		'menu_slug'=>'theme-options',
		'capability'=>'edit_posts',
		'parent_slug'=>'',
		'position'=>false,
		'icon_url'=>false,
		'redirect'=>true
		));
	acf_add_options_sub_page(array(
		'page_title'=>'Main Options',
		'menu_title'=>'Main Options',
		'menu_slug'=>'main-options',
		'capability'=>'edit_posts',
		'parent_slug'=>'theme-options',
		'position'=>false,
		'icon_url'=>false,
		));
	acf_add_options_sub_page(array(
		'page_title'=>'Social Network',
		'menu_title'=>'Social Network',
		'menu_slug'=>'social-network',
		'capability'=>'edit_posts',
		'parent_slug'=>'theme-options',
		'position'=>false,
		'icon_url'=>false,
		));
	acf_add_options_sub_page(array(
		'page_title'=>'Footer',
		'menu_title'=>'Footer',
		'menu_slug'=>'footer',
		'capability'=>'edit_posts',
		'parent_slug'=>'theme-options',
		'position'=>false,
		'icon_url'=>false,
		));
	
	

}
include_once "vendor/autoload.php";

$tema=new \WordpressBase\Initializer();
add_filter('wp_nav_menu_items','add_todaysdate_in_menu', 10, 2);
function add_todaysdate_in_menu( $items, $args ) {
	// var_dump($args);	
	if( $args->fallback_cb == 'menu-principal')  {
		if(get_header_image()){
			$CustomHeader='<li class="Menu__customTitle"><a href="/" title="Home"><img src="'.get_header_image().'" alt="'.get_bloginfo( 'title' ).'" /></a></li>';
		}
		else{
			$CustomHeader='<li class="Menu__customTitle"><a href="/" title="Home">'.get_bloginfo( 'title' ).'</a></li>';	
		}
		$SocialNetwork='';
		if( have_rows('social_networks', 'option') ):

			while( have_rows('social_networks', 'option') ): 
				the_row();
				$logo=get_sub_field('logo');
				
				$SocialNetwork.='<li class="Menu__social-network"><a href="'.get_sub_field('link').'"><span class="socicon socicon-'.$logo.'"></span></a></li>';
				endwhile;
		endif;
		$iconHamburger='<li class="Menu__toogleButton"><button id="Menu__collapse"type="button" class="navbar-toggle collapsed"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button></li>';
		$newItems=$CustomHeader.$items.$SocialNetwork.$iconHamburger;

	}
	return $newItems;
}
add_action( 'wp_ajax_send_contact', 'send_contact' );
add_action( 'wp_ajax_nopriv_send_contact', 'send_contact' );

function send_contact() {
	$emailTo= get_field('emailTo', 'option');
	$headers = 'From: Norelly Web <web@obamacaresalud.net>' . "\r\n";
	$mensaje=$_POST['name'].' '.$_POST['last_name'];
	$mensaje.=" contact you by the webpage: ";
	$mensaje.=" Phone Number ".$_POST['phone'];
	$mensaje.=" Email: ".$_POST['email'];
	$mensaje.=" and said: ".$_POST['message'];
	$asunto="Contacto Web";
	wp_mail($emailTo,$asunto,$mensaje,$headers);
	echo $mensaje;
	echo 'enviado';
	die();
}
// var_dump($tema);
// define( 'ACF_LITE', true );