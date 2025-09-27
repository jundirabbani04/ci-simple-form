# Table of Contents
- [Aplikasi Pendaftaran Biodata (Biodata Submission App)](#aplikasi-pendaftaran-biodata-biodata-submission-app)
- [Features ✨](#features-✨)
- [Requirements 🛠️](#requirements-🛠️)
- [How to Install and Run 🚀](#how-to-install-and-run-🚀)
  - [1. Get the Code](#1-get-the-code)
  - [2. Install Dependencies](#2-install-dependencies)
  - [3. Configure the Environment](#3-configure-the-environment)
  - [4. Run the Database Migration](#4-run-the-database-migration)
  - [5. Start the Server](#5-start-the-server)

# Aplikasi Pendaftaran Biodata (Biodata Submission App)
A simple web application built with CodeIgniter 4 for submitting personal biodata. The data is saved to a MySQL database and can be viewed in a protected admin area.

# Features ✨

📝 Comprehensive Biodata Form: Multi-section form for personal data, address, contact info, and work details.

🔒 Server-Side Validation: Ensures data integrity before saving to the database.

🖼️ Photo Upload: Allows users to upload a profile photo (optional).

💾 MySQL Database Storage: All submissions are stored in a database.

🔐 Protected Submissions Page: A simple, session-based login protects the page where all submissions can be viewed.

📱 Responsive Design: A clean layout with a collapsible sidebar that works on desktop and mobile devices.

# Requirements 🛠️
Before you begin, ensure you have the following installed on your machine:

- PHP 8.1 or newer
- Composer 2.x
- A local server environment (e.g., XAMPP, Laragon, MAMP)
- MySQL or MariaDB
- The php-mysqli extension enabled in your php.ini file.

# How to Install and Run 🚀
Follow these steps to get the application running on your local machine.

## 1. Get the Code
Clone the repository or copy the project folder to your local machine.

### If using Git
`git clone https://github.com/jundirabbani04/ci-simple-form.git`

## Navigate into the new directory
`cd ci-simple-form`

## 2. Install Dependencies
Run Composer to install the CodeIgniter framework and other dependencies.
```composer install```

## 3. Configure the Environment
You need to set up your environment file, which contains the database credentials and other settings.

First, create a .env file by copying the example file.

### On Windows
`copy .env.example .env`

### On Mac/Linux
`cp .env.example .env`

### Next step
- Create a new, empty database using a tool like phpMyAdmin (e.g., name it biodata_app).
- Finally, open the .env file and update the following sections:
- Set your application environment to 'development': `CI_ENVIRONMENT = development`
- Update with your local database credentials
```
database.default.hostname = localhost
database.default.database = biodata_app
database.default.username = root
database.default.password = 
database.default.DBDriver = MySQLi
```
## 4. Run the Database Migration
This command will automatically create the necessary biodata table in the database you just configured.

`php spark migrate`

## 5. Start the Server
You're all set! Start the CodeIgniter development server.

`php spark serve`

The application will now be running at `http://localhost:8080`.

Admin Credentials 🔑
To view the submitted data, navigate to the submissions page and log in with the following hardcoded credentials.

URL: `http://localhost:8080/submissions`

Username: `admin`

Password: `password`
