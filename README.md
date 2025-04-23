# Larave and Livewire course

## Prerequisites
1. **VS code** for text editor
2. Free extensions for `VS Code`:
    - **Laravel Blade Snippets** by Winnie Lin
    - **PHP Namespace Resolver** by Mehedi Hassan

---

# Section - 1 (Introduction)

## 1. Introduction to PHP
```php
$name = "Ankit";
$age = 22;

echo 'Hello '. $name . ' Your age is '. $age; // Hello Ankit Your age is 22
echo "Hello $name Your age is $age"; // Hello Ankit Your age is 22
```

***Note:*** If you're using double quotes then in that case you can integrate your variable directly otherwise for single quote you've to use `.` known as contatenation. 

- Commands to start php localhost: `php -S localhost:8000`

# Composer
It is a **package** or **dependancy** manager for PHP, just like `npm` exsist for `node.js`.

- How to install it in fedora?  
`curl -sS https://getcomposer.org/installer | php`

- Making composer globally accessible   
`sudo mv composer.phar /usr/local/bin/composer`

- Verifying the installation    
`composer --version`

**Fact:** Composer is much bigger than then Laravel.

# Section - 2 (Introduction to Laravel)
Laravel is a free, open-source **PHP web framework** designed for building modern, robust, and scalable web applications. 

- It follows the Model-View-Controller (MVC) architectural pattern and provides an elegant syntax along with powerful tools for tasks like routing, authentication, caching, and database management.

## How to Create a Laravel Project Using Composer?  

### Step 1: Install Composer    
Verify installation:  
```bash
composer --version
```

### Step 2: Create the Laravel Project
```bash
# composer create-project laravel/laravel project-name
composer create-project laravel/laravel ourfirstapp
```
### How to run Laravel Project Using Composer?
Before running your project make sure that you're in your ***current project directory***.

### Step 1: Run your project
```bash
php artisan serve
```

---

### Routes and URLs
Define routes in `routes/web.php`

```php
// simple get route
Route::get('/', function(){
    return '<h1>Home Page</h1> <a href="/about">Go to About page</a>';
});

Route::get('/about', function(){
    return '<h1>About Page</h1> <a href="/">Home</a>';
});
```

---
# Controllers


## What are Controllers?
Controllers in Laravel handle application logic, acting as intermediaries between **Models** (data) and **Views** (UI). They organize HTTP request handling into reusable classes.

## Steps to Create & Use Controllers

### 1. Create a Controller : using Artisan Command
```bash
php artisan make:controller controller-name
php artisan make:controller UserController
```

### 2. Define controller in `App\Http\Controllers\ourMainController`
```php
class ourMainController extends Controller
{
    // home page controller
    public function homePage(){
        return '<h1>Home Page</h1> <a href="/about">Go to About page</a>';
    }

    // about page controller
    public function aboutPage(){
        return '<h1>About Page</h1> <a href="/">Go to About page</a>';
    }
}
```
### 3. use controller in `routes/web.php`
```php
use Illuminate\Support\Facades\Route;
// import your controller
use App\Http\Controllers\ourMainController;

Route::get('/',  [ourMainController::class, "homePage"]);
Route::get('/about', [ourMainController::class, "aboutPage"] );
```

- Instead of writing a direct function we'll use controller `[controllerName:class, method]`

```php
Route::get('/about', [ourMainController::class, "aboutPage"] );
```

**Note**: To clear view cache use `php artisan view:clear`

---

# View and Blade

## What is View?
Vi



## What is Blade?






