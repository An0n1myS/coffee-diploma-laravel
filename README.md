# Название проекта

## Описание проекта и его функционал
Проект представляет собой веб-приложение для кофейни, предоставляющее пользователям возможность приобретать товары, создавать собственные коктейли и ознакомиться с интересным блогом о кофе.
## Table of Contents
- [Скриншоты](#Скриншоты)
- [Инструкции по установке](#Инструкции-по-установке)
- [Примеры использования](#примеры-использования)
- [Список зависимостей](#Список-зависимостей)
- [Лицензия](#Лицензия)

## Скриншоты
## Главная страница
<img src="examples/main page.png" alt="main page">

## Страница с блогом
<img src="examples/blog page.png" alt="main page">

## Страница с каталогом товаров
<img src="examples/catalog page.png" alt="main page">

## Страница создания своего коктейля
<img src="examples/cocktail page.png" alt="main page">



## Инструкции по установке
1. Скопируйте репозиторий с GitHub.
2. Установите Composer, следуя инструкциям на https://getcomposer.org/.
3. Установите Node.js, если он не установлен, с официального сайта https://nodejs.org/.
4. Установите Laravel, используя Composer:
    ```bash
    composer install
    ```
5. Установите зависимости Tailwind CSS:
    ```bash
    npm install
    npm install -D tailwindcss postcss autoprefixer
    npx tailwindcss init -p
    ```
6. Создайте файл `.env` на основе `.env.example` и укажите информацию о подключении к базе данных.
7. Выполните миграции в базу данных:
    ```bash
    php artisan migrate
    ```

## Примеры использования
1. Запустите локальный сервер Laravel:
    ```bash
    php artisan serve
    ```
2. Соберите статические ресурсы Tailwind CSS:
    ```bash
    npm run dev
    ```
3. Откройте приложение в браузере.

## Список зависимостей
- Laravel
- Tailwind CSS
- Node.js

## Лицензия
[MIT license](https://opensource.org/licenses/MIT).
