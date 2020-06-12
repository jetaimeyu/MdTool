# 指定基础镜像
FROM webdevops/php-nginx:alpine

#修改nginx配置文件
RUN rm -rf /etc/nginx/conf.d
COPY phpweb.conf /etc/nginx/conf.d/phpweb.conf
COPY nginx.conf /etc/nginx/nginx.conf

#RUN rm -rf /opt/docker/etc/php/fpm/pool.d/application.conf
#RUN rm -rf /etc/php7/php.ini

#COPY application.conf /opt/docker/etc/php/fpm/pool.d/application.conf
#COPY php.ini /etc/php7/php.ini
#COPY www /app
#COPY php-fpm.sh /opt/docker/bin/php-fpm.sh
#RUN mkdir /app/Uploads
#RUN chmod -R 777 /app/Uploads
#RUN mkdir /app/runtime
#RUN chmod -R 777 /app/runtime
#RUN chmod -R 777 /app/application/db
#时区修改

RUN ln -sf /usr/share/zoneinfo/Asia/Shanghai /etc/localtime
RUN echo 'Asia/Shanghai' >/etc/timezone

WORKDIR /app

#VOLUME /app/Uploads

# php-fpm使用以下配置
##EXPOSE 9000


# swoole 使用以下配置
#EXPOSE 8000

#CMD ["nginx","-g","daemon off;"]

CMD ["supervisord"]