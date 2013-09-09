var MagicLine = function(owner) {
    var $owner = $(owner);
    var $owner_ul = $(owner + " ul");
    var $mag = $('<div id="magic-line"></div>');

    // add the magic line to the nav
    $mag.appendTo($owner);
    $mag.css({
        height: 2,
        position: 'absolute',
        visibility: 'hidden'
    });

    var toLink = function(el) {
        if (typeof el === "undefined") el = $owner.find('.sel');
        $el = $(el);
        $mag
            .css({
                top: $owner_ul.position().top + $owner_ul.height(),
                visibility: 'visible'
            })
            .stop()
            .animate({
                left: $el.position().left,
                width: $el.outerWidth()
            }, 150);
    };

    return {
        toLink: toLink
    };
};
