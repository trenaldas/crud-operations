php artisan make:model User -crm

php artisan make:controller UserController -r --model=User
php artisan make:migration CreateUsersTable

Validacijos klasė
php artisan make:request UserStoreRequest

Keleta testu paruosti
Http request types, why so many?
