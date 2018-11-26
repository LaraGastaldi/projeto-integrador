$(document).ready(function(){
    $("#mascote").mouseover(function(){
        $(this).animate({
            right: '-400px'
        });
    });
    $("#mascote").mouseout(function(){
        $(this).animate({
            right: '0px'
        }, 1500);
    });
    
});