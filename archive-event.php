<?php get_header(); ?>

<div class="ma-container">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<section>
			<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
			<?php the_excerpt(); ?>
		</section>
	<?php endwhile; endif; ?>	
</div>

<?php get_footer(); ?>