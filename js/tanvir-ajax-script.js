
jQuery(document).ready(function ($) {
    $('#my-button').on('click', function () {
        $.ajax({
            url: tanvir_ajax_object.ajax_url,
            type: 'POST',
            data: {
                action: 'tanvir_ajax_action',
                nonce: tanvir_ajax_object.nonce,
                name: 'John Doe',
            },
            success: function (response) {
                $('#result').html(response);
            },
            error: function (error) {
                console.log(error);
            },
        });
    });
});