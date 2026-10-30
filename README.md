# Lab Activity 9 - Barangay Bakuna Tracker

Laravel 12 project for the vaccination desk of Barangay Matina Crossing Health Center.
Uses Blade (layouts and components), Tailwind CSS v3 and Vite. Data is stored in SQLite.

## Login (seeded user)

- Email: nurse.ibanez@bakuna.test
- Password: bakuna2026

## How to run

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate:fresh --seed
npm run dev
php artisan serve
```

Run `npm run dev` and `php artisan serve` in two separate terminals, then open http://127.0.0.1:8000.

Before submitting I ran `npm run build` to check that `public/build/manifest.json` is created.

## Pages

- `/login` - sign in
- `/dashboard` - alert banner, stat cards and schedule table
- `/schedule` - full schedule list

Both `/dashboard` and `/schedule` are protected by the `auth` middleware.
