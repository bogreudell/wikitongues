<?php /* Template name: Revitalization Home */

// header
get_header();

// banner
$page_banner = get_field('revitalization_home_banner');

include( 'modules/banner--main.php' );

// foreach linked page, display 1/3 content block
if ( have_rows( 'content_blocks' ) ) {

	while ( have( 'content_blocks' ) ) {

		the_row();

		$content_block_image = get_sub_field('content_block_image');
		$content_block_header = get_sub_field('content_block_header');
		$content_block_copy = get_sub_field('content_block_copy');
		$content_block_cta = get_sub_field('content_block_cta');
		
		include( 'modules/content-block--grid' );
	}
}

// footer
get_footer();