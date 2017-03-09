$(document).ready(function() {
    $(".button > .paper").click(function() {
        $(".add-paper-info").slideToggle(400);
        $(this).toggleClass('rotate'); // for button
    });

    $(".button > .compost").click(function() {
        $(".add-compost-info").slideToggle(400);
    });

    $(".button > .glass").click(function() {
        $(".add-glass-info").slideToggle(400);
    });

    $(".button > .metal").click(function() {
        $(".add-metal-info").slideToggle(400);
    });

    $(".button > .plastic").click(function() {
        $(".add-plastic-info").slideToggle(400);
    });

    $(".button > .general").click(function() {
        $(".add-general-info").slideToggle(400);
    });
});
