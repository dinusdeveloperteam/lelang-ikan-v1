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
                                        <th>ID Lelang</th>
                                        <th>ID Pelelang</th>
                                        <th>ID Panitia</th>
                                        <th>Nama Panitia</th>
                                        <th>Nominal Dibayarkan</th>
                                        <th>Bukti Transfer</th>
                                        <th width="15%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count = 0;
                                    foreach ($Hasillelang as $v) {
                                        $count = $count + 1;

                                    ?>
                                        <tr>
                                            <td><?= $count ?></td>
                                            <td><?= $v['lelang_id'] ?></td>
                                            <td><?= $v['pelelang_id'] ?></td>
                                            <td><?= $v['panitia_id'] ?></td>
                                            <td><?= $v['nama'] ?></td>
                                            <td><?= $v['nominal_dibayarkan'] ?></td>
                                            <td><img src="<?= base_url('vendors/uploads/panitia/buktitransfer') . $v['bukti_transfer']; ?>" alt="Bukti Transfer" width="75px" height="75px" class="zoom"></td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-info mr-2" data-toggle="modal" data-target="#editMenuModal<?= $v['pelelang_id'] ?>"><i class="fas fa-edit"></i>Detail</a>
                                                <!-- Edit Menu Modal -->
                                                <div class="modal fade" id="editMenuModal<?= $v['pelelang_id'] ?>" tabindex="-1" aria-labelledby="editOrderModal" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl">
                                                        <div class="modal-content bg-default">
                                                            <div class="modal-header bg-white">
                                                                <h5 class="modal-title font-weight-bold" id="editOrderModal">Detail Pembayaran Lelang</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body text-dark font-weight-bold bg-white">
                                                                <form action="<?= base_url('panitia/hasillelang/halaman_edit/' . $v['lelang_id']) ?>" method="POST" enctype="multipart/form-data">
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col-6">
                                                                                <label for="basic-url">ID Lelang </label>
                                                                                <div class="input-group mb-3">
                                                                                    <input type="text" class="form-control" name="pelelang_id" id="pelelang_id" value="<?= $v['lelang_id'] ?>" aria-describedby="basic-addon3" readonly>
                                                                                </div>
                                                                                <label for="basic-url">ID Pelelang</label>
                                                                                <div class="input-group mb-1">
                                                                                    <input type="text" class="form-control" name="peserta_id" id="peserta_id" value="<?= $v['pelelang_id'] ?>" aria-describedby="basic-addon3" readonly>
                                                                                </div>
                                                                                <label for="basic-url">ID Panitia</label>
                                                                                <div class="input-group mb-1">
                                                                                    <input type="text" class="form-control" name="nama_peserta" id="nama_peserta" value="<?= $v['panitia_id'] ?>" aria-describedby="basic-addon3" readonly>
                                                                                </div>
                                                                                <label for="basic-url">Nama Panitia</label><br>
                                                                                <div class="input-group mb-1">
                                                                                    <input type="text" class="form-control" name="nama_produk" id="nama_produk" value="<?= $v['nama'] ?>" aria-describedby="basic-addon3" readonly>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <label for="basic-url">Nominal Dibayarkan</label>
                                                                                <div class="input-group mb-3">
                                                                                    <input type="text" class="form-control" name="nominal_dibayarkan" id="nominal_dibayarkan" value="<?= $v['nominal_dibayarkan'] ?>">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <label for="basic-url">Bukti Transfer</label>
                                                                                <div class="input-group mb-3">
                                                                                    <img src="<?= base_url('vendors/uploads/panitia/buktitransfer/') . $v['bukti_transfer'] ?>" alt="BuktiTF" width="200px">
                                                                                    <input type="file" class="form-control" name="bukti_transfer" id="bukti_transfer">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer bg-white">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                                        <button type="submit" class="btn btn-success">Bayar</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Detail -->

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