<?php
	$page_content = get_theme_mod('anotherlovestory_page_text');
?>

<?php get_header(); ?>
	<section id="primary" class="category-listing">
		<header class="archive-header text--xs-center">
			<h1 class="underline">A Collection</h1>
			<div class="head-content">
				<div class="head-contents-new">
					<?php echo $page_content; ?>
				</div>
			</div>
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
				// If no content, include the "No posts found" template.
				get_template_part( 'content', 'none' );
			endif;
		?>
	</section>

<?php get_footer(); ?>