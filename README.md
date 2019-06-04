# laravel-contacts-CRUD
a simple laravel CRUD contact list made for a job application

It was made on a mac and I used MAMP Apache & MySQL server so I had to change          

`'unix_socket' => env('DB_SOCKET', '')` to `'unix_socket' => '/Applications/MAMP/tmp/mysql/mysql.sock'`

in config/database.php to make the SQL connection happen.

## What I learned

- how to initialisate a new laravel project in a Mac dev env with MAMP, phpmyadmin.
- Laravel migration basics. How to initialise a db and populate it with some test datas.
- The resource controller for CRUD operations
- Model basics
- Creating views with Blade layout basics 
- Validate and update datas
