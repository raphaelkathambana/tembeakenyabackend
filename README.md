# Server for [Tembea Kenya](https://github.com/raphaelkathambana/tembeakenya)

## Description

This is the server for the Tembea Kenya project. It is built using Laravel. It is a RESTful API that serves the Tembea Kenya project.

## Installation

1. Clone the repository
2. Run `cp .env.example .env`
3. Run `composer install`
4. Run `npm install`
5. Run

    ```bash
    php artisan key:generate
    ```

6. Create a database and update the `.env` file with the database credentials
7. Run

    ```bash
    php artisan migrate
    ```

8. Run the following commands to start the Server

    ```bash
    php artisan serve
    ```

    ```bash
    npm run dev
    ```

9. The server will be running on `http://localhost:8000`

## Launching the Server on [Fly](fly.io)

Follow instructions on the fly.io documentation [here](https://fly.io/docs/laravel/)
