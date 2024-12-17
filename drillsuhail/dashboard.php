<?php
session_start();
if(!isset($_SESSION['admin'])){
    header("location: login.php");
    exit();
}
include 'include/koneksi.php';
include 'part/header.php';
?>
<div class="container d-flex">
    <div class=" me-auto ms-auto d-block ">
        <H1 class="ms-5 mx-10">SELAMAT DATANG</H1>
    </div>
</div>

<?php
include 'part/footer.php';
?>