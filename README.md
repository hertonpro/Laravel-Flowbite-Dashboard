# Laravel Flowbite Starter Kit 🚀  

<div align="center">
  <img src="msedge_25xFG9kSQd.png" alt="Laravel Flowbite Logo" >
</div>


A **modern** and **easy-to-use** Laravel starter kit integrated with Flowbite UI components. Kickstart your projects effortlessly with pre-built authentication, role management, and a sleek dashboard. Ideal for developers who want a clean, responsive design without starting from scratch.

---

## 🌟 Features  
- 🔐 **Complete Authentication** (Login, Register, Reset Password)  
- 🎨 **Modern UI** with Flowbite and Tailwind CSS  
- 🌓 **Dark/Light Mode** support with synchronized theme management
- 👥 **Advanced Role and Permission Management** with automated permission generation
- 📱 **Responsive Design** for all devices  
- 🔔 **Notification System**  
- 📊 **Reactive Dashboard** with a modern look
- 🌍 **Multi-language Support** (English/French) with complete translation system
- 👤 **User Management CRUD** (Create, Read, Update, Delete users with role assignment)
- 📝 **Blog Management System** with rich text editor and image upload
- ⚙️ **Unified Settings Interface** (Profile, Password, Appearance in one page)
- 🤖 **Automated Permission System** for controller creation and synchronization
- 📸 **Advanced File Management** with image upload and storage linking
- ✨ **Rich Text Editor** (Quill.js) with formatting tools and inline image upload  

---

## 🛠️ Technologies Used  
- **Laravel** v10.x  
- **PHP** >= 8.1  
- **Tailwind CSS** v3.x  
- **Flowbite** v2.x  
- **Alpine.js** v3.x for reactive components
- **Quill.js** v2.x for rich text editing
- **Spatie Laravel Permission** for role-based access control
- **MySQL** v8.0 / **SQLite**  

---

## 🎯 Key Components Added

### 🌍 **Translation System**
- Complete bilingual support (English/French)
- JSON-based translation files
- Automatic language switching
- All interface elements translated

### 👥 **User Management**
- **CRUD Operations**: Create, edit, delete users
- **Role Assignment**: Assign multiple roles to users
- **Permission Control**: Fine-grained access control
- **Bulk Actions**: Manage multiple users at once

### 🛡️ **Advanced Permission System**
- **Automated Permission Generation**: Auto-create permissions for new controllers
- **Artisan Commands**: `php artisan make:admin-controller Blog --resource`
- **Permission Synchronization**: `php artisan permission:sync`
- **Role-based Access**: Protect routes and UI elements with permissions

### 📝 **Blog Management**
- **Rich Text Editor**: Quill.js with full formatting toolbar
- **Image Upload**: Direct image insertion in content
- **Status Management**: Draft, Published, Archived states
- **SEO Friendly**: Automatic slug generation with uniqueness
- **Featured Images**: Upload and manage blog cover images

### ⚙️ **Settings Management**
- **Unified Interface**: All settings in one page with navigation tabs
- **Profile Management**: Update user information
- **Password Change**: Secure password updates
- **Theme Settings**: Dark/light mode with persistence

### 🤖 **Automated Workflows**
- **Controller Creation**: `make:admin-controller` command with auto-permissions
- **Permission Sync**: Automatic permission detection and creation
- **Slug Generation**: Unique slug creation for blogs
- **File Storage**: Automatic storage linking and management  

---

## ⚙️ Prerequisites  
Make sure you have the following installed:  
- **PHP** >= 8.1  
- **Composer**  
- **Node.js** & **NPM**  
- **MySQL** or **SQLite**  

---

## 🚀 Installation  

### 1. Clone the Repository 
    git clone https://github.com/votre-nom/laravel-flowbite.git
    cd laravel-flowbite

### 2. Installer les dépendances:
    composer install
    npm install

### 3. Configurer l'environnement:
    cp .env.example .env
    php artisan key:generate

### 4. Configurer la base de données:

- Modifier le fichier .env avec vos informations de base de données
- Pour SQLite:
  
      touch database/database.sqlite

### 5. Migrer et peupler la base de données:
```bash
php artisan migrate --seed
```

### 6. Créer le lien symbolique pour le stockage:
```bash
php artisan storage:link
```

### 7. Compiler les assets:
```bash
npm run dev
```

### 8. (Optionnel) Synchroniser les permissions:
```bash
php artisan permission:sync
```

### 9. Démarrer le serveur:
### 9. Démarrer le serveur:
```bash
php artisan serve
```

### 10. Accéder à l'application:
- **URL**: http://localhost:8000
- **Identifiants par défaut**:
  - Super Admin: superadmin@example.com / password123
  - Admin: admin@example.com / password123

---

## 🎮 Usage Guide

### 📊 **Dashboard Access**
Navigate to the admin dashboard to access all management features:
- **Users Management**: Create, edit, and manage user accounts
- **Blog Management**: Create and publish blog posts with rich content
- **Permission Management**: Assign roles and manage permissions
- **Settings**: Configure profile, password, and appearance

### ✍️ **Creating Blog Posts**
1. Go to **Blogs** → **New Blog**
2. Use the rich text editor with formatting tools
3. Upload images directly into content
4. Set featured image and publication status
5. Choose publication date (optional)

### 👥 **Managing Users**
1. Access **Users** section
2. Create new users with role assignment
3. Edit existing user information and roles
4. Delete users with confirmation

### 🛡️ **Permission System**
1. Use **Permissions** tab to manage roles
2. Assign users to roles in **User Roles** tab
3. Permissions are auto-generated for new controllers

### 🎨 **Customization**
- **Theme**: Switch between dark/light mode in Settings
- **Language**: Change language in the top navigation
- **Profile**: Update personal information in Settings

---

## 🔧 Custom Artisan Commands

### Create Admin Controller with Permissions
```bash
php artisan make:admin-controller ModelName --resource
```
This command:
- Creates a resource controller in `App\Http\Controllers\Admin`
- Generates corresponding permissions (view, create, edit, delete)
- Assigns permissions to admin and super-admin roles

### Synchronize Permissions
```bash
php artisan permission:sync
```
Scans all admin controllers and creates missing permissions.

### Show Current Permissions
```bash
php artisan permission:show
```
Displays all permissions and role assignments.

---

## 📁 Project Structure

```
app/
├── Console/Commands/          # Custom Artisan commands
│   ├── MakeAdminController.php
│   └── SyncPermissions.php
├── Http/Controllers/Admin/    # Admin controllers
│   ├── BlogController.php
│   ├── UserController.php
│   ├── PermissionController.php
│   └── SettingController.php
└── Models/
    ├── Blog.php
    └── User.php

resources/
├── views/admin/               # Admin interface views
│   ├── blogs/                 # Blog management
│   ├── users/                 # User management
│   ├── permissions/           # Permission management
│   └── settings/              # Settings interface
└── lang/                      # Translation files
    ├── en.json
    └── fr.json
```


