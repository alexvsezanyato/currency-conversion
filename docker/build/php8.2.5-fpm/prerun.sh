apt clear
apt update

apt install -y libonig-dev
apt install -y url
apt install -y unzip
apt install -y git

docker-php-ext-install pdo pdo_mysql mysqli mbstring
