<b>Рекомендуемая установка (из-под корня проекта; требуется docker)</b>

<ul>
    <li>Задаем подключение к будущей БД в docker/build/Dockerfile</li>
    <li>Можно не задавать, по умолчанию все работает</li>
    <li>./build</li>
    <li>Задаем подключение к БД в site/.env</li>
    <li>Можно не задавать, по умолчанию все работает</li>
    <li>./up</li>
    <li>docker exec -it cc-php bash</li>
    <li>composer install</li>
    <li>Ждём пока mysql инициализирует свои данные</li>
    <li>php artisan migrate</li>
    <li>exit</li>
    <li>./node</li>
    <li>cd site</li>
    <li>npm install</li>
    <li>npm run build</li>
</ul>

Сайт доступен по 80 порту (http://localhost:80/)

<b>Установка с laravel sail (из-под директории site):</b>

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
