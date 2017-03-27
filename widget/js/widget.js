// TODO: Make the code more efficient, violates DRY
$(document).ready(function() {
    $(".add-button-style > .paper").click(function() {
        $(".add-paper-info").slideToggle(400);
        $(this).toggleClass('rotate-button'); // for button
    });

    $(".add-button-style > .compost").click(function() {
        $(".add-compost-info").slideToggle(400);
        $(this).toggleClass('rotate-button'); // for button
    });

    $(".add-button-style > .glass").click(function() {
        $(".add-glass-info").slideToggle(400);
        $(this).toggleClass('rotate-button'); // for button
    });

    $(".add-button-style > .metal").click(function() {
        $(".add-metal-info").slideToggle(400);
        $(this).toggleClass('rotate-button'); // for button
    });

    $(".add-button-style > .plastic").click(function() {
        $(".add-plastic-info").slideToggle(400);
        $(this).toggleClass('rotate-button'); // for button
    });

    $(".add-button-style > .general").click(function() {
        $(".add-general-info").slideToggle(400);
        $(this).toggleClass('rotate-button'); // for button
    });

});
