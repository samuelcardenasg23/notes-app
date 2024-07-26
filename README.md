# Notes App

## 1. Overview

The Notes App is designed to manage your notes efficiently. It allows you to create, edit, delete, archive, and unarchive notes. You can view both active and archived notes. You can also categorize your notes and filter them by categories.

## 2. Functionality

This app offers the following functionality:
- **Create, Edit, Delete Notes**: Manage your notes with full CRUD operations.
- **Archive / Unarchive Notes**: Organize your notes by archiving or unarchiving them.
- **Categorize Notes**: Assign categories to your notes for better organization.
- **Filter Notes by Category**: Easily find notes by filtering them based on categories.
- **List Active Notes**: View all your active (non-archived) notes.
- **List Archived Notes**: View all your archived notes.
- **Pagination**: Navigate through notes with pagination.
- **User Authentication**: Register, log in, and log out.

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

## 5. API Endpoints

The app provides the following API endpoints:

### Authentication
- **POST /api/register**: Register a new user.
- **POST /api/login**: Log in an existing user.
- **POST /api/logout**: Log out the current user (requires authentication).

### Notes
- **GET /api/notes**: Retrieve a paginated list of notes.
- **POST /api/notes**: Create a new note.
- **GET /api/notes/{id}**: Retrieve a single note by ID.
- **PUT /api/notes/{id}**: Update a note by ID.
- **DELETE /api/notes/{id}**: Delete a note by ID.
- **PUT /api/notes/{id}/archive**: Archive a note by ID.
- **PUT /api/notes/{id}/unarchive**: Unarchive a note by ID

### Categories
- **GET /api/categories**: Retrieve a list of all categories.
- **POST /api/categories**: Create a new category.
- **DELETE /api/categories/{id}**: Delete a category by ID.


## 6. Frontend Implementation

The frontend is developed using Vue.js and offers the following features:
- **Category Filtering**: Filter notes by selecting a category from a dropdown menu.
- **Pagination**: Navigate through pages of notes using pagination controls.
- **CRUD Operations**: Create, edit, delete, and archive/unarchive notes through the interface.

Please note that user authentication is implemented in the API but is not fully integrated into the frontend
