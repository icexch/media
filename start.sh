#!/bin/bash

docker-compose run --rm composer

docker-compose run --rm node

cp .env.example .env

chown www-data:www-data ./ -R ww

docker-compose run --rm cli php artisan key:generate --no-interaction

docker-compose run --rm cli php artisan migrate --seed --no-interaction

docker-compose up -d redis db app nginx
