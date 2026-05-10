# Blog Przydan - Personal Blog & Portfolio

A simple personal blog and portfolio platform built with **Laravel 13**, **Tailwind CSS v4**, and **Blade Components**. Designed for performance, security, and a seamless authoring experience.

## ✨ Key Features

- **Dynamic Theming:**
  - 🌙 Native Dark Mode support.
- **Multilingual Support:**
  - 🌍 Full Polish (PL) and English (EN) localization.
- **Content Management (Admin Panel):**
  - ✍️ **Posts:** Create and manage blog entries using a rich Markdown editor (EasyMDE).
  - 📂 **Categories & Tags:** Organize your content efficiently.
  - 💼 **Portfolio:** Showcase your recent projects and technologies used.
  - 🚀 **Services:** Offer professional services with detailed descriptions and icons.
  - 📨 **Inquiries:** Receive and manage customer requests directly in the panel.
- **Security Hardened:**
  - 🛡️ Public registration disabled to prevent bot spam.
  - ⏱️ Strict Rate Limiting on authentication and inquiry routes.
  - 🍯 Honeypot fields on public forms (Inquiries).

## 🛠 Tech Stack

- **Backend:** PHP 8.4, Laravel 13.6
- **Frontend:** Tailwind CSS v4, Vite
- **Database:** Postgres
- **Editor:** EasyMDE (Markdown)
- **Code Quality:** Laravel Pint (standard), PHPUnit (31 tests)

## 🚀 Setup Instructions

### 1. Install dependencies
```bash
composer install
npm install
```

### 2. Environment Configuration
```bash
cp .env.example .env
php artisan key:generate
```

### 3. Database Migration & Seeding
```bash
php artisan migrate:fresh --seed
```
*Note: The seeder creates an administrator account and sample content.*

### 4. Build Frontend Assets
```bash
npm run build
```

## 🔒 Default Credentials

After running the seeders, you can access the admin panel at `/login`:

- **Email:** `admin@example.com`
- **Password:** `password`

## 🧪 Testing

To run the tests:
```bash
APP_ENV=testing php artisan test --compact
```

## 📜 License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
