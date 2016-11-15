$(document).ready(function(){
    $('img').on('error', function(){
        $(this).attr('src', 'images/nexus.jpg');
    });
    
    $("#liLogo").animate({"opacity" : ".1", }, 600 );
    $("#liLogo").animate({"opacity" : ".9", }, 600 );
    $("#liLogo").animate({"opacity" : ".1", }, 600 );
    $("#liLogo").animate({"opacity" : "1", }, 600 );
});