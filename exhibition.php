<style>
    .exhibition .col-md-3{
        margin:5px 0 5px 0;
    }

</style>
<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

global $post;
$args = array(
    'post_type' => 'Exhibition',
    'numberposts' => -1,
    'orderby' => 'menu_order');

$slider_posts = get_posts($args);
if ($slider_posts) {
    $image = array();
    $link = array();
    $p = 0;
// start the loop
    foreach ($slider_posts as $post) {
        setup_postdata($post);
        $myimage = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
        $postlink = get_permalink($post->ID);
        $image[$p] = $myimage[0];
        $link[$p] = $postlink;
        $p++;
    }
}
?>
<div class="exhibition" align="center">
    <div class="row1">
        <div class="col-md-3">
            <a href="<?php echo $link[0]; ?>" target="_self"> <img src="<?php echo $image[0]; ?>" alt="image0" style="border: 2px solid #a9a9a9"></a>
        </div>
        <div class="col-md-3">
            <a href="<?php echo $link[1]; ?>" target="_self"> <img src="<?php echo $image[1]; ?>" alt="image1" style="border: 2px solid #a9a9a9"></a>
        </div>
        <div class="col-md-3">
            <a href="<?php echo $link[2]; ?>" target="_self"> <img src="<?php echo $image[2]; ?>" alt="image2" style="border: 2px solid #a9a9a9"></a>
        </div>
        <div class="col-md-3">
            <a href="<?php echo $link[3]; ?>" target="_self"> <img src="<?php echo $image[3]; ?>" alt="image3" style="border: 2px solid #a9a9a9"></a>
        </div>   
    </div>
    <div class="row2">
        <div class="col-md-3">
            <a href="<?php echo $link[4]; ?>" target="_self"> <img src="<?php echo $image[4]; ?>" alt="image4" style="border: 2px solid #a9a9a9"></a>
        </div>
        <div class="col-md-3">
            <a href="<?php echo $link[5]; ?>" target="_self"> <img src="<?php echo $image[5]; ?>" alt="image5" style="border: 2px solid #a9a9a9"></a>
        </div>
        <div class="col-md-3">
            <a href="<?php echo $link[6]; ?>" target="_self"> <img src="<?php echo $image[6]; ?>" alt="image6" style="border: 2px solid #a9a9a9"></a>
        </div>
        <div class="col-md-3">
            <a href="<?php echo $link[7]; ?>" target="_self"> <img src="<?php echo $image[7]; ?>" alt="image7" style="border: 2px solid #a9a9a9"></a>
        </div> 

    </div>
</div>
