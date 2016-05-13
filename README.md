# SchemaViewLaravel
A simple artisan command to view the Schema of an Eloquent model

Getting Started

1. Add "nickcousins/schemaview-laravel": "dev-master" to your Composer.json "Require" section
2. Run 'composer update'
3. Add the following line to your config/app.php service providers: nickcousins\SchemaViewLaravel\SchemaViewLaravelServiceProvider::class,
4. Run the command php artisan schema {model} to view the schema of your chosen model

e.g.  php artisan schema User
to use the default application namespace

e.g.  php artisan schema AnotherNamesapce\\Class
to specify the namespace
