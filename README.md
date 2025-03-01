# Laravel Flowbite Dashboard

<div align="center">
  <img src="msedge_25xFG9kSQd.png" alt="Laravel Flowbite Logo" >
</div>

A modern and easy-to-use Laravel starter kit with Flowbite UI components. Get started quickly with pre-built authentication, role management, and a beautiful dashboard interface. Perfect for developers looking to jumpstart their Laravel projects with a clean, responsive design.

## Features

-   🔐 Complete Authentication (Login, Register, Reset Password)
-   🎨 Modern UI with Flowbite and Tailwind CSS
-   🌓 Dark/Light Mode
-   👥 Role and Permission Management
-   📱 Responsive Design
-   🔔 Notification System
-   📊 Modern and reactive dashboard

## Technologies Used

-   **Laravel** v10.x
-   **PHP** >= 8.1
-   **Tailwind CSS** v3.x
-   **Flowbite** v2.x
-   **Alpine.js** v3.x
-   **MySQL** v8.0 / SQLite

## Prerequisites

-   PHP >= 8.1
-   Composer
-   Node.js & NPM
-   MySQL or SQLite

## Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/votre-nom/laravel-flowbite.git
    cd laravel-flowbite
    ```

2. Installer les dépendances:

    ```bash
    composer install
    npm install
    ```

3. Configurer l'environnement:

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4. Configurer la base de données:

    - Modifier le fichier .env avec vos informations de base de données
    - Pour SQLite:
        ```bash
        touch database/database.sqlite
        ```

5. Migrer et peupler la base de données:

    ```bash
    php artisan migrate --seed
    ```

6. Compiler les assets:

    ```bash
    npm run dev
    ```

7. Démarrer le serveur:

    ```bash
    php artisan serve
    ```

8. Accéder à l'application:
    - URL: http://localhost:8000
    - Identifiants par défaut:
        - Super Admin: superadmin@example.com / password123
        - Admin: admin@example.com / password123
