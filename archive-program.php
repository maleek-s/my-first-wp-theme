<?php

get_header();
pageBanner(array(
  'title' => 'Upoznajte naš tim',
  'subtitle' => 'Naš tim sastoji se od naših lisica, stučnog štaba i uprave.',
  'photo' => get_theme_file_uri('css/images/handball-cover.jpg')
));
 ?>

<div class="container container--narrow page-section">

<ul class="link-list min-list">

  <div class="col-12">
    <div class="row">

<?php
  while(have_posts()) {
    the_post(); ?>
    <div class="justify-content-center col-12 col-md-4">  
      <div class="container-card">
         <a class="card1" href="<?php the_permalink(); ?>">
            <h3><?php the_title(); ?></h3>
            <p class="small">Naša <?php the_title(); ?></p>
              <div class="go-corner" href="<?php the_permalink(); ?>">
                <div class="go-arrow">
                  →
                </div>
              </div>
          </a>
      </div>
    </div>
  <?php } ?>


  </div>
  </div>
  <?php

  echo paginate_links();
?>
</ul>



</div>

<?php get_footer();

?>