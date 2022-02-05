<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class TemperatureController extends Controller
{

    //TODO Notlar
    //https://stackoverflow.com/questions/22355828/doing-http-requests-from-laravel-to-an-external-api
    //https://openweathermap.org/current

    //Serverı çalıştırma komutu -> php artisan serve
    //Serverı durdurmak için ctrl+c
    //Route List (Linkleri Gösterme Komutu) -> php artisan route:list
    //Apinin giriş ekranı yani base url adresi -> 127.0.0.1:8000 bu bize sena kalkan çıktısını json olarak veriyor
    //Link yapısı 127.0.0.1:8000/api/temperature?city=istanbul temperature için olan endpointi böyle oluşturuyoruz


    public function index(Request $request)
    {
        $request->validate([
            "city" => "required|string"
        ]);
        $ApiKey = "d66cb03576e2d41951924cd0d065f6a0";
        $city = urlencode($request->city);
        $requestUrl = "api.openweathermap.org/data/2.5/weather?q=$city&appid=$ApiKey";
        $client = new Client();
        try {
            $res = $client->get($requestUrl);
            $data = $res->getBody()->getContents();
            $statusCode = $res->getStatusCode();

            if ($data) {
                $data = json_decode($data);
            }

            return response()->json(
                [
                    "Data" => [
                        "TemperatureKelvin" => $data->main->temp,
                        "FeelsLikeTemperatureKelvin" => $data->main->feels_like,
                        "MinTemperatureKelvin" => $data->main->temp_min,
                        "MaxTemperatureKelvin" => $data->main->temp_max,
                        "TemperatureCelsius" => $this->convertKelvinToCelcius($data->main->temp),
                        "FeelsLikeTemperatureCelsius" => $this->convertKelvinToCelcius($data->main->feels_like),
                        "MinTemperatureCelsius" => $this->convertKelvinToCelcius($data->main->temp_min),
                        "MaxTemperatureCelsius" => $this->convertKelvinToCelcius($data->main->temp_max),
                        "City" => $data->name
                    ],
                    "StatusCode" => $statusCode
                ]);
        } catch (\Exception $exception) {
            return response()->json(
                [
                    "Data" => null,
                    "StatusCode" => 500,
                    "ErrorMessage" => $exception->getMessage()
                ]);
        }
    }


    public function store(Request $request)
    {
        return response()->json(["Error" => "Bad Request"],400);
    }


    public function show($id)
    {
        return response()->json(["Error" => "Bad Request"],400);
    }


    public function update(Request $request, $id)
    {
        return response()->json(["Error" => "Bad Request"],400);
    }


    public function destroy($id)
    {
        return response()->json(["Error" => "Bad Request"],400);
    }

    public function convertKelvinToCelcius($Kelvin)
    {
        return (float) number_format(($Kelvin-273.15), 1, '.', '');
    }
}
