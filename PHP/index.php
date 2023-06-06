<?php
require 'function.php';
if(isset($_SESSION["id"])){
    $id=$_SESSION["id"];
    $user=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM tb_user WHERE id=$id"));
}
else{
    header("Location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" type="text/css" href="../CSS/indexstyle.css"></link>
</head>
<body>
    <div class="container">
    <h1>Welcome <?php echo $user["name"];?> !</h1><br>
    <br>
    <h1>your username was <?php echo $user["username"];?></h1><br>
    <a href="logout.php">logout</a>
    </div>
</body>
</html>