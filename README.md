# Symfony PrestaShop Product Manager

## Description
Symfony 5.4 application designed to manage PrestaShop products by sharing a database and leveraging the DTO design pattern for data manipulation.

## Prerequisites
- PHP >= 8.0
- Composer
- MySQL
- PHP extensions: `pdo`, `ctype`, `iconv`

## Installation
1. Clone the repository:
   ```bash
   git clone <repository-url>
   cd <repository-name>
   ```

2. Install dependencies:
   ```bash
   composer install
   ```

3. Configure the database in the `.env` file:
   ```
   DATABASE_URL="mysql://user:password@127.0.0.1:3306/database_name"
   ```

4. Start the Symfony server:
   ```bash
   symfony server:start
   ```

## Features
- Retrieve all PrestaShop products.
- Retrieve a specific product by its ID.
- Update a product's reference.

## Main Structure
- **Entity**: `PSProductDTO` to represent products.
- **Repository**: `PSProductDTORepository` for CRUD operations.
- **Controller**: `IndexController` to handle routes and business logic.

## Usage
Access the application via the following URL after starting the server:
```
http://127.0.0.1:8000/index
```

## License
Project under proprietary license.
