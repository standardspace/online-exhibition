<?php get_header(); ?>

<ul class="ma-gallery">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php
			$artistTermId = get_field( "artist", $post->ID );
			$artist = get_term( $artistTermId, 'artists');
		?>
		<li 
			class="ma-gallery__item"
			data-title="<?php the_title(); ?>"
			data-artist="<?= $artist->name ?>"
			data-artist-url="<?= home_url(); ?>/<?= $artist->taxonomy ?>/<?= $artist->slug ?>/"
			data-image-full="<?php the_post_thumbnail_url('large'); ?>"
		>
			<h2 class="ma-gallery__item__title">
					<a 
						class="ma-gallery__item__link" 
						href="<?php the_permalink(); ?>"
					>
						<span class="sr-only"><?php the_title(); ?></span>
					</a>
			</h2>
			<?php the_post_thumbnail('large'); ?>
		</li>
	<?php endwhile; endif; ?>	
</ul>
<!-- <div class="loading">
	<span class="loading__dot"></span>
	<span class="loading__dot"></span>
	<span class="loading__dot"></span>
</div> -->

<?php get_footer(); ?>