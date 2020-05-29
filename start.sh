#!/bin/bash

docker-compose run --rm composer

docker-compose run --rm node

docker-compose run --rm cli php artisan key:generate --no-interaction

docker-compose run --rm cli php artisan migrate --seed --no-interaction

docker-compose up -d redis db app nginx
