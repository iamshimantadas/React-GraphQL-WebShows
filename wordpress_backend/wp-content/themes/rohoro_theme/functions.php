<?php
/*****************************************
* Weaver's Web Functions & Definitions *
*****************************************/
$functions_path = get_template_directory().'/functions/';
$post_type_path = get_template_directory().'/inc/post-types/';
$theme_function_path = get_template_directory().'/inc/theme-functions/';
/*--------------------------------------*/
/* Multipost Thumbnail Functions
/*--------------------------------------*/
require_once($functions_path.'multipost-thumbnail/multi-post-thumbnails.php');
if(class_exists('MultiPostThumbnails')){
	$types = array('page');
	foreach($types as $type){
		new MultiPostThumbnails(array(
			'label' => 'Top Banner Image',
			'id' => 'top-banner-image',
			'post_type' => $type
			));
		}		
	}
add_image_size('top-banner-size-image', 1920, 700,true);
/*--------------------------------------*/
/* Optional Panel Helper Functions
/*--------------------------------------*/

// require_once($functions_path.'admin-functions.php');
// require_once($functions_path.'admin-interface.php');
// require_once($functions_path.'theme-options.php');


// function weaversweb_ftn_wp_enqueue_scripts(){
//     if(!is_admin()){
//         wp_enqueue_script('jquery');
//         if(is_singular()and get_site_option('thread_comments')){
//             wp_print_scripts('comment-reply');
// 			}
// 		}
// 	}
// add_action('wp_enqueue_scripts','weaversweb_ftn_wp_enqueue_scripts');


function weaversweb_ftn_get_option($name){
    $options = get_option('weaversweb_ftn_options');
    if(isset($options[$name]))
        return $options[$name];
	}
function weaversweb_ftn_update_option($name, $value){
    $options = get_option('weaversweb_ftn_options');
    $options[$name] = $value;
    return update_option('weaversweb_ftn_options', $options);
}
function weaversweb_ftn_delete_option($name){
    $options = get_option('weaversweb_ftn_options');
    unset($options[$name]);
    return update_option('weaversweb_ftn_options', $options);
}
function get_theme_value($field){
	$field1 = weaversweb_ftn_get_option($field);
	if(!empty($field1)){
		$field_val = $field1;
		return	$field_val;
		}
	}
/*--------------------------------------*/
/* Post Type Helper Functions
/*--------------------------------------*/

// require_once($post_type_path.'services.php');

/*--------------------------------------*/
/* Theme Helper Functions
/*--------------------------------------*/


if(!function_exists('weaversweb_theme_setup')):
	function weaversweb_theme_setup(){
		add_theme_support('title-tag');
		add_theme_support('post-thumbnails');
		register_nav_menus(array(
			'primary' => __('Primary Menu','weaversweb'),
			'secondary'  => __('Secondary Menu','weaversweb'),
			));
		add_theme_support('html5',array('search-form','comment-form','comment-list','gallery','caption'));
		}
	endif;
add_action('after_setup_theme','weaversweb_theme_setup');


// function weaversweb_widgets_init(){
// 	register_sidebar(array(
// 		'name'          => __('Widget Area','weaversweb'),
// 		'id'            => 'sidebar-1',
// 		'description'   => __('Add widgets here to appear in your sidebar.','weaversweb'),
// 		'before_widget' => '<div id="%1$s" class="widget %2$s">',
// 		'after_widget'  => '</div>',
// 		'before_title'  => '<h2 class="widget-title">',
// 		'after_title'   => '</h2>',
// 		));
// 	}
// add_action('widgets_init','weaversweb_widgets_init');


// add_filter('comments_template','legacy_comments');
// function legacy_comments($file){
// 	if(!function_exists('wp_list_comments'))	$file = TEMPLATEPATH .'/legacy.comments.php';
// 	return $file;
// }




/** dev start - jan 13'25 */
function weaversweb_scripts(){
 // Enqueue CSS files
 wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
 wp_enqueue_style('fontawesome-css', get_template_directory_uri() . '/assets/css/fontawesome-all-min.css');
 wp_enqueue_style('slick-css', get_template_directory_uri() . '/assets/css/slick.css');
 wp_enqueue_style('slick-theme-css', get_template_directory_uri() . '/assets/css/slick-theme.css');
 wp_enqueue_style('custom-css', get_template_directory_uri() . '/assets/css/custom.css', time(),);

 // Enqueue JS files
 wp_enqueue_script('jquery');
 wp_enqueue_script('bootstrap-bundle-js', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array('jquery'), null, true);
 wp_enqueue_script('slick-js', get_template_directory_uri() . '/assets/js/slick.min.js', array('jquery'), null, true);
 wp_enqueue_script('font-awesome-all-js', get_template_directory_uri() . '/assets/js/font-awesome-all.min.js', array('jquery'), null, true);
 wp_enqueue_script('custom-js', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), time(), true);
 wp_localize_script('custom-js', 'ajax_params', array('ajax_url' => admin_url('admin-ajax.php')));
}
add_action('wp_enqueue_scripts','weaversweb_scripts');


/** svg support */
function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
  }
add_filter('upload_mimes', 'cc_mime_types');


/** post type - insights */
// function custom_post_type_insights() {
//     $supports = array(
//     'title', 
//     'editor', 
//     'author',
//     'thumbnail', 
//     'excerpt', 
//     'custom-fields', 
//     'comments',
//     'revisions', 
//     'post-formats',
//     );
//     $labels = array(
//     'name' => _x('Insights', 'plural'),
//     'singular_name' => _x('Insights', 'singular'),
//     'menu_name' => _x('Insights', 'admin menu'),
//     'name_admin_bar' => _x('Insights', 'admin bar'),
//     'add_new' => _x('Add New', 'add new'),
//     'add_new_item' => __('Add New Insight'),
//     'new_item' => __('New Insight'),
//     'edit_item' => __('Edit Insights'),
//     'view_item' => __('View Insights'),
//     'all_items' => __('All Insights'),
//     'search_items' => __('Search Insights'),
//     'not_found' => __('No Insights found.'),
//     );
//     $args = array(
//     'supports' => $supports,
//     'labels' => $labels,
//     'public' => true,
//     'query_var' => true,
// 	'menu_icon' => 'dashicons-welcome-write-blog',
//     'rewrite' => array('slug' => 'insights'),
//     'has_archive' => true,
//     'hierarchical' => false,
// 	'show_in_menu' => true,  // Ensure this is set to true    
//     );
//     register_post_type('insights', $args);
//     }
// add_action('init', 'custom_post_type_insights');




function load_more_companies() {
    $page_id = $_POST['page_id'];
    $offset = (int) $_POST['offset'];
    $limit = 6; // Posts per load
    $total_companies = count(get_field('companies', $page_id)); // Get total count of posts
	$no_image = get_template_directory_uri()."/assets/images/no_image.jpg";

    if (have_rows('companies', $page_id)) :
        $i = 0;
        $output = '';

        while (have_rows('companies', $page_id)) : the_row();
            if ($i >= $offset && $i < $offset + $limit) {
                $output .= '<div class="col-lg-4 col-md-6 company-box-col">
                    <div class="company-box position-relative">
                        <div class="company-box-inner position-relative">
                            <div class="icon-outer mb-50">
                                <div class="icon">
                                    <img src="' . (get_sub_field('companies_company_logo') ? get_sub_field('companies_company_logo') : $no_image) . '" alt="">
                                </div>
                            </div>
                            <div class="company-title">
                                <h3>' . get_sub_field('companies_company_name') . '</h3>
                            </div>
                            <div class="company-description">
                                <p>' . get_sub_field('companies_short_description') . '</p>
                            </div>
                            <div class="company-button">
                                <a href="' . get_sub_field('companies_button_url') . '" class="button__primary" target="_blank">
                                    <span>' . get_sub_field('companies_button_title') . '</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>';
            }
            $i++;
        endwhile;

        // Determine if there are more posts left
        $has_more = ($offset + $limit < $total_companies) ? 1 : 0;


        echo json_encode(array('html' => $output, 'has_more' => $has_more));
    endif;

    wp_die();
}

add_action('wp_ajax_load_more_companies', 'load_more_companies');
add_action('wp_ajax_nopriv_load_more_companies', 'load_more_companies');




function load_more_posts() {
    $paged = $_POST['page'] + 1;
    $category = $_POST['category'];

    $args = array(
        'post_type' => 'post',
        'paged' => $paged,
        'category_name' => $category,
        'posts_per_page' => 4,
    );

    $query = new WP_Query($args);

    if ($query->have_posts()):
        $vid_id=5;
        while ($query->have_posts()): $query->the_post();
        $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
                            $no_image = get_template_directory_uri() . "/assets/images/no_image.jpg";
                            $video = get_field('upload_video_file', get_the_ID());
	$youtube_video_link = get_field('youtube_video_link', get_the_ID());
            ?>
             <div class="col-md-6 card-box-col">
                                    <div class="card-box">
                                    <?php if ($video_file) { ?>
                                          <div class="card-video card-image image-adjustment">
                                             <video controls id="<?php echo "video-".$vid_id; ?>" onplay="VideoFunc(<?php echo $vid_id; ?>)">
                                                <source src="<?php echo $video_file; ?>" type="video/mp4">
                                             </video>
                                          </div>
										<?php } elseif ($youtube_video_link) { ?>
										<iframe width="100%" height="240" src="<?php echo $youtube_video_link; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                       <?php } else { ?>
                                          <div class="card-image image-adjustment">
                                             <img src="<?php echo $thumbnail[0] ? $thumbnail[0] : $no_image; ?>" alt="<?php echo get_the_title(); ?>">
                                          </div>
                                       <?php } ?>   
                                        <div class="date-wrap">
                                            <p>
                                                <?php echo get_the_date(); ?>
                                            </p>
                                        </div>
                                        <div class="title">
                                            <h3><?php echo get_the_title(); ?></h3>
                                        </div>
                                        <div class="card-info-wrap">
                                            <p>
                                                <?php echo substr(get_the_content(), 0, 100)."..."; ?>
                                            </p>
                                        </div>
                                        <div class="card-button">
                                            <?php $external_article_link = get_field('external_article_link', get_the_ID());
								  if(empty($youtube_video_link)) { ?>
                                       <div class="card-button">
										   <?php if(!empty($external_article_link)) { ?>
										   <a target="_blank" href="<?php echo $external_article_link; ?>" class="button__primary"><span>Read More</span></a>
										   <?php } else { ?>
										   <a href="<?php echo get_the_permalink(); ?>" class="button__primary"><span>Read More</span></a>
										   <?php } ?>
                                       </div>
										<?php } ?>
                                        </div>
                                    </div>
                                </div>
            <?php
            $vid_id++;
        endwhile;
    else:
        echo ''; // Return empty response to indicate no more posts
    endif;

    wp_reset_postdata();
    die();
}

add_action('wp_ajax_load_more_posts', 'load_more_posts');
add_action('wp_ajax_nopriv_load_more_posts', 'load_more_posts');
