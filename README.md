Установка с laravel sail (из-под директории site; требуется установка соответствующих зависимостей): 
    - cd site
    - composer require laravel/sail --dev
    - php artisan sail:install (выбираем только mysql)
    - ./vendor/bin/sail up
    - docker exec -it site-laravel.test-1 bash (у вас имя контейнера может быть другое)
    - php artisan migrate

Сайт доступен по 80 порту (http://localhost:80/)

Альтернативная установка (из-под корня проекта; требуется docker)
    - ./build
    - ./up
    - docker exec -it cc-php bash
    - php artisan migrate
