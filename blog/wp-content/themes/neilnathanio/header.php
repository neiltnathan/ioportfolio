<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link href="https://fonts.googleapis.com/css?family=Raleway:200,300,400,600" rel="stylesheet">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Neil Nathan IO Blog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Raleway:200,300,400,600" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">
    <meta name="robots" content="noindex">

</head>

<body>
<header>
    <nav class="navigator">
        <ul class="navigator-menu">

            <li class="navigator-menu__item">
                <a href="../index.html" title="Home">Home</a>
            </li>
            <li class="navigator-menu__item">
                <a href="../about-me.html" title="About">About</a>
            </li>


            <li class="navigator-menu__item">
                <a href="../portfolio.html" title="My Work">Portfolio</a>
            </li>

            <li class="navigator-menu__item">
                <a href="../testimonials.html" title="Testimonials">Testimonials</a>
            </li>



            <li class="navigator-menu__item">
					<a href="../training.html" title="Training">Training</a>
                </li>

             <li class="navigator-menu__item">
                <a href="../contact-us.html" title="Contact">Contact</a>
            </li>

            <li class="navigator-menu__item" id="blog">
                <a href="http://www.neilnathan.io/blog/index.php" title="Blog">Blog</a>
            </li>
        </ul>

    </nav>

</header>

<section class="blogio">

    <h2 class="blogio-header">Neil Nathan IO Blog</h2>


<!--    <hr class="horizontal-top-line"/>-->


</section>


</body>

</html>

<?php

/*
 * If a regular post or page, and not the front page, show the featured image.
 * Using get_queried_object_id() here since the $post global may not be set before a call to the_post().
 */
if ((is_single() || (is_page() && !twentyseventeen_is_frontpage())) && has_post_thumbnail(get_queried_object_id())) :
    echo '<div class="single-featured-image-header">';
    echo get_the_post_thumbnail(get_queried_object_id(), 'twentyseventeen-featured-image');
    echo '</div><!-- .single-featured-image-header -->';
endif;
?>

<div class="site-content-contain">
    <div id="content" class="site-content">
