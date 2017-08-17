<?php

function add_theme_menu_item() {
    add_menu_page("Theme Panel", "Theme Panel", "manage_options", "theme-panel", "theme_settings_page", null, 99);
}

add_action("admin_menu", "add_theme_menu_item");

function theme_settings_page() {
    /*
      wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js', false, '1.8.1' );
      wp_enqueue_script( 'jquery' );
     */
    wp_enqueue_script('jquery-ui-sortable');
    ?>

    <div class="wrap">
        <h1>Theme Panel</h1>
        <form name="themeoptions" method="post" action="">
            <input type="hidden" name="update_settings" value="Y" />
            <?php
            settings_fields("section");
            do_settings_sections("theme-options");
            submit_button();
            ?>          
        </form>
    </div>
    <?php
    if (isset($_POST["update_settings"])) {
        $logo = esc_attr($_POST['theme_onetheme_logo']);
        update_option("theme_onetheme_logo", $logo);

        $page = esc_attr($_POST['theme_page']);
        update_option("theme_onetheme_page", $page);

        $vid1 = esc_attr($_POST['slider1']);
        update_option("theme_onetheme_slider1", $vid1);
        $vid2 = esc_attr($_POST['slider2']);
        update_option("theme_onetheme_slider2", $vid2);
        $vid3 = esc_attr($_POST['slider3']);
        update_option("theme_onetheme_slider3", $vid3);
        $vid4 = esc_attr($_POST['slider4']);
        update_option("theme_onetheme_slider4", $vid4);
        $vid5 = esc_attr($_POST['slider5']);
        update_option("theme_onetheme_slider5", $vid5);

        $twitter_customer_key = esc_attr($_POST['twitter_customer_key']);
        update_option("twitter_customer_key", $twitter_customer_key);

        $twitter_customer_secret = esc_attr($_POST['twitter_customer_secret']);
        update_option("twitter_customer_secret", $twitter_customer_secret);

        $twitter_access_token = esc_attr($_POST['twitter_access_token']);
        update_option("twitter_access_token", $twitter_access_token);

        $twitter_access_token_secret = esc_attr($_POST['twitter_access_token_secret']);
        update_option("twitter_access_token_secret", $twitter_access_token_secret);

        $twitterprofile = esc_attr($_POST['twitterprofile']);
        update_option("twitter_profile", $twitterprofile);
    }
}

/* Logo */

function onetheme_get_default_options() {
    $options = wp_get_attachment_image_src($attachment_id = 0);
    return $options;
}

function onetheme_options_init() {
    $onetheme_options = get_option('theme_onetheme_logo');

    // Are our options saved in the DB?
    if (false === $onetheme_options) {
        // If not, we'll save our default options
        $onetheme_options = onetheme_get_default_options();
        add_option('theme_onetheme_logo', $onetheme_options);
    }

    // In other case we don't need to update the DB
}

// Initialize Theme options
add_action('after_setup_theme', 'onetheme_options_init');

function onetheme_options_settings_init() {
    // Add Logo uploader
    add_settings_field('onetheme_setting_logo', __('Logo'), 'onetheme_setting_logo', 'theme-options', 'section');
}

add_action('admin_init', 'onetheme_options_settings_init');

function onetheme_setting_logo() {
    $onetheme_options = get_option('theme_onetheme_options');
    ?>
    <input type="text" id="logo_url" name="theme_onetheme_logo" value="<?php echo esc_url($onetheme_options['logo']); ?>" />
    <input id="upload_logo_button" type="button" class="button" value="<?php _e('Upload Logo', 'onetheme'); ?>" />
    <span class="description"><?php _e('Upload an image for the banner.', 'onetheme'); ?></span>
    <?php
}

/* Media Uploader Scripts */

function onetheme_options_enqueue_scripts() {
    wp_register_script('media-uploader', get_template_directory_uri() . '/js/media-uploader.js', array('jquery', 'media-upload', 'thickbox'));
    wp_enqueue_script('jquery');

    wp_enqueue_script('thickbox');
    wp_enqueue_style('thickbox');

    wp_enqueue_script('media-upload');
    wp_enqueue_script('media-uploader');
}

add_action('admin_enqueue_scripts', 'onetheme_options_enqueue_scripts');

/* Main Slider Settings */

function main_slider_enqueue_scripts() {
    wp_register_script('addbox', get_template_directory_uri() . '/js/addbox.js', array('jquery', 'media-upload', 'thickbox'));
    wp_enqueue_script('addbox');
}

add_action('admin_enqueue_scripts', 'main_slider_enqueue_scripts');

function slider_display() {
    ?>     
    <input id="add" type="button" class="button" name="add" value="Add"/>     
    <?php
}

/* Youtube video slider */

function video_slider() {
    ?>

    1. <input id="v1" type="text" name="slider1" /><br>
    2. <input id="v2" type="text" name="slider2" /><br>
    3. <input id="v3" type="text" name="slider3" /><br>
    4. <input id="v4" type="text" name="slider4" /><br>
    5. <input id="v5" type="text" name="slider5" /><br>

    <?php
    /* Content Fetch for particular page */
}

/* Specified Page Content Code */

function fetch_content() {
    ?>   

    <select id="pages" name="theme_page"> 
        <option value="">
            <?php echo esc_attr(__('Choose Specific Page')); ?></option> 
        <?php
        $pages = get_pages();
        //$instance["page"] = array();
        foreach ($pages as $page) {
            $option = '<option value="' . $page->ID . '">';
            $option .= $page->post_title;
            $option .= '</option>';
            echo $option;
        }
        ?>
    </select>

    <?php
}

/* Facebook username */

function fb_username() {
    ?>
    <input id="fb" type="text" name="fbusername" />

    <?php
}

/* Twitter Profile */

function twitter_username() {
    ?>
    Twitter_customer_key<input id="twitter" type="text" name="twitter_customer_key" /></br>
    Twitter_customer_secret<input id="twitter" type="text" name="twitter_customer_secret" /></br>
    Twitter_access_token<input id="twitter" type="text" name="twitter_access_token" /></br>
    Twitter_access_token_secret<input id="twitter" type="text" name="twitter_access_token_secret" /></br>
    Username<input id="twitter" type="text" name="twitterprofile" />

    <?php
}

function display_theme_panel_fields() {

    add_settings_section("section", "All Settings", null, "theme-options");

    add_settings_field("ytslider", "YouTube Slider Settings ", "video_slider", "theme-options", "section");
    add_settings_field("fetch_content", "Static Page Content", "fetch_content", "theme-options", "section");
    add_settings_field("fb_username", "FB Page Username", "fb_username", "theme-options", "section");
    add_settings_field("twitter_username", "Twitter Profile Username", "twitter_username", "theme-options", "section");
}

add_action("admin_init", "display_theme_panel_fields");
