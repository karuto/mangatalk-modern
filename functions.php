<?php
/**
 * Twenty Twelve functions and definitions.
 *
 * Sets up the theme and provides some helper functions, which are used
 * in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook.
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

/**
 * Sets up the content width value based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
  $content_width = 625;

/**
 * Sets up theme defaults and registers the various WordPress features that
 * Twenty Twelve supports.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To add a Visual Editor stylesheet.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links,
 *  custom background, and post formats.
 * @uses register_nav_menu() To add support for navigation menus.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_setup() {
  /*
   * Makes Twenty Twelve available for translation.
   *
   * Translations can be added to the /languages/ directory.
   * If you're building a theme based on Twenty Twelve, use a find and replace
   * to change 'twentytwelve' to the name of your theme in all the template files.
   */
  load_theme_textdomain( 'twentytwelve', get_template_directory() . '/languages' );

  // This theme styles the visual editor with editor-style.css to match the theme style.
  add_editor_style();

  // Adds RSS feed links to <head> for posts and comments.
  add_theme_support( 'automatic-feed-links' );

  // This theme supports a variety of post formats.
  add_theme_support( 'post-formats', array( 'aside', 'image', 'link', 'quote', 'status' ) );

  // This theme uses wp_nav_menu() in one location.
  register_nav_menu( 'primary', __( 'Primary Menu', 'twentytwelve' ) );

  /*
   * This theme supports custom background color and image, and here
   * we also set up the default background color.
   */
  add_theme_support( 'custom-background', array(
    'default-color' => 'e6e6e6',
  ) );

  // This theme uses a custom image size for featured images, displayed on "standard" posts.
  add_theme_support( 'post-thumbnails' );
  set_post_thumbnail_size( 624, 9999 ); // Unlimited height, soft crop
}
add_action( 'after_setup_theme', 'twentytwelve_setup' );

/**
 * Adds support for a custom header image.
 */
require( get_template_directory() . '/inc/custom-header.php' );

/**
 * Enqueues scripts and styles for front-end.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_scripts_styles() {
  global $wp_styles;

  /*
   * Adds JavaScript to pages with the comment form to support
   * sites with threaded comments (when in use).
   */
  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
    wp_enqueue_script( 'comment-reply' );

  /*
   * Adds JavaScript for handling the navigation menu hide-and-show behavior.
   */
  wp_enqueue_script( 'twentytwelve-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '1.0', true );

  /*
   * Loads our special font CSS file.
   *
   * The use of Open Sans by default is localized. For languages that use
   * characters not supported by the font, the font can be disabled.
   *
   * To disable in a child theme, use wp_dequeue_style()
   * function mytheme_dequeue_fonts() {
   *     wp_dequeue_style( 'twentytwelve-fonts' );
   * }
   * add_action( 'wp_enqueue_scripts', 'mytheme_dequeue_fonts', 11 );
   */

  /* translators: If there are characters in your language that are not supported
     by Open Sans, translate this to 'off'. Do not translate into your own language. */
  if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'twentytwelve' ) ) {
    $subsets = 'latin,latin-ext';

    /* translators: To add an additional Open Sans character subset specific to your language, translate
       this to 'greek', 'cyrillic' or 'vietnamese'. Do not translate into your own language. */
    $subset = _x( 'no-subset', 'Open Sans font: add new subset (greek, cyrillic, vietnamese)', 'twentytwelve' );

    if ( 'cyrillic' == $subset )
      $subsets .= ',cyrillic,cyrillic-ext';
    elseif ( 'greek' == $subset )
      $subsets .= ',greek,greek-ext';
    elseif ( 'vietnamese' == $subset )
      $subsets .= ',vietnamese';

    $protocol = is_ssl() ? 'https' : 'http';
    $query_args = array(
      'family' => 'Open+Sans:400italic,700italic,400,700',
      'subset' => $subsets,
    );
    wp_enqueue_style( 'twentytwelve-fonts', add_query_arg( $query_args, "$protocol://fonts.googleapis.com/css" ), array(), null );
  }

  /*
   * Loads our main stylesheet.
   */
  wp_enqueue_style( 'twentytwelve-style', get_stylesheet_uri() );

  /*
   * Loads the Internet Explorer specific stylesheet.
   */
  wp_enqueue_style( 'twentytwelve-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentytwelve-style' ), '20121010' );
  $wp_styles->add_data( 'twentytwelve-ie', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'twentytwelve_scripts_styles' );

/**
 * Creates a nicely formatted and more specific title element text
 * for output in head of document, based on current view.
 *
 * @since Twenty Twelve 1.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string Filtered title.
 */
function twentytwelve_wp_title( $title, $sep ) {
  global $paged, $page;

  if ( is_feed() )
    return $title;

  // Add the site name.
  $title .= get_bloginfo( 'name' );

  // Add the site description for the home/front page.
  $site_description = get_bloginfo( 'description', 'display' );
  if ( $site_description && ( is_home() || is_front_page() ) )
    $title = "$title $sep $site_description";

  // Add a page number if necessary.
  if ( $paged >= 2 || $page >= 2 )
    $title = "$title $sep " . sprintf( __( 'Page %s', 'twentytwelve' ), max( $paged, $page ) );

  return $title;
}
add_filter( 'wp_title', 'twentytwelve_wp_title', 10, 2 );

/**
 * Makes our wp_nav_menu() fallback -- wp_page_menu() -- show a home link.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_page_menu_args( $args ) {
  if ( ! isset( $args['show_home'] ) )
    $args['show_home'] = true;
  return $args;
}
add_filter( 'wp_page_menu_args', 'twentytwelve_page_menu_args' );

/**
 * Registers our main widget area and the front page widget areas.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_widgets_init() {
  register_sidebar( array(
    'name' => __( 'Main Sidebar', 'twentytwelve' ),
    'id' => 'sidebar-1',
    'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'twentytwelve' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ) );

  register_sidebar( array(
    'name' => __( 'First Front Page Widget Area', 'twentytwelve' ),
    'id' => 'sidebar-2',
    'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'twentytwelve' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ) );

  register_sidebar( array(
    'name' => __( 'Second Front Page Widget Area', 'twentytwelve' ),
    'id' => 'sidebar-3',
    'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'twentytwelve' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ) );
}
add_action( 'widgets_init', 'twentytwelve_widgets_init' );

if ( ! function_exists( 'twentytwelve_content_nav' ) ) :
/**
 * Displays navigation to next/previous pages when applicable.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_content_nav( $html_id ) {
  global $wp_query;

  $html_id = esc_attr( $html_id );

  if ( $wp_query->max_num_pages > 1 ) : ?>

    <nav id="<?php echo $html_id; ?>" class="layout-page-navigation" role="navigation">
      <?php echo paginate_links( $args ) ?>
      <!-- <h3 class="assistive-text"><?php _e( 'Post navigation', 'twentytwelve' ); ?></h3> -->
      <div class="layout-posts-row">

      <?php if (!is_null(get_next_posts_link())) : ?>
        <div class="main-item-block main-item-style post-item nav-item nav-previous">
          <div class="entry-summary">
            <?php next_posts_link('« 更旧的文章 | OLDER', 0); ?>
          </div>
        </div>
      <?php endif; ?>
      <div class="main-item-gap"></div>
        
      <?php if (!is_null(get_previous_posts_link())) : ?>
        <div class="main-item-block main-item-style post-item nav-item nav-next">
          <div class="entry-summary">
            <?php previous_posts_link('NEWER | 更新的文章 »', 0); ?>
          </div>          
        </div>
      <?php endif; ?>

      </div>
    </nav><!-- #<?php echo $html_id; ?> .page-navigation -->
  <?php endif;
}
endif;

if ( ! function_exists( 'twentytwelve_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own twentytwelve_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_comment( $comment, $args, $depth ) {
  $GLOBALS['comment'] = $comment;
  switch ( $comment->comment_type ) :
    case 'pingback' :
    case 'trackback' :
    // Display trackbacks differently than normal comments.
  ?>
  <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
    <p><?php _e( 'Pingback:', 'twentytwelve' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?></p>
  <?php
      break;
    default :
    // Proceed with normal comments.
    global $post;
  ?>
  <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
    <article id="comment-<?php comment_ID(); ?>" class="comment">
      <header class="comment-meta comment-author vcard">
        <?php
          echo get_avatar( $comment, 44 );
          printf( '<cite class="fn">%1$s %2$s</cite>',
            get_comment_author_link(),
            // If current post author is also comment author, make it known visually.
            ( $comment->user_id === $post->post_author ) ? '<span> ' . __( 'Post author', 'twentytwelve' ) . '</span>' : ''
          );
          printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
            esc_url( get_comment_link( $comment->comment_ID ) ),
            get_comment_time( 'c' ),
            /* translators: 1: date, 2: time */
            sprintf( __( '%1$s at %2$s', 'twentytwelve' ), get_comment_date(), get_comment_time() )
          );
        ?>
      </header><!-- .comment-meta -->

      <?php if ( '0' == $comment->comment_approved ) : ?>
        <p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'twentytwelve' ); ?></p>
      <?php endif; ?>

      <section class="comment-content comment">
        <?php comment_text(); ?>
        <?php edit_comment_link( __( 'Edit', 'twentytwelve' ), '<p class="edit-link">', '</p>' ); ?>
      </section><!-- .comment-content -->

      <div class="reply">
        <?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'twentytwelve' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
      </div><!-- .reply -->
    </article><!-- #comment-## -->
  <?php
    break;
  endswitch; // end comment_type check
}
endif;

if ( ! function_exists( 'twentytwelve_entry_meta' ) ) :
/**
 * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
 *
 * Create your own twentytwelve_entry_meta() to override in a child theme.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_entry_meta() {
  // Translators: used between list items, there is a space after the comma.
  $categories_list = get_the_category_list( __( ', ', 'twentytwelve' ) );

  // Translators: used between list items, there is a space after the comma.
  $tag_list = get_the_tag_list( '', __( ', ', 'twentytwelve' ) );

  $date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',
    esc_url( get_permalink() ),
    esc_attr( get_the_time() ),
    esc_attr( get_the_date( 'c' ) ),
    esc_html( get_the_date() )
  );

  $author = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
    esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
    esc_attr( sprintf( __( 'View all posts by %s', 'twentytwelve' ), get_the_author() ) ),
    get_the_author()
  );

  // Translators: 1 is category, 2 is tag, 3 is the date and 4 is the author's name.
  if ( $tag_list ) {
    $utility_text = __( 'This entry was posted in %1$s and tagged %2$s on %3$s<span class="by-author"> by %4$s</span>.', 'twentytwelve' );
  } elseif ( $categories_list ) {
    $utility_text = __( 'This entry was posted in %1$s on %3$s<span class="by-author"> by %4$s</span>.', 'twentytwelve' );
  } else {
    $utility_text = __( 'This entry was posted on %3$s<span class="by-author"> by %4$s</span>.', 'twentytwelve' );
  }

  printf(
    $utility_text,
    $categories_list,
    $tag_list,
    $date,
    $author
  );
}
endif;

/**
 * Extends the default WordPress body class to denote:
 * 1. Using a full-width layout, when no active widgets in the sidebar
 *    or full-width template.
 * 2. Front Page template: thumbnail in use and number of sidebars for
 *    widget areas.
 * 3. White or empty background color to change the layout and spacing.
 * 4. Custom fonts enabled.
 * 5. Single or multiple authors.
 *
 * @since Twenty Twelve 1.0
 *
 * @param array Existing class values.
 * @return array Filtered class values.
 */
function twentytwelve_body_class( $classes ) {
  $background_color = get_background_color();

  if ( ! is_active_sidebar( 'sidebar-1' ) || is_page_template( 'page-templates/full-width.php' ) )
    $classes[] = 'full-width';

  if ( is_page_template( 'page-templates/front-page.php' ) ) {
    $classes[] = 'template-front-page';
    if ( has_post_thumbnail() )
      $classes[] = 'has-post-thumbnail';
    if ( is_active_sidebar( 'sidebar-2' ) && is_active_sidebar( 'sidebar-3' ) )
      $classes[] = 'two-sidebars';
  }

  if ( empty( $background_color ) )
    $classes[] = 'custom-background-empty';
  elseif ( in_array( $background_color, array( 'fff', 'ffffff' ) ) )
    $classes[] = 'custom-background-white';

  // Enable custom font class only if the font CSS is queued to load.
  if ( wp_style_is( 'twentytwelve-fonts', 'queue' ) )
    $classes[] = 'custom-font-enabled';

  if ( ! is_multi_author() )
    $classes[] = 'single-author';

  return $classes;
}
add_filter( 'body_class', 'twentytwelve_body_class' );

/**
 * Adjusts content_width value for full-width and single image attachment
 * templates, and when there are no active widgets in the sidebar.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_content_width() {
  if ( is_page_template( 'page-templates/full-width.php' ) || is_attachment() || ! is_active_sidebar( 'sidebar-1' ) ) {
    global $content_width;
    $content_width = 960;
  }
}
add_action( 'template_redirect', 'twentytwelve_content_width' );

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @since Twenty Twelve 1.0
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 * @return void
 */
function twentytwelve_customize_register( $wp_customize ) {
  $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
  $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
}
add_action( 'customize_register', 'twentytwelve_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_customize_preview_js() {
  wp_enqueue_script( 'twentytwelve-customizer', get_template_directory_uri() . '/js/theme-customizer.js', array( 'customize-preview' ), '20120827', true );
}
add_action( 'customize_preview_init', 'twentytwelve_customize_preview_js' );




/**
 * ABOVE: ALL THE ORIGINAL FUNCTIONS
 * BELOW: ALL THE ADDITIONAL FUNCTIONS
 */


/**
 * Author: Karuto
 *
 * Exclude pages from search results.
 * @since Twenty Twelve 1.0
 */
function SearchFilter($query) {
  if ($query->is_search) {
    $query->set('post_type', 'post');
  } return $query;
}
add_filter('pre_get_posts','SearchFilter');


/**
 * Author: Karuto
 *
 * Hacking dashboard interfaces, adding a informative contact helper widget.
 * @since Twenty Twelve 1.0
 */
function contact_helper_dashboard_widget_function() {
  echo '<div id="admin-foreplay" style="font-size: 12px; line-height: 20px;">';
  echo '<p><a href="http://mangatalk.net">欢迎来到漫言！</a><br />
  站点现正处于 Beta 公开测试期间，如果您在使用中遇到 Bug、技术故障，或是有任何建议吐槽，请务必来信<a href="mailto:iamkaruto@gmail.com">联系技术人员</a>。</p><p>';
  echo '<a href="http://mangatalk.net/changelog/">Log #15527 - You can now browse MangaTalk via Android / iPhone.</a></p><p>';
  echo '深切感谢您的理解与协作。一切都是为了爱！　　—— <a href="http://mangatalk.net">漫言团队</a> 敬上</p></div>';
}
// Create the function use in the action hook
function add_custom_dashboard_widget() {
  wp_add_dashboard_widget(
    'contact_helper_dashboard_widget', 
    '感谢您登入漫言！', 
    'contact_helper_dashboard_widget_function');
}
// Hoook into the 'wp_dashboard_setup' action to register our other functions
add_action('wp_dashboard_setup', 'add_custom_dashboard_widget');


/**
 * Author: Karuto
 *
 * Hacking dashboard interfaces, adding a posting guideline helper widget (to dashboard frontpage).
 * @since Twenty Twelve 1.0
 */
function guidelines_posting_widget_function() {
  echo '<div id="post-foreplay" style="font-size: 12px; line-height: 20px;">';
  echo '<p>亲爱的作者：在撰文之前，请您抽出几分钟，阅读<strong><a href="http://mangatalk.net/author-faq/" style="color:#ce5333;">『漫言发文答疑指南』</a></strong>，相信能解答您的大部分问题。</p><p>
  
  <a href="http://mangatalk.net">漫言</a>自诞生以来，便致力于为数以万计的读者们奉上最优雅的阅读体验。
  还望您也能稍尽一方之力、共同来维护这片净土。^ ^</p><p>';

  echo '深切感谢您的理解与协作。一切都是为了爱！　　—— <a href="http://mangatalk.net">漫言团队</a> 敬上</p></div>';
}
// Create the function use in the action hook
function example_add_dashboard_widgets() {
  wp_add_dashboard_widget('guidelines_posting_widget', '撰文时的注意事项', 'guidelines_posting_widget_function');
}
// Hoook into the 'wp_dashboard_setup' action to register our other functions
add_action('wp_dashboard_setup', 'example_add_dashboard_widgets' );


/**
 * Author: Karuto
 *
 * Hacking dashboard interfaces, adding a posting guideline helper widget (to post editing pages).
 * @since Twenty Twelve 1.0
 */
//  Adding custom helper while posting
add_action('load-post-new.php','custom_help_page');
add_action('load-page.php','custom_help_page');
add_action('load-post.php','custom_help_page');
function custom_help_page() {
  add_filter('contextual_help','custom_page_help_by_K');
}
function custom_page_help_by_K($help) {
  echo $help; // Uncomment if you just want to append your custom Help text to the default Help text
  echo '<style type="text/css">
    .update-nag { display:none !important; }
    #post-foreplay a { text-decoration: none; }
  </style>';
  
  echo '<div id="post-foreplay" style="margin-right: 25px; font-size: 12px; line-height: 18px; color: #555; border-bottom: 1px solid #e0e0e0;">';
  echo '<p>亲爱的作者：在撰文之前，请您抽出几分钟，阅读<strong><a href="http://mangatalk.net/author-faq/" style="color:#ce5333;">『漫言发文答疑指南』</a></strong>，相信能解答您的大部分问题。</p><p>
  <a href="http://mangatalk.net">漫言</a>自诞生以来，便致力于为数以万计的读者们奉上最优雅的阅读体验。
  还望您也能稍尽一方之力、共同来维护这片净土。^ ^</p><p>';
  echo '深切感谢您的理解与协作。一切都是为了爱！　　—— <a href="http://mangatalk.net">漫言团队</a> 敬上</p></div>';
}


/**
 * Author: Karuto
 *
 * Hacking dashboard interfaces, adding a informative helper for profile editing.
 * @since Twenty Twelve 1.0
 */
//  Adding custom helper while user changing profile
add_action('load-profile.php','custom_help_profile');
function custom_help_profile() {
  add_filter('contextual_help','custom_profile_help_by_K');
}
function custom_profile_help_by_K($help) {
  echo $help; // Uncomment if you just want to append your custom Help text to the default Help text
  echo '<style type="text/css">
    .update-nag { display:none !important; }
    #post-foreplay a { text-decoration: none; }
  </style>';
  
  echo '<div id="post-foreplay" style="margin-right: 25px; font-size: 12px; line-height: 18px; color: #555; border-bottom: 1px solid #e0e0e0;">';
  echo '<p>亲，漫言后台使用<a href="http://cn.gravatar.com/" target=_BLANK> Gravatar </a>的外挂头像系统，它的原理是为每个 Email 地址进行匹配：</p><p>';
  echo '当你在<a href="http://cn.gravatar.com/" target=_BLANK> Gravatar </a>上传一张图片后，这张头像到任何网站都会自动显示——只要你输入的是同样的 Email。</p><p>';
  echo '<a href="http://cn.gravatar.com/" target=_BLANK> Gravatar </a>的使用过程非常简单，两三分钟即可完成上传，如果你还没有头像，不妨去<a href="http://cn.gravatar.com/" target=_BLANK>设置</a>一下吧？^v^</p>';
  echo '深切感谢您的理解与协作。一切都是为了爱！　　—— <a href="http://mangatalk.net">漫言团队</a> 敬上</p></div>';
}


/**
 * Author: Karuto
 *
 * Hacking dashboard interfaces: change external logo & login background.
 * @since Twenty Twelve 1.0
 */
function my_logo() {
  echo '<style type="text/css">
    body { background:url(http://i.imgur.com/FV2MV.png) repeat !important; }
    .login #nav a, .login #backtoblog a { text-decoration: none; color: #ce5333; }
    h1 a { background-image:url(http://i.imgur.com/rzsoh.png) !important; }
  </style>';
}
add_action('login_head', 'my_logo');

/**
 * Author: Karuto
 *
 * Add the blog's favicon to the dashboard pages as well.
 * @since Twenty Twelve 1.0
 */
function blog_favicon() {
  echo '<link rel="Shortcut Icon" type="image/x-icon" href="'
  .get_bloginfo('wpurl').'/favicon.ico" />';
}
add_action('wp_head', 'blog_favicon');

/**
 * Author: Karuto
 *
 * The following function automatically removes attachment links around images.
 * Note: this only works if it's an attachment link (not any other links),
 * and the attachment link must use the directory of "wp-content/uploads"
 * TODO: Improve RegEx logic so that it also removes image media page links.
 * @since Twenty Twelve 1.0
 */
add_filter( 'the_content', 'attachment_image_link_remove_filter' );
function attachment_image_link_remove_filter( $content ) {
    $content =
        preg_replace(
            array('{<a(.*?)(wp-att|wp-content\/uploads)[^>]*><img}',
                '{ wp-image-[0-9]*" /></a>}'),
            array('<img','" />'),
            $content
        );
    return $content;
}

/**
 * Author: Karuto
 *
 * The following function removes inline style width in WP 3.4 and up.
 * Note: this only works if it's an attachment link (not any other links),
 * http://wp-snippets.com/remove-wp-caption-inline-style-width-in-wordpress-3-4-and-up/
 * @since Twenty Twelve 1.0
 */
add_shortcode('wp_caption', 'fixed_img_caption_shortcode');
add_shortcode('caption', 'fixed_img_caption_shortcode');
function fixed_img_caption_shortcode($attr, $content = null) {
  // New-style shortcode with the caption inside the shortcode with the link and image tags.
  if ( ! isset( $attr['caption'] ) ) {
    if ( preg_match( '#((?:<a [^>]+>\s*)?<img [^>]+>(?:\s*</a>)?)(.*)#is', $content, $matches ) ) {
      $content = $matches[1];
      $attr['caption'] = trim( $matches[2] );
    }
  }

  // Allow plugins/themes to override the default caption template.
  $output = apply_filters('img_caption_shortcode', '', $attr, $content);
  if ( $output != '' )
    return $output;

  extract(shortcode_atts(array(
    'id'  => '',
    'align' => 'alignnone',
    'width' => '',
    'caption' => ''
  ), $attr));

  // Manually set width to be 100% for captioned images
  $width = "100%";

  if ( 1 > (int) $width || empty($caption) )
    return $content;

  if ( $id ) $id = 'id="' . esc_attr($id) . '" ';

  return '<div ' . $id . 'class="wp-caption ' . esc_attr($align) . '" style="width: ' . $width . '">'
  . do_shortcode( $content ) . '<p class="wp-caption-text">' . $caption . '</p></div>';
}





/**
 * Author: Karuto
 *
 * Remove the new Twitter-like admin menu bar that WP 3.1 introduced.
 * @since Twenty Twelve 1.0
 */
add_filter( 'show_admin_bar', '__return_false' );

/**
 * Author: Karuto
 *
 * Remove the Visual Editor that WP dashboard by default uses in editing sections.
 * @since Twenty Twelve 1.0
 */
add_filter('user_can_richedit', create_function('', 'return false;'), 50);

/**
 * Author: Karuto
 *
 * Disable the “please upgrade now” message in dashboard for non-admin users.
 * @since Twenty Twelve 1.0
 */
if ( !current_user_can( 'edit_users' ) ) {
  add_action( 
    'init', 
    create_function( '$a', "remove_action( 'init', 'wp_version_check' );" ), 
    2 );
  add_filter( 'pre_option_update_core', create_function( '$a', "return null;" ) );
}

/**
 * Author: Karuto
 *
 * Add new contact fields in the user profiles, remove useless ones.
 * @since Twenty Twelve 1.0
 */
function new_contactmethods( $contactmethods ) {
  $contactmethods['douban'] = '豆瓣'; // Add Twitter
  $contactmethods['weibo'] = '微博'; // Add Facebook
  unset($contactmethods['yim']); // Remove Yahoo IM
  unset($contactmethods['aim']); // Remove AIM
  unset($contactmethods['jabber']); // Remove Jabber
  return $contactmethods;
} 
add_filter('user_contactmethods', 'new_contactmethods', 10, 1);


/**
 * Author: Karuto
 *
 * Append copyright statements to the feed output.
 * @since Twenty Twelve 1.0
 */
function mangatalk_rss($content) {
  global $wp_query;
  $a = $GLOBALS['wp_query']->query_vars['author_name'];

  if (is_feed()) {
    $content = $content . '<br /><br />本文源自 <a href="http://mangatalk.net">漫言 | MangaTalk </a>，采用 <a href="http://creativecommons.org/licenses/by-nc-sa/2.5/deed.zh">BY-NC-SA 中国大陆许可协议</a> 授权，可以自由转载，但转载时请务必以超链接形式标明本文原始出处、作者信息及本声明，并且不得商用。任何违反协议的侵权行为将被追究法律责任。';
  }
  return $content;
}
add_filter('the_excerpt_rss', 'mangatalk_rss');
add_filter('the_content', 'mangatalk_rss');



