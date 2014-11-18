$(document).ready(function() {
    backgroundPosition();               
});

function backgroundPosition() {
    height = $('#background').height();
    width = $('#background').width();
    ratio = width/height;
    if (ratio > 1.7) {
        $('#background').attr('style', 'background-position:center top');
    }
    else {
        $('#background').attr('style', 'background-position:center bottom');
    }
}

$(window).resize(function() {
    backgroundPosition();
});