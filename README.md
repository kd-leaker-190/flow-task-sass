# FlowTask

> A production-ready multi-tenant project management SaaS built with Laravel, Next.js, PostgreSQL, Redis, and Docker.

FlowTask is a modern project management platform designed for teams and organizations to manage workspaces, projects, tasks, team members, and collaboration from a single platform.

The application is built with a **multi-tenant architecture**, allowing multiple organizations to use the same application while keeping their data logically isolated and securely scoped to their workspace.

---

## ✨ Features

### 🔐 Authentication

* User registration and login
* Email verification
* Password reset
* Secure authentication
* Session/token management
* Protected API endpoints

### 🏢 Multi-Tenancy

* Create and manage multiple workspaces
* Workspace switching
* Workspace-scoped resources
* Tenant data isolation
* Workspace membership management
* Workspace-specific permissions

### 👥 Team Management

* Invite users to workspaces
* Assign workspace roles
* Manage workspace members
* Pending invitations
* Accept/reject invitations
* Resend invitations
* Remove members

### 🔑 Role & Permission

Workspace-level roles:

* Owner
* Admin
* Member

Permissions are enforced on the backend to prevent unauthorized access even when requests are sent directly to the API.

### 📁 Project Management

* Create projects
* Update projects
* Delete projects
* Project members
* Project-specific tasks
* Project activity

### ✅ Task Management

* Create tasks
* Assign tasks
* Task priorities
* Task statuses
* Due dates
* Labels
* Comments
* Attachments
* Task filtering
* Task searching

### 📋 Kanban Board

Tasks can be managed through a drag-and-drop Kanban board:

```text
┌──────────────┐
│     TODO     │
├──────────────┤
│ Login Page   │
│ API Docs     │
└──────────────┘

┌──────────────┐
│ IN PROGRESS  │
├──────────────┤
│ Dashboard    │
│ Authentication
└──────────────┘

┌──────────────┐
│     DONE     │
├──────────────┤
│ Homepage     │
└──────────────┘
```

### 💬 Collaboration

* Task comments
* Activity logs
* User mentions
* Notifications
* Real-time updates

### 🔔 Notifications

* Task assignments
* Workspace invitations
* Mentions
* Comments
* Project activity

Notifications are processed asynchronously using queues.

### 📊 Dashboard & Reports

* Workspace overview
* Project statistics
* Task statistics
* Completed tasks
* Overdue tasks
* Team activity
* Project reports

### 📅 Calendar

* Task deadlines
* Upcoming tasks
* Overdue tasks
* Calendar-based task management

### 📎 File Management

* Task attachments
* Secure file uploads
* File metadata
* Object storage support

---

# 🏗️ Architecture

FlowTask follows a modern client-server architecture.

```text
                    ┌─────────────────────┐
                    │      Next.js        │
                    │   React + TypeScript │
                    └──────────┬──────────┘
                               │
                               │ REST API
                               ▼
                    ┌─────────────────────┐
                    │       Laravel       │
                    │      Backend        │
                    └──────────┬──────────┘
                               │
             ┌─────────────────┼─────────────────┐
             │                 │                 │
             ▼                 ▼                 ▼
       ┌──────────┐      ┌──────────┐      ┌──────────┐
       │PostgreSQL│      │  Redis   │      │  Queue   │
       └──────────┘      └──────────┘      └──────────┘
                               │
                               ▼
                         Background Jobs
```

---

# 🏢 Multi-Tenant Architecture

Each workspace represents an isolated tenant.

```text
                       FlowTask
                          │
            ┌─────────────┴─────────────┐
            │                           │
        Workspace A                Workspace B
           Acme                       Startup
            │                           │
      ┌─────┴─────┐               ┌─────┴─────┐
      │           │               │           │
   Projects    Members         Projects    Members
      │
    Tasks
```

Every workspace-owned resource contains a `workspace_id`.

For example:

```text
projects

id
workspace_id
name
description
created_by
created_at
updated_at
```

This allows the backend to scope queries to the authenticated user's current workspace.

### Tenant Isolation

A user belonging to Workspace A must never be able to access resources belonging to Workspace B.

Example:

```text
Workspace A
    │
    └── Project #10

Workspace B
    │
    └── Project #20
```

A member of Workspace A requesting Project #20 must receive:

```http
403 Forbidden
```

or an appropriate not-found response depending on the API policy.

Tenant isolation is enforced at the backend level and is not dependent on frontend visibility.

---

# 🔑 Authorization

FlowTask uses role-based authorization.

```text
Owner
 ├── Manage Workspace
 ├── Manage Members
 ├── Manage Projects
 ├── Manage Tasks
 └── Manage Settings

Admin
 ├── Manage Members
 ├── Manage Projects
 ├── Manage Tasks
 └── View Settings

Member
 ├── View Projects
 ├── Create Tasks
 ├── Update Tasks
 └── Comment
```

Authorization is enforced server-side using Laravel Policies/Gates.

Frontend restrictions are used for UX only and are not considered a security boundary.

---

# ✉️ Workspace Invitations

Users can invite other people to their workspace.

```text
Owner
  │
  ▼
Invite Member
  │
  ▼
Email + Role
  │
  ▼
Laravel API
  │
  ▼
Create Invitation
  │
  ▼
Queue Job
  │
  ▼
Redis
  │
  ▼
Email
  │
  ▼
Invitation Link
  │
  ▼
Accept Invitation
  │
  ▼
workspace_members
```

Invitations contain:

* Workspace
* Invited user email
* Inviter
* Assigned role
* Secure token
* Expiration date
* Acceptance timestamp

Invitation tokens are generated using cryptographically secure random values and are validated server-side.

---

# ⚡ Redis & Queues

Redis is used for:

* Application caching
* Queue backend
* Temporary data
* Rate limiting
* Real-time infrastructure where required

Long-running operations such as sending emails are processed asynchronously.

```text
HTTP Request
     │
     ▼
Create Invitation
     │
     ▼
Dispatch Job
     │
     ▼
Redis Queue
     │
     ▼
Worker
     │
     ▼
Send Email
```

This prevents expensive operations from blocking API requests.

---

# 🔄 Real-Time Features

Real-time functionality is used for collaborative features such as:

* Notifications
* Task status updates
* Comments
* Activity updates
* Presence

Example:

```text
User A
   │
   │ Update Task
   ▼
Laravel
   │
   │ Broadcast Event
   ▼
WebSocket
   │
   ├──────────────► User B
   │
   └──────────────► User C
```

---

# 🧰 Tech Stack

## Frontend

| Technology   | Purpose           |
| ------------ | ----------------- |
| Next.js      | React application |
| React        | UI                |
| TypeScript   | Type safety       |
| Tailwind CSS | Styling           |
| React Query  | Server state      |
| Zod          | Validation        |
| Lucide       | Icons             |

## Backend

| Technology       | Purpose                 |
| ---------------- | ----------------------- |
| Laravel          | REST API                |
| PHP              | Backend language        |
| PostgreSQL       | Primary database        |
| Redis            | Cache & queues          |
| Laravel Queue    | Background jobs         |
| Laravel Policies | Authorization           |
| Laravel Reverb   | Real-time communication |

## Infrastructure

| Technology     | Purpose              |
| -------------- | -------------------- |
| Docker         | Containerization     |
| Docker Compose | Local development    |
| Nginx          | Reverse proxy        |
| GitHub Actions | CI/CD                |
| AWS            | Cloud infrastructure |
| S3             | Object storage       |

---

# 📂 Project Structure

## Backend

```text
backend/
├── app/
│   ├── Actions/
│   ├── Http/
│   │   ├── Controllers/
│   │   ├── Requests/
│   │   └── Resources/
│   ├── Models/
│   ├── Policies/
│   ├── Jobs/
│   ├── Events/
│   ├── Listeners/
│   └── Services/
│
├── database/
│   ├── migrations/
│   ├── factories/
│   └── seeders/
│
├── routes/
│   └── api.php
│
└── tests/
    ├── Feature/
    └── Unit/
```

## Frontend

```text
frontend/
├── app/
│   ├── (auth)/
│   ├── (dashboard)/
│   └── invitations/
│
├── components/
│   ├── ui/
│   ├── dashboard/
│   ├── projects/
│   ├── tasks/
│   └── workspace/
│
├── hooks/
├── lib/
├── services/
├── types/
└── providers/
```

---

# 🗄️ Database Overview

Main entities:

```text
users
  │
  ├──────────────┐
  │              │
  ▼              ▼
workspace_members invitations
  │
  ▼
workspaces
  │
  ├── projects
  │      │
  │      └── tasks
  │             ├── comments
  │             └── attachments
  │
  ├── activity_logs
  │
  └── notifications
```

Important relationships:

```text
Workspace
 ├── hasMany Members
 ├── hasMany Projects
 ├── hasMany Invitations
 ├── hasMany Activity Logs
 └── hasMany Notifications

Project
 ├── belongsTo Workspace
 └── hasMany Tasks

Task
 ├── belongsTo Project
 ├── belongsTo User
 ├── hasMany Comments
 └── hasMany Attachments
```

---

# 🚀 Getting Started

## Requirements

Make sure you have installed:

* Docker
* Docker Compose
* Git
* Node.js
* npm/pnpm
* Composer

---

## Clone the Repository

```bash
git clone https://github.com/your-username/flowtask.git

cd flowtask
```

---

# Backend Setup

```bash
cd backend

cp .env.example .env

composer install
```

Generate the application key:

```bash
php artisan key:generate
```

Run migrations:

```bash
php artisan migrate --seed
```

---

# Frontend Setup

```bash
cd frontend

npm install
```

Create your environment file:

```bash
cp .env.example .env.local
```

Configure the API URL:

```env
NEXT_PUBLIC_API_URL=http://localhost:8000/api
```

Start the development server:

```bash
npm run dev
```

---

# Docker

The recommended development environment uses Docker.

Start the services:

```bash
docker compose up -d
```

Check running containers:

```bash
docker compose ps
```

Stop the services:

```bash
docker compose down
```

---

# 🧪 Testing

Backend tests:

```bash
php artisan test
```

Frontend tests:

```bash
npm run test
```

The test suite covers:

* Authentication
* Workspace authorization
* Tenant isolation
* Role permissions
* Project management
* Task management
* Invitations
* API validation
* Business rules

---

# 🔐 Security

Security is a core part of the application.

FlowTask includes:

* Authentication
* Authorization
* Workspace-level access control
* Tenant isolation
* Request validation
* Rate limiting
* Secure invitation tokens
* Password hashing
* CSRF protection where applicable
* Secure HTTP headers
* Environment-based secrets

Sensitive credentials are never committed to the repository.

---

# 📡 API

The API follows REST principles and is versioned.

Example endpoints:

```http
POST   /api/v1/auth/register
POST   /api/v1/auth/login
POST   /api/v1/auth/logout

GET    /api/v1/workspaces
POST   /api/v1/workspaces

GET    /api/v1/workspaces/{workspace}/projects
POST   /api/v1/workspaces/{workspace}/projects

GET    /api/v1/projects/{project}/tasks
POST   /api/v1/projects/{project}/tasks

PATCH  /api/v1/tasks/{task}
DELETE /api/v1/tasks/{task}

POST   /api/v1/workspaces/{workspace}/invitations
POST   /api/v1/invitations/{token}/accept
```

Full API documentation is available through OpenAPI/Swagger.

---

# 📸 Screenshots

## Dashboard

*Add screenshot here.*

```text
docs/screenshots/dashboard.png
```

## Kanban Board

*Add screenshot here.*

```text
docs/screenshots/kanban.png
```

## Workspace Switcher

*Add screenshot here.*

```text
docs/screenshots/workspaces.png
```

## Members & Permissions

*Add screenshot here.*

```text
docs/screenshots/members.png
```

---

# 🧠 Engineering Decisions

## Why PostgreSQL?

PostgreSQL provides strong relational capabilities, indexing, constraints, transactions, and excellent support for complex SaaS workloads.

## Why Redis?

Redis is used for low-latency caching and asynchronous queue processing.

## Why Laravel?

Laravel provides a mature ecosystem for authentication, authorization, queues, notifications, database abstraction, testing, and API development.

## Why Next.js?

Next.js provides a modern React-based frontend architecture with excellent support for routing, rendering, and scalable application development.

## Why Multi-Tenancy?

The platform is designed as a SaaS product, where multiple organizations share the same application infrastructure while their data remains logically isolated.

---

# 📈 Future Improvements

Planned improvements include:

* [ ] Advanced project-level permissions
* [ ] Custom roles
* [ ] Advanced reporting
* [ ] Elasticsearch/OpenSearch integration
* [ ] Advanced audit logs
* [ ] S3-compatible object storage
* [ ] Kubernetes deployment
* [ ] Terraform infrastructure
* [ ] Monitoring and observability
* [ ] Horizontal scaling
* [ ] Advanced notification preferences
* [ ] Mobile application

---

# 🗺️ Roadmap

### Phase 1 — MVP

* [x] Authentication
* [x] Workspaces
* [x] Workspace members
* [x] Projects
* [x] Tasks
* [x] Kanban board

### Phase 2 — Collaboration

* [ ] Comments
* [ ] Attachments
* [ ] Invitations
* [ ] Notifications
* [ ] Activity logs

### Phase 3 — Production

* [ ] Automated tests
* [ ] Redis queues
* [ ] Real-time events
* [ ] Docker
* [ ] CI/CD
* [ ] Cloud deployment

### Phase 4 — Scale

* [ ] Advanced caching
* [ ] Search infrastructure
* [ ] Monitoring
* [ ] Kubernetes
* [ ] Infrastructure as Code

---

# 🤝 Contributing

Contributions are welcome.

1. Fork the repository
2. Create a feature branch

```bash
git checkout -b feature/my-feature
```

3. Commit your changes

```bash
git commit -m "feat: add workspace invitations"
```

4. Push the branch

```bash
git push origin feature/my-feature
```

5. Open a Pull Request

---

# 📄 License

This project is licensed under the MIT License.

---

# 👨‍💻 Author

**Your Name**

Full Stack Developer

* Laravel / PHP
* React / Next.js
* TypeScript
* PostgreSQL
* Redis
* Docker

---

## ⭐ Project Highlights

FlowTask demonstrates practical experience with:

* Multi-tenant SaaS architecture
* REST API design
* Authentication & authorization
* Role-based access control
* Tenant data isolation
* Background jobs
* Redis
* Real-time communication
* Database design
* Automated testing
* Docker
* CI/CD
* Cloud deployment

If you find this project useful, consider giving it a ⭐.
