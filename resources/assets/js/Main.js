$(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
    $('.MCQ').click(function () {
        $('.MCQ').removeClass("active");
        $(this).addClass("active");
    });


    $('.lifecard').click(function () {
        if($('.ClickedCard').length < 4) {
            $(this).addClass("ClickedCard");
            $(this).removeClass("blue-grey");
        }
        if($('.ClickedCard').length == 4)
        {
           //fadeloop('.go',1500,1200,true);
           $('.go').addClass('Done');
            $('.go').attr("href","#lifecardModal");
            $('.go').removeClass("disabled");

        }
    });

    $('.shuffle').click(function () {
        $('.lifecard').removeClass("ClickedCard");
        $('.lifecard').removeClass("Disablelifecard");
        $('.lifecard').addClass("blue-grey");
        $('.go').attr("href","#");
        $('.go').removeClass('Done');
        //fadeloop('.go',1500,1200,false);

    });

    $(".go .material-icons").click(function () {
        if($('.go').attr('href') == "#lifecardModal") {
            $('.ClickedCard').addClass('Disablelifecard');
            $('.Disablelifecard').removeClass('ClickedCard');
            $('.go').addClass("disabled");
        }  })
});
function fadeloop(el,timeout,timein,loop){
    var $el = $(el),intId,fn = function(){
        $el.animate({opacity:'0.5'},timeout);$el.animate({opacity:'1'},timein);
    };
    fn();
    if(loop){
        intId = setInterval(fn,timeout+timein+100);
        return intId;
    }
    return false;
}