<?php
$count = 0;
$option_page = 'cpt_book';
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

					$type = get_field('moodboard_type');

				?>
					<div class="col col--no-gutters col--sm-12 col--md-6 collections-grid">
						<div class="book">
							<div class="content">
								<?php
									if ($type == 'four') :
										include(locate_template('template-parts/content-book-listing-small.php'));
									elseif ($type == 'six') :
										include(locate_template('template-parts/content-book-listing-medium.php'));
									elseif ($type == 'eight') :
										include(locate_template('template-parts/content-book-listing.php'));
									else :
										include(locate_template('template-parts/content-book-listing.php'));
									endif;
									$count++;
								?>
							</div>
						</div>
						<div class="book-information">
							<h2 class="underline-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<?php
								$authors = get_field('authors');
								if( $authors ): ?>
									<p class="tag">
										By
										
										<?php 
											foreach( $authors as $post ): 
												setup_postdata($post);
												echo '<span>' . get_the_title() . '</span>';
											endforeach;
											wp_reset_postdata();
										?>
							<?php 
								endif; 
							?>
						</div>
					</div>
				<?php
				endwhile; ?>
			</div>
		</div>
	<?php else :
		// If no content, include the "No posts found" template.
		get_template_part('content', 'none');
	endif;
	?>
</section>

<?php get_footer(); ?>