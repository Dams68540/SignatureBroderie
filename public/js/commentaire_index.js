function hideCom()
{
    $('#comLien').on('click',function(){
        if($('.com').hasClass("hidden"))
        {
            $('.com').removeClass("hidden");
            $(this).addClass("visible");
        }
    });
}
window.onload = hideCom();