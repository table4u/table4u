$('.myclass').click(function(){
    $('.popup iframe').attr('src', $(this).attr('content-url'));
})