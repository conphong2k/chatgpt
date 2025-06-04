# VocabCart

VocabCart is a very small sample project showing the structure for a vocabulary flashcard web application. The code here is only a stub but it outlines how a basic PHP and MySQL setup might look.

## Goals
- Allow users to register and log in
- Let users create vocabulary sets
- Provide an API to add or retrieve words

## Requirements
- PHP 7 or newer
- A web server such as Apache or Nginx
- MySQL or MariaDB database
- A web browser

No external PHP libraries are used in this sample.

## Setup
1. Place the project folder inside your web server's document root.
2. Visit `http://localhost/install.php` in your browser.
3. Follow the on‑screen instructions. The installer creates the necessary tables using `database/schema.sql`.
4. Update `includes/config.php` with your database connection details if needed.

## Basic usage
- **Login/Registration**: Access `register.php` to create an account and `login.php` to sign in.
- **Creating sets**: After logging in, go to `dashboard/index.php` where future pages could allow set creation.
- **API**: Use `api/add_word.php` to add a word and `api/get_words.php` to fetch saved words. These endpoints are simple placeholders for demonstration.

## Database configuration
Edit `includes/config.php` with your database host, name, username and password. Then run `install.php` once to initialize the schema.

