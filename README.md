# To-Do-List-Project--Using-PHP-and-MySQLi
This is Project - To Do List, Using PHP and MySQLi.

This repository contains PHP, Javascript, css scripts demonstrating various database operations using MySQL.

## Description

This project, offers a user-friendly solution for managing notes efficiently. Built with PHP, MySQL, Bootstrap, Javascript, it enables users to create, edit, and delete notes seamlessly. The interface is intuitive, making it easy to navigate and organize notes effectively.

The repository includes PHP scripts for connecting to a MySQL database, inserting data into a table, and deleting data from a table. Each script demonstrates a specific database operation and provides clear examples of how to implement it using PHP.

## Features
 1. User-friendly Interface: Intuitive interface for easy note management.
 2. Add, Edit, and Delete Notes: Perform CRUD operations on notes effortlessly.
 3. Secure Login: Ensure data security with a secure login system.
 4. Responsive Design: Accessible from various devices with responsive design.
 5. Bootstrap Integration: Utilizes Bootstrap framework for modern UI design.
 6. DataTable Integration: Enhances data presentation and management with DataTables.
 7. Custom Styling: Customize the look and feel with custom CSS styles.

## Technologies Used
 1. PHP: Server-side scripting language for dynamic web page generation.
 2. MySQL: Relational database management system for storing and managing notes data.
 3. Bootstrap: Front-end framework for responsive web development.
 4. Javascript : For provide a logic to perform a task.
    
## Requirements

To run the PHP scripts in this repository, you need the following software installed on your system:

- PHP: The PHP scripting language interpreter.
- MySQL: The MySQL database server(phpMyAdmin).
- Web Server: A web server environment like Apache to serve the PHP files.
- Web Browser: To interact with the PHP scripts via HTTP requests.

## How to use?

1. Clone the repository to your local machine:
   ```bash
   https://github.com/Nikul-Parmar-19/To-Do-List-Project--Using-PHP-and-MySQLi.git
2. Open XAMPP -> start Apache and MySQL.
3. After creating a clone, open a phpmyadmin in your browser. write -> localhost/phpmyadmin
4. In phpmyadmin, create a database name "dbtodo".
5. In "dbtodo" database, create a 2 table names "users" and "notes".
6. In "users" table, create a 2 columns - i.login(VARCHAR, length-11), ii.password(INT, length=11).
7. In "notes" table, create a 4 colmuns - i.sno(INT, length=11, primary), ii.title(VARCHAR, length=11), iii.description(VARCHAR, length=11), iv.tstamp(TIMESTAMP).
8. Now Open your Browser and write > localhost/To-Do-List-Project--Using-PHP-and-MySQLi/login.php
9. Add a login id and password, which you have inserted in your database.
10. Now you can access a all notes, you can add, update(edit), delete, and can see a all notes in table formate.
11. At last of page you can logout to a page, and it will redirect you to logout page.


Now, enjoy the project.



