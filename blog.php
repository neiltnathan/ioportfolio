<?php
/* Short and sweet */
define('WP_USE_THEMES', false);
require('blog/wp-blog-header.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Neil Nathan IO</title>
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
                    <a href="index.html" title="Home">Home</a>
                </li>
                <li class="navigator-menu__item">
                    <a href="about-me.html" title="About">About</a>
                </li>


                <li class="navigator-menu__item">
                    <a href="portfolio.html" title="My Work">Portfolio</a>
                </li>

                <li class="navigator-menu__item">
                    <a href="testimonials.html" title="Testimonials">Testimonials</a>
                </li>

                	<li class="navigator-menu__item">
					<a href="training.html" title="Blog">Training</a>
				</li>

                <li class="navigator-menu__item">
                    <a href="contact-us.html" title="Contact">Contact</a>
                </li>


            </ul>

        </nav>

    </header>

    <section class="services">

        <!-- <h2 class="services-header">Services</h2> -->

        <div class="mywork-headers">

            <h2 class="mywork-header">Services</h2>

            <h3 class="mywork-header-sub">Currently available services</h3>
            <hr class="horizontal-bottom-line" />
        </div>



<div class="services-block-text">




<?php

$number_of_posts = 5;
$args = array( 'numberposts' => $number_of_posts );
$recent_posts = wp_get_recent_posts( $args );
foreach( $recent_posts as $recent_post ){
echo "<span>".$recent_post['post_date']."</span> <br>";
echo "<h3>".$recent_post['post_title']."</h3>";
echo  "<p>".$recent_post['post_content']."</p><br><br>";

}

?>

</div>


    </section>
    <footer class="footer">

        <div class="footer-col-1">
            <p class=footer-col-1-text> I am an IT Specialist of 20+ years, with Front-End Web Developer experience.</p>
            <p class=footer-col-1-text>
            My Front-End Web Developer skills include HTML5, CSS3, Javascript (ES6) & Saas CSS pre-processor.</p>
            <p class=footer-col-1-text>Neil Nathan - Front End Developer</p>

        </div>

        <div class="footer-col-2">
            <ul class="nav-footer">
                <li class="nav-footer__item">
                    <a href="https://twitter.com/NeilNathan" target="_blank" class="nav-footer__link">
                        <img src="img/twitter2.png" alt="image Twitter" class="social-media-icon">
                        <span class="nav-footer__link-text">Twitter @neilnathan</span>
                    </a>
                </li>
                <li class="nav-footer__item">
                    <a href="https://github.com" target="_blank" class="nav-footer__link">
                        <img src="img/github2.png" alt="image Github" class="social-media-icon">
                        <span class="nav-footer__link-text">Github</span>
                    </a>
                </li>
                <li class="nav-footer__item ">
                    <a href="https://www.linkedin.com/in/neilnathan" target="_blank" class="nav-footer__link ">
                        <img src="img/linkedin2.png" alt="image linkedin" class="social-media-icon">
                        <span class="nav-footer__link-text">My Linked In profile</span>
                    </a>
                </li>

            </ul>
        </div>

        <div class="footer-col-3">
            <ul class="nav-footer">
                <li class="nav-footer__item ">
                    <a href="about.html" class="nav-footer__link">About</a>
                    <p class='nav-footer__item-text'>Learn about Neil's skills</p>

                </li>

                <li class="nav-footer__item">
                    <a href="portfolio.html" class="nav-footer__link">Portfolio</a>
                    <p class='nav-footer__item-text'>See examples of sites developed by Neil</p>

                </li>

                <li class="nav-footer__item">
                    <a href="testimonials.html" class="nav-footer__link">Testimonials </a>
                    <p class='nav-footer__item-text'>Read the latest testimonials</p>

                </li>
                <li class="nav-footer__item">
                    <a href="contact-us.html" class="nav-footer__link">Contact </a>
                    <p class='nav-footer__item-text'>Send a general message</p>

                </li>



            </ul>
        </div>

        <div class="footer-row-2">
            <p class="copyright">
                &copy; Copyright 2018 Neil Nathan.
            </p>
        </div>

    </footer>

    <script src="../js/jquery-2.1.0.min.js"></script>
    <script src="../js/app.js"></script>
</body>

</html>