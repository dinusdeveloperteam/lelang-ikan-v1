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
                    <div class="card-body shadow-sm">
                        <!-- <h4 class="card-title">10 Transaksi Terbaru</h4> -->
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Lelang</th>
                                        <th>ID Panitia</th>
                                        <th>Tanggal Pembayaran</th>
                                        <th>Nominal Dibayarkan</th>
                                        <th>Bukti Pembayaran</th>
                                        <th>Status</th>
                                        <th width="15%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count = 0;
                                    foreach ($lelang_pembayaran as $v) {
                                        $count = $count + 1;

                                    ?>
                                        <tr>
                                            <td><?= $count ?></td>
                                            <td><?= $v['lelang_id'] ?></td>
                                            <td><?= $v['panitia_id'] ?></td>
                                            <td><?= $v['tgl_pembayaran'] ?></td>
                                            <td><?= $v['nominal_dibayarkan'] ?></td>
                                            <td><?= $v['bukti_pembayaran'] ?></td>
                                            <td> <?php
                                                    if ($v['status'] == 0) {
                                                        echo "<span class='badge badge-secondary'>Belum Dibayar</span>";
                                                    } else if ($v['status'] == 1) {
                                                        echo "<span class='badge badge-success'>Telah Dibayar</span>";
                                                    } else if ($v['status'] == 2) {
                                                        echo "<span class='badge badge-danger'>Ditolak</span>";
                                                    } else {
                                                        echo 'Data tidak diketahui';
                                                    }
                                                    ?>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-info" data-toggle="modal" data-target="#editMenuModal<?= $v['lelang_id'] ?>"><i class="mdi mdi-file-document-edit"></i> Ubah</a>
                                                <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deletePembayaranModal<?= $v['lelang_id'] ?>"><i class="mdi mdi-delete-forever"></i> Hapus</a>
                                                <!-- Edit Menu Modal -->
                                                <div class="modal fade" id="editMenuModal<?= $v['lelang_id'] ?>" tabindex="-1" aria-labelledby="editOrderModal" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl">
                                                        <div class="modal-content bg-default">
                                                            <div class="modal-header bg-white">
                                                                <h5 class="modal-title font-weight-bold" id="editOrderModal">Detail Pembayaran Lelang</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body text-dark font-weight-bold bg-white">
                                                                <form action="<?= base_url('panitia/pembayaran/edit/' . $v['lelang_id']) ?>" method="POST">
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col-6">
                                                                                <label for="basic-url">ID Lelang </label>
                                                                                <div class="input-group mb-3">
                                                                                    <input type="text" class="form-control" name="lelang_id" id="lelang_id" value="<?= $v['lelang_id'] ?>" aria-describedby="basic-addon3" readonly>
                                                                                </div>
                                                                                <label for="basic-url">ID Peserta</label><br>
                                                                                <div class="input-group mb-1">
                                                                                    <input type="text" class="form-control" name="peserta_id" id="peserta_id" value="<?= $v['peserta_id'] ?>" aria-describedby="basic-addon3" readonly>
                                                                                </div><br>
                                                                                <label for="basic-url">Nama Peserta</label><br>
                                                                                <div class="input-group mb-1">
                                                                                    <input type="text" class="form-control" name="nama_peserta" id="nama_peserta" value="<?= $v['nama_peserta'] ?>" aria-describedby="basic-addon3" readonly>
                                                                                </div><br>
                                                                                <label for="basic-url">Nama Produk</label><br>
                                                                                <div class="input-group mb-1">
                                                                                    <input type="text" class="form-control" name="produk" id="produk" value="<?= $v['produk'] ?>" aria-describedby="basic-addon3" readonly>
                                                                                </div><br>
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <label for="basic-url">Tanggal Pembayaran</label>
                                                                                <div class="input-group mb-3">
                                                                                    <input type="text" class="form-control" name="tgl_pembayaran" id="tgl_pembayaran" value="<?= $v['tgl_pembayaran'] ?>" aria-describedby="basic-addon3" readonly>
                                                                                </div>
                                                                                <label for="basic-url">Nominal Dibayarkan</label><br>
                                                                                <div class="input-group mb-1">
                                                                                    <input type="text" class="form-control" name="nominal_dibayarkan" id="nominal_dibayarkan" value="Rp <?= number_format($v['nominal_dibayarkan']) ?>" aria-describedby="basic-addon3" readonly>
                                                                                </div><br>
                                                                                <label for="basic-url">Status Dibayarkan</label><br>
                                                                                <div class="input-group mb-1">
                                                                                    <select class="custom-select" name="status" id="status">
                                                                                        <?php
                                                                                        $data = $v['status'];
                                                                                        if ($data == 0) {
                                                                                            $status = 'Belum dibayar';
                                                                                        } else if ($data == 1) {
                                                                                            $status = 'Telah dibayar';
                                                                                        } else if ($data == 2) {
                                                                                            $status = 'Ditolak';
                                                                                        } else {
                                                                                            $status = 'Data tidak diketahui';
                                                                                        }
                                                                                        ?>
                                                                                        <option value=""><?= $status ?></option>
                                                                                        <option value="0">Belum dibayar</option>
                                                                                        <option value="1">Telah dibayar</option>
                                                                                        <option value="2">Ditolak</option>
                                                                                    </select>
                                                                                </div><br>
                                                                                <label for="basic-url">Bukti Pembayaran</label><br>
                                                                                <div class="input-group mb-1">
                                                                                    <img src="<?= base_url('vendors/images/pembayaran/' . $v['bukti_pembayaran']) ?>" class="img" style="width:200px; height:200px;" alt="Gambar Bukti Transfer <?= $v['bukti_pembayaran'] ?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Detail -->

                                                <!-- Modal Delete -->
                                                <div class="modal fade" id="deletePembayaranModal<?= $v['lelang_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Hapus Data Pembayaran</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <span>Yakin ingin hapus data?</span>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <a href="<?= base_url('panitia/pembayaran/delete/' . $v['lelang_id']) ?>" class="btn btn-danger">Hapus</a>
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