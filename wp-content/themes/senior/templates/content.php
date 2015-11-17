<?php global $post_id; ?>
<?php $post_class = wheels_class( 'post-item' ); ?>
<div <?php echo post_class( $post_class ) ?>>
	<div class="one third">
		<div class="thumbnail">
			<?php wheels_get_thumbnail( 'wh-thumb-third' ); ?>
		</div>
	</div>
	<div class="item two thirds">
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<?php get_template_part( 'templates/entry-meta' ); ?>
		<div class="entry-summary"><?php echo strip_shortcodes( get_the_excerpt() ); ?></div>
		<a class="wh-button read-more" href="<?php the_permalink(); ?>"><?php _e( 'read more', 'wheels' ); ?></a>
	</div>
</div>
