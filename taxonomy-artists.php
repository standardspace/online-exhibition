<?php get_header(); ?>

<div class="ma-container">

<h1 class="page-title"><?php echo single_term_title(); ?></h1>  

<?php 
$term = get_queried_object();
$image = get_field('portrait', $term->taxonomy . '_' . $term->term_id);
$size = 'large'; // (thumbnail, medium, large, full or custom size)
if( $image ) {
    echo wp_get_attachment_image( $image, $size );
}

$description = get_field('biography', $term->taxonomy . '_' . $term->term_id);
if ($description) {
    echo $description;
} 
?>


	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <h2>Artworks by <?php echo single_term_title(); ?></h2>
		<section>
			<h3> <?php the_title(); ?></h3>
      <?php the_post_thumbnail('medium'); ?>
			<?php // the_excerpt(); ?>
			<button> <a href="<?php the_permalink(); ?>"> View </a> </button>
		</section>
	<?php endwhile; endif; ?>	
</div>

<?php get_footer(); ?>