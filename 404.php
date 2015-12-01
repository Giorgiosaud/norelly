<?php
/**
 * The template for displaying 404 pages (not found)
*/
get_header(); ?>
<div class="container-fluid">
	<div class="text-center">
		<h1>
			<?php _e( 'error 404 Oops! That page can&rsquo;t be found.', 'zonapro' ); ?></h1>
		</h1>
		<div class="page-content">
			<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'zonapro' ); ?></p>

			<?php get_search_form(); ?>
		</div><!-- .page-content -->
	</div>
</div>
<?php get_footer(); ?>
