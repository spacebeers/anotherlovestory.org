<?php 

    $args = array(
        'numberposts'	=> -1,
        'post_type'     => 'book',
        'meta_query' => array(
            array(
                'key' => 'authors',
                'value' => get_the_ID(),
                'compare' => 'LIKE'
            )
        )
    );
    // query
    $the_query = new WP_Query( $args );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class("product-page"); ?>>
    <div class="grid grid--no-gutters">
        <div class="row space-between">
            <div class="col col--md-8">
                <?php if( $the_query->have_posts() ): ?>
                    <div class="product-main">
                        <div class="fade">     
                            <!-- The authors featured image -->
                            <?php the_post_thumbnail( 'large' ); ?>         
                            <!-- Get books tagged with this author  -->
                            <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
                                <a href="<?php the_permalink(); ?>" class="book">
                                    <div class="square">
                                        <div class="content">
                                            <?php the_post_thumbnail( 'large' ); ?>
                                        </div>
                                    </div>
                                </a>
                            <?php endwhile; ?>   
                            <?php wp_reset_query(); ?>
                            <!-- Show this authors image gallery  -->
                            <?php 
                                $images = get_field('gallery');
                                $size = 'large';
                                if( $images ): 
                            ?>
                                <?php foreach( $images as $image ): ?>
                                    <div class="square">
                                        <div class="content">
                                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>                 
                <?php else: ?>
                    <div class="product-main">
                        <?php the_post_thumbnail( 'large' ); ?>
                    </div>
                <?php endif; ?>                
            </div>
            <div class="col col--md-4">
                <div class="product-details">
                    <h1 class="title-text"><?php the_title(); ?></h1>
                    <?php
                        $subtitle = get_field('subtitle');
                        if( $subtitle ): ?>
                            <p class="subtitle"><?php echo get_field('subtitle'); ?></p>
                    <?php 
                        endif; 
                    ?>

                    <hr class="divider" />

                    <div class="product-notes">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</article>