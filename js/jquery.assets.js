var $ = jQuery.noConflict();
$(document).ready(function() {
	
    $('.fortip[title]').tooltip({
	position: "center right",
	offset: [-2, 10],
	effect: "fade",
	opacity: 0.7
    });
    $('.fortip_top[title]').tooltip({
	position: "top center",
	offset: [-2, 10],
	effect: "fade",
	opacity: 0.7
    });
    $('div.vot_res[title]').tooltip({
	position: "bottom center",
	offset: [13,0],
	effect: "slide",
	opacity: 0.8
    });
    
    $(".tab").each(function(){
        $(this).click(function(){
            tabelId = $(this).attr('id');
            $(".tab").removeClass("activeTab");
            $(this).addClass("activeTab");
            $(".contentTab").addClass("hide");
            $("#"+tabelId+"_content").removeClass("hide");
            return false;
        });
    });
    
    $(function() {
        $("#1, #2, #3").lavaLamp({
            fx: "backout", 
            speed: 700,
            curr: 2,
            /*click: function(event, menuItem) {
                return false;
            }*/
        });
    });
    
    $('#slider1').s3Slider({
		timeOut: 4000
    });
    
    
    
});
