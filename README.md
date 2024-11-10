<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Laravel Chatbot Application

This is a Laravel-based chatbot application that assists expectant mothers with common pregnancy-related queries. The application uses a chatbot to provide answers to questions about health, diet, symptoms, and more, aimed at guiding users through their pregnancy journey.

## Features

- **Pregnancy-related queries**: The chatbot can answer common pregnancy questions like "How to stay healthy during pregnancy?", "What are common pregnancy symptoms?", and "What should I eat during pregnancy?"
- **CSRF Protection**: CSRF token is used to ensure secure communication.
- **Customizable Responses**: Easily extendable chatbot logic for adding more questions and answers.
- **User Interface**: Simple and interactive chat interface.

## Prerequisites

Before setting up the project, ensure that you have the following installed on your system:

- **PHP**: 7.4 or higher
- **Composer**: For dependency management
- **Laravel**: The PHP framework used to build this app
- **MySQL**: Or any other database supported by Laravel
- **Git**: For version control

## Getting Started

### 1. Clone the Repository

Start by cloning this repository to your local machine using the following command:

```bash
git clone https://github.com/Bhumi2004/Lavarel-Chatbot.git
cd Lavarel-Chatbot
```

### 2. Install Dependencies

Next, you need to install the required dependencies via Composer. Run the following command:

```bash
composer install
```

This will install all the Laravel dependencies specified in the `composer.json` file.

### 3. Set Up Environment Variables

Rename the `.env.example` file to `.env` by running:

```bash
mv .env.example .env
```

### 4. Set Up Vultr API Key

Instead of generating a Laravel application key, you will need to set up your Vultr API key to interact with Vultr services. Follow these steps:

- Log in to your [Vultr account](https://www.vultr.com/).
- Go to the **Profile** section, then navigate to **API**.
- Click **Generate API Key** to create a new API key.
- Copy the API key generated.

Now, open the `.env` file and add your Vultr API key:

```env
VULTR_API_KEY=your_vultr_api_key_here
```

Replace `your_vultr_api_key_here` with the actual API key you copied from your Vultr account.

### 5. Run Migrations

If your application requires a database (it does for this one, as we may store chat logs), run the migrations:

```bash
php artisan migrate
```

This will create the necessary tables in the database.

### 6. Start the Development Server

To run the Laravel development server, use the following Artisan command:

```bash
php artisan serve
```

The application will be available at `http://localhost:8000`.

### 7. Test the Application

Open a web browser and navigate to `http://localhost:8000`. You should see the chatbot interface where you can start interacting with the chatbot.

---

## Running Tests

To run the tests associated with the application, use the following command:

```bash
php artisan test
```

This will execute the unit and feature tests for your application.

---

## File Structure

Here’s a quick overview of the key files and directories in the project:

- **app/Http/Controllers/ChatbotController.php**: Handles the chatbot's logic and responses to user input.
- **app/Services/VultrService.php**: Contains the logic for interacting with the Vultr service (you can modify this for other integrations).
- **resources/views/chatbot/index.blade.php**: The view file for the chatbot interface.
- **routes/web.php**: The routes for the web application.

---

## Contributing

If you'd like to contribute to this project, feel free to fork the repository and submit a pull request. Here are a few things you can do to improve the project:

- Add more pregnancy-related questions and answers to the chatbot.
- Enhance the user interface to make it more engaging.
- Write more unit tests for better coverage.

---

### Acknowledgements

- Laravel for providing an easy-to-use framework.
- Composer for dependency management.
- GitHub for hosting the project.

---

### Additional Notes

- To deploy the application to production, you can use services like **Vultr**, **Heroku**, or **DigitalOcean**.
- Ensure that your `.env` file is properly configured for production, including database settings and caching configurations.

---

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
