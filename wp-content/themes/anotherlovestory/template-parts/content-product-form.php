<?php
    $thumb_id = get_post_thumbnail_id();
    $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
    $thumb_url = $thumb_url_array[0];
?>
<form action="" id="stock-form">
    <label for="stock">Quantity: </label>
    <select name="stock">
        <?php for ($i = 1; $i <= $stock; $i++): ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php endfor; ?>
    </select>
    <input type="hidden" name="id" id="productID" value="<?php the_ID(); ?>" />
    <button type="submit" class="btn-ghost btn-block">Add to collection</button>
</form>