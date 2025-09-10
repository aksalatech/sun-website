# Bintang Fajar Abadi

A travel management system built with Laravel and Filament Admin Panel.

## 🚀 Technology Stack

- PHP >= 8.1
- Laravel 10.x
- Filament 3.x
- MySQL Database

## 📋 Prerequisites

Before you begin, ensure you have the following installed:
- PHP >= 8.1
- Composer
- MySQL
- Node.js & NPM

## ⚙️ Installation Steps

1. Clone the repository:
```bash
git clone https://github.com/your-username/fyp-travel.com.git
cd fyp-travel.com
```

2. Install PHP dependencies:
```bash
composer install
```

3. Create a symbolic link for storage:
```bash
php artisan storage:link
```

4. Set up your environment variables:
```bash
cp .env.example .env
```

5. Configure your `.env` file with your MySQL database credentials:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
```

6. Generate application key:
```bash
php artisan key:generate
```

7. Restore the database from dump file:
```bash
mysql -u your_username -p your_database_name < database/dumps/fyp-travel.com.sql
```

8. Install frontend dependencies and build assets:
```bash
npm install
npm run build
```

9. Start the development server:
```bash
php artisan serve
```

## 🌐 Accessing the Application

- Main Website: `http://localhost:8000`
- Admin Panel: `http://localhost:8000/admin`

## 🛠️ Common Issues & Solutions

If you encounter any issues during installation:

1. Clear application cache:
```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

2. If Composer shows memory limit errors:
```bash
COMPOSER_MEMORY_LIMIT=-1 composer install
```

## 📝 Additional Notes

- Make sure your PHP has all required extensions enabled
- Ensure proper file permissions are set
- For production deployment, configure your web server accordingly

## 🤝 Contributing

Please read our contributing guidelines before submitting pull requests.

## 📄 License

This project is licensed under the MIT License - see the LICENSE file for details
# bfa-website
