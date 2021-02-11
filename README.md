this app for make auth in api with useing twilio to send sms code

To run project :
    1-composer install 
    2-cp .env.example .env
    3-php artisan key:generate
    4-npm install
    5-npm run dev
    6-php artisan migrate --seed 
    7-php artisan serve
    
    
  response in postman
           1- http://127.0.0.1:8000/api/auth/register  // add to from-data (  username - mobile - password   )
           2-  http://127.0.0.1:8000/api/auth/login    // add to from-data  ( username - mobile -password - code)    code received from sms
           3- http://127.0.0.1:8000/api/auth/me        //for get you info
           4-  http://127.0.0.1:8000/api/auth/logout
           
           
  and admin panel in :
         http://127.0.0.1:8000/
            


<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>



