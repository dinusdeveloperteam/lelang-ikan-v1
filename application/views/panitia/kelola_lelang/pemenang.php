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
                                        <th>Status Terima Produk</th>
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
                                            <?php
                                            $konfirm = $row->konfirmasi_terimaproduk;
                                            if ($konfirm == 0) {
                                                $statusTerimaProduk = "<span class='badge badge-secondary'>Belum diterima</span>";
                                            } else if ($konfirm == 1) {
                                                $statusTerimaProduk = "<span class='badge badge-success'>Telah diterima</span>";
                                            } else if ($konfirm == 2) {
                                                $statusTerimaProduk = "<span class='badge badge-danger'>Ditolak</span>";
                                            } else {
                                                $statusTerimaProduk = "<span class='badge badge-warning'>Unknown</span>";
                                            }
                                            ?>
                                            <td><?= $statusTerimaProduk ?></td>
                                            <td>
                                                <div class="action">
                                                    <a href="" data-toggle="modal" data-target="#verifikasiPemenangModal<?= $row->peserta_id ?>">
                                                        <button type="button" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="bottom" title="Verifikasi">
                                                            <i class="mdi mdi-checkbox-marked-circle-outline"></i>
                                                        </button>
                                                    </a>
                                                    <a href="" data-toggle="modal" data-target="#deletePemenangModal<?= $row->peserta_id ?>">
                                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="bottom" title="Hapus">
                                                            <i class="mdi mdi-delete-outline"></i>
                                                        </button>
                                                    </a>
                                                </div>

                                                <!-- Verifikasi Pemenang Modal -->
                                                <div class="modal fade" id="verifikasiPemenangModal<?= $row->peserta_id ?>" tabindex="-1" role="dialog" aria-labelledby="pemenangModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content bg-white">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="pemenangModalLabel">Verifikasi Pemenang Lelang</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form action="<?= base_url('panitia/pemenang/verifikasi/' . $row->peserta_id) ?>" method="POST">
                                                                <div class="modal-body">
                                                                    <!-- Verfikasi Pembayaran -->
                                                                    <label for="basic-url">Verifikasi Pembayaran</label><br>
                                                                    <div class="input-group mb-3 mt-3">
                                                                        <select class="custom-select" name="status" id="status">
                                                                            <option value="<?= $row->status ?>"><?php
                                                                                                                if ($row->status == 0) {
                                                                                                                    echo 'Belum dibayar';
                                                                                                                } else if ($row->status == 1) {
                                                                                                                    echo 'Telah dibayar';
                                                                                                                } else if ($row->status == 2) {
                                                                                                                    echo 'Ditolak';
                                                                                                                } else {
                                                                                                                    echo 'Null';
                                                                                                                }
                                                                                                                ?></option>
                                                                            <option value="0">Belum dibayar</option>
                                                                            <option value="1">Telah dibayar</option>
                                                                            <option value="2">Ditolak</option>
                                                                        </select>
                                                                    </div>
                                                                    <!-- End Verifikasi Pembayaran -->

                                                                    <!-- Verifikasi Terima Produk -->
                                                                    <label for="basic-url">Verifikasi Terima Produk</label><br>
                                                                    <div class="input-group mb-3 mt-3">
                                                                        <select class="custom-select" name="konfirmasi_terimaproduk" id="konfirmasi_terimaproduk">
                                                                            <option value="<?= $row->konfirmasi_terimaproduk ?>"><?php
                                                                                                                                    if ($row->konfirmasi_terimaproduk == 0) {
                                                                                                                                        echo 'Belum diterima';
                                                                                                                                    } else if ($row->konfirmasi_terimaproduk == 1) {
                                                                                                                                        echo 'Telah diterima';
                                                                                                                                    } else {
                                                                                                                                        echo 'Null';
                                                                                                                                    }
                                                                                                                                    ?></option>
                                                                            <option value="0">Belum diterima</option>
                                                                            <option value="1">Telah diterima</option>
                                                                        </select>
                                                                    </div>
                                                                    <!-- End Verifikasi Terima Produk -->
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
                                                <!-- End Verifikasi Pemenang Modal -->

                                                <!-- Modal Hapus -->
                                                <div class="modal fade" id="deletepenjualModal<?= $row->peserta_id ?>" tabindex="-1" aria-labelledby="deletepenjualModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content bg-light">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="deletepenjualModalLabel">Hapus Pembayaran</h5>
                                                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h4>Yakin ingin menghapus Pembayaran</h4>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                                                                <a href="<?= base_url() ?>panitia/pemenang/deletepemenang/<?= $row->peserta_id ?>" class="btn btn-danger">Ya</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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