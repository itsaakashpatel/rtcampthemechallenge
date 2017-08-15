<?php
/**
 * Onetheme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Onetheme
 */
require_once( 'themeoptions.php' );
require_once( 'weather.php' );
require_once 'customposttype.php';
global $list;

if (!function_exists('onetheme_setup')) :

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function onetheme_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Onetheme, use a find and replace
         * to change 'onetheme' to the name of your theme in all the template files.
         */
        load_theme_textdomain('onetheme', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'primary' => esc_html__('primary', 'onetheme'),
            'secondary' => esc_html('secondary', 'onetheme'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('onetheme_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support('custom-logo', array(
            'height' => 250,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true,
        ));
    }

endif;
add_action('after_setup_theme', 'onetheme_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function onetheme_content_width() {
    $GLOBALS['content_width'] = apply_filters('onetheme_content_width', 640);
}

add_action('after_setup_theme', 'onetheme_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function onetheme_widgets_init() {
    if (function_exists('register_sidebar')) {
        register_sidebar(array(
            'name' => 'Footer Left',
            'id' => 'footer-left-widget',
            'description' => 'Left Footer widget position.',
            'before_widget' => '<div id="%1$s">',
            'after_widget' => '</div>',
            'before_title' => '<h2>',
            'after_title' => '</h2>'
        ));

        register_sidebar(array(
            'name' => 'Footer Center',
            'id' => 'footer-center-widget',
            'description' => 'Centre Footer widget position.',
            'before_widget' => '<div id="%1$s">',
            'after_widget' => '</div>',
            'before_title' => '<h2>',
            'after_title' => '</h2>'
        ));
        register_sidebar(array(
            'name' => 'Footer Right',
            'id' => 'footer-right-widget',
            'description' => 'Right Footer widget position.',
            'before_widget' => '<div id="%1$s">',
            'after_widget' => '</div>',
            'before_title' => '<h2>',
            'after_title' => '</h2>'
        ));

        register_sidebar(array(
            'name' => 'Main Sidebar',
            'id' => 'main-sidebar',
            'description' => 'main sidebar',
            'before_widget' => '<div class="col-md-12"><div id="%1$s">',
            'after_widget' => '</div></div>',
            'before_title' => '<h3 class="single-widget">',
            'after_title' => '</h3>'
        ));
    }
}

add_action('widgets_init', 'onetheme_widgets_init');

/**
 * Enqueue scripts and styles.
 */
/* Bootstrap Scripts and Styles */


function onetheme_enqueue_scripts() {
    wp_enqueue_style('onetheme-style', get_stylesheet_uri());
    /* Add google fonts */
    wp_enqueue_style('onetheme-google-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans');

    wp_enqueue_script('onetheme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true);

    wp_enqueue_script('onetheme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true);

    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/lib/bootstrap/css/bootstrap.min.css');
    wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js');
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/lib/bootstrap/js/bootstrap.min.js');
    wp_enqueue_script('weather-js', get_template_directory_uri() . '/js/weather.js');

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'onetheme_enqueue_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}

/* Custom Widgets */


add_action('widgets_init', 'custom_widget_load');

// Register and load the widget
function custom_widget_load() {
    register_widget('custom_page_widget');
}

// Creating the widget 
class custom_page_widget extends WP_Widget {

    function __construct() {
        parent::__construct(
                // Base ID of your widget
                'custom_page_widget',
                // Widget name will appear in UI
                __('Custom Pages Widget', 'custom_widget_domain'),
                // Widget description
                array('description' => __('Sample widget for showing random pages', 'custom_widget_domain'),)
        );
    }

    /* function custom_page_widget() {
      parent::WP_Widget(false, $name == __ ('Custom Pages Widget','custom_widget_domain'));
      } */

    // Widget Backend 
    public function form($instance) {

        //Set the title
        if (isset($instance['title'])) {
            $title = $instance['title'];
        } else {
            $title = __('Pages', 'custom_widget_domain');
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> Pages 
        </p><br/>

        <label><?php _e('Pages:'); ?></label> 
        <div style="overflow-y:scroll; height:150px">
            <?php
            $pages = get_pages();
            foreach ($pages as $page) {
                echo '<input id=' . $this->get_field_id('title') . ' type="checkbox" name="' . $this->get_field_name('title') . '[]" value="' . $page->ID . '" ' . (in_array($page->ID, $instance['title']) ? 'checked' : '') . '>' . esc_html($page->post_title) . '<br/>';
            }
            ?>
        </div>

        <?php
    }

// Updating widget replacing old instances with new
    public function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = esc_sql($new_instance['title']);
        return $instance;
    }

// Creating widget front-end

    public function widget($args, $instance) {

        echo '<h2>Pages </h2>';
        echo '<ul>';
        foreach ($instance['title'] as $page) {
            $pagedata = get_post($page);
            echo "<li class='list-group-item'><a href='" . get_the_permalink($page) . "'>" . $pagedata->post_title . "</a></li>";
        }
        echo "</ul>";
    }

}

//custom_news_widget ends here

/* News Widget */

// Register and load the widget
function news_widget() {
    register_widget('news_widget');
}

add_action('widgets_init', 'news_widget');

class news_widget extends WP_Widget {

    function __construct() {
        parent::__construct(
// Base ID of your widget
                'news_widget',
// Widget name will appear in UI
                __('News', 'news_widget_domain'),
// Widget description
                array('description' => __('Simple widget for showing news', 'news_widget_domain'),)
        );
    }

// Creating widget front-end

    public function widget($args, $instance) {
        $title = apply_filters('widget_title', $instance['title']);

// before and after widget arguments are defined by themes
        echo $args['before_widget'];
        if (!empty($title)) {
            echo $args['before_title'] . $title . $args['after_title'];
        }
// This is where you run the code and display the output
        $url = get_option("stickyurl");
        $ID = url_to_postid($url);
        $title = get_the_title($ID);
        $page_data = get_page($ID);
        $post_thumbnail_id = get_post_thumbnail_id($ID);
        echo '<img src="' . wp_get_attachment_image_url($post_thumbnail_id, 'post-thumbnail') . '" alt="pagethumbnail" style="float:left; margin:10px;" />';
        echo '<h3 class="single-widget-inner">' . $title . '</h3><br>';
        echo '<p>' . get_the_time('Y-m-d', $ID) . '</p>';
        $the_query = new WP_Query(array('category_name' => 'news', 'posts_per_page' => 5));

// The Loop
        if ($the_query->have_posts()) {
            echo "<ul class='panel list-group'>";
            while ($the_query->have_posts()) {
                $the_query->the_post();
                $string = '<a href="' . get_the_permalink() . '" rel="bookmark"><li class="list-group-item">' . get_the_title() . '</li></a>';
                echo $string;
                $instance['string'] = $string;
            }
            echo "</ul>";
        } else {
            echo "No News Category Found";
        }
        echo $args['after_widget'];
    }

// Widget Backend 
    public function form($instance) {
        $durl = get_permalink(1);

        if (isset($instance['title'])) {
            $title = $instance['title'];
        } else {
            $title = __('New title', 'news_widget_domain');
        }
        if (isset($instance['url'])) {
            $url = $instance['url'];
        } else {
            $url = __($durl, 'news_widget_domain');
        }


// Widget admin form
        ?>
        <!-- Title -->
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <!-- Sticky URL -->
        <h4> Sticky Post URL</h4>
        <input name="<?php echo $this->get_field_name('url'); ?>" id="<?php echo $this->get_field_id('url'); ?>" type="text" value="<?php echo esc_attr($url); ?>" />
        <?php update_option("stickyurl", $url); ?>
        <?php
    }

// Updating widget replacing old instances with new
    public function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = (!empty($new_instance['title']) ) ? strip_tags($new_instance['title']) : '';
        $instance['string'] = (!empty($new_instance['string']) ) ? strip_tags($new_instance['string']) : '';
        return $instance;
    }

}

/* Important Links Widget */

// Register and load the widget
function Important_links_widget() {
    register_widget('Important_links');
}

add_action('widgets_init', 'Important_links_widget');

class Important_links extends WP_Widget {

    public function __construct() {
        parent::__construct(
// Base ID of your widget
                'Important_links',
// Widget name will appear in UI
                __('Important Links', 'Important_links_domain'),
// Widget description
                array('description' => __('Simple widget for showing important links', 'Important_links_domain'),)
        );
    }

    public function widget($args, $instance) {
        if (!isset($args['widget_id'])) {
            $args['widget_id'] = $this->id;
        }

        $title = (!empty($instance['title']) ) ? $instance['title'] : __('Important Links');

        $title = apply_filters('widget_title', $title, $instance, $this->id_base);
        ?>

        <?php echo $args['before_widget']; ?>

        <?php
        if ($title) {
            echo $args['before_title'] . $title . $args['after_title'];
        }

        echo '<div class="list-group">';
        if (isset($instance['link1'])) {
            echo '<a target="_blank" href="http://' . $instance['link1'] . '" class="list-group-item">' . $instance['link1'] . '</a>';
        }
        if (isset($instance['link2'])) {
            echo '<a target="_blank" href="http://' . $instance['link2'] . '" class="list-group-item">' . $instance['link2'] . '</a>';
        }
        if (isset($instance['link3'])) {
            echo '<a target="_blank" href="http://' . $instance['link3'] . '" class="list-group-item">' . $instance['link3'] . '</a>';
        }
        if (isset($instance['link4'])) {
            echo '<a target="_blank" href="http://' . $instance['link4'] . '" class="list-group-item">' . $instance['link4'] . '</a>';
        }
        echo '</div></div>';
        ?>

        <?php
        // Reset the global $the_post as this query will have stomped on it
        wp_reset_postdata();
    }

    /**
     * Handles updating the settings for the current Important Links widget instance.
     *
     * @access public
     *
     * @param array $new_instance New settings for this instance as input by the user via
     *                            WP_Widget::form().
     * @param array $old_instance Old settings for this instance.
     * @return array Updated settings to save.
     */
    public function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = sanitize_text_field($new_instance['title']);
        $instance['link1'] = sanitize_text_field($new_instance['link1']);
        $instance['link2'] = sanitize_text_field($new_instance['link2']);
        $instance['link3'] = sanitize_text_field($new_instance['link3']);
        $instance['link4'] = sanitize_text_field($new_instance['link4']);
        return $instance;
    }

    /**
     * Outputs the settings form for the Important Links widget.
     *
     * @access public
     *
     * @param array $instance Current settings.
     */
    public function form($instance) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $link1 = isset($instance['link1']) ? esc_attr($instance['link1']) : '';
        $link2 = isset($instance['link2']) ? esc_attr($instance['link2']) : '';
        $link3 = isset($instance['link3']) ? esc_attr($instance['link3']) : '';
        $link4 = isset($instance['link4']) ? esc_attr($instance['link4']) : '';
        ?>
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

        <p><label for="<?php echo $this->get_field_id('link1'); ?>"><?php _e('Link 1:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('link1'); ?>" name="<?php echo $this->get_field_name('link1'); ?>" type="text" value="<?php echo $link1; ?>" placeholder="link 1"/></p>

        <p><label for="<?php echo $this->get_field_id('link2'); ?>"><?php _e('Link 2:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('link2'); ?>" name="<?php echo $this->get_field_name('link2'); ?>" type="text" value="<?php echo $link2; ?>" placeholder="link 2"/></p>

        <p><label for="<?php echo $this->get_field_id('link3'); ?>"><?php _e('Link 3:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('link3'); ?>" name="<?php echo $this->get_field_name('link3'); ?>" type="text" value="<?php echo $link3; ?>" placeholder="link 3"/></p>

        <p><label for="<?php echo $this->get_field_id('link4'); ?>"><?php _e('Link 4:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('link4'); ?>" name="<?php echo $this->get_field_name('link4'); ?>" type="text" value="<?php echo $link4; ?>" placeholder="link 4"/></p><?php
    }

}

function rtlink($atts) {
    shortcode_atts(array(
        'url' => 'https://aakashpatel.in',
        'title' => 'Aakash Patel',
            ), $atts);
    return '<a href="https://aakashpatel.in/"' . $url . '>"' . $title . '"</a>';
}

add_shortcode('rtlinks', 'rtlink');
