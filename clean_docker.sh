#!/bin/bash

sudo docker ps
sudo docker stop $(sudo docker ps -a -q)
sudo docker rm  $(sudo docker ps -a -q)
sudo docker rmi $(sudo docker images -q)
sudo docker system prune 
sudo docker image  prune 
#sudo docker volume  prune 
#sudo docker volume rm -f $(sudo docker volume ls)

