<?php
include '../include/koneksi.php';
include '../include/function.php';
include '../part/header.php';

if (isset($_POST['addgud'])) {
    $nama_gudang = $_POST['nama_gudang'];
    $lokasi = $_POST['lokasi'];

    if(addgud($nama_gudang,$lokasi)) {
        $data_berhasil = "data berhasil di tambah";
    }
}

?>
<?php include '../part/sidebar.php'; ?>

<div class="card col-9 me-auto ms-auto d-block p-5 mt-5 shadow-lg">
        <?php if(isset($data_berhasil)): ?>
            <div class="alert alert-success">
                <?= $data_berhasil ?>
            </div>
        <?php endif; ?>
       
        <h2 class="text-center mb-3">Tambah Gudang</h2>
        <form action="addgud.php" method="post">
            <div class="mb-3">
                <label for="nama_gudang">Nama Gudang</label>
                <input type="text" id="nama_gudang" class="form-control" name="nama_gudang" placeholder="nama gudang">
            </div>
            <div class="mb-3">
                <label for="lokasi">Lokasi Gudang</label>
                <input type="text" id="lokasi" class="form-control" name="lokasi" placeholder="lokasi"> 
            </div>
            
            <button type="submit" name="addgud" class="btn btn-primary">Tambah gudang</button>
            <a href="gudang.php" class="btn btn-danger">back to menu</a>
        </form>
    </div>