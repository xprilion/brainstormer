$(document).ready(function(){

	$('body').parallax({imageSrc: 'img/zengb-1.jpg'});



	var waypoints = $('#photos').waypoint({
		handler: function(direction) {
			console.log(this.element.id + ' hit' + direction)
		}
	})


});