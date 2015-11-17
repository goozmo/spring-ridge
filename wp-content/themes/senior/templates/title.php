<?php $enable_breadcrumbs = wheels_get_option( 'page-title-breadcrumbs-enable', true ); ?>
<?php $breadcrumbs_position = wheels_get_option( 'page-title-breadcrumbs-position', 'bellow_title' ); ?>
<div class="<?php echo wheels_class( 'page-title-row' ); ?>">
	<div class="<?php echo wheels_class( 'container' ); ?>">
		<div class="<?php echo wheels_class( 'page-title-grid-wrapper' ); ?>">
			<?php if ( $enable_breadcrumbs && $breadcrumbs_position == 'above_title' ): ?>
				<?php get_template_part( 'templates/breadcrumbs' ); ?>
			<?php endif ?>
			<h1 class="<?php echo wheels_class( 'page-title' ); ?>"><?php echo wheels_title(); ?></h1>
			<?php if ( $enable_breadcrumbs && $breadcrumbs_position == 'bellow_title' ): ?>
				<?php get_template_part( 'templates/breadcrumbs' ); ?>
			<?php endif ?>
		</div>
	</div>
</div>
