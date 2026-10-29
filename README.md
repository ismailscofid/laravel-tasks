# Laravel Tasks

A small task list built with Laravel. You can add tasks, view them, and delete them. This repository is a fork of [Azure-Samples/laravel-tasks](https://github.com/Azure-Samples/laravel-tasks), which accompanies the [Azure App Service PHP and MySQL tutorial](https://learn.microsoft.com/azure/app-service/tutorial-php-mysql-app).

## Run locally

You need PHP 8.1 or later with the extensions required by Laravel, Composer, and a MySQL database.

1. Clone this repository and enter its directory.
2. Install PHP dependencies: `composer install`.
3. Copy `.env.example` to `.env` and set the `DB_*` values for your local MySQL database.
4. Generate an application key: `php artisan key:generate`.
5. Create the database, then run `php artisan migrate`.
6. Start the app with `php artisan serve` and open the address it prints.

Never commit your `.env` file or real credentials.

## Tests

The tests use an in-memory SQLite database, so PHP's SQLite extensions are required. Run:

```sh
php artisan test
```

## License and attribution

This project is licensed under the [MIT License](LICENSE). The original sample is based on Laravel's task list application and was adapted for Azure App Service by Microsoft.

## Contributing

This project has adopted the [Microsoft Open Source Code of Conduct](https://opensource.microsoft.com/codeofconduct/). See the [FAQ](https://opensource.microsoft.com/codeofconduct/faq/) or contact [opencode@microsoft.com](mailto:opencode@microsoft.com) with questions.
