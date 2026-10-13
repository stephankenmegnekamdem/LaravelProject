# Laravel Multi-Template E-Commerce Admin Panel

A full-stack e-commerce web application built with Laravel, featuring two parallel admin panel templates, role-based access control, and a customer-facing storefront.

---

## 📋 Table of Contents

- [About the Project](#about-the-project)
- [Features](#features)
- [Tech Stack](#tech-stack)
- [Project Structure](#project-structure)
- [Installation](#installation)
- [Configuration](#configuration)
- [Database Setup](#database-setup)
- [Usage](#usage)
- [Admin Panels](#admin-panels)
- [Routes Overview](#routes-overview)
- [Screenshots](#screenshots)
- [License](#license)

---

## About the Project

This is a university coursework project — a Laravel-based e-commerce platform with two fully functional admin panel templates sharing the same database. The project demonstrates multi-template architecture, role-based access control, CRUD operations, cart functionality, and order management.

---

## Features

### Frontend (Customer-Facing)
- Home page with product listings and category sidebar
- Shop page with product cards
- Add to cart functionality
- Cart management (add, update quantity, remove)
- Checkout and order placement
- User login and logout

### Admin Panel (Both Templates)
- Dashboard
- Category management (CRUD) with parent/subcategory support
- Product management (CRUD) with image upload and CKEditor for details
- Order management with status tracking (New → Accepted → Onshipping → Completed → Cancelled)
- Role-based access control (admin only)
- Flash messages for all CRUD actions

---

## Tech Stack

| Layer | Technology |
|-------|-----------|
| Backend | Laravel 10+ |
| Frontend | Bootstrap 4 / Bootstrap 5 |
| Admin Template 1 | SB Admin 2 (Bootstrap 4) |
| Admin Template 2 | AdminLTE 3 (Bootstrap 5) |
| Database | MySQL |
| Authentication | Laravel Auth + Spatie Permission |
| Rich Text Editor | CKEditor 5 |
| Image Storage | Laravel Storage (public disk) |

---

## Project Structure

```
resources/views/
├── layout/
│   ├── admin.blade.php       ← SB Admin 2 layout
│   ├── admin2.blade.php      ← AdminLTE layout
│   └── app.blade.php         ← Frontend layout
├── admin/                    ← SB Admin 2 views
│   ├── categories/
│   ├── products/
│   └── orders/
├── admin2/                   ← AdminLTE views
│   ├── categories/
│   ├── products/
│   └── orders/
└── partials/                 ← Frontend views
    ├── home.blade.php
    ├── shop.blade.php
    └── product.blade.php
```

---

## Installation

### Prerequisites
- PHP >= 8.1
- Composer
- MySQL
- Node.js & npm (optional, for assets)

### Steps

**1. Clone the repository:**
```bash
git clone https://github.com/stephankenmegnekamdem/LaravelProject.git
or
git@github.com:stephankenmegnekamdem/LaravelProject.git
cd LaravelProject
```

**2. Install PHP dependencies:**
```bash
composer install
```

**3. Copy the environment file:**
```bash
cp .env.example .env
```

**4. Generate application key:**
```bash
php artisan key:generate
```

**5. Run migrations and seed:**
```bash
php artisan migrate
php artisan db:seed
```

**6. Link storage:**
```bash
php artisan storage:link
```

**7. Serve the application:**
```bash
php artisan serve
```

---

## Configuration

Update your `.env` file with your local database credentials:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=root
DB_PASSWORD=

SESSION_DRIVER=file
SESSION_LIFETIME=120
```

---

## Database Setup

The project uses the following main tables:

| Table | Description |
|-------|-------------|
| `users` | Registered users |
| `roles` | Spatie roles (admin, seller, etc.) |
| `role_user` | User-role pivot table |
| `categories` | Product categories with parent/child support |
| `products` | Products with pricing, stock, and images |
| `orders` | Customer orders with shipping info |
| `order_items` | Individual items within each order |
| `carts` | Shopping cart items per user |

### Create an Admin User

```bash
php artisan tinker
```

```php
$user = \App\Models\User::create([
    'name'     => 'Admin',
    'email'    => 'admin@example.com',
    'password' => bcrypt('password123'),
]);
$user->assignRole('admin');
```

---

## Usage

| URL | Description |
|-----|-------------|
| `/` | Root — redirects based on auth/role |
| `/home` | Customer home page |
| `/shop` | Product listing page |
| `/cart` | Shopping cart (auth required) |
| `/checkout` | Checkout page (auth required) |
| `/login` | Login page |
| `/admin` | SB Admin 2 panel (admin only) |
| `/admin2` | AdminLTE panel (admin only) |

---

## Admin Panels

The project has two fully functional admin panels that share the same database:

### SB Admin 2 (`/admin`)
- Bootstrap 4 based
- Custom template different from the instructor's

### AdminLTE (`/admin2`)
- Bootstrap 5 based
- Follows the instructor's template structure

Both panels support:
- Category CRUD
- Product CRUD with CKEditor
- Order management with status updates

---

## Routes Overview

### Authentication
```
GET  /login        Show login form
POST /login        Handle login
POST /logout       Handle logout
```

### Frontend
```
GET  /home                  Home page
GET  /shop                  Shop page
GET  /product/{id}          Product detail
GET  /cart                  View cart
POST /cart/add/{product}    Add to cart
PATCH /cart/update/{cart}   Update cart item
DELETE /cart/remove/{cart}  Remove cart item
GET  /checkout              Checkout page
POST /place-order           Place order
```

### Admin (SB Admin 2)
```
GET  /admin/categories          Category list
GET  /admin/categories/create   Create category
POST /admin/categories/store    Store category
...and more
```

### Admin2 (AdminLTE)
```
GET  /admin2/categories         Category list
GET  /admin2/categories/create  Create category
POST /admin2/categories/store   Store category
...and more
```

---

## Screenshots

> Add screenshots of your project here.

---

## License

This project was developed as a university coursework assignment at Istanbul Nisantasi University.

---

> Built with Laravel — Two templates, one database.
