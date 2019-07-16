<?php

if ( ! function_exists('Rence_setup') ) {
	function Rence_setup(){

		add_theme_support('post-thumbnails');

		add_theme_support('post-formats', array('aside','image','video'));

		add_theme_support('html5', array('comment-list', 'comment-form', 'search-form'));

		add_theme_support( 'title-tag' );

		// add_theme_support('custom-background');

		 $args = array(
	        'flex-width'    => true,
	        'width'         => 1400,
	        'flex-height'   => true,
	        'height'        => 200
	    );
	    add_theme_support( 'custom-header', $args );
	}
	add_action( 'after_setup_theme', 'Rence_setup' );
}

/*Include Scripts*/
function rence_script_enqueue(){

	// CSS Styles
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/dist/css/bootstrap.min.css', array(), '4.1.3', 'all' );
	wp_enqueue_style( 'customstyle', get_template_directory_uri() . '/assets/dist/css/main.min.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'fontawsome', get_template_directory_uri() . '/assets/dist/css/fonts/font-awesome.min.css' );
	wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/dist/css/slick.min.css', array(), '4.1.1', 'all' );
	wp_enqueue_style( 'slicktheme', get_template_directory_uri() . '/assets/dist/css/slick-theme.min.css', array(), '4.1.1', 'all' );

	// JS Scripts
	wp_enqueue_script( 'bootstrapjs', get_template_directory_uri() . '/assets/dist/js/bootstrap.min.js', array('jquery'), '4.1.3', true );
	wp_enqueue_script ("my-ajax-handle", get_template_directory_uri() . "/assets/dist/js/ajax.js", array('jquery'));
	wp_localize_script('my-ajax-handle', 'the_ajax_script', array('ajaxurl' =>admin_url('admin-ajax.php')));
	wp_enqueue_script( 'custom', get_template_directory_uri(). '/assets/dist/js/main.js', array(), '1.1.1', true );
	wp_enqueue_script( 'slickjs', get_template_directory_uri() . '/assets/dist/js/slick.min.js', array(), '4.1.1', true );
	wp_enqueue_script( 'slicksjs', get_template_directory_uri() . '/assets/dist/js/slick1.min.js', array(), '4.1.1', true );
	wp_enqueue_script( 'slickscript', get_template_directory_uri() . '/assets/dist/js/scripts.js', array(), '4.1.1', true );
}

add_action( 'wp_enqueue_scripts', 'rence_script_enqueue' );

function Rence_theme_setup(){

	add_theme_support( 'menus' );
	register_nav_menu( 'main', 'Main Navigation' );
	register_nav_menu('header', 'Header and Footer Navigation');

}

add_action( 'init', 'Rence_theme_setup' );

add_filter('wp_nav_menu_items', 'add_search_form', 10, 2);

// Display fontawesome search icon in menus and toggle search form

function add_search_form($items, $args) {
if( $args->theme_location == 'main' )
       $items .= '<li class="search d-xs-none nav-item"><a class="search_icon nav-link dropdown-item"><i class="fa fa-search pl-1 pr-1"></i></a><div style="display:none;" class="spicewpsearchform">'. get_search_form(false) .'</div></li>';
       return $items;
}

require get_template_directory() . '/assets/inc/breadcrumb.php';
require get_template_directory() . '/assets/inc/walker.php';
require get_template_directory() . '/assets/inc/customizer.php';

/*Comment Count Function*/
function comment_count(){
	$comments_num = get_comments_number();
	if(comments_open()){
		if( $comments_num == 0 ){
			$comments = __(' 0 Comments');
		} elseif ( $comments_num > 1 ) {
			$comments = $comments_num . __(' Comments');
		} else{
			$comments = __( ' 1 Comment' );
		}
		$comments = '<a class="comment" href="'.get_comments_link().'">' .$comments.'</a>';
	} else{
		$comments = __('Comments are closed!');
	}

	return $comments;
}

/*Excerpt*/
function excerpt($limit) {
      $excerpt = explode(' ', get_the_excerpt(), $limit);

      if (count($excerpt) >= $limit) {
          array_pop($excerpt);
          $excerpt = implode(" ", $excerpt) . '...';
      } else {
          $excerpt = implode(" ", $excerpt);
      }

      $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);

      return $excerpt;
}

/*Sidebar Functions*/
function awsome_widget_setup(){
	
		register_sidebar(
		array(
			'name'			=> 'Sidebar left',
			'id'			=> 'sidebar-left',
			'class'			=> 'custom_left',
			'description' 	=> 'Right Sidebar',
			'before_widget' => '<div class="division mb-3"><aside id="%1$s" class="%2$s">',
			'after_widget' 	=> '</aside></div>',
			'before_title' 	=> '<div class="title-content-bg"><div class="titles p-2 mb-0">',
			'after_title'	=> '</div></div>',
		)

	);

		register_sidebar(
		array(
			'name'			=> 'Sidebar right',
			'id'			=> 'sidebar-right',
			'class'			=> 'custom_right',
			'description' 	=> 'Right Sidebar',
			'before_widget' => '<div class="division mb-3"><aside id="%1$s" class="%2$s">',
			'after_widget' 	=> '</aside></div>',
			'before_title' 	=> '<div class="title-content-bg"><div class="titles p-2 mb-0">',
			'after_title'	=> '</div></div>',
		)
	);

		register_sidebar( 
		array(
			'name'			=> 'Custom Header Widget Area',
			'id'			=> 'sidebar-header',
			'class'			=> 'custom_header_widget',
			'description'	=> 'This widget is for banner ads only',
			'before_widget'	=> '<aside class="chw-widget %2$s">',
			'after_widget'	=> '</aside>',
			'before_title'	=> '<div class="title-content-bg"><div class="titles p-2 mb-0">',
			'after_title'	=> '</div></div>'
		)
	);

		register_sidebar( 
		array(
			'name'			=> 'Footer Widget one',
			'id'			=> 'footer-one',
			'class'			=> 'footer_widget_one',
			'description'	=> 'This widget will be display on one side of Footer',
			'before_widget'	=> '<aside class="footer_widget_one %2$s" id="%1$s">',
			'after_widget'	=> '</aside>',
			'before_title'	=> '<div class="title-content-bg-footer"><div class="footer-title-one">',
			'after_title'	=> '</div></div>'
		)
	);

		register_sidebar( 
		array(
			'name'			=> 'Footer Widget two',
			'id'			=> 'footer-two',
			'class'			=> 'footer_widget_two',
			'description'	=> 'This widget will be display on two side of Footer',
			'before_widget'	=> '<aside class="footer_widget_two %2$s" id="%1$s">',
			'after_widget'	=> '</aside>',
			'before_title'	=> '<div class="title-content-bg-footer"><div class="footer-title-two">',
			'after_title'	=> '</div></div>'
		)
	);

		register_sidebar( 
		array(
			'name'			=> 'Footer Widget three',
			'id'			=> 'footer-three',
			'class'			=> 'footer_widget_three',
			'description'	=> 'This widget will be display on three side of Footer',
			'before_widget'	=> '<aside class="footer_widget_three %2$s" id="%1$s">',
			'after_widget'	=> '</aside>',
			'before_title'	=> '<div class="title-content-bg-footer"><div class="footer-title-three">',
			'after_title'	=> '</div></div>'
		)
	);

		register_sidebar( 
		array(
			'name'			=> 'Footer Widget four',
			'id'			=> 'footer-four',
			'class'			=> 'footer_widget_four',
			'description'	=> 'This widget will be display on four side of Footer',
			'before_widget'	=> '<aside class="footer_widget_four %2$s" id="%1$s">',
			'after_widget'	=> '</aside>',
			'before_title'	=> '<div class="title-content-bg-footer"><div class="footer-title-four">',
			'after_title'	=> '</div></div>'
		)
	);

}

add_action('widgets_init', 'awsome_widget_setup');


// / Blog URL /
function force_relative_url(){
// get host name from URL
preg_match("/^(http:\/\/)?([^\/]+)/i",home_url(), $matches);
$host = $matches[2];
// get last two segments of host name
preg_match("/[^\.\/]+\.[^\.\/]+$/", $host, $matches);
return strtoupper($matches[0]);
}

/* Pagination */

function pagination($pages = '', $range = 4) {
     $showitems = ($range * 2)+1;  
 
     global $paged;
     if(empty($paged)) $paged = 1;
 
     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   
 
     if(1 != $pages)
     {
         echo "<nav class='pagination-nav' aria-label='Page navigation example'><ul class=\"pagination center-align\">";
         // if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li class=\"mr-2 page-item waves-effect\"><a class='page-link' href='".get_pagenum_link(1)."'><i class='mr-2 fa fa-chevron-left text-white' style='font-size:15px'></i></a></li>";
         if($paged > 1 && $showitems < $pages) echo "<li class=\"mr-2 page-item waves-effect\"><a class='page-link' href='".get_pagenum_link($paged - 1)."'><i class='mr-2 fa fa-chevron-left text-white' style='font-size:15px'></i></a></li>";
 
         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<li class=\"page-item mr-2 active\"><a href=\"\" class=\"page-link white-text\">".$i."</a></li>":"<li class=\"page-item mr-2 waves-effect\"><a class='page-link' href='".get_pagenum_link($i)."'>".$i."</a></li>";
             }
         }
 
         if ($paged < $pages && $showitems < $pages) echo "<li class=\"page-item waves-effect\"><a class='page-link' href=\"".get_pagenum_link($paged + 1)."\"><i class='fa fa-chevron-right' style='font-size:15px'></i></a></li>";  
         // if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<li class=\"page-item waves-effect\"><a class='page-link' href='".get_pagenum_link($pages)."'>Last &raquo;</a><li>";
         // echo "</ul></nav>\n";
     }
}


/*Hentry Function*/
function post_class_remove_hentry( $post_class ) {
        $post_class = array_diff( $post_class, array( 'hentry' ) );
        return $post_class;
}

/**
 * Menu fallback. Link to the menu editor if that is useful.
 *
 * @param  array $args
 * @return string
 */
function link_to_menu_editor( $args )
{
    if ( ! current_user_can( 'manage_options' ) )
    {
        return;
    }

    // see wp-includes/nav-menu-template.php for available arguments
    extract( $args );

    $link = $link_before
        . '<a class="nav-link" href="' .admin_url( 'nav-menus.php' ) . '">' . $before . 'Add a menu' . $after . '</a>'
        . $link_after;

    // We have a list
    if ( FALSE !== stripos( $items_wrap, '<ul' )
        or FALSE !== stripos( $items_wrap, '<ol' )
    )
    {
        $link = "<li class='nav-item'>$link</li>";
    }

    $output = sprintf( $items_wrap, $menu_id, $menu_class, $link );
    if ( ! empty ( $container ) )
    {
        $output  = "<$container class='$container_class' id='$container_id'>$output</$container>";
    }

    if ( $echo )
    {
        echo $output;
    }

    return $output;
}

/**
 * Remove parts of the Options menu we don't use.
 *
 * @param WP_Customize_Manager $wp_customize Customizer manager.
 */
function de_register( $wp_customize ) {
    $wp_customize->remove_control('display_header_text');
}
add_action( 'customize_register', 'de_register', 11 );


// View Count for Posts
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count;
}
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
// Remove issues with prefetching adding extra views
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);



/*Custom Archive Widget*/
class custom_archive_widegt extends WP_Widget{
	// setup the widget name, description, etc.....
	public function __construct(){
		$widget_ops = array(
			'classname' 	=> 'custom-archive-widget-container',
			'description'	=> 'Custom Archive Widget',
		);
		parent::__construct( 'custom_archive', 'Custom Archive', $widget_ops );
	}
	// backend display of widget
	public function form( $instance ) {
		$title = ( !empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : 'Custom Archive' );
		$total = ( !empty( $instance[ 'tot' ] ) ? absint( $instance[ 'tot' ] ) : 4 );

		$output  = '<p>';
		$output .= '<label for="'.esc_attr( $this->get_field_id('title') ).'">Title:</label>';
		$output .= '<input type="text" class="widefat" id="'.esc_attr( $this->get_field_id('title') ).'" name="'.esc_attr( $this->get_field_name('title') ).'" value="'.esc_attr( $title ).'"';
		$output .= '</p>';

		$output  .= '<p>';
		$output .= '<label for="'.esc_attr( $this->get_field_id('tot') ).'">Select Date:</label>';
		// $output .= '<input type="number" class="widefat" id="'.esc_attr( $this->get_field_id('tot') ).'" name="'.esc_attr( $this->get_field_name('tot') ).'" value="'.esc_attr( $total ).'"';
		$output .= '</p>';

		echo $output;
	}

	// update widget
	public function update( $new_instance, $old_instance ){
		$instance = array();
		$instance[ 'title' ] = ( !empty( $new_instance[ 'title' ] ) ? strip_tags( $new_instance[ 'title' ] ) : '' );
		$instance[ 'tot' ] = ( !empty( $new_instance[ 'tot' ] ) ? absint( strip_tags( $new_instance[ 'tot' ] ) ) : 0 );

		return $instance;
	}

	// Frontend display Widget
	public function widget( $args, $instance ){

		$total = absint( $instance[ 'tot' ] );
		$post_args = array(
			'post_type'		 		=> 'post',
			'posts_per_page' 		=> $total,
			'ignore_sticky_posts'	=> 1
		);

		$posts_query = new WP_Query( $post_args );

		echo $args[ 'before_widget' ];
		if ( !empty( $instance[ 'title' ] ) ){
			echo $args[ 'before_title' ] . apply_filters( 'widget_title', $instance[ 'title' ] ) . $args[ 'after_title' ] ;
		}

		if ( $posts_query->have_posts() ) {
			echo "<div class='custom-archive-widget'>";

				$posts_query->the_post();
				
					get_template_part( 'sidebar/sidebar', 'archive' );
				

			echo "</div>";
		}

		echo $args[ 'after_widget' ];
	}
}
add_action( 'widgets_init', function(){
	register_widget( 'custom_archive_widegt' );
} );

/*Custom Recent Comment Widget*/
class custom_recent_comment extends WP_Widget{
	// setup the widget name, description, etc.....
	public function __construct(){
		$widget_ops = array(
			'classname' 	=> 'custom-comments-widget-container',
			'description'	=> 'Custom Comments Widget',
		);
		parent::__construct( 'custom_comments', 'Custom Comments', $widget_ops );
	}
	// backend display of widget
	public function form( $instance ) {
		$title = ( !empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : 'Custom Comments' );
		$total = ( !empty( $instance[ 'tot' ] ) ? absint( $instance[ 'tot' ] ) : 4 );

		$output  = '<p>';
		$output .= '<label for="'.esc_attr( $this->get_field_id('title') ).'">Title:</label>';
		$output .= '<input type="text" class="widefat" id="'.esc_attr( $this->get_field_id('title') ).'" name="'.esc_attr( $this->get_field_name('title') ).'" value="'.esc_attr( $title ).'"';
		$output .= '</p>';

		$output  .= '<p>';
		// $output .= '<label for="'.esc_attr( $this->get_field_id('tot') ).'">Select Date:</label>';
		// $output .= '<input type="number" class="widefat" id="'.esc_attr( $this->get_field_id('tot') ).'" name="'.esc_attr( $this->get_field_name('tot') ).'" value="'.esc_attr( $total ).'"';
		$output .= '</p>';

		echo $output;
	}

	// update widget
	public function update( $new_instance, $old_instance ){
		$instance = array();
		$instance[ 'title' ] = ( !empty( $new_instance[ 'title' ] ) ? strip_tags( $new_instance[ 'title' ] ) : '' );
		$instance[ 'tot' ] = ( !empty( $new_instance[ 'tot' ] ) ? absint( strip_tags( $new_instance[ 'tot' ] ) ) : 0 );

		return $instance;
	}

	// Frontend display Widget
	public function widget( $args, $instance ){

		$total = absint( $instance[ 'tot' ] );
		$post_args = array(
			'post_type'		 		=> 'post',
			'posts_per_page' 		=> $total,
			'ignore_sticky_posts'	=> 1
		);

		$posts_query = new WP_Query( $post_args );

		echo $args[ 'before_widget' ];
		if ( !empty( $instance[ 'title' ] ) ){
			echo $args[ 'before_title' ] . apply_filters( 'widget_title', $instance[ 'title' ] ) . $args[ 'after_title' ] ;
		}

		if ( $posts_query->have_posts() ) {
			echo "<div class='custom-comments-widget'>";

				$posts_query->the_post();
				
					get_template_part( 'sidebar/sidebar', 'comments' );

			echo "</div>";
		}

		echo $args[ 'after_widget' ];
	}
}
add_action( 'widgets_init', function(){
	register_widget( 'custom_recent_comment' );
} );

/*Recent Posts with img Widget*/
class custom_recent_widget extends WP_Widget{
	// setup the widget name, description, etc.....
	public function __construct(){
		$widget_ops = array(
			'classname' 	=> 'custom-recent-widget-container',
			'description'	=> 'Custom Recent Widget',
		);
		parent::__construct( 'custom_recents_widget', 'Custom Recent Widget', $widget_ops );
	}
	// backend display of widget
	public function form( $instance ) {
		$title = ( !empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : 'Custom Recent Widget' );
		$total = ( !empty( $instance[ 'tot' ] ) ? absint( $instance[ 'tot' ] ) : 4 );

		$output  = '<p>';
		$output .= '<label for="'.esc_attr( $this->get_field_id('title') ).'">Title:</label>';
		$output .= '<input type="text" class="widefat" id="'.esc_attr( $this->get_field_id('title') ).'" name="'.esc_attr( $this->get_field_name('title') ).'" value="'.esc_attr( $title ).'"';
		$output .= '</p>';

		$output  .= '<p>';
		$output .= '<label for="'.esc_attr( $this->get_field_id('tot') ).'">Number of Posts:</label>';
		$output .= '<input type="number" class="widefat" id="'.esc_attr( $this->get_field_id('tot') ).'" name="'.esc_attr( $this->get_field_name('tot') ).'" value="'.esc_attr( $total ).'"';
		$output .= '</p>';

		echo $output;
	}

	// update widget
	public function update( $new_instance, $old_instance ){
		$instance = array();
		$instance[ 'title' ] = ( !empty( $new_instance[ 'title' ] ) ? strip_tags( $new_instance[ 'title' ] ) : '' );
		$instance[ 'tot' ] = ( !empty( $new_instance[ 'tot' ] ) ? absint( strip_tags( $new_instance[ 'tot' ] ) ) : 0 );

		return $instance;
	}

	// Frontend display Widget
	public function widget( $args, $instance ){

		$total = absint( $instance[ 'tot' ] );
		$post_args = array(
			'post_type'		 		=> 'post',
			'posts_per_page' 		=> $total,
			'orderby' 		 		=> 'meta_value_num',
			'order'			 		=> 'DESC',
			'ignore_sticky_posts'	=> 1
		);

		$posts_query = new WP_Query( $post_args );

		echo $args[ 'before_widget' ];
		if ( !empty( $instance[ 'title' ] ) ){
			echo $args[ 'before_title' ] . apply_filters( 'widget_title', $instance[ 'title' ] ) . $args[ 'after_title' ] ;
		}

		if ( $posts_query->have_posts() ) {
			echo "<div class='custom-recent-widget'>";

				while ( $posts_query->have_posts() ) {
					$posts_query->the_post();
					get_template_part( 'sidebar/sidebar', 'recent' );
				}

			echo "</div>";
		}

		echo $args[ 'after_widget' ];
	}
}
add_action( 'widgets_init', function(){
	register_widget( 'custom_recent_widget' );
} );

/*Post Navigation Tab*/
class post_nav_tab extends WP_Widget{
	// setup the widget name, description, etc.....
	public function __construct(){
		$widget_ops = array(
			'classname' 	=> 'post-nav-tab-container',
			'description'	=> 'Post Navigation Tab',
		);
		parent::__construct( 'post_nav_tab', 'Post Navigation Tab', $widget_ops );
	}
	// backend display of widget
	public function form( $instance ) {
		$title = ( !empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : 'Post Navigation Tab' );
		$total = ( !empty( $instance[ 'tot' ] ) ? absint( $instance[ 'tot' ] ) : 4 );

		$output  = '<p>';
		// $output .= '<label for="'.esc_attr( $this->get_field_id('title') ).'">Title:</label>';
		// $output .= '<input type="text" class="widefat" id="'.esc_attr( $this->get_field_id('title') ).'" name="'.esc_attr( $this->get_field_name('title') ).'" value="'.esc_attr( $title ).'"';
		$output .= '</p>';

		$output  .= '<p>';
		$output .= '<label for="'.esc_attr( $this->get_field_id('tot') ).'">Number of Posts:</label>';
		$output .= '<input type="number" class="widefat" id="'.esc_attr( $this->get_field_id('tot') ).'" name="'.esc_attr( $this->get_field_name('tot') ).'" value="'.esc_attr( $total ).'"';
		$output .= '</p>';

		echo $output;
	}

	// update widget
	public function update( $new_instance, $old_instance ){
		$instance = array();
		$instance[ 'title' ] = ( !empty( $new_instance[ 'title' ] ) ? strip_tags( $new_instance[ 'title' ] ) : '' );
		$instance[ 'tot' ] = ( !empty( $new_instance[ 'tot' ] ) ? absint( strip_tags( $new_instance[ 'tot' ] ) ) : 0 );

		return $instance;
	}

	// Frontend display Widget
	public function widget( $args, $instance ){

		$total = absint( $instance[ 'tot' ] );
		$post_args = array(
			'post_type'		 		=> 'post',
			'posts_per_page' 		=> $total,
			// 'orderby' 		 		=> 'rand',
			'order'			 		=> 'DESC',
			'ignore_sticky_posts'	=> 1
		);

		$posts_query = new WP_Query( $post_args );

		echo $args[ 'before_widget' ];
		if ( !empty( $instance[ 'title' ] ) ){
			echo $args[ 'before_title' ] . apply_filters( 'widget_title', $instance[ 'title' ] ) . $args[ 'after_title' ] ;
		}

		if ( $posts_query->have_posts() ) {
			echo "<div class='post-navs-widget'>";
				echo "<nav class='mb-2'>";
					echo '<div class="nav nav-tabs" id="nav-tab" role="tablist">';
						echo '<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">TITLE</a>';
						echo '<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">COMMENTS</a>';
						echo '<a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">POST</a>';
					echo '</div>';
				echo "</nav>";
				echo '<div class="tab-content" id="nav-tabContent">';
					echo '<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">';
							while ( $posts_query->have_posts() ) {
								$posts_query->the_post();
								// Title
									get_template_part( 'sidebar/sidebar', 'post-nav' );
							}
					echo '</div>';
					echo '<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">';
							while ( $posts_query->have_posts() ) {
								$posts_query->the_post();
								// Comments
									get_template_part( 'sidebar/sidebar', 'post-nav-comments' );
							}
					echo "</div>";
					echo '<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">';
							while ( $posts_query->have_posts() ) {
								$posts_query->the_post();
								// POST
									get_template_part( 'sidebar/sidebar', 'post-nav-post' );
							}
					echo "</div>";
				echo '</div>';
			echo "</div>";
		}

		echo $args[ 'after_widget' ];
	}
}
add_action( 'widgets_init', function(){
	register_widget( 'post_nav_tab' );
} );

/** Add Social Sharing Links on Single Posts **/
add_action('init', 'include_social', 9);

function include_social() {
	if ( is_front_page() ){
		require('themes/social.php');
	}
}

/*Custom Social Widget*/
class custom_social_widget extends WP_Widget{
	// setup the widget name, description, etc.....
	public function __construct(){
		$widget_ops = array(
			'classname' 	=> 'custom-social-widget-container',
			'description'	=> 'Custom Social Widget',
		);
		parent::__construct( 'custom_social_widget', 'Socoal Media', $widget_ops );
	}
	// backend display of widget
	public function form( $instance ) {
		$title = ( !empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : 'Socoal Media' );
		$total = ( !empty( $instance[ 'tot' ] ) ? absint( $instance[ 'tot' ] ) : 4 );

		$output  = '<p>';
		$output .= '<label for="'.esc_attr( $this->get_field_id('title') ).'">Title:</label>';
		$output .= '<input type="text" class="widefat" id="'.esc_attr( $this->get_field_id('title') ).'" name="'.esc_attr( $this->get_field_name('title') ).'" value="'.esc_attr( $title ).'"';
		$output .= '</p>';

		$output  .= '<p>';
		// $output .= '<label for="'.esc_attr( $this->get_field_id('tot') ).'">Number of Posts:</label>';
		// $output .= '<input type="number" class="widefat" id="'.esc_attr( $this->get_field_id('tot') ).'" name="'.esc_attr( $this->get_field_name('tot') ).'" value="'.esc_attr( $total ).'"';
		$output .= '</p>';

		echo $output;
	}

	// update widget
	public function update( $new_instance, $old_instance ){
		$instance = array();
		$instance[ 'title' ] = ( !empty( $new_instance[ 'title' ] ) ? strip_tags( $new_instance[ 'title' ] ) : '' );
		$instance[ 'tot' ] = ( !empty( $new_instance[ 'tot' ] ) ? absint( strip_tags( $new_instance[ 'tot' ] ) ) : 0 );

		return $instance;
	}

	// Frontend display Widget
	public function widget( $args, $instance ){

		echo $args[ 'before_widget' ];
		if ( !empty( $instance[ 'title' ] ) ){
			echo $args[ 'before_title' ] . apply_filters( 'widget_title', $instance[ 'title' ] ) . $args[ 'after_title' ] ;
		}
			echo "<div class='custom-recent-widget p-2'>";

				get_template_part( 'sidebar/sidebar', 'social' );

			echo "</div>";

		echo $args[ 'after_widget' ];
	}
}
add_action( 'widgets_init', function(){
	register_widget( 'custom_social_widget' );
} );

// Ajax for Archive Filter
function get_ajax_posts() {
if ( isset( $_POST['filter'] ) ) {
	if ( $_POST['filter'] == 'popular' ) {
		$category_id = $_POST['cat_id'];
		$popularpost = new WP_Query( 
			array( 
				'posts_per_page' 		=> -1,
				'meta_key'		 		=> 'post_views_count',
				'orderby' 		 		=> 'meta_value_num',
				'order'			 		=> 'DESC',
				'cat'					=> $category_id,
				'ignore_sticky_posts'	=> 1,
			) 
		);
		while ( $popularpost->have_posts() ) { 
			$popularpost->the_post();
			get_template_part( 'templates/content', 'archive-content' );
		}
	}
	if ( $_POST['filter'] == 'latest' ) {
		$category_id = $_POST['cat_id'];
		$popularpost = new WP_Query( 
			array( 
				'posts_per_page' 		=> -1,
				'meta_key'		 		=> 'post_views_count',
				'orderby' 		 		=> 'date',
				'order'			 		=> 'DESC',
				'cat'					=> $category_id,
				'ignore_sticky_posts'	=> 1,
			) 
		);
		while ( $popularpost->have_posts() ) { 
			$popularpost->the_post();
			get_template_part( 'templates/content', 'archive-content' ); 
		}
	}
}else{

	echo "<h1 class='text-center mt-5'>No Result Found!</h1>";
}

    exit; // leave ajax call
}

// Fire AJAX action for both logged in and non-logged in users
add_action('wp_ajax_get_ajax_posts', 'get_ajax_posts');
add_action('wp_ajax_nopriv_get_ajax_posts', 'get_ajax_posts');


function change_contact_info($contactmethods) {
    unset($contactmethods['aim']);
    unset($contactmethods['yim']);
    unset($contactmethods['jabber']);
    $contactmethods['website_title'] = 'Website Title';
    $contactmethods['twitter'] = 'Twitter';
    $contactmethods['facebook'] = 'Facebook';
    $contactmethods['linkedin'] = 'Linked In';
    $contactmethods['instagram'] = 'Instagram';
    return $contactmethods;
}

add_filter('user_contactmethods','change_contact_info',10,1);