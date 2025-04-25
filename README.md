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

---

# Section - 3 (Databse)
- set up db connection in `.env`
- After that migrate your laravel tables in into your mysql db.
```bash
php artisan migrate
``` 

- If you've modified your laravel tables then in that case you need to re-migrate it.
```bash
php artisan migrate:fresh
```

- If you want to make another migration file, then run the following command:
```bash
php artisan make:migration add_favourite_color_coloumn
```
> `add_favourite_color_coloumn` migration file will be created migrations.

### Submitting a HTML form in DB
0. Add `@csrf` directive inside the form.
1. Create `POST` route.
2. Create a controller. and define a method for handling the logic for storing the data into mysql eg:
```bash
php artisan make:controller controllerName
```
> create method
```php
public function register(Request $request)
    {
        $incomingFields = $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', Rules\Password::defaults()],
        ]);

        User::create($incomingFields); // storing data into User table

        return "User registered successully";
    }
```
---

## Validation in Laravel
In Laravel, form validation is a crucial part of ensuring that user inputs are correctly formatted and safe before processing them. Laravel provides a powerful validation system that works seamlessly with Blade templates.

### **Basic Form Validation in Laravel Using Blade**
Here’s how you can validate a form in Laravel using Blade:

#### **Step 1: Define Routes**
You need a route to display the form and another to handle form submission.

```php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/register', function () {
    return view('register');
});

Route::post('/register', function (Request $request) {
    $validated = $request->validate([
        'name' => 'required|min:3',
        'email' => 'required|email',
        'password' => 'required|min:6',
    ]);

    return "Form successfully submitted!";
});
```

#### **Step 2: Create a Blade Form**
Your Blade template (`register.blade.php`) will contain the form and logic to display validation errors.

```blade
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <form action="{{ url('/register') }}" method="POST">
        @csrf

        <label for="name">Name:</label>
        <input type="text" name="name" value="{{ old('name') }}">
        @error('name')
            <div style="color: red;">{{ $message }}</div>
        @enderror
        
        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ old('email') }}">
        @error('email')
            <div style="color: red;">{{ $message }}</div>
        @enderror

        <label for="password">Password:</label>
        <input type="password" name="password">
        @error('password')
            <div style="color: red;">{{ $message }}</div>
        @enderror

        <button type="submit">Submit</button>
    </form>
</body>
</html>
```

#### **Step 3: Handling Validation Errors**
- **`$request->validate([...])`** ensures inputs meet specified validation rules.
- **`old('input_name')`** retains input values after form submission.
- **`@error('field_name')`** displays specific error messages.

---

# Section - 4 (Authentication Basics)

## Login
```php
public function login(Request $request)
    {
        $incomingFields = $request->validate([
            'loginusername' => 'required',
            'loginpassword' => 'required',
        ]);

        if(auth()->attempt(['username' => $incomingFields['loginusername'], 'password' => $incomingFields['loginpassword']])) {
            $request->session()->regenerate();
            return redirect('/')->with("success", "Logged in successfully");
        }
        else {
            return "Login failed";
        }
    }
```

## Logout
```php
public function logout() {
        auth() -> logout();
        return redirect('/')->with("success", "Logged out successfully");
}
```

# Section-5 (Blog)

### To create a table (migration table)
```bash
php artisan make:migration crete_post_table
```

### To create a model in laravel
```bash
# php artisan make:model modeName
php artisan make:model Blog
```

---

## How to store Data from forms to DB?
Storing data from a form to a database in Laravel involves several steps. Here’s a simple guide to doing it properly:

### **Step 1: Set Up Database Configuration**
Ensure your `.env` file has correct database settings:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=root
DB_PASSWORD=your_password
```

Run the command:

```sh
php artisan config:clear
php artisan cache:clear
```

### **Step 2: Create a Migration**
Generate a migration for your table:

```sh
php artisan make:migration create_posts_table --create=posts
```

Modify the migration file (`create_posts_table.php`) inside `database/migrations`:

```php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
```

Then, run:

```sh
php artisan migrate
```

### **Step 3: Create a Model**
Generate a model for the `posts` table:

```sh
php artisan make:model Post
```

Modify the `Post.php` file inside `app/Models`:

```php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content'];
}
```

### **Step 4: Create a Controller**
Generate a controller:

```sh
php artisan make:controller PostController
```

Modify `PostController.php` inside `app/Http/Controllers`:

```php
namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:3',
            'content' => 'required|min:10',
        ]);

        Post::create($validatedData);

        return back()->with('success', 'Post saved successfully!');
    }
}
```

### **Step 5: Create a Blade Form**
Modify your Blade template (`create_post.blade.php`):

```blade
<!DOCTYPE html>
<html>
<head>
    <title>Create Post</title>
</head>
<body>
    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <label for="title">Title:</label>
        <input type="text" name="title" value="{{ old('title') }}">
        @error('title')
            <div style="color: red;">{{ $message }}</div>
        @enderror

        <label for="content">Content:</label>
        <textarea name="content">{{ old('content') }}</textarea>
        @error('content')
            <div style="color: red;">{{ $message }}</div>
        @enderror

        <button type="submit">Save</button>
    </form>
</body>
</html>
```

### **Step 6: Define Routes**
Modify `web.php` inside `routes`:

```php
use App\Http\Controllers\PostController;

Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');
```

### **Step 7: Test the Form**
Run Laravel server:

```sh
php artisan serve
```

---

### Adding markdown Support
- Go to controller, and use **Str** method.
```php
public function viewSinglePost(Post $post){
        $post['body'] = Str::markdown($post->body);
        return view('singlePost', ['post' => $post]);
}
```

- Then go to page which showing the html file, use single curly braces instead of double and also add two exclamation mark in the begining and at end.

```blade
{!! $post->body !!}
```