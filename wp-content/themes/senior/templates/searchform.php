<form role="search" method="get" class="search-form form-inline" action="<?php echo home_url( '/' ); ?>">
	<input type="search" value="<?php if ( is_search() ) { echo get_search_query(); } ?>" name="s" class="search-field" placeholder="<?php _e( 'Search', 'wheels' ); ?> <?php bloginfo( 'name' ); ?>">
	<label class="hidden"><?php _e( 'Search for:', 'wheels' ); ?></label>
	<button type="submit" class="search-submit"><?php _e( 'Search', 'wheels' ); ?></button>
</form>
