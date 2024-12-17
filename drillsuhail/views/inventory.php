<?php
session_start();
if(!isset($_SESSION['admin'])){
    header("location: http://localhost/drillsuhail/login.php");
    exit();
}
include '../include/koneksi.php';
include '../include/function.php';
include '../part/header.php';


$search = isset($_GET['search']) ? $_GET['search'] : '';
$inven = getallInv($search);

if (isset($_GET['deleteinv'])) {
    $id_inv = $_GET['deleteinv'];
    deleteinv($id_inv);
    header('location: ../views/inventory.php');
    exit();
}

?>
<?php include '../part/sidebar.php' ?>


<div class=" col-12 me-auto ms-auto d-block p-5 row ">

        <h2>tabel inventory</h2>
        <form action="inventory.php" method="get">
        <div class="d-flex my-4">
            <input type="text" class="form-control" name="search" id="search" placeholder="Cari barang...">
            <button type="submit" class="btn btn-primary mx-3">Cari</button>
        </div>
        <div class="my-2">
            <a href="inventory.php" class="btn btn-warning">refresh </a>
            <a href="addinv.php" class="btn btn-primary">tambah </a>

        </div>
    </form>
    <?php $alert = false;
    foreach( $inven as $i ):
        if( $i['stok_barang'] == 0 AND !$alert):
     ?>
     <div class="alert alert-danger">
        <h6>Stok Ada yang habis</h6>
     </div>
    <?php $alert = true ?>
    <?php endif;
    endforeach;?>
        <table class="table table-bordered table-light table-striped">
            <tr class="">
                <th>no</th>
                <th>nama vendor</th>
                <th>nama barang</th>
                <th>Jenis barang</th>
                <th>stok </th>
                <th>barcode</th>
                <th>harga</th>
                <th>nama gudang</th>
                <th>action </th>
            </tr>
            <?php $no = 1; 
                foreach($inven as $i): ?>
                    <tr class="<?= $i['stok_barang'] == 0 ? 'table-danger' : '' ?>">
                <td><?= $no++ ?></td>
                <td><?= $i['nama_vendor'] ?></td>
                <td><?= $i['nama_barang'] ?></td>
                <td><?= $i['jenis_barang'] ?></td>
                <td><?= $i['stok_barang'] ?></td>
                <td><?= $i['barcode'] ?></td>
                <td><?= $i['harga'] ?></td>
                <td><?= $i['nama_gudang'] ?></td>
                <td>
                    <a class="btn btn-warning" href="editinv.php?updateinv=<?= $i['id_inv'] ?>">edit</a>
                    <a class="btn btn-danger" href="inventory.php?deleteinv=<?= $i['id_inv'] ?>" onclick="return confirm('Yakin Di Hapus?')">delete</a>
                </td>
            </tr>
                <?php endforeach; ?>
        </table>
    </div>