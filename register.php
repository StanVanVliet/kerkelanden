<?php
$melding = "";
if (isset($_POST['submit'])) {
    require_once "./classes/user.php";

    $user = new User();

    if($result = $user->register($_POST)){
        $melding = $result;
        header("Location: register.php");
    } else {
        $melding = "Er is iets misgegaan tijdens de registratie!";
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
    <title>Registreer</title>
</head>
<body>
    
<div class="container">     
    <form class="form" method="POST">
        <h1 class="title">Registreer</h1>
        <span class="input">
            <label for="username">username: </label>
            <input type="text" name="username">
        </span>
        <span class="input">
            <label for="password">password: </label>
            <input type="password" name="password">
        </span>
        <span class="input">
            <label for="naam">naam: </label>
            <input type="text" name="naam">
        </span>
        <span class="input">
            <label for="adres">adres: </label>
            <input type="text" name="adres">
        </span>
        <span class="input">
            <label for="geboortedatum">geboortedatum: </label>
            <input type="date" name="geboortedatum">
        </span>
        <span class="input">
            <label for="tel_nr">telefoonnummer: </label>
            <input type="number" name="tel_nr">
        </span>
        <span class="input">
            <label for="rol">rol: </label>
            <input type="text" name="rol">
        </span>
        <div class="buttons">
            <input type="submit" name="submit" value="Registreer">
            <a href="inloggen.php">Login</a>
        </div>
    </form>
    <?php echo $melding; ?>
</div>

</body>
</html>
