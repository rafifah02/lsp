<?php
session_start();
if(!isset($_SESSION['admin'])){
    header("location: http://localhost/drillsuhail/login.php");
    exit();
}
include '../include/koneksi.php';
include '../include/function.php';
include '../part/header.php';

$nama_vendor = '';
$nama_barang = '';
$id_gudang = '';

if (isset($_POST['addInv'])) {
    $nama_vendor = $_POST['nama_vendor'];
    $nama_barang = $_POST['nama_barang'];
    $jenis_barang = $_POST['jenis_barang'];
    $stok_barang = $_POST['stok_barang'];
    $barcode = $_POST['barcode'];
    $harga = $_POST['harga'];
    $id_gudang = $_POST['id_gudang'];

    $vendor = getVendorByName($nama_vendor);
    if ($vendor) {
        $id_vendor = $vendor['id_vendor'];
        if (addInv( $nama_barang, $jenis_barang, $stok_barang, $barcode, $harga, $id_vendor, $id_gudang) == true) {
            $data_berhasil = "data berhasil di tambahkan";
        }
    }

}
$inven= getallinv();
$vendors= getVendorAll();
$gudang= getGudangAll();

$unique_barang=[];
foreach ($vendors as $v) {
    $unique_barang[$v['nama_barang']]=$v;
}

$vendor = [];
if (isset($_POST['nama_barang'])) {
    $nama_barang = $_POST['nama_barang'];
    $vendor = getvendorBybarangName($nama_barang);
}

?>
<?php include '../part/sidebar.php'; ?>

<main class="card col-9 me-auto ms-auto d-block p-5 mt-5 mb-5 shadow-lg">
    <h2 class="text-center mb-3">Kelola Inventory</h2>
    <?php if(isset($data_berhasil)): ?>
            <div class="alert alert-success">
                <?= $data_berhasil ?>
            </div>
        <?php endif; ?>
    <form action="addinv.php" method="post" class="d-flex flex-column p-3">
    <div class="mb-3">
            <label for="nama_barang" class="form-label">Nama Barang</label>
            <select name="nama_barang" id="nama_barang" class="form-select" onchange="this.form.submit();">
                <?php foreach ($unique_barang as $b) { ?>
                    <option value="<?= $b['nama_barang']; ?>" <?= $nama_barang == $b['nama_barang'] ? 'selected':''?> >
                        <?= $b['nama_barang'] ?>
                    </option>
                <?php } ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="nama_vendor" class="form-label">Nama Vendor</label>
            <select name="nama_vendor" id="nama_vendor" class="form-select" >
                <?php foreach ($vendor as $v) { ?>
                    <option value="<?= $v['nama_vendor']; ?> "<?= $nama_vendor == $v['nama_vendor']? 'selected':''?> >
                        <?= $v['nama_vendor'] ?>
                    </option>
                <?php } ?>
            </select>
        </div>
    <div class="mb-3">
        <label for="jenis_barang" class="form-label">Jenis Barang</label>
        <input type="text" name="jenis_barang" class="form-control">
    </div>
    <div class="mb-3">
        <label for="stok_barang" class="form-label">Stok Barang</label>
        <input type="text" name="stok_barang" class="form-control">
    </div>
    <div class="mb-3">
        <label for="barcode" class="form-label">Barcode</label>
        <input type="text" name="barcode" class="form-control">
    </div>
    <div class="mb-3">
        <label for="harga" class="form-label">Harga</label>
        <input type="text" name="harga" class="form-control">
    </div>
    <div class="mb-3">
            <label for="id_gudang" class="form-label">Gudang</label>
            <select name="id_gudang" id="id_gudang" class="form-select" >
                <?php foreach ($gudang as $g) { ?>
                    <option value="<?= $g['id_gudang']; ?> "<?= $id_gudang == $g['id_gudang']? 'selected':''?> >
                        <?= $g['nama_gudang'] ?>
                    </option>
                <?php } ?>
            </select>
        </div>
    <button type="submit" name="addInv" class="btn btn-primary">Tambah Inventory</button>
</form>
    
</main>