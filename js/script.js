$(document).ready(function(){

	var container = document.querySelector('#masonry');
	var msnry = new Masonry( container, {
		columnWidth: 50,
		itemSelector: '.item'
	});

	function myMap() {
		
		var myCenter = new google.maps.LatLng(22.476038, 88.414892);
						  
		var mapCanvas = document.getElementById("map");
						 
		 var mapOptions = {center: myCenter, zoom: 16};
						  
		var map = new google.maps.Map(mapCanvas, mapOptions);
						  
		var marker = new google.maps.Marker({position:myCenter});
						  marker.setMap(map);
		var infoWin =new google.maps.InfoWindow({ content: '<h1>!!BRAINSTORMER!!</h1>'});
		
		marker.addListener('click',function(){infoWin.open(map,marker);});
	}


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