<?php
function slugify($text)
{ 
  // replace non letter or digits by -
	$text = preg_replace('~[^\\pL\d]+~u', '-', $text);

  // trim
	$text = trim($text, '-');

  // transliterate
	$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  // lowercase
	$text = strtolower($text);

  // remove unwanted characters
	$text = preg_replace('~[^-\w]+~', '', $text);

	if (empty($text))
	{
		return 'n-a';
	}

	return $text;
}


if ( ! function_exists( 'twentyfifteen_post_thumbnail' ) ) :
/**
 * Display an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index views, or a div
 * element when on single views.
 *
 * @since Twenty Fifteen 1.0
 */
function twentyfifteen_post_thumbnail() {
	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
		return;
	}

	if ( is_singular() ) :
		?>

	<div class="post-thumbnail">
		<?php the_post_thumbnail(); ?>
	</div><!-- .post-thumbnail -->

<?php else : ?>

	<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
		<?php
		the_post_thumbnail( 'post-thumbnail', array( 'alt' => get_the_title() ) );
		?>
	</a>

	<?php endif; // End is_singular()
}
endif;
