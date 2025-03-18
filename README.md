# API Admin Gram V2

Это проект для управления API в админской панели, который использует Laravel, PostgreSQL с расширением PostGIS и Nginx для веб-сервера. Проект использует Docker для создания локального окружения.

## Требования

- Docker и Docker Compose
- Git (для клонирования репозитория)

## Шаги для запуска проекта

### 1. Клонируйте репозиторий

Склонируйте репозиторий на свою машину:

```bash
1. git clone https://github.com/ваш-репозиторий/api_admin_gram_v2.git
cd api_admin_gram_v2

2. sudo docker-compose up -d --build

3. docker exec -it postgres_db bash
   psql -U postgres -d mydatabase
   CREATE EXTENSION postgis;

4. http://localhost/api/docs





