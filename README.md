# Daily Standup Management System

## Overview
The **Daily Standup Management System** is a web-based application designed to facilitate daily standup tracking and reporting for employees. Developed using Laravel with Bootstrap and a custom theme, it provides an efficient workflow for employees to record their daily activities and for administrators to monitor overall performance.

## Features

### Employee Panel
- **Daily Standup (DS) Submission:** Employees can set up and submit their DS.
- **Task Management:** Employees can add tasks to their DS and update their progress.
- **Community Section:** Employees can view other employees' standups and gain insights.
- **Task Sharing:** Employees can add tasks from other employees' standups to their own task list.
- **Report Generation:** Employees can generate detailed reports of their DS for performance tracking.
- **Attendance Monitoring:** Employees can mark their presence in the office.

### Admin Panel
- **Employee Standup Monitoring:** View all employees' DS submissions in real time.
- **Report Generation:** Generate detailed reports based on:
  - Daily basis
  - Weekly basis
  - Custom date range
- **Status Dashboard:** Monitor the overall submission status, including:
  - Employees who have submitted their DS
  - Employees present in the office physically
  - Overall task completion statistics
- **User Management:** Manage employees, assign roles, and configure permissions.
- **Insights and Analytics:** View key performance metrics on the admin dashboard.

## Technology Stack
- **Backend:** Laravel (PHP Framework)
- **Frontend:** Bootstrap, Custom Theme
- **Database:** MySQL (or any supported relational database)
- **Authentication:** Laravel Authentication System
- **Deployment:** Apache/Nginx, Laravel Queue (for background jobs)

## Installation Guide
### Prerequisites
- PHP 8.0+
- Composer
- Node.js & npm
- MySQL or equivalent database
- Laravel CLI

### Steps to Install
1. Clone the repository:
   ```sh
   git clone [https://github.com/your-repo/daily-standup-management.git](https://github.com/Efat-khan/ds-tracking-system.git)
   ```
2. Navigate to the project directory:
   ```sh
   cd daily-standup-management
   ```
3. Install dependencies:
   ```sh
   composer install
   npm install
   ```
4. Set up environment variables:
   - Copy `.env.example` to `.env`:
     ```sh
     cp .env.example .env
     ```
   - Update database credentials in `.env`.
5. Run database migrations and seed data:
   ```sh
   php artisan migrate --seed
   ```
6. Generate application key:
   ```sh
   php artisan key:generate
   ```
7. Build frontend assets:
   ```sh
   npm run dev
   ```
8. Start the development server:
   ```sh
   php artisan serve
   ```

## Usage
- **Admin Panel:** Admins can log in to manage employees, track DS submissions, and generate reports.
- **Employee Panel:** Employees can log in to submit their DS, manage tasks, and interact with colleagues.
- **Dashboard Analytics:** Both employees and admins can view relevant insights and statistics.

## Contribution
Contributions are welcome! If you would like to contribute, please fork the repository, make your changes, and submit a pull request.

## License
This project is licensed under the MIT License.

## Contact
For inquiries or support, please contact [Your Email] or visit our [GitHub Repository](https://github.com/your-repo/daily-standup-management).

