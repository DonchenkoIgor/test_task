
# Laravel test-task

## 📌 Опис:

### Це RESTful API-додаток на фреймворку **Laravel**, розгорнутий за допомогою **Docker** і використовуючи **MariaDB** як базу даних.
 
### Функціональність включає:

- Реєстрацію та авторизацію користувачів.
- CRUD-операції з товарами.
- Коментарі до товарів.
- Історію покупок.
- Фільтрування товарів.
- Документацію API за допомогою Scribe.

## Запуск проекту:

### 1. Клонувати репозиторій.
git clone https://github.com/DonchenkoIgor/test_task.git

### 2. Створити файл оточення
cp .env.example .env

### 3. Запустити Docker-контейнери
docker-compose up -d --build

### 4. Встановити залежність Laravel (якщо не було встановлено)
docker exec -it php-fpm composer install

### 5. Згенерувати ключ програми
docker exec -it php-fpm php artisan key:generate

### 6. Виконати міграції та сидери
docker exec -it php-fpm php artisan migrate --seed

### 7. Документація доступна:
http://localhost:92/docs

## Стек технологий:
- PHP 8.2;
- Laravel;
- MariaDB;
- Docker + Docker Compose;
- Laravel Sanctum;
- Scribe;
