<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body{
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .form{
            width: 400px;
        }
    </style>
</head>
<body>
    <h1>Login Form Without CSRF Token</h1>
    <form action="" method="post" class="form">
        <input type="text" name="username" id="" placeholder="name" class="form-control m-2">
        <input type="password" name="password" id="" placeholder="password" class="form-control m-2">
        <input type="submit" name="submit" class="form-control btn btn-primary m-2">
    </form>
    <?php
    if(isset($_POST['submit'])){
        echo "UserName : {$_POST['username']} <br>";
        echo "Password : {$_POST['password']}";
    }
    ?>
</body>
</html>