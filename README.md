
# 📚 Laravel 11 Student & Hobby API

## 📌 Project Description

**EN:**  
This project is a RESTful API built with Laravel 11 to manage student data and their hobbies. It provides full CRUD functionality for both students and hobbies. Each student can have multiple hobbies, and each hobby can belong to multiple students. **Authentication is implemented using Laravel Sanctum**.

**ID:**  
Proyek ini adalah RESTful API yang dibangun dengan Laravel 11 untuk mengelola data siswa dan hobi mereka. API ini menyediakan fungsionalitas CRUD lengkap untuk data siswa dan hobi. Setiap siswa dapat memiliki banyak hobi, dan setiap hobi dapat dimiliki oleh banyak siswa. **Sistem autentikasi menggunakan Laravel Sanctum.**

---

## ⚙️ Features

- ✅ CRUD Students
- ✅ CRUD Hobbies
- 🔗 Many-to-many relationship between students and hobbies
- 🔐 API Authentication with Laravel Sanctum

---

## 🛠️ Tech Stack

- Laravel 11
- PHP 8.3+
- MySQL / PostgreSQL
- Laravel Sanctum
- Postman / API client

---

## 🔐 Authentication Endpoints

> You must be authenticated using Sanctum to access the protected student/hobby routes.

### 🔹 Register
- `POST /api/register`
```json
{
  "name": "User Name",
  "email": "user@example.com",
  "password": "password",
  "password_confirmation": "password"
}
```

### 🔹 Login
- `POST /api/login`
```json
{
  "email": "user@example.com",
  "password": "password"
}
```
**Response:**
```json
{
  "status": 200,
  "message": "User logged in successfully",
  "data": {
    "id": 1,
    "name": "User Name",
    ...
  },
  "token": "1|dSk823jSd0...."
}
```

🔸 **Use the token in the Authorization header for protected routes:**
```
Authorization: Bearer <your_token_here>
```

---

## 📡 API Endpoints

### 🧑 Student Endpoints

#### 🔹 Get All Students
- `GET /api/students`

#### 🔹 Get One Student
- `GET /api/students/{id}`

#### 🔹 Create Student
- `POST /api/students`
```json
{
  "name": "Budi Santoso",
  "nisn": "1234567890",
  "phone_number": ["081234567890", "082112223333"],
  "hobbies": [1, 2]
}
```

#### 🔹 Update Student
- `PUT /api/students/{id}`

#### 🔹 Delete Student
- `DELETE /api/students/{id}`

---

### 🎯 Hobby Endpoints

#### 🔹 Get All Hobbies
- `GET /api/hobbies`

#### 🔹 Create Hobby
- `POST /api/hobbies`
```json
{
  "name": "Membaca"
}
```

#### 🔹 Update Hobby
- `PUT /api/hobbies/{id}`

#### 🔹 Delete Hobby
- `DELETE /api/hobbies/{id}`

---

## 🧪 Testing

Use [Postman](https://www.postman.com/) or any API testing client. Make sure to:
- Register or login to get token.
- Add the token to `Authorization: Bearer <token>` header for authenticated routes.
