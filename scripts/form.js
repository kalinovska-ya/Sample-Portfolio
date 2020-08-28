jQuery(document).ready(function($) {

    $(".form").submit(function() {
        var str = $(this).serialize();
    
        $.ajax({
            type: "POST",
            url: "form.php",
            data: str,
            success: function(msg) {
                if(msg == 'OK') {
                    result = '<p class="notification_error">Your message was received. Thank You</p>';
                    $(".fields").hide();
                } else {
                    result = msg;
                }
                $('.note').html(result);
            }
        });
        return false;
    });
});