About
------------

Not for the production!

Simple rest api used `php-di` and `fast-route`

There is a room for improvement.

Test Installation
------------

`cd docker/`

`docker-compose up --build`

`docker exec -it wb_php-fpm_1 bash`

`./composer install -o`

`vendor/bin/phpunit`

Testing
------------

Here is a list of api endpoints: `tests/rest-api.http` 