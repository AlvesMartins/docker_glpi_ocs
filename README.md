# Docker OCS+GLPI

## OCS-Inventory:

OCS (Open Computers and Software Inventory Next Generation) is an assets management and deployment solution. Since 2001, OCS Inventory NG has been looking for making software and hardware more powerful. OCS Inventory NG asks its agents to know the software and hardware composition of every computer or server.



## GLPI:

GLPI (acronym: French: Gestionnaire Libre de Parc Informatique) is a free IT Asset Management, issue tracking system and service desk solution. This open source software is written in PHP and distributed under GPL license.



### docker-compose.yml

```yml
version: '3'
services :
  web:
    image : alvesdocker/docker_glpi_ocs:ocs
    container_name : ocsinventory-server
    environment :
      OCS_DBNAME : ocsweb
      OCS_DBSERVER_READ : db
      OCS_DBSERVER_WRITE : db
      OCS_DBUSER : ocs
      OCS_DBPASS : ocs
    volumes :
      - ocssrv:/usr/share/ocsinventory-reports/
      - ocssrv:/etc/ocsinventory-reports/
      - ocssrv:/var/lib/ocsinventory-reports/
    links :
      - db
    ports :
      - 80:80
      - 443:443

  glpi:
    image: alvesdocker/docker_glpi_ocs:glpi
    container_name : glpi-server
    depends_on:
      - db-glpi
    ports:
      - 8080:80
    restart: always
    links:
    - db-glpi

  app:
    image: phpmyadmin/phpmyadmin:latest
    container_name: phpmyadmin-server
    links:
      - db
      - db-glpi
    ports:
      - 8181:80
    environment:
      - PMA_ARBITRARY=1


  db :
    image : mysql:5.7
    container_name : ocsinventory-db
    restart: always
    environment:
      MYSQL_ROOT_PASSWORD : mdp
      MYSQL_USER : ocs
      MYSQL_PASSWORD : ocs
      MYSQL_DATABASE : ocsweb
    volumes :
      - ./sql/:/docker-entrypoint-initdb.d/
      - ocsdata:/var/lib/mysql
    ports :
      - 3306:3306


  db-glpi:
    image: mysql:5.7
    container_name: db-glpi
    volumes:
      - db-data-glpi:/var/lib/mysql
    restart: always
    environment:
      MYSQL_ROOT_PASSWORD: mdp
      MYSQL_DATABASE: glpi
      MYSQL_USER: glpi
      MYSQL_PASSWORD: glpi
    ports:
      - 3307:3306



volumes:
  ocsdata:
    driver: local
  ocssrv:
    driver: local
  db-data-glpi:
    driver: local
  glpi-data:
```
### execute command:

```
docker-compose up -d
```
