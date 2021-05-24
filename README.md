<h1>Bio Stock</h1>

Web system to manage and categorize ant species.

1. Clone this project.

2. Install composer dependencies:

    $ composer install
    
3. Generate app key (necessary):

    $ php artisan key:generate
    
4. Duplicate ".env.example" file and rename to ".env". In this file configure your database.

5. Run db migrations and seeders:

    $ php artisan migrate:fresh --seed

6. Run app:

    $ php artisan serve
