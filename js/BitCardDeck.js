/* =-=- CUSTOM BEGIN: functions -=-= */
jQuery(document).ready(function(){
	

	jQuery('.carddeck').slick({
			centerMode: true,
            centerPadding: '30px',
            slidesToShow: 1,
            //autoplay: true,
            pauseOnHover: true,
            speed: 100,
            autoplaySpeed:5000,
            infinite: false,
           /* nextArrow: '<button class="slick-next slick-arrow" aria-label="Next" type="button"><span>Next</span></button>',
            prevArrow: '<button class="slick-prev slick-arrow" aria-label="Previous" type="button"><span>Previous</span></button>',*/
            responsive: [
                {
                  breakpoint: 768,
                  settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 1,
                  },
                },
                {
                  breakpoint: 576,
                  settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 1,
                  },
                },
              ],
	});
	jQuery('.slick-prev').hide();
	// Run when slides change for google analytics
	

	if (jQuery('.carddecks--list').length) {
		setCardsColor();
		jQuery('.carddecks--list > .carddeck').each(function () { 
			jQuery(this).find('.slick-next').wrapInner("<span></span>");
			var currentDeck = jQuery(jQuery(this).find('.slick-list .slick-track'));
			var innerWrapper = currentDeck.children().wrapInner( "<div class='card-content-wraper'></div>" );
			var bgBlocker = currentDeck.children().append( "<div class='card-bg-blocker'></div>" );
		});

		function setCardsColor() {
			jQuery('.carddecks--list > .carddeck').each(function () { 
				var color = jQuery(this).attr("data-color");
				var currentDeck = jQuery(jQuery(this).find('.slick-list .slick-track'));
				currentDeck.children().css('background-color', 'rgba('+color+',1)');
			});
		}
		jQuery( window ).resize(function() {
			setCardsColor();
		});

		
		var notifications = jQuery('.notifications');
		//set the notifications popup background color based on site theme
		notifications.css('background-color','#'+notifications.attr('data-theme-color'));
		// Set waypoints trigger to carddecks list container
		var notifyCounter = 0;
		
		//position the card prompt over the card deck
		var cardprompt = jQuery('.carddeck-prompt');
		var carddeck_height = jQuery('.carddecks--wrapper').height();
		var carddeck_y = jQuery('.carddecks--wrapper').position();
		cardprompt.css("top",carddeck_y.top + carddeck_height/2 - cardprompt.height()/2);
		cardprompt.css("left", jQuery(window).width()/2 - cardprompt.width()/2);
		cardprompt.on( "click", function() {
		  notifyCounter++;
		  removeCardPrompt(0);
		});
		

		var inview = new Waypoint.Inview({
		  element: jQuery('.carddecks--wrapper')[0],
		  entered: function(direction) {
		   	//only notify once
				if (notifyCounter == 0) {
					removeCardPrompt(3000);
					notifyCounter++;
				}
		  },
		});

		function removeCardPrompt(delay) {
			cardprompt.delay(delay).fadeOut( "slow", function() {
				jQuery(this).remove();
			});
		}

		

	}
	/*// Calculate the heighest slide and set a top/bottom margin for other children.
	// As variableHeight is not supported yet: https://github.com/kenwheeler/slick/issues/1803
	var maxHeight = -1;
	jQuery('.carddecks--list .slick-slide').each(function() {
	  if (jQuery(this).height() > maxHeight) {
	    maxHeight = jQuery(this).height();
	  }
	});
	jQuery('.carddecks--list .slick-slide').each(function() {
	  if (jQuery(this).height() < maxHeight) {
	    jQuery(this).css('margin', Math.ceil((maxHeight-jQuery(this).height())/2) + 'px 0');
	  }
	});*/
});
/* =-=- CUSTOM END: functions -=-= */