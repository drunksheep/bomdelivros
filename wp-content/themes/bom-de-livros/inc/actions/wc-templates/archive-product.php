<?php 

/**
 * Hook: woocommerce_after_shop_loop_item_title.
 *
 * @hooked woocommerce_template_loop_rating - 5
 * @hooked woocommerce_template_loop_price - 10
 * @see woocommerce/content-product.php
 */
add_action( 'woocommerce_after_shop_loop_item_title', 'bdl_after_shop_loop_item_title', 20);

function bdl_after_shop_loop_item_title() {
    global $product;    
    $product_id = $product->get_id();
    $terms = get_the_terms($product_id, 'product_cat');
    
    ?>
    <p class="product-categories t-s lig margin-xs t-primaryLig">
        <?php
            foreach ($terms as $term) {
                $permalink = get_term_link( $term->term_id, 'product_cat' );

                echo !next($terms) ? 
                '<a href="'.get_term_link( $term->term_id, 'product_cat' ).'">'.$term->name.'</a>' :  
                '<a href="'.get_term_link( $term->term_id, 'product_cat' ).'">'.$term->name.'</a>, '; // Ultimo produto sem separador

            }    
        ?>
    </p>
    
    <?php
}

/**
 * Hook: woocommerce_shop_loop_item_title.
 *
 * @hooked woocommerce_template_loop_product_title - 10
 * @see woocommerce/content-product.php
*/

remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
add_action( 'woocommerce_shop_loop_item_title', 'bdl_shop_loop_item_title', 10 );

function bdl_shop_loop_item_title() {
    global $product;
    
    echo ' <h2 class="product-title lh-xxg t-g bold clamped-2 margin-xxs">'.$product->name.'</h2>';
    
}
