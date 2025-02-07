# User Login & Task Management System

##  Overview
This is a simple web-based **User Login & Task Management System** built with PHP, MySQL, HTML, CSS, and JavaScript.

## Features
✅ User Registration & Login (with password encryption)  
✅ Task Management (Users can add, update, delete tasks)  
✅ User Roles (Admin can see all tasks, users manage their own)  
✅ Security Features (Password hashing, SQL injection prevention)  

## 📂 Folder Structure
/project-root
│── /config
│   │── config.php          ✅ Database connection settings
│   │── session_check.php   ✅ Checks if user is logged in
│   │── admin_check.php     ✅ Restricts access to admin pages
│
│── /auth
│   │── login.php          ✅ User login
│   │── register.php       ✅ User registration
│   │── logout.php         ✅ Logout
│
│── /dashboard
│   │── dashboard.php      ✅ User dashboard
│   │── tasks.php          ✅ User task management page
│
│── /tasks
│   │── add_task.php       ✅ Adds a new task
│   │── delete_task.php    ✅ Deletes a task
│   │── update_task.php    ✅ Updates task status
│
│── /includes
│   │── header.php         ✅ Navbar & header
│   │── footer.php         ✅ Footer
│
│── /css
│   │── styles.css         ✅ Main stylesheet
│
│── index.php             ✅ Homepage or redirection to login
│── README.md             ✅ Documentation
