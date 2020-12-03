<?php 
/*
Template Name: Search Page
*/
get_header(); 
?>
<section class="first-section">
    <div class="center-content">
        <?php 
            woocommerce_breadcrumb();
            $searchArgs = [
                's'                 => get_search_query(),
                'posts_per_page'    => -1,
                'post_type'         => 'product'
            ];
            $results = new WP_Query($searchArgs);

            if ( $results->have_posts() ) : 
                ?>
        <div class="products columns-4 flexed row wrap ai-start">
            <?php
                while ( $results->have_posts() ) : 
                    $results->the_post();
                    $permalink = get_the_permalink();
                    $name = get_the_title();
                    $price = get_post_meta( get_the_ID(), '_price', true );
                    $image = get_the_post_thumbnail_url(null, 'woocommerce_thumbnail');
                    ?>
            <div class="product-item one-fourth-child">
                <figure class="grid-basic-image zoom-hover full">
                    <a href="<?php echo $permalink; ?>" class="pos-r full min-h-300">
                        <img src="<?php echo $image ?>" />
                    </a>
                </figure>
                <div class="product-info-box">
                    <h3 class="t-g t-primary upper margin-xxs"><?php echo $name; ?></h3>
                    <p class="t-secondary t-r margin-xs">
                        A partir de <span class="t-green upper bold"><?php echo wc_price( $price ); ?></span>
                    </p>
                    <a href="<?php echo $permalink ?>"
                        class="btn-green purchase slimmest t-r t-white bold t-centered full">VER MAIS INFORMAÇÕES</a>
                </div>
            </div>
            <?php 
                endwhile;
            ?>
        </div>
        <?php 
            else : 
            ?>
            <p class="t-g t-default">Desculpe, infelizmente não encontramos nenhum resultado para o termo <span class="t-primary upper bold">"<?php echo get_search_query(); ?>"</span></p>
            <?php 
            endif;
        ?>
    </div>
</section>
<?php get_footer(); ?>