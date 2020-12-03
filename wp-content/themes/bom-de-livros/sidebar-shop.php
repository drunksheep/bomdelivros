<?php 
    $obj = get_queried_object(); 
    $current_category_id = $obj->term_id;
?>

<aside id="shop-sidebar">
    <div class="widget-wrapper search-form">
        <?php get_search_form(); ?>
    </div>
    <div class="widget-wrapper">
        <p class="t-xxxg bold t-primary margin-xxs">CATEGORIAS</p>
        <ul class="category-listing t-s t-def">
            <?php 
                $terms = get_terms([
                    'hide_empty'        => false,
                    'taxonomy'          => 'product_cat',
                ]);
                
                foreach ( $terms as $term ) {
                    $permalink = get_term_link( $term->term_id, 'product_cat' );
                    echo '<li class="link-primary"><a href="'.$permalink.'">'.$term->name.'</a></li>';
                }
            ?>
        </ul>
    </div>
</aside>