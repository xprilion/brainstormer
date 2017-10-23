$(document).ready(function(){

	$('body').parallax({imageSrc: 'img/zengb-1.jpg'});

	var container = document.querySelector('#masonry');
	var msnry = new Masonry( container, {
		columnWidth: 50,
		itemSelector: '.item'
	});


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
		$(this).find('span').find('p').slideDown();
	});

	$('.animated-bg-btn').mouseleave(function(){
		$(this).find('span').find('p').slideUp();
	});

});