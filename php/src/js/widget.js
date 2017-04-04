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
 *
 * 6.
 *
 */
$(document).ready(function() {
    /**
     * clickEvent
     * @param  {string} materialName [Add the material name as a string,
     *                               this completes the id identifier in the
     *                               first selector, and class identifier in
     *                               the second selector
     *                               e.g for clickEvent(paper), the result is
     *                               #paper and .add-paper-info]
     *
     * @return [void]                [explained above]
     */
    var clickEvent = function(materialName) {
        $(".add-button-style > #" + materialName).click(function() {
            $(".add-" + materialName + "-info").slideToggle(400);
            $(this).toggleClass('rotate-button'); // for button
        });
    };

    clickEvent('paper');
    clickEvent('compost');
    clickEvent('glass');
    clickEvent('metal');
    clickEvent('plastic');
    clickEvent('general');
});
