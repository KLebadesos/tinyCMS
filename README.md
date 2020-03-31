
## tinyCMS

On going...

- Run "php artisan db:seed"
- Run "php artisan db:seed --class=CategoriesTableSeeder"
- Run "php artisan db:seed --class=TagsTableSeeder"
- Run "php artisan db:seed --class=PostsTableSeeder"


- Add .env "FILESYSTEM_DRIVER=public"
- Run "php artisan storage:link" to link public storage to app/public dir



Plugins used:
- trix for text editor.
- flatpickr for date picker.
- select2 for multi select.

References:
- https://github.com/basecamp/trix
- https://cdnjs.com/libraries/trix/1.0.0
- https://flatpickr.js.org
- https://select2.org/
