### Part F

**Which column did you make nullable, and why that one and not another?**
I made the `is_featured` column nullable because a movie might not always be marked as featured right away. The primary columns like `title`, `genre`, `director`, and `year` are required because every movie record needs basic identifying information.

**Which step failed first for you, and what did the error say?**
The first error I encountered was while running `php artisan migrate:status`, which gave an error regarding the PHP `intl` extension being missing or not enabled. I fixed it by opening the `php.ini` configuration file, uncommenting `extension=intl`, saving it, and running the migration status command again.

**You changed no Blade file in Part D, yet your pages still work. Why not?**
The pages still work because Laravel strictly follows the Model-View-Controller (MVC) architecture. I only updated the controller layer to pull data from the SQLite database using the Eloquent `Movie` model instead of reading from the JSON file. Since the controller continues to pass the expected `$movies` variable to the Blade view, the template renders the data seamlessly without needing any code changes.