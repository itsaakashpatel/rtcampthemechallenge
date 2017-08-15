<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Onetheme
 */
get_header();
?>
<!-- Main Slider (Our Work) -->
<?php
global $post;
$args = array(
    'post_type' => 'ourworks',
    'numberposts' => -1,
    'orderby' => 'menu_order');

$slider_posts = get_posts($args);
if ($slider_posts) {
    $image = array();
    $p = 0;
// start the loop
    foreach ($slider_posts as $post) {
        setup_postdata($post);
        $myimage = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
        $image[$p] = $myimage[0];
        $p++;
    }
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <!-- Main Slider -->
            <div class="mainslider">
                <div id="myslider" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myslider" data-slide-to="0" class="active"></li>
                        <li data-target="#myslider" data-slide-to="1"></li>
                        <li data-target="#myslider" data-slide-to="2"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="<?php echo $image[0]; ?>" alt="image1"/>
                        </div>

                        <div class="item">
                            <img src="<?php echo $image[1]; ?>" alt="image2">
                        </div>

                        <div class="item">
                            <img src="<?php echo $image[2]; ?>" alt="image3">
                        </div>
                    </div>
                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myslider" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myslider" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
        <!-- Sticky Page -->
        <div class="stickypage">
            <div class="col-md-4 well" style="height: 100%;">
                <?php
                $ID = get_option('theme_onetheme_page');
                $title = get_the_title($ID);
                echo '<h3 style="font-weight:bold;">' . $title . '</h3>';
                $page_data = get_page($ID);
                $post_thumbnail_id = get_post_thumbnail_id($ID);
                echo '<img src="' . wp_get_attachment_image_url($post_thumbnail_id, 'post-thumbnail') . '" alt="pagethumbnail" style="float:left; margin: 15px;" />';
                ;
                $string = apply_filters('the_content', $page_data->post_content);
                if (strlen($string) > 25) {
                    $trimstring = substr($string, 0, 450) . ' <a href="' . get_permalink($ID) . '">Read More...</a>';
                } else {
                    $trimstring = $string;
                }
                echo '<p>' . $trimstring . '</p>';
                ?>

            </div>            
        </div>

    </div>

</div>

<!-- Youtube videos thumbnails -->

<div class="youtubeslider" style="margin:25px;">
    <div class="container">
        <div id="youtubeslider" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#youtubeslider" data-slide-to="0" class="active"></li>
                <li data-target="#youtubeslider" data-slide-to="1"></li>
                <li data-target="#youtubeslider" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <div class="row">
                        <?php echo '<iframe class="col-md-4 col-xs-4" width="560" height="315" src="' . get_option('theme_onetheme_slider1') . '" frameborder="0" allowfullscreen></iframe>'; ?>
                        <?php echo '<iframe class="col-md-4 col-xs-4" width="560" height="315" src="' . get_option('theme_onetheme_slider2') . '" frameborder="0" allowfullscreen></iframe>'; ?>
                        <?php echo '<iframe class="col-md-4 col-xs-4" width="560" height="315" src="' . get_option('theme_onetheme_slider3') . '" frameborder="0" allowfullscreen></iframe>'; ?>
                    </div></div>

                <div class="item">
                    <div class="row">
                        <?php echo '<iframe class="col-md-4 col-xs-4" width="560" height="315" src="' . get_option('theme_onetheme_slider4') . '" frameborder="0" allowfullscreen></iframe>'; ?>
                        <?php echo '<iframe class="col-md-4 col-xs-4" width="560" height="315" src="' . get_option('theme_onetheme_slider5') . '" frameborder="0" allowfullscreen></iframe>'; ?>
                        <?php echo '<iframe class="col-md-4 col-xs-4" width="560" height="315" src="' . get_option('theme_onetheme_slider1') . '" frameborder="0" allowfullscreen></iframe>'; ?>
                    </div></div>


                <div class="item">
                    <div class="row">
                        <?php echo '<iframe class="col-md-4 col-xs-4" width="560" height="315" src="' . get_option('theme_onetheme_slider2') . '" frameborder="0" allowfullscreen></iframe>'; ?>
                        <?php echo '<iframe class="col-md-4 col-xs-4" width="560" height="315" src="' . get_option('theme_onetheme_slider3') . '" frameborder="0" allowfullscreen></iframe>'; ?>
                        <?php echo '<iframe class="col-md-4 col-xs-4" width="560" height="315" src="' . get_option('theme_onetheme_slider4') . '" frameborder="0" allowfullscreen></iframe>'; ?>
                    </div></div>

            </div>
            <!-- Left and right controls -->
            <a class="left carousel-control" href="#youtubeslider" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#youtubeslider" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div></div>

<!-- Content Part -->
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div class="row">
                        <h3 style="background-color: #ffebcd;padding:10px;border-left:15px solid #daa520;"> Glimpses of Exhibition </h3>
                        <!-- Glimpses of Exhibition -->
                        <?php require_once 'exhibition.php'; ?>

                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="twitterbox">
                                <!-- Twitter box Code Goes Here -->
                                <h3 style="background-color: #ffebcd;padding:10px;border-left:15px solid #daa520;"> Latest Tweets </h3>
                                <?php require_once 'twitterbox.php'; ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="fbbox">
                                <!-- facebook box Code Goes Here -->
                                <h3 style="background-color: #ffebcd;padding:10px;border-left:15px solid #daa520;"> Follow Us on Facebook </h3>
                                <div class="fb-page" data-href="https://www.facebook.com/<?php echo get_option('fb_username'); ?>"  data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"></div>

                            </div>
                        </div>
                    </div>

                </main><!-- #main -->
            </div><!-- #primary -->

        </div>
        <div class="col-md-4">

            <div class="sidebar-right">
                <?php get_sidebar(); ?>
            </div>


        </div>
    </div>
</div>

<?php
get_footer();
?>