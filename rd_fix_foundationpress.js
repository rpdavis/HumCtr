//sticky footer
$(window).bind("load", function () {
    var footer = $("#footer");
    var pos = footer.position();
    var height = $(window).height();
    height = height - pos.top;
    height = height - footer.height();
    if (height > 0) {
        footer.css({
            'margin-top': height + 'px'
        });
    }
});

$(document).ready(function() {
    $(document).foundation();

    // Hack to get off-canvas .menu-icon to fire on iOS
    $('.menu-icon').click(function(){ false });
});