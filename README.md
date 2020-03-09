# Demo
|PC|Mobile|
|---|---|
|<img src="https://github.com/zuka-e/laravel-app-posting/blob/master/public/img/home_pc.jpg" width="600">|<img src="https://github.com/zuka-e/laravel-app-posting/blob/master/public/img/home_mobile.jpg" width="200">|

# Functions

- RESTful URL (A common URL, which is understandable)
- Email_verification (Can't access all of an app without verified)
  - a function, "Middleware" is implemented 
- Authentication (Can't create a post without login)
  - a "Middleware" is implemented 
- Authorization (Can't update or destroy others' posts)
  - a "Policy" is implemented
- Validation (Confirm user input before It's saved)
  - a "Request" is implemented 
- Password_reset (Can change a password you forgot)
  - a "Notification" is implemented for sending a email
- File_upload (Can save profile_image and store at S3, AWS)
  - a "Storage" is implemented 
- Pagination 
- Localization into Japanese

# Environment
- PHP ^7.2
- Laravel ^6.2
- Bootstrap ^4 
- Jquery ^3.2 
- MariaDB (local)
- PostgreSQL (production)
- Heroku

# URL for the Application
- <a href='https://comment-board-php.herokuapp.com'>CommentBoard</a>

# Verified user for testing
- User_name: user  
- Password: password  
