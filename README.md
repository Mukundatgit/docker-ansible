## docker-ansible
This ansible playbook is used to install docker containers apache webserver and ftp server to host and upload files

## Dockerfile
using the docker file we can create a custom apache webserver image that will include the index.html and ftp_upload.php files
This image includes php interpreter to parse php files
```sh
docker build -t my-httpd-image .   # build the custom image
```

## webpages to host 
index.html
ftp_upload.php
