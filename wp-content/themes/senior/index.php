<?php
/**
 * @package WordPress
 * @subpackage Wheels
 */
get_header();
?>
<?php get_template_part( 'templates/title' ); ?>
<div class="<?php echo wheels_class( 'main-wrapper' ) ?>">
	<div class="<?php echo wheels_class( 'container' ) ?>">
		<div class="<?php echo wheels_class( 'content' ) ?>">
			<?php if ( have_posts() ): ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'templates/content', get_post_format() ); ?>
				<?php endwhile; ?>
			<?php else: ?>
				<?php get_template_part( 'templates/content', 'none' ); ?>
			<?php endif; ?>
			<div class="<?php echo wheels_class( 'pagination' ) ?>">
				<?php wheels_pagination(); ?>
			</div>
		</div>
		<div class="<?php echo wheels_class( 'sidebar' ) ?>">
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
