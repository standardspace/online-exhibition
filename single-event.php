<?php get_header(); ?>

<section>
	<div class="ma-container">
		<h1> <?php the_title();?> </h1>

    <?php if( get_field('date') ): ?>
	    <p><strong>Event Date: <?php the_field('date'); ?></strong></p>
    <?php endif; ?>

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID();?>" <?php post_class(); ?>>
				<?php the_content();?>
			</article>

		<?php endwhile;?>

		<?php else: ?>

			<article>
				<h2> Sorry, nothing to display. </h2>
			</article>

		<?php endif; ?>		
	</div>
</section>

<?php get_footer(); ?>