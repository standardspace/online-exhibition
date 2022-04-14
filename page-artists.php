<?php get_header(); ?>

<section>
    <div class="container">
      <h1> <?php the_title();?> </h1>
      <?php 
      if ( have_posts() ) {
        while ( have_posts() ) {
          the_post(); 
          the_content();
          //
        } // end while
      } // end if
      ?>

      <?php if (is_taxonomy('artists')) : ?>
        <?php 
          $terms = get_terms( array(
              'taxonomy' => 'artists'
          ) );
          foreach ($terms as $term): 
            $image = get_field('portrait', $term->taxonomy . '_' . $term->term_id);
            $size = 'medium'; // (thumbnail, medium, large, full or custom size)
            if( $image ) {
                echo wp_get_attachment_image( $image, $size );
            }
          ?>
          <div>
            <a href='/artists/<?php echo $term->slug; ?>'><?php echo $term->name; ?></a>
          </div>
          <?php endforeach ?>
      
      <?php endif; ?>
    </div>
  </section>
<?php get_footer(); ?>