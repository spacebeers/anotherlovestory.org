<?php
    while ( have_posts() ) : the_post();
        header('Location: ' . get_field('link'));
        exit();
    endwhile;
?>
