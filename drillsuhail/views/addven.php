<?php
include '../include/koneksi.php';
include '../include/function.php';
include '../part/header.php';

if (isset($_POST['addVendor'])){
    $nama_vendor = $_POST['nama_vendor'];
    $nama_barang = $_POST['nama_barang'];
    $kontak_vendor = $_POST['kontak_vendor'];
    $no_inv = $_POST['no_inv'];

    if(addVendor($nama_vendor, $nama_barang, $kontak_vendor, $no_inv) == true) {
        $data_berhasil = "data berhasil di tambah";
    } else {
        echo "<script>alert('data gagal ditambahkan')</script>";
    }
}
?>
<?php include '../part/sidebar.php' ?>

<div class="card col-9 me-auto ms-auto d-block p-5 mt-5 shadow-lg">
        <?php if(isset($data_berhasil)): ?>
            <div class="alert alert-success">
                <?= $data_berhasil ?>
            </div>
        <?php endif; ?>
        <h2 class="text-center mb-3">Tambah Vendor</h2>
        <form action="addven.php" method="post">
            <div class="mb-3">
                <label for="nama_vendor">Nama Vendor</label>
                <input type="text" id="nama_vendor" class="form-control" name="nama_vendor" placeholder="nama vendor">
            </div>
            <div class="mb-3">
                <label for="nama_barang">Nama Barang</label>
                <input type="text" id="nama_barang" class="form-control" name="nama_barang" placeholder="nama barang"> 
            </div>
            <div class="mb-3">
                <label for="kontak_vendor">kontak Vendor</label>
                <input type="text" id="kontak_vendor" class="form-control" name="kontak_vendor" placeholder="kontak vendor">
            </div>
            <div class="mb-3">
                <label for="no_inv">no. Invoice</label>
            <input type="text" name="no_inv" id="no_inv" class="form-control" placeholder="no invoice">
            </div>
            <button type="submit" name="addVendor" class="btn btn-primary">Tambah Vendor</button>
        </form>
    </div>
