<?php
session_start();
include 'include/koneksi.php';
if (isset($_POST['login'])) {
    $email=$_POST['email'];
    $password=$_POST['password'];

    global $conn;
    $stmt = $conn->prepare("SELECT * FROM admin WHERE email = ? AND password = ?");
    $stmt ->bind_param('ss', $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    $admin = $result->fetch_assoc();
    if($result->num_rows == 1) {
        $_SESSION['admin'] = $admin;
        header("location: http://localhost/drillsuhail/dashboard.php");
        exit();
}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login.php</title>
    <link rel="stylesheet" href="bootstrap/bootstrap1/css/bootstrap.rtl.css">
</head>
<body>

<div class="container d-flex justify-content-center  mt-5   ">
    <div class="col-5 border my-5 bg-warning">
        <h1 class="mt-3 text-center">LOGIN</h1>
        <form action="login.php" method="post" class="mx-3 my-3" >
            <div class="mt-3">
                <label for="email">EMAIL</label>
                <input type="email" placeholder="email" class="form-control" name="email">
            </div>
            <div class="mt-3">
                <label for="password">PASSWORD</label>    
                <input type="password" placeholder="password" class="form-control" name="password">
            </div>
            <div class="mt-3">
                <button name="login" type="submit" class="btn btn-dark w-50 me-auto ms-auto d-block">LOGIN</button> 
            </div>
        </form>
    </div>
</div>
</body>
</html>
