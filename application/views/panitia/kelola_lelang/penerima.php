<div class="main-panel">
    <!--content-->
    <div class="content-wrapper">
        <!-- partials breadcrumb start -->
        <?php $this->load->view("panitia/partials/breadcrumb.php"); ?>
        <!-- partilas breadcrumb end -->
        <!-- penerima lelang -->
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body shadow-sm rounded">
                        <!-- <h4 class="card-title">10 Transaksi Terbaru</h4> -->
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Lelang ID</th>
                                        <th>Peserta ID</th>
                                        <th>Konfirmasi Terima Produk</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($Penerima as $row) {
                                    ?>
                                        <td><?= $row['nama'] ?></td>
                                        <td><?= $row['lelang_id'] ?></td>
                                        <td><?= $row['peserta_id'] ?></td>
                                        <td><?php
                                            if ($row['konfirmasi_terimaproduk'] == 0) {
                                                echo "<span class='badge badge-danger'>Belum Diterima</span>";
                                            } else if ($row['konfirmasi_terimaproduk'] == 1) {
                                                echo "<span class='badge badge-success'>Sudah Diterima</span>";
                                            }
                                            ?>
                                        </td>

                                        <td>
                                            <div class="action">
                                                <a href="" data-toggle="modal" data-target="#verifikasiPenerimaModal<?= $row['peserta_id'] ?>">
                                                    <button type="button" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="bottom" title="Verifikasi">
                                                        <i class="mdi mdi-checkbox-marked-circle-outline"></i>
                                                    </button>
                                                </a>
                                                <a href="" data-toggle="modal" data-target="#detailPenerimaModal<?= $row['peserta_id'] ?>">
                                                    <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="bottom" title="Detail">
                                                        <i class="mdi mdi-information-outline"></i>
                                                    </button>
                                                </a>
                                                <a href="" data-toggle="modal" data-target="#deletePenerimaModal<?= $row['peserta_id'] ?>">
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="bottom" title="Hapus">
                                                        <i class="mdi mdi-delete-outline"></i>
                                                    </button>
                                                </a>
                                            </div>
                                        </td>

                                        <!-- Verifikasi Penerima Modal -->
                                        <div class="modal fade" id="verifikasiPenerimaModal<?= $row['peserta_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="penerimaModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content bg-white">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="penerimaModalLabel">Verifikasi Data Penerima Lelang</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="<?= base_url('panitia/penerima/verifikasi/' . $row['peserta_id']) ?>" method="POST">
                                                        <div class="modal-body">
                                                            <!-- <label for="basic-url">Verifikasi Kelengkapan Data</label><br> -->
                                                            <div class="input-group mb-3 mt-3">
                                                                <select class="custom-select" name="konfirmasi_terimaproduk" id="konfirmasi_terimaproduk">
                                                                    <?php
                                                                    $konfirmasi = $row['konfirmasi_terimaproduk'];
                                                                    if ($konfirmasi == 0) {
                                                                        $verif = 'Belum diterima';
                                                                    } else if ($konfirmasi == 1) {
                                                                        $verif = 'Telah diterima';
                                                                    } else {
                                                                        $verif = 'Data tidak diketahui';
                                                                    }
                                                                    ?>
                                                                    <option value="<?= $verif ?>"><?= $verif ?></option>
                                                                    <option value="0">Belum Diterima</option>
                                                                    <option value="1">Sudah Diterima</option>
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
                                        <!-- End Verifikasi Penerima Modal -->

                                        <!-- Detail Penerima Modal -->
                                        <div class="modal fade" id="detailPenerimaModal<?= $row['peserta_id'] ?>" tabindex="-1" aria-labelledby="editOrderModal" aria-hidden="true">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content bg-default">
                                                    <div class="modal-header bg-white">
                                                        <h5 class="modal-title font-weight-bold" id="editOrderModal">Detail Penerima Lelang</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-dark font-weight-bold bg-white">
                                                        <form action="<?= base_url('panitia/penerima/detail/') . $row['peserta_id'] ?>" method="POST">
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label for="basic-url">Nama </label>
                                                                        <div class="input-group mb-3">
                                                                            <input type="text" class="form-control" name="nama" id="nama" value="<?= $row['nama'] ?>" aria-describedby="basic-addon3" readonly>
                                                                        </div>
                                                                        <label for="basic-url">ID Lelang</label><br>
                                                                        <div class="input-group mb-1">
                                                                            <input type="text" class="form-control" name="lelang_id" id="lelang_id" value="<?= $row['lelang_id'] ?>" aria-describedby="basic-addon3" readonly>
                                                                        </div>
                                                                        <label for="basic-url">ID Peserta</label><br>
                                                                        <div class="input-group mb-1">
                                                                            <input type="text" class="form-control" name="peserta_id" id="peserta_id" value="<?= $row['peserta_id'] ?>" aria-describedby="basic-addon3" readonly>
                                                                        </div>
                                                                        <label for="basic-url">provinsi</label><br>
                                                                        <div class="input-group mb-1">
                                                                            <input type="text" class="form-control" name="provinsi" id="provinsi" value="<?= $row['provinsi'] ?>" aria-describedby="basic-addon3" readonly>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label for="basic-url">Kota</label>
                                                                        <div class="input-group mb-3">
                                                                            <input type="text" class="form-control" name="kota" id="kota" value="<?= $row['kota'] ?>" aria-describedby="basic-addon3" readonly>
                                                                        </div>
                                                                        <label for="basic-url">Kecamatan</label>
                                                                        <div class="input-group mb-1">
                                                                            <input type="text" class="form-control" name="kecamatan" id="kecamatan" value="<?= $row['kecamatan'] ?>" aria-describedby="basic-addon3" readonly>
                                                                        </div>
                                                                        <label for="basic-url">Kelurahan</label>
                                                                        <div class="input-group mb-1">
                                                                            <input type="text" class="form-control" name="kelurahan" id="kelurahan" value="<?= $row['kelurahan'] ?>" aria-describedby="basic-addon3" readonly>
                                                                        </div>

                                                                        <label for="basic-url">Alamat</label>
                                                                        <div class="input-group mb-1">
                                                                            <input type="text" class="form-control" name="alamat" id="alamat" value="<?= $row['alamat'] ?>" aria-describedby="basic-addon3" readonly>
                                                                        </div>
                                                                        <label for="basic-url">telp</label>
                                                                        <div class="input-group mb-1">
                                                                            <input type="text" class="form-control" name="telp" id="telp" value="<?= $row['telp'] ?>" aria-describedby="basic-addon3" readonly>
                                                                        </div>
                                                                        <br>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
                                                                    <i class="mdi mdi-delete-outline"></i>
                                                                    <span>Tutup</span>
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Detail -->

                                        <!-- Modal Delete -->
                                        <div class="modal fade" id="deletePenerimaModal<?= $row['peserta_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content bg-white">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Hapus Penerima Lelang</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <span>Yakin ingin hapus data?</span>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                                                        <a href="<?= base_url('panitia/penerima/delete/' . $row['peserta_id']) ?>" class="btn btn-danger btn-sm">
                                                            <i class="mdi mdi-delete-outline"></i>
                                                            <span>Hapus</span>
                                                        </a>
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