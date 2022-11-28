<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>



## Opcion 2 



- Diego Arturo Vellojin Martínez- TDS0033
- Edison Fabian Molina Herrera-TDS0032
- Laury Alejandra Mayorga Chaparro-TDS0032

## Descripción de las rutas:

### Api

- get('post', [PostApiController::class, 'index']);
- get('post/{id}', [PostApiController::class, 'getById']);

- post('oauth/token', 'Laravel\Passport\Http\Controllers\AccessTokenController@issueToken');

### Web

- get: /home

- get: /usuario
- post: /usuario
- get: /usuario/edit/{id}
- put: /usuario/{id}

- get: /autor
- post: /autor
- get: /autor/edit/{id}
- put: /autor/{id}
- get: /post
- post: /post

