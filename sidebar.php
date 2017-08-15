<?php

/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Onetheme
 */
if (!is_active_sidebar('main-sidebar')) {
    return;
}
?>

<?php dynamic_sidebar('Main-Sidebar'); ?>
