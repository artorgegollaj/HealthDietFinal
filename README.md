# Health And Diet

A PHP/MySQL web application for browsing workout programs and managing fitness products through an admin dashboard.

## Features

- **User authentication** — register, log in, log out with role-based access (admin / user)
- **Workout categories** — browse muscle building, fat loss, strength, abs, and stamina programs
- **Training programs** — detailed workout plans with exercises, sets, and reps
- **Admin dashboard** — create, edit, and delete products with optional image/PDF file uploads

## Tech Stack

- **Backend:** PHP (PDO)
- **Database:** MySQL
- **Frontend:** HTML5, CSS3, JavaScript

## Project Structure

```
HealthDietFinal/
├── assets/
│   ├── css/
│   │   ├── login.css
│   │   ├── workouts.css
│   │   ├── programs.css
│   │   ├── signup.css
│   │   └── program-detail.css
│   ├── js/
│   │   ├── login.js
│   │   └── signup.js
│   └── images/
│       └── (all image assets)
├── interface/
│   └── IProductRepository.php
├── models/
│   └── Product.php
├── repository/
│   └── ProductRepository.php
├── uploads/              ← user-uploaded product files (auto-created)
├── view/
│   ├── productDashboard.php
│   ├── addProduct.php
│   ├── editProduct.php
│   └── deleteProduct.php
├── Database.php          ← database connection
├── Projekti.php          ← login page (entry point)
├── Projektifq2.php       ← workouts page
├── faqja3.php            ← programs listing
├── faqja4.php            ← sign-up page
├── faqja5.php            ← full body workout program detail
├── signup.php            ← registration handler
└── logout.php            ← session terminator
```

## Requirements

- PHP 7.4+
- MySQL 5.7+
- A local web server (e.g. XAMPP, WAMP, Laragon)

## Setup

1. Clone or copy this project into your web server's document root (e.g. `htdocs/` for XAMPP).

2. Create the database and tables. Run the following SQL in phpMyAdmin or your MySQL client:

```sql
CREATE DATABASE productdatabase CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE productdatabase;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'user') NOT NULL DEFAULT 'user'
);

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(200) NOT NULL,
    description TEXT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    file_path VARCHAR(300) DEFAULT NULL,
    file_type ENUM('image', 'pdf') DEFAULT NULL,
    created_by INT DEFAULT NULL,
    updated_by INT DEFAULT NULL,
    FOREIGN KEY (created_by) REFERENCES users(id) ON DELETE SET NULL,
    FOREIGN KEY (updated_by) REFERENCES users(id) ON DELETE SET NULL
);
```

3. Insert an admin user (replace the password hash with one generated via `password_hash()`):

```sql
INSERT INTO users (name, email, password, role)
VALUES ('Admin', 'admin@example.com', '<bcrypt_hash>', 'admin');
```

4. Open `Database.php` and verify the credentials match your local MySQL setup (default: `root` / empty password).

5. Visit `http://localhost/HealthDietFinal/Projekti.php` to log in.

## Pages

| URL | Description |
|-----|-------------|
| `Projekti.php` | Login |
| `faqja4.php` | Sign up |
| `Projektifq2.php` | Workout categories |
| `faqja3.php` | Training programs |
| `faqja5.php` | Full body workout detail |
| `view/productDashboard.php` | Admin — product list |
| `view/addProduct.php` | Admin — add product |
| `view/editProduct.php?id=X` | Admin — edit product |
