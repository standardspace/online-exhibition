<?php get_header(); ?>

<div class="container">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<section>
			<h1> <?php the_title(); ?></h1>
      <?php the_post_thumbnail('medium'); ?>
			<p> Artist:        
				<?php
					$terms = get_the_terms( $post->ID , 'artists' );
					foreach ( $terms as $term ) {
						echo $term->name;
					}
				?>
			</p>
			<?php // the_excerpt(); ?>
			<button> <a href="<?php the_permalink(); ?>"> Read More </a> </button>
		</section>
	<?php endwhile; endif; ?>	
</div>

<?php get_footer(); ?>