# Laravel Vue.js Project

Laravel Vue.js project starter.

## Description

This is a Laravel Vue.js project starter. It has some basic setup for your new projects startup. It's help full for every new project starter.

## Prerequisites

Before you begin, ensure you have met the following requirements:

- [Node.js](https://nodejs.org/) installed v20 stable
- [Composer](https://getcomposer.org/) installed v2.7.4
- [PHP](https://www.php.net/) installed v^8.2
- [Laravel](https://laravel.com/) v11
- [NPM](https://www.npmjs.com/) or [Yarn](https://yarnpkg.com/) installed or br [Bun](https://bun.sh/docs/installation) Preferred to Bun

## Setup Instructions

To set up this project locally, follow these steps:

1. Clone the repository:

    ```bash
    git clone https://github.com/awalhadi/laravel-vue-starter.git
    ```

2. Navigate into the project directory:

    ```bash
    cd laravel-vue-starter
    ```

3. Install PHP dependencies using Composer:

    ```bash
    composer install
    ```

4. Install JavaScript dependencies using NPM or Yarn:

    ```bash
    bun install
    ```
    # or
    ```bash
    npm install
    ```
    # or
    ```bash
    yarn install
    ```

5. Copy the `.env.example` file and rename it to `.env`:

    ```bash
    cp .env.example .env
    ```

6. Generate an application key:

    ```bash
    php artisan key:generate
    ```

7. Configure your database settings in the `.env` file.

8. Run database migrations:

    ```bash
    php artisan migrate
    ```

9. Compile front-end assets:

    ```bash
    npm run dev
    # or
    yarn dev
    ```

10. Start the development server:

    ```bash
    php artisan serve
    ```

11. Visit `http://localhost:8000` in your browser to see the application.

## Usage

Provide instructions on how to use your application here. Include any necessary steps, commands, or configurations.

## Contributing

If you'd like to contribute to this project, follow these steps:

1. Fork the repository.
2. Create a new branch (`git checkout -b feature/new-feature`).
3. Make your changes.
4. Commit your changes (`git commit -am 'Add new feature'`).
5. Push to the branch (`git push origin feature/new-feature`).
6. Create a new Pull Request.

## License

This project is licensed under the [MIT License](LICENSE).
