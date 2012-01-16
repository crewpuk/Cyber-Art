 function popclose(){$('#overlay,#popup,#closepopup').hide();}
        function popclose2(){$('#overlay2,#popup2,#closepopup2').hide();}
        $(function(){
        $(".slide1,.slide2").click(function(){
        var image = $(this).attr("rel");
        $('#popup2,#closepopup2').hide();
        $('#popup2,#closepopup2').slideDown('slow');
        $('#overlay2').fadeIn('fast');
        $('#image').html('<img src="' + image + '"/>');
        return false;
        });
        });
        $(function(){
        $(".footerLink").click(function(){<!--,.order-->
        var image = $(this).attr("rel");
        var copy = $(this).attr("copy");
        $('#popup,#closepopup').hide();
        $('#popup,#closepopup').slideDown('slow');
        $('#overlay').fadeIn('fast');
        $('#image2').html(image);
        $('#copy').html(copy);
        return false;
        });
        });