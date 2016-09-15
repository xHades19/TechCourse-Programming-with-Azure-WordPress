<?php
/**
  @ Thiết lập các hằng dữ liệu quan trọng
  @ THEME_URL = get_stylesheet_directory() - đường dẫn tới thư mục theme
  @ CORE = thư mục /core của theme, chứa các file nguồn quan trọng.
  **/
define( 'THEME_URL', get_stylesheet_directory() );
define ( 'CORE', THEME_URL . "/core" );
/**
@ Nhung file /core/init.php
**/
require_once( CORE . "/init.php" );

/**
@ Thiet lap chieu rong noi dung
**/
if ( !isset($content_width) ) {
	$content_width = 620;
}

/**
@ Khai bao chuc nang cua theme 
**/
if ( !function_exists('xhadesvn_theme_setup') ) {
	function xhadesvn_theme_setup() {

		/* Thiet lap textdomain */
		$language_folder = THEME_URL . '/languages';
		load_theme_textdomain( 'xhadesvn', $language_folder );
		/* Tu dong them link RSS len <head> **/
		add_theme_support( 'automatic-feed-links' );

		/* Them post thumbnail */
		add_theme_support( 'post-thumbnails' );

		/* Post Format */
		add_theme_support( 'post-formats', array(
			'image',
			'video',
			'gallery',
			'quote',
			'link'
		) );

		/* Them title-tag */
		add_theme_support( 'title-tag' );

		/* Them custom background */
		$default_background = array(
			'default-color' => '#e8e8e8'
		);
		add_theme_support( 'custom-background', $default_background );

		/* Them menu */
		register_nav_menu( 'primary-menu', __('Primary Menu', 'xhadesvn') );

		/* Tao sidebar */
		$sidebar = array(
			'name' => __('Main Sidebar', 'xhadesvn'),
			'id' => 'main-sidebar',
			'description' => __('Default sidebar'),
			'class' => 'main-sidebar',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>'
		);
		register_sidebar( $sidebar );

	}
	add_action( 'init', 'xhadesvn_theme_setup' );
}


/*--------
TEMPLATE FUNCTIONS 
@ Thiết lập hàm hiển thị header
@ xhadesvn_header()
*/
if (!function_exists('xhadesvn_header')) {
	function xhadesvn_header() { ?>
		<div class="site-name">
			<?php
				global $tp_options;

				if( $tp_options['logo-on'] == 0 ) :
			?>
				<?php
					if ( is_home() ) {
						printf( '<h1><a href="%1$s" title="%2$s">%3$s</a></h1>',
						get_bloginfo('url'),
						get_bloginfo('description'),
						get_bloginfo('sitename') );
					} else {
						printf( '<p><a href="%1$s" title="%2$s">%3$s</a></p>',
						get_bloginfo('url'),
						get_bloginfo('description'),
						get_bloginfo('sitename') );			
					}
				?>

			<?php
				else : 
			?>
				<img src="<?php echo $tp_options['logo-image']['url']; ?>" />
		<?php endif; ?>
		</div>
		<div class="site-description"><?php bloginfo('description'); ?></div><?php 
	}
}

/**
Hàm thiết lập menu
**/
if ( !function_exists('xhadesvn_menu') ) {
	function xhadesvn_menu($menu) {
		$menu = array(
			'theme_location' => $menu,
			'container' => 'nav',
			'container_class' => $menu,
			'items_wrap' => '<ul id="%1$s" class="%2$s sf-menu">%3$s</ul>'
		);
		wp_nav_menu( $menu );
	}
}

/**
Hàm tạo phân trang next, previous đơn giản
**/
if ( !function_exists('xhadesvn_pagination') ) {
	function xhadesvn_pagination() {
		if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
			return '';
		} ?>
		<nav class="pagination" role="navigation">
			<?php if ( get_next_posts_link() ) : ?>
				<div class="prev"><?php next_posts_link( __('Older Posts', 'xhadesvn') ); ?></div>
			<?php endif; ?>
			<?php if ( get_previous_posts_link() ) : ?>
				<div class="next"><?php previous_posts_link( __('Newest Posts', 'xhadesvn') ); ?></div>
			<?php endif; ?>
		</nav>
	<?php }
}

/**
xhadesvn_thumbnail - Hàm hiển thị thumbnail bài viết
**/
if ( !function_exists('xhadesvn_thumbnail') ) {
	function xhadesvn_thumbnail($size) {
		if( !is_single() && has_post_thumbnail() && !post_password_required() || has_post_format('image') ) : ?>
		<figure class="post-thumbnail"><?php the_post_thumbnail( $size ); ?></figure>
	<?php endif; ?>
	<?php }
}

/**
xhadesvn_entry_header = Hàm hiển thị tiêu đề của post
**/
if ( !function_exists('xhadesvn_entry_header') ) {
	function xhadesvn_entry_header() { ?>
		<?php if ( is_single() ) : ?>
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
		<?php else : ?>
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
		<?php endif; ?>
	<?php }
}

/**
xhadesvn_entry_meta = hàm lấy dữ liệu từ post
**/
if ( !function_exists('xhadesvn_entry_meta') ) {
	function xhadesvn_entry_meta() { ?>
		<?php if ( !is_page() ) : ?>
			<div class="entry-meta">
			<?php
				printf( __('<span class="author">Posted by %1$s', 'xhadesvn'),
				get_the_author() );

				printf( __('<span class="date-published"> at %1$s', 'xhadesvn'),
				get_the_date() );

				printf( __('<span class="category"> in %1$s ', 'xhadesvn'),
				get_the_category_list( ',' ) );

				if ( comments_open() ) : 
					echo '<span class="meta-reply">';
						comments_popup_link(
							__('Leave a comment', 'xhadesvn'),
							__('One comment', 'xhadesvn'),
							__('% comments', 'xhadesvn'),
							__('Read all comments', 'xhadesvn')
							);
					echo '</span>';
				endif;
			?>
			</div>
		<?php endif; ?>
	<?php }
}

/**
xhadesvn_entry_content = ham hien thi noi dung cua post/page
**/
if ( !function_exists('xhadesvn_entry_content') ) {
	function xhadesvn_entry_content() {
		if( !is_single() && !is_page() ) {
			the_excerpt();
		} else {
			the_content();

			/* Phan trang trong single */
			$link_pages = array(
				'before' => __('<p>Page: ', 'xhadesvn'),
				'after' => '</p>',
				'nextpagelink' => __('Next Page', 'xhadesvn'),
				'previouspagelink' => __('Previous Page', 'xhadesvn')
			);
			wp_link_pages( $link_pages );
		}
	}
}

function xhadesvn_readmore() {
	return '<a class="read-more" href="'. get_permalink( get_the_ID() ) . '">'.__('Read More', 'xhadesvn').'</a>';
}
add_filter('excerpt_more', 'xhadesvn_readmore');


/**
xhadesvn_entry_tag = hien thi tag 
**/
if ( !function_exists('xhadesvn_entry_tag') ) {
	function xhadesvn_entry_tag() {
		if ( has_tag() ) :
			echo '<div class="entry-tag">';
			printf( __('Tagged in %1$s', 'xhadesvn'), get_the_tag_list( '', ',' ) );
			echo '</div>';
		endif;
	}
}



/*=====Nhúng file style.css=====*/
function xhadesvn_style() {
	wp_register_style( 'main-style', get_template_directory_uri() . "/style.css", 'all' );
	wp_enqueue_style('main-style');
	wp_register_style( 'reset-style', get_template_directory_uri() . "/reset.css", 'all' );
	wp_enqueue_style('reset-style');

	// Superfish Menu
	wp_register_style( 'superfish-style', get_template_directory_uri() . "/superfish.css", 'all' );
	wp_enqueue_style('superfish-style');
	wp_register_script( 'superfish-script', get_template_directory_uri() . "/superfish.js", array('jquery') );
	wp_enqueue_script('superfish-script');

	// Custom script
	wp_register_script( 'custom-script', get_template_directory_uri() . "/custom.js", array('jquery') );
	wp_enqueue_script('custom-script');	
}
add_action('wp_enqueue_scripts', 'xhadesvn_style');

















