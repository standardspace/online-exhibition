<?php get_header(); ?>

<div class="ma-container ma-artist-page">

	<h1 class="page-title"><?php echo single_term_title(); ?></h1>  

	<div class="ma-artist-page__details">

		<?php 
			$term = get_queried_object();
			$image = get_field('portrait', $term->taxonomy . '_' . $term->term_id);
			if( $image ) :
		?>
		<div class="ma-artist-page__portrait">
			<?php  echo wp_get_attachment_image( $image, 'large' ); ?>
		</div>
		<?php endif; ?>

		<?php 
			$description = get_field('biography', $term->taxonomy . '_' . $term->term_id);
			if ($description) {
					echo '<div class="ma-artist-page__bio">';
					echo $description;
					echo '</div>';
			} 

			// Featured artwork
			// $featuredArtwork = get_field('featured_artwork', $term->taxonomy . '_' . $term->term_id);

			// if ( $featuredArtwork ) {
			// 	echo get_the_post_thumbnail($featuredArtwork, 'medium' );
			// }
		?>

		<?php if ( have_posts() ) : ?>
			<div class="ma-artist-page__artworks">
				<h2>Artworks by <?php echo single_term_title(); ?></h2>
				<?php while ( have_posts() ) : the_post(); ?>
					<section>
						<h3> <?php the_title(); ?></h3>
						<?php the_post_thumbnail('medium'); ?>
						<?php // the_excerpt(); ?>
						<button> <a href="<?php the_permalink(); ?>"> View </a> </button>
					</section>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>	

	</div>


</div>

<?php get_footer(); ?>