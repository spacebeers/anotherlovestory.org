<?php
get_header(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class("page padded-page page-template-default"); ?>>
		<header class="archive-header text--xs-center">
			<h1><?php _e( 'SORRY WE COULDN\'T FIND THAT PAGE', 'anotherlovestory' ); ?></h1>
			<p class="sub-title">A Collection</p>
		</header>

		<div class="grid grid--no-gutters">
			<div class="row justify-content-center">
				<div class="col col--md-5">
					<p><?php _e( 'SORRY WE COULDN\'T FIND THE PAGE YOU WERE LOOKING FOR. HERE\'S A FEW LINKS THAT MAY BE HELPFUL.', 'anotherlovestory' ); ?></p>

					<ul>
						<?php
							wp_nav_menu( array(
								'menu'              => 'main_menu',
								'theme_location'    => 'main_menu',
								'depth'             => 1,
								'container'         => false,
								'items_wrap' => '%3$s')
							);

							wp_nav_menu( array(
								'menu'              => 'secondary_menu',
								'theme_location'    => 'secondary_menu',
								'depth'             => 1,
								'container'         => false,
								'items_wrap' => '%3$s')
							);
						?>
					</ul>

					<p><?php _e( 'IF NEED FURTHER ASSISTANCE, PLEASE FEEL FREE TO CALL ON +44 (0)20 305 500 75.', 'anotherlovestory' ); ?></p>
				</div>
			</div>
		</div>
	</article>

<?php get_footer(); ?>