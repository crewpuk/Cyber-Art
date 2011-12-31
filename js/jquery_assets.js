$(document).ready(function() {
    $('img[title]').tooltip({

	// place tooltip on the right edge
	position: "center right",

	// a little tweaking of the position
	offset: [-2, 10],

	// use the built-in fadeIn/fadeOut effect
	effect: "fade",

	// custom opacity setting
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
});