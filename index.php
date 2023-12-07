<?php 

session_start();
if($_SESSION['ingelogd'] === true){
    
} else{
    header("location: inloggen.php");    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/index.css">
    <title>Home</title>
</head>
<body>
    
</body>
</html>