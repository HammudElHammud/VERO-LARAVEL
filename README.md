# Laravel Project

## Introduction

This Laravel project is configured to interact with the [BauBuddy API](https://api.baubuddy.de/index.php/). It demonstrates how to log in to the API and fetch tasks using the provided endpoint.

## Requirements

- PHP >= 8.0
- Composer
- Laravel >= 8.0

## Installation

1. Clone the repository:

    ```sh
    git clone https://github.com/your-repo/your-project.git
    cd your-project
    ```

2. Install dependencies:

    ```sh
    composer install
    ```

3. Copy the example environment file and set up your environment variables:

    ```sh
    cp .env.example .env
    ```

4. Update your `.env` file with the necessary configuration:

    ```env
    API_TASK=https://api.baubuddy.de/index.php/
    ```

5. Generate an application key:

    ```sh
    php artisan key:generate
    ```

## Configuration

The project requires the `API_TASK` environment variable to be set. This is already included in the example environment file (`.env.example`).


## Running the Application

 ```
 php artisan serve

 ```
