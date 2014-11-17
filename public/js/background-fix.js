$(document).ready(function() {
    backgroundPosition();               
});

function backgroundPosition() {
    height = $('#background').height();
    width = $('#background').width();
    console.log(width);
    console.log(height);
    ratio = width/height;
    console.log(ratio);
    if (ratio > 1.7) {
        console.log('aligning to top!');
        $('#background').attr('style', 'background-position:center top');
    }
    else {
        console.log('aligning to bottom!');
        $('#background').attr('style', 'background-position:center bottom');
    }
}

$(window).resize(function() {
    backgroundPosition();
});