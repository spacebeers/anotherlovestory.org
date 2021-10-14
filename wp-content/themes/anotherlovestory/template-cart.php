<?php
    $backet_text = get_theme_mod('anotherlovestory_basket_text');
?>

<?php get_header(); ?>
    <div class="text--xs-center padded-page cart-page">
         <header class="archive-header text--xs-center">
            <h1 class="underline">Enquiry Form</h1>
            <p class="sub-title">Your collection</p>
        </header>

        <form id="enquiries_form" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post" novalidate>
            <div class="grid grid--no-gutters text--xs-center">
                <div class="constrain">
                    <?php
                        $cookie = stripslashes($_COOKIE["A_COLLECTION_BASKET"]);
                        $cookieArr = (array) json_decode($cookie);
                        $items = count($cookieArr);

                        if ($items > 0):
                            $count = 0;
                            foreach ($cookieArr as $item):
                                $the_post = get_post($item->id);
                                if ($item->id):
                            ?>

                                <div class="basket-item">
                                    <div class="basket-product">
                                        <div class="basket-image">
                                            <a href="<?php the_permalink($item->id); ?>">
                                                <img src="<?php echo get_the_post_thumbnail_url($item->id); ?>" alt="<?php echo $item->name; ?>">
                                            </a>
                                        </div>
                                        <div class="basket-content">
                                            <h3><a href="<?php the_permalink($item->id); ?>"><?php echo $the_post->post_title; ?></a></h3>
                                            <p><?php echo get_field( "product_number", $item->id ); ?></p>
                                        </div>
                                    </div>
                                    <div class="basket-meta">
                                        <label for="stock">Quantity</label>
                                        <select class="jsQuantity" data-id="<?php echo $item->id; ?>" name="products[<?php echo $count; ?>][quantity]">
                                            <?php for ($i = 1; $i <= get_field( "stock", $item->id ); $i++): ?>
                                                <option value="<?php echo $i; ?>" <?php if ($i == $item->quantity): echo "selected"; endif; ?>><?php echo $i; ?></option>
                                            <?php endfor; ?>
                                        </select>
                                        <input type="hidden" name="products[<?php echo $count; ?>][name]" value="<?php echo $the_post->post_title; ?>" />
                                        <input type="hidden" name="products[<?php echo $count; ?>][id]" value="<?php echo $item->id; ?>" />
                                        <button class="jsDelete" data-id="<?php echo $item->id; ?>">x</button>
                                    </div>
                                </div>
                                <?php
                                    $count++;
                                endif;
                            endforeach;
                        else:
                            echo "Basket empty";
                        endif;
                        ?>

                </div>
            </div>

            <div class="grid grid--no-gutters text--xs-center">
                <div class="constrain">
                    <?php if ($items > 0): ?>
                        <div class="row space-between">
                            <div class="col col--md-6">
                                <div class="input">
                                    <label for="first_name">First name *</label>
                                    <input type="text" name="details[first_name]" id="first_name" data-validation="required" />
                                </div>

                                <div class="input">
                                    <label for="last_name">Last name *</label>
                                    <input type="text" name="details[last_name]" id="last_name" data-validation="required" />
                                </div>

                                <div class="input">
                                    <label for="email_address">Email address *</label>
                                    <input type="text" name="details[email_address]" id="email_address" data-validation="email required" />
                                </div>

                                <div class="input">
                                    <label for="telephone">Telephone *</label>
                                    <input type="text" name="details[telephone]" id="telephone" data-validation="required" />
                                </div>

                                <div class="grid grid--no-gutters">
                                    <div class="row row--no-gutters">
                                        <div class="col col--md-6">
                                            <div class="input date-input">
                                                <label for="from_date">From date *</label>
                                                <input type="text" placeholder="DD/MM/YYYY" readonly name="details[from_date]" id="from_date" class="datepicker-here" data-position="top center" data-date-format='dd/mm/yyyy' data-language='en' data-validation="required" />
                                            </div>
                                        </div>
                                        <div class="col col--md-6">
                                            <div class="input date-input">
                                                <label for="return_date">Return date *</label>
                                                <input type="text" placeholder="DD/MM/YYYY" readonly name="details[return_date]" id="return_date" class="datepicker-here" data-position="top center" data-date-format='dd/mm/yyyy' data-language='en' data-validation="required" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col col--md-6">
                                <div class="input">
                                    <label for="company">Company *</label>
                                    <input data-validation="required" type="text" name="details[company]" id="company" />
                                </div>
                                <div class="input">
                                    <label for="job_reference">Job Reference *</label>
                                    <input data-validation="required" type="text" name="details[job_reference]" id="job_reference" />
                                </div>
                                <div class="input">
                                    <label for="building">Delivery address *</label>
                                    <input data-validation="required" type="text" placeholder="Building" name="details[building]" id="building" />
                                </div>
                                <div class="input">
                                    <label for="street" class="visually-hidden">Street *</label>
                                    <input data-validation="required" type="text" placeholder="Street" name="details[street]" id="street" />
                                </div>
                                <div class="input">
                                    <label for="town" class="visually-hidden">Town *</label>
                                    <input data-validation="required" type="text" placeholder="Town" name="details[town]" id="town" />
                                </div>
                                <div class="input">
                                    <label for="post_code" class="visually-hidden">Post code *</label>
                                    <input data-validation="required" type="text" placeholder="Post code" name="details[post_code]" id="post_code" />
                                </div>
                            </div>

                            <div class="col col--xs-12 text--xs-center">
                                <input type="hidden" name="action" value="enquiry_form" />
                                <input type="submit" class="btn-ghost" value="Submit Enquiry" />
                            </div>
                        </div>
                    <?php endif;?>

                    <p class="text--xs-center text--sm-left basket-text">
                        <?php echo $backet_text; ?>
                    </p>
                </div>
            </div>
        </form>
    </div>

<?php get_footer(); ?>