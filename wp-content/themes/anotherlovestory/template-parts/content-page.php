<article id="post-<?php the_ID(); ?>" <?php post_class("page padded-page"); ?>>
    <header class="archive-header text--xs-center">
		<h1 class="underline"><?php the_title(); ?></h1>
		<div class="head-content">
			<div class="head-contents-new">
                <p class="sub-title"><?php the_field('sub_title'); ?></p>
			</div>
		</div>
	</header>

    <div class="grid grid--no-gutters">
        <div class="row space-between">
            <div class="col col--sm-5">
                <?php the_field('left_column'); ?>
            </div>
            <div class="col col--sm-5">
                <?php the_field('right_column'); ?>
            </div>
        </div>

        <?php if (get_field('bottom_column')) : ?>
            <div class="row space-between">
                <div class="col col--sm-12">
                    <?php the_field('bottom_column'); ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</article>