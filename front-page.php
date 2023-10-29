<?php get_header(); ?>


<div class="col-12 main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="row" style="flex-direction: row-reverse">
          <div class="col-lg-6 align-self-center">
            <div class="left-content header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
              <h6>ZA NAŠ GRAD, ZA NAŠ KLUB</h6>
              <h2><em>Pola duše,</em> <span>srce cijelo</span></h2>
              <p>Dobrodošli na zvaničnu stranicu ženskog rukometnog kluba Hadžići.</p>
            </div>
          </div>
          <div class="col-lg-6 d-flex justify-content-center">
            <div class="d-flex justify-content-center right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
              <img src="<?php echo get_theme_file_uri('/assets/Logo-Hadzici.png') ?>" alt="team meeting">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="col-12 wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
  <div class="container">
    <div class="row">
      <section class="main-card-section">

        <?php
        $homepagePosts = new WP_Query(array(
          'posts_per_page' => 3
        ));

        $homepagePosts->the_post(); ?>


        <div class="main-card">
          <a href="<?php the_permalink(); ?>" class="main-card-a">
            <?php echo get_the_post_thumbnail(); ?>
            <div class="main-card-content">
              <h3><?php the_title(); ?></h3>
              <p><?php echo wp_trim_words(get_the_content(), 5) . `...`; ?></p>
            </div>
          </a>
        </div>

        <?php

        while ($homepagePosts->have_posts()) {
          $homepagePosts->the_post(); ?>
          <div class="main-card">
            <a href="<?php the_permalink(); ?>" class="main-card-a">
              <img src="<?php echo get_the_post_thumbnail(); ?>" alt="Novosti">
              <div class="main-card-content">
                <h3><?php the_title(); ?></h3>
                <p><?php echo wp_trim_words(get_the_content(), 5) . `...`; ?></p>
              </div>
            </a>
          </div>
        <?php } ?>

      </section>
    </div>
  </div>
  <p class="t-center no-margin"><a href="<?php echo site_url('/blog'); ?>" class="button button-2">Sve vijesti</a></p>

</div>

<div class="col-12 wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
  <div class="container">
    <div class="row">
      <div class="full-width-split group">
        <div class="full-width-split__one">
          <div class="full-width-split__inner">
            <h2 class="headline headline--small-plus t-center">Naredni susreti</h2>

            <?php
            $today = date('Ymd');
            $homepageEvents = new WP_Query(array(
              'posts_per_page' => 3,
              'post_type' => 'event',
              'meta_key' => 'event_date',
              'orderby' => 'meta_value_num',
              'order' => 'ASC',
              'meta_query' => array(
                array(
                  'key' => 'event_date',
                  'compare' => '>=',
                  'value' => $today,
                  'type' => 'numeric'
                )
              )
            ));

            $homepageEvents->the_post();
            get_template_part('template-parts/content', 'event');


            while ($homepageEvents->have_posts()) {
              $homepageEvents->the_post();
              get_template_part('template-parts/content', 'event');
            }
            ?>

            <p class="t-center no-margin"><a href="<?php echo get_post_type_archive_link('event') ?>" class="button button-2">Naredni susreti</a></p>

          </div>
        </div>
        <div class="full-width-split__two">
          <div class="full-width-split__inner">
            <h2 class="headline headline--small-plus t-center">Tabela prvenstva</h2>
            <a class="d-flex justify-content-center a-table" href="<?php echo site_url('/privacy-policy/'); ?>"> <?php echo do_shortcode('[ltl id="2"]'); ?></a>
            <p class="t-center no-margin"><a href="<?php echo site_url('/privacy-policy/'); ?>" class="button button-2">Više detalja</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>




<div id="about" class="about-us section">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="left-image wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
          <img src="<?php echo get_theme_file_uri('/css/images/igracica-front-page2.png') ?>" alt="person graphic">
        </div>
      </div>
      <div class="col-lg-8 align-self-center">
        <div class="services">
          <div class="row">
            <div class="col-lg-6">
              <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                <div class="icon">
                  <img src="<?php echo get_theme_file_uri('/css/images/medalje.svg') ?>" alt="reporting">
                </div>
                <div class="right-text">
                  <h4>Dvije titule prvaka</h4>
                  <p>Osvojili smo dvije titule prvaka ženskog rukometnog prvenstva BiH.</p>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.7s">
                <div class="icon">
                  <img src="<?php echo get_theme_file_uri('/css/images/trideset.svg') ?>" alt="">
                </div>
                <div class="right-text">
                  <h4>godina tradicije</h4>
                  <p>Bogato iskustvo, tradicija, sport, lorem ipsum.</p>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.9s">
                <div class="icon">
                  <img src="<?php echo get_theme_file_uri('/css/images/dvorana.svg') ?>" alt="">
                </div>
                <div class="right-text">
                  <h4>Savremeni dom rukometa</h4>
                  <p>Dvorana Hadžići</p>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="1.1s">
                <div class="icon">
                  <img src="<?php echo get_theme_file_uri('/css/images/kup.svg') ?>" alt="">
                </div>
                <div class="right-text">
                  <h4>Kup BiH</h4>
                  <p>Dvije titule osvajača kupa BiH.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col">


      <div class="slider">
        <div class="slide-track">
          <div class="slide">
            <img src="<?php echo get_theme_file_uri('/css/images/Visit--Sarajevo.png') ?>" height="100" width="250" alt="" />
          </div>
          <div class="slide">
            <img src="<?php echo get_theme_file_uri('/css/images/Logo-Opcina.png') ?>" height="100" width="250" alt="" />
          </div>
          <div class="slide">
            <img src="<?php echo get_theme_file_uri('/css/images/Telecom-Logo.png') ?>" height="100" width="250" alt="" />
          </div>
          <div class="slide">
            <img src="<?php echo get_theme_file_uri('/css/images/Kanton-Sarajevo.png') ?>" height="100" width="250" alt="" />
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<?php get_footer();

?>