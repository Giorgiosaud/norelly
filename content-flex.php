<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
// check if the flexible content field has rows of data
if( have_rows('flexible') ):
	     // loop through the rows of data
	while ( have_rows('flexible') ) : 
		the_row();
	?>
	<section class="flex-section" style="background-color:<?php the_sub_field('color') ?>">
		<?php
		if( get_row_layout() == 'slider' ):
			show_slider();
		elseif( get_row_layout() == 'section' ): 
			show_section();
		endif;?>
	</section>
	<?php
	endwhile;

	else :
endif;
?>
