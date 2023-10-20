<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WeatherService
{
    

    public function getCurrentWeather($city)
    {
        $response = Http::get("https://api.openweathermap.org/data/2.5/weather?q={$city}&appid=294ecbb4e73d1cfe00ef97c1fb5d1d29");
        return $response->json();
    }
}
