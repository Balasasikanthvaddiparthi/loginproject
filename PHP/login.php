<?php
require 'function.php';
if(isset($_SESSION["id"])){
    header("Location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../CSS/regstyle.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<div class="container">
    <form action="" method="post">
        <h2>Login</h2>
        <input type="hidden" id="action" value="login">
        <div class="mb-3">
            <input type="text" class="form-control" id="username" placeholder="Username">
        </div>
        <div class="mb-3">
            <input type="password" class="form-control" id="password" placeholder="Password">
        </div>
        <button type="button" class="btn btn-primary" onclick="submitData();">Login</button>
        <br><br>
        <a href="register.php">Need to sign up?</a>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="../JS/script.js"></script>
</body>
</html>
