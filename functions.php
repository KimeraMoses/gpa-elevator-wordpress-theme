

<?php



/*============================================
   * LOADING STYLES INTO THE SITE *
============================================ */

function load_gpa_stylesheets()
{

    wp_register_style('bootstrap', get_template_directory_uri(). '/css/bootstrap.min.css', array(), false, 'all');
    wp_enqueue_style('bootstrap');

	wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/css/owl.carousel.css' );
	wp_enqueue_style( 'owl-theme-default', get_template_directory_uri() . '/css/owl.theme.default.css' );
	wp_enqueue_style( 'fontawasome', get_template_directory_uri() . '/fontawesome/css/all.css' );
	wp_enqueue_style( 'msnb', get_template_directory_uri() . '/css/msnb_style.min.css' );
	// wp_enqueue_style( 'post', get_template_directory_uri() . '/css/post.css' );
    //wp_enqueue_style( 'sb-admin-2', get_template_directory_uri() . '/css/sb-admin-2.css' );
    
    /****CUSTOM CSS FILES *****/
	wp_enqueue_style( 'custom', get_template_directory_uri() . '/custom.css' );
	wp_enqueue_style( 'style', get_template_directory_uri() . '/css/style.css' );
	wp_enqueue_style( 'navigation', get_template_directory_uri() . '/css/navigation.min.css' );
	wp_enqueue_style( 'main', get_template_directory_uri() . '/css/main.min.css' );
	wp_enqueue_style( 'nav-menu', get_template_directory_uri() . '/css/nav-menu.min.css' );
	wp_enqueue_style( 'media-queries', get_template_directory_uri() . '/css/media-queries.css' );

}
add_action('wp_enqueue_scripts', 'load_gpa_stylesheets');



/*============================================
   * LOADING JS INTO THE SITE *
============================================ */
function load_gpa_js()
{
    
    wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery.js', array(),1, true);


    wp_enqueue_script('gpa-popper', get_template_directory_uri() . '/js/popper.min.js', array(), '', true );
    wp_enqueue_script('gpa-bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '', true );
    wp_enqueue_script('fontawesome', get_template_directory_uri() . '/js/all.js', array(), '', true );
    wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/js/owl.carousel.js', array(), '', true );
    wp_enqueue_script('sb-admin-2', get_template_directory_uri() . '/js/sb-admin-2.js', array(), '', true );
    
	/********Custom files *********/
	// wp_enqueue_script('elevator', get_template_directory_uri() . '/js/elevator.js', array(),1, true);
	wp_enqueue_script('custom', get_template_directory_uri() . '/js/custom.js', array(),1, true);

}
add_action('wp_enqueue_scripts', 'load_gpa_js');



/*============================================
   * DEFINING STANDARD iMGAGE SIZES INTO THE SITE *
============================================ */
add_image_size('smallest',360,240,true);
// add_image_size('biggest',800,800,true);



/*============================================
   * ADDING THEME SUPPORT *
============================================ */

add_theme_support('widgets');
add_theme_support( 'title-tag' );
add_theme_support('menus');
add_theme_support('post-thumbnails');
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'customize-selective-refresh-widgets' );
add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );


//Add support for core custom logo.
add_theme_support( 'custom-logo', array(
	'height'      => '',
	'width'       => '',
    'flex-width'  => true,
    'flex-height' => true,
    'header-text' => array( 'site-title', 'site-description' ),
) );

add_theme_support( 'custom-header' );
$defaults = array(
    'default-image'          => '',
    'random-default'         => false,
    'width'                  => 0,
    'height'                 => 0,
    'flex-height'            => true,
    'flex-width'             => true,
    'default-text-color'     => '',
    'header-text'            => true,
    'uploads'                => true,
    'wp-head-callback'       => '',
    'admin-head-callback'    => '',
    'admin-preview-callback' => '',
    'video'                  => false,
    'video-active-callback'  => 'is_front_page',
);
add_theme_support( 'custom-header', $defaults );



// tn Limit Excerpt Length by number of Words
function excerpt( $limit ) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'[...]';
    } else {
    $excerpt = implode(" ",$excerpt);
    }
    $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
    return $excerpt;
    }
    function content($limit) {
    $content = explode(' ', get_the_content(), $limit);
    if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'[...]';
    } else {
    $content = implode(" ",$content);
    }
    $content = preg_replace('/[.+]/','', $content);
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]&gt;', $content);
    return $content;
    }
    

/*============================================
   * REGISTERING MENU LOCATIONS *
============================================ */

register_nav_menus(


	array(
        'top-menu' => __('Top Menu', 'gpa_elevator'),
        'main-menu' => __('Main Menu', 'gpa_elevator'),
        'footer-menu' => __('Footer Menu', 'gpa_elevator')
	)
);

/*============================================
   * REGISTER WIDGETS *
============================================ */

function gpa__sidebars() {
    register_sidebar( array(
        'name'          => __( 'Gpa Elevator Right Sidebar', 'gpa_elevator' ),
        'id'            => 'gpa-sidebar-right',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );
 
    register_sidebar( array(
        'name'          => __( 'Gpa Elevator Left Sidebar', 'gpa_elevator' ),
        'id'            => 'sidebar-2',
        'before_widget' => '<ul><li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li></ul>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Gpa Elevator Footer 1', 'gpa_elevator' ),
        'id'            => 'gpa__footer_1',
        'before_widget' => '<aside id="%1$s" class="gpa__footer widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Gpa Elevator Footer 2', 'gpa_elevator' ),
        'id'            => 'gpa__footer_2',
        'before_widget' => '<ul><li id="%1$s" class="gpa__footer widget %2$s">',
        'after_widget'  => '</li></ul>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );
    // register_sidebar( array(
    //     'name'          => __( 'Gpa Footer 2', 'gpa_elevator' ),
    //     'id'            => 'gpa__footer_2',
    //     'before_widget' => '<aside id="%1$s" class="gpa__footer widget %2$s">',
    //     'after_widget'  => '</aside>',
    //     'before_title'  => '<h4 class="widget-title">',
    //     'after_title'   => '</h4>',
    // ) );
    
    register_sidebar( array(
        'name'          => __( 'Gpa Elevator Footer 3', 'gpa_elevator' ),
        'id'            => 'gpa__footer_3',
        'before_widget' => '<aside id="%1$s" class="gpa__footer widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Gpa Elevator Footer 4', 'gpa_elevator' ),
        'id'            => 'gpa__footer_4',
        'before_widget' => '<aside id="%1$s" class="gpa__footer widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );
}
add_action('widgets_init','gpa__sidebars');



/*============================================
   * NAVIGATION MENU *
============================================ */
class CSS_Menu_Walker extends Walker {

	var $db_fields = array('parent' => 'menu_item_parent', 'id' => 'db_id');
	
	function start_lvl(&$output, $depth = 0, $args = array()) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul>\n";
	}
	
	function end_lvl(&$output, $depth = 0, $args = array()) {
		$indent = str_repeat("\t", $depth);
		$output .= "$indent</ul>\n";
	}
	
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
	
		global $wp_query;
		$indent = ($depth) ? str_repeat("\t", $depth) : '';
		$class_names = $value = '';
		$classes = empty($item->classes) ? array() : (array) $item->classes;
		
		/* Add active class */
		if (in_array('current-menu-item', $classes)) {
			$classes[] = 'active';
			unset($classes['current-menu-item']);
		}
		
		/* Check for children */
		$children = get_posts(array('post_type' => 'nav_menu_item', 'nopaging' => true, 'numberposts' => 1, 'meta_key' => '_menu_item_menu_item_parent', 'meta_value' => $item->ID));
		if (!empty($children)) {
			$classes[] = 'has-sub';
		}
		
		$class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
		$class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
		
		$id = apply_filters('nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args);
		$id = $id ? ' id="' . esc_attr($id) . '"' : '';
		
		$output .= $indent . '<li' . $id . $value . $class_names .'>';
		
		$attributes  = ! empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) .'"' : '';
		$attributes .= ! empty($item->target)     ? ' target="' . esc_attr($item->target    ) .'"' : '';
		$attributes .= ! empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn       ) .'"' : '';
		$attributes .= ! empty($item->url)        ? ' href="'   . esc_attr($item->url       ) .'"' : '';
		
		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'><span>';
		$item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
		$item_output .= '</span></a>';
		$item_output .= $args->after;
		
		$output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
	}
	
	function end_el(&$output, $item, $depth = 0, $args = array()) {
		$output .= "</li>\n";
	}

}

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);


function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce', array(
        'thumbnail_image_width' => 150,
        'single_image_width'    => 300,

        'product_grid'          => array(
            'default_rows'    => 3,
            'min_rows'        => 2,
            'max_rows'        => 8,
            'default_columns' => 4,
            'min_columns'     => 2,
            'max_columns'     => 5,
        ),
    ) );
}

add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );




/*============================================
   * POST VIEWS*
============================================ */

//Set the Post Custom Field in the WP dashboard as Name/Value pair 
function gpa_PostViews($post_ID) {
 
    //Set the name of the Posts Custom Field.
    $count_key = 'post_views_count'; 
     
    //Returns values of the custom field with the specified key from the specified post.
    $count = get_post_meta($post_ID, $count_key, true);
     
    //If the the Post Custom Field value is empty. 
    if($count == ''){
        $count = 0; // set the counter to zero.
         
        //Delete all custom fields with the specified key from the specified post. 
        delete_post_meta($post_ID, $count_key);
         
        //Add a custom (meta) field (Name/value)to the specified post.
        add_post_meta($post_ID, $count_key, '0');
        return $count . ' View';
     
    //If the the Post Custom Field value is NOT empty.
    }else{
        $count++; //increment the counter by 1.
        //Update the value of an existing meta key (custom field) for the specified post.
        update_post_meta($post_ID, $count_key, $count);
         
        //If statement, is just to have the singular form 'View' for the value '1'
        if($count == '1'){
        return $count . ' View';
        }
        //In all other cases return (count) Views
        else {
        return $count . ' Views';
        }
    }
}

 
//Gets the  number of Post Views to be used later.
function get_PostViews($post_ID){
    $count_key = 'post_views_count';
    //Returns values of the custom field with the specified key from the specified post.
    $count = get_post_meta($post_ID, $count_key, true);
 
    return $count;
}
 
//Function that Adds a 'Views' Column to your Posts tab in WordPress Dashboard.
function post_column_views($newcolumn){
    //Retrieves the translated string, if translation exists, and assign it to the 'default' array.
    $newcolumn['post_views'] = __('Views');
    return $newcolumn;
}
 
//Function that Populates the 'Views' Column with the number of views count.
function post_custom_column_views($column_name, $id){
     
    if($column_name === 'post_views'){
        // Display the Post View Count of the current post.
        // get_the_ID() - Returns the numeric ID of the current post.
        echo get_PostViews(get_the_ID());
    }
}
//Hooks a function to a specific filter action.
//applied to the list of columns to print on the manage posts screen.
add_filter('manage_posts_columns', 'post_column_views');
 
//Hooks a function to a specific action. 
//allows you to add custom columns to the list post/custom post type pages.
//'10' default: specify the function's priority.
//and '2' is the number of the functions' arguments.
add_action('manage_posts_custom_column', 'post_custom_column_views',10,2);



/*
  =======================================
     SETTING TIME FORMAT TO TIME AGO
  =======================================
*/



 
add_filter( 'get_the_date', 'gpa__time_format', 10, 1 ); //override date display
add_filter( 'the_date', 'gpa__time_format', 10, 1 ); //override date display
add_filter( 'get_the_time', 'gpa__time_format', 10, 1 ); //override time display
add_filter( 'the_time', 'gpa__time_format', 10, 1 ); //override time display
 
/* Callback function for post time and date filter hooks */
function gpa__time_format( $orig_time ) {
	global $post;
	$orig_time = strtotime( $post->post_date ); 
	return human_time_diff( $orig_time, current_time( 'timestamp' ) ).' '.__( 'ago' );
}



add_action('pre_get_posts', 'ci_paging_request');
function ci_paging_request($wp)
{
	//We don't want to mess with the admin panel.
	if(is_admin()) return;

	$num = get_option('posts_per_page', 15);

	if( is_home() )
		$num = 3;

	if( is_archive() )
		$num = 18;

	if( is_category() or is_tag() )
		$num = 18;

	//if( is_category('blog') )
		//$num = -1; // -1 means No limit

	if( ! isset( $wp->query_vars['posts_per_page'] ) and is_main_query() )
	{
		$wp->query_vars['posts_per_page'] = $num;
	}
}



/*
  ==========================
    MINIFYING CODE
  ==========================
*/
class FLHM_HTML_Compression
{
protected $flhm_compress_css = true;
protected $flhm_compress_js = true;
protected $flhm_info_comment = true;
protected $flhm_remove_comments = true;
protected $html;
public function __construct($html)
{
if (!empty($html))
{
$this->flhm_parseHTML($html);
}
}
public function __toString()
{
return $this->html;
}
protected function flhm_bottomComment($raw, $compressed)
{
$raw = strlen($raw);
$compressed = strlen($compressed);
$savings = ($raw-$compressed) / $raw * 100;
$savings = round($savings, 2);
return '<!--HTML compressed, size saved '.$savings.'%. From '.$raw.' bytes, now '.$compressed.' bytes-->';
}
protected function flhm_minifyHTML($html)
{
$pattern = '/<(?<script>script).*?<\/script\s*>|<(?<style>style).*?<\/style\s*>|<!(?<comment>--).*?-->|<(?<tag>[\/\w.:-]*)(?:".*?"|\'.*?\'|[^\'">]+)*>|(?<text>((<[^!\/\w.:-])?[^<]*)+)|/si';
preg_match_all($pattern, $html, $matches, PREG_SET_ORDER);
$overriding = false;
$raw_tag = false;
$html = '';
foreach ($matches as $token)
{
$tag = (isset($token['tag'])) ? strtolower($token['tag']) : null;
$content = $token[0];
if (is_null($tag))
{
if ( !empty($token['script']) )
{
$strip = $this->flhm_compress_js;
}
else if ( !empty($token['style']) )
{
$strip = $this->flhm_compress_css;
}
else if ($content == '<!--wp-html-compression no compression-->')
{
$overriding = !$overriding; 
continue;
}
else if ($this->flhm_remove_comments)
{
if (!$overriding && $raw_tag != 'textarea')
{
$content = preg_replace('/<!--(?!\s*(?:\[if [^\]]+]|<!|>))(?:(?!-->).)*-->/s', '', $content);
}
}
}
else
{
if ($tag == 'pre' || $tag == 'textarea')
{
$raw_tag = $tag;
}
else if ($tag == '/pre' || $tag == '/textarea')
{
$raw_tag = false;
}
else
{
if ($raw_tag || $overriding)
{
$strip = false;
}
else
{
$strip = true; 
$content = preg_replace('/(\s+)(\w++(?<!\baction|\balt|\bcontent|\bsrc)="")/', '$1', $content); 
$content = str_replace(' />', '/>', $content);
}
}
} 
if ($strip)
{
$content = $this->flhm_removeWhiteSpace($content);
}
$html .= $content;
} 
return $html;
} 
public function flhm_parseHTML($html)
{
$this->html = $this->flhm_minifyHTML($html);
if ($this->flhm_info_comment)
{
$this->html .= "\n" . $this->flhm_bottomComment($html, $this->html);
}
}
protected function flhm_removeWhiteSpace($str)
{
$str = str_replace("\t", ' ', $str);
$str = str_replace("\n",  '', $str);
$str = str_replace("\r",  '', $str);
while (stristr($str, '  '))
{
$str = str_replace('  ', ' ', $str);
}   
return $str;
}
}
function flhm_wp_html_compression_finish($html)
{
return new FLHM_HTML_Compression($html);
}
function flhm_wp_html_compression_start()
{
ob_start('flhm_wp_html_compression_finish');
}
add_action('get_header', 'flhm_wp_html_compression_start');




/*============================================
   * SINGLE POST TEMPLATE BASED ON CATEGORY*
============================================ */
function get_custom_cat_template($single_template) {
    global $post;
    if ( in_category( 'notice-board' )) {
       $single_template = dirname( __FILE__ ) . '/single-notice-board.php';
    }
    return $single_template;
 } 
 add_filter( "single_template", "get_custom_cat_template" ) ;
 