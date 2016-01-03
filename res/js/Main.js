$(document).ready(function() {
    var magicLine = new MagicLine("#main-nav");
    var url = document.location.pathname;

    // media queries
    window.jmedia.addBreakPoint('mobile', 480);
    window.jmedia.addBreakPoint('tablet', 800);

    var $footerDate = document.getElementById('footer-date');
    $footerDate.innerText = new Date().getFullYear();

    // set the selected link
    $("#main-nav a").each(function() {
        var $this = $(this);
        var linkText = $this.text();

        if ((url == "/" && linkText.toLowerCase() == "home")
                || url.indexOf(linkText.toLowerCase()) > -1 ) {
            $this.addClass("sel");
            return;
        }
    });

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
