# 📚 Laravel 11 Student & Hobby API

## 📌 Project Description

**EN:**  
This project is a RESTful API built with Laravel 11 to manage student data and their hobbies. It provides full CRUD functionality for both students and hobbies. Each student can have multiple hobbies, and each hobby can belong to multiple students.

**ID:**  
Proyek ini adalah RESTful API yang dibangun dengan Laravel 11 untuk mengelola data siswa dan hobi mereka. API ini menyediakan fungsionalitas CRUD lengkap untuk data siswa dan hobi. Setiap siswa dapat memiliki banyak hobi, dan setiap hobi dapat dimiliki oleh banyak siswa.

---

## ⚙️ Features

- ✅ CRUD Students
- ✅ CRUD Hobbies
- 🔗 Many-to-many relationship between students and hobbies

---

## 🛠️ Tech Stack

- Laravel 11
- PHP 8.3+
- MySQL / PostgreSQL
- Postman / API client

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
  "phone": "081234567890",
  "hobbies": [1, 2]
}
