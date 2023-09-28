# About Project

its using tailwind with cdn so please when you test it make sure to be connected to internet 🙏

# How to run

git clone https://github.com/koberidzemikheili/Library-AdminPanel.git

composer install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate (in case of testing --seed)
php artisan serve
