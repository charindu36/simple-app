# Simple PHP Blog Post Editor

This project is a basic PHP-based blog post editor that allows users to view and update blog posts. It uses MySQL for the database and Bootstrap 5.3 for styling.

## ⚙️ Setup Instructions

### 1. Clone or Download the Project

```bash
   git clone https://github.com/charindu36/simple-app.git
```

### 2. Configure the Database

Create a MySQL database and a table named posts:

```
CREATE TABLE posts (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  author VARCHAR(100) NOT NULL,
  body TEXT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

### 3. Set Database Config

Edit config/config.php and db.php:

```
// config/config.php
define('ROOT_URL', 'http://localhost/php-blog-editor/');
define('DB_HOST', 'localhost');
define('DB_USER', 'your_mysql_username');
define('DB_PASS', 'your_mysql_password');
define('DB_NAME', 'your_database_name');
```

## 🛠 Skills

HTML, CSS...

## Other Common Github Profile Sections

👩‍💻 I'm currently working on...

🧠 I'm currently learning...

👯‍♀️ I'm looking to collaborate on...

🤔 I'm looking for help with...

💬 Ask me about HTML,CSS

📫 [How to reach me...](charindumadhusanka801@gmail.com)

⚡️ I think I'm funny 😄

## Authors

- [@charindu36](https://github.com/charindu36)

## Acknowledgements

- [Ai Assistant - chatgpt](https://chatgpt.com/)

## Tech Stack

**Server:** XAMPP

## License

[MIT](https://choosealicense.com/licenses/mit/)

## 🚀 Features

- ✅ View single post with author and timestamp

- ✏️ Edit and update post content

- 📥 Create new posts

- ⚠️ Form validation and error alerts

- 🎨 Styled with Bootstrap 5.3

- 🔍 Connection status indicator

- 🔙 Back button support

## 🔗 Links

[![linkedin](https://img.shields.io/badge/linkedin-0A66C2?style=for-the-badge&logo=linkedin&logoColor=white)](https://www.linkedin.com/in/charindu-madhusanka/)

## Running Tests

To run tests, run the following command

```
   http://localhost/APP/index.php

```
