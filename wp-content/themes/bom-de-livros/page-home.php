<?php get_header(); ?>
<main class="structure inner">
    <section class="first-section opening-banners">
        <div class="center-content flexed row spaced">
            <div class="main-banner-70"></div>
            <div class="second-banner-28"></div>
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
</main>
<?php get_footer(); ?>