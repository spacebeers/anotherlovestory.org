<?php
    $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
?>

<article class="category-listing">
    <div class="category-image">
        <div class="content">
            <img src="<?php echo $featured_img_url; ?>" alt="<?php the_title(); ?>" />
        </div>
    </div>
    <h2 class="title-text"><?php the_title(); ?></h2>
    <?php if (get_field('price')): ?>
        <span class="sub-title">&pound;<?php the_field('price'); ?></span>
    <?php endif; ?>
</article>

