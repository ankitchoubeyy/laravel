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

## Composer
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

## Routes and URLs
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
## Controllers


### What are Controllers?
Controllers in Laravel handle application logic, acting as intermediaries between **Models** (data) and **Views** (UI). They organize HTTP request handling into reusable classes.

### Steps to Create & Use Controllers

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

## View and Blade

### What is View?
A **View** in Laravel represents the presentation layer of the application. It separates the HTML/UI logic from business logic and is responsible for displaying data to users.

### Steps to create view and use them
1. Create view inside `resources/views/home.blade.php`. Define your content
2. Map your view with controller. example:
```php
public function homePage(){
        return view("home");
    }
```

### How to write dynamic/php a content in blade template engine?
For dynamic content use : `{{ }}`
```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Our Main App</title>
</head>
<body>
    <h1>Home page</h1>
    <!-- {{ }} used to fetch dynamic/php content. -->
    <p>The current year is: {{date('Y')}}</p>
    <a href="/about">Go to About</a>
</body>
</html>
```

### How to pass data in blade from controller?
1. Pass the data from the controller
- data must be passed in the ***assosciative array***
```php
public function homePage(){
        $name = 'Aman';
        return view("home", ['name' => $name]);
}
```

- How to send the list of data
```php
public function aboutPage(){
        $animalsList = ['lion', 'Tiger', 'Elephant'];
        return view("about", ['animals' => $animalsList]);
    }
```

2. Display the data from.
```html
<h2>Your name: {{$name}}</h2>

<!-- Fetching list values -->
<ul>
    @foreach ($animals as $animal)
        <li>{{$animal}}</li>
    @endforeach
</ul>
```

### What is Blade?
Blade is the powerful templating engine that comes built into Laravel, a popular PHP framework. It makes working with views much more flexible and readable by allowing developers to write clean and efficient template files using its simple yet robust syntax.

Unlike plain PHP, Blade provides features like:
- **Template Inheritance** – Define a layout file and extend it in other views.  
- **Control Structures** – Use `@if`, `@foreach`, `@switch`, and other directives instead of traditional PHP syntax.  
- **Components & Slots** – Reusable template elements for modular design.  
- **Directives** – Customizable shortcuts that simplify coding.  

Blade templates are compiled into plain PHP, ensuring they run fast while keeping code neat and maintainable.

## Reducing Duplication in Blade
Go to `views` directory create `views/components/layout.blade.php`

1. Write all your header/footer or common code in `layout.blade.php` file.
2. Use Slot `{{ $slot }}` for rendering other dynamic files.

```html
<header>This is a Header</header>
{{$slot}} <!-- for rendering the dynamic pages -->
<footer>This is a footer</footer>
```

3. Go to your desired view and wrap up all your content inside the special tag given below.
```html
<x-layout>
    Page content with similar header and footer.
</x-layout>
```







