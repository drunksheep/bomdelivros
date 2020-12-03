<?php get_header(); ?>
<main class="structure inner">
    <section class="first-section opening-banners">
        <div class="center-content flexed row spaced">
            <div class="main-banner-70"><img src="http://lorempixel.com/910/538/business/" alt=""></div>
            <div class="second-banner-28"><img src="http://lorempixel.com/364/538/business/" alt=""></div>
        </div>
    </section>
    <section class="home-forepart">
        <div class="center-content flexed row spaced start">
            <?php get_template_part('inc/components/content', 'forepart') ?>
        </div>
    </section>
    <section class="home-recommended-block">
        <?php get_template_part('inc/components/content', 'recommended-block'); ?>
    </section>
    <section class="home-special-offers">
        <div class="center-content flexed row">
            <?php get_template_part('inc/components/content', 'special-offers') ?>
        </div>
    </section>
    <section class="sale home-sale pos-r">
        <div class="center-content">
            <?php get_template_part('inc/components/content', 'sale-carousel') ?>
        </div>
    </section>
    <section class="featured-books home-featured-books">
        <div class="center-content flexed row spaced start">
            <?php get_template_part('inc/components/content', 'featured-books'); ?>
        </div>
    </section>
    <!-- <section class="testimonials home-testimonials">
        <div class="center-content flexed row spaced start t-centered">
            <?php // get_template_part('inc/components/content', 'testimonials'); ?>
        </div>
    </section> -->
    <section class="icons-stats home-icon-stats">
        <div class="center-content flexed row spaced start">
            <?php get_template_part('inc/components/content', 'icons-stats') ?>
        </div>
    </section>
</main>
<?php get_footer(); ?>