# Notes App

## 1. Overview

The Notes App is designed to manage your notes efficiently. It allows you to create, edit, delete, archive, and unarchive notes. You can view both active and archived notes.

## 2. Functionality

This app offers the following functionality:
- **Create, Edit, Delete Notes**: Manage your notes with full CRUD operations.
- **Archive / Unarchive Notes**: Organize your notes by archiving or unarchiving them.
- **List Active Notes**: View all your active (non-archived) notes.
- **List Archived Notes**: View all your archived notes.

## 3. Technologies

The app was developed using the following technologies and versions:
- **Laravel**: v11.x
- **Vue.js**: v3.x
- **PHP**: v8.2.x
- **Node.js**: v18.x
- **npm**: v9.x
- **MySQL**: v8.0.x

## 4. Considerations When Running the App

The project includes a `start.sh` cript to simplify the process of setting up and running the application. Here’s what you need to know:

1. **Environment Variables**: 
   - Before running the script, you must update the environment variables at the top of the `start.sh` file to reflect your local machine’s configuration. Ensure you adjust the values but not the variable names.

2. **Database Initialization**: 
   - On first use, the database will be empty. To test the app's functionality, you'll need to manually add some data through the interface.

3. **Running the Script**:
   - Execute `./start.sh` in your terminal from the project’s root directory.
