<?php
	$current_category = get_the_category();
	$top_level = $current_category[0]->parent ? $current_category[0]->parent : $current_category[0]->term_id;
	$children = get_term_children( $top_level, "category" );
	$parent = get_term( $top_level, "category" );
	$parent_link = get_term_link( $parent );
?>
<?php get_header(); ?>
	<section id="primary" class="category-listing">
		<header class="archive-header text--xs-center">
			<h1 class="underline"><a href="<?php echo $parent_link; ?>"><?php echo $parent->name; ?></a></h1>
			<ul class="sub-nav">
				<?php foreach ($children as $child):
					$child_term = get_term( $child, "category" );
					$child_link = get_term_link( $child );
				?>
					<li><a href="<?php echo $child_link; ?>"><?php echo $child_term->name; ?></a></li>
				<?php endforeach; ?>
			</ul>
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