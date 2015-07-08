//Main js for Edward Tucker Architects
$(document).ready(function(){

	// var windowTop = $(window).scrollTop();
	// var windowH = $(window).height();
	// var documentH = $(document).height();
	// var bottom = (windowH + windowTop);
	// var bodyH = $('body').height();
	// var windowW = $(window).width();
	// var footerH = $('footer').height();

	// function $resize(){
	// var width = $( window ).width();
	// if ( width > 480) {

	// 	console.log('Whatever')
	// 	$(window).scroll(function(){
			


	// 		var windowTop = $(window).scrollTop();
	// 		var windowH = $(window).height();
	// 		var documentH = $(document).height();
	// 		var footerTop = $('footer').offset().top;
			
	// 		if (windowTop > 0){
	// 			$('.global-nav').addClass('fixed').removeClass('absolute_bottom');
	// 		}
	// 		else if(windowTop <= 0){
	// 			$('.global-nav').removeClass('fixed').addClass('absolute_bottom');
	// 		}
	// 		else if( footerH < windowTop ){
	// 			$('.global-nav').addClass('bottom');
	// 			alert ("You have reached the bottom of the document");
	// 		}
	// 	});
	// }

	// else if ( width < 480){
	// 	console.log('Whatever else')
	// 	$('.global-nav').removeClass('absolute_bottom').addClass('absolute_top')
	// 	// $('.global-nav').css({top : 0})
	// }

	// }
	
	// $(window).resize($resize);
	// $resize();

	// $('body').append('<div class="document-height">' + documentH + '</div>');
	// $('body').append('<div class="total-height">' + bottom + '</div>');
	// $('body').append('<div class="body-height">' + bodyH + '</div>');
	// $('body').append('<div class="window-width">' + windowW + '</div>');
$('.global-nav').addClass('fixed');

$(window).scroll(function(event) {
    
    // height of the document (total height)
    var d = $(document).height();
    
    // height of the window (visible page)
    var w = $(window).height();
    
    // scroll level
    var s = $(this).scrollTop();
    
    // bottom bound - or the width of your 'big footer'
    var bottomBound = 70;
    
    console.log(bottomBound);

    // are we beneath the bottom bound?
    if(d - (w + s) < bottomBound) {
        // if yes, start scrolling our own way, which is the
        // bottom bound minus where we are in the page
        $('.global-nav').css({
            bottom: bottomBound - (d - (w + s) )
        });
    } else {
        // if we're beneath the bottom bound, then anchor ourselves
        // to the bottom of the page in traditional footer style
        $('.global-nav').css({
            bottom: 0
        });            
    }
});


	// $('body').append('<div class="window-width">' + footerH + '</div>');

	$('.container').wrap('<div class="row" />');

	$('.container').parallax("50%", .2);

	// $(window).resize(function(){
	// 	$('.container').css
	// }

//$('.global-nav').addClass('yes-this-is-working');

//$(window).scroll(function(){$('.global-nav').append('<p>' + windowTop + '<p>');});


});