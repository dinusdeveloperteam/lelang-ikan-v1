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
                            <table id="example" class="table table-striped table-bordered" style="width:100%" class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Lelang ID</th>
                                        <th>Nama peserta</th>
                                        <th>Nama produk</th>
                                        <th>Tanggal Diumumkan</th>
                                        <th>Status Pembayaran</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count = 0;
                                    foreach ($PemenangLelang as $row) {
                                        $count = $count + 1;
                                    ?>
                                        <tr>
                                            <td><?= $count ?></td>
                                            <td><?= $row->lelang_id ?></td>
                                            <td><?= $row->nama ?></td>
                                            <td><?= $row->produk ?></td>
                                            <td><?= $row->tgl_diumumkan ?></td>
                                            <?php
                                            $verif = $row->status;
                                            if ($verif == 0) {
                                                $statusPembayaran = "<span class='badge badge-secondary'>Belum dibayar</span>";
                                            } else if ($verif == 1) {
                                                $statusPembayaran = "<span class='badge badge-success'>Telah dibayar</span>";
                                            } else if ($verif == 2) {
                                                $statusPembayaran = "<span class='badge badge-danger'>Ditolak</span>";
                                            } else {
                                                $statusPembayaran = "<span class='badge badge-warning'>Unknown</span>";
                                            }
                                            ?>
                                            <td><?= $statusPembayaran ?></td>
                                            <td>
                                                <div style="">
                                                    <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#editMenuModal<?= $row->peserta_id ?>"><i class="mdi mdi-check-circle"></i> Verifikasi</a>
                                                    <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deletePemenangModal<?= $row->peserta_id ?>"><i class="mdi mdi-delete-forever"></i> Hapus</a>
                                                    <a href="<?= base_url(); ?>panitia/suratpengiriman/update/<?= $row->lelang_id; ?>" class="btn btn-sm btn-info mr-2"><i class="fa fa-info-circle"></i>Pengiriman</a>
                                                </div>
                                                <!-- Edit Menu Modal -->
                                                <div class="modal fade" id="editMenuModal<?= $row->peserta_id ?>" tabindex="-1" aria-labelledby="editOrderModal" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl">
                                                        <div class="modal-content bg-default">
                                                            <div class="modal-header bg-white">
                                                                <h5 class="modal-title font-weight-bold" id="editOrderModal">Verifikasi Pemenang Lelang</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body text-dark font-weight-bold bg-white">
                                                                <form action="<?= base_url('panitia/pemenang/detail/') . $row->lelang_id ?>" method="post">
                                                                    <div class="input-group">
                                                                        <select class="custom-select" name="status" id="status">
                                                                            <option value="<?= $row->status ?>">
                                                                                <?php
                                                                                if ($row->status == 0) {
                                                                                    echo 'Belum dibayar';
                                                                                } else if ($row->status == 1) {
                                                                                    echo 'Telah dibayar';
                                                                                } else if ($row->status == 2) {
                                                                                    echo 'Ditolak';
                                                                                } else {
                                                                                    echo 'Unknown';
                                                                                }
                                                                                ?>
                                                                            </option>
                                                                            <option value="0">Belum dibayar</option>
                                                                            <option value="1">Telah dibayar</option>
                                                                            <option value="2">Ditolak</option>
                                                                        </select>
                                                                    </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- untuk kirim email
                                                <div class="modal fade" id="notifEmail" tabindex="-1" role="dialog" aria-labelledby="loginpelelangLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                    <a href="<?= base_url(); ?>panitia/pembukaanlelang/detail/<?= $row->lelang_id; ?>" class="btn btn-sm btn-success mr-2"><i class="fa fa-info-circle"></i>Pengiriman</a>
                                                    </div>
                                                </div> -->
                                                <!-- End Detail -->

                                                <!-- Modal Delete -->
                                                <div class="modal fade" id="deletePemenangModal<?= $row->peserta_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Hapus Data Pemenang Lelang</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <span>Yakin ingin hapus data?</span>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <a href="<?= base_url('panitia/pemenang/delete/' . $row->lelang_id) ?>" class="btn btn-danger">Hapus</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Modal Delete -->
                                            </td>
                                            </a>
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