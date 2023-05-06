$(function(){

    $('.acc').click(function(e) {
        e.preventDefault();
        $('.popup-bg').fadeIn(800);
        $('html').addClass('no-scroll');
    });

    $('.close-popup').click(function() {
        $('.popup-bg').fadeOut(800);
        $('html').removeClass('no-scroll');
    });

    $('.button__checkin').click(function(e) {
        e.preventDefault();
        $('.popup-bg').fadeOut(800);
        $('html').removeClass('no-scroll');
        $('.popup-bg2').fadeIn(800);
        $('html').addClass('no-scroll');
    });

    $('.close-popup').click(function() {
        $('.popup-bg2').fadeOut(800);
        $('html').removeClass('no-scroll');
    });

    $('#reg').on('click', function() {
        let formData = $('.form2').serializeArray();
        let request = {};
        for(i in formData) {
            request[formData[i].name] = formData[i].value;
        }
        $.post("page1/api/api.php", request, function(response) {
            if(response == "1"){
                $('.popup-bg2').fadeOut(800);
                $('html').removeClass('no-scroll');
            }
        });

        return false;
    });
    
});
