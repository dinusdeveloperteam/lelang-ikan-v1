<div class="main-panel">
    <!--content-->
    <div class="content-wrapper">
        <!-- partials breadcrumb start -->
        <?php $this->load->view("panitia/partials/breadcrumb.php"); ?>
        <!-- partilas breadcrumb end -->
        <!-- pelelang -->
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body shadow-sm rounded">
                        <!-- <h4 class="card-title">10 Transaksi Terbaru</h4> -->
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pelelang</th>
                                        <th>Produk</th>
                                        <th>Gambar 1</th>
                                        <th>Gambar 2</th>
                                        <th>Gambar 3</th>
                                        <th>Gambar 4</th>
                                        <th>Harga Awal</th>
                                        <th>Harga Min</th>
                                        <th>Kelipatan Tawar</th>
                                        <th>Tanggal Mulai</th>
                                        <th>Tanggal Selesai</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count = 0;
                                    foreach ($pembukaanlelang as $row) {
                                        $count = $count + 1;
                                    ?>
                                        <td><?= $count ?></td>
                                        <td><?= $row['nama'] ?></td>
                                        <td><?= $row['produk'] ?></td>

                                        <td><img src="<?= base_url('assets/uploads/produk/') . $row['image1']; ?>" alt="Gambar Ikan" width="75px" height="75px" class="zoom"></td>
                                        <td><img src="<?= base_url('assets/uploads/produk/') . $row['image2']; ?>" alt="Gambar Ikan" width="75px" height="75px" class="zoom"></td>
                                        <td><img src=" <?= base_url('assets/uploads/produk/') . $row['image3']; ?>" alt="Gambar Ikan" width="75px" height="75px" class="zoom"></td>
                                        <td><img src=" <?= base_url('assets/uploads/produk/') . $row['image4']; ?>" alt="Gambar Ikan" width="75px" height="75px" class="zoom"></td>
                                        <td>Rp <?= number_format($row['harga_awal']) ?></td>
                                        <td>Rp <?= number_format($row['harga_minimal_diterima']) ?></td>
                                        <td>Rp <?= number_format($row['incremental_value']) ?></td>
                                        <td><?= $row['tgl_mulai'] ?></td>
                                        <td><?= $row['tgl_selesai'] ?></td>
                                        <td>
                                            <a href="<?= base_url('panitia/pembukaanlelang/detail/' . $row['lelang_id']) ?>" class="btn btn-sm btn-info"></i>Detail</a>
                                            <a href="" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deletePembukaanLelangModal<?= $row['lelang_id'] ?>">Hapus</a>
                                        </td>
                                        <!-- Modal Delete -->
                                        <div class="modal fade" id="deletePembukaanLelangModal<?= $row['lelang_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data Pembukaan Lelang</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <span>Yakin ingin hapus data?</span>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <a href="<?= base_url('panitia/pembukaanlelang/delete/' . $row['lelang_id']) ?>" class="btn btn-danger">Hapus</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Modal Delete -->
                                        </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>