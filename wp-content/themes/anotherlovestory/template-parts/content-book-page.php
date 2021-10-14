<?php
    $type = get_field('moodboard_type');

    if ($type == 'four'):
        $mood_board = get_field('mood_board_4');
    elseif ($type == 'six'):
        $mood_board = get_field('mood_board_6');
    elseif ($type == 'eight'):
        $mood_board = get_field('mood_board');
    else:
        $mood_board = get_field('mood_board');
    endif;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class("product-page"); ?>>
    <div class="grid grid--no-gutters">
        <div class="row space-between">
            <div class="col col--md-8">
                <div class="product-main">
                    <div class="fade">
                        <?php foreach( $mood_board as $image ): ?>
                            <div>
                                <div class="contain-image">
                                    <div class="content">
                                        <?php echo wp_get_attachment_image( $image['ID'], $size ); ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="col col--md-4">
                <div class="product-details">
                    <h1 class="title-text"><?php the_title(); ?></h1>
                    <?php
                        $authors = get_field('authors');
                        if( $authors ): ?>
                            <p class="subtitle">
                                By
                                
                                <?php 
                                    foreach( $authors as $post ): 
                                        setup_postdata($post);
                                        echo '<span><a href="'.get_the_permalink().'">' . get_the_title() . '</a></span>';
                                    endforeach;
                                    wp_reset_postdata();
                                ?>
                    <?php 
                        endif; 
                    ?>

                    <hr class="divider" />

                    <div class="product-notes">
                        <?php the_content(); ?>
                    </div>

                    <a href="#login-form" id="checkout-modal-open" class="btn btn-primary btn-block">
                        Order now
                    </a>   
                </div>
            </div>
        </div>
    </div>
</article>

<section id="login-form" class="modal">
    <div class="form-header">
        <h2 class="underline">Checkout</h2>

        <p>1 x <?php the_title(); ?></p>
    </div>
    
    <?php
        echo do_shortcode('[wpforms id="63"]');
    ?>
</section>