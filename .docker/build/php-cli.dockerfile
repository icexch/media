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
        php7.1-xml \
        php7.1-xdebug \
        php7.1-curl \
        php7.1-mysql
