# TicketHub

A basic but complete, PHP + MySQL ticket booking website scaffold with user auth, browsing pages, cart placeholder, and an admin dashboard. Built with Bootstrap 5 and Tailwind (CDN), and structured for easy local use on XAMPP.

## Features
- Responsive UI (Bootstrap 5 + Tailwind CDN)
- Pages:
  - Home (`index.php`)
  - Events, Movies, Sports, Leisure, Food & Beverage, Places (`/pages/*`)
  - Login, Register, Logout (`/pages/login.php`, `/pages/register.php`, `/php/logout.php`)
  - My Bookings (`/pages/bookings.php`)
  - Admin Login + Dashboard (`/pages/admin-login.php`, `/pages/admin-dashboard.php`)
- PHP sessions and PDO-based DB connection (`/php/config.php`)
- Sample seed data (users, events, movies, etc.)
- Admin area with quick stats and mock management views (`/assets/js/admin.js`)

## Prerequisites
- Windows with XAMPP (Apache + MySQL) or a PHP 8+ + MySQL (or MariaDB) stack
- Internet access for CDN assets (Bootstrap/Tailwind/Font Awesome). If offline, add local copies.

## Quick Start (XAMPP)
1) Move the folder to XAMPP htdocs
- Recommended: rename it to remove spaces, e.g. `ticket-booking`
- Target path: `C:\xampp\htdocs\ticket-booking`

2) Start services
- Open XAMPP Control Panel → Start Apache and MySQL

3) Create and import the database
- Visit http://localhost/phpmyadmin/
- Create database: `tickethub`
- Click the database, then Import
- Choose ONE of these files from the project root:
  - `database.sql` (modern; uses JSON) – recommended
  - `database_legacy.sql` (for older MariaDB; replaces JSON with TEXT)
- Keep “SQL compatibility mode” = None
- Click Go → you should see tables like `users`, `events`, `movies`, `admins`, etc.

4) Verify DB config
- File: `/php/config.php`
  - host: `localhost`
  - dbname: `tickethub`
  - username: `root`
  - password: `` (empty by default on XAMPP). If you set a MySQL password, change it here.

5) Open the site
- If you renamed the folder to `ticket-booking`:
  - Home: http://localhost/ticket-booking/
  - Login: http://localhost/ticket-booking/pages/login.php
  - Register: http://localhost/ticket-booking/pages/register.php
  - Admin Login: http://localhost/ticket-booking/pages/admin-login.php

## Demo Credentials
- User: `demo@tickethub.com` / `password`
- Admin: `admin` / `password`

> Note: Demo passwords come from the sample `database.sql`/`database_legacy.sql` inserts (hash of the word `password`).

## How the Navbar Links Work
- `includes/navbar.php` computes a base URL using `DOCUMENT_ROOT` so links work from any page (e.g., `/ticket-booking/pages/login.php`).
- The navbar is simplified (always visible) to guarantee the Login/Sign Up buttons show.
- If you keep a space in the folder name (`ticket booking`), your URL becomes `http://localhost/ticket%20booking/`.

## Common Issues & Fixes
1) Login/Sign Up buttons not visible
- Hard refresh the browser (Ctrl+F5)
- Ensure you’re accessing through `http://localhost/...` (not opening the file from disk)
- If you see your name at top-right, you’re already logged in → go to `/php/logout.php` and refresh
- Ensure internet connectivity for Bootstrap/Tailwind CDNs

2) No tables after import in phpMyAdmin
- Make sure you imported the correct file from project root: `database.sql` (or `database_legacy.sql`)
- Do NOT import `/php/database.sql` – it’s a placeholder and not valid SQL
- Leave SQL compatibility mode as `None`

3) MySQL errors about JSON columns
- Use `database_legacy.sql` (it replaces JSON with TEXT columns)

4) 404 or broken links
- If you keep spaces in the folder name, the URL must encode the space: `ticket%20booking`
- Prefer renaming to `ticket-booking`

5) “Headers already sent” or session warnings
- All key pages call `session_start()` before output. If you add PHP above it (like echo/var_dump), you’ll trigger warnings.

## Recommended MySQL `sql_mode` (optional)
Strict mode helps catch bad data early. In `C:\xampp\mysql\bin\my.ini`, under `[mysqld]`:
```
sql_mode=STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION
```
Restart MySQL after changing.

## Customize
- Styles: `/assets/css/style.css`
- Main JS (cart placeholders, etc.): `/assets/js/main.js`
- Admin behaviors: `/assets/js/admin.js`
- Add real payment integration in dedicated PHP endpoints (currently out-of-scope)

## Security Notes
- Demo data and plaintext example passwords are for local testing only
- Use environment variables or a secure config for DB credentials in production
- Implement CSRF protection and strict input validation for forms when going beyond a demo

## License

