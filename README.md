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

## Demo Credentials
- User: `demo@tickethub.com` / `password`
- Admin: `admin` / `password`

> Note: Demo passwords come from the sample `database.sql`/`database_legacy.sql` inserts (hash of the word `password`).

## Customize
- Styles: `/assets/css/style.css`
- Main JS (cart placeholders, etc.): `/assets/js/main.js`
- Admin behaviors: `/assets/js/admin.js`
- Add real payment integration in dedicated PHP endpoints (currently out-of-scope)

## Security Notes
- Demo data and plaintext example passwords are for local testing only
- Use environment variables or a secure config for DB credentials in production
- Implement CSRF protection and strict input validation for forms when going beyond a demo

##  Aims of the Project
•	Centralize Event and Activity Bookings: To provide a single platform where users can find and book tickets for a diverse range of events, including movies, sports, leisure activities, and tourist attractions, instead of having to visit multiple websites.
•	Enhance User Experience: To create a user-friendly interface that simplifies the process of finding, selecting, and purchasing tickets, including features like a secure login system and an easy-to-navigate homepage.
•	Increase Accessibility: To make it easier for people to discover local events and activities they might not have otherwise known about.
•	Streamline Business Operations: To offer a solution for event organizers, venue owners, and service providers to manage their ticket sales, bookings, and customer data more efficiently.
•	Boost Revenue: To generate income through ticket sales commissions or service fees.

## Problems This Project Will Solve
This platform will solve several key problems for both consumers and businesses:
•	Fragmentation of Information: Currently, a person looking to book a movie, a sports game, or a tourist tour would have to visit separate websites for each. This project solves this by consolidating all these options into one place.
•	Inconvenience for Users: The need to create multiple accounts and enter payment details on different sites is time-consuming and inconvenient. A single platform with a secure login solves this, creating a more streamlined booking process.
•	Limited Exposure for Businesses: Smaller event organizers or local tourist destinations may struggle to get visibility. This platform will provide them with a dedicated space to list their offerings, increasing their market reach and potential customer base.
•	Inefficient Ticket Management: For businesses, managing manual ticket sales and tracking bookings can be a logistical headache. The website will provide a digital solution for automated ticket sales, inventory management, and data analysis.
•	Missed Opportunities: Users often don't know about local events happening around them.
