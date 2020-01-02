var lsjQuery = jQuery;
var curSkin = 'noskin';

lsjQuery(document).ready(function () {
    if (typeof lsjQuery.fn.layerSlider == "undefined") {
        lsShowNotice('hubwei_slider', 'jquery');
    } else {
        lsjQuery("#hubwei_slider").layerSlider({
            responsive: false,
            startInViewport: false,
            skin: 'fullwidth',
            globalBGColor: 'transparent',
            hoverPrevNext: false,
            autoPlayVideos: false,
            yourLogoStyle: 'left: 10px; top: 10px;',
            skinsPath: 'public/slider/skins/',
            thumbnailNavigation: 'hover'
        })
    }
});

function slider() {
    var slide = $("#hubwei_slider");
    var windowHeight = window.innerHeight;
    var header = $("#header").outerHeight() * 0;
    var responsiveHeight = (windowHeight) - header;
    slide.css("height", responsiveHeight + "px");
}

$(document).ready(function () {
    slider();
});

$(window).resize(function () {
    slider();
});

window.setTimeout(function () {
    slider();
}, 100);

function setUserLanguage(language_token) {
    setCookie("language", language_token, 360);
    $(".current_language").click();
    location.reload();
}

$(".current_language").on("click", function () {
    $(".language_setup").fadeToggle(200, function () {
        $(".language_dialog").slideToggle(200);
    });
});

function setCookie(k, v, expire, path) {
    path = path || "/";
    var d = new Date();
    d.setTime(d.getTime() + (expire * 1000));
    document.cookie = encodeURIComponent(k) + "=" + encodeURIComponent(v) + "; expires=" + d.toUTCString() + "; path=" + path;
}