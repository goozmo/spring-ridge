<?php get_template_part( 'templates/head' ); ?>
<?php $rtl = wheels_get_option( 'is-rtl', false ) ? ' dir="rtl"' : ''; ?>
<body <?php body_class(); ?><?php echo $rtl; ?>>
	<div class="wh-main-wrap">
		<?php get_template_part( 'templates/header' ); ?>
