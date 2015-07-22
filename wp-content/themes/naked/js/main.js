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
	var width = $( window ).width();

	$('.homepage-motto').addClass('hide')

	//$('.homepage-motto h2').css({opacity: 0});
	// $('.greeting').hover(function(){
	// 	$('.homepage-motto')
	// 		.removeClass('hide')
	// 		.toggleClass('slideInLeft animated');
	// 		//.toggleClass('slideOutLeft');
	// });

	// $('.greeting').toggle(
	// 	function(){
	// 		$('.homepage-motto')
	// 			.removeClass('hide slideOutLeft')
	// 			.addClass('slideInLeft animated')
	// 			.css({opacity: 1});
	// 			console.log( "mouse has hovered" );
	// 		$('.homepage-motto h2')
	// 			.delay(400).animate({opacity: 1});		
	// 	},
	// 	function(){
	// 		$('.homepage-motto')
	// 			.removeClass('slideInLeft')
	// 			.addClass('slideOutLeft')
	// 			.delay(200).animate({opacity: 0});
	// 			console.log( "mouse has left" );
	// 		$('.homepage-motto h2')
	// 			.delay(100).animate({opacity: 0});
	// 	});
	
	// Special function from https://jsfiddle.net/s376u4zn/ to bind event to alternate clicks
	$.fn.toggleClick = function () {
    var functions = arguments
    return this.click(function () {
        var iteration = $(this).data('iteration') || 0
        //	console.log(iteration)
        functions[iteration].apply(this, arguments)
        iteration = (iteration + 1) % functions.length
        $(this).data('iteration', iteration)
    	})
	}

	// $('.greeting').toggleClick( 
	// 	function(){
	// 		$('.homepage-motto')
	// 			.removeClass('hide slideOutLeft')
	// 			.addClass('slideInLeft animated')
	// 			.css({opacity: 1}, 1200);
	// 			console.log( "mouse has hovered" );
	// 		$('.homepage-motto h2')
	// 			.delay(400).animate({opacity: 1});
				
	// 	},
	// 	function(){
	// 		$('.homepage-motto')
	// 			.removeClass('slideInLeft')
	// 			.addClass('slideOutLeft')
	// 			.delay(700).animate({opacity: 0}, 500);
	// 			console.log( "mouse has left" );
	// 		$('.homepage-motto h2')
	// 			.delay(50).animate({opacity: 0});
	// 	});

	//Version of the function above to account for mouseover rather than click
	//Use only in the case that we don't want mouseover for some reason...

	//========================================================================
	// $('.greeting').bind(
	// 	"mouseover", 
	// 	function(){
	// 		$('.homepage-motto')
	// 			.removeClass('hide slideOutLeft')
	// 			.addClass('slideInLeft animated')
	// 			.css({opacity: 1});
	// 			console.log( "mouse has hovered" );
	// 		$('.homepage-motto h2')
	// 			.delay(400).animate({opacity: 1});
				
	// 	})
	// 	.bind(
	// 	"mouseout", 
	// 	function(){
	// 		$('.homepage-motto')
	// 			.removeClass('slideInLeft')
	// 			.addClass('slideOutLeft')
	// 			.delay(200).animate({opacity: 0});
	// 			console.log( "mouse has left" );
	// 		$('.homepage-motto h2')
	// 			.delay(100).animate({opacity: 0});
	// 	});
	//========================================================================
	

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

// function _resize(){

	var width = $( window ).width();

	if ( width > 481) {
		$('.global-nav').addClass('fixed');

		$('.greeting').toggleClick( 
		function(){
			$('.homepage-motto')
				.removeClass('hide slideOutLeft')
				.addClass('slideInLeft animated')
				.css({opacity: 1}, 1200);
				console.log( "mouse has hovered" );
			$('.homepage-motto h2')
				.delay(400).animate({opacity: 1});
				
		},
		function(){
			$('.homepage-motto')
				.removeClass('slideInLeft')
				.addClass('slideOutLeft')
				.delay(700).animate({opacity: 0}, 500);
				console.log( "mouse has left" );
			$('.homepage-motto h2')
				.delay(50).animate({opacity: 0});
		});

		//Increment through each container and apply parrallax
		//Doing this applies parallax individually to each instance of the "container" class
		//Otherwise, parallax will be controlled by scrolling as one group.
		$('.container').each(function(i){
			i = i++;
			$(this).parallax("50%", .08);
		});	  

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

		//Force the .homepage-motto container to be flush with the .greeting container
		function greet_width(){
		var g_width = $('.greeting').width();
		var g_css = g_width + 'px';
		  $('.homepage-motto').css({
		  		marginLeft: g_css
		  	});
		}

		$(window).resize(greet_width);
		greet_width();

		$('.mobile-only').remove();
	}

	else if (width < 480) {

		$('.greeting').toggleClick( 
		function(){
			$(this)
				.addClass('slideOutLeft animated');

			$('.homepage-motto')
				.removeClass('hide slideOutLeft')
				.addClass('slideInLeft animated')
				.css({opacity: 1}, 1200);
				console.log( "mouse has hovered" );
			$('.homepage-motto h2')
				.delay(400).animate({opacity: 1});
				
		},
		function(){
			$('.homepage-motto')
				.removeClass('slideInLeft')
				.addClass('slideOutLeft')
				.delay(700).animate({opacity: 0}, 500)
				// .click(function(){
				// 	$('.greeting')
				// 	.removeClass('slideOutLeft')
				// 	.addClass('slideinLeft')
				// 	console.log('Motto Has been clicked')
				// });
				console.log( "mouse has left" );
			$('.homepage-motto h2')
				.delay(50).animate({opacity: 0});
		});

		$('.homepage-motto').toggleClick(
			function(){
					$('.greeting')
					.removeClass('slideOutLeft')
					.addClass('slideinLeft')
					console.log('Motto Has been clicked');
					$(this)
					.removeClass('slideInLeft')
					.addClass('slideOutLeft')
					//.delay(700).animate({opacity: 1}, 500);
				},
			function(){
				$(this)
					.removeClass('slideInLeft')
					.addClass('slideOutLeft')
					// .delay(700).animate({opacity: 1}, 500);
				$('greeting')
					.addClass('slideOutLeft')
					.removeClass('slideInLeft');
		});

		$('.global-nav').addClass('absolute_top');
		$('.container').css({'backgroundAttachment' : "local"});

		$('#responsive-menu-button').sidr({
		      name: 'sidr-main',
		      source: '.nav-list',
		      renaming: false
    		});

		 // $('#sidr-close').click(
		 // 	function(){
		 // 		$.sidr('close');
		 // 	});

		 

		// $('.sidr-class-menu').prepend('<li id="sidr-close"><i class="fa fa-fw fa-close"></i></li>');

		 


		$('.desktop-only').remove();

	}

// }

//  $(window).resize(_resize);
//  _resize();
	
	//Wrap all '.container's, '.global-nav's, and footer in div.row
	$('.container, .global-nav, footer, .the-content').wrap('<div class="row" />');

	$('.sidr-close').click(
	 	function(){
	 		$.sidr('close', 'sidr-main');
	 		console.log("Sidr should be closed");
	 	});

	$('.down a').click(function(){
        $.scrollTo(this.hash, 1500, {easing:'easeOutQuint'});//look for hash(#) links and animate (easeOutQuint)
        return false;
    	});//end slide


// var project = $('.project-tile');

// $('.projects-nav ul li').click(function(){
// 	var projectFilter = $(this).data('filter');
// 	project.filter(function(){
// 			if( $(this).hasClass(projectFilter)){
// 				$(this).show(700);
// 				//console.log($(this).data('cat'));
// 			}
// 			else{
// 				$(this).hide(700);
// 			}
// 		})
// });

function loadProjects(projectType) {
 
      console.log(projectType);
      var is_loading = false;
       if (is_loading == false){
            is_loading = true;
 
            $('#loader').show();

            var data = {
                action: 'get_projects',
                projectType: projectType
            };
            jQuery.post(ajaxurl, data, function(response) {
                // now we have the response, so hide the loader

                //console.log(response);
                
               //$('a#load-more-photos').show();
                // append: add the new statments to the existing data
                if(response != 0){

                  
                  $('#project-gallery').append(response);
                  //$container.waitForImages(function() {
                  //   $('#loader').hide();
                  // });                  
 					$('#loader').hide(600);
 					$('.project-tile').show(800);
                  is_loading = false;
                }
                else{
                  $('#loader').hide();
                  
                  is_loading = false;
                }

                
            });
            // die();
        }    
  }

$('.projects-nav ul li').click(function(){
	var projectType = $(this).attr('data-filter');
	loadProjects(projectType);
	$('.project-tile').remove();
});


 // $('#sidr-close').click(
		 // 	function(){
		 // 		$.sidr('close');
		 // 	});

	// $(window).resize(function(){
	// 	$('.container').css
	// }

//$('.global-nav').addClass('yes-this-is-working');


});