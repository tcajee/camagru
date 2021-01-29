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
