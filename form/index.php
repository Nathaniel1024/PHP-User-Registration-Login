<?php
  include("database.php");

  if(isset($_POST["register"])){
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

    if(empty($username)){
      echo"Username must not be empty!";
    }
    elseif(empty($email)){
      echo"Email must not be empty!";
    }
    elseif(empty($password)){
      echo"Password must not be empty!";
    }
    else{
      $hash_password = password_hash($password, PASSWORD_DEFAULT);
      $sql = "INSERT INTO form_table (username, email, password) VALUES ('$username', '$email', '$hash_password')";
      try {
        mysqli_query($conn, $sql);
        echo"Registration Success!";
      } catch (mysqli_sql_exception) {
        echo"Registration Failed!";
      }
    }
  }


  if(isset($_POST["login"])){
    $username_login = filter_input(INPUT_POST, "username-login", FILTER_SANITIZE_SPECIAL_CHARS);
    $password_login = filter_input(INPUT_POST, "password-login", FILTER_SANITIZE_SPECIAL_CHARS);

    if(empty($username_login)){
      echo"Username must not be empty!";
    }
    elseif(empty($password_login)){
      echo"Password must not be empty!";
    }
    else{
      $sql = "SELECT password FROM form_table WHERE username = '$username_login'";
      try {
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
          $row = mysqli_fetch_assoc($result);
          $hash_password = $row["password"];
          if(password_verify($password_login, $hash_password)){
            header("Location: welcome.php");
            exit();
          }
        }
      } catch (mysqli_sql_exception) {
        echo"Registration Failed!";
      }
    }
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Login &amp; Registration Form</title>
  <link rel="stylesheet" href="./style.css">

</head>

<body>
  <div class="container">
    <div class="message register">
      <div class="btn-wrapper">
        <button class="button" id="register">Register</button>
        <button class="button" id="login"> Login</button>
      </div>
    </div>
    <div class="form form--register">
      <div class="form--heading">Welcome! Sign Up</div>
      <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" autocomplete="off">
        <input type="text" name="username" placeholder="Username">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <button type="submit" name="register" class="button">Register</button>
      </form>
    </div>
    <div class="form form--login">
      <div class="form--heading">Welcome back! </div>
      <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" autocomplete="off">
        <input type="text" name="username-login" placeholder="Username">
        <input type="password" name="password-login" placeholder="Password">
        <button type="submit" name="login" class="button">Login</button>
      </form>
    </div>
  </div>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
  <script src="./script.js"></script>

</body>

</html>