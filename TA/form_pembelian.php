<?php
$hostname = "localhost"; //hostname
$username = "root";      //username untuk login ke mysql
$password = "";          //password untuk login ke mysql
$database = "gym";       //nama database
$konek = new mysqli($hostname, $username, $password, $database);
if ($konek->connect_error) {
    //jika terjadi error, matikan proses dengan die() atau exit();
    die('Maaf koneksi gagal: ' . $konek->connect_error);
}
$nama = "";
$email = "";
$no_telp = "";
$paket_member = "";
$catatan = "";
$sukses = "";
$error = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
if ($op == 'delete') {
    $id_member = $_GET['id'];
    $sql1 = "DELETE FROM member WHERE id_member ='$id_member'";
    $q1 = mysqli_query($konek, $sql1);
    if ($q1) {
        $sukses = "Data berhasil dihapus";
    } else {
        $error = "Data gagal dihapus";
    }
}
if ($op == 'edit') {
    $id_member = $_GET['id'];
    $sql1 = "SELECT * FROM member WHERE id_member = '$id_member'";
    $q1 = mysqli_query($konek, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $nama = $r1['nama'];
    $email = $r1['email'];
    $no_telp = $r1['no_telp'];
    $paket_member = $r1['paket_member'];
    $catatan = $r1['catatan'];

    if ($id_member == '') {
        $error = "Data tidak ditemukan";
    }
}
if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $no_telp = $_POST['no_telp'];
    $paket_member = $_POST['paket_member'];
    $catatan = $_POST['catatan'];

    //query insert data mahasiswa
    if ($nama && $email && $no_telp && $paket_member && $catatan) {
        if ($op == 'edit') { //untuk update
            $sql1 = "UPDATE member SET nama = '$nama', email = '$email', no_telp = '$no_telp', paket_member = '$paket_member', catatan = '$catatan' WHERE id_member = '$id_member'";
            $q1 = mysqli_query($konek, $sql1);
            if ($q1) {
                $sukses = "Data berhasil diubah";
            } else {
                $error = "Data gagal diubah";
            }
        } else { //untuk insert
            $sql1 = "INSERT INTO member(nama, email, no_telp, paket_member, catatan) VALUES('$nama','$email','$no_telp','$paket_member','$catatan')";
            $q1 = mysqli_query($konek, $sql1);
            if ($q1) {
                $sukses = "Berhasil memasukkan data baru";
            } else {
                $error = "Gagal memasukkan data baru";
            }
        }
    } else {
        $error = "Silahkan masukkan semua data";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Member</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .mx-auto {
            width: 800px;
            /* Background image from gallery */
            background-image: url('assets/images/bcgym.jpg');
            /* Set background size to cover the entire container */
            background-size: cover;
            /* Center the background image */
            background-position: center;
            /* Add some opacity to make text readable */
            opacity: 0.9;
        }

        .card {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="mx-auto">
        <!-- untuk memasukkan data  -->
        <div class="card">
            <div class="card-header text-white bg-secondary">
                Create / Edit Data
            </div>
            <div class="card-body">
                <?php
                if ($error) {
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error; ?>
                    </div>
                    <?php
                    header("refresh:5;url=form_pembelian.php"); // 5=detik
                }
                ?>
                <?php
                if ($sukses) {
                    ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses; ?>
                    </div>
                    <?php
                    header("refresh:5;url=form_pembelian.php");
                }
                ?>
                <form action="" method="POST">
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">NAMA</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email" class="col-sm-2 col-form-label">EMAIL</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="email" name="email"
                                value="<?php echo $email ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="no_telp" class="col-sm-2 col-form-label">NOMOR TELEPON/WA</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="no_telp" name="no_telp"
                                value="<?php echo $no_telp ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="paket_member" class="col-sm-2 col-form-label">PAKET MEMBER</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="paket_member" id="paket_member">
                                <option value="">- PILIH PAKET -</option>
                                <option value="HARIAN" <?php if ($paket_member == "HARIAN")
                                    echo "selected" ?>>Paket Harian - IDR 50.000 / pax</option>
                                    <option value="MINGGUAN" <?php if ($paket_member == "MINGGUAN")
                                    echo "selected" ?>>Paket Mingguan - IDR 300.000 / pax</option>
                                    <option value="BULANAN" <?php if ($paket_member == "BULANAN")
                                    echo "selected" ?>>Paket Bulanan - IDR 9.000.000 / pax</option>
                                    <option value="TAHUNAN" <?php if ($paket_member == "TAHUNAN")
                                    echo "selected" ?>>Paket Tahunan - IDR 100.000.000 / pax</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="catatan" class="col-sm-2 col-form-label">CATATAN</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="catatan" name="catatan"
                                    value="<?php echo $catatan ?>">
                        </div>
                    </div>
                    <div class="col-12">
                        <input type="Submit" name="simpan" value="Simpan Data" class="btn btn-primary">
                        <a href="halamanmember.php" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>

        <!--- untuk mengeluarkan data  -->
        <div class="card">
            <div class="card-header text-white bg-secondary">
                Riwayat Member
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">NAMA</th>
                            <th scope="col">EMAIL</th>
                            <th scope="col">WA</th>
                            <th scope="col">PAKET MEMBER</th>
                            <th scope="col">CATATAN</th>
                            <th scope="col">Action</th>
                        </tr>
                    <tbody>
                        <!-- menampilkan data dari database -->
                        <?php
                        $sql2 = "SELECT * FROM member ORDER BY id_member DESC";
                        $q2 = mysqli_query($konek, $sql2);
                        $urut = 1;
                        while ($r2 = mysqli_fetch_array($q2)) {
                            $id_member = $r2['id_member'];
                            $nama = $r2['nama'];
                            $email = $r2['email'];
                            $no_telp = $r2['no_telp'];
                            $paket_member = $r2['paket_member'];
                            $catatan = $r2['catatan'];

                            ?>
                            <tr>
                                <th scope="row">
                                    <?php echo $urut++ ?>
                                </th>
                                <td scope="row">
                                    <?php echo $nama ?>
                                </td>
                                <td scope="row">
                                    <?php echo $email ?>
                                </td>
                                <td scope="row">
                                    <?php echo $no_telp ?>
                                </td>
                                <td scope="row">
                                    <?php echo $paket_member ?>
                                </td>
                                <td scope="row">
                                    <?php echo $catatan ?>
                                </td>
                                <td scope="row">
                                    <a href="form_pembelian.php?op=edit&id=<?php echo $id_member ?>"><button type="button"
                                            class="btn btn-warning">Edit</button></a>
                                    <a href="form_pembelian.php?op=delete&id=<?php echo $id_member ?>"
                                        onclick="return confirm('Yakin untuk hapus data?')"><button type="button"
                                            class="btn btn-danger">Delete</button></a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</body>

</html>