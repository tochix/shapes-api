Shapes API 
=======================================

Calculate areas of shapes(circle, square and rectangle) with this API. The API is written in PHP with minimal dependency on [Fast Route][fast_route] and [PHP-DI][php_di].

Requirements
------------
- PHP 7.0 or newer.
- [Composer][composer]
- [Git][git]

Install
-------

To install clone this repo and use composer to install the dependencies:

```sh
git clone git@github.com:tochix/shapes-api.git
cd shapes-api
composer install
```

Usage
-----

Here's a basic usage example:

- Fire up PHP's internal Server

```sh
cd shapes-api
php -S 127.0.0.1:8765 index.php
```
- Use [cURL][curl] to call the APIs
```sh
curl -v 127.0.0.1:8765/area/circle/3.142
*   Trying 127.0.0.1...
* Connected to 127.0.0.1 (127.0.0.1) port 8765 (#0)
> GET /area/circle/3.142 HTTP/1.1
> Host: 127.0.0.1:8765
> User-Agent: curl/7.49.0
> Accept: */*
>
< HTTP/1.1 200 OK
< Host: 127.0.0.1:8765
< Connection: close
< X-Powered-By: PHP/7.0.10
< Content-type: text/html; charset=UTF-8
<
* Closing connection 0
{"area":31.014317897434,"type":"circle","parameters":"radius: 3.142"}
```
```sh
curl -v 127.0.0.1:8765/area/square?length=1337
*   Trying 127.0.0.1...
* Connected to 127.0.0.1 (127.0.0.1) port 8765 (#0)
> GET /area/square?length=12 HTTP/1.1
> Host: 127.0.0.1:8765
> User-Agent: curl/7.49.0
> Accept: */*
>
< HTTP/1.1 200 OK
< Host: 127.0.0.1:8765
< Connection: close
< X-Powered-By: PHP/7.0.10
< Content-type: text/html; charset=UTF-8
<
* Closing connection 0
{"area":1787569,"type":"square","parameters":"length: 1337"}
```
```sh
curl -v -X POST 127.0.0.1:8765/area/rectangle -d 'length=12' -d 'width=9'
*   Trying 127.0.0.1...
* Connected to 127.0.0.1 (127.0.0.1) port 8765 (#0)
> POST /area/rectangle HTTP/1.1
> Host: 127.0.0.1:8765
> User-Agent: curl/7.49.0
> Accept: */*
> Content-Length: 17
> Content-Type: application/x-www-form-urlencoded
>
* upload completely sent off: 17 out of 17 bytes
< HTTP/1.1 200 OK
< Host: 127.0.0.1:8765
< Connection: close
< X-Powered-By: PHP/7.0.10
< Content-type: text/html; charset=UTF-8
<
* Closing connection 0
{"area":108,"type":"rectangle","parameters":"length: 12; width: 9"}
```
```sh
curl -v -X GET 127.0.0.1:8765/area/rectangle -d 'length=12' -d 'width=9'
*   Trying 127.0.0.1...
* Connected to 127.0.0.1 (127.0.0.1) port 8765 (#0)
> GET /area/rectangle HTTP/1.1
> Host: 127.0.0.1:8765
> User-Agent: curl/7.49.0
> Accept: */*
> Content-Length: 17
> Content-Type: application/x-www-form-urlencoded
>
* upload completely sent off: 17 out of 17 bytes
< HTTP/1.1 405 Method Not Allowed
< Host: 127.0.0.1:8765
< Connection: close
< X-Powered-By: PHP/7.0.10
< Content-type: text/html; charset=UTF-8
<
* Closing connection 0
```
```sh
curl -v 127.0.0.1:8765/area/circle
*   Trying 127.0.0.1...
* Connected to 127.0.0.1 (127.0.0.1) port 8765 (#0)
> GET /area/circle HTTP/1.1
> Host: 127.0.0.1:8765
> User-Agent: curl/7.49.0
> Accept: */*
>
< HTTP/1.1 404 Not Found
< Host: 127.0.0.1:8765
< Connection: close
< X-Powered-By: PHP/7.0.10
< Content-type: text/html; charset=UTF-8
<
* Closing connection 0
```
```sh
curl -v 127.0.0.1:8765/area/square?length=leet
*   Trying 127.0.0.1...
* Connected to 127.0.0.1 (127.0.0.1) port 8765 (#0)
> GET /area/square?length=leet HTTP/1.1
> Host: 127.0.0.1:8765
> User-Agent: curl/7.49.0
> Accept: */*
>
< HTTP/1.1 400 Bad Request
< Host: 127.0.0.1:8765
< Connection: close
< X-Powered-By: PHP/7.0.10
< Content-type: text/html; charset=UTF-8
<
* Closing connection 0
Provided parameter(s) are invalid: Please pass length of square as float or int.
```

[fast_route]: https://github.com/nikic/FastRoute
[php_di]: https://github.com/PHP-DI/PHP-DI
[composer]: https://github.com/composer/composer
[git]: https://git-scm.com/downloads
[curl]: https://curl.haxx.se
