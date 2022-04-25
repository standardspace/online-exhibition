<?php get_header(); ?>

<ul class="ma-gallery">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<li class="ma-gallery__item">
			<h2 class="ma-gallery__item__title"><a href="<?php the_permalink(); ?>"><span class="sr-only"><?php the_title(); ?></a></span></h2>
			<?php the_post_thumbnail('large'); ?>
			<!-- <p> Artist:        
				<?php
					// $terms = get_the_terms( $post->ID , 'artists' );
					// foreach ( $terms as $term ) {
					// 	echo $term->name;
					// }
				?>
			</p> -->
		</li>
	<?php endwhile; endif; ?>	
</ul>
<div class="loading">
	<span class="loading__dot"></span>
	<span class="loading__dot"></span>
	<span class="loading__dot"></span>
</div>

<?php get_footer(); ?>