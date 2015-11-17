<?php
global $post_id;
$use_top_bar            = wheels_get_option( 'top-bar-use', false );
$use_top_bar_additional = wheels_get_option( 'top-bar-additional-use', false );
?>
<header class="<?php echo wheels_class( 'header' ); ?>">
	<?php if ( $use_top_bar ): ?>
		<?php get_template_part( 'templates/top-bar' ); ?>
	<?php endif; ?>
	<?php if ( $use_top_bar_additional ): ?>
		<?php get_template_part( 'templates/top-bar-additional' ); ?>
	<?php endif; ?>
	<div class="<?php echo wheels_class( 'main-menu-bar-wrapper' ); ?>">
		<div class="<?php echo wheels_class( 'container' ); ?>">
			<div class="<?php echo wheels_class( 'logo-wrapper' ); ?>">
				<?php get_template_part( 'templates/logo' ); ?>
			</div>			
			<div class="<?php echo wheels_class( 'main-menu-wrapper' ); ?>">
				<?php get_template_part( 'templates/menu-main' ); ?>
			</div>
		</div>
	</div>
</header>
