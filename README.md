# Laravel System Management

This is a Laravel-based system management project that utilizes the Breeze Laravel package for authentication and the Spatie Laravel Permission package for managing permissions.

## Getting Started

To get started with this project, follow the steps below.

### Prerequisites

- PHP (>= 8.2.0)
- Composer
- MySQL or any other supported database

### Installation

1. Clone the repository:

## Features

- User authentication and registration using the Breeze package.
- Role-based access control using the Spatie Laravel Permission package.
- CRUD operations for managing system resources.
- Customizable permissions and roles management.

## How can run project 

1. create data by name  => assimgent
2. run  php artisan migrate:refresh
3. run php artisan  db:seed --class=CreateAdminUserSeeder     to fetch data admin
            'name' => 'baselahmed', 
            'email' => 'baselahmed@gmail.com',
            'password' => '123456789',
4. run php artisan db:seed --class="PermissionTableSeeder

