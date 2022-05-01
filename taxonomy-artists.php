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
			$biography = get_field('biography', $term->taxonomy . '_' . $term->term_id);
			$statement = get_field('statement', $term->taxonomy . '_' . $term->term_id);
			$interview = get_field('interview', $term->taxonomy . '_' . $term->term_id);
			if ( $biography || $statement || $interview ){
				echo '<div class="ma-artist-page__text">';
					if ($biography) {
							echo '<div class="ma-artist-page__bio">';
								echo $biography;
							echo '</div>';
					} 

					if ($statement) {
							echo '<div class="ma-artist-page__statement">';
								echo '<h2>Statement</h2>';
								echo $statement;
							echo '</div>';
					}

					if ($interview) {
							echo '<div class="ma-artist-page__interview">';
								echo '<h2>Interview</h2>';
								echo $interview;
							echo '</div>';
					}
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
				<h2>Artworks</h2>
				<?php while ( have_posts() ) : the_post(); ?>
					<div class="ma-artist-page__artwork">
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<?php the_post_thumbnail('large'); ?>
					</div>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>	

	</div>


</div>

<?php get_footer(); ?>