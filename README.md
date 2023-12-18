# tminus50

A Utility tool box for Image and File Manipulation

## Overview

This application allows users to upload images and apply various processing methods, such as background removal and black-and-white conversion. The goal is to provide users with a seamless image processing experience while using Laravel Sanctum for secure API authentication.

## Features

-   **User Authentication:**

    -   Users can register, log in, and manage their accounts using Laravel Sanctum for API token authentication.

-   **Image Upload:**

    -   Users can upload images for processing.

-   **Image Processing:**

    -   Various processing methods are available, including background removal and black-and-white conversion.

-   **Conversion History:**

    -   Users can view their past image processing conversions.

-   **Feedback Mechanism:**

    -   Real-time notifications provide feedback on the progress and completion of image processing tasks.

-   **User Preferences:**
    -   Users can customize preferences for image processing methods.

## API Routes

### Authentication Routes with Sanctum

-   `POST /register`: Handle user registration.
-   `POST /login`: Handle user login.
-   `POST /logout`: Handle user logout using Laravel Sanctum for token authentication.

### Image Processing Routes

-   `GET /dashboard`: Display user dashboard. Requires authentication with Laravel Sanctum.
-   `POST /upload`: Handle image upload. Requires authentication with Laravel Sanctum.
-   `POST /process`: Handle image processing. Requires authentication with Laravel Sanctum and custom token middleware.
-   `GET /history`: Display conversion history. Requires authentication with Laravel Sanctum and custom token middleware.
-   `GET /preferences`: Show user preferences. Requires authentication with Laravel Sanctum.
-   `POST /preferences`: Update user preferences. Requires authentication with Laravel Sanctum.

## Database Design

### User Table

-   User ID
-   Username
-   Email
-   Password
-   Token
-   Role

### Conversion History Table

-   Conversion ID
-   User ID (foreign key)
-   Timestamp
-   Conversion Type
-   Conversion Count

### Token Table (if needed)

-   Token ID
-   User ID (foreign key)
-   Token Value
-   Expiry Timestamp

## Technologies and Libraries

-   **Laravel Sanctum:** For API token authentication.
-   **Intervention Image Library:** For image processing in Laravel.

## Compatibility

-   **Supported Image Formats:**
    -   JPEG, PNG, GIF, etc.
-   **Browser Compatibility:**
    -   Chrome, Firefox, Safari, Edge.
-   **Device Compatibility:**
    -   Desktop and mobile devices.

## Getting Started

1. Clone the repository.
2. Install dependencies: `composer install`.
3. Set up your environment variables.
4. Run migrations: `php artisan migrate`.
5. Start the development server: `php artisan serve`.

## Create DB

`CREATE DATABASE "your_db_name";`

Ensure that you end the command with a semicolon and try running it again. After that, you can proceed with creating a user and granting privileges as needed. For example:

`CREATE USER youruser WITH ENCRYPTED PASSWORD 'yourpassword';`

`ALTER ROLE youruser SET client_encoding TO 'utf8';`

`ALTER ROLE youruser SET default_transaction_isolation TO 'read committed';`

`ALTER ROLE youruser SET timezone TO 'UTC';`

`GRANT ALL PRIVILEGES ON DATABASE your_db_name TO youruser;`

## Contributors

-   [Ibukun Alesinloye](https://highb33kay.me)

## License

This project is licensed under the [License Name] License - see the [LICENSE](LICENSE) file for details.
