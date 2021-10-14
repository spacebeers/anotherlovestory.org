<?php
	$count = 0;
	$option_page = 'cpt_stories';
?>

<?php get_header(); ?>
<section id="primary" class="category-listing">
	<header class="archive-header text--xs-center">
		<h1 class="underline"><?php the_field('title', $option_page); ?></h1>
		<div class="head-content">
			<div class="head-contents-new">
				<?php the_field('content', $option_page); ?>	
			</div>
		</div>
	</header>

	<?php if (have_posts()) : ?>
		<div class="grid grid--no-gutters">
			<div class="row row--no-gutters space-between">
				<?php
				while (have_posts()) :
					the_post();
				?>
					<div class="col col--no-gutters col--sm-12 col--md-6 collections-grid">
						<a href="<?php echo get_field('link'); ?>" target="_blank" class="square">
							<div class="content">
								<?php the_post_thumbnail( 'large' ); ?>
							</div>
							 <span class="hover">
								<span class="hover-content">
									See story
								</span>
							</span>
						</a>
						<h2 class="underline-title">
							<a href="<?php echo get_field('link'); ?>" target="_blank">
								<?php the_title(); ?>
							</a>
						</h2>
						<?php if (get_field('tag')) : ?>
							<p class="sub-title">
								<?php the_field('tag'); ?>
							</p>
						<?php endif; ?>

						<?php the_content(); ?>
					</div>
				<?php
					endwhile;
				?>
			</div>
		</div>
	<?php else :
		// If no content, include the "No posts found" template.
		get_template_part('content', 'none');
	endif;
	?>
</section>

<?php get_footer(); ?>