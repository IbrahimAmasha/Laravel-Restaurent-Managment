# Restaurant Reservation and Management System

## Overview

A Laravel-based system for managing restaurant reservations, viewing menus, placing orders online, and handling payments.

**Live Demo**: [restaurant.ibrahim-amasha.com](http://restaurant.ibrahim-amasha.com)

## Features

- **User Registration & Login**: Register and log in to access the system.
- **Table Reservation**: Make conflict-free table reservations for a specific time and suitable table size.
- **Menu Viewing**: View menu categories and items with descriptions and prices.
- **Online Ordering**: Place orders online, add items to a cart, and checkout.
- **Payment Options**: Pay online through payment gateways or choose cash on delivery.

## Installation

### Prerequisites

- PHP >= 7.4
- Composer
- MySQL or any other supported database
- Node.js & npm

### Steps

1. **Clone the repository**

    ```bash
    git clone https://github.com/yourusername/restaurant-management-system.git
    cd restaurant-management-system
    ```

2. **Install dependencies**

    ```bash
    composer install
    npm install
    npm run dev
    ```

3. **Environment configuration**

    Copy `.env.example` to `.env` and update the database credentials and other necessary configurations.

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4. **Database migration and seeding**

    ```bash
    php artisan migrate
    php artisan db:seed
    ```

5. **Run the application**

    ```bash
    php artisan serve
    ```

    The application should now be running at `http://localhost:8000`.

## Usage

1. **Register** a new user account.
2. **Log in** with your credentials.
3. **Make a Reservation**: Choose a date, time, and table size.
4. **View Menu**: Browse categories and items with details.
5. **Order Online**: Add items to the cart, review, and checkout.
6. **Choose Payment**: Pay online or opt for cash on delivery.

## Contributing

Contributions are welcome! Please follow these steps:

1. Fork the repository.
2. Create a new branch: `git checkout -b feature/your-feature`.
3. Commit your changes: `git commit -m 'Add some feature'`.
4. Push to the branch: `git push origin feature/your-feature`.
5. Open a pull request.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

## Contact

- Your Name
- [your.email@example.com](mailto:your.email@example.com)
