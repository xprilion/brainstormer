$(document).ready(function(){

	var colors = ["green", "purple", "brown", "red", "violet"];
	var nowCol = 1;

	// Logo Animation Sequence

	var headWaypoint = $('header').waypoint({
		handler: function(direction) {
			console.log(direction);
			if(direction=="down"){
				$('#logoContainer').fadeOut(500);
			}
			else{
				$('#logoContainer').fadeIn(500);
			}
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

function pageScript(){
	$('#logoContainer').css('opacity', '1').addClass('animated bounceInDown');

	$('#logoContainerMobile').css('opacity', '1').addClass('animated bounceInDown');

	setTimeout(function(){ $('#logoContainer').addClass('doExpand'); }, 1000);
	setTimeout(function(){ $('#logoText').css('opacity', '1').textillate({ in: { effect: 'rollIn' }});  }, 1750);

	var bgChanger = setInterval(function(){
		$('.logoImg').addClass('spinner');
		$('#navbarLogo').addClass('spinner');
		setTimeout(function(){
			$('.logoImg').removeClass('spinner');
			$('#navbarLogo').removeClass('spinner');
			nextCol = nowCol + 1;
			if(nowCol==4){
				nextCol = 0;
			}
			$('body').removeClass('bg-'+colors[nowCol]).addClass('bg-'+colors[nextCol]);
			nowCol = nextCol;
		}, 1500);
	}, 5000);
}