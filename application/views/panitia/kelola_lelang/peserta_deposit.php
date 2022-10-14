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
                                        <th>ID Deposit</th>
                                        <th>ID Peserta</th>
                                        <th>ID Panitia</th>
                                        <th>tanggal Deposit</th>
                                        <th>Nominal Deposit</th>
                                        <th>Bukti Pembayaran</th>
                                        <th>Status</th>
                                        <th>Keterangan </th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count = 0;
                                    foreach ($peserta_deposit as $row) {
                                        $count = $count + 1;
                                    ?>
                                        <tr>
                                            <td><?= $count ?></td>
                                            <td><?= $row->deposit_id ?></td>
                                            <td><?= $row->peserta_id ?></td>
                                            <td><?= $row->panitia_id ?></td>
                                            <td><?= $row->tgl_deposit ?></td>
                                            <td><?= $row->nominal_deposit ?></td>
                                            <td><?= $row->bukti_pembayaran ?></td>
                                            <td>
                                                <?php if ($row->status == 0) {
                                                    echo "<span class='badge badge-secondary'>Belum Terverifikasi</span>";
                                                } else if ($row->status == 1) {
                                                    echo "<span class='badge badge-success'>Terverifikasi</span>";
                                                } else if ($row->status == 2) {
                                                    echo "<span class='badge badge-warning'>Ditolak</span>";
                                                } else {
                                                    echo "Status Tidak Diketahui";
                                                }
                                                ?></td>
                                            <td><?= $row->keterangan ?></td>
                                            <td>
                                                <div class="action">
                                                    <a href="" data-toggle="modal" data-target="#verifikasiDepositModal<?= $row->deposit_id ?>">
                                                        <button type="button" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="bottom" title="Verifikasi">
                                                            <i class="mdi mdi-checkbox-marked-circle-outline"></i>
                                                        </button>
                                                    </a>
                                                    <a href="" data-toggle="modal" data-target="#detailDepositModal<?= $row->deposit_id ?>">
                                                        <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="bottom" title="Detail">
                                                            <i class="mdi mdi-information-outline"></i>
                                                        </button>
                                                    </a>
                                                    <a href="" data-toggle="modal" data-target="#deleteDepositModal<?= $row->deposit_id ?>">
                                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="bottom" title="Hapus">
                                                            <i class="mdi mdi-delete-outline"></i>
                                                        </button>
                                                    </a>
                                                </div>
                                            </td>

                                            <!-- Verifikasi Peserta Deposit Modal -->
                                            <div class="modal fade" id="verifikasiDepositModal<?= $row->deposit_id ?>" tabindex="-1" role="dialog" aria-labelledby="pesertaModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content bg-white">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="pesertaModalLabel">Verifikasi Peserta Deposit</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="<?= base_url('panitia/deposit/verifikasi/' . $row->deposit_id) ?>" method="POST">
                                                            <div class="modal-body">
                                                                <!-- <label for="basic-url">Verifikasi Kelengkapan Data</label><br> -->
                                                                <div class="input-group mb-3 mt-3">
                                                                    <select class="custom-select" name="status" id="status">
                                                                        <option value="<?= $row->status ?>">
                                                                        <?php
                                                                            if ($row->status == 0) {
                                                                                echo 'Belum Diverifikasi';
                                                                            } else if ($row->status == 1) {
                                                                                echo 'Telah Diverifikasi';
                                                                            } else if ($row->status == 2) {
                                                                                echo 'Ditolak';
                                                                            } else {
                                                                                echo 'Status Tidak Diketahui';
                                                                            }
                                                                        ?>
                                                                        </option>
                                                                        <option value="0">Belum Diverifikasi</option>
                                                                        <option value="1">Terverifikasi</option>
                                                                        <option value="2">Ditolak</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-sm btn-success">
                                                                    <i class="mdi mdi-content-save"></i>
                                                                    <span>Simpan</span>
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Verifikasi Peserta Deposit Modal -->

                                            <!-- Detail Peserta Deposit Modal -->
                                            <div class="modal fade" id="detailDepositModal<?= $row->deposit_id ?>" tabindex="-1" aria-labelledby="editOrderModal" aria-hidden="true">
                                                <div class="modal-dialog modal-xl">
                                                    <div class="modal-content bg-default">
                                                        <div class="modal-header bg-white">
                                                            <h5 class="modal-title" id="editOrderModal">Detail Peserta Deposit</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body text-dark bg-white">
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label for="basic-url">ID Deposit </label>
                                                                        <div class="input-group mb-3">
                                                                            <input type="text" class="form-control" name="deposit_id" id="deposit_id" value="<?= $row->deposit_id ?>" aria-describedby="basic-addon3" readonly>
                                                                        </div>
                                                                        <label for="basic-url">ID Peserta</label><br>
                                                                        <div class="input-group mb-3">
                                                                            <input type="text" class="form-control" name="peserta_id" id="peserta_id" value="<?= $row->peserta_id ?>" aria-describedby="basic-addon3" readonly>
                                                                        </div>
                                                                        <label for="basic-url">ID Panitia</label>
                                                                        <div class="input-group mb-3">
                                                                            <input type="text" class="form-control" name="panitia_id" id="panitia_id" value="<?= $row->panitia_id ?>" aria-describedby="basic-addon3" readonly>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label for="basic-url">Tanggal Deposit</label>
                                                                        <div class="input-group mb-3">
                                                                            <input type="text" class="form-control" name="tgl_deposit" id="tgl_deposit" value="<?= $row->tgl_deposit ?>" aria-describedby="basic-addon3" readonly>
                                                                        </div>
                                                                        <label for="basic-url">Nominal Deposit</label>
                                                                        <div class="input-group mb-3">
                                                                            <input type="text" class="form-control" name="nominal_deposit" id="nominal_deposit" value="<?= $row->nominal_deposit ?>" aria-describedby="basic-addon3" readonly>
                                                                        </div>
                                                                        <label for="basic-url">Bukti Pembayaran</label><br>
                                                                        <div class="input-group mb-3">
                                                                            <img src="<?= base_url('vendors/uploads/panitia/' . $row->bukti_pembayaran) ?>" class="img-thumbnail thumbnail zoom" width="224px" alt="File KTP <?= $row->bukti_pembayaran ?>">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer bg-white">
                                                            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal"><i class="mdi mdi-close-circle"></i> Tutup</button>
                                                            <!-- <button type="submit" class="btn btn-sm btn-secondary"><i class="mdi mdi-close-circle"></i> Tutup</button> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Detail Peserta Deposit Modal -->

                                            <!-- Modal Delete -->
                                            <div class="modal fade" id="deleteDepositModal<?= $row->deposit_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content bg-white">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data Peserta Deposit</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <span>Yakin ingin hapus data?</span>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                                                            <a href="<?= base_url('panitia/deposit/delete/' . $row->deposit_id) ?>" class="btn btn-danger btn-sm">
                                                                <i class="mdi mdi-delete-outline"></i>
                                                                <span>Hapus</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Modal Delete -->
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
