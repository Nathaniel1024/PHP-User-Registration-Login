<?php
    if(isset($_POST["logout"])){
        header("Location: index.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="welcome.css">
</head>

<body>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
        <!-- Inspired by https://bert.house/en/-->
        <div class="center">
            <h1>WELCOME</h1>
            <input type="submit" name="logout" class="btn" value="Logout">
        </div>
    </form>
</body>

</html>