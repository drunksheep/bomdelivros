<?php 

// Main content hooks (adiciona containers) (single, archive)

add_action('woocommerce_before_main_content', 'bdl_before_main_content'); 

function bdl_before_main_content() {
    echo 
    '<section class="before-main-content first-section">
        <div class="center-content has-sidebar">';
}

add_action('woocommerce_after_main_content', 'bdl_after_main_content'); 

function bdl_after_main_content() {
    echo 
        '</div>
    </section>';
}
