//Main js for Edward Tucker Architects
$(document).ready(function(){

	// var windowTop = $(window).scrollTop();
	// var windowH = $(window).height();
	// var documentH = $(document).height();
	// var bottom = (windowH + windowTop);
	// var bodyH = $('body').height();
	// var windowW = $(window).width();
	// var footerH = $('footer').height();
	var width = $( window ).width();

	//$('.homepage-motto').addClass('hide')

	//$('.greeting, .homepage-motto').attr('tabindex', '0');		
	
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

	//On large screens, implements interaction on ".greeting"
	function g_slide_lg (){

		$('.homepage-motto')
				.removeClass('hide slideOutLeft')
				.addClass('slideInLeft animated')
				.css({opacity: 1}, 1200);
			$('.homepage-motto h2, .close')
				.delay(400).animate({opacity: 1});
	}

	function g_slide_sm (){
		$('.greeting')
				.addClass('slideOutLeft animated')
				//.delay(700).animate({opacity: 0}, 500);
			$('.homepage-motto')
				.removeClass('hide slideOutLeft')
				.addClass('slideInLeft animated')
				.animate({opacity: 1}, 1200);
				//console.log( "mouse has hovered" );
			$('.homepage-motto h2')
				.delay(400).animate({opacity: 1});
	}

	function hm_slide_lg (){
		$('.homepage-motto')
				.removeClass('slideInLeft')
				.addClass('slideOutLeft')
				.delay(700).animate({opacity: 0}, 500);
				console.log( "mouse has left" );
			$('.homepage-motto h2, .close')
				.delay(50).animate({opacity: 0});
	}

	function hm_slide_sm (){
		
	}

	//Shows the project description after 
	setTimeout(function(){
		$('.project-overview')
			.removeClass('hide slideOutLeft')
			.addClass('slideInLeft animated')
			.animate({opacity: 1}, 1500);
		// $('.project-overview h1, .project-overview p, .project-overview .acheivement')
		// 	.animate({opacity: 1}, 1500);
	}, 600);

	var width = $( window ).width();

	if ( width > 481) {
		//$('.global-nav').addClass('fixed');

		// $('.greeting').click(g_slide_lg);
		// $('.greeting').keypress(g_slide_lg);

		// $('.homepage-motto').click(hm_slide_lg);
		// $('.homepage-motto').keypress(hm_slide_lg);

		$('.greeting').hover(function(){
			$('.homepage-motto')
				.removeClass('hide slideOutLeft')
				.addClass('slideInLeft animated')
				.css({opacity: 1}, 1200);
			$('.homepage-motto h2, .close')
				.delay(400).animate({opacity: 1});
		},function(){
			$('.homepage-motto')
				.removeClass('slideInLeft')
				.addClass('slideOutLeft')
				.delay(700).animate({opacity: 0}, 500);
				console.log( "mouse has left" );
			$('.homepage-motto h2, .close')
				.delay(50).animate({opacity: 0});
		}
		);

		 //$('.projects-nav.gallery').addClass('hide');

		$('.filter.button').click(function(){
			$('.gallery-gateway')
				.addClass('slideOutLeft animated')
				.removeClass('slideInLeft');
			$('.projects-nav.gallery')
				.removeClass('hide slideOutLeft')
				.addClass('slideInLeft animated');
			});

		$('.projects-nav.gallery .close').click(function(){
			$('.gallery-gateway')
				.removeClass('slideOutLeft')
				.addClass('slideInLeft');
			$('.projects-nav.gallery')
				.removeClass("slideInLeft")
				.addClass('slideOutLeft');
		});

		//$('.search').addClass('hide');

		$('.search-work.button').toggleClick(
			function(){
			$('.search')
				.removeClass('hide slideOutLeft')
				.addClass('table slideInLeft animated')
				.animate({opacity:1}, 500);
			},
			function(){
				$('.search')
				.addClass('slideOutLeft')
				.removeClass('slideInLeft')
				.animate({opacity:0}, 300);
			}
		)

		$('.search .close').click(function(){
			$('.search')
			.addClass('slideOutLeft')
			.removeClass('slideInLeft')
			.animate({opacity:0}, 300);
		})
				

		// $('.greeting').click(function(){
		// 	$('.homepage-motto')
		// 		.removeClass('hide slideOutLeft')
		// 		.addClass('slideInLeft animated')
		// 		.css({opacity: 1}, 1200);
		// 	$('.homepage-motto h2, .close')
		// 		.delay(400).animate({opacity: 1});
		// });

		// $('.homepage-motto').click(function(){
		// 	$(this)
		// 		.removeClass('slideInLeft')
		// 		.addClass('slideOutLeft')
		// 		.delay(700).animate({opacity: 0}, 500);
		// 		console.log( "mouse has left" );
		// 	$('.homepage-motto h2, .close')
		// 		.delay(50).animate({opacity: 0});
		// });

		//Old - uses toggleClick function

		// $('.greeting').toggleClick( 
		// function(){
		// 	$('.homepage-motto')
		// 		.removeClass('hide slideOutLeft')
		// 		.addClass('slideInLeft animated')
		// 		.css({opacity: 1}, 1200);
		// 		console.log( "mouse has hovered" );
		// 	$('.homepage-motto h2')
		// 		.delay(400).animate({opacity: 1});
				
		// },
		// function(){
		// 	$('.homepage-motto')
		// 		.removeClass('slideInLeft')
		// 		.addClass('slideOutLeft')
		// 		.delay(700).animate({opacity: 0}, 500);
		// 		console.log( "mouse has left" );
		// 	$('.homepage-motto h2')
		// 		.delay(50).animate({opacity: 0});
		// });

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
	} //end if

	else if (width < 480) {

		$('.global-nav').removeClass('fixed');

		$('.greeting').click(g_slide_sm);
		$('.greeting').keypress(g_slide_sm);

		// $('.greeting').click(function(){
		// 	$(this)
		// 		.addClass('slideOutLeft animated')
		// 		//.delay(700).animate({opacity: 0}, 500);
		// 	$('.homepage-motto')
		// 		.removeClass('hide slideOutLeft')
		// 		.addClass('slideInLeft animated')
		// 		.css({opacity: 1}, 1200);
		// 		//console.log( "mouse has hovered" );
		// 	$('.homepage-motto h2')
		// 		.delay(400).animate({opacity: 1});
		// })

		$('.homepage-motto').click(function(){
			$(this)
				.removeClass('slideInLeft')
				.addClass('slideOutLeft')
				//.delay(700)
				//.animate({opacity: 0}, 500);
			$('.homepage-motto h2')
				//.delay(400)
				.animate({opacity: 0}, 500);
			$('.greeting')
				.removeClass('slideOutLeft')
				.addClass('slideInLeft')
				//.delay(700).animate({opacity: 1}, 500);
		})
		// $('.greeting').toggleClick( 
		// function(){
		// 	$(this)
		// 		.addClass('slideOutLeft animated');

		// 	$('.homepage-motto')
		// 		.removeClass('hide slideOutLeft')
		// 		.addClass('slideInLeft animated')
		// 		.css({opacity: 1}, 1200);
		// 		console.log( "mouse has hovered" );
		// 	$('.homepage-motto h2')
		// 		.delay(400).animate({opacity: 1});
				
		// },
		// function(){
		// 	$('.homepage-motto')
		// 		.removeClass('slideInLeft')
		// 		.addClass('slideOutLeft')
		// 		.delay(700).animate({opacity: 0}, 500)
		// 		// .click(function(){
		// 		// 	$('.greeting')
		// 		// 	.removeClass('slideOutLeft')
		// 		// 	.addClass('slideinLeft')
		// 		// 	console.log('Motto Has been clicked')
		// 		// });
		// 		console.log( "mouse has left" );
		// 	$('.homepage-motto h2')
		// 		.delay(50).animate({opacity: 0});
		// });

		// $('.homepage-motto').toggleClick(
		// 	function(){
		// 			$('.greeting')
		// 			.removeClass('slideOutLeft')
		// 			.addClass('slideinLeft')
		// 			console.log('Motto Has been clicked');
		// 			$(this)
		// 			.removeClass('slideInLeft')
		// 			.addClass('slideOutLeft')
		// 			//.delay(700).animate({opacity: 1}, 500);
		// 		},
		// 	function(){
		// 		$(this)
		// 			.removeClass('slideInLeft')
		// 			.addClass('slideOutLeft')
		// 			// .delay(700).animate({opacity: 1}, 500);
		// 		$('greeting')
		// 			.addClass('slideOutLeft')
		// 			.removeClass('slideInLeft');
		// });

		// $('.global-nav').addClass('absolute_top');
		 $('.container').css({'backgroundAttachment' : "local"});

		$('#responsive-menu-button').sidr({
		      name: 'sidr-main',
		      source: '.nav-list',
		      renaming: false
    		});

		 // $('#sidr-close').click(
		 // 	function(){
		 // 		$

		$('.desktop-only').remove();

	} //end else
	
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

	//Animation for initial gallery tile load, ->
	//Duplicated in loadProjects
	//$('.project-tile').addClass('hide');
	$('.project-tile').each(function(i, el){
		window.setTimeout(function(){
		$(el).removeClass('hide').addClass('fadeIn animated');
		}, 200 * i);
	});

function loadProjects(projectType, query) { //*
 
      console.log(projectType);
      console.log(query);  //*
      var is_loading = false;
       if (is_loading == false){
            is_loading = true;
 
            $('#loader, .loader-container').fadeIn(200);

            var data = {
                action: 'get_projects',
                projectType: projectType, //*
                query: query //*
            };
            jQuery.post(ajaxurl, data, function(response) {
                // now we have the response, so hide the loader

                console.log(response);
                
               //$('a#load-more-photos').show();
                // append: add the new statments to the existing data
                if(response != 0){

                  
                  $('#project-gallery').append(response);
                  //$container.waitForImages(function() {
                  //   $('#loader').hide();
                  // });                  
 					$('#loader').fadeOut(1000);
 					$('.loader-container').fadeOut(300);
 					$('.project-tile').addClass('hide');
 					//Adds slideinLeft and animated classes to each project tile in order
 					$('.project-tile').each(function(i, el){
 						window.setTimeout(function(){
 						$(el).removeClass('hide').addClass('fadeIn animated');
 						}, 200 * i);
 					});
                  is_loading = false;
                }
                else{
                  $('#loader').hide();
                  
                  is_loading = false;
                }

                
            });
        }    
  }

$('.projects-nav ul li').click(function(){
	var projectType = $(this).attr('data-filter');
	loadProjects(projectType,'');
	//Delete whatever is already in the project gallery
	$('.project-tile').detach();
	$('.search')
		.removeClass('slideInLeft')
		.addClass('slideOutLeft')
		.animate({opacity:0}, 300);
});

$('.search_form form').submit(function(e){
	e.preventDefault();
	var $form = $(this);
	var $input = $form.find('input[name="s"]');
	var query = $input.val();
	console.log(query);
	loadProjects('',query);
	$('.project-tile').detach();
	$('.post.error').detach();
	
});

});//end ready