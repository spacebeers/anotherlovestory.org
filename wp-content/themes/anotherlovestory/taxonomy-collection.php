<?php get_header(); ?>
	<section id="primary" class="category-listing">
		<header class="archive-header text--xs-center">
			<h1 class="underline"><?php single_term_title(); ?></h1>
			<p class="sub-tag">Collection</p>
		</header>

		<?php if ( have_posts() ) : ?>
		<div class="grid products-grid">
			<div class="row">
		<?php
		while ( have_posts() ) :
			the_post(); ?>
			<div class="col col--sm-6 col--md-3 listing-item">
				<?php get_template_part( 'template-parts/content', 'product-listing' ); ?>
			</div>
		<?php
		endwhile; ?>
			</div>
		</div>
		<?php else :
				global $wp_query;
				$wp_query->set_404();
				status_header( 404 );
				get_template_part( 404 ); exit();
			endif;
		?>
	</section>

<?php get_footer(); ?>