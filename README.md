# PHP Assessment

## Description
This project is a PHP-based employee management system that includes functionalities for login, employee management, task assignment, and department tracking. The system allows managers to assign tasks to employees and view employee information.

## Features

1. **Login Screen**
    - login using either **email** or **phone number** and a predefined complex **password**.

2. **Employee Management**
    - Manage employee details:
        - Name, email, phone number, salary, and department.
    - Actions:
        - **Add** new employee.
        - **Edit** employee information.
        - **Search** for employees.
        - **Delete** employee records.
    - Usage:
      - Each employee can:
        - **View** their assigned tasks.
        - **Edit** and update task status as needed.
3. **Task Assignment**
    - Assign tasks to employees:
        - Only managers can create tasks for their own employees.
        - Actions:
            - **Add New Task**
            - **List Employee Tasks and Status**

4. **Department Management**
    - Department screen to manage departments and their related data.
    - Actions:
        - **Add** new department.
        - **Edit** department information.
        - **Search** for departments and display:
            - Count of employees in each department.
            - Sum of salaries for each department.
        - **Delete** department (only if no employees are assigned to it).

# Installation
1. Clone the repository ```git clone https://github.com/Mahmoud-kamal12/arib.git```
2. Open the project in your IDE
3. Enter the following command in the terminal to run docker containers:
```bash
cp .env.example .env
docker-compose up --build -d
docker exec -it syaaraat bash
 - php artisan key:generate
 - php artisan migrate
 - php artisan db:seed
```
