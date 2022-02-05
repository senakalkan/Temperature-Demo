<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>



## Temperature API
               
- Base URL: http://127.0.0.1:8000/
- Temperature API: http://127.0.0.1:8000/api/temperature

### How To Use API
- http://127.0.0.1:8000/api/temperature?city={city-name} [GET Request]

### Example Request

- http://127.0.0.1:8000/api/temperature?city=istanbul

### Example Response

```
{
    "Data": {
        "TemperatureKelvin": 279.88,
        "FeelsLikeTemperatureKelvin": 277.36,
        "MinTemperatureKelvin": 278.74,
        "MaxTemperatureKelvin": 280.24,
        "TemperatureCelsius": 6.7,
        "FeelsLikeTemperatureCelsius": 4.2,
        "MinTemperatureCelsius": 5.6,
        "MaxTemperatureCelsius": 7.1,
        "City": "Istanbul"
    },
    "StatusCode": 200
}
```



### How To Setup API

- Clone The Project :
  - ``` git clone https://github.com/senakalkan/Temperature-Demo.git ```
- cp .env.example .env
- Composer Install\Update
- php artisan key:generate
- php artisan serve



### How To Setup Docker(?)
- Clone The Project :
    - ``` git clone https://github.com/senakalkan/Temperature-Demo.git ```
- cp .env.example .env
- docker-compose up --build -d
- docker exec -it Laravel_php /bin/sh
- composer install
 - php artisan serve


