<?php
    $dimensions = get_field('dimensions');
    $product_dimensions = $dimensions['width'] . ", " . $dimensions['depth'] . ", " . $dimensions['height'] . " " . $dimensions['units'];
    $stock = get_field('stock');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class("product-page"); ?>>
    <div class="grid grid--no-gutters">
        <div class="row space-between">
            <div class="col col--md-8">
                <div class="product-main">
                    <?php the_post_thumbnail(); ?>
                </div>
            </div>
            <div class="col col--md-4">
                <div class="product-details">
                    <h1 class="title-text"><?php the_title(); ?></h1>
                    <small><?php the_field('product_number'); ?></small>

                    <?php if (get_field('price')): ?>
                        <p class="product-price">
                            &pound;<?php the_field('price'); ?>
                        </p>
                    <?php endif; ?>
                    <ul class="feature-list">
                        <li>Dimension: <?php echo $product_dimensions; ?></li>
                        <?php if (get_field('colour')): echo "<li>Colour: " . get_field('colour') . "</li>"; endif; ?>
                        <?php if (get_field('material')): echo "<li>Material: " . get_field('material') . "</li>"; endif; ?>
                    </ul>

                    <div class="product-notes">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</article>