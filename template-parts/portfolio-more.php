<?php
/**
 * The file is for displaying the portfolio grid after single post content (pages and posts).
 * Filter mark_more_postcount to set your own post count for the more loop.
 *
 * Example:
 *
 * function mark_more_postcount( $post_count ) {
 *      $post_count = 1;
 *      return $post_count;
 * }
 * add_filter( 'mark_more_postcount', 'custom_mark_more_postcount' );
 *
 * @package     Mark
 * @link        https://themebeans.com/themes/mark
 */
	?>

<div class="projects projects--more">

	<?php
	$post_count = 18;
	$post_count = apply_filters( 'mark_more_postcount', $post_count );

	$args = array(
		'post_type'      => 'portfolio',
		'orderby'        => 'rand',
		'order'          => 'ASC',
		'posts_per_page' => $post_count,
		'post__not_in'   => array( $post->ID ),
	);

	$wp_query = new WP_Query( $args );

	if ( $wp_query->have_posts() ) :

		// Start the loop.
		while ( $wp_query->have_posts() ) :
			$wp_query->the_post();

			get_template_part( 'template-parts/portfolio-loop' );

			// End of the loop.
		endwhile;

	endif;
	?>

</div><!-- END #projects -->
