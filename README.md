# Novex

Запуск

В корне проекта запустить команду `docker compose up --build -d`

Создать бд
- перейти в папку app
- выполнить команду `php bin/console doctrine:migrations:migrate`

Использование

 - GET /api/v1/users -- Получить всех пользователей
 - POST /api/v1/users -- Создать пользователя
 - GET /api/v1/users/{id} --  Получить пользователя
 - PATCH /api/v1/users/{id} --  Обновить пользователя
 - DELETE /api/v1/users/{id} --  Удалить пользователя
