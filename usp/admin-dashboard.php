<?php

Functions.php


/* Creating ACF Options Page */
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));
	
}
/**********/

function my_login_redirect( $url, $request, $user ){
if( $user && is_object( $user ) && is_a( $user, 'WP_User' ) ) {
if( $user->has_cap( 'administrator') or $user->has_cap( 'author')) {
$url = admin_url();
} else {
$url = home_url('/dashboard/');
}
}
return $url;
}
add_filter('login_redirect', 'my_login_redirect', 10, 3 );


function my_login_redirect( $url, $request, $user ){
    if( $user && is_object( $user ) && is_a( $user, 'WP_User' ) ) {
    if( $user->has_cap( 'administrator') or $user->has_cap( 'author')) {
    $url = admin_url();
    } else {
    $url = home_url('/custom-page /');
    }
    }
    return $url;
    }
    add_filter('login_redirect', 'my_login_redirect', 10, 3 );




/*REdirecting Users after Logout */
add_action('wp_logout','auto_redirect_after_logout');
function auto_redirect_after_logout(){
wp_redirect( home_url() );
exit();
}



/* https://firstsiteguide.com/how-to-redirect-users-in-wordpress/  */

add_action('template_redirect', 'redirect_search_result);
function redirect_search_result() {
if (is_search()) {
global $wp_query;
if ($wp_query->post_count == 1 && $wp_query->max_num_pages == 1) {
wp_redirect( get_permalink( $wp_query->posts['0']->ID ) );
exit;
}
}
}



/* Registering Elementor Location */

function theme_prefix_register_elementor_locations( $elementor_theme_manager ) {

	$elementor_theme_manager->register_location(
		'main-sidebar',
		[
			'label' => __( 'Main Sidebar', 'theme-name' ),
			'multiple' => true,
			'edit_in_content' => false,
		]
	);

}
add_action( 'elementor/theme/register_locations', 'theme_prefix_register_elementor_locations' );



/* Displaying the reistered location */

<?php get_header(); ?>

<div id="primary" class="content-area">

	<main id="main" class="site-main" role="main">
		<?php
		// Elementor `single` location
		if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'single' ) ) {
			get_template_part( 'template-parts/single' );
		}
		?>
	</main>

	<aside id="secondary" class="sidebar" role="complementary">
		<?php
		// Elementor `main-sidebar` location
		if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'main-sidebar' ) ) {
			get_sidebar( 'main' );
		}
		?>
	</aside>

</div>

<?php get_footer(); ?>

