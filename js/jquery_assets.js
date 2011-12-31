$(document).ready(function() {
    $('img[title]').tooltip();
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