// unique scripts go here.

const carouselInstancing = () => {
    let homeRecElems = document.querySelectorAll('.square-carousel');
    homeRecElems.forEach( (val, key ) => {
        let slider = tns({
            container: val,
            items: 4,
            edgePadding: 5,
            center: true,
            mouseDrag: true,
            nav: false,
        })
    });

    let saleCarouselElems = document.querySelectorAll('.sale-carousel');
    saleCarouselElems.forEach( (val, key)  => {
        let saleSlider = tns({
            container: val,
            items: 5,
            edgePadding: 5, 
            gutter: 60,
            mouseDrag: true, 
            nav: false, 
        })
    });
}