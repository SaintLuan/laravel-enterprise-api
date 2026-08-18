# Laravel Enterprise API

Enterprise REST API for managing customers, products, and orders. Built as a public portfolio project to demonstrate professional PHP/Laravel practices, API design, Docker-based development, Redis, testing, and CI/CD readiness.

## Objective

Deliver a clean, scalable Laravel API foundation with clear separation of concerns, versioned endpoints, authentication via Laravel Sanctum, and a local development environment fully containerized with Docker Compose.

## Stack

| Technology | Purpose |
|---|---|
| PHP 8.4+ | Runtime |
| Laravel 13 | Application framework |
| MySQL 8 | Primary database |
| Redis 7 | Cache, sessions, and queues |
| Laravel Sanctum | API authentication |
| Pest | Automated testing |
| Docker / Docker Compose | Local development environment |
| Nginx | HTTP reverse proxy |
| GitHub Actions | CI/CD (planned) |
| OpenAPI / Swagger | API documentation (planned) |

## Proposed Architecture

The project favors native Laravel features and introduces abstractions only when they solve a real problem.

```
HTTP Layer
  Controllers (thin)
  Form Requests
  API Resources

Application Layer
  Actions / Services
  DTOs

Domain Layer
  Models
  Domain-specific logic
  Events / Listeners
  Jobs

Infrastructure
  Repositories (when query complexity justifies them)
  MySQL / Redis / Queue workers
```

API versioning:

```
/api/v1/...
```

Initial domains (to be implemented in later stages):

- Customer
- Product
- Order
- OrderItem
- OrderStatusHistory

```
Customer
└── Orders
    ├── OrderItems
    │   └── Product
    └── OrderStatusHistory
```

## Requirements

- Docker and Docker Compose
- Git
- Optional: PHP 8.4+ and Composer (only if running outside Docker)

## Installation with Docker

1. Clone the repository:

```bash
git clone <repository-url> laravel-enterprise-api
cd laravel-enterprise-api
```

2. Create the environment file:

```bash
cp .env.example .env
```

3. Build and start the containers:

```bash
docker compose up -d --build
```

4. Install PHP dependencies (if `vendor` is missing):

```bash
docker compose exec app composer install
```

5. Generate the application key:

```bash
docker compose exec app php artisan key:generate
```

6. Run database migrations:

```bash
docker compose exec app php artisan migrate
```

The API will be available at:

```
http://localhost:8080
```

## How to Run

Start the stack:

```bash
docker compose up -d
```

Stop the stack:

```bash
docker compose down
```

Useful commands:

```bash
# Application shell
docker compose exec app bash

# List routes
docker compose exec app php artisan route:list

# Health check
curl http://localhost:8080/api/v1/health
```

Expected health response:

```json
{
  "status": "ok",
  "application": "Laravel Enterprise API"
}
```

## How to Run Tests

```bash
docker compose exec app php artisan test
```

Or directly with Pest:

```bash
docker compose exec app ./vendor/bin/pest
```

## Project Structure (Foundation)

```
app/
  Actions/
  DTOs/
  Domains/
    Customer/
    Order/
    Product/
  Events/
  Exceptions/
  Http/
    Controllers/Api/V1/
    Requests/Api/V1/
    Resources/Api/V1/
  Jobs/
  Listeners/
  Models/
  Repositories/
  Services/
routes/
  api.php
  api/v1.php
docker/
  nginx/
  php/
tests/
  Feature/
  Unit/
```

## Quality Standards

- PSR-12
- Typed PHP where practical
- Thin controllers
- Business rules outside controllers
- REST-oriented API design
- Consistent JSON error responses for `/api/*`
- No secrets committed to version control

## Initial Roadmap

1. Project foundation (Laravel, Docker, Sanctum, Pest, health endpoint) — **done**
2. Authentication endpoints with Sanctum
3. Customer CRUD
4. Product CRUD
5. Order workflow with items and status history
6. OpenAPI / Swagger documentation
7. GitHub Actions CI pipeline (tests + lint)
8. Queue workers and domain events for order lifecycle

## License

MIT
