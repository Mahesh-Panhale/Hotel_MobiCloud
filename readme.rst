🏨 Hotel Mobicloud

Role-Based Hotel Staff & Task Management System

Hotel Mobicloud is a role-based hotel staff management system developed using CodeIgniter 3.
The system helps hotel administrators manage staff and assign daily operational tasks, while staff members can view and update only their assigned tasks.
It follows proper MVC architecture, secure authentication, and role-based access control.

🚀 Features
🔐 Authentication & Security

Secure login system using hashed passwords

Session-based authentication

Role-based access control (Admin / Staff)

Unauthorized URL access prevention

Logout functionality

👨‍💼 Admin Module

Admin dashboard with task & staff statistics

Add, update, activate/deactivate staff

Assign tasks to staff with:

Task title

Description

Deadline

Status (Pending / Completed)

View:

All tasks

Pending tasks

Completed tasks

👷 Staff Module

Staff dashboard

View only assigned tasks

Update task status (Pending / Completed)

Add optional task update notes

Restricted from admin-only pages

🧾 Task Management

Task assignment by admin

Task filtering by status

Separate views for pending and completed tasks

📱 UI & UX

Responsive design (Mobile & Desktop)

Clean Bootstrap-based UI

User-friendly dashboards

🛠 Technology Stack
Layer	Technology
Backend	: PHP (CodeIgniter 3)
Database :	MySQL
Frontend : HTML, CSS, Bootstrap, JavaScript
Authentication :	PHP Password Hashing
Version Control	Git & GitHub
Hosting	Localhost / Shared Hosting
⚙️ How to Run the Project (Localhost)
1️⃣  Move Project to XAMPP htdocs
xampp/htdocs/hospital_staff_system


2️⃣Start XAMPP

Start Apache

Start MySQL

3️⃣ Create Database

Open phpMyAdmin

Create database:

hotel_mobicloud

4️⃣ Import SQL File

Import the provided SQL file from:

/database/hotel_mobicloud.sql

5️⃣ Configure Database

Edit file:

application/config/database.php


Update:

'hostname' => 'localhost',
'username' => 'root',
'password' => '',
'database' => 'hotel_mobicloud',

6️⃣ Run the Project

Open browser:

http://localhost/hospital_staff_system/


🗄 Database Structure
************
users table:

id

name

email

mobile

department

role

password

status

created_at

************ 
tasks table:

id

staff_id

task_title

task_description

deadline

status

update_note

created_at

🔑 Demo Login Credentials
🔹 Admin
Email: admin@hotel.com
Password: password

🔹 Cleaning Staff
Email: cleaning@hotel.com
Password: password

🔹 Kitchen Staff
Email: kitchen@hotel.com
Password: password

🔹 Security Staff
Email: security@hotel.com
Password: password

🌐 Live Demo

🔗 Live Link: https://mahifreelancehub.in/hospital_staff_system


📁 Project Folder Structure
hospital_staff_system/
│
├── application/
│   ├── controllers/
│   ├── models/
│   ├── views/
│
├── assets/
│   ├── css/
│   ├── js/
│   └── images/
│
├── database/
│   └── hotel_mobicloud.sql
│
├── system/
├── index.php
└── README.md

⭐ Bonus Features Implemented

Responsive design

Role-based dashboards

Task filtering (Pending / Completed)

Clean MVC architecture

Secure password handling

👨‍💻 Author

Mahesh Panhale
Web Developer | PHP | CodeIgniter | Frontend Developer

🔗 GitHub:
https://github.com/Mahesh-Panhale

