<!doctype html>
<html lang="en">

<head>
    <title>Surat Perintah Pengiriman</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

</head>

<body>

    <div class="container-fluid">
        <div class="">
            <img src="assets/logo_lelang.jpg" alt="" width="150" style="float: left;">
            <h3 class="text-center" style="font-family:Arial, Helvetica, sans-serif;">Surat Perintah Pengiriman Barang</h3>
            <p class="text-center"><b>Kabupaten Kendal, Jawa Tengah 123, Indonesia <br> HP: +62 889-3319-886, EMAIL: lelangikan@gmail.com</b></p>
        </div>

        <table class="table table-bordered text-center mt-5" style="font-size: 12px;">
            <thead>
                <tr>
                    <th>ID Lelang</th>
                    <th>ID Pesrta</th>
                    <th>Tanggal Diumumkan</th>
                    <th>Tanggal Pembayaran</th>
                    <th>Bukti Pembayaran</th>
                    <th>Konfirmasi Terima Produk</th>
                    <th>Provinsi</th>
                    <th>Kota</th>
                    <th>Kecamatan</th>
                    <th>Kelurahan</th>
                    <th>Alamat</th>
                    <th>Status Pembayaran</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($sp as $row) { ?>
                    <tr>
                        <td><?= $row['lelang_id'] ?></td>
                        <td><?= $row['peserta_id'] ?></td>
                        <td><?= $row['tgl_diumumkan'] ?></td>
                        <td><?= $row['tgl_bayar'] ?></td>
                        <td><?= $row['bukti_bayar'] ?></td>
                        <td><?= $row['konfirmasi_terimaproduk'] ?></td>
                        <td><?= $row['provinsi_kirim'] ?></td>
                        <td><?= $row['kota_kirim'] ?></td>
                        <td><?= $row['kecamatan_kirim'] ?></td>
                        <td><?= $row['kelurahan_kirim'] ?></td>
                        <td><?= $row['alamat_kirim'] ?></td>
                        <td><?= $row['status'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</body>

</html>