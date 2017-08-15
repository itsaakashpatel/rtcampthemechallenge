<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Onetheme
 */
?>

</div><!-- #content -->
<div class="container">
    <h3 style="background-color: #ffebcd;padding:10px;border-left:15px solid #daa520;"> Our Partners </h3>
</div>
<?php
require_once 'ourpartners.php';
?>     

</div><!-- #page -->
<footer id="colophon" class="site-footer">
    <div class="main-footer">
        <div class="container">
            <div class="row">    
                <!-- 1/3 -->
                <div class="col-md-4 footer-widget-1">
                    <?php dynamic_sidebar('footer-left-widget'); ?>
                </div>
                <!-- /End 1/3 -->
                <!-- 2/2 -->
                <div class="col-md-4">
                    <?php dynamic_sidebar('footer-center-widget'); ?>
                </div>
                <!-- /End 2/3 -->
                <!-- 3/3 -->
                <div class="col-md-4">
                    <?php dynamic_sidebar('footer-right-widget'); ?>
                </div>
                <!-- /End 3/3 --><!-- #colophon -->
            </div>
        </div> 
    </div>
    <div>
        <div class="disclaimer" align="center">
            <p> Disclaimer: asdakfnskfbdjfbsdjfbsjfbajfbaskjfnakjfnskjfnskldfnklsdnfksnfkjsnfkjsdnfkjsfnks
                asasfsdfsdfsdfsdfsdffsdfsdfsdfsfadqwrfewrwegeherheheeeterterterterter</p>
        </div>
    </div>
    <!-- .site-info -->
</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>
