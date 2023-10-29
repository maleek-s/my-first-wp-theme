<?php

require get_theme_file_path('/inc/search-route.php');

function university_custom_rest()
{
  register_rest_field('post', 'authorName', array(
    'get_callback' => function () {
      return get_the_author();
    }
  ));

  register_rest_field('note', 'userNoteCount', array(
    'get_callback' => function () {
      return count_user_posts(get_current_user_id(), 'note');
    }
  ));
}

add_action('rest_api_init', 'university_custom_rest');

function pageBanner($args = NULL)
{

  if (!$args['title']) {
    $args['title'] = get_the_title();
  }

  if (!$args['subtitle']) {
    $args['subtitle'] = get_field('page_banner_subtitle');
  }

  if (!$args['photo']) {
    if (get_field('page_banner_background_image')) {
      $args['photo'] = get_field('page_banner_background_image')['sizes']['pageBanner'];
    } else {
      $args['photo'] = get_theme_file_uri('/images/ocean.jpg');
    }
  }

?>
  <div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo $args['photo']; ?>);"></div>
    <div class="page-banner__content container container--narrow">
      <h1 class="page-banner__title"><?php echo $args['title'] ?></h1>
      <div class="page-banner__intro">
        <p><?php echo $args['subtitle']; ?></p>
      </div>
    </div>
  </div>
<?php }


function rk_hadzici_files()
{
  wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
  wp_enqueue_style('custom-google-fonts2', 'https://fonts.googleapis.com/css2?family=Allura&display=swap');

  wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');

  if (strstr($_SERVER['SERVER_NAME'], 'rk-hadzici.local')) {
    
    wp_enqueue_script('jquery', get_theme_file_uri('/js/jquery/jquery.min.js'), NULL, '1.0', true);
    wp_enqueue_script('animation-js', get_theme_file_uri('/js/animation.js'), NULL, '1.0', true);
    wp_enqueue_script('images-loaded', get_theme_file_uri('/js/imagesloaded.js'), NULL, '1.0', true);
    wp_enqueue_script('templatemo-custom', get_theme_file_uri('/js/templatemo-custom.js'), NULL, '1.0', true);


    wp_enqueue_script('search-js', get_theme_file_uri('/js/Search.js'), NULL, '1.0', true);
    wp_enqueue_script('scripts', get_theme_file_uri('/js/scripts.js'), NULL, '1.0', true);

    wp_enqueue_script('bootstrap-js', get_theme_file_uri('/js/bootstrap/js/bootstrap.bundle.min.js'), NULL, '1.0', true);

    wp_enqueue_style('bootstrap', get_theme_file_uri('/js/bootstrap/css/bootstrap.min.css'));

    wp_enqueue_style('normalize-css', get_theme_file_uri('/node_modules/normalize.css/normalize.css'));


    wp_enqueue_style('main-styles', get_theme_file_uri('/css/style.css'));
    wp_enqueue_style('header-styles', get_theme_file_uri('/css/modules/header.css'));
    wp_enqueue_style('about-us-styles', get_theme_file_uri('/css/modules/about-us.css'));
    wp_enqueue_style('banner-styles', get_theme_file_uri('/css/modules/banner.css'));
    wp_enqueue_style('portofolio-styles', get_theme_file_uri('/css/modules/portofolio.css'));
    wp_enqueue_style('services-styles', get_theme_file_uri('/css/modules/services.css'));
    wp_enqueue_style('site-footer', get_theme_file_uri('/css/modules/site-footer.css'));
    wp_enqueue_style('loader', get_theme_file_uri('/css/modules/loader.css'));


    wp_enqueue_style('styles-btn', get_theme_file_uri('/css/modules/btn.css'));
    wp_enqueue_style('styles-linkList', get_theme_file_uri('/css/modules/link-list.css'));
    wp_enqueue_style('styles-metabox', get_theme_file_uri('/css/modules/metabox.css'));
    wp_enqueue_style('styles-pageBanner', get_theme_file_uri('/css/modules/page-banner.css'));
    wp_enqueue_style('styles-pageLinks', get_theme_file_uri('/css/modules/page-links.css'));
    wp_enqueue_style('styles-postItem', get_theme_file_uri('/css/modules/post-item.css'));
    wp_enqueue_style('styles-professorCard', get_theme_file_uri('/css/modules/professor-card.css'));
    wp_enqueue_style('styles-searchOverlay', get_theme_file_uri('/css/modules/search-overlay.css'));
    wp_enqueue_style('styles-shame', get_theme_file_uri('/css/modules/shame.css'));
    wp_enqueue_style('styles-siteHeader', get_theme_file_uri('/css/modules/site-header.css'));
    wp_enqueue_style('styles-utilityClasses', get_theme_file_uri('/css/utility-classes.css'));
    wp_enqueue_style('styles-variables', get_theme_file_uri('/css/base/variables.css'));
    wp_enqueue_style('card-styles', get_theme_file_uri('/css/modules/card.css'));
    wp_enqueue_style('animated-styles', get_theme_file_uri('/css/modules/animated.css'));
  }

  wp_localize_script('search-js', 'searchData', array(
    'root_url' => get_site_url(),
    'nonce' => wp_create_nonce('wp_rest')
  ));
}

add_action('wp_enqueue_scripts', 'rk_hadzici_files');

function add_id_to_script($tag, $handle, $src)
{
  if ('search-js' === $handle) {
    $tag = '<script type="module" src="' . esc_url($src) . '" id="searchjs" ></script>';
  }

  return $tag;
}

add_filter('script_loader_tag', 'add_id_to_script', 10, 3);

function rk_hadzici_features()
{
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_image_size('professorLandscape', 400, 260, true);
  add_image_size('professorPortrait', 300, 300, array( 'center', 'top' ));
  add_image_size('pageBanner', 1500, 350, true);
}

add_action('after_setup_theme', 'rk_hadzici_features');

function rk_hadzici_adjust_queries($query)
{
    if (!is_admin() and is_post_type_archive('program') and is_main_query()) {
    $query->set('orderby', 'title');
    $query->set('order', 'ASC');
    $query->set('posts_per_page', -1);
  }

  if (!is_admin() and is_post_type_archive('event') and is_main_query()) {
    $today = date('Ymd');
    $query->set('meta_key', 'event_date');
    $query->set('orderby', 'meta_value_num');
    $query->set('order', 'ASC');
    $query->set('meta_query', array(
      array(
        'key' => 'event_date',
        'compare' => '>=',
        'value' => $today,
        'type' => 'numeric'
      )
    ));
  }
}

add_action('pre_get_posts', 'rk_hadzici_adjust_queries');

// Redirect subscriber accounts out of admin and onto homepage
add_action('admin_init', 'redirectSubsToFrontend');

function redirectSubsToFrontend()
{
  $ourCurrentUser = wp_get_current_user();

  if (count($ourCurrentUser->roles) == 1 and $ourCurrentUser->roles[0] == 'subscriber') {
    wp_redirect(site_url('/'));
    exit;
  }
}

add_action('wp_loaded', 'noSubsAdminBar');

function noSubsAdminBar()
{
  $ourCurrentUser = wp_get_current_user();

  if (count($ourCurrentUser->roles) == 1 and $ourCurrentUser->roles[0] == 'subscriber') {
    show_admin_bar(false);
  }
}

// Customize Login Screen
add_filter('login_headerurl', 'ourHeaderUrl');

function ourHeaderUrl()
{
  return esc_url(site_url('/'));
}

add_action('login_enqueue_scripts', 'ourLoginCSS');

function ourLoginCSS()
{
  wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
  wp_enqueue_style('our-main-styles', get_theme_file_uri('/bundled-assets/styles.00b9e656190ec8d5f50f.css'));
}

add_filter('login_headertitle', 'ourLoginTitle');

function ourLoginTitle()
{
  return get_bloginfo('name');
}

