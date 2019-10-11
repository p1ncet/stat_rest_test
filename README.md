About
------------

Simple rest api

Test Installation
------------

cd docker/
docker-compose up --build
docker exec -it wb_php-fpm_1 bash
./composer install -o

Testing
------------

Here is a list of api endpoints: `tests/rest-api.http` 