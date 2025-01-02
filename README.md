# CTF Game

Welcome to the **flagnexus** repository! This project is a Capture The Flag (CTF) game designed to challenge users with a series of security-related questions. The game is built using PHP and MySQL, featuring a user registration and login system, a dynamic question/answer mechanism, and a leaderboard to showcase the top players.

## Table of Contents

1. [Introduction](#introduction)
2. [Features](#features)
3. [Technologies Used](#technologies-used)
4. [Getting Started](#getting-started)
5. [Usage](#usage)
6. [Admin Panel](#admin-panel)
7. [Contributing](#contributing)
8. [License](#license)

## Introduction

This CTF Game allows users to register, log in, answer security questions, and compete for the top spots on the leaderboard. Administrators can manage questions and monitor user performance via the admin panel. The game is developed using **PHP** for server-side logic and **MySQL** for data storage.

## Features

- **User Registration & Login**: Users can create an account, log in, and track their progress.
- **Answer Questions**: Registered users can answer a series of security-related questions.
- **Leaderboard**: Users can view the leaderboard to see their ranking and compare with others.
- **Admin Panel**: Admins can manage questions, view the leaderboard, and monitor user activity.
- **Dynamic Content**: The questions and answers are dynamically stored in the database, allowing easy updates and additions by the admin.

## Technologies Used

- **PHP**: For server-side scripting and game logic.
- **MySQL**: For database management (questions, user data, and leaderboard).
- **HTML/CSS**: For frontend structure and styling.
- **JavaScript**: For interactive elements (optional, depending on your implementation).

## Getting Started

To get started with the CTF Game on your local machine:

1. **Clone this repository**:
   ```bash
   git clone https://github.com/Ntanmay10/flagnexus.git

    Set up a local server: This project requires a PHP server. You can use XAMPP, WAMP, or any other local PHP server environment.

    Import the database:
        Create a new MySQL database.
        Import the database schema provided in database/schema.sql (or adjust based on your structure).

    Start the server: Once the database is set up, and the PHP server is running, access the game by visiting http://localhost/flagnexus.

Usage

    Register: Users can sign up with their email and password.
    Login: After registration, users can log in with their credentials.
    Answer Questions: Once logged in, users can start answering questions from a predefined set. Each correct answer moves them up the leaderboard.
    View Leaderboard: Users can check the leaderboard to see their current ranking among other players.

Admin Panel

The Admin Panel allows administrators to manage the game:

    Add/Remove Questions: Admins can add new questions and answers, or remove existing ones.
    Leaderboard Management: Admins can view the current leaderboard and user performance.
    User Monitoring: Admins can view user activity, including login attempts and submitted answers.

To access the Admin Panel, simply log in with an admin account, and navigate to the admin section.

# Contributing

Contributions are welcome! If you would like to contribute to the project, please follow these steps:

    Fork the repository.
    Create a new branch (git checkout -b feature/your-feature-name).
    Make your changes and commit them (git commit -am 'Add new feature').
    Push to your branch (git push origin feature/your-feature-name).
    Create a pull request to the main repository.

Please make sure to follow the code style and document your changes properly.

Enjoy solving the challenges, and good luck climbing to the top of the leaderboard!
