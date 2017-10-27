$(document).ready(function(){

	var container = document.querySelector('#masonry');
	var msnry = new Masonry( container, {
		columnWidth: 50,
		itemSelector: '.item'
	});

	// Logo Animation Sequence

	$('#logoContainer').css('opacity', '1').addClass('animated bounceInDown');

	setTimeout(function(){ $('#logoContainer').addClass('doExpand'); }, 3000);
	


	var waypoints = $('#photos').waypoint({
		handler: function(direction) {
			console.log(this.element.id + ' hit' + direction)
		}
	});

	$(document).on('click', 'a[href^="#"]', function (event) {
	    event.preventDefault();

	    $('html, body').animate({
	        scrollTop: $($.attr(this, 'href')).offset().top
	    }, 500);
	});


	$('.animated-bg-btn').mouseenter(function(){
		$(this).find('span').find('p').slideDown(175);
	});

	$('.animated-bg-btn').mouseleave(function(){
		$(this).find('span').find('p').slideUp(175);
	});

});

