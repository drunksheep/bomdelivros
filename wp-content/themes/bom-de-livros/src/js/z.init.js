
const init = () => {
    console.log('foo')

    carouselInstancing();
}

// window load binds 
addEventListener('load', init);

const DOMLoaded = () => {
    // these are not always necessary but sometimes they fuck with ya
    if (helpers.iOS) {
        document.querySelector('html').classList.add('ios');
    } else if (helpers.IE()) {
        document.querySelector('html').classList.add('ie');
    }
}

// domcontent binds 
addEventListener('DOMContentLoaded', DOMLoaded);