# Emeraude Jewelry - E-commerce Platform

<p align="center">
  <img src="https://img.icons8.com/color/96/000000/emerald.png" width="100" alt="Emeraude Jewelry Logo">
  <h1 align="center">Emeraude Jewelry</h1>
</p>

<p align="center">
  Luxury Jewelry E-commerce Platform built with Laravel
</p>

<p align="center">
  <a href="https://github.com/yourusername/emeraude-jewelry/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Emeraude Jewelry

Emeraude Jewelry is a premium e-commerce platform specializing in handcrafted jewelry pieces including:

- Bogues (Earrings)
- Colliers (Necklaces)
- Boucles (Bracelets)
- Children's jewelry
- Gift collections

Built with Laravel, this platform offers a seamless shopping experience with features like product catalog, wishlist, secure checkout, and customer account management.

## Features

- 🛍️ Product catalog with categories
- 💖 Wishlist functionality
- 🛒 Shopping cart system
- 🔐 User authentication
- 🔍 Advanced product search
- 📱 Responsive design
- 🌍 Multi-language support (French/English)
- 💳 Payment gateway integration
- 📊 Admin dashboard

## Installation

### Prerequisites

- PHP 8.1+
- Composer 2.0+
- MySQL 5.7+ or MariaDB 10.3+
- Node.js 16+
- NPM 8+

### Setup Instructions

1. Clone the repository:
   ```bash
   git clone https://github.com/yourusername/emeraude-jewelry.git
   cd emeraude-jewelry
   ```
2. Install PHP dependencies:

```bash
composer install
```
Install JavaScript dependencies:

```bash
npm install
```
Create environment file:

```bash
cp .env.example .env
```
Generate application key:

```bash
php artisan key:generate
```
Configure database in .env:

```ini
DB_DATABASE=emeraude_jewelry
DB_USERNAME=root
DB_PASSWORD=
```
Run migrations and seeders:

```bash
php artisan migrate --seed
```
Compile assets:

```bash
npm run dev
```
Start development server:

```bash
php artisan serve
```
Configuration
Important Environment Variables
APP_NAME=Emeraude Jewelry

APP_URL=http://localhost:8000

MAIL_* - Email configuration

STRIPE_KEY - Payment gateway keys

STRIPE_SECRET

Admin Access
Default admin account is created by seeder:

Email: admin@emeraude.com

Password: password

Development
Running Tests
```bash
php artisan test
```
Compiling Assets
For development:

```bash
npm run dev
```
For production:

```bash
npm run build
```
Database Structure
Database Schema

Technologies Used
Laravel 12

Alpine.js

Tailwind CSS

MySQL

License
Emeraude Jewelry is open-source software licensed under the MIT license.

Contact
For inquiries, please contact: i.zagaouch@gmail.com