<?php /* Template name: Revitalization Home */

// header
get_header();

// banner
include( get_template('banner.php') );

// foreach linked page, display 1/3 content block
include( get_template('content-block--thirds') );

// footer
get_footer();