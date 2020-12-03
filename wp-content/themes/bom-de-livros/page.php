<?php get_header(); ?>
<main class="structure inner">
    <?php 
        if (  is_product() ) {
            woocommerce_content();
        } else {
            echo '<section class="first-section generic-content">'; 
                echo '<div class="center-content">';
                    woocommerce_breadcrumb();
                    echo '<div class="cms-wrapper">';
                        the_content(); 
                    echo '</div>';
                echo '</div>';
            echo '</section>';
        }
    ?>
</main>
<?php get_footer(); ?>