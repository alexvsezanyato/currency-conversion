FROM nginx:1.12.1
LABEL maintainer="a1x.be1.fve@gmail.com"

WORKDIR /site

ARG UID=1000
ARG GID=1000

COPY prerun.sh /tmp/prerun.sh
RUN /tmp/prerun.sh && rm /tmp/prerun.sh

COPY run.sh /tmp/run.sh
RUN /tmp/run.sh && rm /tmp/run.sh

EXPOSE 80
