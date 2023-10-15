groupadd --gid ${UID} manager
useradd --uid ${UID} --gid ${GID} --groups www-data --shell /bin/bash manager --create-home

echo 'alias a="php /laravel/artisan"' >> /home/manager/.bashrc
echo 'alias artisan="php /laravel/artisan"' >> /home/manager/.bashrc
echo 'alias c="composer"' >> /home/manager/.bashrc
