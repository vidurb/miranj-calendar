# Event Calendar Task
by Vidur Butalia for Miranj

# Installation instructions
Please refer to the system requirements for Laravel. This project uses Laravel 5.7.

The procedure to install this project is as follows:

Make sure all prerequisites for Laravel are set up and operating correctly as per Laravel documentation.

Clone this project into a convenient location on your terminal.

Run `composer update` from the root of the project.

Copy the contents of the `.env.example` file into a new file called `.env`. 
Both files should be located in the root of the project.

Fill your database credentials into `.env` - database host, username, password and db name.

Symlink the `public` folder into your server's webroot and set correct permissions on the downloaded files -
the `bootstrap/cache` and `storage` folders should be writeable by the webserver user. 
Alternatively, you may wish to use Laravel Valet to run this project, 
in which case you do not need to symlink the public folder and may refer to the Laravel Valet documentation.

Run the command `php artisan migrate` to set up the database tables.

Run the command `php artisan db:seed` to seed the database with data from HasGeek's repo.

The app should be ready to run. Navigate to the URL mapped to the project - 
it may be relative to the server's primary URL depending on how you symlinked the `public` folder.
Alternatively, if you choose to use Laravel Valet, refer to it's documentation. 
Using its default configuration, the project would be at miranj-calendar.test.
