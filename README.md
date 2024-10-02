# Slim PHP REST API with React Frontend

This project is a simple REST API built with the **Slim PHP Framework** and a **React** frontend to display and manage data fetched from external APIs. The application demonstrates how to create a REST API, interact with a database, and provide a user interface for managing data using React and Material UI.

## Project Overview

The project consists of two main parts:

1. **REST API**: A RESTful API built with Slim PHP Framework to fetch, store, and manage data from `https://jsonplaceholder.typicode.com/` and store it in a local database.
2. **React Frontend**: A React frontend that displays posts fetched from the REST API. The admin can view the list of posts and delete them from the frontend.

### Features

- Fetches data from external API endpoints (`/posts` and `/users`).
- Stores data in a local MySQL database using PHP.
- Exposes API endpoints to retrieve and delete posts.
- React frontend displays the posts in a table with username, title, and body, and allows deleting posts.

## Technologies Used

### Backend

- **PHP**: Language for backend development.
- **Slim PHP Framework**: Used for building the REST API.
- **Illuminate Database (Eloquent ORM)**: For interacting with the database.
- **MySQL**: Database to store the data fetched from the external API.

### Frontend

- **React**: Frontend library for building user interfaces.
- **Axios**: For making HTTP requests to the backend API.
- **Material UI**: Used for the table and UI components.

![image](https://github.com/user-attachments/assets/2ad29892-b71e-4652-9e9b-15da340fe4aa)


