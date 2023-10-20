<b>Пользовательская установка (рекомендуется; из-под корня проекта)</b>

<ul>
    <li>Задаем подключение к будущей БД в docker/build/mysql5.7.21/Dockerfile</li>
    <li>Можно не задавать, по умолчанию все работает</li>
    <li>Создаем site/.env, можно сделать cp .env site, в этом .env подключение к БД по умолчанию</li>
    <li>./build</li>
    <li>Задаем подключение к БД в site/.env</li>
    <li>Можно не задавать, по умолчанию все работает</li>
    <li>./up</li>
    <li>docker exec -it cc-php bash</li>
    <li>composer install</li>
    <li>Ждём пока mysql инициализирует свои данные (до завершения будет ошибка при миграции)</li>
    <li>php artisan migrate</li>
    <li>exit</li>
    <li>./node</li>
    <li>npm install</li>
    <li>npm run build</li>
    <li>exit</li>
    <li>docker exec -it cc-php /site/artisan rate:init (получаем данные за последние 10 дней)</li>
    <li>sudo docker exec -it cc-php /site/artisan rate:pull</li>
    <li>crontab -e (на хосте должен быть установлен cron)</li>
    <li>0 0 * * * docker exec cc-php /site/artisan rate:pull (каждый день)</li>
    <li>Приложение готово к работе</li>
</ul>

Сайт доступен по 80 порту (http://localhost:80/)

Источники курсов валют: ЦБ России и ЦБ Тайланда<br>
График работает на основе Highcharts<br>
Инструменты: Docker, Nginx, PHP (php-fpm), Laravel, Vue, Interia, Sanctum, Hightcharts<br>
График строится не для всех валют, баг будет исправлен<br>

<b>В будущих версиях:</b>

<ul>
    <li>Курсы валют на главной странице (без конвертации)</li>
    <li>Конвертация по HTTP API с авторизацей через токены</li>
    <li>Удобные select'ы в конвертации валют</li>
</ul>

<b>Заводская установка (инструкция устарела; из-под директории site; laravel sail):</b>

<ul>
    <li>cd site</li>
    <li>cp .env.example .env</li>
    <li>Меняем настройки где надо</li>
    <li>composer require laravel/sail --dev</li>
    <li>php artisan sail:install (выбираем только mysql)</li>
    <li>./vendor/bin/sail up</li>
    <li>docker exec -it site-laravel.test-1 bash (у вас имя контейнера может быть другое)</li>
    <li>php artisan key:generate</li>
    <li>Ждём пока mysql инициализирует свои данные</li>
    <li>php artisan migrate</li>
    <li>composer install</li>
    <li>npm install</li>
    <li>npm run build</li>
</ul>

Сайт доступен по 80 порту (http://localhost:80/)
