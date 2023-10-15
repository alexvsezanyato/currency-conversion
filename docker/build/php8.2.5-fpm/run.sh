groupadd --gid ${UID} manager
useradd --uid ${UID} --gid ${GID} --groups www-data --shell /bin/bash manager --create-home
usermod --groups ${UID} www-data

echo 'alias a="php /site/artisan"' >> /home/manager/.bashrc
echo 'alias artisan="php /site/artisan"' >> /home/manager/.bashrc
echo 'alias c="composer"' >> /home/manager/.bashrc
