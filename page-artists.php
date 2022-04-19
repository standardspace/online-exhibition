<?php get_header(); ?>

<section>
    <div class="ma-container">
      <h1><?php the_title();?></h1>
      <?php 
      if ( have_posts() ) {
        while ( have_posts() ) {
          the_post(); 
          the_content();
          //
        } // end while
      } // end if
      ?>

      <?php if (is_taxonomy('artists')) : 
        $terms = get_terms( array(
          'taxonomy' => 'artists'
        ) );
        ?>
        <div class="ma-artists-list">
          <?php
        foreach ($terms as $term): ?>
          <div class="ma-artists-list__item">
            <h2 class="ma-artists-list__item__title"><a href='/artists/<?php echo $term->slug; ?>'><?php echo $term->name; ?></a></h2>
            <?php 

              // Featured artwork
              $featuredArtwork = get_field('featured_artwork', $term->taxonomy . '_' . $term->term_id);
              if ( $featuredArtwork ) { ?>
                <div class="ma-artists-list__item__featured-artwork">
                  <?php echo get_the_post_thumbnail($featuredArtwork, 'large' ); ?>
                </div>
              <?php }

               // Portrait
              $portrait = get_field('portrait', $term->taxonomy . '_' . $term->term_id);
              if( $portrait ) { ?>
                <div class="ma-artists-list__item__portrait">
                  <?php echo wp_get_attachment_image( $portrait, 'medium' ); ?>
                </div>
              <?php }
            ?>
          </div> <!-- /.ma-artists-list__item -->
        <?php endforeach; ?>
        </div> <!-- /.ma-artists-list -->
        <?php endif; ?>
    </div>
  </section>
<?php get_footer(); ?>