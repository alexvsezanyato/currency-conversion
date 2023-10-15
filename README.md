<b>Установка с laravel sail (из-под директории site; требуется установка соответствующих зависимостей):</b>

<ul>
    <li>cd site</li>
    <li>composer require laravel/sail --dev</li>
    <li>php artisan sail:install (выбираем только mysql)</li>
    <li>./vendor/bin/sail up</li>
    <li>docker exec -it site-laravel.test-1 bash (у вас имя контейнера может быть другое)</li>
    <li>php artisan migrate</li>
</ul>

Сайт доступен по 80 порту (http://localhost:80/)

<b>Альтернативная установка (из-под корня проекта; требуется docker)</b>

<ul>
    <li>./build</li>
    <li>./up</li>
    <li>docker exec -it cc-php bash</li>
    <li>php artisan migrate</li>
</ul>

Сайт доступен по 80 порту (http://localhost:80/)
