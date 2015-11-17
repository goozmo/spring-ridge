<?php
/**
 * @package WordPress
 * @subpackage Wheels
 *
 * Template Name: Blog - Two Columns
 */
get_header();

global $paged;

$posts_per_page = 10;
$categories     = false;


$args = array(
	'posts_per_page' => $posts_per_page,
	'paged'          => $paged,
);

if ($categories) {
	$args['category__in'] = $categories;
}

query_posts($args);

?>
<?php get_template_part( 'templates/title' ); ?>
<div class="<?php echo wheels_class( 'main-wrapper' ) ?>">
	<div class="<?php echo wheels_class( 'container' ) ?>">
		<div class="<?php echo wheels_class( 'content' ) ?>">
			<?php if ( have_posts() ): ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php global $post_id; ?>
					<?php $post_class = wheels_class( 'post-item-one-half' ); ?>
					<div <?php echo post_class( $post_class ) ?>>
						<div class="thumbnail">
							<?php wheels_get_thumbnail( 'wh-featured-image' ); ?>
						</div>
						<div class="item">
							<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<?php get_template_part( 'templates/entry-meta' ); ?>
							<div class="entry-summary"><?php echo strip_shortcodes( get_the_excerpt() ); ?></div>
							<a class="wh-alt-button read-more" href="<?php the_permalink(); ?>"><?php _e( 'read more', 'wheels' ); ?></a>
						</div>
					</div>
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
<script>
	(function ($) {
		$(document).ready(function () {
			$('.wh-post-item:nth-child(even)').addClass('even');
			$('.wh-post-item:nth-child(odd)').addClass('odd');
		});
	})(jQuery);
</script>
<?php get_footer(); ?>
