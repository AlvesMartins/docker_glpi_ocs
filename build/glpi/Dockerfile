FROM churrops/nginx-php7-fpm

ENV GLPI_VERSION="9.2.1"
ENV FUSION_VERSION="9.2.1.0"

ENV GLPI_URL="https://github.com/glpi-project/glpi/releases/download/${GLPI_VERSION}/glpi-${GLPI_VERSION}.tgz"

ENV FUSION_URL="https://github.com/fusioninventory/fusioninventory-for-glpi/releases/download/glpi9.2%2B1.0/glpi-fusioninventory-${FUSION_VERSION}.tar.bz2"

WORKDIR /var/www/html

RUN wget ${GLPI_URL} \
    && tar zxf glpi-${GLPI_VERSION}.tgz \
    && rm -f glpi-${GLPI_VERSION}.tgz \
    && mv /var/www/html/glpi/* /var/www/html/ \
    && rm -rf /var/www/html/glpi \
    && touch /var/www/html/favicon.ico \
    && rm -f /var/www/html/index.nginx-debian.html \
    && rm -f /etc/nginx/sites-available/default \
    && apt-get update -y && apt-get install bzip2 -y && rm -rf /var/lib/apt/lists/* \
    && wget ${FUSION_URL} \
    && wget https://github.com/pluginsGLPI/ocsinventoryng/releases/download/1.4.3/glpi-ocsinventoryng-1.4.3.tar.gz \
    && wget https://forge.glpi-project.org/attachments/download/2216/GLPI-dashboard_plugin-0.9.0_GLPI-9.2.x.tar.gz \
    && tar jxf glpi-fusioninventory-${FUSION_VERSION}.tar.bz2 -C /var/www/html/plugins/ \
    && tar -xvf glpi-ocsinventoryng-1.4.3.tar.gz -C /var/www/html/plugins/ \
    && tar -xvf GLPI-dashboard_plugin-0.9.0_GLPI-9.2.x.tar.gz /var/www/html/plugins/ \
    && rm -f glpi-fusioninventory-${FUSION_VERSION}.tar.bz2 \
    && chown -R www-data:www-data /var/www/html/

COPY files/default /etc/nginx/sites-available/
