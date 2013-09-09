$(document).ready(function() {
    var magicLine = new MagicLine("#main-nav");

    // media queries
    window.jmedia.addBreakPoint('mobile', 480);
    window.jmedia.addBreakPoint('tablet', 800);

    $("#main-nav a").mouseover(function() {
        magicLine.toLink(this);
    })
    .mouseout(function() {
        magicLine.toLink();
    });


    // trigger once fonts are loaded
    $(window).bind("load resize", function() {
        magicLine.toLink();
    });
});
