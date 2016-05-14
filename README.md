# SchemaViewLaravel
A simple artisan command to view the Schema of an Eloquent model

##Installation

1. Composer Require: `nickcousins/schemaview-laravel`
2. Add the following line to your config/app.php service providers:
   `nickcousins\schemaview\SchemaViewServiceProvider::class,`

##Usage

Run the command `php artisan schema {model}` to view the schema of your chosen model

e.g.  `php artisan schema User`
to use the default application namespace

e.g.  `php artisan schema AnotherNamespace\\Class`
to specify the namespace

##Sample Output

    Schema for Model: App\User
    Table: users`
     +----------------+------------------+------+-----+---------+----------------+
     | Field          | Type             | Null | Key | Default | Extra          |
     +----------------+------------------+------+-----+---------+----------------+
     | id             | int(10) unsigned | NO   | PRI |         | auto_increment |
     | name           | varchar(255)     | NO   |     |         |                |
     | email          | varchar(255)     | NO   | UNI |         |                |
     | password       | varchar(60)      | NO   |     |         |                |
     | remember_token | varchar(100)     | YES  |     |         |                |
     | created_at     | timestamp        | YES  |     |         |                |
     | updated_at     | timestamp        | YES  |     |         |                |
     +----------------+------------------+------+-----+---------+----------------+
