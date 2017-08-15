<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function onetheme_get_default_options() {
    $options = array(
        'logo' => ''
    );
    return $options;
}

function onetheme_options_init() {
    $onetheme_options = get_option('theme_onetheme_options');

    // Are our options saved in the DB?
    if (false === $onetheme_options) {
        // If not, we'll save our default options
        $onetheme_options = onetheme_get_default_options();
        add_option('theme_onetheme_options', $onetheme_options);
    }

    // In other case we don't need to update the DB
}

// Initialize Theme options
add_action('after_setup_theme', 'onetheme_options_init');

function onetheme_options_settings_init() {
    register_setting('theme_onetheme_options', 'theme_onetheme_options', 'onetheme_options_validate');

    // Add a form section for the Logo
    add_settings_section('onetheme_settings_header', __('Logo Options', 'onetheme'), 'onetheme_settings_header_text', 'onetheme');

    // Add Logo uploader
    add_settings_field('onetheme_setting_logo', __('Logo', 'onetheme'), 'onetheme_setting_logo', 'onetheme', 'onetheme_settings_header');
}

add_action('admin_init', 'onetheme_options_settings_init');

function onetheme_settings_header_text() {
    ?>
    <p><?php _e('Manage Logo Options for onetheme Theme.', 'onetheme'); ?></p>
    <?php
}

function onetheme_setting_logo() {
    $onetheme_options = get_option('theme_onetheme_options');
    ?>
    <input type="text" id="logo_url" name="theme_onetheme_options[logo]" value="<?php echo esc_url($onetheme_options['logo']); ?>" />
    <input id="upload_logo_button" type="button" class="button" value="<?php _e('Upload Logo', 'onetheme'); ?>" />
    <span class="description"><?php _e('Upload an image for the banner.', 'onetheme'); ?></span>
    <?php
}
