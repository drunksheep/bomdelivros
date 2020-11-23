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
}