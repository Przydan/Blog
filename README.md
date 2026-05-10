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

### Option A: Docker Setup (Recommended)

For the easiest setup, you can use Docker. This project includes a `docker-compose.yml` configuration using a lightweight Alpine PostgreSQL database.

1. **Clone the repository**
   ```bash
   git clone https://github.com/your-username/blog-przydan.git
   cd blog-przydan
   ```

2. **Environment Configuration**
   ```bash
   cp .env.example .env
   ```
   Update your `.env` to use the Docker database:
   ```env
   DB_CONNECTION=pgsql
   DB_HOST=pgsql
   DB_PORT=5432
   DB_DATABASE=blog
   DB_USERNAME=sail
   DB_PASSWORD=password
   ```

3. **Run the Application**
   ```bash
   # Start containers
   docker compose up -d

   # Install dependencies
   docker compose exec laravel.test composer install
   docker compose exec laravel.test npm install
   docker compose exec laravel.test npm run build

   # Generate key and migrate
   docker compose exec laravel.test php artisan key:generate
   docker compose exec laravel.test php artisan migrate:fresh --seed
   ```

### Option B: Local Setup

1. **Install dependencies**
   ```bash
   composer install
   npm install
   ```

2. **Environment Configuration**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

3. **Database Migration & Seeding**
   ```bash
   php artisan migrate:fresh --seed
   ```
   *Note: The seeder creates an administrator account and sample content.*

4. **Build Frontend Assets**
   ```bash
   npm run build
   ```

## 🌐 Production Deployment (Docker + Cloudflare)

For production environments, use the optimized multi-stage build and Cloudflare Tunnel integration.

### 1. Preparation
Ensure you have a **Cloudflare Tunnel Token**. You can get this from the Cloudflare Zero Trust dashboard.

### 2. Configure Environment
Create a `.env.prod` or set variables in your shell:
```env
CLOUDFLARE_TUNNEL_TOKEN=your_token_here
DOMAIN=blog.twojadomena.pl
DB_PASSWORD=wybierz_silne_haslo
```

### 3. Deploy
```bash
# Build and start the production stack
docker compose -f docker-compose.prod.yml up -d --build
```

The stack includes:
- **PHP 8.4-FPM Alpine:** Optimized with OPcache and JIT.
- **Nginx Alpine:** High-performance web server.
- **PostgreSQL 16 Alpine:** Database with persistent volume.
- **Cloudflare Tunnel:** Connects your local server to the internet without opening ports.

### 4. Updates
To deploy updates:
```bash
git pull
docker compose -f docker-compose.prod.yml up -d --build
```
*The entrypoint script automatically handles configuration caching and migrations.*

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
