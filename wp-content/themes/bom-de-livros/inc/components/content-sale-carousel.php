<h2 class="t-exxxg bold margin-g">Promoções especiais</h2>
<div class="sale-carousel">
    <?php 
        $i = 0; 
        while ( $i < 10 ) : 
            $i++
    ?>
    <div class="product one-fifth">
        <figure class="product-thumb-wrapper full margin-xxs t-centered">
            <img src="https://lorempixel.com/200/260/nightlife" alt="">
            <span class="discount">50%</span>
        </figure>
        <h3 class="product-title lh-xxg t-g bold clamped-2 margin-xxs">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora vitae architecto nesciunt officiis quasi at?</h3>
        <p class="product-categories t-s lig margin-xs t-primaryLig">Aventura, Sobrevivência</p>
        <p class="product-metadata flexed row spaced centered">
            <span class="rating">
                <i class="fa fa-star t-primary t-g"></i>
                &nbsp;
                <span class="t-r t-def bold">4.7</span>
            </span>
            <span class="price-general">
                <span class="promo-price t-s bold">R$ 45.40</span> &nbsp;
                <span class="full-price striked t-lig t-xs">R$ 98.40</span>
            </span>
        </p>
    </div>
    <?php endwhile; ?>
</div>