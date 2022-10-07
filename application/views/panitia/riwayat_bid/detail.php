<div class="main-panel">
    <!--content-->
    <div class="content-wrapper">
        <!-- partials breadcrumb start -->
        <?php $this->load->view("panitia/partials/breadcrumb.php"); ?>
        <!-- partilas breadcrumb end -->
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body shadow-sm rounded">
                        <!-- <h4 class="card-title">10 Transaksi Terbaru</h4> -->
                        <div class="row">
                            <div class="col-md-5 mr-auto">
                                <?php
                                $usr_img1 = !empty($lelang->image1) ? $lelang->image1 : 'def.jpg';
                                $usr_img2 = !empty($lelang->image2) ? $lelang->image2 : 'def.jpg';
                                $usr_img3 = !empty($lelang->image3) ? $lelang->image3 : 'def.jpg';
                                $usr_img4 = !empty($lelang->image4) ? $lelang->image4 : 'def.jpg';
                                ?>

                                <div id="carouselExampleIndicators" class="carousel slide mb-5" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                                    </ol>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img class="rounded img-fluid" style="height: 400px; width: 500px;" src="<?php echo base_url('vendors/') . 'images/' . $usr_img1; ?>" alt="First slide">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="rounded img-fluid" style="height: 400px; width: 500px;" src="<?php echo base_url('vendors/') . 'images/' . $usr_img2; ?>" alt="Second slide">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="rounded img-fluid" style="height: 400px; width: 500px;" src="<?php echo base_url('vendors/') . 'images/' . $usr_img3; ?>" alt="Third slide">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="rounded img-fluid" style="height: 400px; width: 500px;" src="<?php echo base_url('vendors/') . 'images/' . $usr_img4; ?>" alt="Third slide">
                                        </div>
                                    </div>
                                    <a class="carousel-control-prev text-green" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next text-green" href="#carouselExampleIndicators" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>

                            <div class="col-md-5 mr-auto">
                                <h4><strong class="text-green"><?= $lelang->produk; ?></strong></h4>
                                <span><?= $lelang->deskripsi_produk; ?></span>
                                <hr>
                                <table class="w-100 mb-3">
                                    <tr>
                                        <td>Buka Harga</td>
                                        <td> : </td>
                                        <td> Rp. <?= number_format($lelang->harga_awal) ?></td>
                                    </tr>
                                    <tr>
                                        <td>Harga Min Diterima</td>
                                        <td> : </td>
                                        <td> Rp. <?= number_format($lelang->harga_minimal_diterima) ?></td>
                                    </tr>
                                    <tr>
                                        <td>Beli Sekarang</td>
                                        <td> : </td>
                                        <td> Rp. <?= number_format($lelang->harga_beli_sekarang) ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Mulai Lelang</td>
                                        <td> : </td>
                                        <td> <?= $lelang->tgl_mulai ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Selesai Lelang</td>
                                        <td> : </td>
                                        <td> <?= $lelang->tgl_selesai ?></td>
                                    </tr>
                                </table>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 grid-margin">
                                <div class="card">
                                    <div class="card-body shadow-sm rounded">
                                        <h3>List Riwayat Bid</h3>
                                        <div class="table-responsive">
                                            <table id="tablecalonpemenang" class="table table-striped table-bordered" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Peserta</th>
                                                        <th>ID Peserta</th>
                                                        <th>Harga Tawar</th>
                                                        <th>Tanggal Bid</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    foreach ($penawaranlelang as $row) :
                                                    ?>
                                                        <tr>
                                                            <td><?= $no ?></td>
                                                            <td><?= $row['nama'] ?></td>
                                                            <td><?= $row['peserta_id'] ?></td>
                                                            <td><?= $row['harga_tawar'] ?></td>
                                                            <td><?= $row['tgl_bid'] ?></td>
                                                        </tr>
                                                        <?php $no++; ?>
                                                    <?php
                                                    endforeach;
                                                    ?>
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>