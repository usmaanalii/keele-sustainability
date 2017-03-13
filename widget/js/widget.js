$(document).ready(function() {
    $(".button-style > .paper").click(function() {
        $(".add-paper-info").slideToggle(400);
        $(this).toggleClass('rotate'); // for button
    });

    $(".button-style > .compost").click(function() {
        $(".add-compost-info").slideToggle(400);
        $(this).toggleClass('rotate'); // for button
    });

    $(".button-style > .glass").click(function() {
        $(".add-glass-info").slideToggle(400);
        $(this).toggleClass('rotate'); // for button
    });

    $(".button-style > .metal").click(function() {
        $(".add-metal-info").slideToggle(400);
        $(this).toggleClass('rotate'); // for button
    });

    $(".button-style > .plastic").click(function() {
        $(".add-plastic-info").slideToggle(400);
        $(this).toggleClass('rotate'); // for button
    });

    $(".button-style > .general").click(function() {
        $(".add-general-info").slideToggle(400);
        $(this).toggleClass('rotate'); // for button
    });
});
