groupadd --gid ${UID} manager
useradd --uid ${UID} --gid ${GID} --groups www-data --shell /bin/bash manager --create-home
usermod --groups ${UID} www-data

