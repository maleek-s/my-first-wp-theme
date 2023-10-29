<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  

  <title>RK Hadžići</title>

  <?php wp_head(); ?>
</head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div class="loader-wrapper">
    <div class="loader"> <img src="<?php echo get_theme_file_uri('/css/images/Logo-Hadzici-lisica.png') ?>" alt="">
    </div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
  </div>
  <!-- ***** Preloader End ***** -->
  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href=<?php echo site_url('/') ?>" class="logo">
              <h4>RK<span>Hadžići</span></h4>
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li><a href="<?php echo site_url('/') ?>" <?php if (is_page('home-2')) echo 'class="active"' ?>>Početna</a></li>
              <li><a href="<?php echo site_url('/about-us') ?>" <?php if (is_page('about-us') or wp_get_post_parent_id(0) == 31) echo 'class="active"' ?>>O nama</a></li>
              <li><a href="<?php echo get_post_type_archive_link('program') ?>" <?php if (get_post_type() == 'program' or wp_get_post_parent_id(0) == 94) echo 'class="active"' ?>>Sastav</a></li>
              <li><a href="<?php echo get_post_type_archive_link('event'); ?>" <?php if (get_post_type() == 'event') echo 'class="active"' ?>>Utakmice</a></li>
              <li><a href="<?php echo site_url('/blog'); ?>" <?php if (get_post_type() == 'post') echo 'class="active"' ?>>Vijesti</a></li>
              <li>
                  <a href="<?php echo esc_url(site_url('/search')); ?>" class="search-trigger js-search-trigger"><i class="fa fa-search" aria-hidden="true"></i></a>
              </li>
            </ul>
            <a class='menu-trigger'>
              <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>