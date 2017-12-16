$(document).ready(function () {

    var ytbVideoData = null;

    $('#getYtbData').click(function () {

        ytbVideoData = null

        $.getJSON( "getQualityVideo.php", { url: $('#ytb_url').val()} )
            .done(function( json ) {

            })
            .fail(function( jqxhr, textStatus, error ) {
                var err = textStatus + ", " + error;
                console.log( "Request Failed: " + err );
            });

    });

    console.log("Document Ready");
});