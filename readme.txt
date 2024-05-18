INTRODUCTION
Building a DBS PROJECT with XAMPP, PHP, and SQL
1. Introduction to XAMPP
XAMPP stands for Cross-Platform (X), Apache (A), MySQL (M), PHP (P), and Perl (P).
It is a free, open-source software package that provides a local development environment for web applications.
XAMPP includes an Apache web server, MySQL database, PHP interpreter, and other tools needed for web development.
2. Components of XAMPP
•	Apache Web Server
Apache is a widely used web server software.
It handles HTTP requests, serves web pages, and executes PHP scripts.
•	MySQL Database
MySQL is a relational database management system (RDBMS).
It stores data in tables and allows efficient data retrieval and manipulation.
•	PHP
PHP is a server-side scripting language.
It enables dynamic content generation, form handling, and database interactions.

3. Creating a Login Page
•	Purpose of a Login Page
A login page allows users to authenticate themselves by entering valid credentials (username and password).
It restricts access to certain parts of a web application.
•	Implementation Steps
o	Design the Login Form:
Create an HTML form with input fields for username and password.
Submit the form to a PHP script for validation.
o	PHP Validation:
The PHP script receives form data.
It checks if the entered credentials match those stored in the database.
If valid, the user is redirected to a welcome page; otherwise, an error message is displayed.

4. Register Page
•	Purpose of a Register Page
Allows new users to create an account.
Collects user information (e.g., username, email, password).
•	Implementation Steps
o	Design the Registration Form:
Similar to the login form, but with additional fields (e.g., email, confirm password).
o	PHP Validation and Database Insertion:
Validate form data (e.g., check if the username is unique).
Insert user details into the database.

5. Configuration Page
•	Purpose of a Configuration Page
Allows users to customize settings (e.g., profile picture, notification preferences).
•	Implementation Steps
o	Design the Configuration Form:
Include relevant input fields (e.g., file upload for profile picture).
•	PHP Handling:
Process form data (e.g., update user preferences in the database).

6. Welcome Page
•	Purpose of a Welcome Page
Displays personalized content after successful login.
May include user-specific data, recommendations, or links.

7. Logout Page
•	Purpose of a Logout Page
Terminates the user’s session.
Redirects them to the login page.
•	Implementation Steps
o	Logout Logic:
Destroy the session (clear session variables).
Redirect the user to the login page.


CONFIGURATION PAGE
Understanding the PHP Database Configuration Code
Introduction
The given PHP code snippet serves as a configuration file for connecting to a MySQL database. It contains essential settings and logic required to establish a connection between a web application and a database server. Let’s explore each part in detail.

1. Constants Definition
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'login');

	DB_SERVER: This constant defines the hostname or IP address of the MySQL database server. In this case, it is set to 'localhost', indicating that the database server is running on the same machine as the web server.
	DB_USERNAME: Specifies the username used to authenticate with the MySQL server. Here, it is set to 'root'.
	DB_PASSWORD: Represents the password associated with the specified username. In this snippet, it is left empty (''), assuming no password is required.
	DB_NAME: Denotes the name of the specific database within the MySQL server. In this example, it is set to 'login'.

2. Establishing a Database Connection
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
The mysqli_connect() function attempts to create a connection to the MySQL database using the provided credentials.
The resulting connection object ($conn) will be used for executing queries and interacting with the database.

3. Connection Verification
if ($conn == false) {
    die('Error: Cannot connect');
}
After attempting to establish a connection, the code checks whether the connection was successful.
If the connection fails (i.e., $conn evaluates to false), the script terminates with an error message: “Error: Cannot connect.”

CODE OF CONFIGUTION PAGE
<?php
/*
this file contains database configuration assuming you runnig mysql using "root" and password " "
*/
define('DB_SERVER','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','login');

//try connect to the database
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

//check the conection
if($conn == false){
    dir('Error: Cannot connect');
}

?>





Explaining the User Registration Form in PHP, HTML & CSS
Introduction
The provided code snippet demonstrates the creation of a user registration form using PHP and HTML. This form allows users to register by providing a username, email, and password. Let’s break down each section in detail.
1. Constants Definition and Database Connection
•	Constants and Initialization
The code begins by including the config.php file, which presumably contains database configuration settings (such as server, username, and password).
Variables for username, password, and confirmation are initialized.
Error variables ($username_err, $password_err, and $confirm_password_err) are set to empty strings initially.

2. Form Handling
•	Username Validation
If the HTTP request method is POST (indicating form submission):
The script checks if the username field is empty. If so, it sets an error message.
Otherwise, it queries the database to check if the username is already taken. If found, an appropriate error message is displayed.
If the username is unique, it assigns the trimmed username value to the $username variable.

•	Password Validation
The script checks the password field:
If empty, it sets an error message.
If the password length is less than 5 characters, it sets another error message.
Otherwise, it assigns the trimmed password value to the $password variable.

•	Confirm Password Validation
The script ensures that the password and confirm password fields match. If not, it sets an error message.
•	Database Insertion
If no errors occur (i.e., all fields are valid):
It prepares an SQL query to insert the user’s data into the database.
The password is hashed using password_hash() for security.
If the query execution is successful, the user is redirected to the login page.
Otherwise, an error message is displayed.

3. HTML Form
•	Form Structure
The HTML section creates a registration form:
The form action is set to the same page (empty action=""), indicating that form submission will be handled by the current script.
Input fields for username, email, password, and confirm password are provided.
The submit button triggers form submission.
Bootstrap classes are used for styling.

Building a User Registration Form Using PHP and Bootstrap
1. Navbar Section
•	Navbar Styling
The navigation bar (navbar) is styled using Bootstrap classes.
It includes links for “Home,” “About,” “Contact Us,” and a search input field.

2. Container and Form
•	Container Styling
The form is placed inside a container (<div class="container mt-4">).
The container has a dark background color, rounded corners, and a subtle box shadow.
•	Form Elements
Username Input Field:
An input field for the username (<input type="text" name="username" placeholder="Username" required>).
The required attribute ensures that the user must provide a username.
•	Email Input Field:
An input field for the email address (<input type="email" name="email" placeholder="Email" required>).
•	Password Input Fields:
Two input fields for password and confirm password (<input type="password" name="password" placeholder="Password" required> and <input type="password" name="confirm_password" placeholder="Confirm Password" required>).
The password field requires a minimum length of 5 characters.
The confirm password field ensures that the user enters the same password twice.
•	Submit Button:
A submit button (<input type="submit" value="Register">) triggers form submission.

3. JavaScript Libraries
Bootstrap and Popper.js
The script includes Bootstrap and Popper.js libraries for responsive design and interactive components.

PHP CODE OF REGISTER PAGE
<?php
require_once "config.php";

$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // check if user is empty
    if (empty(trim($_POST["username"]))) {
        $username_err = "Username cannot be blank";
    } else {
        $sql = "SELECT id FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // set the value of param user
            $param_username = trim($_POST['username']);
            
            // try to execute this statement
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $username_err = "This username is already taken";
                } else {
                    $username = trim($_POST['username']);
                }
            } else {
                echo "Something went wrong ";
            }
        }
        mysqli_stmt_close($stmt);
    }
    
    // check for password
    if (empty(trim($_POST['password']))) {
        $password_err = "Password cannot be blank";
    } elseif (strlen(trim($_POST['password'])) < 5) {
        $password_err = "Password cannot be less than 5 characters";
    } else {
        $password = trim($_POST['password']);
    }
    // check for confirm password field
    if (trim($_POST['password']) != (trim($_POST['confirm_password']))) {
        $password_err = "Password should match";
    }
    // If there were no errors, go ahead and insert into database
    if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            // set these parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT);
            // try to execute the query
            if (mysqli_stmt_execute($stmt)) {
                header("location: login.php");
            } else {
                echo "Something went wrong ..... cannot redirect!";
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($conn);
}
?>
HTML AND CSS CODE OF REGISTER PAGE
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP login system</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
  body {
    margin: 0;
    font-family: Arial, sans-serif;
    background-color: grey;
    color: #fff;
  }

  .navbar {
    background-color: #333;
    overflow: hidden;
    padding: 10px 20px;
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.5);
  }

  .navbar a {
    float: left;
    display: block;
    color: #fff;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
  }

  .navbar a:hover {
    background-color: #ddd;
    color: black;
  }

  .navbar a.active {
    background-color: #4CAF50;
    color: white;
  }

  .container {
    background-color: #333;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 0px 10px 0px rgba(255,255,255,0.1);
    margin-top: 20px;
    width: 40%;
  }

  h1 {
    text-align: center;
  }

  input[type="text"],
  input[type="password"],
  input[type="email"] {
    width: 100%;
    padding: 10px;
    margin: 8px 0;
    box-sizing: border-box;
    border: none;
    border-radius: 5px;
    background-color: #444;
    color: #fff;
  }

  input[type="submit"] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }

  input[type="submit"]:hover {
    background-color: #45a049;
  }

  .form-group {
    margin-bottom: 20px;
  }

  .form-group:last-child {
    margin-bottom: 0;
  }

    </style>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Register</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact Us </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="#">Disabled</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
<div class= "container mt-4">
<h1>Please Register Here:</h1>
  <hr>
  <form action="" method="post">
    <div class="form-group">
      <input type="text" name="username" placeholder="Username" required>
    </div>
    <div class="form-group">
      <input type="email" name="email" placeholder="Email" required>
    </div>
    <div class="form-group">
      <input type="password" name="password" placeholder="Password" required>
    </div>
    <div class="form-group">
      <input type="password" name="confirm_password" placeholder="Confirm Password" required>
    </div>
    <input type="submit" value="Register">
  </form>

</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>




  </body>
</html>


LOGIN PAGE
Building a User Authentication System in PHP
Introduction
The provided PHP code snippet demonstrates the creation of a user authentication system. This system allows users to log in by providing their username and password. Let’s break down each section in detail.
1. Session Management
•	Session Initialization
The script starts a session using session_start().
If the user is already logged in (i.e., their session contains a valid username), they are redirected to the welcome page (welcome.php).
2. Database Connection and User Input Handling
•	Database Configuration
The script includes the config.php file, which presumably contains database configuration settings (such as server, username, and password).
o	User Input Validation
The script checks if the HTTP request method is POST (indicating form submission).
If the username or password fields are empty, an error message is set.
Otherwise, the provided username and password are trimmed and stored.
3. Database Query and Authentication
•	SQL Query
The script prepares an SQL query to retrieve the user’s data from the database.
It checks if the username exists in the database.
•	Password Verification
If the username exists, the script binds the result and verifies the hashed password.
If the password matches, the user’s session is set, and they are redirected to the welcome page.
4. HTML Form
•	Form Structure
The HTML section creates a login form:
The form action is set to the same page (empty action=""), indicating that form submission will be handled by the current script.
Input fields for username and password are provided.
Bootstrap classes are used for styling.

Building a Login Form Using HTML, and CSS

Introduction
The provided code snippet demonstrates the creation of a login form using PHP, HTML, and CSS. This form allows users to log in by providing their username and password. Let’s explore each section in detail.

1. HTML Structure
•	Container and Form
The HTML structure begins with a div element with the class login-container.
Inside this container:
An h2 heading displays “Login.”
A form element is used for user input.
Input fields for username and password are provided.
A submit button triggers form submission.
A link to the registration page (register.php) is included.

2. CSS Styling

•	Container Styling
The .login-container class styles the login form:
White background color with rounded corners.
A subtle box shadow.
Padding and width settings.
A hover effect to lift the container slightly.
•	Input Fields Styling
The input fields (input[type="text"] and input[type="password"]) have consistent styling:
Width adjusted to fit the container.
Padding and margin settings.
No borders (to maintain a clean appearance).
Background color transitions on focus.
•	Submit Button Styling
The submit button (input[type="submit"]) has a green background color and white text.
Hovering over the button changes the background color slightly.


3. Form Action and Security Measures

•	Form Action
The form element’s action attribute is set to the current page (<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>), indicating that form submission will be handled by the same script.
•	Security Measures
The form uses the POST method to send data securely.
The required attribute ensures that both username and password fields are filled out.
The form action points to the same page, where PHP code will handle user authentication.

PHP CODE OF LOGI PAGE
<?php
session_start();

if(isset($_SESSION['username'])){
    header("location: welcome.php");
    exit;
}
require_once "config.php";

$username = $password = "";
$err = "";

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if(empty(trim($_POST['username'])) || empty(trim($_POST['password']))){
        $err = "Please enter username + password";
    }
    else{
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
    }

    if(empty($err)){
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $param_username);
        $param_username = $username;

        if(mysqli_stmt_execute($stmt)){
            mysqli_stmt_store_result($stmt);
            if(mysqli_stmt_num_rows($stmt) == 1){
                mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                if(mysqli_stmt_fetch($stmt)){
                    if(password_verify($password, $hashed_password)){
                        $_SESSION["username"] = $username;
                        $_SESSION["id"] = $id;
                        $_SESSION["loggedin"] = true;

                        //redirect user to welcome page
                        header("location: welcome.php");
                        exit;
                    }
                }
            }
        }
    }
}
?>

HTML AND CSS CODE OF LOGIN PAGE
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Form</title>
<style>
  body {
    font-family: 'Roboto', sans-serif;
    background: url('image4.jpg') center center/cover no-repeat;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
  }

  .login-container {
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
    padding: 40px;
    width: 350px;
    max-width: 90%;
    text-align: center;
    transition: transform 0.3s ease;
  }

  .login-container:hover {
    transform: translateY(-5px);
  }

  .login-container h2 {
    margin-bottom: 30px;
    color: #333;
    font-weight: 500;
  }

  .login-container input[type="text"],
  .login-container input[type="password"] {
    width: calc(100% - 40px);
    padding: 15px;
    margin-bottom: 20px;
    border: none;
    border-radius: 25px;
    font-size: 16px;
    background-color: #f9f9f9;
    transition: background-color 0.3s ease;
  }

  .login-container input[type="text"]:focus,
  .login-container input[type="password"]:focus {
    background-color: #e9e9e9;
    outline: none;
  }

  .login-container input[type="submit"] {
    background-color: #4CAF50;
    color: #fff;
    padding: 15px 0;
    border: none;
    border-radius: 25px;
    cursor: pointer;
    font-size: 16px;
    width: 100%;
    transition: background-color 0.3s ease;
  }

  .login-container input[type="submit"]:hover {
    background-color: #45a049;
  }

  .login-container p {
    margin-top: 20px;
    font-size: 14px;
    color: #666;
  }

  @media (max-width: 768px) {
    .login-container {
      width: 300px;
    }
  }
</style>
</head>
<body>
  <div class="login-container">
    <h2><b>Login</b></h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <input type="text" placeholder="Username" name="username" required>
      <input type="password" placeholder="Password" name="password" required>
      <input type="submit" value="Login">
    </form>
    <p>Don't have an account? <a href="register.php">Sign up</a></p>
  </div>
</body>
</html>




WELCOME PAGE / AMAZON PAGE
Building an Amazon Clone: A Frontend Overview
1. Header Section
Navigation Bar (navbar)
•	Displays essential components:
o	Amazon logo
o	Delivery address (with country icon)
o	Search bar (with category dropdown)
o	Sign-in information
o	Return and cart icons

Collapsible Panel (panel)
•	Provides additional navigation options:
o	Today’s deals
o	Customer service
o	Gift cards
o	Control panel
o	Shop deals in electronics
2. Hero Section
Hero Message
Informs users that they are on an Amazon clone for demonstration purposes.
Includes a link to the official Amazon website.

3. Shop Section
Product Boxes (box)
Each box represents a product category (e.g., “Cloths,” “Health & Personal Care”).
•	Contains:
o	Title
o	Background image
o	“See more” link

4. Footer Section
•	Footer Panels
o	Back-to-top link
o	Informational links (e.g., “Get to Know Us,” “Make Money with Us”)
o	Amazon logo
o	Legal information (e.g., “Conditions of Use,” “Privacy Notice”)

HTML CODE OF AMAZON CLONE PAGE
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <title>Amazon</title>
</head>
<body>
    <header>
        <div class="navbar">
            <div class="nav-logo border">
                <div class="logo"></div>
            </div>
            <div class="nav-address border">
                <p class="add-first">Deliver to</p>
                <div class="add-icon">
                    <i class="fa-solid fa-plane"></i>
                    <p class="add-sec">Pakistan</p>
                </div>
            </div>

            <div class="nav-search">
                <select class="search-select border">
                    <option>ALL</option>
                    <option>New</option>
                    <option>Old</option>
                    <option>Leter</option>
                    <option>Sale</option>
                </select>
                <input placeholder="Search Amazon Pakistan" class="search-input">
                <div class="search-icon border">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
            </div>
            <div class="nav-signin border">
                <p><span><a href = "login.php">Hello, sign in</a></span></p>
                <p class="nav-second"><a href="login.html">Account & Lists</a></p>
            </div>
            <div class="nav-return border">
                <p><span>Returns</span></p>
                <p class="nav-second">& Orders</p>
            </div>
            <div class="nav-cart border">
                <i class="fa-solid fa-cart-shopping"></i>
                Cart
            </div>
        </div>
        <div class="panel">
            <div class="panel-all ">
                <i class="fa-solid fa-bars">
                    <select class="all-option border" style="color: white;">
                        <option>ALL</option>
                        <option>Cloths</option>
                        <option>Phones</option>        
                        <option>Cosmetics</option>   
                        <option>Sports</option>    
                        <option>Electronic</option>
                    </select>
                </i>
            </div>
            <div class="panel-option">
                <p>Today's Deal</p>
                <p>Customer Service</p>
                <p>Gift Card</p>
                <p>Control Panel</p>
                <p>Registry</p>
            </div>
            <div class="panel-deals border">
                Shop Deals in Electronics
            </div>
        </div>
    </header>
    <div class="hero-section">
        <div class="hero-msg">
            <p>You are on amazon clone. You canot buy anyitem from this becuase it is only Frontend project made by Syed Adil Shah.<a href="https://www.amazon.com/">  Click here to go amazon.in</a> </p>
        </div>
    </div>
    <div class="shop-section">
        <div class= "box">
            <div class="box-content">
                <h3>Cloths</h3>
                <div class="box-img" style="background-image: url('box1_image.jpg');"></div>
                <p>See more</p>
            </div>
        </div>
        <div class= "box">
            <div class="box-content">
                <h3>Health & Personal Care</h3>
                <div class="box-img" style="background-image: url('box2_image.jpg');"></div>
                <p>See more</p>
            </div>
        </div>
        <div class="box">
            <div class="box-content">
                <h3>Furniture</h3>
                <div class="box-img" style="background-image: url('box3_image.jpg');"></div>
                <p>See more</p>
            </div>
        </div>
        <div class="box">
            <div class="box-content">
                <h3>Electronics</h3>
                <div class="box-img" style="background-image: url('box4_image.jpg');"></div>
                <p>See more</p>
            </div>
        </div>
        <div class="box">
            <div class="box-content">
                <h3>Beauty Picks</h3>
                <div class="box-img" style="background-image: url('box5_image.jpg');"></div>
                <p>See more</p>
            </div>
        </div>
        <div class="box">
            <div class="box-content">
                <h3>Pet's Food</h3>
                <div class="box-img" style="background-image: url('box6_image.jpg');"></div>
                <p>See more</p>
            </div>
        </div>
        <div class= "box">
            <div class="box-content">
                <h3>New Arrival in Toy</h3>
                <div class="box-img" style="background-image: url('box7_image.jpg');"></div>
                <p>See more</p>
            </div>
        </div>
        <div class="box">
            <div class="box-content">
                <h3>Fation Tree</h3>
                <div class="box-img" style="background-image: url('box8_image.jpg');"></div>
                <p>See more</p>
            </div>
         </div>
    </div>
    <footer>
        <div class="foot-panel1">
            Back to Top
        </div>
        <div class="foot-panel2">
            <ul>
                <p>Get to Know Us</p>
                <a>Careers</a>
                <a>Blog</a>
                <a>About Amazon</a>
                <a>Investor Relations</a>
                <a>Amazon Devices</a>
                <a>Amazon Science</a>
            </ul>
            <ul>
                <p>Make Money with Us</p>
                <a>Sell products on Amazon</a>
                <a>Sell on Amazon Business</a>
                <a>Sell apps on Amazon</a>
                <a>Become an Affiliate</a>
                <a>Advertise Your Products</a>
                <a>Self-Publish with Us</a>
            </ul>
            <ul>
                <p>Amazon Payment Products</p>
                <a>Amazon Business Card</a>
                <a>Shop with Points</a>
                <a>Reload Your Balance</a>
                <a>Amazon Currency Converter</a>
            </ul>
            <ul>
                <p>Let Us Help You</p>
                <a>Amazon and COVID-19</a>
                <a>Your Account</a>
                <a>Your Orders</a>
                <a>Shipping Rates & Policies</a>
                <a>Returns & Replacements</a>
                <a>Manage Your Content and Devices</a>
                <a>Amazon Assistant</a>
                <a>Help</a>
            </ul>
        </div>
        <div class="foot-panel3">
            <div class="logo"></div>
        </div>
        <div class="foot-panel4">
            <div class="page">
                <a>Conditions of Use</a>
                <a>Privacy Notice</a>
                <a>Your Ads Privacy Choices</a>
            </div>
            <div class="copywrite">
                © 1996-2024, Amazon.com, Inc. or its affiliates
            </div>
        </div>
    </footer>
</body>
</html>

CSS CODE OF AMAZON CLONE PAGE
* {
    margin: 0;
    font-family: Arial;
    border: border-box;
}

.navbar {
    height: 60px;
    background-color: black;
    color: white;
    display: flex;
    align-items: center;
    justify-content: space-evenly;
}

.nav-logo {
    height: 50px;
    width: 100px;
}

.logo {
    background-image: url("amazon_logo.png");
    background-size: cover;
    height: 50px;
    width: 100%;
}

.border {
    border: 1.3px solid transparent;
}

.border:hover {
    border: 1.3px solid white;
}

/* box 2 */
  
.add-first {
    color: gray;
    font-size: 0.85rem;
    margin-left: 20px;
}

.add-sec {
    font-size: 1rem;
}

.add-icon {
    display: flex;
    align-items: center;

}

.nav-search {
    display: flex;
    justify-content: space-evenly;
    background-color: orangered;
    width: 620px;
    height: 40px;
    border-radius: 4px;
}

.search-select {
    background-color: #f3f3f3;
    width: 50px;
    text-align: center;
    border-top-left-radius: 4px;
    border-bottom-left-radius: 4px;
    border: none;
}

.search-input{
    width: 100%;
    font-size: 1rem;
    border: none;
}

.search-icon {
    width: 45px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 1rem;
    border-top-right-radius: 4px;
    border-bottom-right-radius: 4px;
}

.nav-search:hover {
    border: 2px solid orangered;
}

/*box 4 */

span {
    font-size: 0.7rem;

}

.nav-second {
    font-size: 0.85rem;
    font-weight: 700;
}

.nav-cart i {
    font-size: 30px;
}

.nav-cart {
    font-size: 0.85rem;
    font-weight: 700;
}

/* penal style */

.panel {
    height: 40px;
    background-color: #222f3d;
    display: flex;
    color: white;
    align-items: center;
    justify-content: space-evenly;
 
}

.panel-option p {
    display: inline;
    margin: 10px;
}

.all-option {
    background-color: #222f3d;
}

.panel-option {
    width: 70%;
    font-size: 0.85rem;
}

.panel-deals {
    font-size: 0.9rem;
    font-weight: 700;

}

.hero-section {
    background-image: url(hero_image.jpg);
    height: 350px;
    background-size: cover;
    display: flex;
    justify-content: center;
    align-items: end;
}

.hero-msg {
    background-color: white;
    color: black;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.9rem;
    width: 95%;
    margin-bottom: 25px;

}

.hero-msg a{
    color: blue;
    
}

/* shop section */

.shop-section {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-evenly;
    background-color: #e2e7e6;
}

.box {
  /*  border: 2px solid black; */
    height: 400px;
    width: 23%;
    background-color: white;
    padding: 20px 0px 15px;
    margin-top: 15px;

}

.box-img {
    height: 300px;
    background-size: cover;
    margin-top: 1rem;
    margin-bottom: 1rem;
}

.box-content {
    margin-left: 1rem;
    margin-right: 1rem;
}

.box-content p {
    color: #007185;
}

/* foot panel */
footer {
    margin-top: 15px;
}

.foot-panel1 {
    background-color: #37475a;
    color: white;
    height: 50px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 0.8rem;
}

.foot-panel2 {
    background-color: #222f3d;
    height: 300px;
    color: white;
    display: flex;
    justify-content: space-evenly;
}
.foot-panel2 p {
    font-weight: 700;
    margin-top: 15px;
}
ul a {
    display: block;
    margin-top: 10px;
    font-size: 0.85rem;
    color: #dddddd;
}
.foot-panel3 {
    background-color: #222f3d;
    color: white;
    border-top: 0.5px solid white;
    height: 70px;
    display: flex;
    justify-content: center;
    align-items: center;
}
.logo {
    background-image: url("amazon_logo.png");
    background-size: cover;
    height: 50px;
    width: 100px;
}
.foot-panel4 {
    background-color: #0f1111;
    color: white;
    height: 60px;
    text-align: center;   
}
.page {
    padding-top: 10px;
    border-spacing: 5px;
}
.copywrite {
    padding-top: 5px;
}
LOGOUT PAGE
Building a logout page through PHP
1.	Session Management:
The script starts a session using session_start().
The $_SESSION array is emptied (all session variables are removed).
The session is destroyed using session_destroy().

2.	Redirect:
After destroying the session, the user is redirected to the login page (login.php).

CODE OF LOGOUT PAGE
<?php

session_start();
$_SESSION = array();
session_destroy();
header("location: login.php");

?
