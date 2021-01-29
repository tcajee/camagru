# Camagru
Camagru is a small, Instagram-like website that allows users to take and share photo edits, written primarily in PHP.
This project was an introduction to the fundamentals of web development, PHP, and other basic web development technologies.

## Requirements
- PHP
- XAMPP
- JavaScript

## Instalation and Setup
NOTE: This is for setting the project to run on Arch Linux Manjaro using Xampp. Follow your OS specific instructions for other platforms.
- Install Xampp:
    ```
    sudo pacman -S xampp
    ```
- Set up a database user and initialize the database:
    [Mysql Arch Wiki](https://wiki.archlinux.org/index.php/PHP#MySQL/MariaDB)
- Clone the project into the /opt/lamp/htdocs directory
    ```
    git clone https://github.com/tcajee/camagru.git /opt/lamp/htdocs/camagru
    ```
- Start the Xampp servers via the included GUI.
- Initialize the Database tables by calling the setup script [Database Setup](https://localhost/camagru/config/setup.php)
- Navigate to [PHP Myadmin](https://localhost/phpmyadmin/) to verify that the database has been populated.
- After running the setup you will be redirected to [Camagru Home](https://localhost/camagru/)

## Tools & Technologies
#### Back-end:
- Apache:  An open source web server and the most widely used server worldwide for delivery of web content. Used to  serves the project on localhost for development.
- PHP: A general-purpose language suited for web development (requirement of the project).
#### Front-end:
- HTML: The standard markup language used to develop web Pages. It only defines the layout of the page contents. 
- CSS: Used to define the style of the website. It augments HTML and can be used to create semi-dynamic websites.
- JavaScript: A programming language that is often used alongside HTML and CSS to make dynamic websites. It is usually referred to as the language of the web because of its strong compatibility with web browsers and HTML.
#### Data Management System (DBMS):
- MariaDB: An open source SQL server used as the primary database driver along with the Structured Query Language we used for the project database queries.

#### Project structure:
```
Camagru/
├── app
│   ├── controllers
│   │   ├── Gallery.php
│   │   ├── Home.php 
│   │   ├── Login.php
│   │   ├── Logout.php
│   │   ├── Profile.php
│   │   ├── Register.php
│   │   ├── Settings.php
│   │   └── Upload.php
│   ├── lib
│   │   └── helpers
│   │       ├── functions.php
│   │       └── helpers.php
│   └── views
│       ├── gallery.php
│       ├── index.php
│       ├── layouts
│       │   ├── default.php
│       │   ├── footer.php
│       │   └── header.php
│       ├── login.php
│       ├── messages.php
│       ├── profile.php
│       ├── register.php
│       ├── settings.php
│       └── upload.php
├── config
│   ├── config.php
│   ├── database.php
│   ├── setup.php
│   └── tables.php
├── core
│   ├── Application.php -> Configures error logging and serves as a base class for the controller class.
│   ├── Controller.php -> Responsible for all Cookie related functionality.
│   ├── Cookie.php -> Responsible for sanitizing all user inputs before passing to validation.
│   ├── DB.php -> The primary database class, responsible for configuring a database instance and implementing all CRUD operations.
│   ├── Input.php -> Responsible for sanitizing all user inputs before passing to validation.
│   ├── Router.php -> Responsible for setting valid routes and implementing redirects between pages.
│   ├── Session.php -> Responsible for setting and querying user session information.
│   ├── Validate.php ->  Responsible for validating all user inputs such as passwords and email addresses.
│   └── View.php -> The base class for all page specific views, responsible for rendering the view, setting the content, and setting the layout.
├── css
│   └── custom.css
├── img (All images and stickers are stored here)
├── index.php
└── js
   ├── camera.js
   ├── gallery.js
   ├── index.js
   ├── login.js
   ├── profile.js
   ├── register.js
   ├── settings.js
   └── slide.js
```


