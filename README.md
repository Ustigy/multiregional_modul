# Multiregional modul

## Описание

Это веб-приложение, разработанное с использованием фреймворка Laravel. Приложение предназначено для отображения информации о различных городах, включая новости, общее описание и другие ресурсы, связанные с каждым городом.

## Требования

Перед тем, как развернуть приложение, убедитесь, что у вас установлены следующие компоненты:

-   Laravel 10
-   PHP
-   Composer
-   Node.js и npm
-   MySQL или другая СУБД

## Установка

### 1. Клонируйте репозиторий

```bash
git clone https://github.com/Ustigy/multiregional_modul
```

### 2. Перейдите в директорию проекта

```bash
cd multiregional_modul
```

### 3. Установите зависимости PHP

```bash
composer install
```

### 4. Установите зависимости Node.js

```bash
npm install
```

### 5. Настройте файл .env

Скопируйте файл .env.example в .env:

```bash
cp .env.example .env
```

Откройте файл .env и настройте параметры подключения к вашей базе данных:
DB*CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ваша*база*данных
DB_USERNAME=ваш*пользователь
DB*PASSWORD=ваш*пароль

### 6. Создайте базу данных

Создайте базу данных, указанную в вашем .env файле.

### 7. Запустите миграции

```bash
php artisan migrate
```

### 8. Заполните базу данных

```bash
php artisan import:cities
```

### 9. Сгенерируйте ключ шифрования

```bash
php artisan key:generate
```

### 10. Соберите ассеты

```bash
npm run build
```

### 11. Запустите сервер

```bash
php artisan serve
```

Теперь приложение доступно по адресу: http://localhost:8000.
