FROM ubuntu:16.04

ARG UID=1000
ARG GID=1000

ENV LANG=en_US.utf8 \
    LC_ALL=C.UTF-8 \
    TERM=xterm \
    DEBIAN_FRONTEND=noninteractive

RUN groupadd --gid $GID application \
  && useradd --uid $UID --gid application --shell /bin/bash --create-home application

RUN apt-get update -y \
    && apt-get install -y \
        software-properties-common \
        curl \
        wget \
        unzip

RUN add-apt-repository -y ppa:ondrej/php \
    && apt-get update -y \
    && apt-get install -y \
        php7.1-cli \
        php7.1-gd \
        php7.1-json \
        php7.1-mbstring \
        php7.1-dom \
        php7.1-curl \
        php7.1-mysql

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php -r "if (hash_file('SHA384', 'composer-setup.php') === '544e09ee996cdf60ece3804abc52599c22b1f40f4323403c44d44fdfdd586475ca9813a858088ffbc1f233e9b180f061') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" \
    && php composer-setup.php \
    && php -r "unlink('composer-setup.php');" \
    && ln -s /composer.phar /usr/bin/composer
