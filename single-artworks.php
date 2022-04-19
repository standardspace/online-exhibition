<?php get_header(); ?>
	<div class="ma-container">
    <?php
    if(have_posts()) : while(have_posts()) : the_post(); ?>
      <h1><?php the_title(); ?></h1>
      <?php the_post_thumbnail($size); ?>

      <?php the_content(); ?> 
      <?php echo get_the_term_list( $post->ID, 'artists', 'Artist: ', ', ', '' ); ?> 

      <?php $artist = get_the_terms($post->ID, 'artists'); ?>

    <?php endwhile; endif; ?>
  </div>
<?php get_footer(); ?>
