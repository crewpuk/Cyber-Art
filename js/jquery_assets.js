$(document).ready(function() {
    $(".tabLink").each(function(){
        $(this).click(function(){
            tabeId = $(this).attr('id');
            $(".tab").removeClass("activeTab");
            $(this).addClass("activeTab");
            $(".contentTab").addClass("hide");
            $("#"+tabeId+"_content").removeClass("hide");
            return false;
        });
    });
});