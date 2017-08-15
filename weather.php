<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Register and load the widget
function weather_widget() {
    register_widget('weather_widget');
}

add_action('widgets_init', 'weather_widget');

// Creating the widget 
class weather_widget extends WP_Widget {

    function __construct() {
        parent::__construct(
// Base ID of your widget
                'weather_widget',
// Widget name will appear in UI
                __('Weather', 'weather_domain'),
// Widget description
                array('description' => __('Sample widget for showing weather of current city', 'weather_domain'),)
        );
    }

// Creating widget front-end

    public function widget($args, $instance) {
        $title = apply_filters('widget_title', $instance['title']);

// before and after widget arguments are defined by themes
        echo $args['before_widget'];
        if (!empty($title))
            echo $args['before_title'] . $title . $args['after_title'];


        if (empty($instance['city'])) {
            $instance['city'] = "Ahmedabad";
        }
        ?>
        <!-- // This is where you run the code and display the output -->
        <button class="btn btn-primary btn-sm" onclick="javascript:call('<?php echo $instance['city']; ?>')">Click on Button To Get <?php echo $instance['city']; ?> Weather</button>

        <div id="weatherinfo"></div>
        <?php
        echo $args['after_widget'];
    }

// Widget Backend 
    public function form($instance) {
        if (isset($instance['title'])) {
            $title = $instance['title'];
        } else {
            $title = __('Weather', 'weather_domain');
        }
        $city = isset($instance['city']) ? esc_attr($instance['city']) : '';
// Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p><label for="<?php echo $this->get_field_id('city'); ?>"><?php _e('Enter City Name:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('city'); ?>" name="<?php echo $this->get_field_name('city'); ?>" type="text" value="<?php echo $city; ?>" placeholder="City Name Here"/></p>


        <?php
    }

// Updating widget replacing old instances with new
    public function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = (!empty($new_instance['title']) ) ? strip_tags($new_instance['title']) : '';
        $instance['city'] = esc_sql($new_instance['city']);
        return $instance;
    }

}
