

## Запуск проекта локально (Docker Compose) (На windows при использовании docker compose сервер отвечвет дольше чем обычно)
- Скопировать .env.example в .env
- npm install 
- composer install
- docker-compose up -d
- docker exec -it blog bash 
- php artisan migrate --seed
- php artisan storage:link
- chmod 777 -R storage

- ## Запуск проекта локально (без Докера) 
- Скопировать .env.example в .env, заменить DB_HOST на 127.0.0.1
- Подлкючить к серверу PostgreSQL через pgadmin, создать базу данных под именем news
- npm install 
- composer install
- php artisan migrate --seed
- php artisan storage:link


If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
