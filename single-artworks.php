<?php get_header(); ?>
	<div class="ma-container ma-artwork-page">
    <?php
    if(have_posts()) : while(have_posts()) : the_post(); ?>
      <h1><?php the_title(); ?></h1>
      <?php the_post_thumbnail('full'); ?>

      <?php the_content(); ?> 
      <?php echo get_the_term_list( $post->ID, 'artists', 'Artist: ', ', ', '' ); ?> 
      <a href="<?php echo get_bloginfo( 'url' ); ?>/artworks#item-<?= $post->ID ?>">View in gallery</a>
      <?php $artist = get_the_terms($post->ID, 'artists'); ?>

    <?php endwhile; endif; ?>
  </div>
<?php get_footer(); ?>
