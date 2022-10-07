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
                                            <a href="<?= base_url(); ?>panitia/pembukaanlelang/detail/<?= $row['lelang_id']; ?>" class="btn btn-sm btn-info mr-2"><i class="fa fa-info-circle"></i>Detail</a>
                                            <a href="<?= base_url(); ?>panitia/pembukaanlelang/deletecalonpemenang/<?= $row['lelang_id']; ?>" class="btn btn-sm btn-danger mr-2"><i class="fa fa-info-circle"></i>Hapus</a>
                                        </td>
                                        <!-- Edit Menu Modal -->



                                        <div class="modal fade" id="deletepenjualModal<?= $row['lelang_id'] ?>" tabindex="-1" aria-labelledby="deletepenjualModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content bg-light">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deletepenjualModalLabel">Konfirmasi Calon Pemenang</h5>
                                                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h4>Apakah Data Sudah Benar?</h4>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                                                        <a href="<?= base_url() ?>panitia/pembukaanlelang/update/<?= $row['lelang_id'] . "/" . $row['peserta_id'] ?>" class="btn btn-danger">Ya</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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