var $ = jQuery.noConflict();
$(document).ready(function() {
    $('img[title]').tooltip({
	position: "center right",
	offset: [-2, 10],
	effect: "fade",
	opacity: 0.7
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
            click: function(event, menuItem) {
                return false;
            }
        });
    });
});