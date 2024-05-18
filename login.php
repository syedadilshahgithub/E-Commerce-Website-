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
