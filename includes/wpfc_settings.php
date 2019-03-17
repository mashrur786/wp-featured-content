<?php
/**
 * Created by PhpStorm.
 * User: mashrur
 * Date: 17/03/2019
 * Time: 15:09
 */

function wpfc_settings_section(){
    // register a new section in the  page

    add_settings_section(
        'wp-featured-content',
        'WP Featured Section',
        'wpfc_settings_section_cbk',
        'wp-featured-content'
    );
}

function wpfc_register_settings(){

 // register a new setting for wpfc box one
    register_setting(
        'wpfc_seetings', //option/setting group
        'wpcf_box_one_title' //option/option name

    );

    register_setting(
        'wpfc_seetings', //option/setting group
        'wpcf_box_one_description' //option/option name

        );

    register_setting(
        'wpfc_seetings', //option/setting group
        'wpcf_box_one_type' //option/option name

        );

    register_setting(
        'wpfc_seetings', //option/setting group
        'wpcf_box_one_content'//option/option name

        );


}

function wpfc_settings_section_cbk(){

    echo '<h4> Settings </h4>';
    echo '<hr>';
}

