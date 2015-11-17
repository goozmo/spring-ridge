<?php
/**
 * @package WordPress
 * @subpackage Wheels
 *
 * Template Name: Home Boxed
 */
get_header( 'boxed' );
?>
<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<?php the_content(); ?>
	<?php endwhile; ?>
<?php endif; ?>
<?php get_footer( 'boxed' ); ?>
