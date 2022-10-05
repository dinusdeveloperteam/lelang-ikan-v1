<div class="main-panel">
    <div class="content-wrapper">
        <!-- partials breadcrumb start -->
        <?php $this->load->view("panitia/partials/breadcrumb.php"); ?>
        <!-- partilas breadcrumb end -->
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body shadow-sm rounded">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th> No </th>
                                        <th> ID Pelelang </th>
                                        <th> Nama </th>
                                        <th> Jenis</th>
                                        <th> Provinsi </th>
                                        <th> Kota </th>
                                        <th> Telp </th>
                                        <th> Email </th>
                                        <th> Status </th>
                                        <th> Aksi </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count = 0;
                                    foreach ($pelelang as $row) {
                                        $count = $count + 1;
                                    ?>
                                        <tr>
                                            <td><?= $count ?></td>
                                            <td><?= $row->pelelang_id ?></td>
                                            <td><?= $row->nama ?></td>
                                            <td><?php
                                                if ($row->jenis == 0) {
                                                    echo "Perusahaan";
                                                } else if ($row->jenis == 1) {
                                                    echo "Perorangan";
                                                }
                                                ?></td>
                                            <td><?= $row->provinsi ?></td>
                                            <td><?= $row->kota ?></td>
                                            <td><?= $row->telp ?></td>
                                            <td><?= $row->email ?></td>
                                            <td> <?php
                                                    if ($row->status == 0) {
                                                        echo "<span class='badge badge-secondary'>Belum Diverifikasi</span>";
                                                    } else if ($row->status == 1) {
                                                        echo "<span class='badge badge-success'>Terverifikasi</span>";
                                                    } else if ($row->status == 2) {
                                                        echo "<span class='badge badge-warning'>Ditolak</span>";
                                                    } else if ($row->status == 3) {
                                                        echo "<span class='badge badge-danger'>Dibanned</span>";
                                                    } else {
                                                        echo "Tidak diketahui";
                                                    }
                                                    ?>
                                            <td>
                                                <a href="#" data-toggle="modal" data-target="#editVerifikasiModal<?= $row->pelelang_id ?>">
                                                    <button type="button" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="bottom" title="Verifikasi"><i class="mdi mdi-pencil-outline"></i></button>
                                                </a>
                                                <a href="#" data-toggle="modal" data-target="#detailPelelangModal<?= $row->pelelang_id ?>">
                                                    <button type="button" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="bottom" title="Detail"><i class="mdi mdi-information-outline"></i></button>
                                                </a>
                                                <a href="#" data-toggle="modal" data-target="#deletePelelangModal<?= $row->pelelang_id ?>">
                                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="mdi mdi-delete-outline"></i></button>
                                                </a>
                                            </td>
                                            <!-- Edit Menu Modal -->
                                            <div class="modal fade" id="detailPelelangModal<?= $row->pelelang_id ?>" tabindex="-1" aria-labelledby="editOrderModal" aria-hidden="true">
                                                <div class="modal-dialog modal-xl">
                                                    <div class="modal-content bg-default">
                                                        <div class="modal-header bg-white">
                                                            <h5 class="modal-title" id="editOrderModal">Detail Data Pelelang</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body text-dark bg-white">
                                                            <form action="<?= base_url('panitia/pelelang/edit/' . $row->pelelang_id) ?>" method="POST">
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <label for="basic-url">Nama</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="nama" id="nama" value="<?= $row->nama ?>" aria-describedby="basic-addon3" readonly>
                                                                            </div>

                                                                            <label for="basic-url">Username</label><br>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="username" id="username" value="<?= $row->username ?>" aria-describedby="basic-addon3" readonly>
                                                                            </div>
                                                                            <label for="basic-url">NIK</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="nik" id="nik" value="<?= $row->nik ?>" aria-describedby="basic-addon3" readonly>
                                                                            </div>

                                                                            <label for="basic-url">Telp</label><br>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="telp" id="telp" value="<?= $row->telp ?>" aria-describedby="basic-addon3" readonly>
                                                                            </div>

                                                                            <label for="basic-url">Email</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="email" id="email" value="<?= $row->email ?>" aria-describedby="basic-addon3" readonly>
                                                                            </div>

                                                                            <label for="basic-url">Deskripsi</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="deskripsi" id="deskripsi" value="<?= $row->deskripsi ?>" aria-describedby="basic-addon3" readonly>
                                                                            </div>
                                                                            <label for="basic-url">Kelurahan</label>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="kelurahan" id="kelurahan" value="<?= $row->kelurahan ?>" aria-describedby="basic-addon3" readonly>
                                                                            </div>
                                                                            <label for="incremental_value">Kota</label><br>
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
                                                                            <label for="basic-url">Jenis</label><br>
                                                                            <div class="input-group mb-3">
                                                                                <?php
                                                                                if ($row->jenis == 0) {
                                                                                    $status = "Perorangan";
                                                                                } else if ($row->jenis == 1) {
                                                                                    $status = "Perusahaan";
                                                                                } else {
                                                                                    $status = "Tidak diketahui";
                                                                                }
                                                                                ?>
                                                                                <input type="text" class="form-control" name="jenis" id="jenis" value="<?= $status ?>" aria-describedby="basic-addon3" readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label for="basic-url">Bank</label><br>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="bank" id="bank" value="<?= $row->bank ?>" aria-describedby="basic-addon3" readonly>
                                                                            </div>
                                                                            <label for="basic-url">Atas Nama</label><br>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="atasnama" id="atasnama" value="<?= $row->atasnama ?>" aria-describedby="basic-addon3" readonly>
                                                                            </div>
                                                                            <label for="basic-url">No Rekening</label><br>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="norekening" id="kecamatan_kirim" value="<?= $row->norekening ?>" aria-describedby="basic-addon3" readonly>
                                                                            </div>

                                                                            <label for="basic-url">Nomor NPWP</label><br>
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" class="form-control" name="npwp" id="npwp" value="<?= $row->npwp ?>" aria-describedby="basic-addon3" readonly>
                                                                            </div>
                                                                            <label for="basic-url">File KTP</label><br>
                                                                            <div class="input-group mb-3">
                                                                                <img src="<?= base_url('vendors/uploads/panitia/file/ktp/' . $row->filektp) ?>" class="img-thumbnail thumbnail zoom" width="500px" alt="File KTP <?= $row->filektp ?>">
                                                                            </div>
                                                                            <label for="basic-url">File NPWP</label><br>
                                                                            <div class="input-group mb-3">
                                                                                <img src="<?= base_url('vendors/uploads/panitia/file/npwp/' . $row->filenpwp) ?>" class="img-thumbnail thumbnail zoom" width="500px" alt="File NPWP <?= $row->filenpwp ?>">
                                                                            </div>
                                                                            <label for="basic-url">File SIUP</label><br>
                                                                            <div class="input-group mb-3">
                                                                                <img src="<?= base_url('vendors/uploads/panitia/file/siup/' . $row->fileSIUP) ?>" class="img-thumbnail thumbnail zoom" width="500px" alt="File SIUP <?= $row->fileSIUP ?>">
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
                                            <!-- Modal Verifikasi -->
                                            <div class="modal fade" id="editVerifikasiModal<?= $row->pelelang_id ?>" tabindex="-1" aria-labelledby="editOrderModal" aria-hidden="true">
                                                <div class="modal-dialog modal-xl">
                                                    <div class="modal-content bg-default">
                                                        <div class="modal-header bg-white">
                                                            <h5 class="modal-title font-weight-bold" id="editOrderModal">Verifikasi Data Pelelang</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body text-dark font-weight-bold bg-white">
                                                            <form action="<?= base_url('panitia/pelelang/verifikasi/' . $row->pelelang_id) ?>" method="post">
                                                                <div class="input-group">
                                                                    <select class="custom-select" name="status" id="status">
                                                                        <option value="<?= $row->status ?>">
                                                                            <?php
                                                                            if ($row->status == 0) {
                                                                                echo 'Belum diverifikasi';
                                                                            } else if ($row->status == 1) {
                                                                                echo 'Terverifikasi';
                                                                            } else if ($row->status == 2) {
                                                                                echo 'Ditolak';
                                                                            } else if ($row->status == 3) {
                                                                                echo 'Dibanned';
                                                                            } else {
                                                                                echo 'Tidak diketahui';
                                                                            }
                                                                            ?>
                                                                        </option>
                                                                        <option value="0">Belum diverifikasi</option>
                                                                        <option value="1">Terverifikasi</option>
                                                                        <option value="2">Ditolak</option>
                                                                        <option value="3">Dibanned</option>
                                                                    </select>
                                                                </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button> -->
                                                            <button type="submit" class="btn btn-sm btn-success"><i class="mdi mdi-content-save"></i> Simpan</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Modal Verifikasi -->

                                            <!-- Modal Delete -->
                                            <div class="modal fade" id="deletePelelangModal<?= $row->pelelang_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data Pelelang</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <span>Yakin ingin hapus data?</span>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <a href="<?= base_url('panitia/pelelang/delete/' . $row->pelelang_id) ?>" class="btn btn-danger">Hapus</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Modal Delete -->
                        </div>
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