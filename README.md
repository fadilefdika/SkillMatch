# Skillmatch

**Skillmatch** is a web platform that connects freelancers with clients to collaborate on various projects. This application is designed to facilitate communication, negotiation, and the completion of work between both parties with different roles based on operational needs. This project was built after completing a course from BWA.

## Key Features
- **3 Main Roles**:
  - **Super Admin**: Has full control over the platform, managing users and system settings.
  - **Client**: Creates projects and seeks freelancers suitable for completing them.
  - **Freelancer**: Registers, offers skills, and accepts jobs from clients.
- **Project Management System**: Allows management, editing, and reviewing of projects with an easy workflow.
- **Job Agreements**: Enables clients and freelancers to agree on pricing, timelines, and project scope.

## Technologies Used
- **Backend**: [Laravel](https://laravel.com/) - a robust PHP framework for application development.
- **Authentication**: Uses [Laravel Breeze](https://laravel.com/docs/breeze) for a simple and secure authentication setup.
- **Frontend**: 
  - **Tailwind CSS** - for responsive and fast UI design.
  - **Alpine.js** - for lightweight frontend interaction logic.
- **Access Management**: [Spatie Laravel Permission](https://spatie.be/docs/laravel-permission) for user role-based access control.

## Installation
1. Clone the repository:
   ```bash
   git clone https://github.com/username/skillmatch.git
   cd skillmatch
2. Install dependecies:
   ```bash
   composer install
   npm install && npm run dev
3. Set up the environment configuration by creating the .env file:
   ```bash
   cp .env.example .env
   php artisan key:generate
4. Run database migrations:
   ```bash
   php artisan migrate
5. Start the server:
   ```bash
   php artisan serve

