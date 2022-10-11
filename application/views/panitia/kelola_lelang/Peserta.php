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
                                        <th>ID Peserta</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>provinsi</th>
                                        <th>Kota</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count = 0;
                                    foreach ($peserta as $row) {
                                        $count = $count + 1;
                                    ?>
                                        <tr>
                                            <td><?= $count ?></td>
                                            <td><?= $row->peserta_id ?></td>
                                            <td><?= $row->nama ?></td>
                                            <td><?php
                                                if ($row->jeniskel == 'L') {
                                                    echo "Laki - Laki";
                                                } else if ($row->jeniskel == 'P') {
                                                    echo "Perempuan";
                                                }
                                                ?></td>
                                            <td><?= $row->provinsi ?></td>
                                            <td><?= $row->kota ?></td>
                                            <td>
                                                <?php if ($row->status == 0) {
                                                    echo "<span class='badge badge-secondary'>Belum Terverifikasi</span>";
                                                } else if ($row->status == 1) {
                                                    echo "<span class='badge badge-success'>Terverifikasi</span>";
                                                } else if ($row->status == 2) {
                                                    echo "<span class='badge badge-warning'>Di tolak</span>";
                                                } else if ($row->status == 3) {
                                                    echo "<span class='badge badge-danger'>Di banned</span>";
                                                } else {
                                                    echo "Status Tidak Diketahui";
                                                }
                                                ?></td>
                                            <td>
                                                <div class="action">
                                                    <a href="" data-toggle="modal" data-target="#verifikasiPesertaModal<?= $row->peserta_id ?>">
                                                        <button type="button" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="bottom" title="Verifikasi">
                                                            <i class="mdi mdi-checkbox-marked-circle-outline"></i>
                                                        </button>
                                                    </a>
                                                    <a href="" data-toggle="modal" data-target="#detailPesertaModal<?= $row->peserta_id ?>">
                                                        <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="bottom" title="Detail">
                                                            <i class="mdi mdi-information-outline"></i>
                                                        </button>
                                                    </a>
                                                    <a href="" data-toggle="modal" data-target="#deletePesertaModal<?= $row->peserta_id ?>">
                                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="bottom" title="Hapus">
                                                            <i class="mdi mdi-delete-outline"></i>
                                                        </button>
                                                    </a>
                                                </div>
                                            </td>

                                            <!-- Verifikasi Peserta Modal -->
                                            <div class="modal fade" id="verifikasiPesertaModal<?= $row->peserta_id ?>" tabindex="-1" role="dialog" aria-labelledby="pesertaModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content bg-white">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="pesertaModalLabel">Verifikasi Data peserta</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="<?= base_url('panitia/peserta/verifikasi/' . $row->peserta_id) ?>" method="POST">
                                                            <div class="modal-body">
                                                                <!-- <label for="basic-url">Verifikasi Kelengkapan Data</label><br> -->
                                                                <div class="input-group mb-3 mt-3">
                                                                    <select class="custom-select" name="status" id="status">
                                                                        <option value="<?= $row->status ?>"><?php
                                                                                                            if ($row->status == 0) {
                                                                                                                echo 'Belum Diverifikasi';
                                                                                                            } else if ($row->status == 1) {
                                                                                                                echo 'Terverifikasi';
                                                                                                            } else if ($row->status == 2) {
                                                                                                                echo 'Ditolak';
                                                                                                            } else if ($row->status == 3) {
                                                                                                                echo 'Dibanned';
                                                                                                            } else {
                                                                                                                echo 'Status Tidak diketahui';
                                                                                                            }
                                                                                                            ?></option>
                                                                        <option value="0">Belum Diverifikasi</option>
                                                                        <option value="1">Terverifikasi</option>
                                                                        <option value="2">Ditolak</option>
                                                                        <option value="3">Dibanned</option>
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
                                            <!-- End Verifikasi Peserta Modal -->

                                            <!-- Detail Peserta Modal -->
                                            <div class="modal fade" id="detailPesertaModal<?= $row->peserta_id ?>" tabindex="-1" aria-labelledby="editOrderModal" aria-hidden="true">
                                                <div class="modal-dialog modal-xl">
                                                    <div class="modal-content bg-default">
                                                        <div class="modal-header bg-white">
                                                            <h5 class="modal-title" id="editOrderModal">Detail Peserta Lelang</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body text-dark bg-white">
                                                            <form action="<?= base_url('panitia/peserta/detail/' . $row->peserta_id) ?>" method="POST">
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <label for="basic-url">ID Peserta </label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="peserta_id" id="peserta_id" value="<?= $row->peserta_id ?>" aria-describedby="basic-addon3" readonly>
                                                                            </div>

                                                                            <label for="basic-url">Nama</label><br>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="nama" id="nama" value="<?= $row->nama ?>" aria-describedby="basic-addon3" readonly>
                                                                            </div>
                                                                            <label for="basic-url">Username</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="username" id="username" value="<?= $row->username ?>" aria-describedby="basic-addon3" readonly>
                                                                            </div>
                                                                            <label for="basic-url">Jenis Kelamin</label><br>
                                                                            <?php
                                                                            $kelamin = $row->jeniskel;
                                                                            if ($kelamin == 'L') {
                                                                                $jeniskel = "Laki - Laki";
                                                                            } else if ($kelamin ==  'P') {
                                                                                $jeniskel = "Perempuan";
                                                                            } else {
                                                                                $jeniskelamin = "Tidak diketahui";
                                                                            }
                                                                            ?>
                                                                            <input type="text" class="form-control" name="jeniskel" id="jeniskel" value="<?= $jeniskel; ?>" aria-describedby="basic-addon3" readonly>
                                                                            <label for="basic-url">NIK</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="nik" id="nik" value="<?= $row->nik ?>" aria-describedby="basic-addon3" readonly>
                                                                            </div>
                                                                            <label for="basic-url">TELP</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="telp" id="telp" value="<?= $row->telp ?>" aria-describedby="basic-addon3" readonly>
                                                                            </div>
                                                                            <label for="basic-url">Email</label><br>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="email" id="email" value="<?= $row->email ?>" aria-describedby="basic-addon3" readonly>
                                                                            </div>
                                                                            <label for="incremental_value">Kelurahan</label><br>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="kelurahan" id="kelurahan" value="<?= $row->kelurahan ?>" aria-describedby="basic-addon3" readonly>
                                                                            </div>

                                                                            <label for="basic-url">Kecamatan</label><br>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="kecamatan" id="kecamatan" value="<?= $row->kecamatan ?>" aria-describedby="basic-addon3" readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label for="basic-url">Kota</label><br>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="kota" id="kota" value="<?= $row->kota ?>" aria-describedby="basic-addon3" readonly>
                                                                            </div>

                                                                            <label for="basic-url">Provinsi</label><br>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="provinsi" id="provinsi" value="<?= $row->provinsi ?>" aria-describedby="basic-addon3" readonly>
                                                                            </div>

                                                                            <label for="basic-url">Alamat</label><br>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="alamat" id="alamat" value="<?= $row->alamat ?>" aria-describedby="basic-addon3" readonly>
                                                                            </div>

                                                                            <label for="basic-url">Nomor NPWP</label><br>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="npwp" id="npwp" value="<?= $row->npwp ?>" aria-describedby="basic-addon3" readonly>
                                                                            </div>
                                                                            <label for="basic-url">File KTP</label><br>
                                                                            <div class="input-group mb-3">
                                                                                <img src="<?= base_url('vendors/uploads/panitia/' . $row->filektp) ?>" class="img-thumbnail thumbnail zoom" width="224px" alt="File KTP <?= $row->filektp ?>">
                                                                            </div>
                                                                            <label for="basic-url">File NPWP</label><br>
                                                                            <div class="input-group mb-3">
                                                                                <img src="<?= base_url('vendors/uploads/panitia/' . $row->filenpwp) ?>" class="img-thumbnail thumbnail zoom" width="224px" alt="File NPWP <?= $row->filenpwp ?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        </div>
                                                        <div class="modal-footer bg-white">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                            <button type="submit" class="btn btn-success"><i class="mdi mdi-content-save"></i> Simpan</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                </form>
                                            </div>
                                            <!-- End Peserta Modal -->

                                            <!-- Modal Delete -->
                                            <div class="modal fade" id="deletePesertaModal<?= $row->peserta_id ?>" tabindex="-1" role="dialog" aria-labelledby="pesertaModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="pesertaModalLabel">Hapus Data Peserta</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <span>Yakin ingin hapus data?</span>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                                                            <a href="<?= base_url('panitia/peserta/delete/' . $row->peserta_id ) ?>" class="btn btn-sm btn-danger">
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