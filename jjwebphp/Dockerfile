FROM php:7.4-apache
COPY src/ /var/www/php

# section for WebApp SSH console
# https://docs.microsoft.com/en-us/azure/app-service/containers/tutorial-custom-docker-image

# ssh
ENV SSH_PASSWD "root:Docker!"
RUN apt-get update \
        && apt-get install -y --no-install-recommends dialog \
        && apt-get update \
	&& apt-get install -y --no-install-recommends openssh-server \
	&& echo "$SSH_PASSWD" | chpasswd 

COPY sshd_config /etc/ssh/
COPY init.sh /usr/local/bin/
	
RUN chmod u+x /usr/local/bin/init.sh
EXPOSE 8000 2222
ENTRYPOINT ["init.sh"]