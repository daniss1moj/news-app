

## Запуск проекта локально (Docker Compose) (На windows при использовании docker compose сервер отвечает дольше чем обычно)
- Скопировать .env.example в .env
- npm install 
- composer install
- docker-compose up -d
- docker exec -it blog bash 
- php artisan migrate --seed
- php artisan storage:link
- chmod 777 -R storage

- ## Запуск проекта локально (без Докера) 
- Скопировать .env.example в .env, заменить DB_HOST на 127.0.0.1, изменить DB_USERNAME, DB_PASSWORD
- Подлкючиться к серверу PostgreSQL через pgadmin, создать базу данных под именем news
- npm install 
- composer install
- php artisan migrate --seed
- php artisan storage:link
- php artisan serve
- npm run dev


