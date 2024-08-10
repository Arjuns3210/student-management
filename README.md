# Student Management System

This is a student management system built with Laravel 9.

## Features

- CRUD functionality for Students and Teachers
- Soft delete for Students
- Pagination for listing Students
- Search functionality for Students and Teachers
- User authentication

## Installation

1. Clone the repository:
   ```bash
   git clone <repository-url>
   ```

2. Install dependencies:
   ```bash
   composer install
   npm install
   npm run dev
   ```

3. Set up environment:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. Configure the `.env` file with your database settings.

5. Run migrations and seeders:
   ```bash
   php artisan migrate --seed
   ```

6. Serve the application:
   ```bash
   php artisan serve
   ```

## Usage

