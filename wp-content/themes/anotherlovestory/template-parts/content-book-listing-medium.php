<?php
    $mood_board = get_field('mood_board_6', get_the_ID());
?>

<div class="moodboard">
    <div class="moodboard--column">
        <div class="moodboard-group-smaller">
            <div class="moodboard-column-smaller">
                <a href="<?php the_permalink(); ?>">
                    <img src="<?php echo $mood_board[0]['sizes']['medium']; ?>" alt="<?php echo $mood_board[0]['alt']; ?>">
                    <span class="hover">
                        <span class="hover-content">
                            Read more
                        </span>
                    </span>
                </a>
            </div>
            <div class="moodboard-column-smaller">
                <a href="<?php the_permalink(); ?>">
                    <img src="<?php echo $mood_board[1]['sizes']['medium']; ?>" alt="<?php echo $mood_board[1]['alt']; ?>">
                    <span class="hover">
                        <span class="hover-content">
                            Read more
                        </span>
                    </span>
                </a>
            </div>
        </div>
        <div class="moodboard-main">
            <div class="square">
                <div class="content">
                    <a href="<?php the_permalink(); ?>">
                        <img src="<?php echo $mood_board[2]['sizes']['medium']; ?>" alt="<?php echo $mood_board[2]['alt']; ?>">
                        <span class="hover">
                            <span class="hover-content">
                                Read more
                            </span>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="moodboard--column">
        <div class="moodboard-main">
            <div class="square">
                <div class="content">
                    <a href="<?php the_permalink(); ?>">
                        <img src="<?php echo $mood_board[3]['sizes']['medium']; ?>" alt="<?php echo $mood_board[3]['alt']; ?>">
                        <span class="hover">
                            <span class="hover-content">
                                Read more
                            </span>
                        </span>
                    </a>
                </div>
            </div>
        </div>
        <div class="moodboard-group-smaller">
            <div class="moodboard-column-smaller">
                <a href="<?php the_permalink(); ?>">
                    <img src="<?php echo $mood_board[4]['sizes']['medium']; ?>" alt="<?php echo $mood_board[4]['alt']; ?>">
                    <span class="hover">
                        <span class="hover-content">
                            Read more
                        </span>
                    </span>
                </a>
            </div>
            <div class="moodboard-column-smaller">
                <a href="<?php the_permalink(); ?>">
                    <img src="<?php echo $mood_board[5]['sizes']['medium']; ?>" alt="<?php echo $mood_board[5]['alt']; ?>">
                    <span class="hover">
                        <span class="hover-content">
                            Read more
                        </span>
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>
