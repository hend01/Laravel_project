<div class="weather" style="padding-top:25px;float:right">
    <div class="amine" style="box-shadow: 2px 2px 11px 2px #1e40af;width: 210px;height:121px">
    <div class="paddings" style="padding-left: 5px;padding-top: 8px;">
      <img src="jhon.png" style="width:28px">
        
    <h1>Weather Information for <span> <strong> {{ $weatherData['name'] }} </strong></span></h1>
    <p>Temperature: {{ number_format($weatherData['main']['temp'] - 273.15, 2) }}°C</p>
    <p>Sunset Time: {{ date('H:i', $weatherData['sys']['sunset']) }} (UTC)</p>
    <p>Sunrise Time: {{ date('H:i', $weatherData['sys']['sunrise']) }} (UTC)</p>
    </div>
    </div>
    </div>