#PHP/JS/MySQL
Simple PHP MVC framework with example student scaffold.

Before start, you should create the table in MySQL.

CREATE TABLE Students (
         id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
         first_name VARCHAR(20) default 'Vasiliy',
         last_name VARCHAR(20) default 'Pupkin',
         sex VARCHAR(6) default 'Male',
         grp VARCHAR(10) default 'IT15-1',
         faculty VARCHAR(10) default 'FAM',
         created TIMESTAMP DEFAULT NOW()
       ) ENGINE=INNODB;

then write to the file config/config.php parameteres with access to MySQL db.

By default you do not have mod_rewrite available, the entry to the site will be the same, except that the URL will contain the values needed such as: http://www.example.com/index.php?rt=controller/action 


The .htaccess file will permit access to the site via urls such as
http://www.example.com/index.php/controller/action 

file .htaccess
___________________________________________
RewriteEngine on

RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d

RewriteRule ^(.*)$ index.php?rt=$1 [L,QSA] 
___________________________________________


Structure of project

├── app
│   ├── controllers
│   │   ├── default
│   │   │   └── error404.php
│   │   ├── indexController.php
│   │   └── studentController.php
│   ├── models
│   │   ├── studentActiveRecord.class.php
│   │   ├── studentEntity.class.php
│   │   └── studentModel.class.php
│   └── views
│       ├── defFooter.php
│       ├── defHeader.php
│       ├── error404.php
│       ├── index.php
│       ├── studentEdit.php
│       ├── studentList.php
│       ├── studentNew.php
│       └── studentPartForm.php
├── config
│   ├── config.php
│   └── schema.txt
├── index.php
├── lib
│   ├── active_record_base.class.php
│   ├── controller_base.class.php
│   ├── db.class.php
│   ├── includes
│   │   └── init.php
│   ├── registry.class.php
│   ├── request.class.php
│   ├── router.class.php
│   └── template.class.php
└── public
    ├── scripts
    │   ├── jquery.js
    │   └── jquery.ujs.js
    └── styles
        └── main.css

The main script is /index.php, then it includes file /lib/includes/init.php.
The base classes is in folder /lib.
Controllers in folder /app/controllers.
Models in folder /app/models.
Views in folder /app/view.
Static files in folder /public.
