# PHP-Login-System

A **PHP login system** with session management, username popup, and secure logout.  
This project demonstrates user registration, login, and protected pages using PHP and MySQL, along with a modern glass UI design.

---

## Features

- User registration with **username, email, birthday, and password**  
- User login with **session-based authentication**  
- Protected home page accessible only after login  
- **Username popup** displayed for 3 seconds after login  
- **Logout button** that destroys the session  
- **No-cache headers** prevent back-button access after logout  
- Responsive and modern **glass UI styling**  

---

## Setup Instructions

1. Place the project folder in your local server directory (e.g., `C:\xampp\htdocs\login&register`).  
2. Create a MySQL database named `login_register`.  
3. Create a table `users`:

```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    birthday DATE NOT NULL,
    password VARCHAR(255) NOT NULL
);
