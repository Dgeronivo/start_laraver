# Start learn laravel
For start copy env from env.example
make docker-start
sh console.sh composer install

### Commands:
php artisan route:list

## Database command:
php artisan migrate
php artisan make:migration create_test_table
php artisan migrate:rollback --step=5

php artisan make:seeder TestSeeder
we need register seeder in DatabaseSeeder or use with argument next command
php artisan db:seed

## Models command:
create migration --migration
php artisan make:model Flight 
