###1. Setup
This project uses [docker](https://docs.docker.com) and [docker-compose](https://docs.docker.com/compose). So you have to install it first.
Installation instruction for Ubuntu can be found [here](https://docs.docker.com/engine/installation/linux/docker-ce/ubuntu) and [here](https://docs.docker.com/compose/install/#install-compose).

###2. Build and prepare
```bash
    //clone the project
    git clone git@bitbucket.org:icexch/icex.media-back.git
    cd icex.media-back
    
    //install dependencies via composer
    docker-compose run --rm composer composer install
    
    //copy and modify .env file according to your needs
    cp .env.example .env
    
    //run project specific commands
    docker-compose run --rm cli php artisan key:generate --no-interaction
    docker-compose run --rm cli php artisan migrate --seed --no-interaction
        
    //run it for local env only
    docker-compose run --rm cli php artisan ide-helper:generate --no-interaction
    docker-compose run --rm cli php artisan ide-helper:meta --no-interaction
```

###3. Run
To run all containers you need just run `docker-compose up -d`. 
It will build and link all required containers automatically.

###4. Run php commands
To run any php commands just run it in container:
```bash
    docker-compose run --rm cli php <command>
```

###5. Gather dictionary commands
Obtain vk access_key with ads permissions [here](https://vk.com/dev/access_token)
```bash
    docker-compose run --rm cli php artisan gather:regions --no-interaction
    docker-compose run --rm cli php artisan gather:categories --no-interaction
```
