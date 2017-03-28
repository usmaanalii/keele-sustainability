// TODO: Make the code more efficient, violates DRY

/**
 * 1. Document ready used to ensure the page has fully loaded
 *
 * 2. Each button is accessed via their unique id named after their material
 *
 * 3. All buttons are children of the .add-button-style class which applies
 * the button style
 *
 * 4. Each click function initiates their own slideToggle which displays a
 * new section, this section is targeted via the class 'add-x-info' where
 * x denotes the unique material names
 *
 * 5. The rotate-button class is used in the toggleClass method to enable the
 * rotation animation applied to each '+' button
 */
$(document).ready(function() {
    $(".add-button-style > #paper").click(function() {
        $(".add-paper-info").slideToggle(400);
        $(this).toggleClass('rotate-button'); // for button
    });

    $(".add-button-style > #compost").click(function() {
        $(".add-compost-info").slideToggle(400);
        $(this).toggleClass('rotate-button'); // for button
    });

    $(".add-button-style > #glass").click(function() {
        $(".add-glass-info").slideToggle(400);
        $(this).toggleClass('rotate-button'); // for button
    });

    $(".add-button-style > #metal").click(function() {
        $(".add-metal-info").slideToggle(400);
        $(this).toggleClass('rotate-button'); // for button
    });

    $(".add-button-style > #plastic").click(function() {
        $(".add-plastic-info").slideToggle(400);
        $(this).toggleClass('rotate-button'); // for button
    });

    $(".add-button-style > #general").click(function() {
        $(".add-general-info").slideToggle(400);
        $(this).toggleClass('rotate-button'); // for button
    });

});
