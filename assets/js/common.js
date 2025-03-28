$(document).ready(function() {
	$(".scrollpart").mCustomScrollbar({
        scrollButtons:{enable:true},
        theme:"light-thick",
        scrollbarPosition:"outside"
    });
	$('.mainicon').css('height', $('.mainicon').width());
	
	new WOW().init();
	
});
var d = new Date();
document.getElementById('fullyear').innerHTML = d.getFullYear();
$(document).on('click', '.navbar-toggler', function(){
	$('.navbar-collapse').toggleClass('show');
});
$(document).on('click', '.tabselectwraper', function(){
    if($(window).width() < 992){
        $('.scrollpart').toggle();
    }
});
$(window).scroll(function() {    
    var scroll = $(window).scrollTop();    
    if (scroll > 1) {
        $("header").addClass("sticky");
    } else{
        $("header").removeClass("sticky");
	}
});
$(window).scroll(function() {
    var height = $(window).scrollTop();
    if (height > 100) {
        $('#back2Top').fadeIn();
    } else {
        $('#back2Top').fadeOut();
    }
});
$(document).ready(function() {
    $("#back2Top").click(function(event) {
        event.preventDefault();
        $("html, body").animate({ scrollTop: 0 }, "slow");
        return false;
    });

});
$('.showlayerdimage1').show();

function calltabimage(tabnumber , elem){
    //var callimg = tabnumber;
    //console.log(imgpath);
    //console.log(tabnumber);
    $('.layered').hide();
    $('.showlayerdimage'+tabnumber).fadeIn();
    var thistitle = $(elem).find('strong').html();
    var thispara = $(elem).find('small').html();
    //console.log(thistitle +', '+ thispara);
    $('#thistitle').html(thistitle);
    $('#thisparagraph').html(thispara);
    $(elem).addClass('active').siblings('li').removeClass('active');
    $('.tabtypeselect').find('.scrollpart').hide()
}

if($(window).width() < 992){
    $('.tabsidebar').addClass('tabtypeselect');
} else{
    $('.tabsidebar').removeClass('tabtypeselect');
}
$(window).bind("resize", function () {
    //console.log($(this).width())
    if ($(this).width() < 992) {
        $('.tabsidebar').addClass('tabtypeselect');
        $('.scrollpart').hide()
    } else {
        $('.tabsidebar').removeClass('tabtypeselect');
        $('.scrollpart').show()
        $('.hassubnav ul').removeAttr('style');
    }
})

$(document).on('click', '.hassubnav a', function(){
    if($(window).width() < 992){
        $(this).parent().children('ul').slideToggle();
    }
});