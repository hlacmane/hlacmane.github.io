<?php
/**
 * ham try
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 */

?>
<!DOCTYPE html>
<html <html <?php language_attributes(); ?> class="no-js">>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <?php//<link rel="stylesheet" type="text/css" href="style.css">?>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css"  />
    <?php//<title>The Todo List</title>?>
    <title><?php bloginfo('name'); ?> <?php wp_title('The Todo List'); ?></title>
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>