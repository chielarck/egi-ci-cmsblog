$(document).ready(function(){       
    var scroll_pos = 0;
    $(document).scroll(function() { 
        scroll_pos = $(this).scrollTop();
        if(scroll_pos > 50) {
            $(".navbar").css('background-color', 'rgba(0, 0, 0, 0.8)');
        } else {
             $(".navbar").css('background-color', '#242533');
        }
    });
});