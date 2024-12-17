<?php
session_start();
if(!isset($_SESSION['admin'])){
    header("location: http://localhost/drillsuhail/login.php");
    exit();
}
include '../include/function.php';
include '../include/koneksi.php';
include '../part/header.php';



if(isset($_GET['deleteVendor'])) {
    $id_vendor = $_GET['deleteVendor'];
    deleteVendor($id_vendor);
    header('location: http://localhost/drillsuhail/views/vendor.php');
    exit();
}

$vendors = getVendorAll();
?>
<?php include '../part/sidebar.php'; ?>
<main>
    
    <div class=" me-auto ms-auto d-block p-4   ">
        <h2>tabel vendor</h2>
        <a href="addven.php" class="btn btn-primary mb-3"> tambah</a>
        <table class="table table-bordered table-light table-striped">
            <tr class="border-black">
                <th>no.</th>
                <th>nama vendor</th>
                <th>nama barang</th>
                <th>kontak vendor</th>
                <th>no inv</th>
                <th>action </th>
            </tr>
            <?php $no = 1; 
                foreach($vendors as $ven): ?>
                    <tr>
                <td><?= $no++ ?></td>
                <td><?= $ven['nama_vendor'] ?></td>
                <td><?= $ven['nama_barang'] ?></td>
                <td><?= $ven['kontak_vendor'] ?></td>
                <td><?= $ven['no_inv'] ?></td>
                <td>
                    <a class="btn btn-warning" href="editVendor.php?updateVen=<?= $ven['nama_vendor'] ?>">edit</a>
                    <a class="btn btn-danger" href="vendor.php?deleteVendor=<?= $ven['id_vendor'] ?>" onclick="return confirm('Yakin Di Hapus?')">delete</a>
                </td>
            </tr>
                <?php endforeach; ?>
        </table>
    </div>
</main>