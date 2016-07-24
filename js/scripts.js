function loadMeteo(json){
	var lastTweet = json.statuses[0];
	var img = lastTweet.entities.media[0].media_url;
	$('body').css('background-image', 'url("' + img + '")')
	var cleanText = lastTweet.text.split('http')[0]; // remove the image link from the tweet
	cleanText = cleanText.replace('#MeteoAxl', '') // remove the #MeteoAxl hashtag
	$('#content').text(cleanText);

	//now let's add an icon next to the tweet. For now we'll grab the icons from OpenWeather
	if(
		cleanText.indexOf('Calor') !== -1 ||
		cleanText.indexOf('Bo') !== -1 ||
		cleanText.indexOf('Sol') !== -1 
	){
		$('#content-icon').html('<img src="http://openweathermap.org/img/w/01d.png" alt="Calor" />')
	} else if(
		cleanText.indexOf('Humitat') !== -1 ||
		cleanText.indexOf('Xafogor') !== -1 	
	) {
		$('#content-icon').html('<img src="http://openweathermap.org/img/w/02d.png" alt="Humitat" />')
	} else if(
		cleanText.indexOf('Plou') !== -1 ||
		cleanText.indexOf('Pluja') !== -1 	
	) {
		$('#content-icon').html('<img src="http://openweathermap.org/img/w/09d.png" alt="Plou" />')
	} else {
		//if we can't understand what oreidoefecto is saying, we will do something actually useful and consult weather information through OpenWeatherMap
		var urlOpenWeather = 'http://api.openweathermap.org/data/2.5/weather?id=3128760&APPID=009fd1b23061e90a9772b9d3d66d5c44';
		$.ajax({
			url: urlOpenWeather
		})
		.done(function(data){
			var icon = data.weather[0].icon;
			$('#content-icon').html('<img src="http://openweathermap.org/img/w/'+ icon +'.png" alt="'+data.weather[0].main+'" />')
		})
		
	}
}