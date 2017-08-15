
function call(city) {
    var url = "https://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20weather.forecast%20where%20woeid%20in%20(select%20woeid%20from%20geo.places(1)%20where%20text%3D%22" + city + "%2C%20il%22)&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys"
    $.ajax({
        url: url,
        success: function (json_weather) {
            $('<h3>').text(json_weather.query.results.channel.title).appendTo('#weatherinfo');
            $('<h3>').text('Date: ').appendTo('#weatherinfo');
            $('#weatherinfo').append(json_weather.query.results.channel.item.condition.date);
            $('<h3>').text('Temperature: ').appendTo('#weatherinfo');
            $('#weatherinfo').append(json_weather.query.results.channel.item.condition.temp);
        }
    });
}