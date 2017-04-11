$(document).ready(function() {

    /**
     * loginClickEvent
     *
     * Used to reveal the login form when the user icon is clicked
     *
     * @return void [explained above]
     */
    var loginClickEvent = function() {
        $("#user-icon-image").click(function() {
            $(".form-container").slideToggle(400);
        });
    };

    // funciton call
    loginClickEvent();
});
