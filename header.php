<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Onetheme
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <!-- Connection to Facebook Javascript Library -->
        <script>(function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.10&appId=831222536948871";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>
        <!---------------------------------------------->    
        <div id="page" class="site">
            <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'onetheme'); ?></a>
            <header id="masthead" class="site-header">     
                <div class="container">
                    <div class="site-branding">
                        <!-- #site-navigation -->
                        <nav id="site-navigation" class="navbar">
                            <div class="row">

                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#secondmenu"><span class="glyphicon glyphicon-menu-hamburger"></span></button>
                                <div class="collapse navbar-collapse" id="secondmenu">
                                    <div class="secondary-navigation">
                                        <?php
                                        wp_nav_menu(array(
                                            'theme_location' => 'secondary',
                                            'menu-id' => 'secondary'));
                                        ?>
                                    </div>    
                                </div> 
                            </div>
                        </nav>

                        <div class="row">
                            <div class="col-sm-6 col-md-4">
                                <div class="customelogo" align="center" style="margin:25px;">
                                    <?php
                                    echo '<img src="' . get_option("theme_onetheme_logo") . '" alt="logo">';
                                    if (is_front_page() && is_home()) :
                                        ?>
                                        <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                                    <?php else : ?>
                                        <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
                                    <?php
                                    endif;

                                    $description = get_bloginfo('description', 'display');
                                    if ($description || is_customize_preview()) :
                                        ?>
                                        <p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="searchbox">
                                <div class="col-sm-6 col-md-offset-4 col-md-4"> 
                                    <script>
                                        (function () {
                                            var cx = '016314314725490687612:nmcqf30bsyi';
                                            var gcse = document.createElement('script');
                                            gcse.type = 'text/javascript';
                                            gcse.async = true;
                                            gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
                                            var s = document.getElementsByTagName('script')[0];
                                            s.parentNode.insertBefore(gcse, s);
                                        })();
                                    </script>
                                    <gcse:search></gcse:search>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="main-navigation">
                    <div class="collapse navbar-collapse" id="mainmenu">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainmenu"><span class="glyphicon glyphicon-menu-hamburger"></span></button>
                        <div class="container navbar-left">
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'primary',
                                'menu_id' => 'primary',
                            ));
                            ?>
                        </div>    
                    </div> 
                </div>
                <!-- #masthead -->
            </header>
            <br>
