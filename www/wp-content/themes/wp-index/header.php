<!DOCTYPE html>
<html <?php language_attributes(); ?>
<head>
    <title><?php bloginfo('name'); ?> &raquo; <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div class="container">

    <nav class="navbar navbar-light bg-danger">
        <div class="container-fluid">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><span class="navbar-brand mb-0 h1"><?php bloginfo('name'); ?></span></a>
        </div>
    </nav>
    <br/>
