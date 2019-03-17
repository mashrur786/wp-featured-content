<?php
/**
 * Created by PhpStorm.
 * User: mashrur
 * Date: 17/03/2019
 * Time: 21:03
 */
function wpfc_image_upload($name, $width, $height){

    $img = get_option( $name );
    $default_image = plugins_url('img/place_holder.jpg', PLUGIN_BASE);

    if ( !empty( $img ) ) {
        $image_attributes = wp_get_attachment_image_src( $img, array( $width, $height ) );
        $src = $image_attributes[0];
        $value = $img;
    } else {
        $src = $default_image;
        $value = '';
    }

    $text = __( 'Upload', PLUGIN_NAME );

    // Print HTML field
    echo '
        <div class="upload">
            <img data-src="' . $default_image . '" src="' . $src . '" width="' . $width . 'px" height="' . $height . 'px" />
            <div>
                <input type="hidden" name="' . $name . '" id="' . $name .'" value="' . $value . '" />
                <button type="submit" class="upload_image_button button">' . $text . '</button>
                <button type="submit" class="remove_image_button button">&times;</button>
            </div>
        </div>
    ';


}