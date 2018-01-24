FROM debian:jessie

LABEL maintainer="lucas.martins@semantix.com.br"
LABEL version="2.3.1"
LABEL description="OCS"

ADD OCSNG_SERVER /tmp/

RUN apt-get update && apt-get install python-software-properties software-properties-common -y \
    && apt-get -y install \
    apache2 \
    libmysqlclient15-dev \
    php5 \
    php5-gd \
    php5-mysql \
    php5-curl \
    php5-imap \
    php5-ldap \
    libapache-dbi-perl \
    libnet-ip-perl \
    libsoap-lite-perl \
    libapache2-mod-perl2 \
    libxml-simple-perl \
    libdbi-perl \
    libdbd-mysql-perl \
    git \
    wget \
    tar \
    unzip \
    nano \
    make

RUN cpan -i XML::Entities
RUN cpan -i YAML

