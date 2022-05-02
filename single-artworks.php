<?php get_header(); ?>

	<div class="ma-container ma-artwork-page">
    <?php
    if(have_posts()) : while(have_posts()) : the_post(); ?>
      <h1><?php the_title(); ?></h1>
      <div class="ma-artwork-page__figure-container">
        <figure class="ma-artwork-page__figure">
          <div class="ma-artwork-page__figure__image-container">
            <?php the_post_thumbnail('full'); ?>
            <?php if ( have_rows('additional_images') ) : ?>
              <button class="ma-artwork-page__view-series-btn" id="dialog-artwork-series-open">View Series</button>
            <?php endif; ?>
          </div>

          <figcaption>
            <p>
              <?php echo get_the_term_list( $post->ID, 'artists', 'Artist: ', ', ', '' ); ?> 
              <a href="<?php echo get_bloginfo( 'url' ); ?>/artworks#item-<?= $post->ID ?>">View in gallery</a>
            </p>
          </figcaption>
        </figure>
      </div>

      <?php the_content(); ?> 

        <?php 
        /**
         * Handle image series artwork
         * Create modal 
         */
        ?>
        <?php if ( have_rows('additional_images') ) : ?>
        <div class="dialog" id="dialog-artwork-series" aria-hidden="true" aria-modal="true" tabindex="-1" role="dialog">
          <div class="dialog-overlay" tabindex="-1" data-a11y-dialog-hide></div>
          <div
            role="dialog"
            class="dialog-content"
            aria-label="Gallery artwork viewer"
          >
            <button
              data-a11y-dialog-hide
              class="dialog-close"
              aria-label="Close this dialog window"
            >
              &times;
            </button>
            <ul class="ma-gallery-scroller">
              <?php while ( have_rows('additional_images') ) :
                the_row();
                $slide_photo = get_sub_field('image');
                if ( !empty($slide_photo) ) :
                ?>
                  <li class="ma-gallery-scroller__item">
                    <figure class="ma-gallery-scroller__item__figure">
                      <img 
                        class="ma-gallery-scroller__item__image" 
                        src="<?php echo $slide_photo['url']; ?>" 
                        alt="<?php echo $slide_photo['alt']; ?>"
                        loading="lazy"
                      />
                    </figure>
                  </li>
                <?php endif ?>
                
              <?php endwhile; ?>
            </ul>
            <div class="ma-gallery-scroller-nav"> 
              <button class="ma-gallery-scroller-nav__prev">
                <span class="sr-only">Previous</span>
                <svg 
                  xmlns="http://www.w3.org/2000/svg"
                  focusable="false"
                  height="24px" 
                  viewBox="0 0 24 24" 
                  width="24px" 
                  fill="#000000"
                >
                  <path d="M0 0h24v24H0z" fill="none"/><path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"/>
                </svg>
              </button>
              <button class="ma-gallery-scroller-nav__next">
                <span class="sr-only">Next</span>
                <svg 
                  xmlns="http://www.w3.org/2000/svg"
                  focusable = "false"
                  height="24px" 
                  viewBox="0 0 24 24" 
                  width="24px" 
                  fill="#000000"
                >
                  <path d="M0 0h24v24H0z" fill="none"/><path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/>
                </svg>
              </button>
            </div>

          <?php endif; ?>
        <?php endwhile; ?>
        </div>
      </div>
    <?php endif; ?>
  </div>
<?php get_footer(); ?>