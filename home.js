$(document).ready(function(){
    // $("#lunch").css({'display':'none'});
    $('#lunch').hide();
    $('#dinner').hide();
    $("#lunch_btn").click(function(){
        $('#dinner').hide();
        $('#breakfast').hide();
        $('#lunch').show(1000);
    });
    $("#dinner_btn").click(function(){
        $('#dinner').show(1000);
        $('#breakfast').hide();
        $('#lunch').hide();
    }); 
    $("#breakfast_btn").click(function(){
        $('#dinner').hide();
        $('#breakfast').show(1000);
        $('#lunch').hide();
    });
});


