<?php
session_start();
if(!isset($_SESSION['admin'])){
    header("location: http://localhost/drillsuhail/login.php");
    exit();
}
include '../include/koneksi.php';
include '../include/function.php';
include '../part/header.php';


$gudang = getGudangAll();
if(isset($_GET['delete'])) {
    $id_gudang = $_GET['delete'];
    deletegud($id_gudang);
    header ('location: ../views/gudang.php');
    exit();
}
?>
<?php include '../part/sidebar.php'; ?>

<div class="  me-auto ms-auto d-block p-5   ">
        <h2>tabel gudang</h2>
        <a href="addgud.php" class="btn btn-primary mb-3"> tambah</a>
        <table class="table table-bordered table-light table-striped">
            <tr class="border-black">
                <th>no</th>
                <th>nama gudang</th>
                <th>Lokasi</th>
                <th>aksi </th>
            </tr>
            <?php $no = 1; 
                foreach($gudang as $g): ?>
                    <tr>
                <td><?= $no++ ?></td>
                <td><?= $g['nama_gudang'] ?></td>
                <td><?= $g['lokasi'] ?></td>
                <td>
                    <!-- <a class="btn btn-warning" href="editgud.php?updategud=<?= $g['nama_gudang'] ?>">edit</a> -->
                    <a class="btn btn-danger" href="gudang.php?delete=<?= $g['id_gudang'] ?>" onclick="return confirm('Yakin Di Hapus?')">delete</a>
                </td>
            </tr>
                <?php endforeach; ?>
        </table>
    </div>