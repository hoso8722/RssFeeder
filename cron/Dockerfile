# FROM alpine:3.9

# ENV DOCKER_CLIENT_VERSION=1.12.3

# RUN apk add --update curl bash \
#   && rm -rf /var/cache/apk/* \
#   && curl -fsSL https://get.docker.com/builds/Linux/x86_64/docker-${DOCKER_CLIENT_VERSION}.tgz > docker.tgz \
#   && tar xfz docker.tgz docker/docker \
#   && mv docker/docker /usr/local/bin/docker \
#   && rm -rf docker \
#   && chmod +x /usr/local/bin/docker
FROM alpine:3.11

RUN apk update && apk add --no-cache bash docker-cli

COPY crontablist /etc/crontabs/root

CMD ["crond", "-f"]
