<?php
  
  get_header();

  while(have_posts()) {
    the_post();
    pageBanner(
      array(
        'photo' => get_theme_file_uri('/css/images/Banner-Lisice.png'),
        'subtitle' => get_field('page_banner_subtitle'),
        'title' => get_the_title()
      )
    );
     ?> 
    
 
    <div class="container container--narrow page-section">
          
      <div class="generic-content">
        <div class="row group">
          <div class="one-third single-photo">
           <?php the_post_thumbnail('medium'); ?>
          </div>

          <div class="two-thirds">
            <?php the_content(); ?>
          </div>

        </div>
      </div>

      <?php

        $relatedPrograms = get_field('related_programs');

        if ($relatedPrograms) {
          echo '<hr class="section-break">';
 
        foreach($relatedPrograms as $program) { ?>
          <div class="justify-content-center col-12 col-md-4">  
              <div class="container-card">
                <a class="card1" href="<?php echo get_the_permalink($program); ?>">
                <h3><?php echo get_the_title($program); ?></h3>
                <p class="small"><?php echo get_the_title($program); ?></p>
              <div class="go-corner" href="<?php echo get_the_permalink($program); ?>">
                  <div class="go-arrow">
                  ←
                  </div>
              </div>
                </a>
              </div>
           </div>
              <?php } } }

  get_footer();

  ?>