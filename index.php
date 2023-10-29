<?php

get_header();
pageBanner(array(
  'title' => 'Vijesti',
  'subtitle' => 'Pratite posljednja dešavanja vezana za ženski rukometni klub Hadžići.',
  'photo' => get_theme_file_uri('/css/images/handball-cover.jpg')
));
 ?>
<div class="container container--narrow page-section">
<?php
  while(have_posts()) {
    the_post(); ?>
    <div class="post-item">
      <h2 class="headline headline--medium headline--post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      
      <div class="metabox">
        <p>Objavljeno <?php the_time('n.j.y'); ?></p>
      </div>

      <div class="generic-content">
        <?php the_excerpt(); ?>
        <p><a class="btn btn--blue" href="<?php the_permalink(); ?>">Više informacija</a></p>
      </div>

    </div>
  <?php }
  echo paginate_links();
?>
</div>

<?php get_footer();

?>