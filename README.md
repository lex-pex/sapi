# API RBAC (Role Based Access Control) System

This project provides a simple Role-Based Access Control (RBAC) system using Symfony, built as an API with the following features:

## Features:
- **Role Management**: Create, list, update, and delete roles.
- **Custom Actions**:
  - **Activate Role**: PUT '/api/roles/{id}/activate' to activate a role.
  - **Deactivate Role**: PUT '/api/roles/{id}/deactivate' to deactivate a role.
- **Pagination**: Paginate role collections with configurable items per page.
- **Sorting**: Sort roles by name or other properties.
- **Doctrine ORM Filters**: Added filtering support for entity properties.
- **Data Seeding**: Seed roles with fake data using Doctrine Fixtures and Faker.

## Installation

### 1. Clone the repository:
~ bash 
git clone https://github.com/lex-pex/sapi.git

### 2. Clone the repository:
~ bash 
composer install 

### 3. Setup the database:
~ bash 
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate

### 4. Seed fake data (optional):
~ bash 
php bin/console doctrine:fixtures:load

### 5. Run the server:
~ bash 
symfony server:start

## API Endpoints

### List Roles: GET /api/roles
### View Role: GET /api/roles/{id}
### Create Role: POST /api/roles
### Update Role: PUT /api/roles/{id}
### Delete Role: DELETE /api/roles/{id}

## Custom Endpoints:

### Activate Role: PUT /api/roles/{id}/activate
### Deactivate Role: PUT /api/roles/{id}/deactivate

## Configuration

### Pagination is enabled and can be customized in config/packages/api_platform.yaml.
### Sorting can be applied via URL query parameters, e.g., /api/roles?order[name]=asc.











