$(document).ready(function(e){
    // de keyup functie kijkt of iemand in het veld typt
    $("#search").keyup(function(){
        // show up veranderd display 'none' in 'block'
        $("#show_up").show();
        var text = $(this).val();
        $.ajax({
            type: 'GET',
            url: '../private/includes/search.php',
            data: 'txt=' + text,
            success: function(data){
                $("#show_up").html(data);
            }
        });
    })
});


