$(document).ready(function () {
    $('.lazy').lazy({
        effect: 'fadeIn',
        effectTime:500,
        afterLoad: function(element) {
            // console.log('aaa');
        },
        onError: function(element) {
            // called whenever an element could not be handled
            // console.log('bbb',element);
        },
    });
});
