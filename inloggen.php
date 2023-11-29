<?php
$melding = "";
if (isset($_POST['submit'])) {
    require_once "classes/user.php";

    $user = new User();
    
    if($loggedIn = $user->login($_POST)){
        session_start();

        $_SESSION['ingelogd'] = true;

        header("location: index.php");
    } else {
        $melding = "Login gegevens niet juist!";
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>  
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/inloggen.css">
    <title>Login</title>
</head>
<body>
    
<div class="container">     
    <form class="form" action="" method="POST">
        <span class="input">
            <label for="username">Username: </label>
            <input type="text" name="username">
        </span>
        <span class="input">
            <label for="password">Password: </label>
            <input type="password" name="password">
        </span>
        <div class="buttons">
            <input type="submit" name="submit" value="Log In">
            <a href="/">register</a>
        </div>
    </form>
    <?php echo $melding; ?>
</div>

</body>
</html>