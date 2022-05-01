<?php get_header(); ?>
	<div class="ma-container ma-artwork-page">
    <?php
    if(have_posts()) : while(have_posts()) : the_post(); ?>
      <h1><?php the_title(); ?></h1>
      <?php the_post_thumbnail('full'); ?>

      <?php
        if ( have_rows('additional_images') ) {
          // the_post_thumbnail('full');
          echo '<ul class="ma-gallery-scroller">';
          while ( have_rows('additional_images') ) {
            the_row();
            $slide_photo = get_sub_field('image');
            if ( !empty($slide_photo) ) {
              ?>
              <li class="ma-gallery-scroller__item">
                <img src="<?php echo $slide_photo['url']; ?>" alt="<?php echo $slide_photo['alt']; ?>" />
              </li>
              <?php
            }
          }
          echo '</ul>';
          ?>
          <!-- <div class="ma-gallery-scroller-nav"> 
            <button class="ma-gallery-scroller-nav__prev"><span class="sr-only">Previous</span></button>
            <button class="ma-gallery-scroller-nav__next"><span class="sr-only">Next</span> </button>
          </div> -->
          <?php
        }
      ?>

      <?php the_content(); ?> 
      <p>
        <?php echo get_the_term_list( $post->ID, 'artists', 'Artist: ', ', ', '' ); ?> 
        <a href="<?php echo get_bloginfo( 'url' ); ?>/artworks#item-<?= $post->ID ?>">View in gallery</a>
      </p>

    <?php endwhile; endif; ?>
  </div>
<?php get_footer(); ?>
