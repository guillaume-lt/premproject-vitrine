function moveScroller() {
    var move = function() {
        var st = $(window).scrollTop();
        var ot = $("#faq_anchor").offset().top;
        var s = $("#faq_sidebar");
        if(st > ot) {
            s.css({
                position: "fixed",
                top: "-20px"
            });
        } else {
            if(st <= ot) {
                s.css({
                    position: "absolute",
                    top: ""
                });
            }
        }
    };
    $(window).scroll(move);
    move();
}