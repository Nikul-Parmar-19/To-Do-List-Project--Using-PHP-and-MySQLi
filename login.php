<?php
session_start();
// Connect to Database
$servername = "localhost";
$username = "root";
$password = "";
$database = "dbtodo";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Sorry, we failed to connect : " . mysqli_connect_error());
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
</head>

<body>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $login = $_POST['login'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE login='$login' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);

        if ($num == 1) {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $login;
            header("location: index.php");
        } else {
            $error_message = "Enter a correct Login ID or Password";
        }
    }

    ?>
    <div class="container">
        <div class="login-form">
            <h2>Login</h2>
            <?php
            if (isset($error_message)) {
                echo "<div class='error-message'>" . $error_message . "</div>";
            }
            ?>
            <form action="login.php" method="post">
                <div class="mb-3">
                    <label for="login" class="form-label">Login ID</label>
                    <input type="text" class="form-control" id="login" name="login">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
</body>

</html>