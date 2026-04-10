# EcoRise-Web-Application
EcoRise is a web-based application that promotes environmental awareness and sustainable practices. It supports multiple user roles (admin, organizer, student) with features like authentication, role-based access, and activity management for efficient interaction and data handling.

# 🌱 EcoRise APU

## 📌 Project Overview

EcoRise is a web-based system developed for the Rapid Web Development (RWDD) module at Asia Pacific University (APU).
The platform is designed to promote environmental awareness and provide a structured system for different user roles including students, organizers, and administrators.

---

## 🎯 Objectives

* Promote eco-friendly awareness and activities
* Provide a multi-role system (Admin, Organizer, Student)
* Apply full-stack web development concepts
* Build a structured and maintainable web application

---

## 👥 User Roles

* **Admin** – Manage users and system data
* **Organizer** – Manage events or activities
* **Student** – Participate and interact with the system

---

## 🚀 Features

* 🔐 Authentication System (Login / Signup / Logout)
* 👤 Role-based Access Control
* 📊 Separate Dashboards for each user role
* 🛠️ Admin Management Panel
* 📁 Organized modular structure
* 🔄 CRUD Operations (Create, Read, Update, Delete)

---

## 🛠️ Technologies Used

* **Frontend:** HTML, CSS, JavaScript
* **Backend:** PHP
* **Database:** MySQL
* **Environment:** XAMPP

---

## 📁 Project Structure

```
ecorise-apu/
│── .git/              # Git repository files
│── admin/             # Admin panel
│── assets/            # CSS, JS, images
│── landing/           # Landing / homepage
│── login/             # Login system
│── organizer/         # Organizer module
│── signup/            # Registration system
│── student/           # Student module
│── auth.php           # Authentication logic
│── conn.php           # Database connection
│── logout.php         # Logout functionality
```

---

## ▶️ Installation & Setup

1. Clone or download this repository

2. Move the folder into:

   ```
   C:\xampp\htdocs\
   ```

3. Open **XAMPP** and start:

   * Apache
   * MySQL

4. Open **phpMyAdmin**

   * Create a database
   * Import the provided `.sql` file

5. Run the project in browser:

   ```
   http://localhost/ecorise-apu
   ```

---

## 🔐 Authentication Flow

* Users register via the **signup module**
* Login credentials are validated in `auth.php`
* Sessions are used to manage user access
* Logout handled via `logout.php`

---

## 📚 Learning Outcomes

* Implementation of role-based systems
* Understanding PHP session management
* Database integration using MySQL
* Structuring a scalable web project
* Hands-on experience with CRUD operations

---

## ⚠️ Disclaimer

This project is developed for academic purposes only as part of the RWDD module at APU.

---

## 👨‍💻 Author

* **Your Name**
* Asia Pacific University (APU)

---
