Project Title: Task Management

Description
Task Management is a Laravel-based application that allows users to manage tasks efficiently. Users can register and log in to create, edit, update, and delete tasks. The application includes pagination for a better user experience and uses the Laravel Breeze package for authentication.

Installation Instructions
Follow these steps to set up the project locally.

Prerequisites
PHP: Version 8.1 or greater
Composer: Version 2.5.8 or greater

Steps
Clone the Repository

git clone https://github.com/karandev2271998/task-mangement.git
cd task-mangement

Install Dependencies
composer install
npm install

.env.example to .env and update the environment variables as needed.

cp .env.example .env
php artisan key:generate

Run Migrations and Seeders

php artisan migrate
php artisan db:seed

Compile Assets

npm run dev
Start the Development Server
php artisan serve

Features
User Registration and Authentication
Task Creation, Editing, and Deletion
Pagination for Improved User Experience
Built with Laravel Breeze for Authentication

Contributing
Contributions are welcome! Please open issues and submit pull requests for improvements and new features.

License
This project is open-source and available under the MIT License.