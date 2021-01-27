# Camagru
### A simple clone of Instagram

## Setup
### This is for setting the project to run on Arch Linux Manjaro using Xampp
- Install Xampp
    ```
    sudo pacman -S xampp
    ```
- Set up a database user and initialize the database
    [Mysql Arch Wiki](https://wiki.archlinux.org/index.php/PHP#MySQL/MariaDB)

- Clone the project into the /opt/lamp/htdocs directory
    ```
    su
    cd /opt/lamp/htdocs
    git clone https://github.com/tcajee/camagru.git
    ```
- Start the Xampp servers

- To initialize the Database tables navigate to [Database Setup](https://localhost/camagru/config/setup.php)

- Navigate to [PHP Myadmin](https://localhost/phpmyadmin/) to verify that the database has been populated

- Finally, navigate to [Camagru Home](https://localhost/camagru/) to start using the site.