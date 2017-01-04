
$( document ).ready(function() {

    //this function is for making the dropdowns on create-listing work properly
    $(".dropdown-menu li a").click(function(){
        var selText = $(this).text();
        console.log(selText);
        console.log($(this).parents())
        event.preventDefault();
        $(this).parents(".input-dropdown").find('.dropdown-toggle').html(selText+' <span class="caret"></span>');
        console.log($(this).parents(".input-dropdown").find('.hidden-field').val(selText));

    });


    $(".listingtype-btn").click(function(){
        console.log("listingtype-btn clicked");
        var btnHtml = $(this).html();
        console.log(btnHtml);
        $(this).siblings(".bidbutton")
        var sibs = $(this).parents(".housetype-btn-row").find(".hidden-field").val(btnHtml);
        $(this).parents(".housetype-btn-row").find(".hidden-field").val("67")
        $( "input[name='listing type']" ).val($.trim(btnHtml))
        console.log(sibs);


    });

   
});



 
 
        
/*$(function() {

    // just a super-simple JS demo

    var demoHeaderBox;

    // simple demo to show create something via javascript on the page
    if ($('#javascript-header-demo-box').length !== 0) {
    	demoHeaderBox = $('#javascript-header-demo-box');
    	demoHeaderBox
    		.hide()
    		.text('Hello from JavaScript! This line has been added by public/js/application.js')
    		.css('color', 'green')
    		.fadeIn('slow');
    }

    // if #javascript-ajax-button exists
    if ($('#javascript-ajax-button').length !== 0) {

        $('#javascript-ajax-button').on('click', function(){

            // send an ajax-request to this URL: current-server.com/songs/ajaxGetStats
            // "url" is defined in views/_templates/footer.php
            $.ajax(url + "/songs/ajaxGetStats")
                .done(function(result) {
                    // this will be executed if the ajax-call was successful
                    // here we get the feedback from the ajax-call (result) and show it in #javascript-ajax-result-box
                    $('#javascript-ajax-result-box').html(result);
                })
                .fail(function() {
                    // this will be executed if the ajax-call had failed
                })
                .always(function() {
                    // this will ALWAYS be executed, regardless if the ajax-call was success or not
                });
        });
    }

});
*/