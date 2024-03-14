<?php
session_start();
session_unset();
session_destroy();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Logout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="logout.css">
</head>

<body>

    <div class="logout-message">
    <h2>You have logged out</h2>
    <a href="login.php" class="btn btn-primary">Login again</a>
  </div>
</body>

</html>
