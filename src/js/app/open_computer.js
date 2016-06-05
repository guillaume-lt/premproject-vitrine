
// Returns true if the specified element has been scrolled into the viewport.
function isElementInViewport(macbook) {
    var $macbook = $(macbook);

    // Get the scroll position of the page.
    var scrollElem = ((navigator.userAgent.toLowerCase().indexOf('webkit') != -1) ? 'body' : 'html');
    var viewportTop = $(scrollElem).scrollTop();
    var viewportBottom = viewportTop + $(window).height();

    // Get the position of the element on the page.
    var elemTop = Math.round( $macbook.offset().top ) + 150;
    var elemBottom = elemTop + $macbook.height();

    return ((elemTop < viewportBottom) && (elemBottom > viewportTop));
}

// Check if it's time to start the animation.
function checkAnimation() {
    var $macbook = $('.js-macbook');

    if (isElementInViewport($macbook)) {
        // Start the animation
        $macbook.addClass('macbook--shown macbook--display-open macbook--show-program');
    } else {
        $macbook.removeClass('macbook--shown macbook--display-open macbook--show-program');
    }
}

// Capture scroll events
$(window).scroll(function(){
    checkAnimation();
});