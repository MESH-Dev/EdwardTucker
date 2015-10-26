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
	var height = $(window).height();

	// New tabs

  /* ==========
     Variables
   ========== */
   //var url = location.protocol+'//'+location.hostname+(location.port ? ':'+location.port: '');

  /* ==========
      Utilities
    ========== */
   // function beginsWith(needle, haystack){
   //   return (haystack.substr(0, needle.length) == needle);
   // };


  /* ==========
     Anchors open in new tab/window
   ========== */
   // $('a').each(function(){

   //   if(typeof $(this).attr('href') != "undefined") {
   //    var test = beginsWith( url, $(this).attr('href') );
   //    //if it's an external link then open in a new tab
   //    if( test == false && $(this).attr('href').indexOf('#') == -1){
   //      $(this).attr('target','_blank');
   //    }
   //   }
   // });


function resized(){
	//console.log("Your window is:" + width + "px wide");	
	//console.log("Your window is:" + height + "px high");	
	}
$(window).resize(resized);
$(window).load(resized);



$('.container_mesh .row').each(function(){
	//var this = $(this);
	var len = $(this).find('a').length;
	console.log(len);
	if(len < 3){
		$(this).addClass('has-two');
	}
	if (len < 2){
		$(this).addClass('has-one');
	}
});

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


	$('.menu li').addClass(function() {
		var text = $(this).text();
		var ltext = text.toLowerCase();
		return ltext;
	});

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

	function greet_height(){
		
		var ch_height = $('.container.home').height();

		  $('.greeting').css({'height':ch_height})
		}

		$(window).resize(greet_height);
		greet_height();

	//Shows the project description after 
	setTimeout(function(){
		$('.project-overview')
			.removeClass('hide slideOutLeft')
			.addClass('slideInLeft animated')
			.animate({opacity: 1}, 1500);
		// $('.project-overview h1, .project-overview p, .project-overview .acheivement')
		// 	.animate({opacity: 1}, 1500);
	}, 600);

	$('.filter.button').click(function(e){
			e.preventDefault();
			$('.gallery-gateway')
				.addClass('slideOutLeft animated')
				.removeClass('slideInLeft');
			$('.projects-nav.gallery')
				.removeClass('hide slideOutLeft')
				.addClass('slideInLeft animated');
			});

	$('.projects-nav.gallery .close').click(function(e){
			e.preventDefault();
			$('.gallery-gateway')
				.removeClass('slideOutLeft')
				.addClass('slideInLeft');
			$('.projects-nav.gallery')
				.removeClass("slideInLeft")
				.addClass('slideOutLeft');
		});

	var width = $( window ).width();

	if (width > 600){
		var wst = $(window)

		$(window).scroll(function(){
			var h = $(window).height();
			var poh = $('.project-overview').height();
	
			if ($(window).scrollTop() > h/3){
				$('.single-projects .project-intro').css(
					{'position':'fixed',
					zIndex: 10000,
					minHeight:50
					});
				$('.single-projects .project-overview').css({
					minHeight:67
				});
				$('.single-projects .project-overview .the-content').slideUp();
				$('.single-projects .project-overview .subtitle').css({
					fontSize: 18
				});
				$('.single-projects .project-overview .title').css({
					fontSize: 24
				});
				$('.single-projects .projects-nav.single').css({
					"height": 75,
					minHeight:75
				});
				console.log(h);
			}
			else if ($(window).scrollTop() < h/3){
				$('.single-projects .project-intro').css(
					{'position':'absolute',
					zIndex: 10000});
				$('.single-projects .project-overview .title').css({
					fontSize: 48
				});
				$('.single-projects .project-overview .subtitle').css({
					fontSize: 36
				});
				$('.single-projects .project-overview .the-content').slideDown();
				$('.single-projects .projects-nav.single').css({"height": '100%', minHeight: 400});
			}
		});
	}

	if ( width >= 1025) {//801

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


		var gw = $('.gallery-gateway').width();

		$('.projects-nav .sprite.close').click(function(){
			$('.search_form').css({marginLeft:gw + 20});
			console.log("Window width is" + width);
		});

		$('.filter.button').click(function(){
			$('.search_form').css({marginLeft:160});
		});
		
		$('.search-text-link').click(function(){
			$('.search_form').css({marginLeft:160});
		});

		$('.search-work.button').click(function(){
			$('.search_form').css({marginLeft:gw+20});
			console.log("Window width is" + width);
		});
		
		$('.search-work.button, .search-text-link').toggleClick(
			function(e){
			e.preventDefault();
			$('.search_form')
				.removeClass('hide slideOutLeft')
				.addClass('table slideInLeft animated')
				.animate({opacity:1}, 500)
				.css({zIndex:204});
				//.css({marginLeft:gw + 20});

			},
			function(e){
				e.preventDefault();
				$('.search_form')
				.addClass('slideOutLeft')
				.removeClass('slideInLeft')
				.animate({opacity:0}, 300)
				.css({zIndex:-1});
			}
		)

		// var gw = $('.gallery-gateway').width();

		// if ($('.projects-nav').hasClass('hide')){
		// 	$('.search_form').css({marginLeft:gw + 15});
		// 	$('.search_form').addClass('there');
		// }
		// else if ($('.projects-nav').hasClass('slideInLeft')){
		// 	$('.search_form').css({marginLeft:160});
		// 	$('.search_form').addClass('here');
		// }
		// else {
		// 	$('.search_form').css({marginLeft:160});
		// }

		$('.search_form .close').click(function(e){
			e.preventDefault();
			$('.search_form')
			.addClass('slideOutLeft')
			.removeClass('slideInLeft')
			.animate({opacity:0}, 300)
			.css({zIndex:-1});
		})

		$('.search-news.button').toggleClick(
			function(e){
			e.preventDefault();
			$('.news_search_form')
				.removeClass('hide slideOutLeft')
				.addClass('table slideInLeft animated')
				.animate({opacity:1}, 500)
				.css({zIndex:204});
			},
			function(e){
				e.preventDefault();
				$('.news_search_form')
				.addClass('slideOutLeft')
				.removeClass('slideInLeft')
				.animate({opacity:0}, 300)
				.css({zIndex:-1});
			}
		)

		$('.news_search_form .close').click(function(e){
			e.preventDefault();
			$('.news_search_form')
			.addClass('slideOutLeft')
			.removeClass('slideInLeft')
			.animate({opacity:0}, 300)
			.css({zIndex:-1});
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

		$('.desktop-only').show();
		$('.mobile-only').remove();
	} //end if

	if (width <= 1024) {

		$('.search-work.button, .search-text-link').toggleClick(
			function(e){
			e.preventDefault();
			$('.search_form')
				.removeClass('hide slideOutLeft')
				.addClass('table slideInLeft animated out')
				.animate({opacity:1}, 500 )
				.css({zIndex:204});
				
			},
			function(e){
				e.preventDefault();
				$('.search_form')
				.addClass('slideOutLeft')
				.removeClass('slideInLeft')
				.animate({opacity:0}, 300)
				.css({zIndex:-1});
			}
		)

		$('.search_form .close').click(function(e){
			e.preventDefault();
			$('.search_form')
			.addClass('slideOutLeft')
			.removeClass('slideInLeft')
			.animate({opacity:0}, 300)
			.css({zIndex:-1});
		})

		$('.search-news.button').toggleClick(
			function(e){
			e.preventDefault();
			$('.news_search_form')
				.removeClass('hide slideOutLeft')
				.addClass('table slideInLeft animated')
				.animate({opacity:1}, 500)
				.css({zIndex:204});
			$('.blog-nav')
				.addClass('slideOutLeft animated')
				.removeClass('slideInLeft');
			},
			function(e){
				e.preventDefault();
			$('.news_search_form')
				.addClass('slideOutLeft')
				.removeClass('slideInLeft')
				.animate({opacity:0}, 300)
				.css({zIndex:-1});
			$('.blog-nav')
				.removeClass('slideOutLeft')
				.addClass('slideinLeft');
			}
		)

		$('.news_search_form .close').click(function(e){
			e.preventDefault();
			$('.news_search_form')
				.addClass('slideOutLeft')
				.removeClass('slideInLeft')
				.animate({opacity:0}, 300)
				.css({zIndex:-1});
			$('.blog-nav')
				.removeClass('slideOutLeft')
				.addClass('slideinLeft');
		})

		$('.greeting').click(g_slide_sm);
		$('.greeting').keypress(g_slide_sm);

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

		$('.search-work.button').click(
			function(e){
			e.preventDefault();
			$('.search_form')
				.removeClass('hide slideOutLeft')
				.addClass('table slideInLeft animated')
				.animate({opacity:1}, 500)
				.css({zIndex:204});
			$('.gallery-gateway')
				.addClass('slideOutLeft hide animated')
				.removeClass('slideInLeft');
			}
		)

		$('.search_form .close').click(function(e){
			e.preventDefault();
			$('.search_form')
				.addClass('slideOutLeft')
				.removeClass('slideInLeft')
				.animate({opacity:0}, 300)
				.css({zIndex:-1});
			$('.gallery-gateway')
				.removeClass("slideOutLeft")
				.addClass('slideInLeft');
		})

		
		 $('.container').css({'backgroundAttachment' : "local"});

		$('#responsive-menu-button').sidr({
		      name: 'sidr-main',
		      source: '.nav-list',
		      renaming: false
    		});

		 // $('#sidr-close').click(
		 // 	function(){
		 // 		$

		$('.desktop-only').hide();

	} //end else

	if (width > 850){
		$(window).scroll(function(event) {
		    
		    // height of the document (total height)
		    var d = $(document).height();
		    
		    // height of the window (visible page)
		    var w = $(window).height();
		    
		    // scroll level
		    var s = $(this).scrollTop();
		    
		    // bottom bound - or the width of your 'big footer'
		    var bottomBound = 47; 

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
	}
	if(width <= 850){
		$('.global-nav')
			.addClass('absolute_top')
			.removeClass('fixed');

		$('.search-text-link').click(function(e){
			e.preventDefault();
			$('.projects-nav')
				.removeClass('slideInLeft')
				.addClass('slideOutLeft');
			$('.search .sprite.close')
				.addClass('text_click');
			$('.search_form')
				.addClass('slideInLeft')
				.removeClass('slideOutLeft')
				.animate({opacity:1},300)
				.css({zIndex:204});

		});

		$('.text_click').live('click', function(e){
			e.preventDefault();
			$('.projects-nav')
				.removeClass('slideOutLeft')
				.addClass('slideInLeft');
			$(this).removeClass('text_click');
			$('.gallery-gateway')
				.removeClass('slideInLeft')
				.addClass('slideOutLeft');
		})


	}
	
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

// if ($('.blog-nav').length > 0){
// 	$('.menu-global-nav-container .menu li.news').addClass('current-menu-item');
// }

function loadProjects(projectType, query) { //*
 
      //console.log(projectType);
      //console.log(query);  //*
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
 					//$('.projects-nav ul > li').removeClass('selected');
 					//Adds slideinLeft and animated classes to each project tile in order
 					$('.project-tile').each(function(i, el){
 						window.setTimeout(function(){
 						$(el).removeClass('hide').addClass('fadeIn animated');
 						}, 50 * i);
 					});
 					$('.search_form')
 						.removeClass('slideInLeft')
 						.addClass('slideOutLeft');
 					// $('.projects-nav.gallery')
 					// 	.removeClass('slideInLeft')
 					// 	.addClass('slideOutLeft');
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
	$(this).addClass('selected');
	$('.projects-nav ul li.selected').not($(this)).removeClass('selected');
	//Delete whatever is already in the project gallery
	$('.project-tile').detach();
	$('.search_form')
		.removeClass('slideInLeft')
		.addClass('slideOutLeft')
		.animate({opacity:0}, 300)
		.css({zIndex:-1});
	$('.gallery-gateway')
		.removeClass('slideOutLeft')
		.addClass('slideInLeft');
});

$('.search_form form').submit(function(e){
	e.preventDefault();
	var $form = $(this);
	var $input = $form.find('input[name="s"]');
	var query = $input.val();
	console.log(query);
	loadProjects('',query);
	$('.project-tile').detach();
	$('.gallery-gateway')
		.removeClass('slideOutLeft')
		.addClass('slideInLeft');
	$('.post.error').detach();
	
});

});//end ready