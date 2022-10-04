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
                                        <th>Nama</th>
                                        <th>ID Pelelang</th>
                                        <th>Bank</th>
                                        <th>Atas Nama</th>
                                        <th>No Rekening</th>
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
                                            <td><?= $v['nama'] ?></td>
                                            <td><?= $v['pelelang_id'] ?></td>
                                            <td><?= $v['bank'] ?></td>
                                            <td><?= $v['atasnama'] ?></td>
                                            <td><?= $v['norekening'] ?></td>
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
                                                                <form action="<?= base_url('panitia/p_lelang/edit/' . $v['pelelang_id']) ?>" method="POST">
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col-6">
                                                                                <label for="basic-url">Nama </label>
                                                                                <div class="input-group mb-3">
                                                                                    <input type="text" class="form-control" name="pelelang_id" id="pelelang_id" value="<?= $v['nama'] ?>" aria-describedby="basic-addon3" readonly>
                                                                                </div>
                                                                                <label for="basic-url">ID Pelelang</label>
                                                                                <div class="input-group mb-1">
                                                                                    <input type="text" class="form-control" name="peserta_id" id="peserta_id" value="<?= $v['pelelang_id'] ?>" aria-describedby="basic-addon3" readonly>
                                                                                </div>
                                                                                <label for="basic-url">Bank</label>
                                                                                <div class="input-group mb-1">
                                                                                    <input type="text" class="form-control" name="nama_peserta" id="nama_peserta" value="<?= $v['bank'] ?>" aria-describedby="basic-addon3" readonly>
                                                                                </div>
                                                                                <label for="basic-url">Atas Nama</label>
                                                                                <div class="input-group mb-1">
                                                                                    <input type="text" class="form-control" name="nama_produk" id="nama_produk" value="<?= $v['atasnama'] ?>" aria-describedby="basic-addon3" readonly>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <label for="basic-url">No Rekening</label>
                                                                                <div class="input-group mb-3">
                                                                                    <input type="text" class="form-control" name="tanggal_pembayaran" id="tanggal_pembayaran" value="<?= $v['norekening'] ?>" aria-describedby="basic-addon3" readonly>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer bg-white">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                                        <button type="submit" class="btn btn-success">Simpan</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Detail -->


                                                <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#deletepenjualModal<?= $v['pelelang_id'] ?>"><i class="fas fa-trash-can"></i>Bayar</a>
                                                <div class="modal fade" id="deletepenjualModal<?= $v['pelelang_id'] ?>" tabindex="-1" aria-labelledby="deletepenjualModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content bg-light">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="deletepenjualModalLabel">Hapus Pembayaran</h5>
                                                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h4>Yakin ingin menghapus data?</h4>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                                                                <a href="<?= base_url() ?>panitia/p_lelang/delete/<?= $v['pelelang_id'] ?>" class="btn btn-danger">Ya</a>
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