<?php if (session()->get('status') == 1) : ?>
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title"><?= $title ?></h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="<?= base_url('home') ?>">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="swal" data-swal="<?= session()->getFlashdata('m'); ?>"></div>
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">
                            <td><?= $title ?></td>
                        </h4>
                    </div>
                </div>
                <div class="card-header">
                    <form action="<?= base_url('laporan-bulanan/filter') ?>" method="post">
                        <div class="row">
                            <div class="col-md-6 mt-4">
                                <select class="form-control" name="blnfilter">
                                    <option selected disabled>.::Filter Bulan::.</option>
                                    <option value="Januari" <?= old('blnfilter') ? "selected" : ""; ?>>Januari</option>
                                    <option value="Februari" <?= old('blnfilter') ? "selected" : ""; ?>>Februari</option>
                                    <option value="Maret" <?= old('blnfilter') ? "selected" : ""; ?>>Maret</option>
                                    <option value="April" <?= old('blnfilter') ? "selected" : ""; ?>>April</option>
                                    <option value="Mei" <?= old('blnfilter') ? "selected" : ""; ?>>Mei</option>
                                    <option value="Juni" <?= old('blnfilter') ? "selected" : ""; ?>>Juni</option>
                                    <option value="Juli" <?= old('blnfilter') ? "selected" : ""; ?>>Juli</option>
                                    <option value="Agustus" <?= old('blnfilter') ? "selected" : ""; ?>>Agustus</option>
                                    <option value="September" <?= old('blnfilter') ? "selected" : ""; ?>>September</option>
                                    <option value="Oktober" <?= old('blnfilter') ? "selected" : ""; ?>>Oktober</option>
                                    <option value="November" <?= old('blnfilter') ? "selected" : ""; ?>>November</option>
                                    <option value="Desember" <?= old('blnfilter') ? "selected" : ""; ?>>Desember</option>
                                </select>
                            </div>
                            <div class="col-md-4 mt-4">
                                <select class="form-control" name="thnfilter">
                                    <option selected disabled>.::Filter Tahun::.</option>
                                    <option value="2022" <?= (old('thnfilter')) ? "selected" : ""; ?>>2022</option>
                                    <option value="2023" <?= (old('thnfilter')) ? "selected" : ""; ?>>2023</option>
                                    <option value="2024" <?= (old('thnfilter')) ? "selected" : ""; ?>>2024</option>
                                    <option value="2025" <?= (old('thnfilter')) ? "selected" : ""; ?>>2025</option>
                                    <option value="2026" <?= (old('thnfilter')) ? "selected" : ""; ?>>2025</option>
                                    <option value="2027" <?= (old('thnfilter')) ? "selected" : ""; ?>>2027</option>
                                    <option value="2028" <?= (old('thnfilter')) ? "selected" : ""; ?>>2028</option>
                                </select>
                            </div>
                            <div class="col-md-2 mt-4">
                                <button type="submit" class="btn btn-primary ml-lg-1 btn-sm"><i class="fa fa-file"></i> Cek Labul</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="add-row" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Sekolah</th>
                                                <th>Bulan</th>
                                                <th>Tahun</th>
                                                <th>File</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1;
                                            foreach ($sekolah as $key => $r) : ?>
                                                <tr>
                                                    <td><?= $i++; ?></td>
                                                    <!-- data sekolah -->
                                                    <td><?= $r['sekolah']; ?></td>
                                                    <!-- data laporan bulanan -->
                                                    <?php if (!empty($labul) && is_array($labul)) : ?>
                                                        <?php foreach ($labul as $key => $l) { ?>
                                                            <td><?php if ($l['bulan'] == '') { ?>
                                                                    <center>
                                                                        <span class="badge badge-danger"><i class="fas fa-times-circle"></i> bulan tidak tersedia</span>
                                                                    </center>
                                                                <?php } else { ?>
                                                                    <center>
                                                                        <?= $l['bulan']; ?>
                                                                    </center>
                                                                <?php } ?>
                                                            </td>
                                                            <td><?php if ($l['tahun'] == '') { ?>
                                                                    <center>
                                                                        <span class="badge badge-danger"><i class="fas fa-times-circle"></i> tahun tidak tersedia</span>
                                                                    </center>
                                                                <?php } else { ?>
                                                                    <center>
                                                                        <?= $l['tahun']; ?>
                                                                    </center>
                                                                <?php } ?>
                                                            </td>
                                                            <td> <?php if ($l['file_labul'] == '') { ?>
                                                                    <center>
                                                                        <span class="badge badge-danger"><i class="fas fa-times-circle"></i> file tidak tersedia</span>
                                                                    </center>
                                                                <?php } else { ?>
                                                                    <center>
                                                                        <a href="<?= base_url() ?>/media/arsip/<?= $l['file_labul']; ?>" target="blank"><button class="btn btn-primary btn-xs btn-rounded"><i class="fa fa-download"></i> Download</button>
                                                                    </center>
                                                                <?php } ?>
                                                            </td>
                                                            <td> <?php if ($l['file_labul'] == '') { ?>
                                                                    <center>
                                                                        <span class="badge badge-danger"><i class="fas fa-times-circle"></i> belum selesai</span>
                                                                    </center>
                                                                <?php } else { ?>
                                                                    <center>
                                                                        <span class="badge badge-success"><i class="fas fa-check-circle"></i> selesai</span>
                                                                    </center>
                                                                <?php } ?>
                                                            </td>
                                                        <?php } ?>
                                                    <?php else : ?>
                                                        <td>
                                                            <center>
                                                                <span class="badge badge-danger"><i class="fas fa-times-circle"></i> bulan tidak tersedia</span>
                                                            </center>
                                                        </td>
                                                        <td>
                                                            <center>
                                                                <span class="badge badge-danger"><i class="fas fa-times-circle"></i> tahun tidak tersedia</span>
                                                            </center>
                                                        </td>
                                                        <td>
                                                            <center>
                                                                <span class="badge badge-danger"><i class="fas fa-times-circle"></i> file tidak tersedia</span>
                                                            </center>
                                                        </td>
                                                        <td>
                                                            <center>
                                                                <span class="badge badge-danger"><i class="fas fa-times-circle"></i> belum selesai</span>
                                                            </center>
                                                        </td>
                                                    <?php endif ?>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php else : ?>
    <div class="col-md-12">
        <div class="card mt-4">
            <div class="card-body">
                <h2>
                    <center>Maaf, akun anda sudah tidak aktif . . .</center>
                </h2>
            </div>
        </div>
    </div>
<?php endif ?>
</div>