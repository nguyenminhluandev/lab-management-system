# Lab Management System

A web-based computer lab management system developed for university environments. The system provides centralized management of computer labs, equipment, users, schedules, and academic activities.

## Technologies

* Laravel
* PHP
* MySQL
* HTML
* CSS
* JavaScript

## Features

### User Management

* User account management
* Authentication and authorization
* Role and permission management

### Computer Lab Management

* Manage computer labs
* Manage computers and equipment
* Manage supplies and inventory

### Academic Management

* Manage subjects and semesters
* Manage schedules and lab sessions
* Track academic activities

### System Management

* Manage system configurations
* Support computer maintenance records

## My Responsibilities

* Developed and tested system features using Laravel and MySQL.
* Implemented user and role management functionalities.
* Verified and managed system data.
* Performed functional testing before project completion.
* Analyzed and fixed issues during development.

## System Architecture

```text
Users
   │
   ▼
Laravel Application
   │
   ▼
MySQL Database
```

## Installation

### Clone Repository

```bash
git clone https://github.com/your-username/lab-management-system.git
cd lab-management-system
```

### Install Dependencies

```bash
composer install
```

### Configure Environment

```bash
cp .env.example .env
```

Update database settings in `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=lab_management
DB_USERNAME=root
DB_PASSWORD=
```

### Generate Application Key

```bash
php artisan key:generate
```

### Database Setup

```bash
php artisan migrate
```

### Run Application

```bash
php artisan serve
```

Open:

```text
http://127.0.0.1:8000
```

## Learning Outcomes

Through this project, I gained practical experience in:

* Web application development with Laravel.
* Database design and management using MySQL.
* Authentication and authorization implementation.
* Software testing and debugging.
* System analysis and problem-solving.

## Author

Nguyen Minh Luan

Software Engineering Graduate
Saigon Technology University (STU)
