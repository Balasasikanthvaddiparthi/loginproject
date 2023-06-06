<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "loginregister");

if (isset($_POST["action"])) {
    if ($_POST["action"] == "register") {
        register();
    } else if ($_POST["action"] == "login") {
        login();
    }
}

function register()
{
    global $conn;
    $name = $_POST["name"] ?? '';
    $username = $_POST["username"] ?? '';
    $password = $_POST["password"] ?? '';
    if (empty($name) || empty($username) || empty($password)) {
        echo "Fill out the form";
        exit;
    }

    // Check if the username already exists
    $stmt = mysqli_prepare($conn, "SELECT * FROM tb_user WHERE username=?");
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) > 0) {
        echo "Username already exists";
        exit;
    }

    // Insert new user
    $stmt = mysqli_prepare($conn, "INSERT INTO tb_user (name, username, password) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sss", $name, $username, $password);
    mysqli_stmt_execute($stmt);
    echo "Registration successful";
}

function login()
{
    global $conn;
    $username = $_POST["username"] ?? '';
    $password = $_POST["password"] ?? '';

    // Fetch user details
    $stmt = mysqli_prepare($conn, "SELECT * FROM tb_user WHERE username=?");
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($password == $row['password']) {
            // Perform the login process
            // Add your code here for logging in the user
            echo "Login successful";
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
        } else {
            echo "Incorrect password";
        }
    } else {
        if (empty($username) || empty($password)) {
            echo "Fill out the form";
        } else {
            echo "User not registered";
        }
        exit;
    }
}
?>
