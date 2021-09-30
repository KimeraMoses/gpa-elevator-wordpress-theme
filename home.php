<?php
get_header();











if ( is_archive() || is_home() || is_search() ) {
	get_template_part( '/template-parts/must-checkout' );
} elseif ( is_singular() ) {
	get_template_part( '/template-parts/news' );
} else {
	get_template_part( '/template-parts/navigation' );
}



get_footer();?>