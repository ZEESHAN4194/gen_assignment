# Laravel Project Setup Guide

A Laravel-based web application designed for managing data and operations. This guide walks you through the steps to set up the project locally, including database import and basic usage.

---

## 📦 Requirements

Ensure your system has the following installed:

- **PHP >= 8.1**: Required for running Laravel.
- **Composer**: Dependency manager for PHP.
- **MySQL**: For database management.
---

## 🚀 Installation Steps

### 1. Clone the Repository

Clone the project repository to your local machine:

```bash

git clone https://github.com/ZEESHAN4194/gen_assignment.git
cd gen_assignment
```

### 2. Install Dependencies

Install PHP dependencies using Composer:

```bash
composer install
```

### 3. Set Up Environment File

Copy the `.env.example` file to `.env`:

```bash
cp .env.example .env
```

Update the `.env` file with your database credentials and other configurations:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 4. Generate Application Key

Run the following command to generate the application key:

```bash

php artisan key:generate

```

### 5. Run Database Migrations

Run the migrations to set up the database schema:

```bash
php artisan migrate
```

### 6. Seed the Database

If the project includes seeders, you can populate the database with sample data:

```bash
php artisan db:seed
```

### 7. Start the Development Server

Start the Laravel development server:

```bash
php artisan serve
```

The application will be accessible at `http://127.0.0.1:8000`.

---

## 🛠️ Additional Commands


### Clearing Cache

Clear the application cache:

```bash
php artisan optimize
```
